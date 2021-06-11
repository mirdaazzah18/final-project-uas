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
$siswa = mysqli_query($koneksi, "SELECT * FROM nilai_semester2 WHERE id_siswa ='$username'");
while($row = mysqli_fetch_array($siswa))
				{
						$nilai_agama1=$row['agama'];
            $nilai_ppkn1=$row['ppkn'];
            $nilai_b_indo1=$row['b_indo'];
            $nilai_matematika1=$row['matematika'];
            $nilai_ipa1=$row['ipa'];
            $nilai_ips1=$row['ips'];
            $nilai_b_ing1=$row['b_ing'];
            $nilai_b_arab1=$row['b_arab'];
            $nilai_senbud1=$row['senbud'];
            $nilai_penjas1=$row['penjas'];
				}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" i
    ntegrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
    .gradient{
      background: rgb(4,20,189);
      background: linear-gradient(180deg, rgba(4,20,189,1) 0%, rgba(0,212,255,1) 100%);
    }
    .page-header{
      padding-top: 2rem;
      margin-top: 3.5rem;
      font-size: 1.5rem;
      color: #ffffff;
    }
    .bi{
      width: 150px;
      height: 150px;
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
      background-color: #00DDFF;
    }
    h3{
      font-weight: bold;
    }
    a:link{
      text-decoration: none;
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
                <a class="nav-link active" aria-current="page" href="#">Nilai</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="home_siswa_grafik.php">Grafik</a>
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

        <header class="page-header gradient">
          <div class="container">
            <div class="row">
              <div class="col-ms-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                </svg>
              </div>
              <div class="col-ms-auto">
                Selamat datang, <?php echo $_SESSION['nama']; ?>
              </div>
              <div class="col-ms-auto">
                Siswa Kelas <?php echo $kelas; ?>
              </div>
            </div>
          </div>
        </header>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00d4ff" fill-opacity="1" d="M0,160L40,176C80,192,160,224,240,218.7C320,213,400,171,480,133.3C560,96,640,64,720,74.7C800,85,880,139,960,160C1040,181,1120,171,1200,149.3C1280,128,1360,96,1400,80L1440,64L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"
          data-darkreader-inline-fill="" style="--darkreader-inline-fill:#0080d6;"></path></svg>

          <div class="container">
            <div class="row">
              <div class="col text-center">
                <h3>Nilai Semester 1</h3>
              </div>
            </div><br>
            <div class="row">
              <div class="text-end">
                <a href="cetak_excel_siswa.php"><button type="button" class="btn btn-outline-primary">Cetak Nilai Excel</button></a>
                <a href="cetak_pdf_siswa.php"><button type="button" class="btn btn-outline-primary">Cetak Nilai PDF</button></a>
              </div><br><br>
		<!-- form di table utk menampilkan data  -->
    <table border="1">
      <tr>
        <th>No</th>
        <th>Mata Pelajaran</th>
        <th>Nilai</th>
      </tr>
      <tr>
        <td>1.</td>
        <td>Pendidikan Agama</td>
        <td><?php echo $nilai_agama; ?></td>
      </tr>
      <tr>
        <td>2.</td>
        <td>PPKN</td>
        <td><?php echo $nilai_ppkn; ?></td>
      </tr>
      <tr>
        <td>3.</td>
        <td>Bahasa Indonesia</td>
        <td><?php echo $nilai_b_indo; ?></td>
      </tr>
      <tr>
        <td>4.</td>
        <td>Matematika</td>
        <td><?php echo $nilai_matematika; ?></td>
      </tr>
      <tr>
        <td>5.</td>
        <td>IPA</td>
        <td><?php echo $nilai_ipa; ?></td>
      </tr>
      <tr>
        <td>6.</td>
        <td>IPS</td>
        <td><?php echo $nilai_ips; ?></td>
      </tr>
      <tr>
        <td>7.</td>
        <td>Bahasa Inggris</td>
        <td><?php echo $nilai_b_ing; ?></td>
      </tr>
      <tr>
        <td>8.</td>
        <td>Bahasa Arab</td>
        <td><?php echo $nilai_b_arab; ?></td>
      </tr>
      <tr>
        <td>9.</td>
        <td>Seni Budaya</td>
        <td><?php echo $nilai_senbud; ?></td>
      </tr>
      <tr>
        <td>10.</td>
        <td>Pendidikan Jasmani</td>
        <td><?php echo $nilai_penjas; ?></td>
      </tr>
      </table>
    </div>
</div>
<br><br>
<div class="container">
  <div class="row">
    <div class="col text-center">
      <h3>Nilai Semester 2</h3>
    </div>
  </div><br>
  <div class="row">
    <div class="text-end">
      <a href="cetak_excel_siswa1.php"><button type="button" class="btn btn-outline-primary">Cetak Nilai Excel</button></a>
      <a href="cetak_pdf_siswa1.php"><button type="button" class="btn btn-outline-primary">Cetak Nilai PDF</button></a>
    </div><br><br>
      <table border="1">
        <tr>
          <th>No</th>
          <th>Mata Pelajaran</th>
          <th>Nilai</th>
        </tr>
        <tr>
          <td>1.</td>
          <td>Pendidikan Agama</td>
          <td><?php echo $nilai_agama1; ?></td>
        </tr>
        <tr>
          <td>2.</td>
          <td>PPKN</td>
          <td><?php echo $nilai_ppkn1; ?></td>
        </tr>
        <tr>
          <td>3.</td>
          <td>Bahasa Indonesia</td>
          <td><?php echo $nilai_b_indo1; ?></td>
        </tr>
        <tr>
          <td>4.</td>
          <td>Matematika</td>
          <td><?php echo $nilai_matematika1; ?></td>
        </tr>
        <tr>
          <td>5.</td>
          <td>IPA</td>
          <td><?php echo $nilai_ipa1; ?></td>
        </tr>
        <tr>
          <td>6.</td>
          <td>IPS</td>
          <td><?php echo $nilai_ips1; ?></td>
        </tr>
        <tr>
          <td>7.</td>
          <td>Bahasa Inggris</td>
          <td><?php echo $nilai_b_ing1; ?></td>
        </tr>
        <tr>
          <td>8.</td>
          <td>Bahasa Arab</td>
          <td><?php echo $nilai_b_arab1; ?></td>
        </tr>
        <tr>
          <td>9.</td>
          <td>Seni Budaya</td>
          <td><?php echo $nilai_senbud1; ?></td>
        </tr>
        <tr>
          <td>10.</td>
          <td>Pendidikan Jasmani</td>
          <td><?php echo $nilai_penjas1; ?></td>
        </tr>
        </table>
      </div>
  </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00D4FF" fill-opacity="1" d="M0,160L40,176C80,192,160,224,240,218.7C320,213,400,171,480,133.3C560,96,640,64,720,74.7C800,85,880,139,960,160C1040,181,1120,171,1200,149.3C1280,128,1360,96,1400,80L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#0080d6;"></path></svg>
        	</body>
          <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>
