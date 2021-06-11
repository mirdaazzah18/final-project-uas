<?php
session_start();
 include ('koneksi.php');
 require_once("dompdf/autoload.inc.php");
 use Dompdf\Dompdf;
 $dompdf = new Dompdf();
 $username  = $_SESSION['username'];
 $nama = $_SESSION['nama'];

 $search = mysqli_query($koneksi,"SELECT * FROM guru where id_guru='$username'");
    while($row = mysqli_fetch_array($search))
        {
            $kelas=$row['wali_kelas'];
        }

    $html='<<html>
    <head>
    <style>
      table, td, th {
      border: 1px solid black;
      }

      table {
      border-collapse: collapse;
      }
      th, td {
        text-align: center;
        padding-top: 10px;
        padding-right: 10px;
        padding-bottom: 10px;
        padding-left: 10px;
    </style>
    </head>
    <center><h2>Daftar Nilai Siswa</h2></center><h4>
    Kelas : '.$kelas.' <br>
    Semester : 2 </h4>
    <center>
    <table border="1">
      <tr>
        <th>No. Absen</th>
        <th>Nama</th>
        <th>Pendidikan Agama</th>
        <th>PPKN</th>
        <th>Bahasa Indonesia</th>
        <th>Matematika</th>
        <th>IPA</th>
        <th>IPS</th>
        <th>Bahasa Inggris</th>
        <th>Bahasa Arab</th>
        <th>Seni Budaya</th>
        <th>Pendidikan Jasmani</th>
      </tr>';
      $siswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE kelas_siswa ='$kelas'"); //deklarasi variabel query
      $no=1;
      // program utk menampilkan data yang didapat sebagai tabel
      foreach ($siswa as $row) {
        $nama_siswa=$row['nama_siswa'];
        $id_siswa=$row['id_siswa'];
        $cari_nilai = mysqli_query($koneksi, "SELECT * FROM nilai_semester2 WHERE id_siswa ='$id_siswa'");
        while($row = mysqli_fetch_array($cari_nilai))
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
                $html.='<tr>
                <td>'.$no.'</td>
                <td>'.$nama_siswa.'</td>
                <td>'.$nilai_agama.'</td>
                <td>'.$nilai_ppkn.'</td>
                <td>'.$nilai_b_indo.'</td>
                <td>'.$nilai_matematika.'</td>
                <td>'.$nilai_ipa.'</td>
                <td>'.$nilai_ips.'</td>
                <td>'.$nilai_b_ing.'</td>
                <td>'.$nilai_b_arab.'</td>
                <td>'.$nilai_senbud.'</td>
                <td>'.$nilai_penjas.'</td>
                </tr>';
                $no++;
              }

 $html.="</table></center></html>";
 $dompdf->loadHtml($html);
 $dompdf->setPaper('A4','landscape');
 $dompdf->render();
 $dompdf->stream('daftar_nilai_siswa_semester2.pdf');
?>
