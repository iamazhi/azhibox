<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action 
{
    public function index()
    {
        $rambleModel = new RambleModel();
        $this->assign("sites",    M('Site')->select());
        $this->assign("rambles",  $rambleModel->getRambles());
        $this->assign("whispers", M('Whisper')->order('id desc')->select());
        $this->display();
    }
}
