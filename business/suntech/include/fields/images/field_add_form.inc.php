<table cellpadding="2" cellspacing="1" onclick="javascript:$('#minlength').val(0);$('#maxlength').val(255);">
	<tr> 
      <td>�����ϴ���ͼƬ��С</td>
      <td><input type="text" name="setting[upload_maxsize]" value="1024" size="5">KB ��ʾ��1KB=1024Byte��1MB=1024KB *</td>
    </tr>
	<tr> 
      <td>�����ϴ���ͼƬ����</td>
      <td><input type="text" name="setting[upload_allowext]" value="gif|jpg|jpeg|png|bmp" size="40"></td>
    </tr>
	<tr> 
      <td>�Ƿ��������ͼ</td>
      <td><input type="radio" name="setting[isthumb]" value="1" <?=($PHPCMS['thumb_enable'] ? 'checked' : '')?> onclick="$('#thumb_size').show()"/> �� <input type="radio" name="setting[isthumb]" value="0"  <?=($PHPCMS['thumb_enable'] ? '' : 'checked')?> onclick="$('#thumb_size').hide()"/> ��</td>
    </tr>
	<tr id="thumb_size" style="display:<?=($PHPCMS['thumb_enable'] ? 'block' : 'none')?>"> 
      <td>����ͼ��С</td>
      <td>�� <input type="text" name="setting[thumb_width]" value="<?=$PHPCMS['thumb_width']?>" size="3">px �� <input type="text" name="setting[thumb_height]" value="<?=$PHPCMS['thumb_height']?>" size="3">px</td>
    </tr>
	<tr> 
      <td>�Ƿ��ͼƬˮӡ</td>
      <td><input type="radio" name="setting[iswatermark]" value="1" <?=($PHPCMS['watermark_enable'] ? 'checked' : '')?> onclick="$('#watermark_img').show()"/> �� <input type="radio" name="setting[iswatermark]" value="0"  <?=($PHPCMS['watermark_enable'] ? '' : 'checked')?> onclick="$('#watermark_img').hide()"/> ��</td>
    </tr>
	<tr> 
      <td>�Ƿ����ɾ�̬</td>
      <td><input type="radio" name="setting[ishtml]" value="1" checked/> �� <input type="radio" name="setting[ishtml]" value="0" /> ��<font color="#ff0000">����ҳ���ɾ�̬ʱ���Ƿ����ɶ�ҳ��</font></td>
    </tr>
	<tr id="watermark_img" style="display:<?=($PHPCMS['watermark_enable'] ? 'block' : 'none')?>"> 
      <td>ˮӡͼƬ·��</td>
      <td><input type="text" name="setting[watermark_img]" value="<?=$PHPCMS['watermark_img']?>" size="40"></td>
    </tr>
</table>