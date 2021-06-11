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
$semester =2;

$search = mysqli_query($koneksi,"SELECT * FROM guru where id_guru='$username'");
while($row = mysqli_fetch_array($search))
				{
						$kelas=$row['wali_kelas'];
				}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>    <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" i
        ntegrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <style>
          .box{
            padding-top: 2rem;
            margin-top: 3.5rem;
          }
          h4{
            font-weight: bold;
          }
          table,th,td{
           text-align: center;
           border: 1px white;
           border-collapse: collapse;
           border-radius: 3px;
           padding: 9px;
         }
          th,td {
           text-transform: capitalize;
           color: #FFFFFF;
         }
          th{
           background-color: #0092FF;
         }
          tr{
         background-color: #3FDFFF;
         }
          tr:nth-child(even){
           background-color: #00D4FF;
         }
          tr:hover{
           background-color: #6FC2FF;
         }
         input[type=text] {
            border: none;
            width: 50%;
          }
        </style>
      </head>
      <body>
        <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand" href="#">Aplikasi Nilai Rapot Siswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link "href="home_guru.php">Nilai</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="home_guru_grafik.php">Grafik</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo $_SESSION['nama']; ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

    <div class="container box">
      <div class="row">
        <div class="col text-center">
        <h4> Input Nilai Kelas <?php echo $kelas; ?> Semester 2</h4>
      </div><br><br>
    </div>
    </div>
    <form action="simpannilai1.php" method="post">
    <!-- form di table utk menampilkan data  -->
    <table border="1">
      <tr>
        <th>No. Absen</th>
        <th>ID Siswa</th>
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

      </tr>
			<?php
				$siswa = mysqli_query($koneksi, "SELECT * FROM siswa WHERE kelas_siswa ='$kelas'"); //deklarasi variabel query
				$no=1;
				// program utk menampilkan data yang didapat sebagai tabel
				foreach ($siswa as $row) {
          $id_siswa[]=$row['id_siswa'];
          echo "<tr>
					<td>$no</td>
          <td>".$row['id_siswa']."</td>
					<td>".$row['nama_siswa']."</td>";
          echo '<td><input type="text" name="agama[]" required></td>
          <td><input type="text" name="ppkn[]" required></td>
          <td><input type="text" name="b_indo[]" required></td>
          <td><input type="text" name="matematika[]" required></td>
          <td><input type="text" name="ipa[]" required></td>
          <td><input type="text" name="ips[]"required></td>
          <td><input type="text" name="b_ing[]" required></td>
          <td><input type="text" name="b_arab[]" required></td>
          <td><input type="text" name="senbud[]" required></td>
          <td><input type="text" name="penjas[]" required></td>
					</tr>';
					$no++;
				}

			 ?>
     </table><br><br>
     <div class="row">
       <div class="d-grid gap-2 col-6 mx-auto">
         <input type="submit" name="btnLogin" value="Kirim" class="btn btn-outline-success btn-lg">
         </div>
     </form>

     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00D4FF" fill-opacity="1" d="M0,160L40,176C80,192,160,224,240,218.7C320,213,400,171,480,133.3C560,96,640,64,720,74.7C800,85,880,139,960,160C1040,181,1120,171,1200,149.3C1280,128,1360,96,1400,80L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#0080d6;"></path></svg>
     <!-- JavaScript Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>
