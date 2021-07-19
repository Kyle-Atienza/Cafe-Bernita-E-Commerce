<?php

    include 'dbcon.php';

    if(isset($_POST['submit'])){

        //get all posted values from add menu form
        $name = $_POST['menu-name'];
        $group = $_POST['menu-group'];
        $image = $_FILES['menu-img'];
        $price = $_POST['menu-price'];

        //get all info from image
        $image_name = $_FILES['menu-img']['name'];
        $image_tmp = $_FILES['menu-img']['tmp_name'];
        $image_size = $_FILES['menu-img']['size'];
        $image_error = $_FILES['menu-img']['error'];
        $image_type = $_FILES['menu-img']['type'];

        $image_ext = explode('.', $image_name);//separates the filename to the extension
        $image_actext = strtolower(end($image_ext));//lowercases the extension

        $allowed = array('jpg', 'jpeg', 'png');//allowed image formats

        if (in_array($image_actext, $allowed)) {//checks if the format is allowed
            if ($image_error === 0) {//checks if there are no errors uploading
                if ($image_size < 1000000000) {//checks if the file size is below 500000
                    $image_newname = $name.'.'.$image_actext;
                    $image_dest = 'menu-uploads/'.$group.'/'.$image_newname;
                    move_uploaded_file($image_tmp, $image_dest);
                    header('Location: admin.php?menu-uploaded');
                } else {
                    ?>
                    <script>
                        alert("image too large")
                    </script>
                    <?php
                }
            } else {
                ?>
                <script>
                    alert("error uploading")
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("file type error")
            </script>
            <?php
        }

    }

    $insert = "INSERT INTO menu_table(menu_group, menu_img, menu_name, menu_price) VALUES ('$group', '$image_newname', '$name', '$price')";
    if(mysqli_query($conn, $insert)){
        ?>
        <script>
                window.location = "admin.php"; 
        </script>
        <?php
    } else{
        ?>
            <script>
            alert("failed")
        </script>
        <?php
    }

?>