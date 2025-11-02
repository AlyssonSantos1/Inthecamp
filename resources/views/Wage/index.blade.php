<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Area</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h2 {
            margin-bottom: 20px;
        }

        .button-container {
            margin-bottom: 30px;
        }

        .action-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            border-radius: 6px;
            color: #fff;
        }

        .create-btn { background-color: #28a745; } /* green */
        .edit-btn { background-color: #007bff; } /* blue */
        .delete-btn { background-color: #dc3545; } /* red */
        .logout-btn { background-color: #6c757d; } /* gray */

        .ware-item {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            margin: 10px auto;
            width: 60%;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        footer {
            margin-top: 40px;
            color: #666;
        }
    </style>
</head>
<body>

    <h2>Inventory Area</h2>

    {{-- Mensagem de sucesso opcional --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="button-container">
        <!-- Criar novo item -->
        <a href="{{ url('/newstock') }}" class="action-button create-btn">
            Add New Stock
        </a>

        <!-- Editar item (mesmo que não exista, redireciona para a tela de edição) -->
        <a href="{{ url('/changing/1') }}" class="action-button edit-btn">
            Edit Stock
        </a>
    </div>

    <!-- Lista de itens cadastrados (exibe só se houver) -->
    @if(isset($wares) && $wares->count() > 0)
        @foreach($wares as $ware)
            <div class="ware-item">
                <span>Item #{{ $ware->id }} — {{ $ware->wine_type ?? 'Unknown Type' }} ({{ $ware->bottle ?? 'Bottle' }})</span>

                <div>
                    <a href="{{ url('/changing/' . $ware->id) }}" class="action-button edit-btn">
                        Edit
                    </a>

                    <a href="{{ url('/changed/' . $ware->id) }}" class="action-button delete-btn">
                        Delete
                    </a>
                </div>
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
        &copy; {{ date('Y') }} Inventory Management — White Wine Edition 🍷
    </footer>

</body>
</html>
