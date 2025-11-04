<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Wine Record</title>

    <style>
        body {
            font-family: "Segoe UI", Roboto, Arial, sans-serif;
            background: #f4f5f7;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 400px;
            background: #ffffff;
            margin: 60px auto;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
            color: #444;
        }

        select, input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            background: #fafafa;
            transition: border 0.3s ease;
        }

        select:focus, input:focus {
            border-color: #6c63ff;
            outline: none;
            background: #fff;
        }

        button, .logout-btn {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background: #6c63ff;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover, .logout-btn:hover {
            background: #5a52e0;
        }

        .logout-btn {
            margin-top: 15px;
            background: #e74c3c;
        }

        .logout-btn:hover {
            background: #c0392b;
        }

        .success-message {
            background: #e7f8ec;
            color: #278a4c;
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 15px;
            font-weight: 500;
        }

        footer {
            text-align: center;
            font-size: 13px;
            color: #888;
            margin-top: 40px;
        }
    </style>
</head>
<body>

  <div class="form-container">
    <h2>Edit Wine Record</h2>

    {{-- Success message --}}
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    {{-- Select for wine --}}
    <div class="form-group">
        <label for="stock_select">Select Wine to Edit</label>
        <select id="stock_select" onchange="loadStockData()">
            <option value="">Select</option>
            @foreach($stock as $s)
                <option value="{{ $s->id }}"
                    data-supply="{{ $s->supply }}"
                    data-bottle="{{ $s->bottle }}"
                    data-age="{{ $s->age }}"
                    data-price="{{ $s->price }}"
                    data-temperature="{{ $s->temperature }}"
                    data-wine_type="{{ $s->wine_type }}"
                >
                    {{ $s->bottle }} ({{ $s->supply }})
                </option>
            @endforeach
        </select>
    </div>

    {{-- Form --}}
    <form id="editForm" method="POST" action="">
        @csrf

        <input type="hidden" name="id" id="stock_id">

        <div class="form-group">
            <label for="supply">Supply</label>
            <input type="text" id="supply" name="supply" required>
        </div>

        <div class="form-group">
            <label for="bottle">Bottle Label</label>
            <input type="text" id="bottle" name="bottle" required>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="text" id="age" name="age" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" name="price" required>
        </div>

        <div class="form-group">
            <label for="temperature">Temperature</label>
            <input type="text" id="temperature" name="temperature" required>
        </div>

        <div class="form-group">
            <label for="wine_type">Wine Type</label>
            <select id="wine_type" name="wine_type">
                <option value="">Select</option>
                <option value="red">Red</option>
                <option value="white">White</option>
                <option value="rose">Rosé</option>
                <option value="sparkling">Sparkling</option>
            </select>
        </div>

        <button type="submit">Update Wine</button>
    </form>

    {{-- Logout --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
  </div>

  <footer>
    &copy; {{ date('Y') }} Inventory Management — White Wine Edition 🍷
  </footer>

  <script>
    function loadStockData() {
        const select = document.getElementById('stock_select');
        const option = select.options[select.selectedIndex];

        if (!option.value) return; // evita erro se nada selecionado

        document.getElementById('stock_id').value = option.value;
        document.getElementById('supply').value = option.dataset.supply;
        document.getElementById('bottle').value = option.dataset.bottle;
        document.getElementById('age').value = option.dataset.age;
        document.getElementById('price').value = option.dataset.price;
        document.getElementById('temperature').value = option.dataset.temperature;
        document.getElementById('wine_type').value = option.dataset.wine_type;

        document.getElementById('editForm').action = "{{ url('/changed') }}/" + option.value;
    }
  </script>
</body>
</html>
