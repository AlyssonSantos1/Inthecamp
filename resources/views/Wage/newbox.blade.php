<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Wine Registration</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .form-container {
      background-color: #fff;
      padding: 25px;
      border-radius: 8px;
      max-width: 500px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .form-group {
      margin-bottom: 15px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input, select {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 15px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Wine Registration</h2>
    <form>
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

      <button type="submit">Submit</button>
    </form>
  </div>
</body>

</html>
