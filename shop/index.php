<?php
include("inculdes/db.php");
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
            <img src="images/logo.jpg" style="float:left;">
            <img src="images/banner.jpg" style="float:right;">        
</div>

<div id="navbar">
    <ul id="menu">
        <li><a href="#">Home</a></li>
        <li><a href="#">All Products</a></li>
        <li><a href="#">My Account</a></li>
        <li><a href="#">Sign Up</a></li>
        <li><a href="#">Shopping Cart</a></li>
        <li><a href="#">Contact Us</a></li>


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

            <?php
            $get_cats="select * from categories";
            $run_cats =mysqli_query($con,$get_cats);

            while ($row_cats=mysqli_fetch_array($run_cats)){

                $cat_id =$row_cats['cat_id'];
                $cat_title=$row_cats['cat_title'];

           echo " <li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";

            }
            ?>
           
        </ul>

        <div id="sidebar_title">Brands</div>
        <ul id="cats">
        <?php
            $get_brands="select * from brands";
            $run_brands =mysqli_query($con,$get_brands);

            while ($row_brands=mysqli_fetch_array($run_brands)){

                $brand_id =$row_brands['brand_id'];
                $brand_title=$row_brands['brand_title'];

           echo " <li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";

            }
            ?>
            
</ul>





    </div>

    <div id="right_content">
        <div id ="headline">
            <div id="headline_content">
                <b>Wellcome Guest!</b>
                <b style="color:yellow;">Shopping Cart</b>
                <span>- Items: - price:</span>
            </div>
        </div>
        <div id="products_box">
            <?php
            $get_products = "select * from products order by rand() LIMIT 0,6";
            $run_products = mysqli_query($con, $get_products);
            while ($row_products=mysqli_fetch_array($run_products)){

                $pro_id = $row_products['product_id'];
                $pro_title = $row_products['product_title'];
                $pro_cat = $row_products['cat_id'];
                $pro_brand = $row_products['brand_id'];
                $pro_desc = $row_products['product_desc'];
                $pro_price = $row_products['product_price'];
                $pro_image = $row_products['product_img1'];

                echo"

                <div id='single_product'>
                <h3>$pro_title</h3>

                <img src='admin_area/product_images/$pro_image' width='180' height='180'/><br>

                <a href=''details.php?pro_id=$pro_id' style='float:left;'>Details</a>

                <a href='index.php?add_cart=$pro_id'><button style='float:right;'>Add to Cart</button></a>



                </div>
                ";








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