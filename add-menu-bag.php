<?php

    include 'dbcon.php';

    $id = $_POST['menu_id'];

    $new_bag_item = "INSERT INTO bag_table (bag_id, menu_id) VALUE ('3', '$id')";
    //$add_item = "SELECT * FROM menu_table WHERE menu_id='$id'";
    

?>