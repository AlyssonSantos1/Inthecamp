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
    <h2>Delete Wine Record</h2>
    <form method="POST" action="/delete-wine">
      <!-- You may need to include a hidden ID field to identify the record -->
      <div class="form-group">
        <label for="supply">Supply</label>
        <input type="text" id="supply" name="supply" required>
      </div>

      <div class="form-group">
        <label for="bottle">Bottle Label</label>
        <input type="text" id="bottle" name="bottle" required>
      </div>

      <div class="form-group">
        <label for="age">Age</label>
        <input type="text" id="age" name="age" required>
      </div>

      <div class="form-group">
        <label for="price">Price</label>
        <input type="number" id="price" name="price" required>
      </div>

      <div class="form-group">
        <label for="temperature">Temperature</label>
        <input type="text" id="temperature" name="temperature" required>
      </div>

      <div class="form-group">
        <label for="wine_type">Wine Type</label>
        <select id="wine_type" name="wine_type" required>
          <option value="">Select</option>
          <option value="red">Red</option>
          <option value="white">White</option>
          <option value="rose">Rosé</option>
          <option value="sparkling">Sparkling</option>
        </select>
      </div>

      <button type="submit">Delete</button>
    </form>
  </div>
</body>
