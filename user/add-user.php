<?php
require '../config/config.php';
require '../config/functions.php';
require '../models/userModel.php';
$title = "Market PPLG 3 | Add User";
require '../template/header.php';
require '../template/navbar.php';
require '../template/sidebar.php';

if (isset($_POST['simpan'])) {
  if (insert($_POST) > 0) {
    echo '<script>alert("User berhasil di registrasi");</script>';
  }
}
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Users</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= $main_url; ?>dashboard.php">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= $main_url; ?>user/data-user.php">Users</a></li>
            <li class="breadcrumb-item active">Add User</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <form action="" method="post" enctype="multipart/form-data">
          <div class="card-header">
            <h3 class="card-title"><i class="fas fa-plus fa-sm"></i> Add User</h3>
            <button class="btn btn-primary btn-sm float-right" type="submit" name="simpan"><i class="fas fa-save fa-sm"></i> Simpan</button>
            <button class="btn btn-danger btn-sm float-right mr-1" type="reset"><i class="fas fa-times fa-sm"></i> Reset</button>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-8 mb-3">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Masukan Username" required>
                </div>
                <div class="form-group">
                  <label for="fullname">Fullname</label>
                  <input type="text" name="fullname" class="form-control" placeholder="Masukan Nama Lengkap" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Masukan Password" required>
                </div>
                <div class="form-group">
                  <label for="password2">Konfirmasi Password</label>
                  <input type="password" name="password2" class="form-control" placeholder="Masukan Kembali Password" required>
                </div>
                <div class="form-group">
                  <label for="level">Level</label>
                  <select name="level" class="form-control" required>
                    <option value="">-- Level --</option>
                    <option value="1">Administrator</option>
                    <option value="2">Manager</option>
                    <option value="3">Kasir</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="address">Alamat</label>
                  <textarea name="address" class="form-control" rows="3" cols="" required></textarea>
                </div>
              </div>
              <div class="col-lg-4 text-center">
                <img src="<?= $main_url; ?>assets/image/default.jpg" class="profile-user-img img-circle mb-3" alt="">
                <input type="file" name="image" class="form-control">
                <span class="text-sm">Type File JPG | PNG | JPEG | GIF</span><br>
                <span class="text-sm">Width = Height</span>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>

<?php require '../template/footer.php'; ?>