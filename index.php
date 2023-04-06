<?php
    session_start();
    error_reporting(0);
    if(isset($_SESSION['username']) && isset($_SESSION['password'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php include "link.php"; ?>
</head>
<body>
    <header id="header_ul_li">
        <nav>
            <ul class="header_menu">
                <li id="home"><a href="#">HOME </a></li>
                <li id="about_us"><a href="#">ABOUT US </a></li>
                <li id="our_work"><a href="#">OUR WORK </a></li>
                <li id="get_involved"><a href="#">GET INVOLVED </a></li>
                <li id="media"><a href="#">MEDIA </a></li>
                <li id="partner"><a href="#">PARTNER/DONORS </a></li>
                <li id="member"><a href="#">MEMBERS </a></li>
                <li id="donation"><a href="#">DONATION </a></li>
                <li id="contact_us"><a href="#">CONTACT US </a></li>
            </ul>
        </nav>
    </header>
    <input type="button" value="logout" id="log_out">
    <section>
    <form action="insert.php" method="POST" enctype="multipart/form-data">
  <input type="file" name="image">
  <input type="text" name="text">
  <button type="submit">Submit</button>
</form>


    </section>
</body>
</html>
<?php
    }else{
        include 'login.php';
    }
?>