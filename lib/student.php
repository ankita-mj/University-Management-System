<?php
if($_REQUEST['action'] == "st_add"){
    st_add();
}
if($_REQUEST['action'] == "delete"){
    delete();
}
if($_REQUEST['action'] == "deleteAll"){
    // echo "ki";
    delete_all();
}
// if(isset($_REQUEST['action'])){
//    $_REQUEST['action']();
// }

// student add
function st_add(){
    $conn = mysqli_connect("localhost","root","padduu","university",3307)or die(mysqli_error($conn));
    // echo "<pre>";
    // print_r($_POST['qual']);
    // echo "</pre>";
    $st_qual = implode(",",$_POST['qual']);
    if($_FILES['img']['name']){
        $t = explode(".",$_FILES['img']['name']);
        $st_img = $t[0].time().".".$t[1];
        // echo "<pre>";
        // print_r($_POST);
        // echo"</pre>";
        // $file_name = $_FILES['img']['name'];
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        // echo $st_img;
    }else{
        $st_img = $_POST['image'];
    }
    echo $_POST['image'];
    echo $st_img;
    echo $_POST['sid'];
    // die;
    if($_POST['sid']){
        echo $sql = "UPDATE student SET sname = '{$_POST['sname']}',fname = '{$_POST['fname']}',gen = '{$_POST['gen']}',phone = '{$_POST['ph']}',course = '{$_POST['c']}',city = '{$_POST['city']}',state = '{$_POST['state']}',country = '{$_POST['con']}',pincode='{$_POST['pin']}',email='{$_POST['email1']}',dob='{$_POST['dob']}',doj='{$_POST['doj']}',img='{$st_img}',address='{$_POST['add1']}',qualification='{$st_qual}',address2='{$_POST['add2']}' where sid = {$_POST['sid']}";
    }
    // die;
    else{
    $sql = "INSERT INTO student(sname,fname,gen,phone,course,city,state,country,pincode,email,dob,doj,img,address,qualification,address2) VALUE ('{$_POST['sname']}','{$_POST['fname']}','{$_POST['gen']}','{$_POST['ph']}','{$_POST['c']}','{$_POST['city']}','{$_POST['state']}','{$_POST['con']}','{$_POST['pin']}','{$_POST['email']}','{$_POST['dob']}','{$_POST['doj']}','{$st_img}','{$_POST['add1']}','{$st_qual}','{$_POST['add2']}')";
    }
    $result = mysqli_query($conn,$sql)or die("query failed");
    move_uploaded_file($_FILES['img']['tmp_name'],"../uploads/".$st_img);
    if($result){
        header("location: http://localhost/class/university_project/student_view.php?msg=data saved successfully");
   echo "<h3>data saved successfully</h3>";
}else{
echo "<h3>data not saved successfully</h3>";
}
}

// student delete
function delete(){
    $conn = mysqli_connect("localhost","root","padduu","university",3307)or die(mysqli_error($conn));
    $sql = "select img from student where sid = {$_GET['id']}";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row['img']){
    unlink("../uploads/".$row['img']);
    }
    echo $sql1 = "DELETE FROM student WHERE sid = {$_GET['id']}";
    $result1 = mysqli_query($conn,$sql1);

    if($result1){
        header("location: http://localhost/class/university_project/student_view.php");
    // }else{
        // echo "not deleted";
    }
}
// delete all
function delete_all(){
    $conn = mysqli_connect("localhost","root","padduu","university",3307)or die(mysqli_error($conn));
    $st = $_GET['student_id'];
    // die();
    if($st == 0){
        header("location: http://localhost/class/university_project/student_view.php?msg=please select first to contine");

    }
    foreach($st as $var){
        echo $var;
        $sql = "SELECT * FROM student WHERE sid = {$var}";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        if($row['img']){
           unlink("../uploads/".$row['img']);
        }
        $sql1 = "DELETE FROM student WHERE sid = {$var}";
        $result1 = mysqli_query($conn,$sql1);

        if($result1){
           header("location: http://localhost/class/university_project/student_view.php");
        }

    }
}


?>
