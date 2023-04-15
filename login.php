<?php
session_start();
error_reporting(0);
if(!isset($_SESSION['username']) && !isset($_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "link.php" ?>
    
</head>

<body class="login_f">
    <section class='login' id='login'>
        <div class='head'>
            <h1 class='company Achenasukh'><span>Achena</span> sukh</h1>
        </div>
        <p id="msg">Error</p>
        <div class='form'>
            <form>
                <input type="text" placeholder='Username' class='text' id='username' name="username"><br>
                <input type="password" placeholder='Password' id='password' name="password" class='password'><br>
                <input type="button" value="Login" class='btn-login' id='do-login'>
                <input type="button" value="Forgot?" class="forgot" id="forgot">
            </form>
        </div>
    </section>
</body>
</html>
<?php
}else{
    header("Location: index.php");
}
?>