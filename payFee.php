<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="javaScript/javascript.js"></script>

    <style>
        .h1{
             color:red;
        }
        .box{
          width:350px;
             box-shadow:10px 10px 30px gray;
        }
        th{
          text-align:left;
        }
    </style>
</head>
<body>
    <center>
        <?php
        session_start();
        if(isset($_SESSION['uname'])){
    include "include/header.php";
    ?>
    <div class="box">
    <h1 class="h1"><u>PayFees</u></h1>
    <div class="msg">
         <?php
         if(isset($_REQUEST['msg'])){
           echo $_REQUEST['msg'];
         }
         echo "</div>";
      $conn = mysqli_connect("localhost","root","padduu","university",3307);
      $sql = "SELECT * FROM student inner join course on student.course = course.c_id where sid = {$_GET['sid']};";
      $result= mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_assoc($result)

    ?>
    <form action="lib/fee.php" method="post" onSubmit="return fee_valid(event);">
    <table cellspacing="10">
        <tr>
          <th>Student Id:</th>
          <td><input type="text" id="sid" name="sid" value="<?=$row['sid']?>" readonly/></td>
        </tr>
        <tr>
          <th>Student Name:</th>
          <td><input type="text" id="sname" name="sname" value="<?=$row['sname']?>" readonly/></td>
        </tr>
        <tr>
          <th>Father Name:</th>
          <td><input type="text" id="fname" name="fname" value="<?=$row['fname']?>" readonly/></td>
        </tr>
        <tr>
          <th>Course:</th>

          <input type="hidden" value="<?=$row['c_id']?>" name="c_id" id="c_id"/>
          <td><input type="text" id="c_name" name="c_name" value="<?=$row['c_name']?>" readonly/></td>
        </tr>
        <tr>
          <th>Total:</th>
          <td><input type="text" id="c_amt" name="c_amt" value="<?=$row['c_amount']?>" readonly/></td>
      </tr>
        <tr>
          <th>Balance</th>
          <td>
            <?php
            $sql2 = "SELECT balance FROM fees WHERE sid = {$_GET['sid']}";
            $result2 = mysqli_query($conn,$sql2);
            if(mysqli_num_rows($result2)>0){
              $row2 = mysqli_fetch_assoc($result2);
              //  echo $row2['balance'];
               $bal = explode(",",$row2['balance']);//string to array
              $balance = $bal[sizeof($bal)-1];
               echo "<input type='text' id='balance' name='balance' value='{$balance}' readonly/>";

            }else{
            echo "<input type='text' id='balance' name='balance' value='{$row['c_amount']}' readonly/>";
        }
            // die();
            
          //   if($row2['min(balance)']!=null){
          //     echo "<input type='text' id='balance' name='balance' value='{$row2['min(balance)']}' readonly/>";
          //   }else{
          //   echo "<input type='text' id='balance' name='balance' value='{$row['c_amount']}' readonly/>";
          // }
            ?>
          </td>
        </tr>
        <tr>
          <th>Amount:</th>
          <td><input type="text" id="amt" name="amt"/></td>
        </tr>
        <tr>
          <th>Date:</th>
          <td><input type="text" id="date" name="date" value="<?=date('d/M/Y');?>" readonly/></td>
        </tr>
        <tr>
          <th>Description:</th>
          <td><textarea id="text" id="txt" name="txt"></textarea></td>
        </tr>
        </table>
        </div>
        <button class="btn2">Pay</button>
        <input type="hidden" value="<?=$row['c_amount']?>" name="course" id="course"/>
        <input type="hidden" value="add_fee" name="action" id="action"/>
        <?php
        }else{
          echo"student not available...";
        }
        ?>
        </form>
        <button class="btn2" onClick="history.back();">cancel</button>
        <?php
          include "include/footer.php";
        }else{
          header("location: http://localhost/class/university_project/?msg=login first to continue");
        }
        ?>
</center>
</body>
</html>