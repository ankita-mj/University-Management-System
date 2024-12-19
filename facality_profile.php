<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        li{
            display:inline;
            margin-left:20px;
        }
        .box{
          width:700px;
          height:700px;
             box-shadow:10px 10px 30px gray;
             margin-top:30px;
             padding-top:0px;
        }
        .image{
            margin-left:120px;
            width:120px;
            height:120px;
            border-radius:70px;
            /* padding:20px; */
            border:2px solid black;
            overflow:hidden;
        }
        .image img{
            /* object-fit:cover; */
        }
        .h1{
            color:red;
        }
        .msg{
            background-color:skyblue;
            color:red;
            text-align:center;
        }
        
    </style>
    <link rel="shtylesheet" href="css/style.css"/>
</head>
<body>
<center>
    <div class="msg">
         <?php
         if(isset($_REQUEST['msg'])){
           echo $_REQUEST['msg'];
         }
         ?>
         </div>
    <div class="box">
    <?php
    session_start();
      $conn = mysqli_connect("localhost","root","","university");
      $sql = "SELECT * FROM facality inner join seq_ques on facality.sec_que = seq_ques.id where facality.user_name = '{$_SESSION['userName']}'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);

    ?>
    <table>
        <tr>
            <th colspan="3" class="h1"><h1 class="h1">Profile Page</h1></th>
        <tr>
        <tr rowspan="3">
            <td>
              <li><a href="facality_edit.php?id=<?=$row['id']?>">Edit</a></li>
              <li><a href="facality_updatepass.php">Update Password</a></li>
              <li><a href="lib/registration.php?action=facality_logout">Logout</a></li>
            </td>
            <td colspan="2">
                <div class="image">
                    <img src="<?=$row['image']?>" height="120px" width="120px"/>
                </div>
            </td>
        <tr>
            <tr>
                <td>Name:</td>
                <td><?=$row['name']?></td>
                <td><a href="changeDP.php">ChangeDP</a></td>
            </tr>
            <tr>
                <td>Gender:</td>
                <td colspan="2"><?=$row['gender']?></td>
            </tr>
            <tr>
                <td>Qualification:</td>
                <td colspan="2"><?=$row['qual']?></td>
            </tr>
            <tr>
                <td>phone:</td>
                <td colspan="2"><?=$row['phone']?></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td colspan="2"><?=$row['email']?></td>
            </tr>
            <tr>
                <td>Experience:</td>
                <td colspan="2"><?=$row['exp']?></td>
            </tr>
            <tr>
                <td>Area Of Interest:</td>
                <td colspan="2"><?=$row['interest']?></td>
            </tr>
            <tr>
                <td>DOJ:</td>
                <td colspan="2"><?=$row['doj']?></td>
            </tr>
            <tr>
                <td>Sequrity Question:</td>
                <td colspan="2"><?=$row['que']?></td>
            </tr>
            <tr>
                <td>Sequrity Answer:</td>
                <td colspan="2">****</td>
            </tr>
            <tr>
                <td>Designation:</td>
                <td colspan="2"><?=$row['desig']?></td>
            </tr>
            <tr>
                <td>Stream:</td>
                <td colspan="2"><?=$row['stream']?></td>
            </tr>
        
    </table>
    </div>   
</center>   
</body>
</html>