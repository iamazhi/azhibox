<?php
class WhisperModel extends Model
{
    public function create()
    {
        $whisper = M('Whisper');
        $whisper->create();
        $whisper->author     = "阿智";
        $whisper->content    = $_POST['content'];
        $whisper->createTime = date("Y-m-d H:i:s");
        $whisper->add();
    }

    public function update($whisperID)
    {
        $data = array();
        $data['id']   = $whisperID;
        $data['content'] = $_POST['content'];
        M('Whisper')->save($data);
    }
}
?>
