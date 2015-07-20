<?php
 session_start();
 include_once 'core/database/database.php';
 $_SESSION['skulvilla'] = '';
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
      $rid = '';
      
      $email = $_POST['email'];
      $pass  = $_POST['pass'];
      
      $stmt = $link->prepare("SELECT id FROM users WHERE email=? AND pass = ?");
      $stmt->bind_param('ss',$email,$pass);
      $stmt->bind_result($rid);
      $stmt->execute();
      $stmt->fetch();
      $stmt->close();
     
      if($rid!==''||!empty($rid)||$rid>0){
          $_SESSION['skulvilla'] = $rid;
          $error = 0;
      }
      else $error = 1;
      
     echo $error;
      
 }
?>