<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//����, ���޸�ע�������
function m_lang($f) {	
$m_lang = array(
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
	'views' => '�鿴',
	'reply' => '�ظ�',
	'post' => '����',
	
	'load' => '���ظ���',
	'load_photo' => '�鿴����ͼƬ',
	'load_pic' => '������...',
	'load_last' => '���һҳ',
	
	'exit' => '�˳�'			
    );
	if($m_lang[$f]) $f = $m_lang[$f]; 
	if(CHARSET =='gbk'){
		return $f;
	}else{
		return diconv($f,'GBK',CHARSET);
	}
}

?>