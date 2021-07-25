<?php include "header.php"; ?>

<div class="container">

<?php
$view = isset($_GET['view']) ? $_GET['view'] : null;

switch($view){
	default:
	?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Data Tamu Undangan</h3>
			</div>
			<div class="panel-body">
				<a class="btn btn-primary" style="margin-bottom: 10px" href="data_mahasiswa.php?view=tambah">Tambah Data</a>
				<table class="table table-bordered table-striped">
					<tr>
						<th>No</th>
						<th>Id Tamu</th>
						<th>Nama tamu</th>
						<th>Alamat</th>
						<th>Kartu</th>
					</tr>
					<?php
					$sql=mysqli_query($konek, "SELECT * FROM mahasiswa ORDER BY id ASC");
					$no=1;
					while($d=mysqli_fetch_array($sql)){
						echo "<tr>
							<td width='40px' align='center'>$no</td>
							<td>$d[npm]</td>
							<td>$d[nama_mhs]</td>
							<td>$d[prodi]</td>
							<td width='220px' align='center'>
								<a class='btn btn-warning btn-sm' href='buatQRCode.php?npm=$d[npm]&nomor=$d[nama_mhs]'>Buat Kode QR</a>
								<a class='btn btn-success btn-sm' href='cetak_ijazah.php?id=$d[id]' target='_blank'>Pr</a>
								<a class='btn btn-danger btn-sm' href='delete_tamu.php?id=$d[id]'>Del</a>
							</td>
						</tr>";
						$no++;
					}
					?>
				</table>
			</div>
		</div>
	</div>

<?php
	break;
	case "tambah":

?>
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Tambah Data Tamu</h3>
			</div>
			<div class="panel-body">
				
				<form method="post" action="aksi_mahasiswa.php?act=insert">
					<table class="table">
						<tr>
							<td width="160">ID TAMU</td>
							<td>
								<div class="col-md-4"><input class="form-control" type="text" name="npm" required /></div>
							</td>
						</tr>
						<tr>
							<td>Nama Tamu</td>
							<td><div class="col-md-6"><input class="form-control" type="text" name="nama" required /></div></td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td>
								<div class="col-md-6">
									<select name="prodi" class="form-control">
									<option value="Rembang Kota">Rembang Kota</option>
									<option value="Luar Kota">Luar Kota</option>
									<option value="Lainnya">Lainnya</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td></td>
							<td>
							<div class="col-md-6">
								<input class="btn btn-primary" type="submit" value="Simpan" />
								<a class="btn btn-danger" href="data_mahasiswa.php">Kembali</a>
								</div>
							</td>
						</tr>
					</table>
				</form>

			</div>
		</div>
	</div>

<?php
	break;
}
?>

</div>

<?php include "footer.php"; ?>