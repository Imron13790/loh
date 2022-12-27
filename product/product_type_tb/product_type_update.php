<?php
include "../../connect_db.php";  //เชื่อมต่อ database

$get_update_id=$_REQUEST['update_id'];
$get_name=$_REQUEST['ftype'];

try
{  
  $sql_update = "UPDATE `product_type_tb` SET `product_type_name`='$get_name'
          WHERE product_type_id='$get_update_id' ";

  $stmt = $conn->prepare($sql_update);
  $stmt->execute();

  echo "<script>alert('เเก้ไขข้อมูลเรียบร้อยเเล้ว')</script>";      
  echo "<script>window.location.href='product_type_select.php';</script>";
} 
catch(PDOException $e)
{
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
 
?>
