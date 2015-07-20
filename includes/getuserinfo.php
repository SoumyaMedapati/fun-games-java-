<?php
 $stmt = $link->prepare("SELECT fname,lname,bday,email,dp,cover FROM users WHERE id=?");
 $stmt->bind_param('s',$guestid);
 $stmt->bind_result($username,$lname,$bday,$email,$dp,$cover);
 $stmt->execute();
 $stmt->fetch();

 $stmt->close();

 $guest = new User($username,$lname,$dp,$bday,$email,$cover);
 $guestdata = json_decode($guest->getprofile());

?>
