<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafe Bernita</title>

    <link rel="stylesheet" href="style.css">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://kit.fontawesome.com/8fd6ea3e93.js" crossorigin="anonymous"></script>
</head>

<?php

    include 'dbcon.php';
    
?>

<body>
    
    <section class="side-hidden">
        <div class="bag-table">
            <table>
                <thead>
                    <th class="name">Name</th>
                    <th class="price">Price</th>
                    <th class="qty">Qty</th>
                </thead>
                <tbody class="bag-data">
                    <!-- <tr>
                        <td>Menu Name}</td>
                        <td class="bag-data-price">00.00</td>
                        <td>
                            <input placeholder="1" value="1" onkeyup="update_price(this, ${price})" class="bag-data-qty" type="number">
                            <button class="delete" onclick="delete_item(this)"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr> -->
                </tbody>
            </table>
        </div>
        
        
        <!-- <div class="total">
            <h2" class="bag-total">00.00</h2>
        </div> -->
            <form class="upload-order" action="upload-order.php" method="POST">
                <div class="total">
                    <p>The Total Amount is</p>
                    <h2" class="bag-total">00.00</h2>
                    
                </div>
                <div class="info-top">
                    <input placeholder="Your Name" name="customer_name" type="text" required>
                    <input placeholder="Your Address" name="customer_address" type="text" required>
                </div>
                <div class="info-down">
                    <input placeholder="Delivery Date"name="order_date" type="date" required>
                    <input placeholder="Delivery Time"name="order_time" type="time" >
                    <input placeholder="Remarks(Optional)"name="customer_message" type="text">
                </div>
                <button class="submit-order" name="submit" type="submit">Checkout</button>
        </form>
    </section>

    <nav class="header ">
        <div class="header-content">
            <div class="logo">
                <img src="imgs/logo.svg" alt="">
            </div>
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#about-us">About Us</a></li>
                <li><a href="#order-menu">Menu</a></li>
                <li><a href="#">Contact</a></li>
                <li><i class=" view-bag fas fa-shopping-bag"></i></li>
            </ul>
        </div>
    </nav>

    <section class="hero">
        <div class="hero-content">
            <div class="title">
                <p>WELCOME</p>
                <h1>Drink, Food, and Enjoy</h1>
            </div>
            <button><a href="#">Order Now</a></button>
        </div>
    </section>

    <section id="about-us" class="about-us">
        <div class="content ">
            <h2>About Us</h2>
            <p>Sed viverra bibendum massa dignissim aliquet morbi aliquam amet convallis. Pulvinar interdum et morbi orci arcu, orci fermentum. Elit, fringilla nisl consectetur condimentum tortor. Quis sem commodo elit venenatis habitant elementum. Nulla eget sem facilisis cursus. Urna mauris amet quam diam porta commodo sed turpis. Libero aliquam.</p>
            
        </div>
    </section>

    <section class="ad">
        <!-- <div class="content-1">
            <img src="imgs/ad-shawarma.png" alt="">
        </div>
        <div class="content-2">
            <img src="imgs/ad-bundle.png" alt="">
        </div> -->
        <img src="imgs/ad-shawarma.png" alt="">
        <img src="imgs/ad-bundle.png" alt="">
    </section>

    <section class="features">
        <div class="feature-item">
            <img src="imgs/calendar.svg" alt="">
            <h3>Order for a later Date</h3>
            <p>Facilisis ultricies sodales sit nunc quis neque, aliquet adipiscing diam. In ultricies magna tortor varius laoreet leo id sed. Vel duis viverra diam semper tempor magna.</p>
        </div>
        <div class="feature-item">
            <img src="imgs/bicycle.svg" alt="">
            <h3>Deliver to a Loved Ones</h3>
            <p>Facilisis ultricies sodales sit nunc quis neque, aliquet adipiscing diam. In ultricies magna tortor varius laoreet leo id sed. Vel duis viverra diam semper tempor magna.</p>
        </div>
        <div class="feature-item">
            <img src="imgs/door-open.svg" alt="">
            <h3>Recieve at your Door</h3>
            <p>Facilisis ultricies sodales sit nunc quis neque, aliquet adipiscing diam. In ultricies magna tortor varius laoreet leo id sed. Vel duis viverra diam semper tempor magna.</p>
        </div>
    </section>

    <!--<a href="update-menu-ctgry.php<?php echo '?$ctgry="burger"'?>">Burgers</a> -->

    <section id="order-menu" class="order-menu">
        <div class="menu-tab">
            <ul class="menu-categories">
                <li onclick="view_all(this)">All</li>
                <li onclick="view_burgers(this)" >Burgers</li>
                <li onclick="view_pasta(this)">Pastas </li>
                <li onclick="view_pizzas(this)">Pizzas</li>
                <li onclick="view_quenchers(this)">Quenchers</li>
                
            </ul>
            
            <div class="order-actions">
                <a class="search-toggle"><i class="search-icon fas fa-search show "></i></a>
                <i class="view-bag fas fa-shopping-bag"></i>
            </div>
        </div>
        <h1 class="menu-title show">All</h1>
        <div class="menu-search hide">  <!--  search -->
            <form action="" method="">
                <input id="input_search" type="text" name="input_search" class="input_search">
                <button onclick="search()" id="submit_search" type="button" name="submit_search"><i class="fas fa-search "></i></button>
            </form>
        </div>
        <div class="menu-display ">            
            <?php

                $display_menu = $conn->query("select * from menu_table "); //selects all menu items which is in the burger category
            
                while($row =  $display_menu->fetch_assoc()){
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
            ?>
            
        </div>   
        <button class="view-bag"><a href="order-form.html">View Bag</a></button>
    </section>


    <section class="footer">
        <div class="footer-content">
            <ul class="nav-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">Contact</a></li>
                <div class="nav-bag">
                    <i class="fas fa-shopping-bag"></i>
                </div>
            </ul>
        </div>
    </section>

    <!-- <script src="main-js.js ">
    </script> -->

    <script src="main-jq.js " async>
    </script>

</body>
</html>