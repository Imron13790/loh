<?php include "../../connect_db.php"; 

$get_update_id=$_REQUEST['update_id'];
echo $get_update_id;
 
 try
 {
    $sql_select= $conn->prepare("SELECT * FROM `member_type_tb` WHERE  member_type_id ='$get_update_id'");//การเขียนคำสั่ง SQL
    $sql_select->execute();//สั่งให้ sql_select ทำงาน
    $row_select = $sql_select->fetch(PDO::FETCH_ASSOC);      
}
catch(PDOException $e) 
{
    echo "Error: " . $e->getMessage();
}
?>

<html>
    <head>
    <link href= "../../style/style_insert_update.css" rel = "stylesheet">  
        <title>เเบบฟอร์มเเก้ไขข้อมูลประเภทสมาชิก</title>
    </head>

    <body>
        <div>
            <center>
            <form action="member_update.php?update_id=<?php echo $get_update_id; ?> " method="post">
                <table>
                    <tr>
                        <td colspan="2"><h1>เเบบฟอร์มเเก้ไขข้อมูลประเภทสมาชิก</h1></td>
                    </tr>
                    
                    <tr>
                        <td>ประเภท</td>
                        <td><input type="text" name="ftype" placeholder="ชื่อประเภท.." value="<?php echo $row_select['member_type_name'];?>"></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td><input type="submit" value="บันทึกข้อมูลสินค้า" id="green"></td>
                    </tr>

                    <tr class= "hubi"></tr>

                    <tr>
                        <td></td>
                        <td><center><a href="member_type_select.php" id ="blue">สมาชิกทั้งหมด</a></center></td>
                    </tr>
                </table>
            </form>
            </center>
        </div>
    </body> 
</html>
