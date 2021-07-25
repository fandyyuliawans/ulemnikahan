<!DOCTIPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/icon.png">

    <title>Login UlemNikahan</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
 
    <!-- Custom styles for this template -->
    <link href="assets/style.css" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<style>
		.bg-utama{
			background-image: url(assets/img/photo1.png);
			background-repeat: no-repeat;
			background-size: cover;
		}
	</style>
</head>
<body class="bg-utama">
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">BUKU TAMU PERNIKAHAN</a>
    </div>
  </div>
</nav>

<div class="container ">
	<div class="col-md-4 col-md-offset-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title" align="center"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> LOGIN ADMIN</h3>
			</div>
			<div class="panel-body">
				<?php 
				if($_SERVER['REQUEST_METHOD']=='POST'){
					$user	= $_POST['username'];
					$pass	= $_POST['password'];
					$p		= md5($pass);
					if($user=='' || $pass==''){
						?>
						<div class="alert alert-warning alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php
						  echo "<strong>Error!</strong> Form Belum Lengkap!!";
						  ?>
						</div>
						<?php
					}else{
						include "koneksi.php";
						$sqlLogin = mysqli_query($konek, "SELECT * FROM admin WHERE username='$user' AND password='$p'");
						$jml=mysqli_num_rows($sqlLogin);
						$d=mysqli_fetch_array($sqlLogin);
						if($jml > 0){
							session_start();
							$_SESSION['login']		= TRUE;
							$_SESSION['id']			= $d['idadmin'];
							$_SESSION['username']	= $d['username'];
							$_SESSION['namalengkap']= $d['namalengkap'];
							
							header('Location:./index.php');
						}else{
						?>
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php
							  echo "<strong>Error!</strong> Username dan Password anda Salah!!!";
							  ?>
							</div>
						<?php
						}
						
					}
				}
				?>

				
				<form method="post" action="" role="form">
					<div class="form-group">
						<input type="email" class="form-control" name="username" autocomplete="off" placeholder="Masukkan Email" />
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Masukkan Password" />
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block" value="Login" />
					</div>

				</form>
				
			</div>
			<h4 align='center'><b>Gunakan User dibawah ini</b></h4>
			<table width="300" height="80">
                    <thead>
                        <tr>
                            <td align= center><b>Email</b></td>
                            <td align= center><b>Password</b></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td align= center>fandy@ulem.com</td>
                            <td align= center>password</td>
                        </tr>
                        <tr>
                            <td align= center>user@user.com</td>
                            <td align= center>password</td>
                        </tr>
                    </tbody>
                </table>
		</div> <!-- //panel -->
		</div>

		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title" align='center'>Cek Kehadiran Tamu</h3>
				</div>
				<div class="panel-body">
					<a href="./validasi-ijazah" class="btn btn-danger" align='center'>Cek Tamu Undangan dengan QR Code</a>
				</div>
			</div>
		</div>
</div>


	<footer class="footer">
      <div class="container">
        <p class="text-muted"><a href="https://weddingwebrembang.ga" target="_blank">ulemnikahan.com</a> Tahun 2021</p>
      </div>
    </footer>

<!-- Bootstrap core JavaScript -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
