// JavaScript Document
function secBoard_one(n)
{
for(i=0;i <document.getElementById("Yellow_menu").getElementsByTagName("li").length;i++)
document.getElementById("Yellow_menu").getElementsByTagName("li")[i].className="Yellow_sec1";
document.getElementById("Yellow_menu").getElementsByTagName("li")[n].className="Yellow_sec2";
for(i=0;i <document.getElementById("Yellow_main").getElementsByTagName("li").length;i++)
document.getElementById("Yellow_main").getElementsByTagName("li")[i].style.display="none";
document.getElementById("Yellow_main").getElementsByTagName("li")[n].style.display="block";

}
function White(n)
{
for(i=0;i <document.getElementById("White_menu").getElementsByTagName("li").length;i++)
document.getElementById("White_menu").getElementsByTagName("li")[i].className="White_sec1";
document.getElementById("White_menu").getElementsByTagName("li")[n].className="White_sec2";
for(i=0;i <document.getElementById("White_main").getElementsByTagName("li").length;i++)
document.getElementById("White_main").getElementsByTagName("li")[i].style.display="none";
document.getElementById("White_main").getElementsByTagName("li")[n].style.display="block";

}
function Green(n)
{
for(i=0;i <document.getElementById("Green_menu").getElementsByTagName("li").length;i++)
document.getElementById("Green_menu").getElementsByTagName("li")[i].className="Green_sec1";
document.getElementById("Green_menu").getElementsByTagName("li")[n].className="Green_sec2";
for(i=0;i <document.getElementById("Green_main").getElementsByTagName("li").length;i++)
document.getElementById("Green_main").getElementsByTagName("li")[i].style.display="none";
document.getElementById("Green_main").getElementsByTagName("li")[n].style.display="block";

}

function GreenTwo(n)
{
for(i=0;i <document.getElementById("GreenTwo_menu").getElementsByTagName("li").length;i++)
document.getElementById("GreenTwo_menu").getElementsByTagName("li")[i].className="GreenTwo_sec1";
document.getElementById("GreenTwo_menu").getElementsByTagName("li")[n].className="GreenTwo_sec2";
for(i=0;i <document.getElementById("GreenTwo_main").getElementsByTagName("li").length;i++)
document.getElementById("GreenTwo_main").getElementsByTagName("li")[i].style.display="none";
document.getElementById("GreenTwo_main").getElementsByTagName("li")[n].style.display="block";

}

function subsearch(n)
{
for(i=0;i <document.getElementById("subSearchmenu").getElementsByTagName("li").length;i++)
document.getElementById("subSearchmenu").getElementsByTagName("li")[i].className="subsec1";
document.getElementById("subSearchmenu").getElementsByTagName("li")[n].className="subsec2";
for(i=0;i <document.getElementById("submain").getElementsByTagName("li").length;i++)
document.getElementById("submain").getElementsByTagName("li")[i].style.display="none";
document.getElementById("submain").getElementsByTagName("li")[n].style.display="block";

}