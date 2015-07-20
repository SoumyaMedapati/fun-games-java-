<?php 
  if(isset($_GET['id'])){
      $guestid = $_GET['id'];
      include_once"includes/getuserinfo.php";
?>
    <div class="profilecont">
    <div class="cover" style="background-image:url(<?php echo $guestdata->cover?>)"></div>
    <div class='procircle'>
        <img src="<?php echo $guestdata->dp?>"/>
    </div>
    <div class="actioncalls">
        <?php echo "<span id='guestprofile' style='display:none;'>".$_GET['id']."</span>"?>
        <div class="<?php echo strlen($guestdata->username." ".$guestdata->lname)>14?'proname long':'proname'?>" onclick="redirect('guestprofile')"><?php echo $guestdata->username." ".$guestdata->lname?></div>
        <div class="proname" id='message'>message</div>
        <div class="proname" id='follow'>follow</div>
    </div>
    
</div>
<?php
  } 
  else{
      $userid = $_SESSION['skulvilla'];
      include_once"includes/getuserinfo.php";
?>
<div class="profilecont">
    <div class="cover" style="background-image:url(<?php echo $userdata->cover?>)"></div>
    <?php echo "<span id='userprofile' style='display:none;'>".$_SESSION['skulvilla']."</span>"?>
    <div class='procircle'>
        <img src="<?php echo $userdata->dp?>"/>
    </div>
    <div class="actioncalls">
        <div class="<?php echo strlen($userdata->username." ".$userdata->lname)>14?'proname long':'proname'?>" onclick="redirect('user.php?page=profile')"><?php echo $userdata->username." ".$userdata->lname?></div>
        <div class="proname" id='update'>Update Info</div>
        <div class="proname" id='activity'>Activity</div>
    </div>
    <div class="procontainer">
        <div class="wall">
            <div class="walltabs">
                <div class="proname active" id='timeline' onclick="renderview(this.id)">timeline</div>
                <div class='proname' id='about' onclick="renderview(this.id)">about</div>
                <div class='proname' id='friends' onclick="renderview(this.id)">friends</div>
                <div class='proname' id='photos' onclick="renderview(this.id)">photos</div>
                <div class='proname' id='more' onclick="renderview(this.id)">more</div>
                
                <div class='proname' id='trending'>trending</div>
            </div>
            <div class="mainwall">
                <div class="timeline"></div>
                <div class="about" style='display:none'>
                    <div>Birthday</div><div><?php echo $userdata->bday;?></div>
                    <div>Email</div><div><?php echo $userdata->email;?></div>
                </div>
                <div class="friends" style='display:none'></div>
                <div class="photos" style='display:none'></div>
                <div class="more" style='display:none'></div>
            </div>
            <div class="trending">
            </div>
        </div>
    </div>
    
</div>
<?php }?>