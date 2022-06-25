<?php session_start();
if(isset($_SESSION['username']))
{
    session_destroy();
    echo "<script>alert('Apakah Anda Yakin?');document.location='login.php'</script> ";
}else{
    session_destroy();
    echo "<script>alert ('Gagal');document.location='login.php'</script>";
}
?>