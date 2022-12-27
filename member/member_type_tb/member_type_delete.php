<?php
include "../../connect_db.php";  //เชื่อมต่อ database
$get_del_id=$_REQUEST['delete_id'];

try
{
  $sql_delete = "DELETE FROM member_type_tb WHERE member_type_id=$get_del_id";    
  $conn->exec($sql_delete);    
  
  echo "<script>alert('ลบข้อมูลเรียบร้อยเเล้ว')</script>";
  echo "<script>window.location.href='member_type_select.php';</script>";
} 
catch(PDOException $e) 
{
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
 
?>
