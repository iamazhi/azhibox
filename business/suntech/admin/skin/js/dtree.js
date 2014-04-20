function Node(id, pid, name, url, title, target, icon, iconOpen, open) {
 this.id = id;     // 节点id
 this.pid = pid;     // 节点父idsd
 this.name = name;    // 节点显示名称;
 this.url = url;     // 节点超链接地址;
 this.title = title;    // 节点Tips文本;
 this.target = target;   // 节点链接所打开的目标frame(_blank, _parent, _self, _top)
 this.icon = icon;    // 节点默认图标;
 this.iconOpen = iconOpen;  // 节点展开图标;
 this._io = open || false;  // 节点展开标识;
 this._is = false;    // 节点选中标识;
 this._ls = false;    // 同级最后节点标识;
 this._hc = false;    // 包含子节点标识;
 this._ai = 0;     // 节点在节点数组中的索引值，初始值为0
 this._p;      // 保存父节点对象;
};

/**
 * Tree object<br>
 * 树对象<br>
 */
function dTree(objName,imagePath) {
 this.config = {
  target   : null,  // 默认的节点链接所打开的目标frame(_blank, _parent, _self, _top)
  folderLinks  : true,  // true文件夹节点如果有超链地址,点击节点打开超链接而不是展开节点;false忽略超链展开或折叠节点;
  useSelection : true,  // true高亮显示选中的节点;false反之;
  useCookies  : true,  // true使用Cookies保存节点状态;false反之;
  useLines  : true,  // true使用虚线连接节点的缩进;false反之;
  useIcons  : true,  // true使用图标;false反之;
  useStatusText : true, // false不在状态栏显示节点名称;true反之;
  closeSameLevel : false, // true同一级节点只能有一个处于展开状态;false反之;
  inOrder   : false, // false在整个节点数组中查找子节点;true在索引大于本节点的数组元素中查找子节点(如果子节点总是在父节点后面添加的话，设为true将加快tree的构建速度);
  imagePath   : 'skin/'  // 图片路径;
 }
 this.icon = {
root   : ('admin/skin/images/no.gif'),     
// 根节点图标 
folder : ('admin/skin/images/folder.gif'),    
// 枝节点文件夹图标 
folderOpen  : ('admin/skin/images/folderopen.gif'),  
// 枝节点打开状态文件夹图标 
node  : ('admin/skin/images/page.gif'),   // 叶节点图标 
empty : ('admin/skin/images/empty.gif'), // 空白图标 
line  : ('admin/skin/images/line.gif'),   // 竖线图标 
join  : ('admin/skin/images/join.gif'),   // 丁字线图标 
joinBottom  : ('admin/skin/images/joinbottom.gif'), 
// L线图标 
plus   : ('admin/skin/images/plus.gif'),     // 丁字折叠图标 
plusBottom  : ('admin/skin/images/plusbottom.gif'),  // L折叠图标 
minus   : ('admin/skin/images/minus.gif'),     // 丁字展开图标 
minusBottom  : ('admin/skin/images/minusbottom.gif'),  // L展开图标 
nlPlus   : ('admin/skin/images/nolines_plus.gif'), // 无线折叠图标 
nlMinus   : ('admin/skin/images/nolines_minus.gif') // 无线展开图标 

 };

 this.obj = objName;   // 树对象名称(必须一致) 
 this.aNodes = [];   // 节点数组 
 this.aIndent = [];   // 当前节点到根节点次级节点(pid==-1)，所有父节点是否是同级节点中的最后一个，如果_ls==true则数组对应元素之为0，反之为1
 this.root = new Node(-1); // 默认根节点 
 this.selectedNode = null; // 选中节点的id(tree初始化之前)或它在字节数组中的索引值_ai(tree初始化之后)
 this.selectedFound = false; // true存在选中的节点;false反之 
 this.completed = false;  // tree html 文本构造完成 

};

/**
 * Adds a new node to the node array<br>
 * 添加节点到节点数组<br>
 */
dTree.prototype.add = function(id, pid, name, url, title, target, icon, iconOpen, open) {
 this.aNodes[this.aNodes.length] = new Node(id, pid, name, url, title, target, icon, iconOpen, open);
 
};

/**
 * Open all nodes<br>
 * 展开树上所有节点<br>
 */
dTree.prototype.openAll = function() {
 this.oAll(true);
};
/**
 * Close all nodes<br>
 * 折叠树上所有节点<br>
 */
dTree.prototype.closeAll = function() {
 this.oAll(false);
};


/**
 * Outputs the tree to the page<br>
 * 生成tree的html字符串<br>
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
 * 生成节点及其子节点的html字符串<br>
 */
dTree.prototype.addNode = function(pNode) {

 var str = '';

 var n=0;
 
 // 默认在整个数组中搜索子节点 
 if (this.config.inOrder) n = pNode._ai;
 
 // 遍历节点数组 
 for (n; n<this.aNodes.length; n++) {
  
  // 只处理直接下级节点 
  if (this.aNodes[n].pid == pNode.id) {
   
   // 临时变量 
   var cn = this.aNodes[n];
   
   // 设置节点的父节点属性 
   cn._p = pNode;
   
   // 设置节点的数组索引属性 
   cn._ai = n;
   
   // 设置节点包含子节点标识_hc和同级最后节点标识_ls
   this.setCS(cn);

   // 设置节点target 属性 
   if (!cn.target && this.config.target) cn.target = this.config.target;
   
   // 判断一个包含子节点的节点在Cookie中是否是展开状态 
   if (cn._hc && !cn._io && this.config.useCookies) cn._io = this.isOpen(cn.id);
   
   // 判断是否允许包含子节点的节点带有超链接地址  
   if (!this.config.folderLinks && cn._hc) cn.url = null;
   
   // 判断节点是否被选中 
   if (this.config.useSelection && cn.id == this.selectedNode && !this.selectedFound) {
     
     // 初始化节点选中标志 
     cn._is = true;
     
     // 从这里开始this.selectedNode值由id变为_ai(节点数组索引)
     this.selectedNode = n;
     
     // 初始化tree的选中标志 
     this.selectedFound = true;

   }

   str += this.node(cn, n);
   
   // 判断本级最后一个节点，结束循环 
   if (cn._ls) break;

  }

 }

 return str;

};

 

/**
 * Creates the node icon, url and text<br>
 * 生成节点的html字符串<br>
 * @param node 节点对象;
 * @param nodeId 节点在节点数组中的索引值;
 */
dTree.prototype.node = function(node, nodeId) {
 // 节点前的线条或空白图标 
 var str = '<div class="dTreeNode">' + this.indent(node, nodeId);

 if (this.config.useIcons) {

  // 根据节点类型和状态确定节点的默认图标 
  if (!node.icon) node.icon = (this.root.id == node.pid) ? this.icon.root : ((node._hc) ? this.icon.folder : this.icon.node);

  if (!node.iconOpen) node.iconOpen = (node._hc) ? this.icon.folderOpen : this.icon.node;

  if (this.root.id == node.pid) {

   node.icon = this.icon.root;

  node.iconOpen = this.icon.root;
//修改过.................................................................
  }

  str += '<img id="i' + this.obj + nodeId + '" src="' + ((node._io) ? node.iconOpen : node.icon) + '" alt="" />';

 }

 // 节点文本及动作方法(带超链接、不带超链接) 
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
 
 // --------- 以上是节点面板 --------
 
 // --------- 以下是包含子节点的面板 --------

 if (node._hc) {

  str += '<div id="d' + this.obj + nodeId + '" class="clip" style="display:' + ((this.root.id == node.pid || node._io) ? 'block' : 'none') + ';">';
  
  // 延迟加载子节点(前一条件针对普通节点，后一条件针对次级根节点)
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
 * 根据当前节点到次级根节点的所有父节点是否是同级最后一个节点的属性<br>
 * 确定节点前面显示图标的数量和种类<br>
 * @param node 节点对象;
 * @param nodeId 节点在节点数组中的索引值;
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
 * 设置节点包含子节点标识_hc和同级最后节点标识_ls<br>
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
 * 从Cookie中取得被选中节点在节点数组中的索引<br>
 */
dTree.prototype.getSelected = function() {

 var sn = this.getCookie('cs' + this.obj);

 return (sn) ? sn : null;

};

 

/**
 * Highlights the selected node<br>
 * 使选中的节点高亮显示<br>
 * @param id 节点在节点数组中的索引值;
 */
dTree.prototype.s = function(id) {

 // 判断是否允许选中节点 
 if (!this.config.useSelection) return;

 // 根据索引值从节点数组中取出节点对象 
 var cn = this.aNodes[id];

 // 判断包含子节点的节点是否允许选中 
 if (cn._hc && !this.config.folderLinks) return;

 // 交换新旧节点的选中状态，改变css
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
 * 把折叠状态节点的子节点加载到子节点面板中<br>
 * @param node 节点对象;
 */
dTree.prototype.delayOpen = function(node) {
 var cn = node;
 var id = node._ai;
 // 延迟加载折叠状态节点的子节点 
 if(cn._io==false)
 {
  // 获取展示子节点的div
  var childrenDIV = document.getElementById('d' + this.obj + id);
  
  // 该结点从未展开过 
  if(childrenDIV!=null && childrenDIV.innerHTML=="")
  {
   // 将从当前节点到次级根节点之前所有父节点是否是同级节点的最后一个的标志压栈 
   var nodeTemp = cn;
   var indentArray = new Array();
   
   // 循环到次级根节点之前 
   while(nodeTemp._p.id!=this.root.id)
   {
    indentArray[indentArray.length] = (nodeTemp._ls) ? 0 : 1;
    nodeTemp = nodeTemp._p;
   }
   
   // 反向压栈 
   for(var i = indentArray.length - 1; i>=0; i--)
   {
    this.aIndent.push(indentArray[i]);
   }
   
   // 初始化下下级所有结点，并得到所有下一级子节点的html字符串，并将一层孩子写入到页面中 
   childrenDIV.innerHTML = this.addNode(cn);
   
   // 清除临时深度 
   for(var i = 0; i < indentArray.length; i++)
   {
    this.aIndent.pop();
   }
  }
 }
}

 

/**
 * Toggle Open or close<br>
 * 展开或折叠包某个含子节点的节点<br>
 * @param id 节点在节点数组中的索引值;
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
 * 展开或折叠包全部含子节点的节点<br>
 * @param status true展开，false折叠;
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
 * 为选中或看到某一节点而展开其所有父节点<br>
 * @param nId 节点的id而不是节点数组索引;
 * @param bSelect true展开后选中节点，false反之;
 */
dTree.prototype.openTo = function(nId, bSelect) {

 // 根据节点id获取节点对象 
 for (var n=0; n<this.aNodes.length; n++) {

  if (this.aNodes[n].id == nId) {
   
   // 节点id转化为节点在节点数组中的索引值 
   nId=n;

   break;

  }

 }

 var cn=this.aNodes[nId];

 // 保存指定节点及其到次级根节点前的全部父节点的临时数组变量 
 var parentArray = new Array();
 
 // 从低级到高级把父节点压入堆栈 
 while(cn.pid!=-1){
  
  parentArray.push(cn);
  
  for (var n=0; n<this.aNodes.length; n++) {
   
   if (this.aNodes[n].id == cn.pid) {
    
    cn = this.aNodes[n];
    
    break;
   }
  }
 }
 
 // 从高级到低级弹出父节点，并选中、打开。 
 while(cn=parentArray.pop()){
  
  // 是否要选中 
  if(this.completed && bSelect){
   
   this.s(cn._ai);
   
  }
  
  // 展开包含子节点的节点，如果最低级的节点是包含子节点的节点就不再展开 
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
 * 折叠同级的其他包含有子节点的节点，使得只有自己处于展开状态<br>
 * @param node 节点对象;
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
 * 折叠同级的其他包含有子节点的节点，使得只有当前节点处于展开状态<br>
 * @param node 节点对象;
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
 * 改变节点的状态(展开或折叠)<br>
 * @param status true展开，false折叠;
 * @param id 节点的数组索引值(_ai);
 * @param bottom 是否是本级最后一个节点(_ls);
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
 * 清空Cookie中保存的展开状态节点id集合、选中的节点id(不是节点的字节数组索引_ai)<br>
 */
dTree.prototype.clearCookie = function() {

 var now = new Date();

 var yesterday = new Date(now.getTime() - 1000 * 60 * 60 * 24);

 this.setCookie('co'+this.obj, 'cookieValue', yesterday);

 this.setCookie('cs'+this.obj, 'cookieValue', yesterday);

};

 

/**
 * [Cookie] Sets value in a cookie<br>
 * 在Cookie中保存一个键值对<br>
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
 * 从Cookie中获取一个键名的值<br>
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
 * 保存展开状态节点的ID到Cookie中<br>
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
 * 检查一个节点的id是否保存在Cookie中，以判断节点展开或折叠<br>
 */
dTree.prototype.isOpen = function(id) {
 var aOpen = this.getCookie('co' + this.obj).split('.');
 for (var n=0; n<aOpen.length; n++)
  if (aOpen[n] == id) return true;
 return false;
};

 

// If Push and pop is not implemented by the browser
// 如果数组类型没有定义 Push 和 pop 方法，就使用自定义的Push 和 pop实现 
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


