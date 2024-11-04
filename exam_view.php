<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="javaScript/javascript.js"></script></head>
<body>
    <center>
    <?php
    session_start();
    if(isset($_SESSION['uname'])){
      include "include/header.php";
      include "include/img.php";
    ?>
    <table border="2px" cellpadding="10px">
    <form action='lib/exam.php' method='get' name='exam_view'>

        <tr>
            <th colspan="6">EXAMS</th>
            <th><a href="http://localhost/class/university_project/examp_add.php"><div class="btn2">Add Exams</div></a></th>
            <th><a href='javascript:printPage();'>PrintOut</a></th>
            </tr>
        <?php
           $conn = mysqli_connect("localhost","root","padduu","university",3307);
           $sql = "SELECT * FROM exam,course,subject where exam.subject = subject.sub_id and exam.course = course.c_id";
           $result = mysqli_query($conn,$sql);
           if(mysqli_num_rows($result)>0){
            ?>
            <tr>
              <th>Exam Id</th>
              <th>Exam Title</th>
              <th>Course</th>
              <th>Subject</th>
              <th>Time</th>
              <th>Date</th>
              <th>Description</th>
              <th>Actions</th>
           </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){
        ?>
            <tr>
                <td><?=$row['ex_id']?></td>
                <td><?=$row['exam_title']?></td>
                <td><?=$row['c_name']?></td>
                <td><?=$row['sub_name']?></td>
                <td><?=$row['time']?></td>
                <td><?=$row['date']?></td>
                <td><?=$row['decription']?></td>
                <td>
                    <a href="examp_add.php?id=<?=$row['ex_id']?>">Edit</a>||
                    <a href="javascript:exam_delete(<?=$row['ex_id']?>);">Delete</a>
                </td>
            </tr>

        <?php
                }
           }
        ?>
        <input type="hidden" name="action"/>
        <input type="hidden" name="id"/>
    </table>
    <?php
    
      }
    ?>
    
    </center>
</body>
</html>