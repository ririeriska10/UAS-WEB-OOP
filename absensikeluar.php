<?php
class absensikeluar{
    function simpan_absensi_keluar($data){

        include ('koneksi.php');

            $input = mysqli_query($cann,"INSERT INTO absensikeluar VALUES
            (
            '',
            '".$data['ID_Pegawai']."',
            '".$data['Tgl_Absensi']."',
            '".$data['Absen_Keluar']."',
            '".$data['keterangan']."',
            )");

            if($input) {
                echo "<script>alert('Data Berhasil di Tambahkan'); document.location='inputabsensikeluar.php'</script>";
            }else{
                echo mysqli_erroe($conn);
            }
        }

        //function hapus_absen_keluar($id){
           // $hps = mysqli($conn,"DELETE FROM absensikeluar where id_absensi='$id_absensi'");
        //}
    }
?>