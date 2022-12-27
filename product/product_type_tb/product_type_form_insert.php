<html>
    <head>
        <link href= "../../style/style_insert_update.css" rel = "stylesheet">  
        <title>เเบบฟอร์มบันทึกข้อมูลประเภทสินค้า</title>
    </head>
    <body>
        <div>
        <form action="product_type_insert.php" method="post">
            <center>
            <table>
            <tr>
                <td colspan="2"><h1>เเบบฟอร์มบันทึกข้อมูลประเภทสินค้า</h1></td>
            </tr>

            <tr>
                <td>ประเภท</td>
                <td><input type="text" name="ftype" placeholder="ชื่อประเภท.."></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="submit" value="บันทึกข้อมูลสินค้า" id="green"></td>
            </tr>

            <tr class= "hubi"></tr>

            <tr>
                <td></td>
                <td><center><a href="product_type_select.php" id ="blue">สินค้าทั้งหมด</a></center></td>
            </tr>
        </table>
            </center>
        </form>
        </div>
    </body>
</html>
