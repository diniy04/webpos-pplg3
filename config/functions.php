<?php
function getData($sql)
{
  global $koneksi;

  $result = mysqli_query($koneksi, $sql);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function uploadImg()
{
  $namafile = $_FILES['image']['name'];
  $ukuran = $_FILES['image']['size'];
  $tmp = $_FILES['image']['tmp_name'];

  // validasi file gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif'];
  $ekstensiGambar = explode('.', $namafile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo '<script>alert("File yang anda upload bukan gambar, data gagal di simpan");</script>';
    return false;
  }

  //validasi ukuran gambar
  if ($ukuran > 1000000) {
    echo '<script>alert("Ukuran gambar melebihi 1 MB, data gagal di simpan");</script>';
    return false;
  }

  $namaFileBaru = rand(10, 1000) . '-' . $namafile;
  move_uploaded_file($tmp, '../assets/image/' . $namaFileBaru);
  return $namaFileBaru;
}
