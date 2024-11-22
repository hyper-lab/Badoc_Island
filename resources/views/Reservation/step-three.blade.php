<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Reservation Step 3</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-3xl font-semibold mb-6 text-center text-indigo-600">Step 3: Client Information</h2>
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('Reservation.step-three.store') }}">
                @csrf
                @for ($i = 0; $i < $num_clients; $i++)
                    <div class="mb-4">
                        <label for="clients[{{ $i }}][client_name]" class="block text-gray-700 font-bold mb-2">Client Name</label>
                        <input type="text" id="clients[{{ $i }}][client_name]" name="clients[{{ $i }}][client_name]" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter Client Name" value="{{ old('clients.'.$i.'.client_name') }}">
                    </div>
                    <div class="mb-4">
                        <label for="clients[{{ $i }}][client_age]" class="block text-gray-700 font-bold mb-2">Client Age</label>
                        <input type="number" id="clients[{{ $i }}][client_age]" name="clients[{{ $i }}][client_age]" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Enter Client Age" value="{{ old('clients.'.$i.'.client_age') }}">
                    </div>
                    <div class="mb-4">
                        <label for="clients[{{ $i }}][client_gender]" class="block text-gray-700 font-bold mb-2">Client Gender</label>
                        <select id="clients[{{ $i }}][client_gender]" name="clients[{{ $i }}][client_gender]" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="Male" {{ old('clients.'.$i.'.client_gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('clients.'.$i.'.client_gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>
                @endfor
                <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-lg mt-4 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Next</button>
            </form>
        </div>
    </div>
</body>
</html>