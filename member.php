<?php
    session_start();
    error_reporting(0);
    if(isset($_SESSION['username']) && isset($_SESSION['password'])){
        require "member_print_data.php";
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
                <h1 class="h1_home_page_text">Member page Image and text</h1>
                <form action="member_insert_data.php" method="POST" enctype="multipart/form-data">
                    <div class="home_page_img_section">
                        <input type="file" name="image" required>
                        <input type="text" name="name" placeholder="Enter Your name" required>
                        <input type="text" name="comments" placeholder="Enter Your Comment" required>
                        <button type="submit">Submit</button>
                    </div>
                </form>
                <div id="overflowTest">
                
                    <?php
                            $items = $json_data;
        
                            // Loop through each item and print its attributes in HTML
                            foreach ($items as $item) {
                                $id = $item['id'];
                                $name = $item['name'];
                                $img = $item['img'];
                                $comment = $item['comment'];
                                ?>
                                <form action="member_del_data.php?id=<?php echo $id ?>" class="f_right" method="post" enctype="multipart/form-data">
                                    <button type="submit">Delete</button>
                                </form>
                                <form action="member_update_data.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
                                    <div class="div">
                                        <div class="image">
                                            <div>
                                                <img name="<?php echo $id; ?>" id="<?php echo $id; ?>" src='data:image/jpeg;base64,<?php echo $img ?>' alt=''>
                                                <div>
                                                    <input type="text" name="name" placeholder="Enter Your name" required value="<?php echo $name ?>">
                                                    <button type="submit" class="img_upload_btn">Update</button>
                                                </div>
                                            </div>
                                            <div class="align_btn">
                                                <input type="file" name="image">
                                                <button type="submit" class="img_upload_btn">Update</button>
                                            </div>
                                        
                                    </div>
                                        <div class="text_and_btn">
                                            <textarea name="comments" class="text-box" value="<?php echo $comment ?>"><?php echo $comment ?></textarea>
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