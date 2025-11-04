<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seller Area</title>
  <style>
    body {
      background-color: #f8f4f0;
      font-family: 'Segoe UI', sans-serif;
      color: #3a2e2e;
      padding: 60px;
      text-align: center;
    }

    h2 {
      color: #7b3e57;
      margin-bottom: 40px;
    }

    .button-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 15px;
      margin-bottom: 50px;
    }

    .action-button {
      display: inline-block;
      padding: 12px 20px;
      width: 220px;
      background-color: #a86c94;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .action-button:hover {
      background-color: #8c4f7a;
    }

    .logout-btn {
      background-color: #c44b4b;
    }

    .logout-btn:hover {
      background-color: #a63a3a;
    }

    footer {
      margin-top: 60px;
      color: #7a6464;
      font-size: 14px;
    }
  </style>
</head>
<body>

  <h2>Seller Area</h2>

  <div class="button-container">
    <a href="{{ route('seller.creating') }}" class="action-button">Create Ask</a>
    <a href="{{ route('order.ongoing') }}" class="action-button">Edit Ask</a>
    <a href="{{ route('sell.excluison') }}" class="action-button">Delete Ask</a>
  </div>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="action-button logout-btn">Logout</button>
  </form>

  <footer>
    &copy; {{ date('Y') }} Seller Management — Ask Control System 🍷
  </footer>

</body>
</html>
