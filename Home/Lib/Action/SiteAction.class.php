<?php
class SiteAction extends Action 
{
    public function index()
    {
        $this->assign("sites",  M("Site")->order("id desc")->select());
        $this->display();
    }
}
