// JavaScript Document
function hc(obj,cssname) {
 var list = document.getElementsByTagName("li");
 for(i=0; i<list.length; i++){
   list[i].className = "";
 }
 obj.className = cssname;
}
//�����ʾ���
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
 //��ȡ�������Լ��ݷ���
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
	var showText = "�Բ���û����Ϣ��";
	
	switch(switchId){
	    case 1:
		   showText =  "�������";
		//document.write(d);
		   break;
	    case 2:
		   showText =  "ϵͳ����";
		   break;
	    case 3:
		   showText =  "���¹���";
		   break;		   
	    case 4:
		   showText =  "ģ�����";
		   break;	
	    case 5:
		   showText =  "��Ա����";
		   break;		
		case 6:
		   showText =  "ģ�����";
		   break;	
		case 127:
		   showText =  "��Ʊ����";
		   break;	
		   
	}
	//��ʾ��div��
	getObject('show_text').innerHTML = showText;
	getObject('cuured').innerHTML = showText;
	
	//getObject('ddc').innerHTML = "";
}
