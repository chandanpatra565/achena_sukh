<?php
    session_start();
    // error_reporting(0);
    if(isset($_SESSION['username']) && isset($_SESSION['password'])){
        require "print_data.php";
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
    <section class="all_pages_data">
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
                    <input type="button" value="logout" id="log_out">
                </ul>
            </nav>
        </header>
        
        <section class="home_page_data">
            <h1 class="h1_home_page_text">Home page carousel</h1>
            <form action="insert_carousel.php" method="POST" enctype="multipart/form-data">
                <div class="home_page_img_section">
                    <input type="file" name="image">
                    <button type="submit">Submit</button>
                </div>
            </form>
            <h1 class="h1_home_page_text">Home page Image and text</h1>
            <form action="insert.php" method="POST" enctype="multipart/form-data">
                <div class="home_page_img_section">
                    <input type="file" name="image">
                    <input type="text" name="text" placeholder="Enter Your text">
                    <button type="submit">Submit</button>
                </div>
            </form>
            
            <div id="overflowTest">
                
                    <?php
                            $items = $json_data;
        
                            // Loop through each item and print its attributes in HTML
                            foreach ($items as $item) {
                                $id = $item['id'];
                                $img = $item['img'];
                                $text = $item['text'];
                                ?>
                                <form action="Data_Update.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                                    <div class="div">
                                        <div class="image">
                                            <div>
                                                <img name="<?php echo $id; ?>" id="<?php echo $id; ?>" src='data:image/jpeg;base64,<?php echo $img ?>' alt=''>
                                            </div>
                                            <div class="align_btn">
                                                <input type="file" name="image">
                                                <button type="submit" class="img_upload_btn">Update</button>
                                            </div>
                                        
                                    </div>
                                        <div class="text_and_btn">
                                            <textarea name="text" class="text-box" value="<?php echo $text ?>"><?php echo $text ?></textarea>
                                            <button type="submit" class="text_btn">Submit</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                            </form>

                                <?php
                                
                            }
                    ?>  
            </div>       

        </section>
    </section>
    
    
</body>
</html>
<?php
    }else{
        include 'login.php';
    }
?>