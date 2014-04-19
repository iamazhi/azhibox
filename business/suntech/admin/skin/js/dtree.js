function Node(id, pid, name, url, title, target, icon, iconOpen, open) {
 this.id = id;     // �ڵ�id
 this.pid = pid;     // �ڵ㸸idsd
 this.name = name;    // �ڵ���ʾ����;
 this.url = url;     // �ڵ㳬���ӵ�ַ;
 this.title = title;    // �ڵ�Tips�ı�;
 this.target = target;   // �ڵ��������򿪵�Ŀ��frame(_blank, _parent, _self, _top)
 this.icon = icon;    // �ڵ�Ĭ��ͼ��;
 this.iconOpen = iconOpen;  // �ڵ�չ��ͼ��;
 this._io = open || false;  // �ڵ�չ����ʶ;
 this._is = false;    // �ڵ�ѡ�б�ʶ;
 this._ls = false;    // ͬ�����ڵ��ʶ;
 this._hc = false;    // �����ӽڵ��ʶ;
 this._ai = 0;     // �ڵ��ڽڵ������е�����ֵ����ʼֵΪ0
 this._p;      // ���游�ڵ����;
};

/**
 * Tree object<br>
 * ������<br>
 */
function dTree(objName,imagePath) {
 this.config = {
  target   : null,  // Ĭ�ϵĽڵ��������򿪵�Ŀ��frame(_blank, _parent, _self, _top)
  folderLinks  : true,  // true�ļ��нڵ�����г�����ַ,����ڵ�򿪳����Ӷ�����չ���ڵ�;false���Գ���չ�����۵��ڵ�;
  useSelection : true,  // true������ʾѡ�еĽڵ�;false��֮;
  useCookies  : true,  // trueʹ��Cookies����ڵ�״̬;false��֮;
  useLines  : true,  // trueʹ���������ӽڵ������;false��֮;
  useIcons  : true,  // trueʹ��ͼ��;false��֮;
  useStatusText : true, // false����״̬����ʾ�ڵ�����;true��֮;
  closeSameLevel : false, // trueͬһ���ڵ�ֻ����һ������չ��״̬;false��֮;
  inOrder   : false, // false�������ڵ������в����ӽڵ�;true���������ڱ��ڵ������Ԫ���в����ӽڵ�(����ӽڵ������ڸ��ڵ������ӵĻ�����Ϊtrue���ӿ�tree�Ĺ����ٶ�);
  imagePath   : 'skin/'  // ͼƬ·��;
 }
 this.icon = {
root   : ('admin/skin/images/no.gif'),     
// ���ڵ�ͼ�� 
folder : ('admin/skin/images/folder.gif'),    
// ֦�ڵ��ļ���ͼ�� 
folderOpen  : ('admin/skin/images/folderopen.gif'),  
// ֦�ڵ��״̬�ļ���ͼ�� 
node  : ('admin/skin/images/page.gif'),   // Ҷ�ڵ�ͼ�� 
empty : ('admin/skin/images/empty.gif'), // �հ�ͼ�� 
line  : ('admin/skin/images/line.gif'),   // ����ͼ�� 
join  : ('admin/skin/images/join.gif'),   // ������ͼ�� 
joinBottom  : ('admin/skin/images/joinbottom.gif'), 
// L��ͼ�� 
plus   : ('admin/skin/images/plus.gif'),     // �����۵�ͼ�� 
plusBottom  : ('admin/skin/images/plusbottom.gif'),  // L�۵�ͼ�� 
minus   : ('admin/skin/images/minus.gif'),     // ����չ��ͼ�� 
minusBottom  : ('admin/skin/images/minusbottom.gif'),  // Lչ��ͼ�� 
nlPlus   : ('admin/skin/images/nolines_plus.gif'), // �����۵�ͼ�� 
nlMinus   : ('admin/skin/images/nolines_minus.gif') // ����չ��ͼ�� 

 };

 this.obj = objName;   // ����������(����һ��) 
 this.aNodes = [];   // �ڵ����� 
 this.aIndent = [];   // ��ǰ�ڵ㵽���ڵ�μ��ڵ�(pid==-1)�����и��ڵ��Ƿ���ͬ���ڵ��е����һ�������_ls==true�������ӦԪ��֮Ϊ0����֮Ϊ1
 this.root = new Node(-1); // Ĭ�ϸ��ڵ� 
 this.selectedNode = null; // ѡ�нڵ��id(tree��ʼ��֮ǰ)�������ֽ������е�����ֵ_ai(tree��ʼ��֮��)
 this.selectedFound = false; // true����ѡ�еĽڵ�;false��֮ 
 this.completed = false;  // tree html �ı�������� 

};

/**
 * Adds a new node to the node array<br>
 * ��ӽڵ㵽�ڵ�����<br>
 */
dTree.prototype.add = function(id, pid, name, url, title, target, icon, iconOpen, open) {
 this.aNodes[this.aNodes.length] = new Node(id, pid, name, url, title, target, icon, iconOpen, open);
 
};

/**
 * Open all nodes<br>
 * չ���������нڵ�<br>
 */
dTree.prototype.openAll = function() {
 this.oAll(true);
};
/**
 * Close all nodes<br>
 * �۵��������нڵ�<br>
 */
dTree.prototype.closeAll = function() {
 this.oAll(false);
};


/**
 * Outputs the tree to the page<br>
 * ����tree��html�ַ���<br>
 */
dTree.prototype.toString = function() {
 var str = '<div class="dtree">\n';
 if (document.getElementById) {
  if (this.config.useCookies) this.selectedNode = this.getSelected();
  str += this.addNode(this.root);
 } else str += 'Browser not supported.';
 str += '</div>';
 if (!this.selectedFound) this.selectedNode = null;
 this.completed = true;
 return str;
};
/**
 * Creates the tree structure<br>
 * ���ɽڵ㼰���ӽڵ��html�ַ���<br>
 */
dTree.prototype.addNode = function(pNode) {

 var str = '';

 var n=0;
 
 // Ĭ�������������������ӽڵ� 
 if (this.config.inOrder) n = pNode._ai;
 
 // �����ڵ����� 
 for (n; n<this.aNodes.length; n++) {
  
  // ֻ����ֱ���¼��ڵ� 
  if (this.aNodes[n].pid == pNode.id) {
   
   // ��ʱ���� 
   var cn = this.aNodes[n];
   
   // ���ýڵ�ĸ��ڵ����� 
   cn._p = pNode;
   
   // ���ýڵ�������������� 
   cn._ai = n;
   
   // ���ýڵ�����ӽڵ��ʶ_hc��ͬ�����ڵ��ʶ_ls
   this.setCS(cn);

   // ���ýڵ�target ���� 
   if (!cn.target && this.config.target) cn.target = this.config.target;
   
   // �ж�һ�������ӽڵ�Ľڵ���Cookie���Ƿ���չ��״̬ 
   if (cn._hc && !cn._io && this.config.useCookies) cn._io = this.isOpen(cn.id);
   
   // �ж��Ƿ���������ӽڵ�Ľڵ���г����ӵ�ַ  
   if (!this.config.folderLinks && cn._hc) cn.url = null;
   
   // �жϽڵ��Ƿ�ѡ�� 
   if (this.config.useSelection && cn.id == this.selectedNode && !this.selectedFound) {
     
     // ��ʼ���ڵ�ѡ�б�־ 
     cn._is = true;
     
     // �����￪ʼthis.selectedNodeֵ��id��Ϊ_ai(�ڵ���������)
     this.selectedNode = n;
     
     // ��ʼ��tree��ѡ�б�־ 
     this.selectedFound = true;

   }

   str += this.node(cn, n);
   
   // �жϱ������һ���ڵ㣬����ѭ�� 
   if (cn._ls) break;

  }

 }

 return str;

};

 

/**
 * Creates the node icon, url and text<br>
 * ���ɽڵ��html�ַ���<br>
 * @param node �ڵ����;
 * @param nodeId �ڵ��ڽڵ������е�����ֵ;
 */
dTree.prototype.node = function(node, nodeId) {
 // �ڵ�ǰ��������հ�ͼ�� 
 var str = '<div class="dTreeNode">' + this.indent(node, nodeId);

 if (this.config.useIcons) {

  // ���ݽڵ����ͺ�״̬ȷ���ڵ��Ĭ��ͼ�� 
  if (!node.icon) node.icon = (this.root.id == node.pid) ? this.icon.root : ((node._hc) ? this.icon.folder : this.icon.node);

  if (!node.iconOpen) node.iconOpen = (node._hc) ? this.icon.folderOpen : this.icon.node;

  if (this.root.id == node.pid) {

   node.icon = this.icon.root;

  node.iconOpen = this.icon.root;
//�޸Ĺ�.................................................................
  }

  str += '<img id="i' + this.obj + nodeId + '" src="' + ((node._io) ? node.iconOpen : node.icon) + '" alt="" />';

 }

 // �ڵ��ı�����������(�������ӡ�����������) 
 if (node.url) {

  str += '<a id="s' + this.obj + nodeId + '" class="' + ((this.config.useSelection) ? ((node._is ? 'nodeSel' : 'node')) : 'node') + '" href="' + node.url + '"';

  if (node.title) str += ' title="' + node.title + '"';

  if (node.target) str += ' target="' + node.target + '"';

  if (this.config.useStatusText) str += ' onmouseover="window.status=\'' + node.name + '\';return true;" onmouseout="window.status=\'\';return true;" ';

  if (this.config.useSelection && ((node._hc && this.config.folderLinks) || !node._hc))

   str += ' onclick="javascript: ' + this.obj + '.s(' + nodeId + ');"';

  str += '>';

 } else if ((!this.config.folderLinks || !node.url) && node._hc && node.pid != this.root.id){

  str += '<a href="javascript: ' + this.obj + '.o(' + nodeId + ');" class="node">';
  
 }

 str += node.name;

 if ((node.url || ((!this.config.folderLinks || !node.url) && node._hc)) && node.pid != this.root.id) str += '</a>';

 str += '</div>';
 
 // --------- �����ǽڵ���� --------
 
 // --------- �����ǰ����ӽڵ����� --------

 if (node._hc) {

  str += '<div id="d' + this.obj + nodeId + '" class="clip" style="display:' + ((this.root.id == node.pid || node._io) ? 'block' : 'none') + ';">';
  
  // �ӳټ����ӽڵ�(ǰһ���������ͨ�ڵ㣬��һ������Դμ����ڵ�)
  if ((node._hc && node._io && node.pid!=-1) || (node._hc && node.pid==-1)) {
   str += this.addNode(node);
  }
  
  str += '</div>';

 }

 this.aIndent.pop();

 return str;

};

/**
 * Adds the empty and line icons <br>
 * ���ݵ�ǰ�ڵ㵽�μ����ڵ�����и��ڵ��Ƿ���ͬ�����һ���ڵ������<br>
 * ȷ���ڵ�ǰ����ʾͼ�������������<br>
 * @param node �ڵ����;
 * @param nodeId �ڵ��ڽڵ������е�����ֵ;
 */
dTree.prototype.indent = function(node, nodeId) {

 var str = '';

 if (this.root.id != node.pid) {

  for (var n=0; n<this.aIndent.length; n++){
   
   str += '<img src="' + ( (this.aIndent[n] == 1 && this.config.useLines) ? this.icon.line : this.icon.empty ) + '" alt="" />';
   
  }

  (node._ls) ? this.aIndent.push(0) : this.aIndent.push(1);

  if (node._hc) {

   str += '<a href="javascript: ' + this.obj + '.o(' + nodeId + ');"><img id="j' + this.obj + nodeId + '" src="';

   if (!this.config.useLines) str += (node._io) ? this.icon.nlMinus : this.icon.nlPlus;

   else str += ( (node._io) ? ((node._ls && this.config.useLines) ? this.icon.minusBottom : this.icon.minus) : ((node._ls && this.config.useLines) ? this.icon.plusBottom : this.icon.plus ) );

   str += '" alt="" /></a>';

  } else str += '<img src="' + ( (this.config.useLines) ? ((node._ls) ? this.icon.joinBottom : this.icon.join ) : this.icon.empty) + '" alt="" />';

 }

 return str;

};


/**
 * Checks if a node has any children and if it is the last sibling<br>
 * ���ýڵ�����ӽڵ��ʶ_hc��ͬ�����ڵ��ʶ_ls<br>
 */
dTree.prototype.setCS = function(node) {

 var lastId;

 for (var n=0; n<this.aNodes.length; n++) {

  if (this.aNodes[n].pid == node.id) node._hc = true;

  if (this.aNodes[n].pid == node.pid) lastId = this.aNodes[n].id;

 }

 if (lastId==node.id) node._ls = true;

};

 

/**
 * Returns the selected node<br>
 * ��Cookie��ȡ�ñ�ѡ�нڵ��ڽڵ������е�����<br>
 */
dTree.prototype.getSelected = function() {

 var sn = this.getCookie('cs' + this.obj);

 return (sn) ? sn : null;

};

 

/**
 * Highlights the selected node<br>
 * ʹѡ�еĽڵ������ʾ<br>
 * @param id �ڵ��ڽڵ������е�����ֵ;
 */
dTree.prototype.s = function(id) {

 // �ж��Ƿ�����ѡ�нڵ� 
 if (!this.config.useSelection) return;

 // ��������ֵ�ӽڵ�������ȡ���ڵ���� 
 var cn = this.aNodes[id];

 // �жϰ����ӽڵ�Ľڵ��Ƿ�����ѡ�� 
 if (cn._hc && !this.config.folderLinks) return;

 // �����¾ɽڵ��ѡ��״̬���ı�css
 if (this.selectedNode != id) {
  
  if (this.selectedNode || this.selectedNode==0) {

   eOld = document.getElementById("s" + this.obj + this.selectedNode);

   if(eOld){
    eOld.className = "node";
   }

  }

  eNew = document.getElementById("s" + this.obj + id);

  if(eNew){
   eNew.className = "nodeSel";
  }

  this.selectedNode = id;

  if (this.config.useCookies) this.setCookie('cs' + this.obj, cn.id);

 }

};

 

/**
 * ���۵�״̬�ڵ���ӽڵ���ص��ӽڵ������<br>
 * @param node �ڵ����;
 */
dTree.prototype.delayOpen = function(node) {
 var cn = node;
 var id = node._ai;
 // �ӳټ����۵�״̬�ڵ���ӽڵ� 
 if(cn._io==false)
 {
  // ��ȡչʾ�ӽڵ��div
  var childrenDIV = document.getElementById('d' + this.obj + id);
  
  // �ý���δչ���� 
  if(childrenDIV!=null && childrenDIV.innerHTML=="")
  {
   // ���ӵ�ǰ�ڵ㵽�μ����ڵ�֮ǰ���и��ڵ��Ƿ���ͬ���ڵ�����һ���ı�־ѹջ 
   var nodeTemp = cn;
   var indentArray = new Array();
   
   // ѭ�����μ����ڵ�֮ǰ 
   while(nodeTemp._p.id!=this.root.id)
   {
    indentArray[indentArray.length] = (nodeTemp._ls) ? 0 : 1;
    nodeTemp = nodeTemp._p;
   }
   
   // ����ѹջ 
   for(var i = indentArray.length - 1; i>=0; i--)
   {
    this.aIndent.push(indentArray[i]);
   }
   
   // ��ʼ�����¼����н�㣬���õ�������һ���ӽڵ��html�ַ���������һ�㺢��д�뵽ҳ���� 
   childrenDIV.innerHTML = this.addNode(cn);
   
   // �����ʱ��� 
   for(var i = 0; i < indentArray.length; i++)
   {
    this.aIndent.pop();
   }
  }
 }
}

 

/**
 * Toggle Open or close<br>
 * չ�����۵���ĳ�����ӽڵ�Ľڵ�<br>
 * @param id �ڵ��ڽڵ������е�����ֵ;
 */
dTree.prototype.o = function(id) {

 var cn = this.aNodes[id];
 
 this.delayOpen(cn);

 this.nodeStatus(!cn._io, id, cn._ls);

 cn._io = !cn._io;

 if (this.config.closeSameLevel) this.closeLevel(cn);

 if (this.config.useCookies) this.updateCookie();

};

 

/**
 * Open or close all nodes<br>
 * չ�����۵���ȫ�����ӽڵ�Ľڵ�<br>
 * @param status trueչ����false�۵�;
 */
dTree.prototype.oAll = function(status) {

 for (var n=0; n<this.aNodes.length; n++) {

  if (this.aNodes[n]._hc && this.aNodes[n].pid != this.root.id) {
   
   this.delayOpen(this.aNodes[n]);

   this.nodeStatus(status, n, this.aNodes[n]._ls)

   this.aNodes[n]._io = status;

  }

 }

 if (this.config.useCookies) this.updateCookie();

};

 

/**
 * Opens the tree to a specific node<br>
 * Ϊѡ�л򿴵�ĳһ�ڵ��չ�������и��ڵ�<br>
 * @param nId �ڵ��id�����ǽڵ���������;
 * @param bSelect trueչ����ѡ�нڵ㣬false��֮;
 */
dTree.prototype.openTo = function(nId, bSelect) {

 // ���ݽڵ�id��ȡ�ڵ���� 
 for (var n=0; n<this.aNodes.length; n++) {

  if (this.aNodes[n].id == nId) {
   
   // �ڵ�idת��Ϊ�ڵ��ڽڵ������е�����ֵ 
   nId=n;

   break;

  }

 }

 var cn=this.aNodes[nId];

 // ����ָ���ڵ㼰�䵽�μ����ڵ�ǰ��ȫ�����ڵ����ʱ������� 
 var parentArray = new Array();
 
 // �ӵͼ����߼��Ѹ��ڵ�ѹ���ջ 
 while(cn.pid!=-1){
  
  parentArray.push(cn);
  
  for (var n=0; n<this.aNodes.length; n++) {
   
   if (this.aNodes[n].id == cn.pid) {
    
    cn = this.aNodes[n];
    
    break;
   }
  }
 }
 
 // �Ӹ߼����ͼ��������ڵ㣬��ѡ�С��򿪡� 
 while(cn=parentArray.pop()){
  
  // �Ƿ�Ҫѡ�� 
  if(this.completed && bSelect){
   
   this.s(cn._ai);
   
  }
  
  // չ�������ӽڵ�Ľڵ㣬�����ͼ��Ľڵ��ǰ����ӽڵ�Ľڵ�Ͳ���չ�� 
  if(cn._hc && parentArray.length>0){
   
   this.delayOpen(cn);

   this.nodeStatus(true, cn._ai, cn._ls);
  
   cn._io = true;
  
   if (this.config.closeSameLevel) this.closeLevel(cn);
  
   if (this.config.useCookies) this.updateCookie();
   
  }
 }

};

 

/**
 * Closes all nodes on the same level as certain node<br>
 * �۵�ͬ���������������ӽڵ�Ľڵ㣬ʹ��ֻ���Լ�����չ��״̬<br>
 * @param node �ڵ����;
 */
dTree.prototype.closeLevel = function(node) {

 for (var n=0; n<this.aNodes.length; n++) {

  if (this.aNodes[n].pid == node.pid && this.aNodes[n].id != node.id && this.aNodes[n]._hc) {

   this.nodeStatus(false, n, this.aNodes[n]._ls);

   this.aNodes[n]._io = false;

   this.closeAllChildren(this.aNodes[n]);

  }

 }

}

 

/**
 * Closes all children of a node<br>
 * �۵�ͬ���������������ӽڵ�Ľڵ㣬ʹ��ֻ�е�ǰ�ڵ㴦��չ��״̬<br>
 * @param node �ڵ����;
 */
dTree.prototype.closeAllChildren = function(node) {

 for (var n=0; n<this.aNodes.length; n++) {

  if (this.aNodes[n].pid == node.id && this.aNodes[n]._hc) {

   if (this.aNodes[n]._io) this.nodeStatus(false, n, this.aNodes[n]._ls);

   this.aNodes[n]._io = false;

   this.closeAllChildren(this.aNodes[n]);  

  }

 }

}

 

/**
 * Change the status of a node(open or closed)<br>
 * �ı�ڵ��״̬(չ�����۵�)<br>
 * @param status trueչ����false�۵�;
 * @param id �ڵ����������ֵ(_ai);
 * @param bottom �Ƿ��Ǳ������һ���ڵ�(_ls);
 */
dTree.prototype.nodeStatus = function(status, id, bottom) {

 eDiv = document.getElementById('d' + this.obj + id);

 eJoin = document.getElementById('j' + this.obj + id);

 if (this.config.useIcons) {

  eIcon = document.getElementById('i' + this.obj + id);

  eIcon.src = (status) ? this.aNodes[id].iconOpen : this.aNodes[id].icon;

 }

 eJoin.src = (this.config.useLines)?

 ((status)?((bottom)?this.icon.minusBottom:this.icon.minus):((bottom)?this.icon.plusBottom:this.icon.plus)):

 ((status)?this.icon.nlMinus:this.icon.nlPlus);

 eDiv.style.display = (status) ? 'block': 'none';

};

 

/**
 * [Cookie] Clears a cookie<br>
 * ���Cookie�б����չ��״̬�ڵ�id���ϡ�ѡ�еĽڵ�id(���ǽڵ���ֽ���������_ai)<br>
 */
dTree.prototype.clearCookie = function() {

 var now = new Date();

 var yesterday = new Date(now.getTime() - 1000 * 60 * 60 * 24);

 this.setCookie('co'+this.obj, 'cookieValue', yesterday);

 this.setCookie('cs'+this.obj, 'cookieValue', yesterday);

};

 

/**
 * [Cookie] Sets value in a cookie<br>
 * ��Cookie�б���һ����ֵ��<br>
 */
dTree.prototype.setCookie = function(cookieName, cookieValue, expires, path, domain, secure) {

 document.cookie =

  escape(cookieName) + '=' + escape(cookieValue)

  + (expires ? '; expires=' + expires.toGMTString() : '')

  + (path ? '; path=' + path : '')

  + (domain ? '; domain=' + domain : '')

  + (secure ? '; secure' : '');

};

 

/**
 * [Cookie] Gets a value from a cookie<br>
 * ��Cookie�л�ȡһ��������ֵ<br>
 */
dTree.prototype.getCookie = function(cookieName) {

 var cookieValue = '';

 var posName = document.cookie.indexOf(escape(cookieName) + '=');

 if (posName != -1) {

  var posValue = posName + (escape(cookieName) + '=').length;

  var endPos = document.cookie.indexOf(';', posValue);

  if (endPos != -1) cookieValue = unescape(document.cookie.substring(posValue, endPos));

  else cookieValue = unescape(document.cookie.substring(posValue));

 }

 return (cookieValue);

};

 

/**
 * [Cookie] Returns ids of open nodes as a string<br>
 * ����չ��״̬�ڵ��ID��Cookie��<br>
 */
dTree.prototype.updateCookie = function() {
 var str = '';
 for (var n=0; n<this.aNodes.length; n++) {
  if (this.aNodes[n]._io && this.aNodes[n].pid != this.root.id) {
   if (str) str += '.';
   str += this.aNodes[n].id;
  }
 }
 this.setCookie('co' + this.obj, str);
};

 

/**
 * [Cookie] Checks if a node id is in a cookie<br>
 * ���һ���ڵ��id�Ƿ񱣴���Cookie�У����жϽڵ�չ�����۵�<br>
 */
dTree.prototype.isOpen = function(id) {
 var aOpen = this.getCookie('co' + this.obj).split('.');
 for (var n=0; n<aOpen.length; n++)
  if (aOpen[n] == id) return true;
 return false;
};

 

// If Push and pop is not implemented by the browser
// �����������û�ж��� Push �� pop ��������ʹ���Զ����Push �� popʵ�� 
if (!Array.prototype.push) {
 Array.prototype.push = function array_push() {
  for(var i=0;i<arguments.length;i++)
   this[this.length]=arguments[i];
  return this.length;
 }
};

if (!Array.prototype.pop) {
 Array.prototype.pop = function array_pop() {
  lastElement = this[this.length-1];
  this.length = Math.max(this.length-1,0);
  return lastElement;
 }
};


