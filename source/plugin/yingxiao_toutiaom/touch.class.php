<?php


if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class mobileplugin_yingxiao_toutiaom {
	
	function global_header_mobile() {
		global $_G;
        $return = '';
		if($_G['cache']['plugin']['yingxiao_toutiaom']['ceo_murl'])
		{
			require_once DISCUZ_ROOT.'./source/plugin/yingxiao_toutiaom/lang.php';
			$urltext = p_lang('urltext');
			//include_once template('yingxiao_toutiaom:hook');
            $return = "<div style=\"text-align:center; font-size: 16px; color:#fff; margin:5px;border-radius:5px;background:" .$_G['cache']['plugin']['yingxiao_toutiaom']['ceo_headerbg']. ";\"><a href=\"plugin.php?id=yingxiao_toutiaom\" style=\"line-height:30px; color:#fff;\">$urltext</a></div>";
		}
		return $return;
	}
}

?>