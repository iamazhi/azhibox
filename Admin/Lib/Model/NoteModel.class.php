<?php
class NoteModel extends Model
{
    public function create()
    {
        $note = M('note');
        $note->create();
        $note->name       = $_POST['name'];
        $note->content    = $_POST['content'];
        $note->tag        = $_POST['tag'];
        $note->author     = "阿智";
        $note->createTime = date("Y-m-d H:i:s");

        $note->add();
    }

    public function update($noteID)
    {
        $data = array();
        $data['id']      = $noteID;
        $data['title']   = $_POST['title'];
        $data['content'] = $_POST['content'];
        M('Note')->save($data);
    }
}
?>
