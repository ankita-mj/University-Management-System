<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    error_reporting(false);
      include "include/header.php";
      include "include/img.php";
      include "include/functions.php";
      if(isset($_GET['id'])){
      $conn = mysqli_connect("localhost","root","padduu","university",3307);
      echo $sql = "SELECT * FROM exam WHERE ex_id = {$_GET['id']}";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);
      }
    ?>
    <form action="lib/exam.php" method="post">
       <table align="center"  border="2px" cellpadding="5px">
          <tr >
            <th colspan="2" class="h1"><h1>Exam Add<h1></th>
          </tr>
          <tr>
            <td>Exam title:</td>
            <td><input type="text" id="examTitle" name="examTitle" value="<?=$row['exam_title']?>"/></td>
          </tr>
          <tr>
            <td>Exam Course:</td>
            <td><select id="course_id" name="course_id">
                <option value="0">pls select</option>
                <?php 
                  echo get_list("course","c_id","c_name","{$row['course']}");
                ?>
            </select></td>
          </tr>
          <tr>
            <td>Exam Subject:</td>
            <td><select id="sub_id" name="sub_id">
                <option value="0">pls select</option>
            <?php
              echo get_list("subject","sub_id","sub_name","{$row['subject']}");
            ?>
            </select></td>          
        </tr>
          <tr>
            <td>Exam Timing:</td>
            <?php
              if($row['time']=='morning'){
               echo "<td>
              <input type='radio' value='morning' id='time' name='time' checked/>Morning</br>
            <input type='radio' value='evening' id='time' name='time'/>Evening</td>";
          }else if($row['time']=='evening'){
          echo "<td>
         <input type='radio' value='morning' id='time' name='time'/>Morning</br>
       <input type='radio' value='evening' id='time' name='time' checked/>Evening</td>";
      }else{
            echo "<td>
           <input type='radio' value='morning' id='time' name='time'/>Morning</br>
         <input type='radio' value='evening' id='time' name='time'/>Evening</td>";

          }
            ?>
            
          </tr>
          <tr>
            <td>Exam Date:</td>
            <td><input type="date" name="examDate" id="examDate" value="<?=$row['date']?>"/></td>
          </tr>
          <tr>
            <td>Exam Description:</td>
            <td><textarea name="text" id="text" value=""><?=$row['decription']?></textarea></td>
          </tr>
          <tr >
            <th colspan="2">
                <input type="submit" class="btn2" value="submit"/>
                <?php
                if(isset($_GET['id'])){
                   echo "<input type='hidden' name='action' value='updateExam'/>";
                   echo "<input type='hidden' name='id' value= '{$row['ex_id']}'/>";
                  }else{
                  echo "<input type='hidden' name='action' value='saveExam'/>";
                  }
                ?>
            </th>
          </tr>
       </table>
    </form>
</body>
</html>