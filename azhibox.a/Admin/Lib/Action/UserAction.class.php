<?php
class UserAction extends Action
{
    public function login()
    {
        if(!empty($_POST))
        {
            session('token', $_POST['token'] != '宝塔镇河妖' ? null : $_POST['token']);
            $this->redirect('Index/index');
        }
 
        if($this->logon()) $this->redirect('Index/index');
        $this->display('User/login');
    }

    public function logout()
    {
        session('token', null);
        $this->redirect('Index/index');
    }

    public function logon()
    {
        if(session('?token')) return true;
        return false;
    }
}
?>
