<?php
    session_start();
    include "koneksi.php";
    if(empty($_SESSION['username'])){
        header('location:login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
</head>
<body bgcolor="#95A5A6">
    <CENTER><h1 align="center">Selamat Datang RIRI</h1></CENTER>

    <center>
    <p align="center"><a href="index.php">Beranda</a> / <a href="inputpegawai.php">Input Data Pegawai</a> / <a href="inputdepartemen.php">Input Data Departemen</a> / <a href="inputabsensi.php">Absensi Masuk Pegawai</a> / <a href="inputabsensikeluar.php">Absensi Keluar Pegawai</a> / <a href="inputpenggajian.php"> Penggajian</a> / <a href="caripegawai.php">Cari Data Pegawai</a> / <a href="logout.php">Logout</a> / </p>
    
    </center>
    <center>
    <h3>Data Pegawai</h3>
    <table claass="striped" cellpadding="5" cellspacing="0" border="1">
        <tr bgcolor="#CCCCCC">
            <th>NO.</th>
            <th>ID Pegawai</th>
            <th>Nama Pegawai</th>
            <th>Alamat</th>
            <th>Nama Departemen</th>
            <th>Opsi</th>
        </tr>

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
                            $query=mysqli_query($conn,"SELECT * FROM pegawai inner join departemen using(ID_Dept) where ID_Pegawai LIKE '%$search' or ID_Dept LIKE '%$search' OR Nama_Dept ORDER BY ID_Pegawai LIMIT $start_page,$page_limit") or die (mysqli_error($conn));
                        }else{
                            $query=mysqli_query($conn,"SELECT * FROM pegawai inner join departemen using(ID_Dept) ORDER BY ID_Pegawai LIMIT $start_page,$page_limit") or die (mysqli_error($conn));
                        }
                        if(mysqli_num_rows($query)== 0){
                            echo "no data";
                        }else{
                        $no = 1;
                        while($data = mysqli_fetch_assoc($query)){
                            echo '<tr>';
                                echo '<td>'.$no.'</td>';
                                echo '<td>'.$data['ID_Pegawai'].'</td>';
                                echo '<td>'.$data['Nama_Peg'].'</td>';
                                echo '<td>'.$data['Alamat'].'</td>';
                                echo '<td>'.$data['Nama_Dept'].'</td>';

                                echo '<td><a href="edit-peg.php?ID_Pegawai='.$data['ID_Pegawai'].'"><i class="glyphicon glyphicon-pencil">edit</i></a> / <a href="hapus-peg.php?ID_Pegawai='.$data['ID_Pegawai'].'"onclick="return confirm(\'Yakin?\')"><i class="glyphicon glyphicon-remove">hapus</a></td>';echo '</tr>';

                        $no++;
                        }
                    }
                ?>
</table>
                
<h3>Data Departemen</h3>
<table cellpadding="5" cellspacing="0" border="1">
                    <tr bgcolor="#CCCCCC">
                        <th>No.</th>
                        <th>ID Departement</th>
                        <th>Nama Departement</th>
                        <th>Opsi</th>
                    </tr>

                    <?php
                    $page_limit = 20;
                        if (!empty($_GET['page'])) {
                            $page           =$_GET['page'] - 1;
                            $start_page     =$page_limit * $page;
                        }else if(!empty($_GET['page']) and $_GET['page'] ==1){
                            $start_page     =0;
                        }else if(empty($_GET['page'])){
                            $start_page     =0;
                        }
                $query=mysqli_query($conn,"SELECT * FROM departemen ORDER BY ID_Dept LIMIT $start_page, $page_limit") or die (mysqli_error($conn));
                        if(mysqli_num_rows($query)== 0){
                            echo "no data";
                        }else{
                            $no = 1;
                            while($data = mysqli_fetch_assoc($query)){
                                echo '<tr>';
                                    echo '<td>'.$no.'</td>';
                                    echo '<td>'.$data['id_departemen'].'</td>';
                                    echo '<td>'.$data['nama_departemen'].'</td>';
                                    echo '<td><a href="edit-dept.php?id_departemen='.$data['id_departemen'].'"><i class="glyphicon-pencil">edit</i><a/> / <a href="hapus-dept.php?id_departemen'.$data['id_departemen'].'" onclick="return confirm(\'yakin?\')"><i class="glyphicon glyphicon-remove">hapus</a></td>';
                                
                                    $no++;
                            }
                        }
                    ?>
        </table>
        </center>
</body> 
</html>                  