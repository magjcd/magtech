<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Registeration form</h2>
  <form action="{{ route('register') }}" method="POST">
    @csrf

    <div class="text-center">
        
            @if(session()->has('message'))
            <span>{{ session('message') }}</span>
            @endif
        </p>
    </div>
    <div class="form-group">
        <label for="name">Full Name:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" name="email">
        <span> @error('name') {{ $message }} @enderror </span>
    </div>
      
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" name="email">
      <span> @error('email') {{ $message }} @enderror </span>
    </div>

    <div class="form-group">
        <label for="roles">Roles:</label>
        <select class="form-control" id="roles" name="roles">
            <option value="">Select a Role</option>
            <option disabled>--------------------------</option>
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <span> @error('roles') {{ $message }} @enderror </span>
      </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" name = "password" placeholder="Enter password" name="pswd">
      <span> @error('password') {{ $message }} @enderror </span>
    </div>

    <div class="form-group">
        <label for="pwd">Repeat Password:</label>
        <input type="password" class="form-control" id="password" name="password_confirmation" placeholder="Enter password" name="pswd">
        <span> @error('password_confirmation') {{ $message }} @enderror </span>
    </div>

    {{-- <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div> --}}

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
