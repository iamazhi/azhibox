<?php
class SiteAction extends CommonAction 
{
    public function index()
    {
        $this->redirect('browse');
    }

    public function browse()
    {
        $site = M('Site');
        //$siteModel = new SiteModel();
        $this->assign('sites', $site->order("id desc")->select());
        $this->display();
    }

    public function create()
    {
        if(!empty($_POST)) 
        {
            $siteModel = new SiteModel();
            $this->_param(2) ? $siteModel->update($this->_param(2)) : $siteModel->create();
            $this->redirect('browse');
        }
    }

    public function edit()
    {
        if(!empty($_POST)) 
        {
            $siteModel = new SiteModel();
            $siteModel->update($this->_param(2));
            $this->redirect('browse');
        }

        $this->assign('site', M('Site')->find($this->_param(2)));
        $this->display();
    }

    public function delete()
    {
        $siteID = $this->_param(2);
        M('Site')->where("id=$siteID")->delete();
        $this->redirect('browse');
    }
}
