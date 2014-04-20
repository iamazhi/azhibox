// JavaScript Document
function hc(obj,cssname) {
 var list = document.getElementsByTagName("li");
 for(i=0; i<list.length; i++){
   list[i].className = "";
 }
 obj.className = cssname;
}
//点击显示左侧
var preClassName = "man_nav_1";
function list_sub_nav(Id,sortname)
{
   if(preClassName != "")
   {
      getObject(preClassName).className="bg_image";
   }
   if(getObject(Id).className == "bg_image"){
      getObject(Id).className="bg_image_onclick";
	  
      preClassName = Id;
	  showInnerText(Id);
	  //window.top.document.getElementById('main_nav').outlookbar.getbytitle(sortname);
	 //window.top.document.getElementById('main_nav').outlookbar.getdefaultnav(sortname);
	  //window.top.frames['leftFrame'].outlookbar.getbytitle(sortname);
	 // window.top.frames['leftFrame'].outlookbar.getdefaultnav(sortname);


   }
}
 //获取对象属性兼容方法
 function getObject(objectId) {
    if(document.getElementById && document.getElementById(objectId)) {
	// W3C DOM
	return document.getElementById(objectId);
    } else if (document.all && document.all(objectId)) {
	// MSIE 4 DOM
	return document.all(objectId);
    } else if (document.layers && document.layers[objectId]) {
	// NN 4 DOM.. note: this won't find nested layers
	return document.layers[objectId];
    } 
	else
	{
	return false;
    }
}

function showInnerText(Id){
    var switchId = parseInt(Id.substring(8));
	var showText = "对不起没有信息！";
	
	switch(switchId){
	    case 1:
		   showText =  "管理面板";
		//document.write(d);
		   break;
	    case 2:
		   showText =  "系统管理";
		   break;
	    case 3:
		   showText =  "文章管理";
		   break;		   
	    case 4:
		   showText =  "模块管理";
		   break;	
	    case 5:
		   showText =  "会员管理";
		   break;		
		case 6:
		   showText =  "模板管理";
		   break;	
		case 127:
		   showText =  "彩票管理";
		   break;	
		   
	}
	//显示到div层
	getObject('show_text').innerHTML = showText;
	getObject('cuured').innerHTML = showText;
	
	//getObject('ddc').innerHTML = "";
}
