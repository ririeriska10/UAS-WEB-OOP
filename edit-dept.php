<?php

    include "koneksi.php";


?>
<!DOCTYPE html>
<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Edit Departemen</title>
</head>
<body >
        <center>
    <p align="center"><a href="index.php">Beranda</a> / <a href="inputpegawai.php">Input Data Pegawai</a> / <a href="inputdepartemen.php">Input Data Departemen </a> / <a href="inputabsensi.php">Absensi Masuk Pegawai</a> / <a href="inputabsensikeluar.php">Absensi Keluar Pegawai</a> / <a href="inputpenggajian.php">Penggajian</a> / <a href="caripegawai.php">Cari Data Pegawai</a> / <a href="logout.php">Logout</a> / </p>
    </center>
    <div class="container">
    <h2 class=" teks">Form Edit Data Departemen</h2>
    <?php
    $ID_Dept = $_GET['ID_Dept'];
    $show = mysqli_query($conn,"SELECT * FROM departemen where ID_Dept = '$ID_Dept'");
    $data = mysqli_fetch_assoc($show);
    ?>

    <form method="post" action="">
    <div class="bingkai" align="center">
        <table  class="table" align="center">
            <<tr >
                <td><h5>ID Departemen</h5></td>
                <td>:</td>
                <td><input class="departemen" type="text" name="ID_Dept" value="<?php echo $data['ID_Dept'];?> "></td>
            </tr>
            <tr>
                <td><h5>Nama Departemen</h5></td>
                <td>:</td>
                <td><input class="namadept" type="text" name="Nama_Dept" value="<?php echo $data['Nama_Dept'];?> "></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="Update" value="Update" class="submit"></td>
            </tr>       
            </table>
            </div> 
            
<?php
if(isset($_POST['update'])) {
$ID_Dept    =$_POST ['ID_Dept'];
$Nama_Dept  =$_POST ['Nama_Dept'];

$update = mysqli_query($conn,"UPDATE departemen set ID_Dept= 'ID_Dept', Nama_Dept='$Nama_Dept', where ID_Dept='$ID_Dept'") or die(mysqli_error());
if($update){
 
    echo "<script>alert('Data Berhasil di UPdate');document.location='inputdepartemen.php'</script>";
}else echo "ada kesalahan";
}
?>
</form>
</div>
</body>
</html>

