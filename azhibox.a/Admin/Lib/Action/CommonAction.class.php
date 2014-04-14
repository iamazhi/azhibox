<?php
class CommonAction extends Action
{
    public function _initialize()
    {
        if(!session('?token')) $this->redirect('User/login');
    }
}
?>
