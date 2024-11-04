<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src = "javaScript/javascript.js"></script>
</head>
<body>
    <center>
    <?php
      // include "include/header.php";
      // include "include/img.php";
    ?>
    <form action="lib/login.php">
      <div class="msg">
      <?php
        if(isset($_REQUEST['msg'])){
           echo $_REQUEST['msg'];
        }
      ?>
      </div>
        <table>
            <tr><th colspan="2"><h1 class="h1"><u>Login form</u></h1></th></tr>
            <tr>
              <td>Username:<input type="text" name="uname" id="uname" placeholder="Enter Username/Email"/></td>
            </tr>
            <tr>
              <td>Password:
                   <input type="password" name="pass" id="pass" placeholder="Enter Password"/>
              </td>   
              <td id="show" name="show">
                <img src='image/eye-show.svg' id="eye" onClick='showpass();' height='18px' width='25px' alt='error'/>
            </td>
            </tr>
            <tr>
              <td align="center">
                <input class="btn2" type = "submit" value = "submit"/>
                <a href="forget_pass_form.php">Forget Password??</a>
              </td>
              <!-- <td></td> -->
            </tr>
            <tr>
              <td>
                <input type="hidden" name="act" id="act" value="login"/>
              </td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>