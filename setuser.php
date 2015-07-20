<?php
 session_start();
 include_once "core/database/database.php";

  if($_SERVER['REQUEST_METHOD']=='POST'){
      $fname    =  isset($_POST['fname'])?$_POST['fname']:'';
      $lname    =  isset($_POST['lname'])?$_POST['lname']:'';
      $pass     =  isset($_POST['pass'])?$_POST['pass']:'';
      $email    =  isset($_POST['email'])?$_POST['email']:'';
      $email2   =  isset($_POST['email2'])?$_POST['email2']:'';
      
      $b_month  =  isset($_POST['bmonth'])?$_POST['bmonth']:'';
      $b_day    =  isset($_POST['bday'])?$_POST['bday']:'';
      $b_year   =  isset($_POST['byear'])?$_POST['byear']:'';
      $bday     = $b_day."-".$b_month."-".$b_year;
      $dp       = '';      
      $cover    = '';
      $gender   =  isset($_POST['gender'])?$_POST['gender']:'';
      
    // echo "the user's full name is ".$fname." ".$lname." . his email is ".$email." which is the same as ".$email2." . the user was born on ".$bday." .the user is a ".$gender;
      
      $result = $link->query("SELECT * FROM users WHERE email='$email'");
      if($result->num_rows>0){
          $error = 1; // this email is taken
      }
      else {
          $stmt = $link->prepare("INSERT INTO users (fname,lname,pass,bday,gender,email,dp,cover)VALUES(?,?,?,?,?,?,?,?)");
          $stmt->bind_param('ssssssss',$fname,$lname,$pass,$bday,$gender,$email,$dp,$cover);
          $stmt->execute();
          $_SESSION['skulvilla'] = $stmt->insert_id;
          $stmt->close();
          $error = 0; // the user was successfully signed up !!
      }
      
      echo $error;
  }
?>