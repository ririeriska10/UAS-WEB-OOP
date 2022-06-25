<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body style="background-color: #95A5A6;">
        <div><div class="row">
    <form action="" method="post" name="form-login" class="col s12" style="width: 35%; height:400px; margin-left: 35%; margin-top : 5%; background-color : #FFFFFF; border-radius: 10px;">
        <div class="row">
        <h4 style="margin-left:40%;">Login </h4>
            <div class="input-field col s12">
                <input id="username" name="username" placeholder="Username" type="text" class="validate">
                <label for="username"></label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <input id="password" type="password" placeholder="Password" name="password" class="validate">
                <label for="password"></label>
            </div> 
        </div>
        <div clas="row">
        <input type='submit' value="Login" name="submit" class="waves-effect waves-light btn" style="margin-left: 40%; margin-top: 20px;">
        </div>
    </form>
<?php
                        $username= @$_POST['username'];
                        $password= @$_POST['password'];
                        $submit= @$_POST['submit'];

                        if($submit){
                            if($username == "" || $password == ""){
                            
                            }else{
                                $query=mysqli_query($conn,"SELECT * from login where username='$username' and password='$password'") or print (mysqli_error());
                                $result=mysqli_fetch_array($query);
                                $row=mysqli_num_rows($query);
                                if($row==TRUE){
                                    $_SESSION['username'] = $result['username'];
                                    $_SESSION['password'] = $result['password'];
                        echo "Anda Berhasil Login";
                        ?>
                        <script languange="javascript">document.location.href="index.php";</script>
                        <?php
                        }else{
                        echo "<script>alert('Login Gagagal'); document.location='login.php'</script>";
                        }
                        }

                        }
                ?>
    </div></div>

                <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
                <script type="text/javascript" src="is/materialize.min.js"></script>
            </body>
        </html>