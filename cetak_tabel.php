<?php 
 
$konek = mysqli_connect("localhost","root","","qrvalidasi");
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
 
?>

    <style>
        table{
            border-collapse: collapse;
            table-layout: fixed;
            width: 530px;
        }
        table td{
            width: 15%;
        }
    </style>
<html>
<body>
    <table border="1" cellpading="1">
        <tr>
            <td style="width: 40px; align=center;">
            <img src="assets/img/Logo.png" style="width: 80px;">
            </td colspan="">
            <td style="width=80%;">
                <h3 style="text-align: center;">DATA TAMU UNDANGAN</h3>
            </td>
            <td style="align=center; width=35%;">
                Jl. Mojopahit No 5 C Leteh, Rembang, Jateng 2971
            </td>
        </tr>
        <!-- tabel head -->
    </table>
    <table border="1" cellpading="1">
     <thead>
            <tr>
                <th>No</th>
				<th>Id Tamu</th>
				<th>Nama tamu</th>
				<th>Alamat</th>
            </tr>
      </thead>
      <br>
      <br>
      <!-- isi laporan -->
       <tbody>
        <?php
            $no=0;
            $query=mysqli_query($konek, "SELECT * FROM mahasiswa");
            while ($d=mysqli_fetch_array($query))
            {
             $no++;
        ?>
            <tr>
                <td style="width:10%;"><?php echo $no ; ?></td>
                <td style="width:20%;"><?php echo $d['npm']; ?></td>
                <td style="width:41%;"><?php echo $d['nama_mhs']; ?></td>
                <td style="width:60%;"><?php echo $d['prodi']; ?></td>
            </tr>
        <?php } ?>
       </tbody>
    </table>
</body>
</html>
<?php
    $html=ob_get_contents();
    ob_end_clean();

    require_once('html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('P','A4','en');
    $pdf->writeHTML($html);
    $pdf->Output('data_tamu.pdf','D'); 
?>