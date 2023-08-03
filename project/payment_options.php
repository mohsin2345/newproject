<!DOCTYPE html>
<html>
   <head>
      <title>Payment Options</title>
</head>
<boby>
   <?php
   include("inculdes/db.php");
 

   ?>
<div align="center" style="padding:20px;">

<h2>Payment Options For you</h2>
<?php
$ip = getRealIpAddr();

$get_customer ="select * from customers where customer_ip='$ip'";

$run_customer = mysqli_query($con, $get_customer);

$customer = mysqli_fetch_array($run_customer);

$customer_id = $customer['customer_id'];



?>

   <b>Pay with</b><a href="http://www.paypal.com"><img src="images/paypal_PNG24.png" width="200" height="80"></a> <b>or <a href="order.php?c_id=<?php echo $customer_id; ?>">Pay offline</a></b><br><br>
   
   <b> If you selected "Pay Offline" option then please check your email or account to find the Invoice No for your order</b>

</div>
</body>
</html>
