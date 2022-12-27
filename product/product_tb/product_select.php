<?php include "../../connect_db.php"; ?> 

<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href= "../../style/style_select.css" rel = "stylesheet">
        <title>เเสดงข้อมูลสินค้าทั้งหมด</title>
        <style>
            img
            {
                width: 90px;
                border-radius: 8px;
            }
        </style>
    </head>
    
    <body>
        <div>
            <center> 
            <tr>
                <td colspan="2"><h1>ข้อมูลสินค้าทั้งหมด</h1></td>
            </tr>
            <table class="table">           
                <tr>
                    <th><center>รหัสสินค้า</center></th>
                    <th><center>ชื่อสินค้า</center></th>
                    <th><center>ประเภทสินค้า</center></th>
                    <th><center>ผู้ผลิต</center></th>
                    <th><center>ราคา</center></th>
                    <th><center>รูปสินค้า</center></th>
                    <th><center>เเก้ไขข้อมูล</center></th>  
                    <th><center>ลบข้อมูล</center></th>
                    <th><center>เลือก</center></th>
                </tr>
            
            <tbody>
                <?php
                try
                {
                    $sql_select= $conn->prepare("SELECT * FROM product_tb LEFT JOIN product_type_tb
                    ON product_tb.product_type = product_type_tb.product_type_id");
                    $sql_select->execute();//สั่งให้ sql_select ทำงาน
                    while($row_select = $sql_select->fetch(PDO::FETCH_ASSOC))
                    {
                        ?>
                        <tr>
                            <td><center><?php echo $row_select['product_id'];  ?></center></td>
                            <td><center><?php echo $row_select['product_name']; ?></center></td> 
                            <td><center><?php echo $row_select['product_type_name']; ?></center></td> 
                            <td><center><?php echo $row_select['product_dealer']; ?></center></td>   
                            <td><center><?php echo $row_select['product_price']; ?></center></td> 
                            <td><center><img src="product_img_tb/<?php echo $row_select['product_img'];?>"></center></td>    
                            
                            <td><center>
                                <a id ="update" href="product_form_update.php?update_id=<?php echo $row_select['product_id'];  ?>"  
                                    onclick="return confirm('คุณเเน่ใจที่จะเเก้ไขข้อมูลใช่หรือไม่ ?');" > เเก้ไข </a>
                            </center></td> 

                            <td><center>
                                <a id="delete" href="product_delete.php?delete_id=<?php echo $row_select['product_id']; ?>"
                                    onclick="return confirm('คุณเเน่ใจที่จะลบข้อมูลใช่หรือไม่ ?');">ลบ </a>
                            </center></td>  
                            
                            <form action="multiple_delete.php" method = "post">
                            <td>
                                <center><input type="checkbox"  name = "idcheckbox[]" value = "<?php echo $row_select['product_id'];  ?>"></center>
                            </td>   
                        </tr>
                        <?php 
                    }
                }
                catch(PDOException $e) 
                {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;//เคลีย์ค่าในการดึงข้อมูล
                ?>
            </tbody>
            </table>

            <tr>
                <td>
                <a href="product_form_insert.php" id ="green">เพิ่มข้อมูลสินค้า</a>
                </td>

                <td>
                <input type="submit" value = "ลบ" id ="red"></a>
                </td>
            </form>

                <td>
                <button onclick = "checkall()" id ="blue">เลือกทั้งหมด</button>
                </td>

                <td>
                <button onclick = "uncheckall()" id ="yellow">ยกเลิก</button>
                </td>
            </tr>            
            </center>
        </div>
    </body>
    <script>
        function checkall()
        {
           var formele =document.forms[0].length;
           for(i=0;i<formele-1;i++)
           {
                document.forms[0].elements[i].checked=true;
           }
       
        }
        function uncheckall()
        {
           var formele =document.forms[0].length;
           for(i=0;i<formele-1;i++)
           {
                document.forms[0].elements[i].checked=false;
           }
       
        }
    </script>
</html>
