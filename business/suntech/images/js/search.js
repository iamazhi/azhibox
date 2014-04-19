// JavaScript Document
function searchtext(n)
{
for(i=0;i <document.getElementById("searchnavMenu").getElementsByTagName("li").length;i++)
document.getElementById("searchnavMenu").getElementsByTagName("li")[i].className="sec1";
document.getElementById("searchnavMenu").getElementsByTagName("li")[n].className="sec2";
for(i=0;i <document.getElementById("main_one").getElementsByTagName("li").length;i++)
document.getElementById("main_one").getElementsByTagName("li")[i].style.display="none";
document.getElementById("main_one").getElementsByTagName("li")[n].style.display="block";


}

// JavaScript Document
function clearcontent(){
if(document.getElementById('inputsearch').value=="输入搜索关键词!"){document.getElementById('inputsearch').value=""}
}
function recover(){
if(document.getElementById('inputsearch').value==""){document.getElementById('inputsearch').value="输入搜索关键词!"}
}
var ids;
var idstext;
function hightlight(){
var text=query.value;
TDs=document.all.table1.all.tags("TD")
//使用iframe时:
//TDs=iframe的name.document.all.table1.all.tags("TD")
    if (text!="")
    {
        for (var i = 0; i < TDs.length; i++)
        {
            obj=TDs[i];
            idstext=obj.innerHTML;
			 idnum=idstext.indexOf(text);
            if (idnum!=-1)
            {
				idstext=idstext.replace(text,"<span style=background-color:red>"+text+"</span>");
				obj.innerHTML=idstext;
			} 
		}
    }
    else
    {
        alert("请输入要查询的关键字！\n\n请注意大小写要正确！");
    }
}