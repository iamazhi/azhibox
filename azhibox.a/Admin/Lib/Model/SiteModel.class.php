<?php
class SiteModel extends Model
{
    public function create()
    {
        $site = M('site');
        $site->create();
        $site->name       = $_POST['name'];
        $site->url        = $_POST['url'];
        $site->desc       = $_POST['desc'];
        $site->author     = "阿智";
        $site->createTime = date("Y-m-d H:i:s");

/*
        $imageName = str_replace('http://', '', $site->url);
        $imageName = './Public/data/' . $imageName . '.jpg';
        $cutyCapt  = 'D:/CutyCapt.exe';
        $commond   = "$cutyCapt --url={$site->url} --out=$imageName";

        system($commond);
        */

        $site->add();
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
