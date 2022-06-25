<?php
class penggajian{
    function simpan_penggajian($data){

        include ('koneksi.php');

            $input = mysqli_query($conn,"INSERT INTO penggajian VALUES
            (
            '',
            '".$data['ID_Pegawai']."',
            '".$data['Rekeninag']."',
            '".$data['Gaji']."',
            '".$data['Tgl_Transfer']."',
            '".$data['Status']."',
            )");

            if($input) {
               echo "<script>alert('Data Berhasil di Tambahkan');document.location='inputpenggajian.php'</script>";
            }else{
                echo mysqli_error($conn);
            }
        }

        function hapus_penggajian($id){
            include ('koneksi.php');
            $hps = mysqli_query($conn,"DELETE FROM penggajian where ID_Penggajian='$ID_Penggajian'");
        }
    }
?>