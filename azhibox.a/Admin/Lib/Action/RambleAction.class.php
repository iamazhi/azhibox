<?php
class RambleAction extends CommonAction 
{
    public function index()
    {
        $this->redirect('browse');
    }
    
    public function browse()
    {
        $ramble = M('Ramble');
        //$siteModel = new SiteModel();
        $this->assign('rambles', $ramble->select());
        $this->display();
    }

    public function create()
    {
        if(!empty($_POST)) 
        {
            $rambleModel = new RambleModel();
            $rambleModel->create();
            $this->redirect('browse');
        }
 
        $this->display();
    }

    public function edit()
    {
        if(!empty($_POST)) 
        {
            $rambleModel = new RambleModel();
            $rambleModel->update($this->_param(2));
            $this->redirect('browse');
        }

        $this->assign('ramble', M('Ramble')->find($this->_param(2)));
        $this->display();
    }

    public function delete()
    {
        $rambleID = $this->_param(2);
        M('Ramble')->where("id=$rambleID")->delete();
        $this->redirect('browse');
    }
}
