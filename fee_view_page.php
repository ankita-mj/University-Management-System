<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
    <script src="javaScript.javascript.js"></script>
</head>
<body>
    <center>
    <?php
    session_start();
    if(isset($_SESSION['uname'])){
      include("include/header.php");
      include("include/img.php");
      ?>
      <h1 class="h1">Fees</h1>
      <table border="2px">
        <tr>
        <td colspan="9"><a href="fees_add.php"><button class="btn">All Students PayFee</button></a></td>
        </tr>
          <tr>
              <th>Student Id</th>
              <th>Name</th>
              <th>Father Name</th>
              <th>Course</th>
              <th>Total_Fees</th>
              <th>Amount</th>
              <th>Balance</th>
              <th>Date</th>
              <th>Description</th>
              <th>Action</th>
          </tr>
          <?php
      $conn = mysqli_connect("localhost","root","padduu","university",3307);
      $sql = "SELECT * from fees inner join course on fees.course = course.c_id order by (status = 'null') desc;";
      $f=0;
      $result= mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <tr>
            <td><?=$row['sid']?></td>
            <td><?=$row['sname']?></td>
            <td><?=$row['fname']?></td>
            <td><?=$row['c_name']?></td>
            <td><?=$row['total_fee']?></td>
            <td><?=$row['amt']?></td>
            <td><?=$row['balance']?></td>
            <td><?=$row['date']?></td>
            <td><?=$row['description']?></td>
            <td><?php
            $bal = explode(",",$row['balance']);
            $balance = $bal[sizeof($bal)-1];
             if($balance == 0){
               echo "<h4 class='complete' style='color:green;'> Completed</h4>";
               $sql3 = "UPDATE fees set status = 'completed' where sid= {$row['sid']}";
               mysqli_query($conn,$sql3);
               
            }else{
                 echo "<a href='payFee.php?sid={$row['sid']}'><button class='btn2'> Pay Fees</button></a>";

             }
            ?></td>
        </tr>
        <?php
        }
        }else{
            echo"student not available...";
        }
        ?>
      </table>
</center>
<?php
  include "include/footer.php";
    }else{
      header("location: http://localhost/class/university_project/?msg=login first to continue");
    }
?>
</body>
</html>