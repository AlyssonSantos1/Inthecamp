<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Sale</title>
  <style>
    body {
      background-color: #f9f4f6;
      font-family: 'Segoe UI', sans-serif;
      padding: 60px;
      color: #4b2e2e;
    }

    h2 {
      text-align: center;
      margin-bottom: 40px;
      color: #7b3e57;
    }

    .form-container {
      max-width: 500px;
      margin: 0 auto;
      background-color: #fff7fb;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(120, 60, 80, 0.1);
    }

    .form-group {
      margin-bottom: 20px;
      text-align: left;
    }

    label {
      display: block;
      margin-bottom: 8px;
      font-weight: bold;
      color: #5a2d3c;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #d8cfcf;
      border-radius: 6px;
      background-color: #fefefe;
    }

    .submit-btn {
      display: block;
      width: 100%;
      padding: 12px;
      background-color: #a86c94;
      color: white;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .submit-btn:hover {
      background-color: #8c4f7a;
    }

    .logout-btn {
      margin-top: 30px;
      display: block;
      width: 100%;
      background-color: #c44b4b;
      border: none;
      border-radius: 6px;
      color: white;
      padding: 12px;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .logout-btn:hover {
      background-color: #a63a3a;
    }

    .message {
      background-color: #ffe8ee;
      color: #8c3a4a;
      padding: 10px;
      border-radius: 6px;
      margin-bottom: 20px;
      text-align: left;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Register Sale</h2>

    @if ($errors->any())
      <div class="message">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('sell.create') }}">
      @csrf

      <div class="form-group">
        <label for="amount">Quantity</label>
        <input type="text" id="amount" name="amount" placeholder="Ex: 12" required>
      </div>

      <div class="form-group">
        <label for="price">Price</label>
        <input type="text" id="price" name="price" placeholder="Ex: 150.00" required>
      </div>

      <div class="form-group">
        <label for="type_bottle">Bottle Type</label>
        <input type="text" id="type_bottle" name="type_bottle" placeholder="Ex: White Wine" required>
      </div>

      <button type="submit" class="submit-btn">Save Sale</button>
    </form>

    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="logout-btn">Logout</button>
    </form>
  </div>

</body>
</html>
