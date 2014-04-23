// JavaScript Document
$(function(){
var sw = 0;
$("#banner .select a").mouseover(function(){
   sw = $(".select a").index(this);
   myShow(sw);
});

function myShow(i){
   $("#banner .select a").eq(i).addClass("cur").siblings("a").removeClass("cur");
   $("#banner .demo ul li").eq(i).stop(true,true).fadeIn(600).siblings("li").fadeOut(600);
}
//滑入停止动画，滑出开始动画
$("#banner").hover(function(){
   if(myTime){
     clearInterval(myTime);
   }
},function(){
    myTime = setInterval(function(){
    myShow(sw)
    sw++;
    if(sw==4){sw=0;}
   } , 3000);
});
//自动开始
var myTime = setInterval(function(){
    myShow(sw)
    sw++;
    if(sw==4){sw=0;}
} , 3000);
})
