<?php

    include 'dbcon.php';

    $invetory_show = $_POST['inventory_show'];

    if ($invetory_show == 'all'){

        $update = $conn->query("select * from menu_table");
        while($row =  $update->fetch_assoc()){
            $id = $row['menu_id'];
    
            #echo '<tr><td>'.$row['menu_img']. '</td>';
            echo '<tr><td>'.$row['menu_group']. '</td>';
            echo '<td>'.$row['menu_name']. '</td>';
            echo '<td>'.$row['menu_price']. '</td>';
            echo '<td>'
            ?>
                <a href="delete-menu.php<?php echo '?$id='.$id; ?>"><button" class="btn-delete"> <i class="fas fa-trash-alt"></i> </button></a>
            <?php
                
                if($row['menu_status'] == 'Available'){
                    ?>
                        <a href="unavailable.php<?php echo '?$id='.$id; ?>"><button" class="btn-delete"> Unavailable </button></a>
                    <?php
                } else {
                    ?>
                        <a href="available.php<?php echo '?$id='.$id; ?>"><button" class="btn-delete"> Available </button></a>
                    <?php
                }
    
            '</td></tr> ';
    
        }

    } else {

        $update = $conn->query("select * from menu_table where menu_status='$invetory_show'");
        while($row =  $update->fetch_assoc()){
        $id = $row['menu_id'];

        #echo '<tr><td>'.$row['menu_img']. '</td>';
        echo '<tr><td>'.$row['menu_group']. '</td>';
        echo '<td>'.$row['menu_name']. '</td>';
        echo '<td>'.$row['menu_price']. '</td>';
        echo '<td>'
        ?>
            <a href="delete-menu.php<?php echo '?$id='.$id; ?>"><button" class="btn-delete"> <i class="fas fa-trash-alt"></i> </button></a>
        <?php
            
            if($row['menu_status'] == 'Available'){
                ?>
                    <a href="unavailable.php<?php echo '?$id='.$id; ?>"><button" class="btn-delete"> Unavailable </button></a>
                <?php
            } else {
                ?>
                    <a href="available.php<?php echo '?$id='.$id; ?>"><button" class="btn-delete"> Available </button></a>
                <?php
            }

        '</td></tr> ';


    }

    
    }

?>