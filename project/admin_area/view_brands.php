
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
tr,th
{
    border: 3px  groove #000;
}
</style>
</head>
<body>
    <table width="794" align="center" bgcolor="#ffcccc">

    <tr align="center">
        <td colspan="3"><h2></h2>View All Brands</td>
    </tr>
<tr>
    <th>Brand Id </th>
    <th>Brand Titel</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
<?php

include("includes/db.php");

$get_brands="select * from brands";
$run_brands =mysqli_query($con,$get_brands);
while($row_brands=mysqli_fetch_array($run_brands))
{
    $brand_id=$row_brands['brand_id'];
    $brand_titel=$row_brands['brand_title'];

?>
<tr align="center">
    <td><?php echo $brand_id; ?></td>
    <td><?php echo $brand_titel; ?></td>
    <td><a href="index.php?edit_brand=<?php echo $brand_id; ?>">Edit</a></td>
    <td><a href="delete_brand.php?delete_brand=<?php echo $brand_id; ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>