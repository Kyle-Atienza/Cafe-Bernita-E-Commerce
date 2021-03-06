<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Bernita | Seller</title>

    <link rel="stylesheet" href="admin.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/8fd6ea3e93.js" crossorigin="anonymous"></script>

</head>

<?php

    include 'dbcon.php';
    
?>

<body>

    <nav class="header ">
        <div class="header-content">
            <div class="logo">
                <img src="imgs/logo.svg" alt="">
            </div>
            <ul class="nav-links">
                <li><a href="index.php">Home</a></li>
                <li><a href="#about-us">About Us</a></li>
                <li><a href="#order-menu">Menu</a></li>
                <li><a href="#">Contact</a></li>
                <li><i class=" view-bag fas fa-shopping-bag"></i></li>
 
            </ul>
        </div>
    </nav>

    <section class="view">
        <div class="content">
            <p class="active inventory-tab">Inventory</p>
            <p class="add-menu-tab">Add Menu</p>
            <p class="order-records-tab">Order Records</p>
        </div>
        
    </section>

    <section class="menu-inventory ">
        <div class="content">
            <div class="tabs">
                <h5 onclick="show_all()">All</h5>
                <h5 onclick="show_available()">Available</h5>
                <h5 onclick="show_unavailable()">Unavailable</h5>
            </div>
            <div class="menu-table-div">
                <table class="menu-table">
                    <thead>
                        <th class="group-col">Group</th>
                        <th class="name-col">Name</th>
                        <th class="price-col">Price</th>
                        <th class="status-col">Status</th>
                    </thead>
                    <tbody class="menu-data">
                        
                        
                            <?php

                                $display_menu = $conn->query("select * from menu_table");
                                while($row = $display_menu->fetch_assoc()){
                                    $id = $row['menu_id'];

                                    #echo '<tr><td>'.$row['menu_img']. '</td>';
                                    echo '<tr><td>'.$row['menu_group']. '</td>';
                                    echo '<td>'.$row['menu_name']. '</td>';
                                    echo '<td class="price">P '.$row['menu_price']. '</td>';
                                    echo '<td class="set-status">';
                                    ?>
                                        <a href="delete-menu.php<?php echo '?$id='.$id; ?>"><button" class="btn-delete"> <i class="fas fa-trash-alt"></i> </button></a>
                                    <?php
                                        
                                        if($row['menu_status'] == 'Available'){
                                            ?>
                                                <a href="unavailable.php<?php echo '?$id='.$id; ?>"><button" class="btn-delete"> Available </button></a>
                                            <?php
                                        } else {
                                            ?>
                                                <a href="available.php<?php echo '?$id='.$id; ?>"><button" class="btn-delete"> Unavailable </button></a>
                                            <?php
                                        }

                                        echo'</td></tr> ';

                                }
                                    

                            ?>
                        

                    </tbody>
                </table>
            </div>
        </div>
        
        
    </section>
    
    <section class="add-menu  hide">
        <div class="content">
            <form action="upload-menu.php" method="POST" enctype="multipart/form-data">
                <input placeholder="Name of Menu" 
                    type="text" 
                    name="menu-name"
                    required>
                <input placeholder="Menu Group" 
                    type="text" 
                    name="menu-group"
                    required>
                <!-- <input placeholder="Menu Img" 
                    type="text" 
                    name="menu-img"
                    required> -->
                <div class="group">
                    <input type="file"
                        name="menu-img"
                        required>
                    <input placeholder="00.00" 
                        type="number" min=0
                        name="menu-price" 
                        required>
                </div>
                
                <button type="submit" name="submit">Upload</button>

                                    
            </form>
        </div>
        

    </section>

    <section class="order-records hide">
        <div class="content">
            <div class="records-tab">
                <h5 onclick="order_all()">All</h5>
                <h5 onclick="show_pending()">Pending</h5>
                <h5 onclick="show_delivered()">Delivered</h5>
                <h5 onclick="show_canceled()">Canceled</h5>
                <h5 onclick="show_newest()">Newest</h5>
                <h5 onclick="show_oldest()">Oldest</h5>
            </div>
            <!-- <div class="time-tab">
                <h5 onclick="show_newest()">Newest</h5>
                <h5 onclick="show_oldest()">Oldest</h5>

            </div> -->
            <div class="order-table-div">
                <table class="order-table">
                    <thead>
                        <th>Customer Name</th>
                        <th>Customer Adress</th>
                        <th>Delivery Date</th>
                        <th>Delivery Time</th>
                        <th>Status</th>
                        <th>Message</th>
                        <th>Transaction</th>
                            </thead>
                    <tbody class="order-data">

                        
                        <?php

                        $display_orders = $conn->query("select * from order_table");
                        while($row = $display_orders->fetch_assoc()){
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
                                <td> '.$row['remarks'].'</td>
                                <td>'.$row['transaction_datetime'].'</td>
                            </tr>';

                        }
                        ?>

                    </tbody>
                </table>
            </div>
            
        </div>
        
    </section>

            <script src="main-jq.js ">
    </script>
    
</body>
</html>