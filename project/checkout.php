<?php
session_start();


include("inculdes/db.php");

include("functions/functions.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP</title>
    <link rel="stylesheet" href="styles/style.css" media="all"/>
</head>
<body>
    
    <div class="main_wrapper">
        <div class="header_wrapper">
           <a href="index.php"> <img src="images/logo.jpg" style="float:left;"></a>
            <img src="images/banner.jpg" style="float:right;">        
</div>

<div id="navbar">
    <ul id="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="all_products.php">All Products</a></li>
        <li><a href="my_account.php">My Account</a></li>
        <li><a href="user_register.php">Sign Up</a></li>
        <li><a href="cart.php">Shopping Cart</a></li>
        <li><a href="contact.php">Contact Us</a></li>


</ul>
<div id="form">
    <form method="get" action="results.php" anctype="multipart/form_data">
        <input type="text" name="user_query" placeholder="search a product" />
        <input type="submit" name="search" value="Search"/>
</form>
</div>
</div>


<div class="content_wrapper">
    <div id="left_sidebar">
        <div id="sidebar_title">Categories</div>
        <ul id="cats">

            <?php getCats();?>
           
        </ul>

        <div id="sidebar_title">Brands</div>
        <ul id="cats">
       
        <?php getBrands();?>
            
</ul>
    </div>

    <div id="right_content">
        <?php cart();?>
       
      
        
        <div id ="headline">
            <div id="headline_content">
            <?php
                if(!isset($_SESSION['customer_email'])){
                    echo "<b>Welcome Guest!</b> <b style='color:yellow'>Shopping cart </b>";
                }
                else{
                    echo"<b>Welcome:" . $_SESSION['customer_email'] . "</b>" ."<b style='color:yellow'> Your Shopping cart </b>";
                }
                ?>
                <span>- Total Items:<?php items();?> -Total price : <?php total_price(); ?> - <a href="cart.php" style="color:#FF0;">Go to Cart</a>
            <?php
            
             if(!isset($_SESSION['customer_email'])){
             echo"<a href='checkout.php' style='color:#F93;'>Login</a>";
             }
             else{
                 echo"<a href='logout.php' style='color:#F93;'>Logout</a>";
             }
            


?>
            
            
            </span>
            </div>
        </div>
        <div>
            <?php

            if(!isset($_SESSION['customer_email']))
            {
                include("customer/customer_login.php");
            }
            else{

                include("payment_options.php");
            }
            


             ?>
        </div>




    </div>

</div>
<div class="footer">
    <h1 style="color:#000;padding-top:30px;text-align:center;">&copy; 2023 - By Www.mohsinasif12788@gmail.com</h1>

</div>
</div>

    </div>

    
</body>
</html>