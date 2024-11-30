<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Authentication</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col py-12 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md mx-auto mt-8">
            <h2 class="text-3xl font-semibold mb-6 text-center text-indigo-600">Enter Authentication Code</h2>
            @if ($errors->any())
                <div class="mb-4 text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('Reservation.auth.store') }}">
                @csrf
                <div class="mb-4">
                    <label for="auth_code" class="block text-sm font-medium text-gray-700">Authentication Code</label>
                    <input type="text" name="auth_code" id="auth_code" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>