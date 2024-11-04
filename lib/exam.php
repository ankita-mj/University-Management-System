<?php
 if(isset($_REQUEST['action'])){
  $_REQUEST['action']();
 }


function saveExam(){
 $conn = mysqli_connect("localhost","root","padduu","university",3307);
  echo $sql = "INSERT INTO exam (exam_title,course,subject,time,date,decription)VALUES('{$_POST['examTitle']}',{$_POST['course_id']},{$_POST['sub_id']},'{$_POST['time']}','{$_POST['examDate']}','{$_POST['text']}')";
  $result = mysqli_query($conn,$sql);
  if($result){
    header("location: http://localhost/class/university_project/exam_view.php?msg=saved successfuly");
  }
}
function updateExam(){
 $conn = mysqli_connect("localhost","root","padduu","university",3307);
  echo $sql = "UPDATE exam set exam_title = '{$_REQUEST['examTitle']}',course = {$_REQUEST['course_id']},subject = {$_REQUEST['sub_id']},time =  '{$_REQUEST['time']}',date =  '{$_REQUEST['examDate']}',decription =  '{$_REQUEST['text']}' where ex_id = {$_REQUEST['id']}";
  $result = mysqli_query($conn,$sql);
  if($result){
    header("location: http://localhost/class/university_project/exam_view.php?msg=updated successfuly");
  }
}
function delete(){  
  $conn = mysqli_connect("localhost","root","padduu","university",3307);
   echo $sql = "DELETE FROM exam where ex_id = {$_REQUEST['id']}";
   $result = mysqli_query($conn,$sql);
   if($result){
     header("location: http://localhost/class/university_project/exam_view.php?msg=deleted successfuly");
   }
}
?>