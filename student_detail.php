<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="javaScript/javascript.js"></script>

    <style>
        h1.stu-detail{
    color:red;
    height:20px;
    margin-top:0px;
}

    </style>
    </head>
<body>
    <center>
    <?php
    session_start();
    if(isset($_SESSION['uname'])){
   include "include/header.php";
   include "include/img.php";
   include "include/functions.php";
      $conn =mysqli_connect("localhost","root","padduu","university",3307);
      $sql = "SELECT * FROM student WHERE sid = {$_GET['sid']}";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
    ?>
    <h1 class="stu-detail">Student Details</h1>
    <table border="2px" width="100%">
      <?php
      $s = "SELECT * FROM EXAM where course = {$row['course']};";
      $res = mysqli_query($conn,$s);
      if(mysqli_num_rows($res)>0){
      while($r = mysqli_fetch_assoc($res)){
         if($r['course'] == $row['course']){
           echo "<tr align='center'>
             <th colspan='5'><a href='lib/fee.php?action=check_fee&sid={$row['sid']}'><button style='height:40px;' class='btn2'><b>Admit Card</b></button></a></th>
           </tr>";
           break;
          }
      }}else{
        echo "Admit coming soon";
      }
      ?>
   <tr>
     <td>Enter Name:</td>
     <td colspan="2"><input type="text" name="sname" id="sname" value="<?=$row['sname']?>" readonly/></td>
     <td>Enter FatherName:</td>
     <td colspan="2"><input type="text" name="fname" id="fname" value="<?=$row['fname']?>"readonly/></td>
    </tr> 
    <tr>
      <td>Gender:</td>
      <td colspan="2"><input type="text" name="sname" id="sname" value="<?=$row['gen']?>" readonly/></td>
      <td>Phone Number:</td>
      <td colspan="2"><input type="text" name="fname" id="fname" value="<?=$row['phone']?>"readonly/></td>
    </tr> 
   <tr>
     <td>Course:</td>
     <?php
      $sql2 = "SELECT * FROM student RIGHT JOIN course ON student.course = course.c_id where sid= {$_GET['sid']}";
      $result2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($result2); 
      ?>
     <td colspan="2"><input type="text" name="course" id="course" value="<?=$row2['c_name']?>" readonly/></td>
     <td>City:</td>
     <?php
      $sql1 = "SELECT * FROM student RIGHT JOIN city ON student.city = city.c_id";
      $result1 = mysqli_query($conn, $sql1);
      $row1 = mysqli_fetch_assoc($result1); 
      ?>
     <td colspan="2"><input type="text" name="city" id="city" value="<?=$row1['c_name']?>" readonly/></td>
    </tr> 
    <tr>
      <td>State:</td>
      <?php
      $sql3 = "SELECT * FROM student RIGHT JOIN state ON student.state = state.s_id where sid= {$_GET['sid']}";
      $result3 = mysqli_query($conn, $sql3);
      $row3 = mysqli_fetch_assoc($result3); 
      ?>
     <td colspan="2"><input type="text" name="state" id="state" value="<?=$row3['s_name']?>" readonly/></td>
     <td>Country:</td>
     <?php
      $sql4 = "SELECT * FROM student RIGHT JOIN con ON student.country = con.c_id where sid= {$_GET['sid']}";
      $result4 = mysqli_query($conn, $sql4);
      $row4 = mysqli_fetch_assoc($result4); 
      ?>
     <td colspan="2"><input type="text" name="country" id="country" value="<?=$row4['c_name']?>"readonly/></td>
    </tr> 
    <tr>
      <td>Pincode:</td>
      <td colspan="2"><input type="text" name="pincode" id="pincode" value="<?=$row['pincode']?>" readonly/></td>
      <td>Email:</td>
      <td colspan="2"><input type="text" name="emal" id="email" value="<?=$row['email']?>"readonly/></td>
    </tr> 
    <tr>
      <td>Date of Birth:</td>
      <td colspan="2"><input type="text" name="dob" id="dob" value="<?=$row['dob']?>" readonly/></td>
      <td>Date Of Joining:</td>
      <td colspan="2"><input type="text" name="doj" id="doj" value="<?=$row['doj']?>"readonly/></td>
    </tr> 
    <tr>
      <td>Qualification:</td>
      <td colspan="2"><?=get_check_list("qualification","q_id","q_name","qual",$row['qualification'])?>
      <td>Local Address:</td>
      <td colspan="2"><input type="text" name="add1" id="add1" value="<?=$row['address']?>"readonly/></td>
    </tr> 
    <tr>
      <td>Permanant Address:</td>
      <td colspan="2"><input type="text" name="add2" id="add2" value="<?=$row['address2']?>" readonly/></td>
      <td>Image:</td>
      <td colspan="2"><img src="uploads/<?=$row['img']?>" height="100px" width="100px"/></td>
    </tr> 
    <tr>
      <th colspan="3"><button onClick="printPage();">Print</button></th>
   <th colspan="3"><button onClick="history.back();">Back</button></th>
  </tr>
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