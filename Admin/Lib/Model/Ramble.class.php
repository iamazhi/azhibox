<?php
class RambleModel extends Model
{
    public function create()
    {
        $ramble = M('ramble');
        $ramble->create();
        $ramble->name = $_POST['name'];
        $ramble->url  = $_POST['content'];

        $ramble->add();
    }

    public function update($siteID)
    {
        $data = array();
        $data['id']   = $siteID;
        $data['name'] = $_POST['name'];
        $data['url']  = $_POST['url'];
        $data['desc'] = $_POST['desc'];
        M('Site')->save($data);
    }
}
?>
