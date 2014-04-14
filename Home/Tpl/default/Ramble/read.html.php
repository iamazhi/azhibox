<include file="Public:header" />
<style>
.ramble {
background: white;
border: 1px solid #CFCFCF;
box-shadow: 2px 2px 1px #aaaaaa;
padding: 15px;
}
.ramble .title {font-size:25px; margin-bottom:15px; color:#521314}
.ramble .mix   {margin-bottom:15px; color:#888}
</style>
<div class="container">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 ramble">
      <div class="title"> {$ramble.title}</div>
      <div class="mix">
        <span><i class="icon-time"></i> {$ramble.createTime} </span>
        <span><i class="icon-user"></i> {$ramble.author} </span>
        <span><i class="icon-eye-open"></i> {$ramble.views} </span>
      </div>
      <div class="content">
        {$ramble.content}
      </div>
     </div>
    <div class="col-sm-2"></div>
</div>
<include file="Public:footer" />
