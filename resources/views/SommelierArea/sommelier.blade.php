<!DOCTYPE html>
<html>
<head>
  <title>Create Wine</title>
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
  </style>
</head>
<body>
  <h2>Create New Wine</h2>

  <div class="form-container">
   <form method="POST" action="{{ route('wine.newest') }}">

      @csrf

      <div class="form-group">
        <label for="type_grape">Grape Type</label>
        <input type="text" id="type_grape" name="type_grape" required>
      </div>

      <div class="form-group">
        <label for="temperature">Serving Temperature</label>
        <input type="text" id="temperature" name="temperature" required>
      </div>

      <button type="submit" class="submit-btn">Save Wine</button>
    </form>
  </div>
</body>
</html>
