<?php
//script ini digunakan jika password dan username salah
if(isset($_GET['pesan'])){
	if($_GET['pesan'] == "gagal"){
		echo "<script type='text/javascript'>alert('Password/Username anda salah');</script>";}}
 ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <!--untuk mengatur design style pada login-->
    <link rel="stylesheet" href="style.css">
    <style>
      .select{
        padding: 8px 12px;
        color: #333333;
        background-color: #eeeeee;
        border: 1px solid #dddddd;
        cursor: pointer;
        border-radius: 5px;
      }
      .select:hover{
        outline: none;
        border: 1px solid #bbbbbb;
      }
    </style>
  </head>
  <body style="background-color: rgba(126, 170, 236, 0.897);">
  <div class="logo">
            <img src="welcome.png" width="400px" alt="logo">
          </div>
    <!-- form utk login  -->
    <form method="post" action="login.php">
    <div class ="login">
    <h2 class="login-header">Login</h2>
    <form class="login-container" action="login.php" method="POST">
    <select class="select" name="level" id="cars">
        <option value="guru">Guru</option>
        <option value="siswa">Siswa</option>
      </select class="select"> <br>
				<p>
					<input type="username" placeholder="Username" name="username" />
				</p>
				<p>
					<input type="password" placeholder="Password" name="password" />
				</p>
          <button type="submit" name="login">Sign in</button>
		</div>
</form>
</body>
</html>
