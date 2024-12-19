<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .box{
          width:400px;
          height:100px;
             box-shadow:10px 10px 30px gray;
             margin-top:30px;
             padding-top:40px;
        }
    </style>
    <link rel="stylesheet" href="css/style.css"/>
<head>
<body>
    <center>
    <?php
      session_start();
    ?>
    <div class="box">
        <form action="lib/registration.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Image: </td>
                <td><input type="file" name="img" id="img"/></td>
            </tr>
            <tr><input type="hidden" name="action" id="action" value="updateImg"/></tr>
            <tr>
                <td>
                    <input type="submit" value="Update" class="btn2"/>
                </td>
            </tr>
    </form>
        </table>
    </div>
    </center>
</body>
</html>