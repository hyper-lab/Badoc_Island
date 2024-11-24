<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Accommodations</title>
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
                <h2 class="text-3xl font-semibold mb-6 text-center text-indigo-600">Accommodations</h2>
                @if (session('success'))
                    <div class="mb-4 text-green-600">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Accommodation Type</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slots</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                                <th class="py-2 px-4 border-b bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <form method="POST" action="{{ route('admin.accommodations.store') }}">
                                    @csrf
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">
                                        <input type="text" name="acc_type" placeholder="Accommodation Type" class="w-full px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    </td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">
                                        <input type="number" name="acc_slot" placeholder="Slots" class="w-full px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    </td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">
                                        <input type="number" step="0.01" name="acc_price" placeholder="Price" class="w-full px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    </td>
                                    <td class="py-2 px-4 border-b text-sm text-gray-700">
                                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">Create</button>
                                    </td>
                                </form>
                            </tr>
                            @foreach ($accommodations as $accommodation)
                                <tr>
                                    <form method="POST" action="{{ route('admin.accommodations.update', $accommodation->acc_id) }}">
                                        @csrf
                                        <td class="py-2 px-4 border-b text-sm text-gray-700">
                                            <span class="view-mode">{{ $accommodation->acc_type }}</span>
                                            <input type="text" name="acc_type" value="{{ $accommodation->acc_type }}" class="edit-mode w-full px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 hidden">
                                        </td>
                                        <td class="py-2 px-4 border-b text-sm text-gray-700">
                                            <span class="view-mode">{{ $accommodation->acc_slot }}</span>
                                            <input type="number" name="acc_slot" value="{{ $accommodation->acc_slot }}" class="edit-mode w-full px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 hidden">
                                        </td>
                                        <td class="py-2 px-4 border-b text-sm text-gray-700">
                                            <span class="view-mode">₱{{ $accommodation->acc_price }}</span>
                                            <input type="number" step="0.01" name="acc_price" value="{{ $accommodation->acc_price }}" class="edit-mode w-full px-2 py-1 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 hidden">
                                        </td>
                                        <td class="py-2 px-4 border-b text-sm text-gray-700">
                                            <div class="flex space-x-2">
                                                <button type="button" class="edit-button bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-700">Edit</button>
                                                <button type="submit" class="save-button bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 hidden">Save</button>
                                                <button type="button" class="cancel-button bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-700 hidden">Cancel</button>
                                            </div>
                                    </form>
                                    <form method="POST" action="{{ route('admin.accommodations.delete', $accommodation->acc_id) }}">
                                        @csrf
                                        <td class="py-1 px-4 border-b text-sm text-gray-700">
                                            <button type="submit" class="delete-button bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700 ml-2">Delete</button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                row.querySelectorAll('.view-mode').forEach(element => element.classList.add('hidden'));
                row.querySelectorAll('.edit-mode').forEach(element => element.classList.remove('hidden'));
                row.querySelector('.edit-button').classList.add('hidden');
                row.querySelector('.save-button').classList.remove('hidden');
                row.querySelector('.cancel-button').classList.remove('hidden');
            });
        });

        document.querySelectorAll('.cancel-button').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                row.querySelectorAll('.view-mode').forEach(element => element.classList.remove('hidden'));
                row.querySelectorAll('.edit-mode').forEach(element => element.classList.add('hidden'));
                row.querySelector('.edit-button').classList.remove('hidden');
                row.querySelector('.save-button').classList.add('hidden');
                row.querySelector('.cancel-button').classList.add('hidden');
            });
        });
    </script>
</body>
</html>