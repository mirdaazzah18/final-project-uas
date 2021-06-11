<?php
session_start();
if(!isset($_SESSION['status']))
{
    header('location:index.php');
}
// menghubungkan dengan koneksi
include 'koneksi.php';

$username  = $_SESSION['username'];
$nama = $_SESSION['nama'];

$search = mysqli_query($koneksi,"SELECT * FROM siswa where id_siswa='$username'");
while($row = mysqli_fetch_array($search))
				{
						$kelas=$row['kelas_siswa'];
				}
$siswa = mysqli_query($koneksi, "SELECT * FROM nilai_semester2 WHERE id_siswa ='$username'");
while($row = mysqli_fetch_array($siswa))
				{
						$nilai_agama=$row['agama'];
            $nilai_ppkn=$row['ppkn'];
            $nilai_b_indo=$row['b_indo'];
            $nilai_matematika=$row['matematika'];
            $nilai_ipa=$row['ipa'];
            $nilai_ips=$row['ips'];
            $nilai_b_ing=$row['b_ing'];
            $nilai_b_arab=$row['b_arab'];
            $nilai_senbud=$row['senbud'];
            $nilai_penjas=$row['penjas'];
				}

///mengeksekusi library dompdf
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
//membuat konstruktor
$dompdf = new Dompdf();
//membuat script HTML
$html='<html>
<head>
<style>
  table, td, th {
  border: 1px solid black;
  text-align: left;
  }

  table {
  border-collapse: collapse;

  }
  th, td {
    text-align: center;
    padding-top: 10px;
    padding-right: 5px;
    padding-bottom: 10px;
    padding-left: 5px;
</style>
</head>
<center><h2>Laporan Hasil Belajar Siswa</h2></center><br>
Nama Peserta Didik : '.$nama.' <br>
ID Siswa : '.$username.' <br>
Kelas : '.$kelas.' <br>
Semester : 2 <br>
<br>
<center><table border="1" style="width:50%">
<tr>
<th>No</th>
<th>Mata Pelajaran</th>
<th>KKM</th>
<th>Nilai</th>
</tr>
<tr>
<td>1.</td>
<td>Pendidikan Agama</td>
<td>75</td>
<td>'.$nilai_agama.'</td>
</tr>
<tr>
<td>2.</td>
<td>PPKN</td>
<td>75</td>
<td>'.$nilai_ppkn.'</td>
</tr>
<tr>
<td>3.</td>
<td>Bahasa Indonesia</td>
<td>75</td>
<td>'.$nilai_b_indo.'</td>
</tr>
<tr>
<td>4.</td>
<td>Matematika</td>
<td>75</td>
<td>'.$nilai_matematika.'</td>
</tr>
<tr>
<td>5.</td>
<td>IPA</td>
<td>75</td>
<td>'.$nilai_ipa.'</td>
</tr>
<tr>
<td>6.</td>
<td>IPS</td>
<td>75</td>
<td>'.$nilai_ips.'</td>
</tr>
<tr>
<td>7.</td>
<td>Bahasa Inggris</td>
<td>75</td>
<td>'.$nilai_b_ing.'</td>
</tr>
<tr>
<td>8.</td>
<td>Bahasa Arab</td>
<td>75</td>
<td>'.$nilai_b_arab.'</td>
</tr>
<tr>
<td>9.</td>
<td>Seni Budaya</td>
<td>75</td>
<td>'.$nilai_senbud.'</td>
</tr>
<tr>
<td>10.</td>
<td>Pendidikan Jasmani</td>
<td>75</td>
<td>'.$nilai_penjas.'</td>
</tr>
</table></center></html>';
$dompdf->loadHtml($html);
//setting ukuran dan orientasi kertas
$dompdf->setPaper('A4','portrait');
//rendering dari HTML ke PDF
$dompdf->render();
//melakukan output ke file PDF
$dompdf->stream('laporan_hasil_belajar_siswa_semester_2.pdf');
?>
