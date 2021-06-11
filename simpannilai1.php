<?php
include 'tambahdata1.php';

$agama = $_POST['agama'];
$ppkn = $_POST['ppkn'];
$b_indo = $_POST['b_indo'];
$matematika = $_POST['matematika'];
$ipa = $_POST['ipa'];
$ips = $_POST['ips'];
$b_ing = $_POST['b_ing'];
$b_arab = $_POST['b_arab'];
$senbud = $_POST['senbud'];
$penjas = $_POST['penjas'];

$number=0;
foreach ($siswa as $row) {
  $inp_id_siswa=$id_siswa[$number];
  $inp_agama=$agama[$number];
  $inp_ppkn=$ppkn[$number];
  $inp_matematika=$matematika[$number];
  $inp_b_indo=$b_indo[$number];
  $inp_ipa=$ipa[$number];
  $inp_ips=$ips[$number];
  $inp_b_ing=$b_ing[$number];
  $inp_b_arab=$b_arab[$number];
  $inp_senbud=$senbud[$number];
  $inp_penjas=$penjas[$number];
  // print_r($inp_id_siswa); echo "<br>";
  // print_r($inp_agama); echo "<br>";
  // print_r($inp_ppkn); echo "<br>";
  // print_r($inp_matematika); echo "<br>";
  // print_r($inp_b_indo); echo "<br>";
  // print_r($inp_ipa); echo "<br>";
  // print_r($inp_ips); echo "<br>";
  // print_r($inp_b_ing); echo "<br>";
  // print_r($inp_senbud); echo "<br>";
  // print_r($inp_penjas); echo "<br>";
  //query SQL utk insert into
  $query = "UPDATE nilai_semester2 SET agama='$inp_agama', ppkn='$inp_ppkn',  b_indo='$inp_b_indo', matematika='$inp_matematika', ipa='$inp_ipa', ips='$inp_ips', b_ing='$inp_b_ing', b_arab='$inp_b_arab', senbud='$inp_senbud', penjas='$inp_penjas' WHERE id_siswa='$inp_id_siswa'";
  mysqli_query($koneksi, $query);
  $number++;
}

echo "<script type='text/javascript'>alert('Input Berhasil');</script>";
//mengalihkan ke halaman tampilkontak.php
header("location:home_guru.php");
 ?>
