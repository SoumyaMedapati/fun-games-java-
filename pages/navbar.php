<?php include_once"includes/getallusers.php";?>
<div class='nav-bar'>
    <canvas id='slogo' width='50' height='50'></canvas>
    <div class="search">
        <i class='flaticon-magnifier13' id='searchtrigger'></i>
        <input type='text' name='usersearch' id='usersearch' placeholder='search for users' onkeyup='getsuggestions(this.id)' onblur='hidesuggestions()'/>
        <div id='sugcontain' class='suggestionwrap' onmouseleave='restoresearch()'></div>
    </div>
    <div class="profile">
        <img src='<?php echo $user->getdp();?>'/>
        <span id='username' onclick="redirect('user.php?page=profile')"><?php echo $user->getname()?></span>
        <span onclick="redirect('user.php')">home</span>
    </div>
    <div class="actions">
        <i class='flaticon-group4'></i>
        <i class="flaticon-internet71"></i>
        <i class="flaticon-ring6"></i>
    </div>
    <div class="settings" id='settings'>
        <i class="flaticon-list26"></i>
    </div>
</div>
<div id='overlay'></div>
<a id='redirecturl' href='' style='display:none;'></a>