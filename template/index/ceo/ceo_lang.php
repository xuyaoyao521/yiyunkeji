<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//语言, 如修改注意标点符号
function m_lang($f) {	
$m_lang = array(
	'tlock' => '关闭',
	'ts1' => '投票',
	'ts2' => '商品',
	'ts3' => '悬赏',
	'ts4' => '活动',
	'ts5' => '辩论',
	'tdis' => '置顶',
	'tdig' => '精华',
	'tatt' => '图片',
	'tads' => '推广',
	'views' => '查看',
	'reply' => '回复',
	'post' => '发帖',
	
	'load' => '加载更多',
	'load_photo' => '查看更多图片',
	'load_pic' => '加载中...',
	'load_last' => '最后一页',
	
	'exit' => '退出'			
    );
	if($m_lang[$f]) $f = $m_lang[$f]; 
	if(CHARSET =='gbk'){
		return $f;
	}else{
		return diconv($f,'GBK',CHARSET);
	}
}

?>