<?php
include "../../connect_db.php";  //เชื่อมต่อ database
$get_name=$_REQUEST['fname'];
$get_type=$_REQUEST['ftype'];
$get_dealer=$_REQUEST['fdealer'];
$get_price=$_REQUEST['fprice'];
$filename = $_FILES["fimg"]["name"];
 
$target_dir = "product_img_tb/";
$target_file = $target_dir . basename($_FILES["fimg"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if( isset($_POST["submit"]) ) 
{
  $check = getimagesize($_FILES["fimg"]["tmp_name"]);
  if($check !== false) 
  {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } 
  else 
  {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

if(file_exists($target_file)) 
{
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

if($_FILES["fimg"]["size"] > 500000) 
{
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

if($uploadOk == 0) 
{
  echo "Sorry, your file was not uploaded.";
} 
else 
{
  if (move_uploaded_file($_FILES["fimg"]["tmp_name"], $target_file)) 
  {
  } 
  else 
  {
      echo "Sorry, there was an error uploading your file.";
  }
}

try
{
  $sql_insert = "insert into product_tb (product_id,product_name,product_type,product_dealer,product_price,product_img) 
  values ('','$get_name','$get_type','$get_dealer','$get_price','$filename')";
  $conn->exec($sql_insert);
  
  echo "บันทึกข้อมูลเรียบร้อยเเล้ว";
  echo "<script>window.location.href='product_select.php';</script>";
} 
catch(PDOException $e) 
{
  echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

?>
