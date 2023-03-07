<?php
 $uname1=$_POST['uname1'];
 $upswd1=$_POST['upswd1'];
 

 $conn=new mysqli("localhost","root","","project1");
 if($conn->connect_error) {
    die("Failed toconnect :".$conn->connect_error);
 }else{
    $stmt=$conn->prepare("SELECT*from register where uname1=?");
    $stmt->bind_param("s",$uname1);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
     if($stmt_result->num_rows >0){
      $data=$stmt_result->fetch_assoc();
      if($data['upswd1']==$upswd1){
        echo"login succesfully";
      }else{
        echo"invalid name";
      }

     } else{
        echo"invalid username";
     }

 }
 ?>
 