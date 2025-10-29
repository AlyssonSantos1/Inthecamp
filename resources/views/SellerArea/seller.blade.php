<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendant Area</title>
    <style>
        body {
            background-color: #fff8f0; /* white wine / rosé tone */
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background-color: #fdf6f9;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: #8c3f61; /* soft grape tone */
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #5c2a3e;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            background-color: #a95c7b; /* rosé wine */
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #8c3f61;
        }

        .message {
            text-align: center;
            margin-bottom: 20px;
            color: #5c2a3e;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register Sale</h2>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form based on AttendantController store method -->
        <form method="POST" action="{{ url('/newstock') }}">
            @csrf

            <label for="amount">Quantity</label>
            <input type="text" id="amount" name="amount" placeholder="Ex: 12" required>

            <label for="price">Price</label>
            <input type="text" id="price" name="price" placeholder="Ex: 150.00" required>

            <label for="type_bottle">Bottle Type</label>
            <input type="text" id="type_bottle" name="type_bottle" placeholder="Ex: White Wine" required>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
