// JavaScript Document
$(function(){
var sw = 0;
$(".banner .select a").mouseover(function(){
   sw = $(".select a").index(this);
   myShow(sw);
});
function myShow(i){
   $(".banner .select a").eq(i).addClass("cur").siblings("a").removeClass("cur");
   $(".demo ul li").eq(i).stop(true,true).fadeIn(600).siblings("li").fadeOut(600);
}
//滑入停止动画，滑出开始动画
$(".banner").hover(function(){
   if(myTime){
     clearInterval(myTime);
   }
},function(){
   myTime = setInterval(function(){
    myShow(sw)
    sw++;
    if(sw==3){sw=0;}
   } , 3000);
});
//自动开始
var myTime = setInterval(function(){
    myShow(sw)
    sw++;
    if(sw==3){sw=0;}
} , 3000);
})

$(function(){
var sw = 0;
$(".banner1 .select1 a").mouseover(function(){
   sw = $(".select1 a").index(this);
   myShow(sw);
});
function myShow(i){
   $(".banner1 .select1 a").eq(i).addClass("cur").siblings("a").removeClass("cur");
   $(".demo1 ul li").eq(i).stop(true,true).fadeIn(600).siblings("li").fadeOut(600);
}
//滑入停止动画，滑出开始动画
$(".banner1").hover(function(){
   if(myTime){
     clearInterval(myTime);
   }
},function(){
   myTime = setInterval(function(){
    myShow(sw)
    sw++;
    if(sw==3){sw=0;}
   } , 3000);
});
//自动开始
var myTime = setInterval(function(){
    myShow(sw)
    sw++;
    if(sw==3){sw=0;}
} , 3000);
})