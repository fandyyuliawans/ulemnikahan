<?php
session_start();
if(!isset($_SESSION['login'])){
	header('location:login.php');
}
include "koneksi.php";

// jika ada get act
if(isset($_GET['act'])){

	//proses simpan data
	if($_GET['act']=='insert'){
		//variabel dari elemen form
		$npm 	= $_POST['npm'];
		$nama 	= $_POST['nama'];
		$prodi  = $_POST['prodi'];
		
		if($npm=='' || $nama=='' || $prodi==''){
			header('location:data_mahasiswa.php?view=tambah');
		}else{			
			//proses simpan data admin
			$simpan = mysqli_query($konek, "INSERT INTO mahasiswa(npm,nama_mhs,prodi) 
							VALUES ('$npm','$nama','$prodi')");
			
			if($simpan){
				// BUAT QRCODE
				// tampung data kiriman
				$nomor = $nama_mhs;
			
				// include file qrlib.php
				include "phpqrcode/qrlib.php";
			
				//Nama Folder file QR Code kita nantinya akan disimpan
				$tempdir = "temp/";
			
				//jika folder belum ada, buat folder 
				if (!file_exists($tempdir)){
					mkdir($tempdir);
				}
			
				#parameter inputan
				$isi_teks = $nomor;
				$namafile = $npm.".png";
				$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
				$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
				$padding = 2;
			
				QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);

				header('location:data_mahasiswa.php');
			}else{
				header('location:data_mahasiswa.php');
			}
		}
	} // akhir proses simpan data

	else{
		header('location:data_mahasiswa.php');
	}

} // akhir get act

else{
	header('location:data_mahasiswa.php');
}
?>