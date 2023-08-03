
<?php

include("includes/db.php");


if(isset($_GET['edit_brand']))
{
   $brand_id=$_GET['edit_brand'] ;
   $edit_brand="select * from brands where brand_id='$brand_id'";
   $run_brand=mysqli_query($con,$edit_brand);
   $row_brand= mysqli_fetch_array($run_brand);

   $brand_edit_id=$row_brand['brand_id'];
   $brand_titel=$row_brand['brand_title'];  
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style type="text/css">

form
{
    margin:15%;
}

</style>


</head>
<body>
   <form action="" method="post">

 <b>Edit This Brand</b> 
<input type="text" name="brand_titel1" value="<?php echo $brand_titel; ?>">
<input type="submit" name="update_brand" value="Update brand"/>
</form>
</body>
</html>

<?php

if(isset($_POST['update_brand']))
{
    $brand_titel123=$_POST['brand_titel1'];
    $update_brand ="update brands set brand_title='$brand_titel123' where brand_id='$brand_edit_id' ";
    $run_cat=mysqli_query($con,$update_brand);

    if($run_cat)
    {
        echo "<script>alert('Brand Has Been Updated')</script>";
    echo "<script>window.open('index.php?view_brands','_self')</script>";
    }
}

?>

