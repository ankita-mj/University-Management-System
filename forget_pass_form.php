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
      include "include/functions.php";
    ?>
    <form action="lib/login.php">
      <div class="msg">
      <?php
        if(isset($_REQUEST['msg'])){
           echo $_REQUEST['msg'];
        }
      ?>
      </div>
        <table border>
            <tr><th colspan="2"><h1 class="h1"><u>Forget Password Form</u></h1></th></tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="uname" id="uname"/></td>
            </tr>
            <tr>
                <td>Security Question: </td>
              <td colspan="2">
                <select name="seq_ques" id="seq_ques">
                   <option value="">Plz select</option>
                   <?=get_list("seq_ques","id","que","0")?>
                </select>
            </td>
            </tr>
            <tr>
                <td>Security Answer: </td>
                <td><input type="password" id="seq_ans" name="seq_ans"/></td>
                <td id="show" name="show">
                   <img src='image/eye-show.svg' id="eye" onClick='showpass();' height='18px' width='25px' alt='error'/>
                </td>
            </tr>
            <tr align="center">
                <td  colspan="2"><input type="submit"/>
                <input type="reset"/></td>
                <input type="hidden" id="act" name="act" value="pass_recover"/>
            </tr>
            
        </table>
    </form>
</center>
</body>
</html>