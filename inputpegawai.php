<?php

    include "koneksi.php";


?>
<!DOCTYPE html>
<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Input Data</title>
</head>
<body >
    <div class="container">
    <h2 class="kepalateks">Form Input Data Pegawai</h2>
    <form method="post" action="">
    <center>
    <p align="center"><a href="index.php">Beranda</a> / <a href="inputpegawai.php">Input Data Pegawai</a> / <a href="inputdepartemen.php">Input Data Departemen </a> / <a href="inputabsensi.php">Absensi Masuk Pegawai</a> / <a href="inputabsensikeluar.php">Absensi Keluar Pegawai</a> / <a href="inputpenggajian.php">Penggajian</a> / <a href="caripegawai.php">Cari Data Pegawai</a> / <a href="logout.php">Logout</a> / </p>
    </center>
        <br>
        <div class="bingkai2" align="center">
        <table >
            <tr >
                <td><h5>ID Pegawai</h5></td>
                <td>:</td>
                <td><input class="idpegawai" type="text" name="ID_Pegawai" placeholder="Masukan ID Pegawai"></td>
            </tr>
            <tr>
                <td><h5>Nama</h5></td>
                <td>:</td>
                <td><input class="nama" type="text" name="Nama_Peg" placeholder="Masukan Nama Anda"></td>
            </tr>
            <tr>
                <td><h5>Alamat</h5></td>
                <td>:</td>
                <td><input class="alamat" type="text" name="Alamat" placeholder="Masukan Alamat"></td>
            </tr>
            <tr>
                <td><h5>ID Departemen</h5></td>
                <td>:</td>
                <td>
                    <select class="iddepartemen" name="ID_Dept">
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
                <td><input type="submit" name="Simpan" value="Simpan" class="submit"></td>
            </tr>        
            </table>
            </div> 
            
<?php
if(isset($_POST['Simpan'])) {
include('koneksi.php');
include('pegawai.php');

$pegawai = new pegawai();

$ID_Pegawai = $_POST ['ID_Pegawai'];
$Nama_Peg = $_POST ['Nama_Peg'];
$Alamat = $_POST ['Alamat'];
$ID_Dept = $_POST ['ID_Dept'];

$data = array(
    'ID_Pegawai' => $ID_Pegawai,
    'Nama_Peg' => $Nama_Peg,
    'Alamat' => $Alamat,
    'ID_Dept' => $ID_Dept
);

$pegawai->simpan_pegawai($data);

$input = mysqli_query($conn,"INSERT INTO pegawai VALUES ('$ID_Pegawai', '$Nama_Peg','$Alamat','$ID_Dept')") or die(mysqli_error());

if($input) {
    echo "<script> alert('Data Berhasil di Tambahkan'):document.location='inputpegawai.php'</script>";
        }else echo "ada kesalahan";
}
?>

<br>
        <table align="center" bdcolor="#BDC3C7" width="100%">
            <tr>
                <td><h3>No</h3><td>
                <td><h3>ID Pegawai</h3><td>
                <td><h3>Nama Pegawai</h3><td>
                <td><h3>Alamat</h3><td>
                <td><h3>Nama Departemen</h3><td>
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
                            $query=mysql_query($conn,"SELECT * FROM pegawai inner join  departemen useing(ID_Dept) where ID_Pegawai LIKE '%$search' or ID_Dept LIKE '%$search' or Nama_Dept ORDER BY ID_Pegawai LIMIT $start_page,$page_limit") or die (mysqli_error($conn));
                        }else{
                            $query=mysql_query($conn,"SELECT * FROM pegawai inner join departemen useing(ID_Dept) ORDER BY ID_Pegawai LIMIT $start_page,$page_limit") or die (mysqli_error($conn));
                        }
                        if(mysqli_num_rows($query)== 0){
                            echo "no data";
                        }else{
                        $no = 1;
                        while($data = mysqli_fetch_assoc($query)) {
                            echo '<tr>';
                            echo '<td>'.$no.'</td>';
                            echo '<td>'.$data['ID_Pegawai'].'</td>';
                            echo '<td>'.$data['Nama_Peg'].'</td>';
                            echo '<td>'.$data['Alamat'].'</td>';
                            echo '<td>'.$data['Nama_Dept'].'</td>';

                            echo '<td><a href="edit-peg.php?ID_Pegawai='.$data['ID_Pegawai'].'"><i class="glyphicon glyphicon-pencil">Edit</i></a> / <a href="hapus-peg.php?ID_Pegawai='.$data['ID_Pegawai'].'"onclick="return confirm(\'Yakin?\')"><i class="glyphicon glyphico-remove">hapus</a></td>'; echo '</tr>';
                        $no++;
                        }
                    }
                ?>
            </tr>
            </br>
        </table>
                </form>
                </div>

    </body>
</html>
