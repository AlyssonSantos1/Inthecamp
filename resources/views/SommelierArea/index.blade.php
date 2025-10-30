<!DOCTYPE html>
<html>
<head>
  <title>Sommelier Actions</title>
  <style>
    body {
      background-color: #fdf6f9; /* tom rosé bem claro */
      font-family: 'Segoe UI', sans-serif;
      text-align: center;
      padding-top: 80px;
    }

    h2 {
      margin-bottom: 40px;
      color: #5c2a3e; /* vinho suave */
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

    .create-btn {
      background-color: #a95c7b; /* tom uva rosada */
    }

    .create-btn:hover {
      background-color: #8c3f61;
    }

    .edit-btn {
      background-color: #7c9c7c; 
    }

    .edit-btn:hover {
      background-color: #5f7f5f;
    }
  </style>
</head>
<body>
  <h2>Sommelier Area</h2>

@if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
@endif

<div class="button-container">
  <a href="{{ route('sommelier.create') }}" class="action-button create-btn">
    Create Wine
  </a>

  <a href="{{ url('/newwine/1') }}" class="action-button edit-btn">
    Edit Wine
  </a>
</div>

</body>
</html>
