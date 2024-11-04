<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="javaScript/javascript.js"></script>

</head>
<body>
   <center>
<?php 
session_start();
if(isset($_SESSION['uname'])){
   include "include/header.php";
   include "include/img.php";
   ?>
<table border="2px">
    <?php
    if(isset($_GET['msg'])){
        ?>
    <tr>
        <td class='msg' colspan='10' style="text-align:center; font-size:20px"><b><?="{$_GET['msg']}"?></b></td>
        <td colspan='10'>
         <a href="student_add.php"><button  class='btn'>Add Student</button></a>||
         <a href='javascript:printPage();'>PrintOut</a>||
         <a href='javascript:delete_all_student(this);'>Delete All</a>
      </td>
    </tr>
    <?php
    }else{
       echo 
       "<tr>
        <td class='msg' colspan='10'>STUDENT RECORDS</td>
        <td colspan='10'>
          <a href='student_add.php'><button  class='btn'>Add Student</button></a>||
          <a href='javascript:printPage();'>PrintOut</a>||
         <a href='javascript:delete_all_student();'>Delete All</a>
        </td>    
      </tr>"; 
    }
    ?>
     
     <?php
      $conn = mysqli_connect("localhost","root","padduu","university",3307);
     $sql = "SELECT * FROM student";
     $result = mysqli_query($conn,$sql);
     if(mysqli_num_rows($result)>0){
?>
           <form action='lib/student.php' method='get' name='student_view'>

        <tr>
        <th><input type='checkbox' onclick='select_all(this);' name='checktop' id='checktop'/></th>
        <th>ID</th>
        <th>Name</th>
        <th>Father Name</th>
        <th>Gender</th>
        <th>Phone</th>
        <th>Pincode</th>
        <th>Email</th>
        <th>DOB</th>
        <th>DOJ</th>
        <th>Image</th>
        <th>Loacl Address</th>
        <th>Permanent Address</th>
        <th colspan='3'>Actions</th>
     </tr>
     <?php
     while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><input type="checkbox" name="student_id[]" id="student_id[]" value="<?=$row['sid']?>"/></td>
            <td><?=$row['sid']?></td>
            <td><?=$row['sname']?></td>
            <td><?=$row['fname']?></td>
            <td><?=$row['gen']?></td>
            <td><?=$row['phone']?></td>
            <td><?=$row['pincode']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['dob']?></td>
            <td><?=$row['doj']?></td>
            <td><img src="uploads/<?=$row['img']?>" height="50px" width="50px"/></td>
            <td><?=$row['address']?></td>
            <td><?=$row['address2']?></td>
            <td><a href="student_add.php?s_id=<?= $row['sid']?>">Edit</a></td>
            <td><a href="javascript: studentDelete(<?= $row['sid']?>)">Delete</a></td>
            <td><a href="student_detail.php?sid=<?= $row['sid']?>">Details</a></td>
        </tr>
     <?php     
     }
     }else{
        echo "Record not found!!";
     }
     ?>
     <input type="hidden" name="action"/>
     <input type="hidden" name="id"/>
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