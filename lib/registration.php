<?php
session_start();
$_REQUEST['action']();

function register(){
  $conn = mysqli_connect("localhost","root","","university");
  echo $username = $_REQUEST['email'];
  echo $password = substr($_REQUEST['name'],0,3).$_POST['doj'];

  $sql = "INSERT INTO facality (name,gender,qual,phone,email,exp,interest,doj,sec_que,sec_ans,desig,stream,user_name,password,image)VALUES('{$_POST['name']}','{$_POST['gen']}','{$_POST['qual']}','{$_POST['phone']}','{$_POST['email']}','{$_POST['exp']}','{$_POST['AreaOfInt']}','{$_POST['doj']}','{$_POST['sec_que']}','{$_POST['sec_ans']}','{$_POST['desig']}','{$_POST['stream']}','{$username}','{$password}','image/user-solid (3).svg')";
  $result = mysqli_query($conn,$sql);
if($result){
    $_SESSION['userName'] = $username;
    $_SESSION['password'] = $password;
    header("location: http://localhost/class/university_project/facality_userpassPgae.php");
}
}
function updateImg(){
//   print_r($_FILES);
$img = "uploads/".$_FILES['img']['name'];
$conn = mysqli_connect("localhost","root","","university");
echo $sql = "UPDATE facality set image = '{$img}' where user_name = '{$_SESSION['userName']}'";
move_uploaded_file($_FILES['img']['tmp_name'],"../uploads/".$_FILES['img']['name']);
$result = mysqli_query($conn,$sql);
  header("location: http://localhost/class/university_project/facality_profile.php?msg=Your Profile Picture Has Been Updated");

}


function recover_pass(){
    $conn = mysqli_connect("localhost","root","","university");
$sql = "UPDATE facality set password = '{$_REQUEST['new_pass']}'  where user_name = '{$_SESSION['userName']}'";
$result = mysqli_query($conn,$sql);
header("location: http://localhost/class/university_project/facality_profile.php?msg=Your Password Has been Updated");
}
function facality_logout(){
    $_SESSION['userName']="";
    session_destroy();
    header("location: http://localhost/class/university_project/registration.php?msg=logout succesfully!!");

}
?>