<?php 
include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hasil Validasi Ijazah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="./assets/img/logo.png">
	<!-- Bootstrap core CSS -->
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">Cek Kehadiran Tamu</a>
        </div>
    </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Hasil Validasi Tamu</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">                                
                        <tr>
                            <td colspan="3">
                                <center>
                                <img src="assets/img/logo.png" width="90px">
                                <h1>ULEMNIKAHAN.COM</h1>
                                <p>Jl. Mojopahit no 5 c Ds. Leteh Kab. Rebmbang, Jateng 2971</p>
                                <hr>
                            </td>
                        </tr>
                    </table>
                    <?php
                    $sql=mysqli_query($konek, "SELECT * FROM mahasiswa WHERE nama_mhs='$_POST[idnpm]'");
                    $d=mysqli_fetch_array($sql);

                    if(mysqli_num_rows($sql) < 1){
                        ?>
                        <div class="alert alert-danger">
                            <center>
                            <strong>Maaf, Anda tidak terdata sebagai tamu!</strong><br>
                            <i>Silahkan menghubungi Developer, untuk menanyakan masalah ini</i>
                            </center>
                        </div>
                        <?php
                    }else{
                    ?>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>ID Tamu</th>
                            <th>Nama Tamu</th>
                            <th>Alamat</th>
                         </tr>
                        <tr>
                            <td><?php echo $d['npm']; ?></td>
                            <td><?php echo $d['nama_mhs']; ?></td>
                            <td><?php echo $d['prodi']; ?></td>
                        </tr>
                    </table>
                    <?php } ?>
                </div>
                <div class="panel-footer">
                    <center><a class="btn btn-danger" href="./validasi-ijazah">Kembali</a></center>
                </div>
            </div>
        </div>
    </div>
</body>
</html>