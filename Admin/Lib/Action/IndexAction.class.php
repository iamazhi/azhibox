<?php
class IndexAction extends CommonAction 
{
    public function index()
    {
        $userAction = new UserAction();
        if($userAction->logon()) 
        {
            $this->display();
        }else
        {
            $this->redirect('User/login');
        }
    }
}
