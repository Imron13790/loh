<html>
    <head> 
        <title>เเบบฟอร์มบันทึกข้อมูลรูปภาพ</title>
    </head>
    <body>
        <div>
            <center>
            <form action="img_insert.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td colspan="2"><h1>เเบบฟอร์มบันทึกข้อมูลรูปภาพ</h1></td>
                    </tr>

                    <tr>
                        <td>ชื่อรูป</td>
                        <td> <input type="text" name="fimg_name"></td>
                    </tr>
                    
                    <tr>
                        <td>รูปภาพ</td>
                        <td> <input type="file" name="fimg"></td>
                    </tr>
                
                    <tr>
                        <td></td>
                        <td><input type="submit" value="บันทึกรูป"></td>
                    </tr>
                </table>
            </form>
            </center>
        </div>
    </body> 
</html>
