<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seller Area</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
            padding: 50px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 30px;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .action-button {
            padding: 12px 25px;
            font-size: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            color: #fff;
            text-decoration: none;
            transition: background 0.3s;
        }

        .create-btn { background-color: #28a745; }
        .edit-btn { background-color: #007bff; }
        .delete-btn { background-color: #dc3545; }
        .logout-btn { background-color: #6c757d; }

        .create-btn:hover { background-color: #218838; }
        .edit-btn:hover { background-color: #0069d9; }
        .delete-btn:hover { background-color: #c82333; }
        .logout-btn:hover { background-color: #5a6268; }

        .sale-item {
            margin-top: 20px;
        }

        footer {
            margin-top: 60px;
            color: #666;
        }
    </style>
</head>
<body>

    <h2>Seller Area</h2>

    {{-- Mensagem de sucesso opcional --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="button-container">
        <!-- Botão de criar venda -->
        <a href="{{ route('seller.creating') }}" class="action-button create-btn">
            Create Sale
        </a>

        <!-- Botão de editar sempre disponível -->
        <a href="{{ route('order.ongoing', ['id' => 1]) }}" class="action-button edit-btn">
            Edit Sale
        </a>
    </div>

    <!-- Lista de vendas (só aparece se existirem registros) -->
    @if(isset($sales) && $sales->count() > 0)
        @foreach($sales as $sale)
            <div class="sale-item">
                <span>Sale #{{ $sale->id }} — {{ $sale->type_bottle ?? 'Unknown' }}</span>

                <a href="{{ route('order.ongoing', ['id' => $sale->id]) }}" class="action-button edit-btn">
                    Edit
                </a>

                <a href="{{ route('sell.excluison', ['id' => $sale->id]) }}" class="action-button delete-btn">
                    Delete
                </a>
            </div>
        @endforeach
    @endif

    <!-- Botão de Logout -->
    <div style="margin-top:40px;">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="action-button logout-btn">Logout</button>
        </form>
    </div>

    <footer>
        &copy; {{ date('Y') }} Seller Management — White Wine Edition 🍇
    </footer>

</body>
</html>
