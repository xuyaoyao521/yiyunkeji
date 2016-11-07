<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//语言, 如修改注意标点符号
function m_lang($f) {	
$m_lang = array(
	'home' => '首页',
	'portal' => '门户',
	'toutiao' => '头条',
	'forum' => '论坛',
	'pic' => '美图',
	'guide' => '导读',
	'tag' => '标签',
	'channel' => '频道',
	'group' => '群组',
	'me' => '我',
	'mycenter' => '会员中心',
	'myexit' => '退出登录',
	
	'mdoing' => '记录',
	'mfollow' => '广播',
	'mfriend' => '好友',
	'mfriendall' => '全部',
	'mfriendol' => '在线好友',
	'mfriendbl' => '黑名单',
	'mfriendrq' => '好友请求',
	'mfriendprofile' => '资料',
	'mfriendgroup' => '分组',
	'mefriend_doing' => '我和好友',
	'friend_feed' => '好友动态',
	'mthreads' => '主题',
	'mblog' => '日志',
	'mfeed' => '动态',
	'photo' => '相册',
	'subforums' => '子版块',
	'threadtype' => '分类',
	'forum_subforums' => '子版块',
	'forum_info' => '介绍 >',
	'forum_fav' => '+收藏',
	'forum_fav_OK' => '已收藏',
	'pta' => '发表于',
	'acom' => '查看评论',
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
	'send_thread' => '发表新主题',
	'join_thread' => '参与/回复主题',
	'edit_thread' => '编辑主题',
	'thread_setanswer' => '您确认要把该回复选为"最佳答案"吗？',
	'thread_reply' => '回复',
	'blog_reply' => '评论',
	'portal_reply' => '评论',
	'profile' => '个人资料',
	'favorite' => '收藏',
	'mypm' => '我的消息',
	'mthread' => '帖子',
	'mforum' => '版块',
	'marticle' => '文章',	
	'back' => '返回',
	'search' => '搜索',
	'searchportal' => '搜索文章',
	'new_remind' => '有新提醒',	
	'tthread' => '正文',
	'photo_picnum' => '张图片',
	'all' => '全部',
	'datetime_format' => '时间格式：',
	
	
	'user_nologin' => '您还没有登录哦，赶快去登录吧！',
	'noid' => '没有账号?',
	'yesid' => '已有账号?',	
	'load' => '加载更多',
	'load_photo' => '查看更多图片',
	'load_pic' => '加载中...',
	'load_last' => '最后一页',
	'ucspeed' => '请关闭UC浏览器的急速模式后<br />再尝试刷新此页面',			
	'openhome' => '进入官网',			
	'indextopnav' => '网站导航',
	'toutiao_tab1' => '头条列表tab演示',
	'toutiao_tab2' => '头条列表演示',
	'toutiao_nolist' => '暂无内容',
	'toutiao_list_forum' => '版块',
	'toutiao_list_portal' => '频道',
	'toutiao_list_diy' => '自定义分类',
	
	'post_default_text1' => '我也说一句',
	'post_default_text2' => '写评论...',
	
	'share_tit' => '分享到',
	'share_weixin' => '微信',
	'share_qzone' => 'QQ空间',
	'share_tsina' => '新浪微博',
	'share_tqq' => '腾讯微博',
	'share_exit' => '取消分享',
	'share_weixin_alert' => '请用微信打开本页面并点右上角菜单分享',
	
	'adv_exit' => '跳过广告',		
	'side_exit' => '点击此处返回',		
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