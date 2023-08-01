<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="icon" href="img/logo.jpg" type="image/jpg" />
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="style/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="style/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="style/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <div class="row">
        <div class="col-md-2">
          <img src="img/logo.jpg" alt="logo" height="70" style="margin-left: auto; margin-right: auto; display: block;">
        </div>
        <div class="col-md-10">
          <p style="text-align: left; margin-top: 15px; padding-left: 20px;">Sistem Informasi Pengelolaan Nilai<br>SMKN 1 Toraja Utara</p>
        </div>
      </div>
    </div>
    <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
        <p>Email atau Password Salah!</p>
      </div>
      @endif
      <form action="{{ route('login') }}" method="post">
        @csrf
        <div class="form-group mb-3">
          <label>Email</label>
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        </div>
        <div class="form-group mb-3">
          <label>Password</label>
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        </div>
        <div class="float-right">
          <button type="submit" class="btn btn-primary btn-block" style="width: 100px;">Login</button>
        </div>
        <!-- /.col -->
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="style/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="style/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="style/dist/js/adminlte.min.js"></script>
</body>
</html>