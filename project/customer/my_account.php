<?php
session_start();
include("includes/db.php");
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
           <a href="../index.php"> <img src="../images/logo.jpg" style="float:left;"></a>
            <img src="../images/banner.jpg" style="float:right;">        
</div>

<div id="navbar">
    <ul id="menu">
        <li><a href="../index.php">Home</a></li>
        <li><a href="../all_products.php">All Products</a></li>
        <li><a href="customer/my_account.php">My Account</a></li>
        <?php
            if(isset($_SESSION['customer_email'])){
        
       echo "<span style='display:none;'> <li><a href='../user_register.php'>Sign Up</a></li></span>";
            }
            else{
               echo "<li><a href='../user_register.php'>Sign Up</a></li>";
            }
        ?>
        <li><a href="../cart.php">Shopping Cart</a></li>
        <li><a href="../contact.php">Contact Us</a></li>


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
        <div id="sidebar_title">Manage Account:</div>
        <ul id="cats">
            <?php
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer_pic = "select * from customers where customer_email='$customer_session'";

            $run_customer = mysqli_query($con, $get_customer_pic);

            $row_customer = mysqli_fetch_array($run_customer);

            $customer_pic = $row_customer['customer_image'];

            echo "<img src='customer_photos/$customer_pic' width='150' height='150'>";


?>

            <li><a href="my_account.php?my_arders">My Orders</a></li>
            <li><a href="my_account.php?edit_account">Edit Account</a></li>
            <li><a href="my_account.php?change_pass">Change Password</a></li>
            <li><a href="my_account.php?delete_account">Delete Account</a></li>
            <li><a href="logout.php">Logout</a></li>
        
            
</ul>
    </div>

    <div id="right_content">
        <?php cart();?>
       
      
        
        <div id ="headline">
            <div id="headline_content">
             
        <?php
        if(isset($_SESSION['customer_email'])){

           echo "<b>Welcome:" . "</b>"  . "<b style='color:yellow;'>" . $_SESSION['customer_email'] . "</b>";
        }



?>
                &nbsp;
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
            <h2 style="background:#000; color:#FC9; padding:20px;text-align:center; border-top:2px solid #FFF;">Manage Your Account Here</h2>
         
            <?php
            
            getdeafult();?>

           
            <?php
            if(isset($_GET['my_orders']))
            {
                include("my_orders.php");
            }
            

if(isset($_GET['edit_account']))
            {
                include("edit_account.php");
            }

            if(isset($_GET['change_pass']))
            {
                include("change_pass.php");
            }

            if(isset($_GET['delete_account']))
            {
                include("delete_account.php");
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