<!DOCTYPE html>
<html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Administrator Login</title>
<style>
body{font-family:Arial;background:#edf2f8;display:grid;place-items:center;min-height:100vh;margin:0}
.card{background:white;padding:32px;border-radius:14px;width:min(420px,92vw);box-shadow:0 8px 30px #1232}
input{width:100%;padding:12px;margin:8px 0 16px;box-sizing:border-box;border:1px solid #ccd5e2;border-radius:7px}
button{width:100%;padding:12px;background:#173b73;color:white;border:0;border-radius:7px}
.error{color:#b42318}
</style></head><body><div class="card">
<h2>Pickleball Inventory</h2><p>Administrator Login</p>
@if($errors->any())<p class="error">{{ $errors->first() }}</p>@endif
<form method="POST" action="{{ route('login.store') }}">@csrf
<label>Email or Username</label><input name="login" value="{{ old('login') }}" required autofocus>
<label>Password</label><input type="password" name="password" required>
<label><input type="checkbox" name="remember" value="1" style="width:auto"> Remember me</label>
<button type="submit">Login</button></form></div></body></html>
