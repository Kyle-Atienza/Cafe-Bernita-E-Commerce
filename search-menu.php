<?php

    include 'dbcon.php';

    $search = mysqli_real_escape_string($conn, $_POST['input_search']);

        $sql = "SELECT * FROM menu_table WHERE menu_name LIKE '%$search%' OR menu_group LIKE '%$search%'";

        $result = mysqli_query($conn, $sql);
        //$query_result = mysqli_query_num_rows($result);

        while($row =  $result->fetch_assoc()){
            $id = $row['menu_id'];
            $price = $row['menu_price'];

        echo '<div class="menu-item">'; 
        echo '<div class="menu-img">';
        echo '<img class="menu-image" src="menu-uploads/'.$row['menu_group'].'/'.$row['menu_img'].'" alt="image-not-found"></div>';
        echo '<div class="menu-details">';
        echo '<h4 class="name">'.$row['menu_name'].'</h4>';
        echo '<p class="description">'.$row['menu_status'].'</p>';
        echo '<h4  class="price">'.$row['menu_price'].'</h4>';
        echo '<input class="qty" placeholder="1pcs" type="text" name="" id="">'; 
        echo '<button data-price="'.$price.'" data-id="'.$id = $row['menu_id'].'" class="add add-to-bag"><a ><i class="fas fa-plus"></i></a></button></div></div>';
        }


?>