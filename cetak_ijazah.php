<?php 
session_start();
if(isset($_SESSION['login'])){
	include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ijazah</title>
	<link rel="icon" href="./assets/img/logo.png">
	<style type="text/css">
		body{
			font-family: Arial;
		}

		@media print{
			.no-print{
				display: none;
			}
		}

		table{
			border-collapse: collapse;
		}
	</style>
</head>
<body>
<table border="6" cellpadding="80" cellspacing="0" width="100%">
<tr>
	<td>
	<table width="100%">
		<?php
		$sql=mysqli_query($konek, "SELECT * FROM mahasiswa WHERE id='$_GET[id]'");
		$d=mysqli_fetch_array($sql);
		?>
		<tr>
			<td colspan="3">
				<center>
				<img src="assets/img/logo.png" width="90px">
				<h1>KARTU TAMU UNDANGAN</h1>
				<p>DIAN DAN SITA</p>
				<hr>
				<br>
				<p>Kepada Yth Sodara/i : </p>

				<h1><u><?php echo $d['nama_mhs']; ?></u></h1>

				<p>Kami Ucapkan Terimakasih Atas Kehadiran Bapak/Ibu Saudara/i.</p>
				</center>
			</td>
		</tr>
		<tr>
			<td><img src="temp/<?php echo $d['npm'].".png"; ?>"</td>
			<td></td>
			<td width="300px">
				<p>Kami Yang Berbahagia:</p>
				<br/>
				<br/>
				<br/>
				<p><b>DIAN & SITA</b></p>
			</td>
		</tr>
	</table>
	</td>
</tr>
</table>
<br>
<center><a href="#" class="no-print" onclick="window.print();">Cetak/Print</a></center>
</body>
</html>

<?php
}else{
	header('location:login.php');
}
?>