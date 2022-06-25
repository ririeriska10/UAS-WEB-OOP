<?php

    include "koneksi.php";

    $ID_Pegawai = $_GET['ID_Pegawai'];
    $show = mysqli_query($conn,"SELECT * FROM pegawai inner join  departemen using(ID_Dept) where  ID_Pegawai'");


?>
<!DOCTYPE html>
<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Edit Data Pegawai</title>
</head>
<body >
        <center>
    <p align="center"><a href="index.php">Beranda</a> / <a href="inputpegawai.php">Input Data Pegawai</a> / <a href="inputdepartemen.php">Input Data Departemen </a> / <a href="inputabsensi.php">Absensi Masuk Pegawai</a> / <a href="inputabsensikeluar.php">Absensi Keluar Pegawai</a> / <a href="inputpenggajian.php">Penggajian</a> / <a href="caripegawai.php">Cari Data Pegawai</a> / <a href="logout.php">Logout</a> / </p>
    </center>

    <div class="container">
   <h2 class=" teks">Form Edit Data Pegawai</h2></center>
    <?php
    $ID_Pegawai = $_GET['ID_Pegawai'];
    $show = mysqli_query($conn,"SELECT * FROM pegawai where ID_Pegawai = '$ID_Pegawai'");
    $data = mysqli_fetch_assoc($show);
    ?>

    <form method="post" action="">
        <div class="bingkai2" align="center">
        <table >
            <tr >
                <td><h5>ID Pegawai</h5></td>
                <td>:</td>
                <td><input class="idpegawai" type="text" name="ID_Pegawai" value="<?php echo $data['ID_Pegawai'];?>"></td>
            </tr>
            <tr>
                <td><h5>Nama</h5></td>
                <td>:</td>
                <td><input class="nama" type="text" name="Nama_Peg" value="<?php echo $data['Nama_Peg'];?>"></td>
            </tr>
            <tr>
                <td><h5>Alamat</h5></td>
                <td>:</td>
                <td><input class="alamat" type="text" name="Alamat" value="<?php echo $data['Alamat'];?>"></td>
            </tr>
            <tr>
                <td><h5>ID Departemen</h5></td>
                <td>:</td>
                <td>
                    <select class="iddepartemen" name="ID_Dept" value="<?php echo $data['ID_Dept']?>"><?php echo $data['Nama_DEPT'] ?> >
                    <?php
                        include 'koneksi.php';
                        $agt = mysqli_query($conn,"SELECT * FROM departemen");
                        while ($dtagt = mysqli_fatch_array($agt)) {?>
                            <option value="<?php echo $dtagt['ID_Dept'];?>"><?php echo $dtagt['Nama_Dept'];?></option>
                            <?php    
                            }
                        ?>
                    </select>
                </td>
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
    $ID_Pegawai = $_POST ['ID_Pegawai'];
    $Nama_Peg = $_POST ['Nama_Peg '];
    $Alamat = $_POST ['Alamat'];
    $ID_Dept = $_POST ['ID_Dept'];

    $update = mysqli_query($conn,"UPDATE pegawai set ID_Pegawai='$ID_Pegawai', Nama_Peg='$Nama_Peg', Alamat='$Alamat', ID_Dept='$ID_Dept' where ID_Pegawai='$ID_Pegawai'") or die (mysli_error());
    if($update){
        echo "<script>alert('Data Berhasil di Update');document.location.php'</script>";
    }else echo "Ada Kesalahan";
    }
    ?>
</form>
</div>
    </body>
</html>
