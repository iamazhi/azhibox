<?php
class NoteAction extends CommonAction 
{
    public function index()
    {
        $this->redirect('browse');
    }
    
    public function browse()
    {
        $note = M('Note');
        $this->assign('notes', $note->select());
        $this->display();
    }

    public function create()
    {
        if(!empty($_POST)) 
        {
            $noteModel = new NoteModel();
            $noteModel->create();
            $this->redirect('browse');
        }
 
        $this->display();
    }

    public function edit()
    {
        if(!empty($_POST)) 
        {
            $noteModel = new NoteModel();
            $noteModel->update($this->_param(2));
            $this->redirect('browse');
        }

        $this->assign('note', M('Note')->find($this->_param(2)));
        $this->display();
    }

    public function delete()
    {
        $noteID = $this->_param(2);
        M('Note')->where("id=$noteID")->delete();
        $this->redirect('browse');
    }
}
