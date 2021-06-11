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
$matpel="";

$search = mysqli_query($koneksi,"SELECT * FROM siswa where id_siswa='$username'");
while($row = mysqli_fetch_array($search))
				{
						$kelas=$row['kelas_siswa'];
				}

if(!isset($_POST['matpel']))
{
    $_POST['matpel']="";
}
else {
  $matpel=$_POST['matpel'];
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title><script type="text/javascript" src="chartjs/Chart.js"></script>
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
                    <a class="nav-link "href="home_siswa.php">Nilai</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active"  aria-current="page" href="home_siswa.php">Grafik</a>
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
            <h4> Grafik Nilai Mata Pelajaran Siswa Per Semester</h4>
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
        <div class="row">
          <div class="text-end">
          <input type="submit" name="btnLogin" value="Lanjut" class="btn btn-outline-primary">
          </div>
          </div>
        </form>

    <div style="width: 800px;margin: 0px auto;">
    <canvas id="myChart"></canvas>
    </div>

<?php

 ?>

    <script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Semester 1", "Semester 2"],
				datasets: [{
					label: '',
					data: [
            <?php
            $search = mysqli_query($koneksi,"select * from nilai_semester1 where id_siswa='$username'");
            if ($matpel=="agama") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['agama'];
                      }
            }elseif ($matpel=="ppkn") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['ppkn'];
                      }
            }elseif ($matpel=="b_indo") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['b_indo'];
                      }
            }elseif ($matpel=="matematika") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['matematika'];
                      }
            }elseif ($matpel=="ipa") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['ipa'];
                      }
            }elseif ($matpel=="ips") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['ips'];
                      }
            }elseif ($matpel=="b_ing") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['b_ing'];
                      }
            }elseif ($matpel=="b_arab") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['b_arab'];
                      }
            }elseif ($matpel=="senbud") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['senbud'];
                      }
            }elseif ($matpel=="penjas") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['penjas'];
                      }
            }
            echo $nilai;
            ?>,
            <?php
            $search = mysqli_query($koneksi,"select * from nilai_semester2 where id_siswa='$username'");
            if ($matpel=="agama") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['agama'];
                      }
            }elseif ($matpel=="ppkn") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['ppkn'];
                      }
            }elseif ($matpel=="b_indo") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['b_indo'];
                      }
            }elseif ($matpel=="matematika") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['matematika'];
                      }
            }elseif ($matpel=="ipa") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['ipa'];
                      }
            }elseif ($matpel=="ips") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['ips'];
                      }
            }elseif ($matpel=="b_ing") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['b_ing'];
                      }
            }elseif ($matpel=="b_arab") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['b_arab'];
                      }
            }elseif ($matpel=="senbud") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['senbud'];
                      }
            }elseif ($matpel=="penjas") {
              while($row = mysqli_fetch_array($search))
                      {
                          $nilai=$row['penjas'];
                      }
            }
            echo $nilai;
            ?>,
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
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});

	</script>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#00D4FF" fill-opacity="1" d="M0,160L40,176C80,192,160,224,240,218.7C320,213,400,171,480,133.3C560,96,640,64,720,74.7C800,85,880,139,960,160C1040,181,1120,171,1200,149.3C1280,128,1360,96,1400,80L1440,64L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z" data-darkreader-inline-fill="" style="--darkreader-inline-fill:#0080d6;"></path></svg>

	</body>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</html>
