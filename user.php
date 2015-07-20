<?php
  session_start();
  if(isset($_SESSION['skulvilla'])){?>
<?php
      include_once "includes/functions.php";
      include_once "core/classes/User.php";
      include_once "includes/head.php";
      echo "<body>";
      include_once "pages/navbar.php";
      include_once "pages/mainmenu.php";
      if(isset($_GET['page'])){
          include_once 'pages/'.$_GET['page'].'.php';
      }else{
      ?>
      <div class="hiddencont">
          <div class="arrow_box settingsmenu" id='settingsmenu'>
              <div>profile</div>
              <div>settings</div>
              <div>logout</div>
          </div>
      </div>
      <div class="procontainer">
        <div class="wall">
            <div class="walltabs">
                <div class="proname active" id='post' onclick="renderview(this.id)">posts</div>
                <div class='proname' id='photos' onclick="renderview(this.id)">photos</div>
                <div class='proname' id='videos' onclick="renderview(this.id)">videos</div>
                
                <div class='proname' id='trending'>trending</div>
            </div>
            <div class="mainwall">
                <div class="posts">
                    <div id='postupdate'>
                        <textarea rows='10' cols="50"></textarea>
                        <span>Post</span><span>Cancel</span>
                    </div>
                </div>
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
<?php
    }
    include_once "pages/footer.php";  
  }else{
    header('Location:index.php?logout');   
  }
?>