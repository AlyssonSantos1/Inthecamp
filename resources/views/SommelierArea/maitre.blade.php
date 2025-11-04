<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Wine</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f8f8;
      text-align: center;
      margin-top: 40px;
    }

    .form-container {
      background-color: #fff;
      width: 400px;
      margin: 0 auto;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .form-group {
      margin-bottom: 15px;
      text-align: left;
    }

    label {
      font-weight: bold;
    }

    select, input {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
    }

    .submit-btn {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 6px;
      cursor: pointer;
      margin-top: 10px;
    }

    .submit-btn:hover {
      opacity: 0.9;
    }

    .logout-btn {
      display: inline-block;
      background-color: #dc3545;
      color: #fff;
      padding: 10px 20px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      margin-top: 25px;
    }

    .logout-btn:hover {
      background-color: #c82333;
    }

    .alert-success {
      color: #155724;
      background-color: #d4edda;
      border: 1px solid #c3e6cb;
      padding: 10px;
      width: 300px;
      margin: 10px auto;
      border-radius: 6px;
    }
  </style>
</head>
<body>
  @if(session('success'))
    <div class="alert-success">
        {{ session('success') }}
    </div>
  @endif

  <h2>Edit Wine</h2>

  <div class="form-container">
    <form id="editForm" method="POST" action="">
      @csrf
      <!-- A action será definida via JS conforme o vinho selecionado -->

      <div class="form-group">
        <label for="wine_id">Select Wine</label>
        <select id="wine_id" name="wine_id" required>
          <option value="">Select a Wine</option>
          @foreach($wine as $w)
            <option value="{{ $w->id }}"
              data-type_grape="{{ $w->type_grape }}"
              data-temperature="{{ $w->temperature }}">
              {{ $w->type_grape }} ({{ $w->temperature }})
            </option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="type_grape">Grape Type</label>
        <input type="text" id="type_grape" name="type_grape" required>
      </div>

      <div class="form-group">
        <label for="temperature">Serving Temperature</label>
        <input type="text" id="temperature" name="temperature" required>
      </div>

      <button type="submit" class="submit-btn">Update Wine</button>
    </form>
  </div>

  <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="logout-btn">Logout</button>
  </form>

  <script>
    const selectWine = document.getElementById('wine_id');
    const typeInput = document.getElementById('type_grape');
    const tempInput = document.getElementById('temperature');
    const form = document.getElementById('editForm');

    selectWine.addEventListener('change', function() {
      const selectedOption = this.options[this.selectedIndex];

      if (this.value) {
        typeInput.value = selectedOption.getAttribute('data-type_grape');
        tempInput.value = selectedOption.getAttribute('data-temperature');
        
        form.action = `/changinge/${this.value}`;
      } else {
        typeInput.value = '';
        tempInput.value = '';
        form.action = '';
      }
    });
  </script>
</body>
</html>
