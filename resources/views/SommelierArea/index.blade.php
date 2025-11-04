<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sommelier Area</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
      text-align: center;
      margin-top: 60px;
    }
    .action-button {
      display: inline-block;
      padding: 12px 24px;
      margin: 10px;
      border-radius: 8px;
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      transition: 0.2s;
    }
    .action-button:hover {
      opacity: 0.9;
    }
    .create-btn {
      background-color: #28a745;
    }
    .edit-btn {
      background-color: #007bff;
    }
    .alert-success {
      color: #155724;
      background-color: #d4edda;
      border: 1px solid #c3e6cb;
      padding: 10px;
      margin-bottom: 20px;
      width: 300px;
      margin-left: auto;
      margin-right: auto;
      border-radius: 6px;
    }
  </style>
</head>
<body>
  <h2>Sommelier Area</h2>

  @if(session('success'))
    <div class="alert-success">
      {{ session('success') }}
    </div>
  @endif

  <div class="button-container">
    <a href="{{ route('sommelier.create') }}" class="action-button create-btn">
      Create Wine
    </a>

    <a href="{{ route('wine.edit') }}" class="action-button edit-btn">
      Edit Wine
    </a>
  </div>
</body>
</html>
