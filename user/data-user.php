<?php
require '../config/config.php';
require '../config/functions.php';
$title = "Market PPLG 3 | Data User";
require '../template/header.php';
require '../template/navbar.php';
require '../template/sidebar.php';
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
            <li class="breadcrumb-item active">Users</li>
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
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-list fa-sm"></i> Data User</h3>
          <div class="card-tools">
            <a href="<?= $main_url; ?>user/add-user.php" class="btn btn-primary btn-sm"><i class="fas fa-plus fa-sm"></i> Add User</a>
          </div>
        </div>
        <div class="card-body table-responsive p-3">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>Alamat</th>
                <th>Level</th>
                <th style="width: 10%;">Operasi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $user = getData("SELECT * FROM user");
              foreach ($user as $u) :
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><img src="../assets/image/<?= $u['foto']; ?>" class="rounded-circle" width="60px"></td>
                  <td><?= $u['username']; ?></td>
                  <td><?= $u['fullname']; ?></td>
                  <td><?= $u['address']; ?></td>
                  <td><?= $u['level']; ?></td>
                  <td>
                    <a href="edit-user.php?id=<?= $u['userid']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    <a href="delete-user.php?id=<?= $u['userid']; ?>&foto=<?= $u['foto']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus user ini?')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</div>

<?php require "../template/footer.php"; ?>