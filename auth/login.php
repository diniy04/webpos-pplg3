<?php
require '../config/config.php';

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = mysqli_real_escape_string($koneksi, $_POST['password']);

  $queryLogin = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

  if (mysqli_num_rows($queryLogin) === 1) {
    $row = mysqli_fetch_assoc($queryLogin);
    if (password_verify($password, $row['password'])) {
      header("location: ../dashboard.php");
      exit();
    } else {
      echo "<script>alert('Password Salah Deh...');</script>";
    }
  } else {
    echo "<script>alert('Username Salah Deh...');</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Market PPLG3</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= $main_url ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= $main_url ?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= $main_url ?>/assets/dist/css/adminlte.min.css">
  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= $main_url ?>/assets/image/cart.png" type="image/x-icon">
  <link rel="stylesheet" href="style.css">
</head>

<body class="hold-transition login-page" id="bg-login">
  <div class="login-box slide-down" style="margin-top: -70px;">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>Market</b>PPLG3</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="" method="post">
          <div class="input-group mb-3">
            <input type="text" name="username" class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <!-- /.col -->
          <div class="mb-4">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </form>

        <p class="my-3 text-center">
          <strong>Copyright &copy; 2024 <span class="text-info">Tata Supriatna</span></strong>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="<?= $main_url ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= $main_url ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= $main_url ?>/assets/dist/js/adminlte.min.js"></script>
</body>

</html>