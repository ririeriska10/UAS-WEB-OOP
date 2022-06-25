<?php

    include "koneksi.php";


?>
<!DOCTYPE html>
<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Input Data</title>
    <style type="text/css">
        td button.submit{
            margin: 0;
            background: #339900;
        }
    </style>
</head>
<body >
    <div class="container">
    <h2 class="kepalateks">Form Input Data Absensi</h2>
    <form method="post" action="">
        <center>
    <p align="center"><a href="index.php">Beranda</a> / <a href="inputpegawai.php">Input Data Pegawai</a> / <a href="inputdepartemen.php">Input Data Departemen </a> / <a href="inputabsensi.php">Absensi Masuk Pegawai</a> / <a href="inputabsensikeluar.php">Absensi Keluar Pegawai</a> / <a href="inputpenggajian.php">Penggajian</a> / <a href="caripegawai.php">Cari Data Pegawai</a> / <a href="logout.php">Logout</a> / </p>
    </center>
    
        <br>
        <div class="bingkai2" align="center">
        <table >
            <tr >
                <td><h5>ID_Pegawai</h5></td>
                <td>:</td>
                <td>
                <select required="" class="idpegawai" name="ID_Pegawai">
                    <?php
                    $query = mysqli_query($conn, "SELECT * FROM pegawai WHERE ID_Pegawai NOT IN (SELECT ID_Pegawai FROM absensikeluar)");
                    while($row = mysqli_fetch_array($query)): ?>
                    <option value="<?=$row['ID_Pegawai'] ?>"><?=$row['ID_Pegawai'].' - '.$row['Nama_Peg'] ?></option>
                    <?php endwhile; ?>
                    </select>
                        </td>
            </tr>
            <tr>
                <td><h5>Tanggal Absensi</h5></td>
                <td>:</td>
                <td><input class="nama" type="text" name="Tgl_Absensi" value="<?= date('y-m-d') ?>"></td>
            </tr>
            <tr>
                <td><h5>Keterangan</h5></td>
                <td>:</td>
                <td>
                    <select class="idpegawai" name="Keterangan">
                        <option value="Sudah">Sudah</option>
                        <option value="Terlamabat">Terlamabat</option>
                        <option value="Tidak Hadir">Tidak Hadir</option>
                        <option value="Izin">Izin</option>
                        <option value="Sakit">Sakit</option>
                    </select>
                    </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="Simpan" value="Simpan" class="submit">
            </td>
            </tr>        
            </table>
            </div> 

            <?php
            if(isset($_POST['simpan'])){
                $keterangan = $_POST['Keterangan'];

                if($keterangan == "Sudah"){
                    $Absen_keluar = 'Sudah';
                }if ($keterangan == "Terlamabat"){
                    $Absen_keluar = 'Sudah';
                }else{
                    $Absen_Keluar = 'Belum';
                }
                include('koneksi.php');
                include('absensikeluar.php');
            
$absensikeluar = new absensikeluar();

$ID_Pegawai = $_POST ['ID_Pegawai'];
$Tgl_Absensi = date ('Y-m-d / H:i:s');
$Keterangan = $_POST['Keterangan'];

$data = array(
    'ID_Pegawai' => $ID_Pegawai,
    'Tgl_Absensi' => $Tgl_Absensi,
    'Absen_Keluar' => $Absen_Keluar,
    'Keterangan' => $Keterangan,
);

$absensikeluar->simpan_absensi_keluar($data);
}
?>


<br>
        <table align="center" bdcolor="#BDC3C7" width="100%" cellpadding="10" cellspacing="0" border="1">
            <tr>
                <td><h3>Tanggal</h3><td>
                <td><h3>ID Pegawai</h3><td>
                <td><h3>Nama Pegawai</h3><td>
                <td><h3>Departemen</h3><td>
                <td><h3>Absen Keluar</h3><td>
                <td><h3>Keterangan</h3><td>
            </tr>

            <tr align="center">
                <?php
                        $page_limit = 25;
                        if (!empty($_GET['page'])) {
                            $page           =$_GET['page'] - 1;
                            $start_page     =$page_limit * $page;
                        }else if(!empty($_GET['page']) and $_GET['page'] == 1){
                            $start_page     =0;
                        }else if(empty($_GET['page'])){
                            $start_page     =0;
                        }
                        $search = @$_POST['search'];
                        if($search != ""){
                            $query=mysqli_query($conn,"SELECT * FROM absensikeluar inner join  pegawai using(ID_Pegawai) inner join departemen using (ID_Dept) ORDER BY ID_Pegawai LIMIT $start_page,$page_limit") or die (mysqli_error($conn));
                        }
                        if(mysqli_num_rows($query)== 0){
                            echo "<tr>";
                            echo "<td height='50' colspan='8' align='center'>No Data</td>";
                            echo "<tr>";
                        }else{
                        $no = 1;
                        while($data = mysqli_fetch_assoc($query)) {
                            echo '<tr>';
                            echo '<td>'.date('d-M-Y', strtotime($data['Tgl_Absensi'])).'</td>';
                            echo '<td>'.$data['ID_Pegawai'].'</td>';
                            echo '<td>'.$data['Nama_Peg'].'</td>';
                            echo '<td>'.$data['Nama_Dept'].'</td>';
                            echo '<td>'.$data['Absen_Keluar'].'</td>';
                            echo '<td>'.$data['Keterangan'].'</td>';

                            echo '<tr>';
                        $no++;
                        }
                    }
                ?>
        </table>
                </form>                
    </body>
</html>
