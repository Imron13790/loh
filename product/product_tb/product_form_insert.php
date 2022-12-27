<?php include "../../connect_db.php";  //เชื่อมต่อ database  ?>

<html>
    <head>
        <link href= "../../style/style_insert_update.css" rel = "stylesheet">  
        <title>เเบบฟอร์มบันทึกข้อมูลสินค้า</title>
    </head>
    <body>
        <div>
            <center>
            <form action="product_insert.php" method="post" enctype="multipart/form-data">
                <table> 
                    <tr>
                        <td colspan="2"><h1>เเบบฟอร์มบันทึกข้อมูลสินค้า</h1></td>
                    </tr>
                    
                    <tr>
                        <td>ชื่อสินค้า</td>
                        <td><input type="text" name="fname" placeholder="ชื่อสินค้า.."></td>
                    </tr>

                    <tr>
                        <td>ประเภทสินค้า</td>
                        <td><select name="ftype">  
                            <?php
                            try
                            {
                                $sql_select= $conn->prepare("SELECT * FROM product_type_tb"); 
                                $sql_select->execute();//สั่งให้ sql_select ทำงาน
                                while($row_select = $sql_select->fetch(PDO::FETCH_ASSOC))
                                {
                                        
                                    ?>
                                    <option value="<?php echo $row_select['product_type_id']; ?>"><?php echo $row_select['product_type_name'];?></option> 
                                    <?php 
                                }
                            }
                            catch(PDOException $e) 
                            {
                                echo "Error: " . $e->getMessage();
                            }
                            $conn = null;//เคลีย์ค่าในการดึงข้อมูล     
                            ?>
                        </select></td>  
                    </tr>

                    <tr>
                        <td>ผู้ผลิต</td>
                        <td><input type="text" name="fdealer" placeholder="ผู้ผลิต.."></td>
                    </tr>

                    <tr>
                        <td>ราคา</td>
                        <td><input type="text" name="fprice" placeholder="ราคา.."></td>
                    </tr>

                    <tr>
                        <td>รูปภาพ</td>
                        <td> <input type="file" name="fimg"></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td><input type="submit" value="บันทึกข้อมูลสินค้า" id="green"></td>
                    </tr>
                    
                    <tr class= "hubi"></tr>
                   
                    <tr>
                        <td></td>
                        <td><center><a href="product_select.php" id ="blue">สินค้าทั้งหมด</a></center></td>
                    </tr>
                </table>
            </form>
            </center>
        </div>
    </body> 
</html>
