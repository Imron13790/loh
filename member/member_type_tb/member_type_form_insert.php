<html>
    <head>
    <link href= "../../style/style_insert_update.css" rel = "stylesheet">  
        <title>เเบบฟอร์มกรอกประเภทข้อมูลสมาชิก</title>
    </head>
    <body>
        <div>
        <form action="member_type_insert.php" method="post">
        <center>
        <table>
            <tr>
                <td colspan="2"><h1>เเบบฟอร์มบันทึกข้อมูลประเภทสมาชิก</h1></td>
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
                <td><center><a href="member_type_select.php" id ="blue">สมาชิกทั้งหมด</a></center></td>
            </tr>
        </table>
        </center>
        </form>
        </div>
    </body>
</html>
