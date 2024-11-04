<?php
if(isset($_REQUEST['action'])){
   $_REQUEST['action']();
}


function add_fee(){
    $conn = mysqli_connect("localhost","root","padduu","university",3307);
    $sql1="SELECT * FROM FEEs WHERE sid = {$_POST['sid']}";
    $result1 = mysqli_query($conn,$sql1); 
    if(mysqli_num_rows($result1)>0){
        $row1 = mysqli_fetch_assoc($result1);
        $amt = explode(",",$row1['amt']);// string to array
        $amount = 0;
        foreach($amt as $var){
            $amount = $amount + $var;
        }
        echo "amount ".$amount."<br/>";
        if( $amount == $_POST['c_amt']){
            header("location: http://localhost/class/university_project/fee_view_page.php");
    
        }
        $setAmt = $row1['amt'].",".$_POST['amt'];
        $bal = $_POST['balance'] - $_POST['amt'];
        $setbalance = $row1['balance'].",".$bal;
        $date = $row1['date'].",".$_POST['date'];
        $description = $row1['description'].",".$_POST['txt'];
        echo "bal ".$bal."<br/>";
        echo "SETbalance ".$setbalance."<br/>";
        echo "setamt ".$setAmt."<br/>";
        echo "setDATE ".$date."<br/>";
        echo "description ".$description."<br/>";

        $sql = "UPDATE fees set amt = '{$setAmt}',balance = '{$setbalance}',date = 
                '{$date}',description = '{$description}' where sid = {$_POST['sid']}";
    }else{
       $setAmt = $_POST['amt'];
       $balance = $_POST['balance']-$_POST['amt'];
                 
       $sql ="INSERT INTO FEEs(sid,sname,fname,course,total_fee,amt,balance,date,description) 
               VALUE ({$_POST['sid']},'{$_POST['sname']}','{$_POST['fname']}','{$_POST['c_id']}', 
               {$_POST['c_amt']},'{$setAmt}','{$balance}','{$_POST['date']}','{$_POST['txt']}')";
    }
    // die();
    
   $result = mysqli_query($conn,$sql);
   if($result){
       header("location: http://localhost/class/university_project/fee_view_page.php");
    }
}

function get_value($sid){
    $conn = mysqli_connect("localhost","root","padduu","university",3307);
    $sql2 = "SELECT * from fees where sid = {$sid}";
    $result2 = mysqli_query($conn,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
    return 1;
}
function check_fee(){
    $conn = mysqli_connect("localhost","root","padduu","university",3307);
    $sql = "SELECT * from fees where sid = {$_REQUEST['sid']}";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    if($row['status']=="completed"){
        header("location: http://localhost/class/university_project/admit_card.php?sid={$_REQUEST['sid']}");
    }else{
        header("location: http://localhost/class/university_project/payFee.php?sid={$_REQUEST['sid']}&msg=your fee is balance");

    }
    
}
?>