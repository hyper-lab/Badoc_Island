<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7fafc;
            color: #2d3748;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h2 {
            font-size: 24px;
            color: #4a5568;
        }
        .content {
            margin-bottom: 20px;
        }
        .content p {
            margin: 5px 0;
        }
        .content h3 {
            font-size: 20px;
            color: #4a5568;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Reservation Confirmation</h2>
        </div>
        <div class="content">
            <p><strong>Booking ID:</strong> {{ $booked->booking_id }}</p>
            <p><strong>Booked By:</strong> {{ $booked->book_by }}</p>
            <p><strong>Departure Date:</strong> {{ $booked->book_departure }}</p>
            <p><strong>Contact:</strong> {{ $booked->book_contact }}</p>
            <p><strong>Address:</strong> {{ $booked->book_address }}</p>
            <p><strong>Email:</strong> {{ $booked->book_email }}</p>
            <p><strong>Accommodation:</strong> {{ $booked->accommodation->acc_type }}</p>
            <h3>Clients</h3>
            @foreach ($booked->clients as $client)
                <p><strong>Client Name:</strong> {{ $client->client_name }}</p>
                <p><strong>Client Age:</strong> {{ $client->client_age }}</p>
                <p><strong>Client Gender:</strong> {{ $client->client_gender }}</p>
            @endforeach
        </div>
    </div>
</body>
</html>