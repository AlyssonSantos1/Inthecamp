<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <style>
        body {
            background-color: #fef9f5;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .form-container {
            background-color: #fffdfb;
            padding: 40px;
            border-radius: 14px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 550px;
        }

        h2 {
            text-align: center;
            color: #7c4a59;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #4e2a35;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ccc;
            margin-bottom: 18px;
            font-size: 15px;
        }

        button {
            width: 100%;
            padding: 14px;
            font-size: 16px;
            background-color: #a36a7c;
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
            margin-bottom: 15px;
            color: #7c4a59;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Update Sale Order</h2>

        {{-- Caso existam erros --}}
        @if ($errors->any())
            <div class="message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Se existir $sale, mostra o formulário normal --}}
        @if(isset($sale) && $sale)
            <form method="POST" action="{{ url('/changed/' . $sale->id) }}">
                @csrf
                @method('PUT')

                <label for="amount">Amount</label>
                <input type="text" id="amount" name="amount" value="{{ old('amount', $sale->amount ?? '') }}" placeholder="Ex: 24" required>

                <label for="price">Price</label>
                <input type="text" id="price" name="price" value="{{ old('price', $sale->price ?? '') }}" placeholder="Ex: 320.00" required>

                <label for="type_bottle">Bottle Type</label>
                <input type="text" id="type_bottle" name="type_bottle" value="{{ old('type_bottle', $sale->type_bottle ?? '') }}" placeholder="Ex: Chardonnay" required>

                <button type="submit">Confirm Update</button>
            </form>

        {{-- Caso $sale não exista, mostra o select para escolher qual editar --}}
        @else
            <form id="selectSaleForm">
                <label for="saleSelector">Select a sale to edit</label>
                <select id="saleSelector" required>
                    <option value="">-- Choose a Sale --</option>
                    @if(isset($sales) && $sales->count() > 0)
                        @foreach($sales as $s)
                            <option value="{{ $s->id }}">#{{ $s->id }} — {{ $s->type_bottle ?? 'Unknown' }}</option>
                        @endforeach
                    @else
                        <option value="">No sales found</option>
                    @endif
                </select>

                <button type="button" id="goEdit">Go to Edit</button>
            </form>

            <script>
                document.getElementById('goEdit').addEventListener('click', function() {
                    const select = document.getElementById('saleSelector');
                    const id = select.value;
                    if (id) {
                        const url = "{{ route('order.ongoing', ['id' => ':id']) }}".replace(':id', id);
                        window.location.href = url;
                    } else {
                        alert('Please select a sale first.');
                    }
                });
            </script>
        @endif
    </div>
</body>
</html>
