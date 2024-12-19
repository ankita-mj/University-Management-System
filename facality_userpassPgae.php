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
        <table>
            <tr>
                <th>Username: </th>
                <td><?php

                if(isset($_SESSION['userName'])){
                    echo $_SESSION['userName'];
                }
                ?></td>
            </tr>
            <tr>
                <th>Password: </th>
                <td><?php
                if(isset($_SESSION['password'])){
                    echo $_SESSION['password'];
                }
                ?></td>
                </tr>
                <tr>
                    <td><a href="changeDP.php"><button class="btn">ChangeDP</button></a></td>
                    <td><a href="facality_profile.php"><button class="btn">Skip</button></a></td>
                </tr>
            <table>
    </div>
    </center>
</body>
</html>