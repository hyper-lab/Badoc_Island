<?php
// app/Http/Controllers/AdminController.php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Models\Booked;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function viewBooked(Request $request)
    {
        $query = Booked::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('booking_id', 'LIKE', "%{$search}%")
                  ->orWhere('book_by', 'LIKE', "%{$search}%")
                  ->orWhereHas('clients', function ($q) use ($search) {
                      $q->where('client_name', 'LIKE', "%{$search}%");
                  });
        }

        if ($request->has('status') && $request->input('status') != 'all') {
            $status = $request->input('status');
            $query->where('status', $status);
        }

        $bookings = $query->with('accommodation', 'clients')->get();
        return view('admin.booked', compact('bookings'));
    }

    public function approveBooking($id)
    {
        $booking = Booked::find($id);

        if (!$booking) {
            return redirect()->route('admin.booked')->with('error', 'Booking not found.');
        }

        $booking->status = 'approved';
        $booking->save();

        return redirect()->route('admin.transactions')->with('success', 'Booking approved successfully.');
    }

    public function declineBooking($id)
    {
        $booking = Booked::find($id);

        if (!$booking) {
            return redirect()->route('admin.booked')->with('error', 'Booking not found.');
        }

        $booking->status = 'declined';
        $booking->save();

        return redirect()->route('admin.booked')->with('success', 'Booking declined successfully.');
    }

    public function viewAccommodations()
    {
        $accommodations = Accommodation::all();
        return view('admin.accommodations', compact('accommodations'));
    }

    public function createAccommodation()
    {
        return view('admin.create-accommodation');
    }

    public function storeAccommodation(Request $request)
    {
        $request->validate([
            'acc_type' => 'required|string|max:255',
            'acc_slot' => 'required|integer|min:0',
            'acc_price' => 'required|numeric|min:0',
        ]);

        Accommodation::create([
            'acc_type' => $request->input('acc_type'),
            'acc_slot' => $request->input('acc_slot'),
            'acc_price' => $request->input('acc_price'),
        ]);

        return redirect()->route('admin.accommodations')->with('success', 'Accommodation created successfully.');
    }

    public function editAccommodation($id)
    {
        $accommodation = Accommodation::find($id);

        if (!$accommodation) {
            return redirect()->route('admin.accommodations')->with('error', 'Accommodation not found.');
        }

        return view('admin.edit-accommodation', compact('accommodation'));
    }

    public function updateAccommodation(Request $request, $id)
    {
        $request->validate([
            'acc_type' => 'required|string|max:255',
            'acc_slot' => 'required|integer|min:0',
            'acc_price' => 'required|numeric|min:0',
        ]);

        $accommodation = Accommodation::find($id);

        if (!$accommodation) {
            return redirect()->route('admin.accommodations')->with('error', 'Accommodation not found.');
        }

        $accommodation->acc_type = $request->input('acc_type');
        $accommodation->acc_slot = $request->input('acc_slot');
        $accommodation->acc_price = $request->input('acc_price');
        $accommodation->save();

        return redirect()->route('admin.accommodations')->with('success', 'Accommodation updated successfully.');
    }

    public function deleteAccommodation($id)
    {
        $accommodation = Accommodation::find($id);

        if (!$accommodation) {
            return redirect()->route('admin.accommodations')->with('error', 'Accommodation not found.');
        }

        $accommodation->delete();

        return redirect()->route('admin.accommodations')->with('success', 'Accommodation deleted successfully.');
    }

    public function viewTransactions()
    {
        $transactions = Transaction::with('booked')->get();
        $totalIncome = Transaction::where('status', 'paid')->sum('amount');
        return view('admin.transactions', compact('transactions', 'totalIncome'));
    }

    public function updateTransactionStatus(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        if (!$transaction) {
            return redirect()->route('admin.transactions')->with('error', 'Transaction not found.');
        }

        $transaction->status = $request->input('status');
        $transaction->save();

        return redirect()->route('admin.transactions')->with('success', 'Transaction status updated successfully.');
    }
}