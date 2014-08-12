<include file="Public:header" />
<style>
/*body {background:url("/Public/theme/default/images/ramble-bg.gif")}*/
#leftMenu {
}
#rightMenu{
}

#rambleList {
background: white;
min-height:1000px;
border: 5px solid #B2D48A;
box-shadow: 2px 2px 1px #555;
padding: 0px;
}

#rambleList ul { padding-left:0px; } 

#rambleList > ul > li {
background: white;
list-style: none;
border-top: 1px dotted #B2D48A;
padding:15px;
}

#rambleList > ul > li:first-child {border-top:none;}
#rambleList > ul > li div.title { padding-top:5px; padding-bottom:10px;}
#rambleList > ul > li div.title a{ color: #333; font-size:25px;}
#rambleList > ul > li div.title a:hover { color: #888;}

</style>

<div class="container">
    <div class="col-sm-2" id="leftMenu"></div>
    <div class="col-sm-8" id="rambleList" >
      <ul>
        <foreach name="rambles" item="ramble">
        <li>
          <div class="title"><i class="icon-start"></i> <a href='/index.php/Ramble/read/{$ramble.id}' target="_blank">{$ramble.title}</a></div>
          <div class='content'>{$ramble.digest}</div>
       </li>
        </foreach>
      <ul>
 
    </div>
    <div class="col-sm-2" id="rightMenu"></div>
</div>
<include file="Public:footer" />
