<?php
include "../../connect_db.php"; 

$get_product_type_name=$_REQUEST['ftype'];
 
try
{
  $sql_insert = "insert into product_type_tb (product_type_id,product_type_name) 
  values ('','$get_product_type_name')";
 
  $conn->exec($sql_insert);
  echo "<script>alert('เพิ่มข้อมูลเรียบร้อยเเล้ว')</script>";    
  echo "<script>window.location.href='product_type_select.php';</script>";
 
} 
catch(PDOException $e) 
{
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
 
?>
