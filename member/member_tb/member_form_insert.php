<?php include "../../connect_db.php";  //เชื่อมต่อ database  ?>

<html>
    <head>
    <link href= "../../style/style_insert_update.css" rel = "stylesheet"> 
        <title>เเบบฟอร์มบันทึกข้อมูลสมาชิก</title>
    </head>
    <body>
        <div>
        <center>
        <form action="member_insert.php" method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td colspan="2"><h1>เเบบฟอร์มบันทึกข้อมูลสมาชิก</h1></td>
                </tr>
                <tr>
                    <td>ชื่อ-สกุล</td>
                    <td><input type="text" name="fname" placeholder="ชื่อ..สกุล.."></td>
                </tr>
                <tr>
                    <td>เพศ</td>
                    <td>
                        <input type="radio" name="fgender" value="ชาย">ชาย
                        <input type="radio" name="fgender" value="หญิง">หญิง
                    </td>
                </tr>

                <tr>
                    <td>ประเภท</td>
                    <td>
                    <select name="ftype">  
                        <?php
                            try{
                                $sql_select= $conn->prepare("SELECT * FROM member_type_tb"); 
                                $sql_select->execute();//สั่งให้ sql_select ทำงาน
                                while($row_select = $sql_select->fetch(PDO::FETCH_ASSOC)){
                                        
                        ?>
                        <option value="<?php echo $row_select['member_type_id']; ?>"><?php echo $row_select['member_type_name'];?></option> 
                        <?php 
                                }
                            }
                        catch(PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                        $conn = null;//เคลีย์ค่าในการดึงข้อมูล     
                        ?>
 
                    </select>    
                    </td>
                </tr>
                <tr>
                    <td>ที่อยู่</td>
                    <td><input type="text" name="faddress" placeholder="ที่อยู่.."></input></td>
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
