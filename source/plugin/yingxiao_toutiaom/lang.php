<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//����, ���޸�ע�������
function p_lang($f) {	
$p_lang = array(
	'urltext' => '������ʽ���ͷ���б�',
	'views' => '�鿴',
    'reply' => '�ظ�',
    'click1' => '��',
	'tlock' => '�ر�',
	'ts1' => 'ͶƱ',
	'ts2' => '��Ʒ',
	'ts3' => '����',
	'ts4' => '�',
	'ts5' => '����',
	'tdis' => '�ö�',
	'tdig' => '����',
	'tatt' => 'ͼƬ',
	'tads' => '�ƹ�',
	'showmessage' => '��������',
	'all' => 'ȫ��',
	'listdiy' => '�ҵķ���',
	'channel' => 'Ƶ��',
	'forum' => '��̳',
	'load' => '���ظ���',
	'load_pic' => '������...',
	'pc_title' => '�ֻ��½���ͷ��ͼ���б�',
	'pc_tip' => '��ʹ���ֻ�ɨ���ά��',
	'exit' => '�˳�'			
    );
	if($p_lang[$f]) $f = $p_lang[$f]; 
	if(CHARSET =='gbk'){
		return $f;
	}else{
		return diconv($f,'GBK',CHARSET);
	}
}

?>