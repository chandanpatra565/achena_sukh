<?php
    session_start();
    error_reporting(0);
    if(isset($_SESSION['username']) && isset($_SESSION['password'])){
        require "carousel_print.php";
        //3 data base insert_carousel.php Carousel_Delete_data.php Carousel_Data_Update.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "link.php"; ?>
</head>
<body>
    <section class="all_pages_data">
        <?php include "Header.php" ?>
        <section class="home_page_data">
                <h1 class="h1_home_page_text">Carousel Page</h1>
                <form action="insert_carousel.php" method="POST" enctype="multipart/form-data">
                    <div class="home_page_img_section">
                        <label for="pages">Choose a page name:</label>
                        <select name="pages_data" id="pages_data">
                            <option value="HOME">HOME</option>
                            <option value="ABOUT_US">ABOUT US</option>
                            <option value="OUR_WORK">OUR WORK</option>
                            <option value="GET_INVOLVED">GET INVOLVED</option>
                            <option value="MEDIA">MEDIA</option>
                            <option value="PARTNER">PARTNER</option>
                            <option value="MEMBERS">MEMBERS</option>
                            <option value="DONATION">DONATION</option>
                            <option value="CONTACT_US">CONTACT US</option>
                        </select>
                        <input type="file" name="image">
                        <button type="submit">Submit</button>
                    </div>
                </form>
                <div id="overflowTest">
                
                    <?php
                            $items = $carousel_json_data;
        
                            // Loop through each item and print its attributes in HTML
                            foreach ($items as $item) {
                                $type = $item['type'];
                                $img = $item['img'];
                                $id= $item['id'];
                               
                                ?>
                                <form action="Carousel_Delete_data.php?id=<?php echo $id ?>" class="f_right" method="post" enctype="multipart/form-data">
                                    <button type="submit">Delete</button>
                                </form>
                                <form action="Carousel_Data_Update.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                                    <div class="div">
                                        <div class="image">
                                            <div>
                                                <img name="<?php echo $id; ?>" id="<?php echo $id; ?>" src='data:image/jpeg;base64,<?php echo $img ?>' alt=''>
                                                <h3 class="text_center"><?php echo $type ?></h3>
                                            </div>
                                            <div class="align_btn">
                                                <input type="file" name="image">
                                                <button type="submit" class="img_upload_btn">Update</button>
                                            </div>
                                        
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