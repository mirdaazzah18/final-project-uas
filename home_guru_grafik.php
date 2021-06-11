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
if(!isset($_POST['matpel']))
{
    $_POST['matpel']="";
}
else {
  $matpel=$_POST['matpel'];
}
if(!isset($_POST['semester']))
{
    $_POST['semester']="";
}
else {
  $semester=$_POST['semester'];
}

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
		<title></title>
    <script type="text/javascript" src="chartjs/Chart.js"></script>
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
                <a class="nav-link active"  aria-current="page" href="home_guru_grafik.php">Grafik</a>
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
        <h4> Grafik Nilai Kelas <?php echo $kelas; ?></h4>
      </div>
    </div><br>
    <form action="#" method="post">
      <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupSelect01">Untuk Nilai :</label>
          <select name="matpel" class="form-select" aria-label="Default select example" required>
            <option selected disabled value="">Pilih...</option>
            <option value="agama">Pendidikan Agama</option>
            <option value="ppkn">PPKN</option>
            <option value="b_indo">Bahasa Indonesia</option>
            <option value="matematika">Matematika</option>
            <option value="ipa">IPA</option>
            <option value="ips">IPS</option>
            <option value="b_ing">Bahasa Inggris</option>
            <option value="b_arab">Bahasa Arab</option>
            <option value="senbud">Seni Budaya</option>
            <option value="penjas">Pendidikan Jasmani</option>
          </select>
        </div>
        <div class="input-group mb-3">
          <label class="input-group-text" for="inputGroupSelect01">Semester : </label>
          <select name="semester" class="form-select" required>
            <option selected disabled value="">Pilih...</option>
            <option value="nilai_semester1">Semester 1</option>
            <option value="nilai_semester2">Semester 2</option>
          </select>
          </div>
    <div class="row">
      <div class="text-end">
      <input type="submit" name="btnLogin" value="Lanjut" class="btn btn-outline-primary">
      </div>
    </form>

    <div style="width: 800px;margin: 0px auto;">
    <canvas id="myChart"></canvas>
    </div>


    <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["75", "76-85", "86-95", "96-100"],
				datasets: [{
					label: '',
					data: [
            <?php
            $jumlah_75 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='75'");
            echo mysqli_num_rows($jumlah_75);
            ?>,
            <?php
            $jumlah_76 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='76'");
            $_76=mysqli_num_rows($jumlah_76);

            $jumlah_77 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='77'");
            $_77=mysqli_num_rows($jumlah_77);

            $jumlah_78 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='78'");
            $_78=mysqli_num_rows($jumlah_78);

            $jumlah_79 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='79'");
            $_79=mysqli_num_rows($jumlah_79);

            $jumlah_80 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='80'");
            $_80=mysqli_num_rows($jumlah_80);

            $jumlah_81 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='81'");
            $_81=mysqli_num_rows($jumlah_81);

            $jumlah_82 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='82'");
            $_82=mysqli_num_rows($jumlah_82);

            $jumlah_83 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='83'");
            $_83=mysqli_num_rows($jumlah_83);

            $jumlah_84 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='84'");
            $_84=mysqli_num_rows($jumlah_84);

            $jumlah_85 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='85'");
            $_85=mysqli_num_rows($jumlah_85);

            $jumlah_76_85=$_76+$_77+$_78+$_79+$_80+$_81+$_82+$_83+$_84+$_85;
            echo $jumlah_76_85;
            ?>,
            <?php
            $jumlah_86 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='86'");
            $_86=mysqli_num_rows($jumlah_86);

            $jumlah_87 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='87'");
            $_87=mysqli_num_rows($jumlah_87);

            $jumlah_88 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='88'");
            $_88=mysqli_num_rows($jumlah_88);

            $jumlah_89 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='89'");
            $_89=mysqli_num_rows($jumlah_89);

            $jumlah_90 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='80'");
            $_90=mysqli_num_rows($jumlah_90);

            $jumlah_91 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='91'");
            $_91=mysqli_num_rows($jumlah_91);

            $jumlah_92 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='92'");
            $_92=mysqli_num_rows($jumlah_92);

            $jumlah_93 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='93'");
            $_93=mysqli_num_rows($jumlah_93);

            $jumlah_94 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='94'");
            $_94=mysqli_num_rows($jumlah_94);

            $jumlah_95 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='95'");
            $_95=mysqli_num_rows($jumlah_95);

            $jumlah_86_95=$_86+$_88+$_88+$_89+$_90+$_91+$_92+$_93+$_94+$_95;
            echo $jumlah_86_95;
            ?>,
            <?php
            $jumlah_96 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='96'");
            $_96=mysqli_num_rows($jumlah_96);

            $jumlah_97 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='97'");
            $_97=mysqli_num_rows($jumlah_97);

            $jumlah_98 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='98'");
            $_98=mysqli_num_rows($jumlah_98);

            $jumlah_99 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='99'");
            $_99=mysqli_num_rows($jumlah_99);

            $jumlah_100 = mysqli_query($koneksi,"select * from ".$semester." where ".$matpel."='100'");
            $_100=mysqli_num_rows($jumlah_100);

            $jumlah_96_100=$_96+$_97+$_98+$_99+$_100;
            echo $jumlah_96_100;
            ?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
						ticks: {
							beginAtZero:true
						}
				}
			}
		});
	</script>
</div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00D4FF" fill-opacity="1" d="M0,160L40,176C80,192,160,224,240,218.7C320,213,400,171,480,133.3C560,96,640,64,720,74.7C800,85,880,139,960,160C1040,181,1120,171,1200,149.3C1280,128,1360,96,1400,80L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#0080d6;"></path></svg>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	</body>
</html>
