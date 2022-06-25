<?php

    include "koneksi.php";


?>
<!DOCTYPE html>
<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Pencarian Data Pegawai</title>
    <style type="text/css">
        td button.submit{
            margin: 0;
            background: #339900;
        }
    </style>
</head>
<body >
    <div class="container">
    <form method="post" action="">
        <center>
    <p align="center"><a href="index.php">Beranda</a> / <a href="inputpegawai.php">Input Data Pegawai</a> / <a href="inputdepartemen.php">Input Data Departemen </a> / <a href="inputabsensi.php">Absensi Masuk Pegawai</a> / <a href="inputabsensikeluar.php">Absensi Keluar Pegawai</a> / <a href="inputpenggajian.php">Penggajian</a> / <a href="caripegawai.php">Cari Data Pegawai</a> / <a href="logout.php">Logout</a> / </p>
    </center>
    <center>
        <div >
            <h1>Cari Biodata Pegawai</h1>
        <table class="table" align="center">
            <tr >
                <td><h5>Nama</h5></td>
                <td>:</td>
                <td>
                    <input class="pegawai" type="text" name="pegawai">
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="Cari" value="Cari" class="submit">
            </td>
            </tr>        
            </table>
                </form>   
    </div>
    
    <br>
    <br>
    <br>

    <?php
            if(isset($_POST['Cari'])){
                $Cari = $_POST['pegawai'];

                $hasil = cari($cari);

                echo '<h2>Hasil Pencarian : </h2>';
                echo "ID Pegawai : ".$hasil['ID_Pegawai'];
                echo "<br>";
                echo "Nama : ".$hasil['Nama_Peg'];
                echo "<br>";
                echo "Alamat : ".$hasil['Alamat'];
            }else{
                echo "<h2>Data Tidak Ditemukan!</h2>";
            }

            function cari($Cari){
                include('koneksi.php');
                $qry="SELECT * FROM pegawai WHERE Nama_Peg LIKE '%".$Cari."%'";
                $exec=mysqli_query($conn,$qry);
                $data=mysqli_fetch_array($exec);
                return $data;
            }
            ?>
            </div>
        </center>
        </body>
        </html>