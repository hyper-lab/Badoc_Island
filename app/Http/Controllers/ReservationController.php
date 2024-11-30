<?php
// app/Http/Controllers/ReservationController.php
namespace App\Http\Controllers;

use App\Models\Accommodation;
use App\Models\Booked;
use App\Models\Client;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\AuthCodeMail;
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
            'num_clients' => 'required|integer|min:1|max:20',
        ]);

        // Generate a unique booking ID with 11 characters
        $booking_id = Str::random(11);

        // Generate a random authentication code
        $auth_code = Str::random(6);

        // Send the authentication code to the booker's email
        Mail::to($request->input('book_email'))->send(new AuthCodeMail($auth_code));

        // Store the booking data and authentication code in the session
        $request->session()->put('booking_data', $request->all());
        $request->session()->put('auth_code', $auth_code);

        // Redirect to the authentication step
        return redirect()->route('Reservation.auth');
    }

    public function auth()
    {
        return view('Reservation.auth');
    }

    public function authStore(Request $request)
    {
        // Validate the authentication code
        $request->validate([
            'auth_code' => 'required|string|max:6',
        ]);

        // Retrieve the authentication code from the session
        $session_auth_code = $request->session()->get('auth_code');

        // Check if the provided authentication code matches the session code
        if ($request->input('auth_code') !== $session_auth_code) {
            return redirect()->back()->withErrors(['auth_code' => 'Invalid authentication code.']);
        }

        // Retrieve the booking data from the session
        $booking_data = $request->session()->get('booking_data');

        // Generate a unique booking ID with 11 characters
        $booking_id = Str::random(11);

        // Save the booking data
        $booked = Booked::create([
            'booking_id' => $booking_id,
            'book_by' => $booking_data['book_by'],
            'book_departure' => $booking_data['book_departure'],
            'book_contact' => $booking_data['book_contact'],
            'book_address' => $booking_data['book_address'],
            'book_email' => $booking_data['book_email'],
        ]);

        // Store the booked ID and number of clients in the session
        $request->session()->put('booked_id', $booked->id);
        $request->session()->put('num_clients', $booking_data['num_clients']);

        // Clear the authentication code from the session
        $request->session()->forget('auth_code');

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

        // Retrieve the selected accommodation
        $accommodation = Accommodation::find($request->input('accommodation'));

        // Check if the accommodation has available slots
        if ($accommodation->acc_slot <= 0) {
            return redirect()->back()->withErrors(['accommodation' => 'The selected accommodation is fully booked. Please choose another one.']);
        }

        // Retrieve the booked ID from the session
        $booked_id = $request->session()->get('booked_id');

        // Update the booked record with the selected accommodation
        $booked = Booked::find($booked_id);
        $booked->accommodation_id = $request->input('accommodation');
        $booked->save();

        // Decrement the slot count for the selected accommodation
        $accommodation->decrementSlot();

        // Calculate the total payment
        $num_clients = $request->session()->get('num_clients');
        $total_payment = $accommodation->acc_price * $num_clients;

        // Generate a unique transaction ID
        $transaction_id = Str::uuid()->toString();

        // Save the transaction data
        Transaction::create([
            'transaction_id' => $transaction_id,
            'booked_id' => $booked->id,
            'amount' => $total_payment, // Store the total payment
            'status' => 'pending',
        ]);

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