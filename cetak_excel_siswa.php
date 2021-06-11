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
$siswa = mysqli_query($koneksi, "SELECT * FROM nilai_semester1 WHERE id_siswa ='$username'");
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

        //memanggil library
        require 'vendor/autoload.php';
        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

        //menuliskan nama kolom pada excel
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No.');
        $sheet->setCellValue('B1', 'Mata Pelajaran');
        $sheet->setCellValue('C1', 'Nilai');
        $sheet->setCellValue('A2', '1');
        $sheet->setCellValue('B2', 'Pendidikan Agama');
        $sheet->setCellValue('C2',  $nilai_agama);
        $sheet->setCellValue('A3', '2');
        $sheet->setCellValue('B3', 'PPKN');
        $sheet->setCellValue('C3',  $nilai_ppkn);
        $sheet->setCellValue('A4', '3');
        $sheet->setCellValue('B4', 'Bahasa Indonesia');
        $sheet->setCellValue('C4',  $nilai_b_indo);
        $sheet->setCellValue('A5', '4');
        $sheet->setCellValue('B5', 'Matematika');
        $sheet->setCellValue('C5',  $nilai_matematika);
        $sheet->setCellValue('A6', '5');
        $sheet->setCellValue('B6', 'IPA');
        $sheet->setCellValue('C6',  $nilai_ipa);
        $sheet->setCellValue('A7', '6');
        $sheet->setCellValue('B7', 'IPS');
        $sheet->setCellValue('C7',  $nilai_ips);
        $sheet->setCellValue('A8', '7');
        $sheet->setCellValue('B8', 'Bahasa Inggri');
        $sheet->setCellValue('C8',  $nilai_b_ing);
        $sheet->setCellValue('A9', '8');
        $sheet->setCellValue('B9', 'Bahasa Arab');
        $sheet->setCellValue('C9',  $nilai_b_arab);
        $sheet->setCellValue('A10', '9');
        $sheet->setCellValue('B10', 'Seni Budaya');
        $sheet->setCellValue('C10',  $nilai_senbud);
        $sheet->setCellValue('A11', '10');
        $sheet->setCellValue('B11', 'Pendidikan Jasmani');
        $sheet->setCellValue('C11',  $nilai_penjas);

        //style
        $styleArray = [
        			'borders' => [
        				'allBorders' => [
        					'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        				],
        			],
        		];
        $sheet->getStyle('A1:C11')->applyFromArray($styleArray);

        //memunculkan file excel
        $writer = new Xlsx($spreadsheet);
        $writer->save('laporan_hasil_belajar_siswa_semester_1.xlsx');
        header("location:home_siswa.php");
 ?>
