<?php

function get_list($table,$col_id,$col_name,$sel){
   $conn = mysqli_connect("localhost","root","padduu","university",3307);
  $sql = "SELECT * FROM $table order by $col_id";
  $result = mysqli_query($conn,$sql);
  $output = "";
    while($row = mysqli_fetch_assoc($result)){
      if($row[$col_id] == $sel){
           $output .="<option value='$row[$col_id]' selected> $row[$col_name] </option>";
      }else{
           $output .="<option value='$row[$col_id]'> $row[$col_name] </option>";
      }
    }
  return $output;
}
function get_check_list($table,$col_id,$col_name,$name,$sel){
  $conn = mysqli_connect("localhost","root","padduu","university",3307);
  $sql = "SELECT * FROM $table;";
  $result = mysqli_query($conn,$sql);

$output = "";
$sel = explode(",",$sel);//string to array
while($row = mysqli_fetch_assoc($result)){
  if(in_array($row[$col_id],$sel)){
    $output .="<input type='checkbox' name = $name value = $row[$col_id] checked> $row[$col_name]";
  }else{
    $output .="<input type='checkbox' name = $name value = $row[$col_id]> $row[$col_name]";
  }
}
return $output;
}



function getMultValue($table,$col_id,$col_name,$val){
  // echo $val;
  // $q_id = explode(',',$val);
  $conn = mysqli_connect("localhost","new","padduu","university");
  $sql = "SELECT $col_name FROM $table where $col_id in($val)";
  $res = mysqli_query($conn,$sql);
  $output = "";
  while($ro = mysqli_fetch_assoc($res)){
      $output .= $ro['q_name']." ";
  }
  return $output;
}
?>