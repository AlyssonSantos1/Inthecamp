<!DOCTYPE html>
<html>
<head>
  <title>Wage Actions</title>
  <style>
    body {
      background-color: #f4f4f4;
      font-family: Arial, sans-serif;
      text-align: center;
      padding-top: 80px;
    }

    h2 {
      margin-bottom: 40px;
      color: #333;
    }

    .button-container {
      display: flex;
      justify-content: center;
      gap: 30px;
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

    .feature-btn {
      background-color: #007BFF;
    }

    .feature-btn:hover {
      background-color: #0056b3;
    }

    .newbox-btn {
      background-color: #28a745;
    }

    .newbox-btn:hover {
      background-color: #218838;
    }

    .refuse-btn {
      background-color: #dc3545;
    }

    .refuse-btn:hover {
      background-color: #c82333;
    }
  </style>
</head>
<body>
  <h2>Select an Action</h2>

  <div class="button-container">
    <a href="/wage/feature" class="action-button feature-btn">Feature</a>
    <a href="/wage/newbox" class="action-button newbox-btn">New Box</a>
    <a href="/wage/refuse" class="action-button refuse-btn">Refuse</a>
  </div>
</body>
</html>
