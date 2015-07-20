var picasso = getCanvasContext('logo'),width =$('#logo').width(),height = $('#logo').height(),dwidth = (width/10),dheight = (height/10);

var carouselimages = [1,2,3];
var carouselcount = 0;
var carouselIndex = 0;
var carouselCaptions = [
    'connect with people',
    'share your ideas',
    'hangout with cool people'
];

for(var j = 0 ; j<carouselimages.length;j++){
    loadImage('images/carousel/'+carouselimages[j]+'.png',j);
}

function loadImage(url,index){
    var image = new Image();
    image.src = url;
    image.onload = function(){
        console.log(carouselcount);
        carouselcount++;
        carouselimages[index] = image
        if(carouselcount==carouselimages.length){
            carouselStart();
        }
    }
}

function carouselStart(){
    carouselIndex = 0;
    updateCarousel();
}

function updateCarousel(){
    _('carouselframe').style.backgroundImage = "url("+carouselimages[carouselIndex].src+")";
    _('promocaption').innerHTML = carouselCaptions[carouselIndex];
    
}

var controllock = 0;

var carousellife = setInterval(function(){
                if(controllock<carouselimages.length)
                {
                    _('controlright').click();
                     controllock++;
                }else clearInterval(carousellife);
            },1500);

$(document).ready(function(){
    console.log('jquery working!!!');
    
    picasso.fillStyle = '#3b5998';
    picasso.fillRect(0,0,width,height);
    drawFillText('skulvilla',dwidth*2,dheight*7,2.6,'white',picasso);
    drawText("fostering relationships",dwidth*5,dheight*9.2,0.8,'white',picasso);
    
    $('#controlright').click(function(){
        if(carouselIndex<2)carouselIndex++;else carouselIndex = 0;
        $('#carouselframe').fadeOut(500); $('#promocaption').fadeOut(500);
        setTimeout(function(){ 
            updateCarousel(); 
            $('#carouselframe').fadeIn();
            $('#promocaption').fadeIn()
        },400);
        
    });
    
    $('#controlleft').click(function(){
        if(carouselIndex>0)carouselIndex--;else carouselIndex = 2;
        $('#carouselframe').fadeOut();
        setTimeout(function(){ updateCarousel(); $('#carouselframe').fadeIn();},400);
    });

    
    $('#signup').click(function(){
        console.log("signup called!!");
        var userdata = new FormData(_('ajaxsignup'));
        $.ajax({
            type:'post',
            url:'setuser.php',
            data: userdata,
            success: function(data){
                console.log(data);
                if(data==0){
                    console.log('user successfully signed up!!');
                    redirect('user.php');
                }else if(data==1){
                    alert('the email is already in use');
                    redirect('index.php?logout');
                }
            },
            error: function(xhr,status,error){
                console.log('error occurred!!'+xhr.responseText+" "+status);
            },
            contentType:false,
            cache: false,
            processData:false
        });
    });
    
    $('#login').click(function(){
        var funame = _('funame').value;
        var fpass  = _('fpass').value;
        $.ajax({
            type:'post',
            url:'getuser.php',
            data:{email:funame,pass:fpass},
            success: function(data){
               console.log(data);
                if(data===0) redirect('user.php');
                else redirect('index.php');
            },
            error: function(){
            }    
        });
    });
});

$(document).keypress(function(event){
    if(event.which==13) _('login').click();
});

function redirect(url){
      //  console.log(url);
      //   console.log(strpos('.php',url));
    _('redirecturl').href = url;
    _('redirecturl').click();
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