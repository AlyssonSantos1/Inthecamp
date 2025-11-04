<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory Exclusion</title>
  <style>
    body {
      background-color: #f9f4f6;
      font-family: 'Segoe UI', sans-serif;
      color: #4b2e2e;
      padding: 40px;
      text-align: center;
    }

    h2 {
      color: #7b3e57;
      margin-bottom: 40px;
    }

    .list {
      max-width: 700px;
      margin: 0 auto;
    }

    .item {
      background: #fff7fb;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 12px;
      box-shadow: 0 0 6px rgba(0,0,0,0.1);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .btn {
      padding: 8px 14px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      color: #fff;
      font-weight: bold;
    }

    .btn-danger {
      background-color: #c44b4b;
    }

    .btn-danger:hover {
      background-color: #a63a3a;
    }

    .logout {
      background-color: #555;
      margin-top: 30px;
    }

    .logout:hover {
      background-color: #333;
    }

    footer {
      margin-top: 40px;
      font-size: 14px;
      color: #7a6464;
    }
  </style>
</head>
<body>

  <h2>Delete Wine from Inventory</h2>

  <div class="list">
    @if($stock->isEmpty())
      <p>No wines registered in inventory.</p>
    @else
      @foreach($stock as $item)
        <div class="item">
          <div>
            <strong>#{{ $item->id }}</strong> — {{ $item->bottle ?? 'Unknown Label' }}  
            &middot; Type: {{ ucfirst($item->wine_type) }}  
            &middot; Price: {{ $item->price }}
          </div>

          <div>
            <form action="{{ route('deleted', $item->id) }}" method="POST" onsubmit="return confirm('Delete wine #{{ $item->id }}?');" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      @endforeach
    @endif
  </div>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="btn logout">Logout</button>
  </form>

  <footer>
    &copy; {{ date('Y') }} Inventory Management — White Wine Edition 🍷
  </footer>

</body>
</html>
