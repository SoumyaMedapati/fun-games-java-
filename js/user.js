var picasso = getCanvasContext('slogo'),width =$('#slogo').width(),height = $('#slogo').height(),dwidth = (width/10),dheight = (height/10),mainmenu = 0;
var userlist = [];
var idarr = [];
var names = [];
var views = ['timeline','about','friends','photos','more','posts','photos','videos'];

var currentuser = '';

$(document).ready(function(){
    console.log("jquery working!!");
    drawSlogo(picasso,dwidth,dheight);
    setTimeout(function(){
        userlist = _('userlist').innerHTML;
        userlist = userlist.split(',');
        userlist.pop();
         for(var k=0;k<userlist.length;k++){
             idarr[idarr.length] = userlist[k].split('.')[0];
             names[names.length] = userlist[k].split('.')[1];
         }
    },500);
    
    currentuser = _('username').innerHTML;
    
    $('#slogo').click(function(){
        redirect('user.php');
    });
    
    $('#searchtrigger').click(function(){
        console.log('user wants to search user!');
        $('#usersearch').show();
        $('#searchtrigger').hide();
    });
    
    $('#settings').click(function(){
        console.log('main menu show!');
        $('#overlay').show();
        $('#mainmenu').addClass('appearin');
        $('#mainmenu').show();
        mainmenu = 1;
    });
    
    $('#mainmenuret').click(function(){
        console.log('hide main menu');
        $('#overlay').hide();
        $('#mainmenu').removeClass('appearin');
        $('#mainmenu').addClass('apppearout');
        mainmenu = 0;
    });
    
    $('#overlay').click(function(){
        if(mainmenu==1) _('mainmenuret').click();
    });
    
    $('')
    
});

function getsuggestions(key) {
    var needle = $('#' + key).val();
    var tempresult = [];
    var keyarr = [];
    var match = new RegExp(needle, 'gi');

    if (isNaN(needle)) {
        for (var k = 0; k < names.length; k++) {
            if (names[k].match(match)) { tempresult[tempresult.length] =names[k]; keyarr[keyarr.length] = k; }
        }
        showsuggestions(tempresult, keyarr);
    }
}


function getsuggestions(key) {
    var needle = $('#' + key).val();
    var tempresult = [];
    var keyarr = [];
    var match = new RegExp(needle, 'gi');

    if (isNaN(needle)) {
        for (var k = 0; k < names.length; k++) {
            if (names[k].match(match)) { tempresult[tempresult.length] = names[k]; keyarr[keyarr.length] = k; }
        }
        showsuggestions(tempresult, keyarr);
    }
}

function showsuggestions(tempres, keyarr) {
    console.log(keyarr);
    var sugarr = [];
    _('sugcontain').innerHTML = '';

    for (var k = 0; k < tempres.length; k++) {
        
        if(names[keyarr[k]]!==currentuser){
        _('sugcontain').innerHTML += "<a id='sug" + k + "' href='user.php?page=profile&id=" + idarr[keyarr[k]] + "' ><div class='suggestions' >"+ names[keyarr[k]] + "</div></a>";
        }
    }

    $('#sugcontain').fadeIn();
}

function hidesuggestions(){
    setTimeout(function(){ $('#sugcontain').hide(); },200);
}

function drawSlogo(picasso,dwidth,dheight){
    picasso.fillStyle = 'white';
    picasso.fillRect(0,0,width,height);
    drawFillText('s',dwidth*2.6,dheight*7,2.8,'#3b5998',picasso);
}

function redirect(url){
    if(url=='guestprofile'){ url="user.php?page=profile&id="+_('guestprofile').innerHTML;}
    _('redirecturl').href = url;
    _('redirecturl').click();
}

function renderview(id){
    for(var i = 0 ; i <views.length;i++){
        $('#'+views[i]).removeClass('active');
        $('.'+views[i]).hide();
    }
    $('#'+id).addClass('active');
    $('.'+id).fadeIn();
}


function drawFillText(txt,dX,dY,fontsize,color,ctx){
                ctx.font = fontsize+'em helvetica';
                ctx.lineWidth = 2;
                ctx.strokeStyle = color?color:'white';
                ctx.fillStyle = color?color:'white';
                ctx.strokeText(txt,dX,dY);
                ctx.fillText(txt,dX,dY);
}

function drawText(txt,dX,dY,fontsize,color,ctx){
                ctx.font = fontsize+'em helvetica';
                ctx.fillStyle = color?color:'white';
                ctx.fillText(txt,dX,dY);
}


function getCanvasContext(id){
    if(_(id).getContext('2d')) return _(id).getContext('2d');
    else return 0;
}

function _(id){
    return document.getElementById(id);
}