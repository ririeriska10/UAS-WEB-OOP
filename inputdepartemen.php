<?php

    include "koneksi.php";


?>
<!DOCTYPE html>
<html>
    <link href="style.css" rel="stylesheet" type="text/css">
    <title>Input Data</title>
</head>
<body>

<?php
if(isset($_POST['simpan'])) {
    include('koneksi.php');
    $id_departemen      =$_POST['ID_Dept'];
    $Nama_Dept          =$_POST['Nama_Dept'];

    $input = mysqli_query($conn,"INSERT INTO departemen VALUES ('$ID_Dept','$Nama_Dept')") or die (mysqli_error());
    if($input){
        echo "<script>alert('Data Berhasil di Tambahkan');document.location='inputdepartemen.php'</script>";
    }else echo "ada kesalahan";
}
?>
    <div class="container">
    <h2 class="kepalateks">Form Input Data Departemen<h2>
        <center>
    <p align="center"><a href="index.php">Beranda</a> / <a href="inputpegawai.php">Input Data Pegawai</a> / <a href="inputdepartemen.php">Input Data Departemen </a> / <a href="inputabsensi.php">Absensi Masuk Pegawai</a> / <a href="inputabsensikeluar.php">Absensi Keluar Pegawai</a> / <a href="inputpenggajian.php">Penggajian</a> / <a href="caripegawai.php">Cari Data Pegawai</a> / <a href="logout.php">Logout</a> / </p>
    </center>
        <br>
        <form method="post" action="">
        <div class="bingkai2" align="center">
        <table  class="bingkai" align="center">
            <tr >
                <td><h5>ID Departemen</h5></td>
                <td>:</td>
                <td><input class="departemen" type="text" name="ID_Dept" placeholder="Masukan ID Departemen"></td>
            </tr>
            <tr>
                <td><h5>Nama Departemen</h5></td>
                <td>:</td>
                <td><input class="namadept" type="text" name="Nama_Dept" placeholder=" Masukan Nama Departemen"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input class="submit" type="submit" name="Simpan" value="simpan" ></td>
            </tr>        
            </table>
            </div> 
</form>
</div>

<br>
<br>
        <table bgcolor="#BDC3C7" width="100%" >
            <tr>
                <td><h3>No</h3><td>
                <td><h3>ID Departemen</h3><td>
                <td><h3>Nama Departemen</h3><td>
                <td><h3>Akasi</h3><td>
            </tr>

                <?php
                        $page_limit = 20;
                        if (!empty($_GET['page'])) {
                            $page           =$_GET['page'] - 1;
                            $start_page     =$page_limit * $page;
                        }else if(!empty($_GET['page']) and $_GET['page'] == 1){
                            $start_page     =0;
                        }else if(empty($_GET['page'])){
                            $start_page     =0;
                        }
                        $query=mysqli_query($conn,"SELECT * FROM departemen ORDER BY ID_Dept LIMIT $start_page,$page_limit") or die (mysqli_error($conn));
                        if(mysqli_num_rows($query)== 0) {
                            echo "no datda";
                        }else{
                            $no = 1;
                            while($data = mysqli_fetch_assoc($query)){
                                echo '<tr>';
                                echo '<td>'.$no.'</td>';
                                echo '<td>'.$data['ID_Dept'].'</td>';
                                echo '<td>'.$data['Nama_Dept'].'</td>';
                                echo '<td><a href="edit-dept.php?ID_Dept='.$data['ID_Dept'].'"><i class="glyphicon glyphicon-pencil">edit</i></a> / <a href="hapus-dept.php?ID_Dept='.$data['ID_Dept'].'" onclick="return confirm(\'Yakin?\')"><i class="glyphicon glyphicon-remove">hapus</a></td>';
                            $no++;
                            }
                        }
                    ?>
                    </table>
                    </body>
                    </html>