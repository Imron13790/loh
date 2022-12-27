<?php 
include "../../connect_db.php";

$get_update_id=$_REQUEST['update_id'];
 
try
{
    $sql_select= $conn->prepare("SELECT * FROM member_tb where member_id='$get_update_id' ");//การเขียนคำสั่ง SQL
    $sql_select->execute();//สั่งให้ sql_select ทำงาน
    $row_select = $sql_select->fetch(PDO::FETCH_ASSOC);        
}
catch(PDOException $e) 
{
    echo "Error: " . $e->getMessage();
}
//$conn = null;//เคลีย์ค่าในการดึงข้อมูล
?>
<html>
    <head>
    <link href= "../../style/style_insert_update.css" rel = "stylesheet"> 
        <title>เเบบฟอร์มเเก้ไขข้อมูลสมาชิก</title>
    </head>
    <body>
        <div>
            <center>
            <form action="member_update.php?update_id=<?php echo $get_update_id; ?>" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td colspan="2"><h1>เเบบฟอร์มเเก้ไขข้อมูลสมาชิก</h1></td>
                    </tr>

                    <tr>
                        <td>ชื่อ สกุล</td>
                        <td><input type="text" name="fname" placeholder="ชื่อ..สกุล.." value="<?php echo $row_select['member_name']; ?>"></td>
                    </tr>

                    <tr>
                        <td>เพศ</td>
                        <td>
                        <?php 
                        if($row_select['member_gender']=="ชาย")
                        {
                            $male="checked";
                            $female="";
                        }
                        else
                        {
                            $male="checked";
                            $female="";
                        }
                        ?>
                        <input type="radio" name="fgender" value="ชาย" <?php echo $male ;?>>ชาย                  
                        <input type="radio" name="fgender" value="หญิง" <?php echo $female ;?>>หญิง 
                        </td>
                    </tr>

                    <tr>
                        <td>ประเภท</td>
                        <td>
                        <select name="ftype">  
                        <?php
                        try
                        {
                            $sql_selects= $conn->prepare("SELECT * FROM member_type_tb"); 
                            $sql_selects->execute();//สั่งให้ sql_select ทำงาน
                            while($row_selects = $sql_selects->fetch(PDO::FETCH_ASSOC))
                            {       
                                ?>
                                <option value="<?php echo $row_selects['member_type_id']; ?>"><?php echo $row_selects['member_type_name'];?></option> 
                                <?php 
                            }
                        }
                        catch(PDOException $e) 
                        {
                            echo "Error: " . $e->getMessage();
                        }
                        $conn = null;//เคลีย์ค่าในการดึงข้อมูล     
                        ?>
                        </select>    
                        </td>

                    </tr>
                    
                    <tr>
                        <td>ที่อยู่</td>
                        <td><input type="text" name="faddress" placeholder="ที่อยู่.." value="<?php echo $row_select['member_address']; ?>"></input></td>
                    </tr>

                    <tr>
                        <td>รูปภาพ</td>
                        <td> <input type="file" name="fimg"></td>
                    </tr>
                
                    <tr>
                        <td></td>
                        <td><input type="submit" value="บันทึกข้อมูลสมาชิก" id="green"></td>
                    </tr>
                    
                    <tr class= "hubi"></tr>

                    <tr>
                        <td></td>
                        <td><center><a href="member_select.php" id ="blue">สมาชิกทั้งหมด</a></center></td>
                    </tr>
                </table>
            </form>
            </center>
        </div>
    </body> 
</html>
