<?php

    include 'dbcon.php';

    $order_id = $_REQUEST['$id'];

    $update = "UPDATE order_table SET order_status='Delivered' WHERE order_id='$order_id'";
    if(mysqli_query($conn, $update)){
        ?>
            <script>
            alert("Updated Successfully");
            window.location = "admin.php";  
            </script>
        <?php
        }


?>