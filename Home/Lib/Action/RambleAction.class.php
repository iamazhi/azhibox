<?php
class RambleAction extends Action 
{
    public function read()
    {
        $this->assign('ramble', M('Ramble')->find($this->_param(2)));
        $this->display();
    }
}
