<table cellpadding="2" cellspacing="1" onclick="javascript:$('#minlength').val(0);$('#maxlength').val(255);">
	<tr> 
      <td>�����ϴ���ͼƬ��С</td>
      <td><input type="text" name="setting[upload_maxsize]" value="<?=$upload_maxsize?>" size="5"> KB ��ʾ��1 KB = 1024 Byte��1 MB = 1024 KB *</td>
    </tr>
	<tr> 
      <td>�����ϴ���ͼƬ����</td>
      <td><input type="text" name="setting[upload_allowext]" value="<?=$upload_allowext?>" size="40"></td>
    </tr>
	<tr> 
      <td>�Ƿ��������ͼ</td>
      <td><input type="radio" name="setting[isthumb]" value="1" <?=($isthumb ? 'checked' : '')?> onclick="$('#thumb_size').show()"/> �� <input type="radio" name="setting[isthumb]" value="0" <?=($isthumb ? '' : 'checked')?> onclick="$('#thumb_size').hide()"/> ��</td>
    </tr>
	<tr id="thumb_size" style="display:<?=($isthumb ? 'block' : 'none')?>"> 
      <td>����ͼ��С</td>
      <td>�� <input type="text" name="setting[thumb_width]" value="<?=$thumb_width?>" size="3">px �� <input type="text" name="setting[thumb_height]" value="<?=$thumb_height?>" size="3">px</td>
    </tr>
	<tr> 
      <td>�Ƿ��ͼƬˮӡ</td>
      <td><input type="radio" name="setting[iswatermark]" value="1" <?=($iswatermark ? 'checked' : '')?> onclick="$('#watermark_img').show()"/> �� <input type="radio" name="setting[iswatermark]" value="0"  <?=($iswatermark ? '' : 'checked')?> onclick="$('#watermark_img').hide()"/> ��</td>
    </tr>
	<tr> 
      <td>�Ƿ����ɾ�̬</td>
      <td><input type="radio" name="setting[ishtml]" value="1" <?=($ishtml ? 'checked' : '')?>/> �� <input type="radio" name="setting[ishtml]" value="0"  <?=($ishtml ? '' : 'checked')?>/> �� <font color="#006600">����ҳ���ɾ�̬ʱ���Ƿ����ɶ�ҳ��</font></td>
    </tr>
	<tr id="watermark_img" style="display:<?=($iswatermark ? 'block' : 'none')?>"> 
      <td>ˮӡͼƬ·��</td>
      <td><input type="text" name="setting[watermark_img]" value="<?=$watermark_img?>" size="40"></td>
    </tr>
</table>