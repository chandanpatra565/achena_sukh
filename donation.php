<?php
    session_start();
    error_reporting(0);
    if(isset($_SESSION['username']) && isset($_SESSION['password'])){
        require "donation_print_data.php";
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
                <h1 class="h1_home_page_text">Donation page Image and text</h1>
                <form action="donation_insert.php" method="POST" enctype="multipart/form-data">
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
                                <form action="donation_del_data.php?id=<?php echo $id ?>" class="f_right" method="post" enctype="multipart/form-data">
                                    <button type="submit">Delete</button>
                                </form>
                                <form action="donation_data_update.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
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