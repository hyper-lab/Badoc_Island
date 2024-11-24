<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Transactions</title>
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
                <h2 class="text-3xl font-semibold mb-6 text-center text-indigo-600">Transactions</h2>
                @if (session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="mb-4 text-xl font-semibold text-center text-gray-700">
                    Total Income: ₱{{ number_format($totalIncome, 2) }}
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Transaction ID</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking ID</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Payment</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $transaction->transaction_id }}</td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $transaction->booked->booking_id }}</td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">{{ $transaction->amount }}</td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">
                                        <form method="POST" action="{{ route('admin.transactions.update-status', $transaction->id) }}">
                                            @csrf
                                            <select name="status" class="w-full px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                                <option value="not yet paid" {{ $transaction->status == 'not yet paid' ? 'selected' : '' }}>Not Yet Paid</option>
                                                <option value="paid" {{ $transaction->status == 'paid' ? 'selected' : '' }}>Paid</option>
                                            </select>
                                            <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Update</button>
                                        </form>
                                    </td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">
                                        <!-- Add any additional actions here -->
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