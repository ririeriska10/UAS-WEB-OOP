<?php

    include "koneksi.php";

    $ID_Pegawai = $_GET['ID_Penggajian'];
    $show = mysqli_query($conn,"SELECT * FROM penggajian inner join  pegawai using(ID_Pegawai) inner join departemen useing (ID_Dept) where  ID_Penggajian='$ID_Penggajian'");


?>
<!DOCTYPE html>
<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Edit Data Penggajian</title>
</head>
<body >
        <center>
    <p align="center"><a href="index.php">Beranda</a> / <a href="inputpegawai.php">Input Data Pegawai</a> / <a href="inputdepartemen.php">Input Data Departemen </a> / <a href="inputabsensi.php">Absensi Masuk Pegawai</a> / <a href="inputabsensikeluar.php">Absensi Keluar Pegawai</a> / <a href="inputpenggajian.php">Penggajian</a> / <a href="caripegawai.php">Cari Data Pegawai</a> / <a href="logout.php">Logout</a> / </p>
    </center>

    <div class="container">
   <h2 class=" teks">Form Edit Data Pegawai</h2></center>
    <?php
    $data = mysqli_fetch_assoc($show);
    ?>

    <form method="post" action="">
        <div class="bingkai2" align="center">
        <table >
            <tr >
                <td><h5>ID Penggajian</h5></td>
                <td>:</td>
                <td><input class="idpegawai" type="text" name="ID_Penggajian" value="<?php echo $data['ID_Penggajian'];?>"></td>
            </tr>
            <tr>
                <td><h5>ID Pegawai</h5></td>
                <td>:</td>
                <td><input readonly="" class="idpegawai" type="text" name="ID_Pegawai" value="<?php echo $data['ID_Pegawai'];?>"></td>
            </tr>
            <tr>
                <td><h5>Nama Pegawai</h5></td>
                <td>:</td>
                <td><input  readonly="" class="nama" type="text" name="Nama_Peg" value="<?php echo $data['Nama_Peg'];?>"></td>
            </tr>
            <tr>
                <td><h5>NO Rekening</h5></td>
                <td>:</td>
                <td>
                    <input class="nama" type="text" name="Rekening" value="<?php echo $data['Rekening'];?>">
                </td>
            </tr>
            <tr>
                <td><h5>Tanggal Transfer</h5></td>
                <td>:</td>
                <td><input class="nama" type="date" name="Tgl_Transfer" value="<?php echo $data['Tgl_Transfer'];?>">
</tr>
                <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="update" value="updateS" class="submit"></td>
            </tr>        
            </table>
            </div> 
            
<?php
if(isset($_POST['update'])) {
    $Rekening = $_POST ['Rekening'];
    $Gaji = $_POST ['Gaji '];
    $Tgl_Transfer = $_POST ['Tgl_Transfer'];

    $update = mysqli_query($conn,"UPDATE penggajian set Rekening='$Rekening', Gaji='$Gaji', Tgl_Transfer='$Tgl_Transfer' where ID_Penggajian='$ID_Penggajian'") or die (mysli_error());
    if($update){
        echo "<script>alert('Data Berhasil di Update');document.location='inputpenggajian.php'</script>";
    }else {
        echo "<script>alert('Ada Kesalahan');document.location='inputpenggajian.php'</script>";
    }
    }
    ?>
</form>
</div>
    </body>
</html>
