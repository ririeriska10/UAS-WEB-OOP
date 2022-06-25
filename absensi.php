<?php
class absensi{
    function simpan_absensi($data){

        include ('koneksi.php');

            $input = mysqli_query($cann,"INSERT INTO absensi VALUES
            (
            '',
            '".$data['ID_Pegawai']."',
            '".$data['Tgl_Absensi']."',
            '".$data['Absen_Masuk']."',
            '".$data['Keterangan']."',
            )");

            if($input) {
                echo "<script>alert('Data Berhasil di Tambahkan'); document.location='inputabsensi.php'</script>";
            }else{
                echo mysqli_erroe($conn);
            }
        }
    }
?>