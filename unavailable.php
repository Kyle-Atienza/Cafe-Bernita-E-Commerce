<?php

    include 'dbcon.php';

    $id = $_REQUEST['$id'];

    $update = "UPDATE menu_table SET menu_status='Unavailable' WHERE menu_id='$id'";
    if(mysqli_query($conn, $update)){
        ?>
            <script>
            alert("Updated Successfully");
            window.location = "admin.php";  
            </script>
        <?php
        }
    


?>