<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Delete Ask</title>
  <style>
    body { font-family: Arial, sans-serif; background: #fffaf3; padding: 40px; text-align:center; color:#4b2e2e; }
    .list { max-width:700px; margin:0 auto; background:#fff; padding:20px; border-radius:8px; box-shadow:0 0 8px rgba(0,0,0,0.08); }
    .item { display:flex; justify-content:space-between; align-items:center; padding:10px 0; border-bottom:1px solid #eee; }
    .actions { display:flex; gap:8px; }
    .btn { background:#a86c94; color:#fff; border:none; padding:8px 12px; border-radius:6px; cursor:pointer; }
    .btn-danger { background:#b44; }
    .logout { margin-top:20px; background:#c44b4b; width:100%; }
  </style>
</head>
<body>

  <h2>Delete Ask</h2>

  @if(session('success'))
    <div style="background:#d4edda; color:#155724; padding:10px; border-radius:6px; max-width:700px; margin:0 auto 20px;">
      {{ session('success') }}
    </div>
  @endif

  <div class="list">
    @if($sales->isEmpty())
      <p>No asks found.</p>
    @else
      @foreach($sales as $s)
        <div class="item">
          <div>
            <strong>#{{ $s->id }}</strong> — {{ $s->type_bottle ?? 'Unknown' }} &middot; Qty: {{ $s->amount }} &middot; Price: {{ $s->price }}
          </div>

          <div class="actions">
            <a href="{{ route('order.ongoing') }}?id={{ $s->id }}" class="btn">Edit</a>

            <form action="{{ route('deleted', $s->id) }}" method="POST" onsubmit="return confirm('Delete ask #{{ $s->id }}?');" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </div>
        </div>
      @endforeach
    @endif
  </div>

  <div style="max-width:700px; margin:20px auto 0;">
    <form method="POST" action="{{ route('logout') }}">
      @csrf
      <button type="submit" class="btn logout">Logout</button>
    </form>
  </div>

</body>
</html>
