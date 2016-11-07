<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//语言, 如修改注意标点符号
function p_lang($f) {	
$p_lang = array(
	'urltext' => '点击访问今日头条列表',
	'views' => '查看',
    'reply' => '回复',
    'click1' => '赞',
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
	'showmessage' => '暂无内容',
	'all' => '全部',
	'listdiy' => '我的分类',
	'channel' => '频道',
	'forum' => '论坛',
	'load' => '加载更多',
	'load_pic' => '加载中...',
	'pc_title' => '手机仿今日头条图文列表',
	'pc_tip' => '请使用手机扫描二维码',
	'exit' => '退出'			
    );
	if($p_lang[$f]) $f = $p_lang[$f]; 
	if(CHARSET =='gbk'){
		return $f;
	}else{
		return diconv($f,'GBK',CHARSET);
	}
}

?>