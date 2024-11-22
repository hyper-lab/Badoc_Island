<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Reservation Step 2</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-3xl font-semibold mb-6 text-center text-indigo-600">Step 2: Select Accommodation</h2>
            @if ($errors->any())
                <div class="mb-4">
                    <ul class="list-disc list-inside text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('Reservation.step-two.store') }}">
                @csrf
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Select</th>
                            <th class="py-2 px-4 border-b">Accommodation</th>
                            <th class="py-2 px-4 border-b">Slots</th>
                            <th class="py-2 px-4 border-b">Price (individual)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($accommodations as $accommodation)
                            <tr>
                                <td class="py-2 px-4 border-b text-center">
                                    <input type="radio" name="accommodation" value="{{ $accommodation->acc_id }}" {{ old('accommodation') == $accommodation->acc_id ? 'checked' : '' }}>
                                </td>
                                <td class="py-2 px-4 border-b">{{ $accommodation->acc_type }}</td>
                                <td class="py-2 px-4 border-b text-center">{{ $accommodation->acc_slot }}</td>
                                <td class="py-2 px-4 border-b text-center">₱{{ $accommodation->acc_price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-between mt-4">
                    <a href="{{ route('Reservation.step-one') }}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Previous</a>
                    <button type="submit" class="nextStep bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Next</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>