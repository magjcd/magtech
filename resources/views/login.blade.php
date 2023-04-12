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
  <h2>Login form</h2>
  <form action="{{ route('login') }}" method="POST">
    @csrf

    <div>
        <p>
            @if(session()->has('message'))
            {{ session('message') }}
            @endif
        </p>
    </div>
      
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" name="email">
      <span> @error('email') {{ $message }} @enderror </span>
    </div>

    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="password" name = "password" placeholder="Enter password" name="pswd">
      <span> @error('password') {{ $message }} @enderror </span>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>
