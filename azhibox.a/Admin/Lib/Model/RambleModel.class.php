<?php
class RambleModel extends Model
{
    public function create()
    {
        $ramble = M('ramble');
        $ramble->create();
        $ramble->name       = $_POST['name'];
        $ramble->content    = $_POST['content'];
        $ramble->tag        = $_POST['tag'];
        $ramble->author     = "阿智";
        $ramble->createTime = date("Y-m-d H:i:s");

        $ramble->add();
    }

    public function update($rambleID)
    {
        $data = array();
        $data['id']      = $rambleID;
        $data['title']   = $_POST['title'];
        $data['content'] = $_POST['content'];
        M('Ramble')->save($data);
    }
}
?>
