<table cellpadding="2" cellspacing="1">
	<tr> 
      <td>�ı��򳤶�</td>
      <td><input type="text" name="setting[size]" value="<?=$size?>" size="10"></td>
    </tr>
	<tr> 
      <td>Ĭ��ֵ</td>
      <td><input type="text" name="setting[defaultvalue]" value="<?=$defaultvalue?>" size="40"></td>
    </tr>
	<tr> 
      <td>�����ϴ���ͼƬ��С</td>
      <td><input type="text" name="setting[upload_maxsize]" value="<?=$upload_maxsize?>" size="5"> KB ��ʾ��1 KB = 1024 Byte��1 MB = 1024 KB *</td>
    </tr>
	<tr> 
      <td>�����ϴ���ͼƬ����</td>
      <td><input type="text" name="setting[upload_allowext]" value="<?=$upload_allowext?>" size="40"></td>
    </tr>
	<tr> 
      <td>�Ƿ�����ϴ���ѡ��</td>
      <td><input type="radio" name="setting[isselectimage]" value="1" <?=($isselectimage ? 'checked' : '')?>/> �� <input type="radio" name="setting[isselectimage]" value="0" <?=($isselectimage ? '' : 'checked')?>/> ��</td>
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
	<tr id="watermark_img" style="display:<?=($iswatermark ? 'block' : 'none')?>"> 
      <td>ˮӡͼƬ·��</td>
      <td><input type="text" name="setting[watermark_img]" value="<?=$watermark_img?>" size="40"></td>
    </tr>
</table>