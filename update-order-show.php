<?php

    include 'dbcon.php';

    $order_show = $_POST['order_show'];

    if ($order_show == 'DESC' || $order_show == 'ASC') {
        $update = $conn->query("select * from order_table order by transaction_datetime $order_show");
        while($row = $update->fetch_assoc()){
            $id = $row['order_id'];
    
            echo '<tr>
                <td>'.$row['customer_name'].'</td>
                <td>'.$row['customer_adress'].'</td>
                <td>'.$row['order_date'].'</td>
                <td>'.$row['order_time'].'</td>
                <td>'.$row['order_status'].'';

                ?>
                <a href="delivered.php<?php echo '?$id='.$id; ?>"><button" class="btn-delete"> <i class="far fa-thumbs-up"></i> </button></a>
                <a href="canceled.php<?php echo '?$id='.$id; ?>"><button" class="btn-delete"> <i class="fas fa-window-close"></i> </button></a>
                <?php

            echo '</td>
                <td>'.$row['remarks'].'</td>
                <td>'.$row['transaction_datetime'].'</td>
            </tr>';
    
            }
    }


    if ($order_show == 'all') {
        
        $update = $conn->query("select * from order_table");
        while($row = $update->fetch_assoc()){
        $id = $row['order_id'];

            echo '<tr>
                <td>'.$row['customer_name'].'</td>
                <td>'.$row['customer_adress'].'</td>
                <td>'.$row['order_date'].'</td>
                <td>'.$row['order_time'].'</td>
                <td>'.$row['order_status'].'';

                ?>
                <a href="delivered.php<?php echo '?$id='.$id; ?>"><button" class="btn-delete"> <i class="far fa-thumbs-up"></i> </button></a>
                <a href="canceled.php<?php echo '?$id='.$id; ?>"><button" class="btn-delete"> <i class="fas fa-window-close"></i> </button></a>
                <?php

            echo '</td>
                <td>'.$row['remarks'].'</td>
                <td>'.$row['transaction_datetime'].'</td>
            </tr>';

        }


    } else {

        $update = $conn->query("select * from order_table where order_status='$order_show'");
        while($row = $update->fetch_assoc()){
        $id = $row['order_id'];

            echo '<tr>
                <td>'.$row['customer_name'].'</td>
                <td>'.$row['customer_adress'].'</td>
                <td>'.$row['order_date'].'</td>
                <td>'.$row['order_time'].'</td>
                <td>'.$row['order_status'].'</td>
                <td>'.$row['remarks'].'</td>
                <td>'.$row['transaction_datetime'].'</td>
            </tr>';

        }

    }

    

?>