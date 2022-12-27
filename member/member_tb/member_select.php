h<?php include "../../connect_db.php"; ?> 

<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href= "../../style/style_select.css" rel = "stylesheet">
        <title>เเสดงข้อมูลสมาชิกทั้งหมด</title>
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
                <td colspan="2"><h1>ข้อมูลสมาชิกทั้งหมด</h1></td>
            </tr>
            <table class="table">               
                <tr>
                    <th><center>รหัสสมาชิก</center></th>
                    <th><center>ชื่อสมาชิก</center></th>
                    <th><center>เพศ</center></th>
                    <th><center>ประเภท</center></th>
                    <th><center>ที่อยู่</center></th>
                    <th><center>รูปสินค้า</center></th>
                    <th><center>เเก้ไข</center></th>
                    <th><center>ลบ</center></th>
                    <th><center>เลือก</center></th>
                </tr>

            <tbody>
                <?php
                try
                {
                    $sql_select= $conn->prepare("SELECT * FROM member_tb LEFT JOIN member_type_tb
                    ON member_tb.member_type_id = member_type_tb.member_type_id");
                    $sql_select->execute();//สั่งให้ sql_select ทำงาน
                    while($row_select = $sql_select->fetch(PDO::FETCH_ASSOC))
                    {        
                        ?>
                        <tr>
                            <td><center><?php echo $row_select['member_id'];?></center></td>
                            <td><center><?php echo $row_select['member_name'];?></center></td> 
                            <td><center><?php echo $row_select['member_gender'];?></center></td>
                            <td><center><?php echo $row_select['member_type_name'];?></center></td>  
                            <td><center><?php echo $row_select['member_address'];?></center></td> 
                    
                            <?php
                            $nullfile = $row_select['member_img'];      
                            if($nullfile==null)
                            {
                                $nullfile = "note file";  
                                ?>
                                <td><center><?php echo $nullfile;?></center></td> 
                                <?php
                            }
                            else
                            {
                                ?>
                                <td><center><img src="member_img_tb/<?php echo $nullfile;?>"></center></td> 
                                <?php 
                            } 
                            ?>

                            <td><center><a id="update" href="member_form_update.php?update_id=<?php echo $row_select['member_id'];  ?>"  
                            onclick="return confirm('คุณเเน่ใจที่จะเเก้ไขข้อมูลใช่หรือไม่ ?');" > เเก้ไข </a></center></td> 

                            <td><center><a id="delete" href="member_delete.php?delete_id=<?php echo $row_select['member_id']; ?>"
                            onclick="return confirm('คุณเเน่ใจที่จะลบข้อมูลใช่หรือไม่ ?');">ลบ </a></center></td>  

                            <form action="multiple_delete.php" method = "post">
                            <td>
                                <center><input type="checkbox"  name = "idcheckbox[]" value = "<?php echo $row_select['member_id'];  ?>"></center>
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
                    <a href="member_form_insert.php" id ="green">เพิ่มข้อมูลสินค้า</a>
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
