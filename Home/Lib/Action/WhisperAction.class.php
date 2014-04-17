<?php
class WhisperAction extends Action 
{
    public function index()
    {
        $this->assign("whispers",  M("Whisper")->order("id desc")->select());
        $this->display();
    }
}
