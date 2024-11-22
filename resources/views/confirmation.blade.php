<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Reservation Confirmation</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-3xl font-semibold mb-6 text-center text-indigo-600">Reservation Confirmation</h2>
            <div class="mb-4">
                <p class="text-gray-700"><strong>Booked By:</strong> {{ $booked->book_by }}</p>
                <p class="text-gray-700"><strong>Departure Date:</strong> {{ $booked->book_departure }}</p>
                <p class="text-gray-700"><strong>Contact:</strong> {{ $booked->book_contact }}</p>
                <p class="text-gray-700"><strong>Address:</strong> {{ $booked->book_address }}</p>
                <p class="text-gray-700"><strong>Email:</strong> {{ $booked->book_email }}</p>
                <p class="text-gray-700"><strong>Accommodation:</strong> {{ $booked->accommodation->acc_type }}</p>
                <h3 class="text-2xl font-semibold mb-4 text-center text-indigo-600">Clients</h3>
                @foreach ($booked->clients as $client)
                    <p class="text-gray-700"><strong>Client Name:</strong> {{ $client->client_name }}</p>
                    <p class="text-gray-700"><strong>Client Age:</strong> {{ $client->client_age }}</p>
                    <p class="text-gray-700"><strong>Client Gender:</strong> {{ $client->client_gender }}</p>
                @endforeach
            </div>
            <P>For Cancelation of Reservation  Please contact us  on facebook and gmail</P>
            <a href="{{ route('Reservation.step-one') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Start Over</a>
            <a href="{{ route('Reservation.confirmation.pdf') }}" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white">Download PDF</a>
        </div>
    </div>
</body>
</html>