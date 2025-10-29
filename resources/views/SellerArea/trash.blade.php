<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Sale</title>
</head>
<body style="font-family: Arial, sans-serif; background: #fffaf3; padding: 40px;">
    <h2>Delete Sale Record</h2>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif


        <p><strong>Sale ID:</strong> {{ $id }}</p>
    @endisset

    <form method="POST" action="{{ route('deleted', ['id' => $id ?? 0]) }}">
        @csrf
        <label for="amount">Amount</label><br>
        <input type="text" name="amount" id="amount" required><br><br>

        <label for="price">Price</label><br>
        <input type="text" name="price" id="price" required><br><br>

        <label for="type_bottle">Bottle Type</label><br>
        <input type="text" name="type_bottle" id="type_bottle" required><br><br>

        <button type="submit" style="background: #b44; color: #fff; border: none; padding: 10px 16px; border-radius: 4px; cursor: pointer;">
            Delete
        </button>
    </form>
</body>
</html>
