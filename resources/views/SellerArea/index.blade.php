<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Area</title>
  <style>
    body {
      background-color: #fff8f0; /* soft white wine tone */
      font-family: 'Segoe UI', sans-serif;
      text-align: center;
      padding-top: 80px;
    }

    h2 {
      margin-bottom: 40px;
      color: #5c2a3e; /* soft wine tone */
    }

    .button-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 25px;
    }

    .action-button {
      padding: 15px 30px;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      color: white;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .create-btn {
      background-color: #a95c7b; /* rosé tone */
    }

    .create-btn:hover {
      background-color: #8c3f61;
    }

    .edit-btn {
      background-color: #7c9c7c; /* light olive green */
    }

    .edit-btn:hover {
      background-color: #5f7f5f;
    }

    .delete-btn {
      background-color: #b44; /* wine red */
    }

    .delete-btn:hover {
      background-color: #933;
    }

    .logout-btn {
      background-color: #666;
    }

    .logout-btn:hover {
      background-color: #444;
    }

    footer {
      margin-top: 60px;
      color: #5c2a3e;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <h2>Seller Area</h2>

  <div class="button-container">
    <a href="{{ route('seller.creating') }}" class="action-button create-btn">
    Create Sale
    </a>
    <a href="{{ route('order.ongoing', ['id' => $sale->id]) }}" class="action-button edit-btn">
    Edit Sale
    </a>
    <a href="{{ route('sell.excluison', ['id' => $sale->id]) }}" class="action-button edit-btn">
    Dele Sale
    </a>

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
