<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pickleball Inventory') | {{ config('app.name') }}</title>
    <style>
        *{box-sizing:border-box}body{margin:0;font-family:Arial,Helvetica,sans-serif;background:#f3f6fb;color:#172033;line-height:1.5}
        nav{background:#173b73;color:#fff;padding:15px max(5%,calc((100% - 1120px)/2));display:flex;gap:18px;align-items:center;justify-content:space-between;flex-wrap:wrap}
        nav a{color:#fff;text-decoration:none;margin-right:15px}nav a:hover{text-decoration:underline}nav form{display:inline}
        main{max-width:1120px;margin:30px auto;padding:0 18px}.panel{background:#fff;padding:24px;border-radius:12px;box-shadow:0 4px 18px #17203312;margin-bottom:20px;overflow:hidden}
        h1{margin:0 0 8px;color:#173b73;font-size:1.7rem}h2{color:#173b73}label{display:block;font-weight:700;margin:12px 0 6px}
        input,select,textarea{width:100%;padding:11px;border:1px solid #ccd5e2;border-radius:7px;font:inherit;background:#fff}textarea{min-height:100px;resize:vertical}
        button,.btn{display:inline-block;background:#173b73;color:#fff;border:0;border-radius:7px;padding:10px 15px;text-decoration:none;cursor:pointer;font:inherit}button:hover,.btn:hover{filter:brightness(1.08)}.secondary{background:#64748b}.danger{background:#b42318}
        .actions{display:flex;gap:8px;flex-wrap:wrap;align-items:end;margin-top:16px}.topline{display:flex;justify-content:space-between;gap:12px;align-items:center;flex-wrap:wrap}
        .filters{display:grid;grid-template-columns:1fr 1fr auto;gap:12px;align-items:end;margin:20px 0}.filters .actions{margin:0}
        .table-wrap{width:100%;overflow-x:auto}table{width:100%;border-collapse:collapse;background:#fff;min-width:620px}th,td{padding:12px;border-bottom:1px solid #e5eaf1;text-align:left}th{background:#edf2f8;color:#26364d}
        .alert{padding:12px;background:#e8f7ed;color:#176334;border-radius:7px;margin-bottom:16px}.error{color:#b42318;font-size:.9em}.muted{color:#64748b}.nowrap{white-space:nowrap}
        .status{display:inline-block;padding:4px 9px;border-radius:20px;font-size:.85rem}.status.available{background:#e8f7ed;color:#176334}.status.unavailable{background:#fff0ed;color:#a12b1c}
        .pagination{margin-top:18px}.pagination nav{background:transparent;color:#172033;padding:0;justify-content:flex-start}.pagination a,.pagination span{display:inline-block;padding:6px 10px;margin:2px;border:1px solid #d7dfeb;border-radius:6px;color:#173b73;text-decoration:none}
        @media(max-width:700px){nav{align-items:flex-start;flex-direction:column}nav>div:last-child{display:flex;align-items:center;flex-wrap:wrap;gap:8px}.filters{grid-template-columns:1fr}.panel{padding:18px}main{margin:18px auto}}
    </style>
</head>
<body>
<nav>
    <div><strong>Pickleball Inventory</strong></div>
    <div><a href="{{ route('equipment.index') }}">Equipment</a><a href="{{ route('reports.index') }}">Reports</a>
        <form method="POST" action="{{ route('logout') }}">@csrf<button class="secondary" type="submit">Logout</button></form>
    </div>
</nav>
<main>
    @if(session('success'))<div class="alert">{{ session('success') }}</div>@endif
    @if($errors->any())<div class="panel"><strong>Please correct the following:</strong><ul>@foreach($errors->all() as $error)<li class="error">{{ $error }}</li>@endforeach</ul></div>@endif
    @yield('content')
</main>
</body>
</html>
