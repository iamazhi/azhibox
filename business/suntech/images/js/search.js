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
if(document.getElementById('inputsearch').value=="���������ؼ���!"){document.getElementById('inputsearch').value=""}
}
function recover(){
if(document.getElementById('inputsearch').value==""){document.getElementById('inputsearch').value="���������ؼ���!"}
}
var ids;
var idstext;
function hightlight(){
var text=query.value;
TDs=document.all.table1.all.tags("TD")
//ʹ��iframeʱ:
//TDs=iframe��name.document.all.table1.all.tags("TD")
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
        alert("������Ҫ��ѯ�Ĺؼ��֣�\n\n��ע���СдҪ��ȷ��");
    }
}