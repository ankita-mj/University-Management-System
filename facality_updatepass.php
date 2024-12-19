<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css"/>
    <!-- <script src="javaScript/jquery-3.7.1.js"></script> -->
    <script src="javaScript/javascript.js"></script>

</head>
<body>
    <center>
        <?php
          session_start();
          if(isset($_SESSION['userName'])){
        ?>
<table style="width:300px;">
    <form action="lib/registration.php">
            <tr><th colspan="2"><h1 class="h1"><u>Update password form</u></h1></th></tr>
            <tr>
                <td>New Password:</td>
                <td>
                    <input type="password" name="new_pass" id="new_pass" placeholder="Enter New Password"/>
                </td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td>
                    <input type="password" name="con_pass" id="con_pass" placeholder="Confirm Password"/>
                    <div id="alertmsg"></div>   
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <p id="para" style="margin:0px; font-size:13px;">(atleast one upper case, one lower case,special character required for strong password)</p>
                </td>
            </tr>
            <tr>
              <td>
                <input type="submit" value="Recover" onClick="return update_pass(event);"/>
                <input type="hidden" value="recover_pass" name="action" id="action"/>
                
              </td>
            </tr>
        </table>
    </form>
<?php
          }else{
            header("location: http://localhost/class/university_project/index.php");
          }
?>
</center>
</body>
</html>