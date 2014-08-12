<include file="Public:header" />
<style>
#siteList {min-height: 260px} 

.site {float:left; margin:10px;}
.name { color: white; font-size:16px; padding: 5px; background: #679412;  border-bottom: 1px solid #679412}
.name:hover { color: #eee;}
.name i { font-size: 10px; color: #ffffaa}
.desc { font-size: 14px; color: #333; padding:5px 15px 5px 10px; line-height:16px;  border-bottom: 1px solid #679412;}
</style>

<div class="container" id="siteList">
  <foreach name="sites" item="site">
  <div class="site">
    <a class='name' href='{$site.url}' target="_blank"> <i class="icon-star"></i> {$site.name} <i class="icon-star"></i> </a>
    <span class='desc'> {$site.desc}</span>
  </div>
  </foreach>
</div>
<include file="Public:footer" />
