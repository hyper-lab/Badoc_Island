@include('reservation_partials.header')
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-3xl font-semibold mb-6 text-center text-indigo-600">Step 1: Reservation Info</h2>
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('Reservation.step-one.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="book_by" class="block text-gray-700 font-bold mb-2">Booked By</label>
                    <input type="text" id="book_by" name="book_by" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter First Name and Last Name" value="{{ old('book_by') }}">
                </div>
                <div class="mb-4">
                    <label for="datePicker" class="block text-gray-700 font-bold mb-2">Select Date</label>
                    <input type="date" id="datePicker" name="book_departure" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ old('book_departure') }}">
                </div>
                <div class="mb-4">
                    <label for="book_contact" class="block text-gray-700 font-bold mb-2">Contact</label>
                    <input type="text" id="book_contact" name="book_contact" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter Contact" value="{{ old('book_contact') }}">
                </div>
                <div class="mb-4">
                    <label for="book_address" class="block text-gray-700 font-bold mb-2">Address</label>
                    <input type="text" id="book_address" name="book_address" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter Address" value="{{ old('book_address') }}">
                </div>
                <div class="mb-4">
                    <label for="book_email" class="block text-gray-700 font-bold mb-2">Email</label>
                    <input type="email" id="book_email" name="book_email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter Email" value="{{ old('book_email') }}">
                </div>
                <div class="mb-4">
                    <label for="num_clients" class="block text-gray-700 font-bold mb-2">Number of Clients</label>
                    <input type="number" id="num_clients" name="num_clients" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter Number of Clients" value="{{ old('num_clients') }}">
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-lg mt-4 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Next</button>
            </form>
        </div>
    </div>
</body>
@include('reservation_partials.footer')