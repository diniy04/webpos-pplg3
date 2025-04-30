<?php
function insert($data)
{
  global $koneksi;

  $username = strtolower(mysqli_real_escape_string($koneksi, $data['username']));
  $fullname = mysqli_real_escape_string($koneksi, $data['fullname']);
  $password = mysqli_real_escape_string($koneksi, $data['password']);
  $password2 = mysqli_real_escape_string($koneksi, $data['password2']);
  $level = mysqli_real_escape_string($koneksi, $data['level']);
  $address = mysqli_real_escape_string($koneksi, $data['address']);
  $gambar = mysqli_real_escape_string($koneksi, $_FILES['image']['name']);

  // validasi konfirmasi password
  if ($password !== $password2) {
    echo '<script>alert("Konfirmasi Password tidak sama");</script>';
    return false;
  }
  $pass = password_hash($password, PASSWORD_DEFAULT);

  // validasi username
  $cekUsername = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");
  if (mysqli_num_rows($cekUsername) > 0) {
    echo '<script>alert("Username sudah terpakai");</script>';
    return false;
  }

  if ($gambar != null) {
    $gambar = uploadImg();
  } else {
    $gambar = 'default.jpg';
  }

  if ($gambar == '') {
    return false;
  }
  $sqlUser = "INSERT INTO user VALUE (null, '$username', '$pass', '$fullname', '$address', '$level', '$gambar')";
  mysqli_query($koneksi, $sqlUser);
  return mysqli_affected_rows($koneksi);
}
