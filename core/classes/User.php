<?php
class User{
  private $username ;
  private $lname;    
  private $dp ;
  private $bday ;
  private $email;
  private $cover;    

  public function __construct($username,$lname,$dp,$bday,$email,$cover){
     $this->username = $username;
     $this->lname    = $lname;  
     $this->dp       = $dp!==''?$dp:'images/avatar.png';
     $this->bday     = $bday;
     $this->email    = $email;
     $this->cover    = $cover!==''?$cover:'images/bg.png'; 
  }
    
  public function getdp(){
      return $this->dp;
  }    

  public function getname(){
     return $this->username;
  }

  public function getprofile(){
    $profile = json_encode( 
                   array(
                         'username'=>$this->username,
                         'lname'   =>$this->lname,
                         'dp'      =>$this->dp,
                         'bday'    =>$this->bday,
                         'email'   =>$this->email,
                         'cover'   =>$this->cover
                   )
               );
    return $profile;
  }
}

include_once"core/database/database.php";
$username = '';
$bday = '';
$email = '';
$dp ='';
$cover = '';
$lname = '';
$uid = $_SESSION['skulvilla'];

 $stmt = $link->prepare("SELECT fname,lname,bday,email,dp,cover FROM users WHERE id=?");
 $stmt->bind_param('s',$uid);
 $stmt->bind_result($username,$lname,$bday,$email,$dp,$cover);
 $stmt->execute();
 $stmt->fetch();

 $stmt->close();

 $user = new User($username,$lname,$dp,$bday,$email,$cover);
 $userdata = json_decode($user->getprofile());

?>