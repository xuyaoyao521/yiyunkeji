<?php
//����, ���޸�ע�������
function m_lang($f) {	
	$cachefile = "./source/plugin/yingxiao_mobile_set/cache/lang.php";
	$m_lang = include($cachefile);
	if($m_lang[$f]) $f = $m_lang[$f]; 
	if(CHARSET =='gbk'){
		return $f;
	}else{
		return diconv($f,'GBK',CHARSET);
	}
}

?>