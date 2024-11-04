<?php
$_REQUEST['act']();


function login(){
session_start();
$_SESSION['uname']= $_REQUEST['uname'];
// $_SESSION['pwd']= $_REQUEST['pass'];
$conn = mysqli_connect("localhost","root","padduu","university",3307);
echo $sql = "SELECT * FROM login WHERE login_name ='{$_REQUEST['uname']}' and login_pass = '{$_REQUEST['pass']}'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
header("location: http://localhost/class/university_project/student_view.php?msg=login successfuly");
}else{
header("location: http://localhost/class/university_project/index.php?msg=not exist");
}
}
function logout(){
    session_start();
    $_SESSION['uname'] = "";
    $_SESSION['pwd'] = "";
    session_destroy();
    header("location: http://localhost/class/university_project/index.php?msg=logout successfuly");
}
function pass_recover(){
    session_start();
    $conn = mysqli_connect("localhost","root","padduu","university",3307);
    echo $sql = "SELECT * FROM login WHERE login_name ='{$_REQUEST['uname']}' and seq_ques = {$_REQUEST['seq_ques']} and seq_ans = '{$_REQUEST['seq_ans']}'";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        $_SESSION['login_uname'] = "{$_REQUEST['uname']}";
        header("location: http://localhost/class/university_project/update_password.php");
    }else{
        
        header("location: http://localhost/class/university_project/forget_pass_form.php?msg=plz try again incorrect Cridential!!");
    }
}
function  recover_pass(){
    session_start();
    $conn = mysqli_connect("localhost","root","padduu","university",3307);
   $sql = "UPDATE login set login_pass = '{$_REQUEST['new_pass']}' WHERE login_name = '{$_SESSION['login_uname']}'"; 
   $result = mysqli_query($conn,$sql);
   if($result){
       header("location: http://localhost/class/university_project/index.php?msg=password changed successfully you can login now!!");
       
    }else{
    echo "query failed";
    }

}
?>