<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" href="css/style.css"/>
</head>

<body>
<?php 
session_start();
if(isset($_SESSION['uname'])){
   error_reporting(false); 
   include "include/header.php";
   include "include/img.php";
   include "include/functions.php";
   if($_GET['s_id']){
    $conn = mysqli_connect("localhost","root","padduu","university",3307);
      $sql = "SELECT * FROM student WHERE sid = {$_GET['s_id']}";
      // die;
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
   }
   ?>
   
<form action="lib/student.php" method="post" enctype="multipart/form-data" onSubmit= "return stu_valid(this)" name="stu_frm" id="stu_frm">
<table border="2px" width="100%">
   <tr>
     <td>Enter Name:</td>
     <td colspan="2"><input type="text" name="sname" id="sname" value="<?=$row['sname']?>" autofocus/></td>
     <td>Enter FatherName:</td>
     <td colspan="2"><input type="text" name="fname" id="fname" value="<?=$row['fname']?>"/></td>
   </tr> 
   <tr>
     <td>Select Gender:</td>
     <td colspan="2">
      <?php 
        if($row['gen'] =='male'){
          echo "<input type='radio' name='gen' id='gen' checked value='male'/>Male
                <input type='radio' name='gen' id='gen' value='female'/>Female";
        }else if($row['gen'] == 'female'){
          echo "<input type='radio' name='gen' id='gen' value='male'/>Male
                <input type='radio' name='gen' id='gen' checked value='female'/>Female";
        }else{
          echo "<input type='radio' name='gen' id='gen' value='male'/>Male
                <input type='radio' name='gen' id='gen' value='female'/>Female";
        }
      ?>
     </td>
     <td>Enter phone:</td>
     <td colspan="2"><input type="text" name="ph" id="ph" value="<?=$row['phone']?>" maxlength="10"/></td>
   </tr>
   <tr>
   <td>Select Course:</td>
   <td colspan="2"> 
     <select name="c" id="c">
        <option value="">Please Select</option>
        <?php 
           echo get_list("course","c_id","c_name",$row['course']);
        ?>
     </select> 
   </td>
   <td>Select City:</td>
   <td colspan="2">
   <select name="city" id="city">
   <option value="">Please Select</option>
   <?php 
           echo get_list("city","c_id","c_name",$row['city']);
        ?>
     </select> 
   </td>
   </tr>
   <tr>
     <td>Select State:</td>
     <td colspan="2">
     <select name="state" id="state">        
      <option value="">Please Select</option>
     <?php 
           echo get_list("state","s_id","s_name",$row['state']);
        ?>
     </select> 
     </td>
     <td>Select Country:</td>
     <td colspan="2">
     <select name="con" id="con">
        <option value="">Please Select</option>
        <?php 
           echo get_list("con","c_id","c_name",$row['country']);
        ?>
     </select> 
     </td>
   </tr>
   <tr>
     <td>Enter pincode:</td>
     <td colspan="2"><input type="text" name="pin" id="pin" value="<?= $row['pincode']?>" maxlength="6"/></td>
     <td>Enter email:</td>
     <td colspan="2"><input type="text" name="email" id="email" value="<?= $row['email']?>"/></td>
   </tr>
   <tr>
     <td>Enter DOB:</td>
     <td colspan="2"><input type="text" name="dob" id="dob" value="<?=$row['dob']?>"/></td>
     <td>Enter DOJ:</td>
     <td colspan="2"><input type="text" name="doj" id="doj" value="<?=$row['doj']?>"/></td>
   </tr>

   <tr>
   <td>Select Image:</td>
   <td colspan="2"><input type="file" name="img" id="img" value="<?=$row['img']?>"/>
   <?php
   if($row['img']){
      echo "<img src='uploads/$row[img]' height='100px' width='100px'/>";
   }
   ?>
   </td>
   <td>Enter Local Address:</td>
   <td colspan="2"><input type="text" name="add1" id="add1" value="<?=$row['address']?>"/></td>
  </tr>
   <tr>
   <td>Select Qualification</td>
   <td colspan="2">
      <?php
        if($_GET['s_id']){
          echo get_check_list("qualification","q_id","q_name","qual[]",$row['qualification']);
        }else{
          echo get_check_list("qualification","q_id","q_name","qual[]",0);

        }
      ?>
    </td>
   <td>Enter Permanent Address:</td>
   <td colspan="2"><input type="text" name="add2" id="add2" value="<?=$row['address2']?>"/></td>
  </tr>
  <tr>
<td colspan="6">
   <input type="submit" name="set" id="set" value="Submit"/>
   <input type="reset" name="reset" id="reset" value="Reset"/>



   <input type="hidden" name="action" id="action" value="st_add"/>
   <input type="hidden" name="sid" id="sid" value="<?php echo $row['sid']?>"/>
   <input type="hidden" name="image" id="image" value="<?php echo $row['img']?>"/>
</td>
 </tr>
  
</table>
</form>
<main>
</main>
<?php
  include "include/footer.php";
      }else{
        header("location: http://localhost/class/university_project/?msg=login first to continue");
}
?>
</body>
</html>
