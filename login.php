<?php
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
$nama = "";

// menyeleksi data user dengan username dan password yang sesuai
if ($level == "guru") {
  $result = mysqli_query($koneksi,"SELECT * FROM guru where id_guru='$username' and password='$password'");
  while($row = mysqli_fetch_array($result))
          {
              $nama=$row['nama_guru'];
          }
}
else {
  $result = mysqli_query($koneksi,"SELECT * FROM siswa where id_siswa='$username' and password='$password'");
  while($row = mysqli_fetch_array($result))
          {
              $nama=$row['nama_siswa'];
          }
}

$cek = mysqli_num_rows($result);

if($cek > 0) {
	$data = mysqli_fetch_assoc($result);
	//menyimpan session user, nama, status
	$_SESSION['username'] = $username;
	$_SESSION['nama'] = $nama;
	$_SESSION['status'] = TRUE;
  if ($level == "guru") {
    header("location:home_guru.php");
  }
  else {
    header("location:home_siswa.php");
  }
} else {
	header("location:index.php?pesan=gagal");
}
?>
