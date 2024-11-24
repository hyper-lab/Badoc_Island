<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Admin Dashboard</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-3xl font-semibold mb-6 text-center text-indigo-600">Admin Dashboard</h2>
            <p>Welcome to the admin dashboard!</p>
            <!-- Add admin functionalities here -->
            <div class="mt-4">
                <a href="{{ route('admin.accommodations') }}" class="block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-center mb-2">Manage Accommodations</a>
                <a href="{{ route('admin.booked') }}" class="block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-center mb-2">View Booked Reservations</a>
                <a href="{{ route('admin.transactions') }}" class="block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 text-center mb-2">View Transactions</a>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="mt-4 bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>