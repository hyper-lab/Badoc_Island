<?php
// app/Http/Controllers/ReservationController.php
namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Booked;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

class ReservationController extends Controller
{
    public function stepOne()
    {
        return view('Reservation.step-one');
    }

    public function stepOneStore(Request $request)
    {
        // Validate and process the form data
        $request->validate([
            'book_by' => 'required|string|max:255',
            'book_departure' => 'required|date',
            'book_contact' => 'required|string|max:255',
            'book_address' => 'required|string|max:255',
            'book_email' => 'required|email|max:255',
            'num_clients' => 'required|integer|min:1',
        ]);

        // Generate a unique booking ID
        $booking_id = Str::uuid()->toString();

        // Save the data
        $booked = Booked::create([
            'booking_id' => $booking_id,
            'book_by' => $request->input('book_by'),
            'book_departure' => $request->input('book_departure'),
            'book_contact' => $request->input('book_contact'),
            'book_address' => $request->input('book_address'),
            'book_email' => $request->input('book_email'),
        ]);

        // Store the booked ID and number of clients in the session
        $request->session()->put('booked_id', $booked->id);
        $request->session()->put('num_clients', $request->input('num_clients'));

        // Redirect to the next step
        return redirect()->route('Reservation.step-two');
    }

    public function stepTwo()
    {
        $accommodations = Accommodation::all(); // Assuming you have an Accommodation model
        return view('Reservation.step-two', compact('accommodations'));
    }

    public function stepTwoStore(Request $request)
    {
        // Validate the selected accommodation
        $request->validate([
            'accommodation' => 'required|exists:accommodations,acc_id',
        ]);

        // Retrieve the booked ID from the session
        $booked_id = $request->session()->get('booked_id');

        // Update the booked record with the selected accommodation
        $booked = Booked::find($booked_id);
        $booked->accommodation_id = $request->input('accommodation');
        $booked->save();

        // Redirect to the client information step
        return redirect()->route('Reservation.step-three');
    }

    public function stepThree()
    {
        $num_clients = session('num_clients');
        return view('Reservation.step-three', compact('num_clients'));
    }

    public function stepThreeStore(Request $request)
    {
        // Validate the client information
        $request->validate([
            'clients.*.client_name' => 'required|string|max:255',
            'clients.*.client_age' => 'required|integer|min:0',
            'clients.*.client_gender' => 'required|string|max:10',
        ]);

        // Retrieve the booked ID from the session
        $booked_id = $request->session()->get('booked_id');

        // Save the client information
        foreach ($request->input('clients') as $clientData) {
            Client::create([
                'client_name' => $clientData['client_name'],
                'client_age' => $clientData['client_age'],
                'client_gender' => $clientData['client_gender'],
                'booked_id' => $booked_id,
            ]);
        }

        // Redirect to a confirmation page or next step
        return redirect()->route('confirmation');
    }

    public function confirmation()
    {
        // Retrieve the booked ID from the session
        $booked_id = session('booked_id');

        // Retrieve the booked record
        $booked = Booked::with('accommodation', 'clients')->find($booked_id);

        return view('confirmation', compact('booked'));
    }

    public function downloadPDF()
    {
        // Retrieve the booked ID from the session
        $booked_id = session('booked_id');

        // Retrieve the booked record
        $booked = Booked::with('accommodation', 'clients')->find($booked_id);

        // Load the view and pass the data
        $pdf = PDF::loadView('confirmation-pdf', compact('booked'));

        // Download the PDF
        return $pdf->download('reservation-confirmation.pdf');
    }
}