<?php
include 'koneksi.php';
if(isset($GET['ID_Pegawai'])){
    $id_Pegawai = $_GET['ID_Pegawai'];
    $hps= mysqli_query($conn, "DELETE FROM pegawai WHERE ID_Pegawai = '$ID_Pegawai'");
    if($hps){
        header("location:inputpegawai.php");

    }else{
        echo "Gagal Hapus";
        header("location:inputpegawai.php");
    }
}