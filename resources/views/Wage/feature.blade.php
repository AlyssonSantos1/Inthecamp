<body>
  <div class="form-container">
    <h2>Edit Wine Record</h2>

    {{-- Mensagem de sucesso --}}
    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    {{-- Select para escolher o vinho --}}
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

    {{-- Formulário --}}
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

        <button type="submit">Update</button>
    </form>
  </div>

  <script>
    function loadStockData() {
        const select = document.getElementById('stock_select');
        const option = select.options[select.selectedIndex];

        if (!option.value) return; // evita action vazia

        document.getElementById('stock_id').value = option.value;
        document.getElementById('supply').value = option.dataset.supply;
        document.getElementById('bottle').value = option.dataset.bottle;
        document.getElementById('age').value = option.dataset.age;
        document.getElementById('price').value = option.dataset.price;
        document.getElementById('temperature').value = option.dataset.temperature;
        document.getElementById('wine_type').value = option.dataset.wine_type;

        // Define a action do form dinamicamente com o ID do item
        document.getElementById('editForm').action = '/Inthecamp/public/changed/' + option.value;
    }
  </script>

  <style>
    body { background-color: #f2f2f2; font-family: Arial, sans-serif; }
    .form-container { width: 400px; margin: 40px auto; background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    h2 { text-align: center; margin-bottom: 20px; }
    .form-group { margin-bottom: 15px; }
    label { display: block; font-weight: bold; margin-bottom: 5px; color: #444; }
    input, select { width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ccc; font-size: 14px; }
    button { width: 100%; padding: 12px; background-color: #d9534f; color: white; border: none; border-radius: 4px; font-size: 16px; cursor: pointer; }
    button:hover { background-color: #c9302c; }
    .success-message { background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px; text-align: center; }
  </style>
</body>
