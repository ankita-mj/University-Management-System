<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
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
              <th>Student Id</th>
              <th>Name</th>
              <th>Father Name</th>
              <th>Course</th>
              <th>Image</th>
              <th>Action</th>
          </tr>
          <?php
      $conn = mysqli_connect("localhost","root","padduu","university",3307);
      $sql = "SELECT * FROM student inner join course on student.course = course.c_id;";
      $result= mysqli_query($conn,$sql);
      if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
    ?>
        <tr>
            <td><?=$row['sid']?></td>
            <td><?=$row['sname']?></td>
            <td><?=$row['fname']?></td>
            <td><?=$row['c_name']?></td>
            <td><img src="uploads/<?=$row['img']?>" height="100px" width="100px"/></td>
            <td>
                <?php
                   $sql2 = "SELECT status FROM fees where sid = {$row['sid']}"; 
                   $result2 = mysqli_query($conn,$sql2); 
                   if(mysqli_num_rows($result2)>0){
                      $row2 = mysqli_fetch_assoc($result2); 
                      if($row2['status']=='completed'){
                        echo "<h4 class='complete' style='color:green;'> Completed</h4>";
                      }else{
                        echo "<a href='payFee.php?sid={$row['sid']}'><button class='btn'>PayFee</button></a>";
                      }
                   }else{
                    echo "<a href='payFee.php?sid={$row['sid']}'><button class='btn'>PayFee</button></a>";
                   }
                ?>
            </td>
        </tr>
        <?php
        }
        }else{
            echo"student not available...";
        }
        ?>
      </table>
      <?php
        include "include/footer.php";
    }else{
      header("location: http://localhost/class/university_project/?msg=login first to continue");
    }
      ?>
</center>
</body>
</html>