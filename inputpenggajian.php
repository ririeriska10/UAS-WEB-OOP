<?php

    include "koneksi.php";


?>
<!DOCTYPE html>
<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Input Data</title>
    <style type="text/css">
        td button.submit {
            margin: 0;
            background: #339900;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2 class="kepalateks">Form Input Data Penggajian</h2>
    <form method="post" action="">
        <center>
    <p align="center"><a href="index.php">Beranda</a> / <a href="inputpegawai.php">Input Data Pegawai</a> / <a href="inputdepartemen.php">Input Data Departemen </a> / <a href="inputabsensi.php">Absensi Masuk Pegawai</a> / <a href="inputabsensikeluar.php">Absensi Keluar Pegawai</a> / <a href="inputpenggajian.php">Penggajian</a> / <a href="caripegawai.php">Cari Data Pegawai</a> / <a href="logout.php">Logout</a> / </p>
    </center>
        <br>
        <div class="bingkai2" align="center">
        <table>
            <tr >
                <td><h5>ID_Pegawai</h5></td>
                <td>:</td>
                <td>
                <select required="" class="idpegawai" name="ID_Pegawai">
                    <?php
                    $query = mysqli_query($conn,"SELECT *FROM pegawai WHERE ID_Pegawai NOT IN (SELECT ID_Pegawai FROM penggajian)");
                    while($row = mysqli_fetch_array($query)): ?>
                    <option value="<?=$row['ID_Pegawai']?>"><?=$row['ID_Pegawai'].' - '.$row['Nama_Peg'] ?></option>
                    <?php endwhile; ?>
                    </select>
                        </td>
            </tr>
            <tr>
                <td><h5>No Rekening</h5></td>
                <td>:</td>
                <td><input class="nama" type="text" name="Rekening" ></td>
            </tr>
            <tr>
                <td><h5>Nominal Gaji</h5></td>
                <td>:</td>
                <td>
                    Rp.<input class="nama" type="text" name="Gaji">
                </td>
            </tr>
            <tr>
                <td><h5>Tanggal Transfer</h5></td>
                <td>:</td>
                <td><input class="nama" type="date" name="Tgl_Transfer" value="<?= date('y-m-d') ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td> 
                <td><input type="submit" name="simpan" value="simpan" class="submit"></td>
            </tr>        
            </table>
            </div> 

            <?php
            if(isset($_POST['Simpan'])){
                $Status = $_POST['Sudah Ditransfer'];

                include('koneksi.php');
                include('penggajian.php');

                $penggajian = new penggajian();

                $ID_Pegawai = $_POST['ID_Pegawai'];
                $Rekening = $_POST['Rekening'];
                $Gaji = $_POST['Gaji'];
                $Tgl_Transfer = $_POST['Tgl_Transfer'];


$data = array(
    'ID_Pegawai' => $ID_Pegawai,
    'Rekening' => $Rekening,
    'Gaji' => $Gaji,
    'Tgl_Transfer' => $Tgl_Transfer,
    'Status' => $Status,
);

$penggajian->simpan_penggajian($data);
}
?>

<br>
<br>
        <table align="center" bdcolor="#BDC3C7" width="100%" cellpadding="10" cellspacing="0" border="1">
            <tr>
                <td><h3>No</h3><td>
                <td><h3>ID Pegawai</h3><td>
                <td><h3>Nama Pegawai</h3><td>
                <td><h3>Departemen</h3><td>
                <td><h3>Relening</h3><td>
                <td><h3>Gaji</h3><td>
                <td><h3>Tanggal Transfer</h3><td>
                <td><h3>Status</h3><td>
                <td><h3>Akasi</h3><td>
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
                            //$query=mysqli_query($conn,"SELECT * FROM pegawai inner join  departemen useing(id_departemen) where id_pegawai LIKE '%$search' or id_departemen LIKE '%$search' or nama_departemen ORDER BY id_pegawai LIMIT $start_page,$page_limit") or die (mysqli_error($conn));
                        }else{
                            $query=mysqli_query($conn,"SELECT * FROM penggajian inner join pegawai using(ID_Pegawai) inner join departemen useing(ID_Dept) ORDER BY ID_Pegawai limit  $start_page,$page_limit") or die (mysqli_error($conn));
                        }
                        if(mysqli_num_rows($query)== 0){
                            echo "<tr>";
                            echo "<td height='50' colspan='9' align='center'>No Data</td>";
                            echo "</tr>";
                        }else{
                            $no = 1;
                            while($data = mysqli_fetch_assoc($query))
                            {
                            echo '<tr>';
                            echo '<td>'.$no++.'</td>';
                            echo '<td>'.$data['ID_Pegawai'].'</td>';
                            echo '<td>'.$data['Nama_Peg'].'</td>';
                            echo '<td>'.$data['Nama_Dept'].'</td>';
                            echo '<td>'.$data['Rekening'].'</td>';
                            echo '<td>'.$data['Gaji'].'</td>';
                            echo '<td>'.$data['Tgl_Trabsfer'].'</td>';
                            echo '<td>'.$data['Status'].'</td>';

                            if($data['Status']== 'Sudah Ditransfer'){

                            echo '<td><a href="edit-pgj.php?ID_Penggajian='.$data['ID_Penggajian'].'"><i>Edit</i><a/>';
                        }else{
                            echo '<td>-</td>';
                        }
                        echo '</tr>';
                        $no++;
                    }
                }
                ?>
            
        </table>
        </tr>
                </form>
                </div>
                
    </body>
</html>
