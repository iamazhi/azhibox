<include file="Public:header" />
<style>
.panel-actions a{color:green}
</style>
<div class="container">
<div class="clearfix">
  <div class='panel panel-success'>
    <div class='panel-heading'>
      <strong><i class="icon-list"></i> 笔记们</strong>
      <div class='panel-actions'><a href='/admin.php/Note/create'><i class='icon-plus icon-2x'></i></a> </div>
    </div>
    <table class='table table-hover table-striped tablesorter'>
      <thead><tr><th>ID</th><th>名称</th><th>标签</th><th>作者</th><th>创建时间</th><th>查看次数</th><th>操作</th> </tr> </thead>
      <tbody>
        <foreach name="notes" item="note">
        <tr>
          <td>{$note.id}</td>
          <td><a href='/index.php/Note/read/{$note.id}' target="_blank">{$note.title}</a></td>
          <td>{$note.tag}</td>
          <td>{$note.author}</td>
          <td>{$note.createTime}</td>
          <td>{$note.views}</td>
          <td>
            <a href='/admin.php/Note/edit/{$note.id}'><i class='icon-edit icon-large'></i></a> 
            <a href='/admin.php/Note/delete/{$note.id}'><i class='icon-remove icon-large'></i></a>
          </td>
        </tr>
        </foreach>
      </tbody>
    </table>
  </div>
</div>
</div>
<include file="Public:footer" />
