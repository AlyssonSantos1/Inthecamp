<head>
  <style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }

    .form-container {
      width: 400px;
      margin: 40px auto;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      color: #333333;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
      color: #444444;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      background-color: #fff8cc;
      border: 1px solid #cccccc;
      border-radius: 4px;
    }

    select {
      width: 100%;
      padding: 10px;
      background-color: #e0f0ff;
      border: 1px solid #cccccc;
      border-radius: 4px;
    }

    button {
      width: 100%;
      padding: 12px;
      background-color: #d9534f; /* red for delete */
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }

    button:hover {
      background-color: #c9302c;
    }
  </style>
</head>

<body>
  <div class="form-container">
    <h2>Edit Wine Record</h2>
    <form method="POST" action="/delete-wine">
      <!-- Hidden ID field -->
      <input type="hidden" name="id" value="{{ $ware->id ?? '' }}">

      <div class="form-group">
        <label for="supply">Supply</label>
        <input type="text" id="supply" name="supply" value="{{ $ware->supply ?? '' }}" required>
      </div>

      <div class="form-group">
        <label for="bottle">Bottle Label</label>
        <input type="text" id="bottle" name="bottle" value="{{ $ware->bottle ?? '' }}" required>
      </div>

      <div class="form-group">
        <label for="age">Age</label>
        <input type="text" id="age" name="age" value="{{ $ware->age ?? '' }}" required>
      </div>

      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" value="{{ $ware->price ?? '' }}" required>
      </div>

      <div class="form-group">
        <label for="temperature">Temperature</label>
        <input type="text" id="temperature" name="temperature" value="{{ $ware->temperature ?? '' }}" required>
      </div>

      <div class="form-group">
        <label for="wine_type">Wine Type</label>
        <select id="wine_type" name="wine_type" required>
          <option value="">Select</option>
          <option value="red" {{ (isset($ware) && $ware->wine_type == 'red') ? 'selected' : '' }}>Red</option>
          <option value="white" {{ (isset($ware) && $ware->wine_type == 'white') ? 'selected' : '' }}>White</option>
          <option value="rose" {{ (isset($ware) && $ware->wine_type == 'rose') ? 'selected' : '' }}>Rosé</option>
          <option value="sparkling" {{ (isset($ware) && $ware->wine_type == 'sparkling') ? 'selected' : '' }}>Sparkling</option>
        </select>
      </div>

      <button type="submit">Delete</button>
    </form>
  </div>
</body>
