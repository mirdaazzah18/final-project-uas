<?php
session_start();
include ('koneksi.php');
if(!isset($_SESSION['status']))
{
    header('location:index.php');
}
$username  = $_SESSION['username'];
$nama = $_SESSION['nama'];


$search = mysqli_query($koneksi,"SELECT * FROM guru where id_guru='$username'");
  while($row = mysqli_fetch_array($search))
      {
          $kelas=$row['wali_kelas'];
      }

      //memanggil library
      require 'vendor/autoload.php';
      use PhpOffice\PhpSpreadsheet\Spreadsheet;
      use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

      //menuliskan nama kolom pada excel
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();
      $sheet->setCellValue('A1', 'No. Absen');
      $sheet->setCellValue('B1', 'Nama');
      $sheet->setCellValue('C1', 'Pendidikan Agama');
      $sheet->setCellValue('D1', 'PPKN');
      $sheet->setCellValue('E1', 'Bahasa Indonesia');
      $sheet->setCellValue('F1', 'Matematika');
      $sheet->setCellValue('G1', 'IPA');
      $sheet->setCellValue('H1', 'IPS');
      $sheet->setCellValue('I1', 'Bahasa Inggris');
      $sheet->setCellValue('J1', 'Bahasa Arab');
      $sheet->setCellValue('K1', 'Seni Budaya');
      $sheet->setCellValue('L1', 'Pendidikan Jasmani');

  				$siswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE kelas_siswa ='$kelas'"); //deklarasi variabel query
  				$no=1;
          $i = 2;
  				// program utk menampilkan data yang didapat sebagai tabel
  				foreach ($siswa as $row) {
            $id_siswa=$row['id_siswa'];
            $nama_siswa=$row['nama_siswa'];
            $cari_nilai = mysqli_query($koneksi, "SELECT * FROM nilai_semester2 WHERE id_siswa ='$id_siswa'");
            while($row = mysqli_fetch_array($cari_nilai))
    								{
                      $sheet->setCellValue('A'.$i, $no);
                      $sheet->setCellValue('B'.$i, $nama_siswa);
                      $sheet->setCellValue('C'.$i, $row['agama']);
                      $sheet->setCellValue('D'.$i, $row['ppkn']);
                      $sheet->setCellValue('E'.$i, $row['b_indo']);
                      $sheet->setCellValue('F'.$i, $row['matematika']);
                      $sheet->setCellValue('G'.$i, $row['ipa']);
                      $sheet->setCellValue('H'.$i, $row['ips']);
                      $sheet->setCellValue('I'.$i, $row['b_ing']);
                      $sheet->setCellValue('J'.$i, $row['b_arab']);
                      $sheet->setCellValue('K'.$i, $row['senbud']);
                      $sheet->setCellValue('L'.$i, $row['penjas']);
    								}
  					$no++;
            $i++;
  				}

      //style
      $styleArray = [
      			'borders' => [
      				'allBorders' => [
      					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
      				],
      			],
      		];
      $i = $i - 1;
      $sheet->getStyle('A1:Y'.$i)->applyFromArray($styleArray);

      //memunculkan file excel
      $writer = new Xlsx($spreadsheet);
      $writer->save('daftar_nilai_siswa_semester2.xlsx');
      header("location:home_guru.php");
 ?>
