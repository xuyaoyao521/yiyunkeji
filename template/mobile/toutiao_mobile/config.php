<?php
if(!defined("IN_DISCUZ"))
{
	exit("Access Denied");
}
define('PL_APP', DISCUZ_ROOT.'./source/plugin/yingxiao_mobile_set/');
if(!isset($_G['cache']['plugin']))
{
	loadcache( "plugin" );
}
if($_G['cache']['plugin']['yingxiao_mobile_set'])
{
	@extract( $_G['cache']['plugin']['yingxiao_mobile_set'] );
	include(PL_APP.'include/lang.php');
}
else
{
	include(TEMP_APP.'lang.php');

	//综合设置
	$ceo_indexdiyopen = 1;				//开启自定义首页
	$ceo_indexdefault = 1;				//默认首页（1：论坛、2：门户、3：头条式图文列表首页、4：导读、）
	$ceo_btoolopen = 1;				//是否启用底部工具栏 （0：不启用， 1：启用）
	$ceo_forumdesorpos = 0;				//版块列表显示版块简介或是显示版块主题数（1：显示简介、 0：显示主题数）
	$ceo_piclistopen = 0; 				//帖子列表页是否启用图文列表  （0：不启用， 1：启用）
	$ceo_subopen = 0;					//显示或隐藏子版块 （0：隐藏， 1：显示）
	$ceo_relateitems = 5;				//帖子显示页相关帖子数量
}

if ( $ceo_indexdiyopen == 1 )
{
	if ( $ceo_indexdefault == 1 )
	{
			$indexurl = "forum.php?forumlist=1&mobile=2";
	}
	else if ( $ceo_indexdefault == 2 )
	{
			$indexurl = "portal.php?mod=index";
	}
	else if ( $ceo_indexdefault == 3 )
	{
		$indexurl = "forum.php?mod=appad&mobile=2";
	}
	else if ( $ceo_indexdefault == 4 )
	{
			$indexurl = "forum.php?mod=guide&view=newthread&mobile=2";
	}
	else if ( $ceo_indexdefault == 5 )
	{
			$indexurl = "forum.php?mod=photo&mobile=2";
	}
	else if ( $ceo_indexdefault == 6 )
	{
			$indexurl = $ceo_indexurl;
	}
}
else
{
	$indexurl = "forum.php?forumlist=1&mobile=2";
}


$useragent = $_SERVER['HTTP_USER_AGENT'];
preg_match( "/UCWEB/", $useragent, $match );
if ( $match && ( strpos( $useragent, "iPh" ) || strpos( $useragent, "wds" ) ) )
{
		//header( "location:forum.php?mobile=1" );
}

$php_uri = substr($_SERVER['REQUEST_URI'],strrpos($_SERVER['REQUEST_URI'],'/')+1);
$php_self = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
$php_indexurl = strrpos($php_uri, $indexurl);

?>
