<?php 
 session_start();
 if(isset($_GET['logout'])){
     session_destroy();
     header('Location:index.php');
 }
 else if(isset($_SESSION['skulvilla'])){
     header('Location:user.php');
 }
 else {
?>
<html>
    <head>
        <link rel="icon" href="images/favicon.ico"/>
        <title>(: Skulvilla _/\_ welcomes ye :)</title>
        <link rel="stylesheet" type="text/css" href="css/index.css" />
    </head>
    <body>
        <div class="container">
            <div class="loader">
              
            </div>
          <div class="nav-bar">
              <canvas id="logo" width='250' height='70'></canvas>
              <div class="entryportal">
                  <div id='labels'>
                      <span id='luname'>email</span>
                      <span id='lpass'>password</span>
                  </div>
                  <input type='text' name='email' id='funame' placeholder=''/>
                  <input type='password' name='password' id='fpass' placeholder=''/>
                  <span class="btn" id='login'>login</span>
                  <div class="sub">
                   <input type='checkbox' checked='true' id='rememberme'/>
                   <span class="nimp">remember me</span>
                   <a href='#'><span class="nimp">forgot password</span></a>
                  </div>      
              </div>
          </div>
              
          <div class="innercont">
              <div class="promo" id='promocaption'></div>
            <div class="promocarousel" id='carouselframe'>
                <div class="circle right" id='controlright'></div>
                <div class="circle left" id='controlleft'></div>
            </div>
            <div class="signupportal">
                <div class="header">Sign Up</div>
                <div class="caption">It's free and always will be.</div>
                <div class="formcont">
                    <form id='ajaxsignup' method='' action=''>
                        <input type='text' name='fname' placeholder='first name' class='shortinput'/>
                        <input type='text' name='lname' placeholder='last name'class='shortinput' />
                        <input type='email' name='email' placeholder='email'/>
                        <input type='email' name='email2' placeholder='re-enter email'/>
                        <input type='password' name='pass' placeholder='new password'/>
                        <div class="bday">
                            <div class="caption">birthday</div>
                            <select name='bmonth'>
                                <option value="0">month</option>
                                <option value="1">jan</option>
                                <option value="2">Feb</option>
                                <option value="3">mar</option>
                                <option value="4">apr</option>
                                <option value="5">may</option>
                                <option value="6">jun</option>
                                <option value="7">jul</option>
                                <option value="8">aug</option>
                                <option value="9">sep</option>
                                <option value="10">oct</option>
                                <option value="11">nov</option>
                                <option value="12">dec</option>
                            </select>

                            <select name='bday'>
                                <option value="0" selected="1">day</option>
                                <?php
                                    for($i = 1 ;$i<32;$i++){
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }
                                ?>
                            </select>

                            <select name='byear'>
                                <option value="0" selected="1">year</option>
                                <?php
                                    for($i = 2015 ;$i>1970;$i--){
                                        echo "<option value='".$i."'>".$i."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="gender">
                            <span class="caption">gender</span>
                            <input type='radio' name='gender' value='male'/><span>male</span>
                            <input type='radio' name='gender' value='female'/><span>female</span>
                        </div>
                        
                        <span class="btn" id='signup'>signup</span>
                    </form>
                </div>
            </div>
          </div>    
        </div>
        <a id='redirecturl' href='' style='display:none;'></a>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>
<?php
 }
?>
