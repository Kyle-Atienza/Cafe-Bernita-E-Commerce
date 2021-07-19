<?php

    include 'dbcon.php';

    if(isset($_POST['submit'])){
        $customer_name = $_POST['customer_name'];
        $customer_address = $_POST['customer_address'];
        $order_date = $_POST['order_date'];
        $order_time = $_POST['order_time'];
        $customer_message = $_POST['customer_message'];

        $insert = "INSERT INTO order_table(customer_name, customer_adress, remarks, order_date, order_time) VALUES('$customer_name', '$customer_address', '$customer_message', '$order_date', '$order_time')";

        if(mysqli_query($conn, $insert)){
            ?>
            <script>
                    window.location = "index.php"; 
            </script>
            <?php
        } else{
            ?>
                <script>
                alert("failed")
            </script>
            <?php
        }
    }

?>