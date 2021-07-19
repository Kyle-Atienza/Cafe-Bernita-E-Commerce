<?php

    include 'dbcon.php';

    $menu_ctgry = $_POST['menu_ctgry'];

    if ($menu_ctgry == 'all') {
       
        $update = $conn->query("select * from menu_table "); //selects all menu items which is in the burger category
            
        while($row =  $update->fetch_assoc()){
            $id = $row['menu_id'];
            $price = $row['menu_price'];
            $name = $row['menu_name'];

            echo '<div class="menu-item">
                <div class="menu-img">
                    <img class="menu-image" src="menu-uploads/'.$row['menu_group'].'/'.$row['menu_img'].'" alt="image-not-found">
                </div>
                <div class="menu-details">
                    <h4  class="name">'.$name.'</h4>
                    <p class="description">'.$row['menu_status'].'</p>
                    <h4  class="price">P '.$row['menu_price'].'</h4>

                    <button type="button" 
                            data-price="'.$price = $row['menu_price'].'" 
                            data-id="'.$id = $row['menu_id'].'" 
                            data-name="'.$name = $row['menu_name'].'"
                            data-status='.$status = $row['menu_status'].'
                            class="add add-to-bag"><a ><i class="fas fa-plus"></i></a></button>
                </div>
            </div>';
                    
                
            
        }
                
    } else{

        $update = $conn->query("select * from menu_table where menu_group='$menu_ctgry'"); //selects all menu items which is in the burger category
            
        while($row =  $update->fetch_assoc()){
            $id = $row['menu_id'];
            $price = $row['menu_price'];
            $name = $row['menu_name'];

            echo '<div class="menu-item">
                <div class="menu-img">
                    <img class="menu-image" src="menu-uploads/'.$row['menu_group'].'/'.$row['menu_img'].'" alt="image-not-found">
                </div>
                <div class="menu-details">
                    <h4  class="name">'.$name.'</h4>
                    <p class="description">'.$row['menu_status'].'</p>
                    <h4  class="price">P '.$row['menu_price'].'</h4>

                    <button type="button" 
                            data-price="'.$price = $row['menu_price'].'" 
                            data-id="'.$id = $row['menu_id'].'" 
                            data-name="'.$name = $row['menu_name'].'"
                            data-status='.$status = $row['menu_status'].'
                            class="add add-to-bag"><a ><i class="fas fa-plus"></i></a></button>
                </div>
            </div>';
            }
                
    }



    
?>