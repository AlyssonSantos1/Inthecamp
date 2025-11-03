<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Area</title>

    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 40px;
        }

        h2 {
            color: #333;
            margin-bottom: 30px;
        }

        .button-container {
            margin-bottom: 30px;
        }

        .action-button {
            display: inline-block;
            padding: 12px 20px;
            margin: 5px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
            color: white;
            transition: background 0.3s;
        }

        .create-btn {
            background-color: #5cb85c;
        }

        .create-btn:hover {
            background-color: #4cae4c;
        }

        .edit-btn {
            background-color: #0275d8;
        }

        .edit-btn:hover {
            background-color: #025aa5;
        }

        .logout-btn {
            background-color: #f0ad4e;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #ec971f;
        }

        .ware-item {
            background-color: #ffffff;
            margin: 10px auto;
            padding: 15px;
            border-radius: 8px;
            width: 60%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        footer {
            margin-top: 50px;
            color: #777;
            font-size: 14px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            width: 60%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>

    <h2>Inventory Area</h2>

    {{-- Optional success message --}}
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="button-container">
        <!-- Add new item -->
        <a href="{{ url('/newstock') }}" class="action-button create-btn">
            Add New Stock
        </a>

        <!-- Edit item (now goes to /changing without ID) -->
        <a href="{{ url('/changing') }}" class="action-button edit-btn">
            Edit Stock
        </a>
    </div>

    <!-- List of existing stocks -->
    @if(isset($wares) && $wares->count() > 0)
        @foreach($wares as $ware)
            <div class="ware-item">
                <span>
                    <strong>#{{ $ware->id }}</strong> —
                    {{ ucfirst($ware->wine_type ?? 'Unknown') }} |
                    {{ $ware->bottle ?? 'Unnamed bottle' }}
                </span>
            </div>
        @endforeach
    @else
        <p>No wines registered yet.</p>
    @endif

    <!-- Logout -->
    <div style="margin-top:40px;">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>

    <footer>
        &copy; {{ date('Y') }} Inventory Management — White Wine Edition 🍷
    </footer>

</body>
</html>
