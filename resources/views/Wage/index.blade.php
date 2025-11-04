<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inventory Area</title>
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
      margin-bottom: 30px;
    }

    .button-container {
      margin-bottom: 40px;
    }

    .action-button {
      display: inline-block;
      padding: 12px 22px;
      margin: 8px;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      color: #fff;
      font-weight: bold;
      transition: background-color 0.3s ease;
    }

    .create-btn {
      background-color: #6b4f84;
    }

    .edit-btn {
      background-color: #a85d7b;
    }

    .delete-btn {
      background-color: #c44b4b;
    }

    .action-button:hover {
      filter: brightness(1.1);
    }

    .logout-btn {
      background-color: #555;
      color: #fff;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
    }

    .logout-btn:hover {
      background-color: #333;
    }

    footer {
      margin-top: 50px;
      font-size: 14px;
      color: #7a6464;
    }
  </style>
</head>
<body>

  <h2>Inventory Area</h2>

  <div class="button-container">
   
    <a href="{{ url('/newstock') }}" class="action-button create-btn">Add New Stock</a>

    <a href="{{ url('/changing') }}" class="action-button edit-btn">Edit Stock</a>
  
    <a href="{{ url('/exclusion') }}" class="action-button delete-btn">Delete Stock</a>
  </div>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="logout-btn">Logout</button>
  </form>

  <footer>
    &copy; {{ date('Y') }} Inventory Management — White Wine Edition 🍷
  </footer>

</body>
</html>
