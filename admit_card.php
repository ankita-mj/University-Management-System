<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css"/>
    <style>
        .box{
          width:700px;
             box-shadow:10px 10px 30px gray;
             margin-top:30px;
             padding-top:0px;
        }
        table tr td{
            padding : 0 20px;
        }
        .logo{
            position : absolute;
            top:35px; 
            left:285px;
        }
        h2{
            width:500px;
        }
        .he{
            font-size: 20px;
        }
        .watermark{
            position:absolute;
            top:400px;
            left:270px;
            transform : rotate(-30deg);
            font-size: 80px;
            opacity:0.3;
        }

        
      
    </style>
</head>
<body>
    <div class="watermark">
        Lucknow University
    </div>
    <center>
        <div class="box">
            <img src="image/lucknowlogo.jfif" height="100px" width="100px" class="logo"/>
            <h2>University of Lucknow
                  Public university in Lucknow, Uttar Pradesh
            </h2>
            <?php
            $conn = mysqli_connect("localhost","root","padduu","university",3307);
                  $sql = "SELECT * FROM student,course where student.course = course.c_id and sid = {$_REQUEST['sid']}; ";
               $result = mysqli_query($conn,$sql);
               $row = mysqli_fetch_assoc($result);
            ?>
    <table>
        <tr>
            <th colspan="3">
                <b class="h1 he">E-Admit card</d>
            </th>
        </tr>
        <tr>
            <td>Student id:</td>
            <td><?=$row['sid']?></td>
            <td rowspan="5" style="padding-left:100px; padding-bottom:10px;"><img src="uploads/<?=$row['img']?>" height="100px" widtd="100px"/></td>
        </tr>
        <tr>
            <td>Student Name:</td>
            <td><?=$row['sname']?></td>
        </tr>
        <tr>
            <td>Fatder Name:</td>
            <td><?=$row['fname']?></td>
        </tr>
        <tr>
            <td>Gender:</td>
            <td><?=$row['gen']?></td>
        </tr>
        <tr>
            <td>Course:</td>
            <td><?=$row['c_name']?></td>
        </tr>
        <tr>
            <th colspan="3" align="center"><br/>Exam Details</th>
        </tr>
        <tr>
            <td colspan="3">
                <table border="1" width="100%">
                    <tr>
                        <th>S.N.</th>
                        <th>Subject</th>
                        <th>Timing</th>
                        <th>Date</th>
                        <th>Description</th>
                    </tr>
                    <?php
                  $sql1 = "select * from exam,subject where exam.subject = subject.sub_id and course = {$row['c_id']} order by date asc;";
                  $result1 = mysqli_query($conn,$sql1);
                  $i=0;
                  while($row = mysqli_fetch_assoc($result1)){
                      ?>
                      <tr>
                    <td><?=$i++?></td>
                    <td><?=$row['sub_name']?></td>
                    <td><?=$row['time']?></td>
                    <td><?=$row['date']?></td>
                    <td><?=$row['decription']?></td>
                </tr>
                    
                <?php
                }
                ?>
                </table>
            </td>
        </tr>
        <tr><td colspan="3">
           
          <p><b>Note:</b>please read instruction carefuly given below befor proceding in the examination</p>

          <u><b>Instruction for students:</b></u>

          <p>
           1. Ensure all information on the admit card (name, exam center, roll number, date, etc.) is correct. Report any errors to the examination authority as soon as possible.<br/>
           2. Print multiple copies of the admit card and keep a digital copy in case of emergencies or misplacement.<br/>
           3. Carry a valid photo ID (such as a driver’s license, passport, or school/college ID) along with the admit card to the exam center.<br/>
           4. If a specific dress code is required, follow it strictly. Avoid wearing items not allowed (e.g., watches, jewelry, or gadgets) if they are restricted.<br/>
           5. Arrive at least 30 minutes early at the exam center to avoid last-minute stress and to complete any verification process.<br/>
           6. Do not bring items like calculators (unless permitted), phones, books, or any electronic devices to the exam hall unless specified.<br/>
          

          </p>

        </td></tr>
        <tr>
            <td colspan="3"> 
                <input type="checkbox" name="check" id="check"/> I have read and understand all the instructions
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center"><button id="p" name="p">Print</button>
            <button id="c" name="c">cancel</button>
        </td>
        </tr>
    </table>
</div>
</center>
<script>
       
       p.disabled=true;
       check.addEventListener("click",function(){
        if(check.checked){
          p.disabled = false;
        }else{
            p.disabled=true;
        }
       });
    p.addEventListener("click",function(){
     if(check.checked){
        window.print();
    }
});
c.addEventListener("click",function(){
    history.back();
});

// else{
//             console.log("first check ");
//          document.getElementById("check").focus();
//      }
// });


</script>
</body>
</html>