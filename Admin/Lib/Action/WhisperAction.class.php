<?php
class WhisperAction extends CommonAction 
{
    public function index()
    {
        $this->redirect('browse');
    }

    public function browse()
    {

        $this->assign('whispers', M('whisper')->order('id desc')->select());
        $this->display();
    }

    public function create()
    {
        if(!empty($_POST)) 
        {
            $whisperModel = new WhisperModel();
            $this->_param(2) ? $whisperModel->update($this->_param(2)) : $whisperModel->create();
            $this->redirect('browse');
        }
    }

    public function delete()
    {
        $siteID = $this->_param(2);
        M('Whisper')->where("id=$siteID")->delete();
        $this->redirect('browse');
    }
}
