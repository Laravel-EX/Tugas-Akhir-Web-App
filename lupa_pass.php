<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Login Bimbel</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="style.css"/>
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-blue.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        
  <div class="container">
        <div class = "loginBox">
            <?php 
                session_start();
                if (!empty($_SESSION['success'])) {
                    echo "
                        <div class='alert ". $_SESSION['alert'] ."' role='alert'>
                            <button type='button' class='close' data-dismiss='alert'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
                            <strong>". $_SESSION['success'] ."</strong>.
                        </div>
                    ";
                }
                unset($_SESSION['success']);
            ?>
            <img src = "millenium.jpg" class = "user">
            <h2>Account Recovery</h2>
            <div class="panel-body">
                <form action="cek_user.php" method="post">
                    <p>Enter Last Username</p>
                    <input type ="text" name="user"required autocomplete="off" required="" placeholder="Enter username">
                    <input type = "submit" style="margin-top: 10px;" name="simpan" value ="Next">       
                    <a href = "login.php">Back</a>
                </form>             
            </div>
        </div>
    </div>  
</html>






