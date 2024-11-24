<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Booked Reservations</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>
                <nav class="mt-4 flex justify-between items-center">
                    <ul class="flex space-x-4">
                        <li><a href="{{ route('admin.dashboard') }}" class="text-indigo-600 hover:text-indigo-900">Dashboard</a></li>
                        <li><a href="{{ route('admin.transactions') }}" class="text-indigo-600 hover:text-indigo-900">View Transactions</a></li>
                        <li><a href="{{ route('admin.accommodations') }}" class="text-indigo-600 hover:text-indigo-900">Manage Accommodations</a></li>
                        <li><a href="{{ route('admin.booked') }}" class="text-indigo-600 hover:text-indigo-900">View Reservations</a></li>
                    </ul>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700">Logout</button>
                    </form>
                </nav>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-grow py-12 px-4 sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-6xl mx-auto mt-8">
                <h2 class="text-3xl font-semibold mb-6 text-center text-indigo-600">Booked Reservations</h2>
                @if (session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mb-4">
                    <form method="GET" action="{{ route('admin.booked') }}">
                        <input type="text" name="search" placeholder="Search by Booking ID, Booked By, or Client Name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ request('search') }}">
                        <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Search</button>
                    </form>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking ID</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booked By</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departure Date</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Accommodation</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Clients</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $booking->booking_id }}</td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $booking->book_by }}</td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $booking->book_email }}</td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $booking->book_departure }}</td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $booking->book_contact }}</td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">
                                        {{ $booking->accommodation ? $booking->accommodation->acc_type : 'N/A' }}
                                    </td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">
                                        <ul>
                                            @foreach ($booking->clients as $client)
                                                <li>{{ $client->client_name }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $booking->status }}</td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">
                                        <form method="POST" action="{{ route('admin.booked.approve', $booking->id) }}" class="inline-block">
                                            @csrf
                                            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">Approve</button>
                                        </form>
                                        <form method="POST" action="{{ route('admin.booked.decline', $booking->id) }}" class="inline-block">
                                            @csrf
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700">Decline</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>