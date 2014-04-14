<?php
class RambleAction extends Action 
{
    public function index()
    {
        $rambleModel = new RambleModel();
        $this->assign("rambles",  $rambleModel->getRambles());
        $this->display();
    }

    public function read()
    {
        $this->assign('ramble', M('Ramble')->find($this->_param(2)));
        $this->display();
    }
}
