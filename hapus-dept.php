<?php
include 'koneksi.php';
if(isset($GET['ID_Dept'])){
    $id_pegawai = $_GET['ID_Dept'];
    $hps= mysqli_query($conn, "DELETE FROM departemen WHERE ID_Dept = '$ID_Dept'");
    if($hps){
        header("location:index.php");

    }else{
        echo "Gagal Hapus";
        header("location:index.php");
    }
}