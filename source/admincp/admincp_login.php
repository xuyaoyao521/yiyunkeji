<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: admincp_login.php 32459 2013-01-22 02:01:02Z monkey $
 */

if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}



if($this->core->var['inajax']) {
	ajaxshowheader();
	ajaxshowfooter();
}

if($this->cpaccess == -3) {
	html_login_header(false);
} else {
	html_login_header();
}


if($this->cpaccess == -3) {
	echo  '<p class="logintips">'.lang('admincp_login', 'login_cp_noaccess').'</p>';


}elseif($this->cpaccess == -1) {
	$ltime = $this->sessionlife - (TIMESTAMP - $this->adminsession['dateline']);
	echo  '<p class="logintips">'.lang('admincp_login', 'login_cplock', array('ltime' => $ltime)).'</p>';

}elseif($this->cpaccess == -4) {
	$ltime = $this->sessionlife - (TIMESTAMP - $this->adminsession['dateline']);
	echo  '<p class="logintips">'.lang('admincp_login', 'login_user_lock').'</p>';

} else {
	html_login_form();
}

html_login_footer();

function html_login_header($form = true) {
	global $_G;
	$isguest = !getglobal('uid');
	$lang = lang('admincp_login');
	$loginuser = $isguest ? '<input name="admin_username" tabindex="1" type="text" class="txt input_item"  value="" autocomplete="off" placeholder="帐号"/>' : '<input name="" tabindex="1" type="text" class="txt input_item"  value="'.getglobal('member/username').'" autocomplete="off" disabled="disabled" placeholder="帐号"/>';
	$sid = getglobal('sid');
	$_SERVER['QUERY_STRING'] = str_replace('&amp;', '&', dhtmlspecialchars($_SERVER['QUERY_STRING']));
	$extra = ADMINSCRIPT.'?'.(getgpc('action') && getgpc('frames') ? 'frames=yes&' : '').$_SERVER['QUERY_STRING'];
	$forcesecques = '<option value="0">'.($_G['config']['admincp']['forcesecques'] || $_G['group']['forcesecques'] ? $lang['forcesecques'] : $lang['security_question_0']).'</option>';
	$charset = CHARSET;
	$title = lang('admincp_login', 'login_title');
	$tips = lang('admincp_login', 'login_tips');
	if($_SERVER['HTTP_CLIENT_IP']){
		 $onlineip=$_SERVER['HTTP_CLIENT_IP'];
	}elseif($_SERVER['HTTP_X_FORWARDED_FOR']){
		 $onlineip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		 $onlineip=$_SERVER['REMOTE_ADDR'];
	}
	echo <<<EOT
	
	
	
	
	
	
	
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>【管理中心】OUTENG.NET V3.1</title>
<link rel="stylesheet" type="text/css" href="/static/admin_login/css/index2.css">
<script type="text/javascript" src="/static/admin_login/js/jquery-1.11.0.min.js"></script>
</head>
<body class="txt_center " onunload="document.form1.btlogin.disabled = false;">
<div name="Header">
  <div class="wd1000 getuserdata topheight" id="topDataTd">
    <div class=""><img src="/static/admin_login/picture/login_logo.jpg" class="logo"></div>
    <div class="topLink right addrtitle"><a href="/">&lt;&lt;返回首页</a><span>|</span><a href="http://help.yiyunkeji.com/">帮助中心</a></div>
  </div>
</div>
<div class="loginWrap">
  <div class="background" style="background-position: 137.6px 0px;">
    <div class="wd950">
    
     <form method="post" autocomplete="off" name="login" id="loginform" action="$extra">
		<input type="hidden" name="sid" value="$sid">
		<input type="hidden" name="frames" value="yes">
        <div class="right_panel"> </div>
        <div class="left_panel">
          <div class="login_panel">
            <div class="title">登录管理中心</div>
            <div class="items_panel">
              <div class="item">
                <div style="margin-top:70px;">
                
               $loginuser
                  <label class="hint">请正确输入管理员信息，并进行身份验证。</label>
                </div>
              </div>
              <div class="item">
                <div>
                  <input name="admin_password" tabindex="1" type="password" class="txt input_item" autocomplete="off"  placeholder="密码"/>
                </div>
              </div>
             
              <div>
                <input type="hidden" name="act" value="signin">
                <input class="green_btn" value="登   录" id="btlogin" name="btlogin" type="submit">
              </div>
            </div>
            <div class="forget_pwd_wrap"><img src="/static/admin_login/picture/lock_new.png" alt=" https 安全方式登录" style="margin: -3px 5px auto 2px ! important;" align="absmiddle">锁定IP（<font color="#f30">
              $onlineip             </font>）</div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div style="clear: both;"></div>
<div class="wd txt_center">
  <div class="navPageBottom">技术支持：逸云科技[网络部] | 服务协议 | 权利声明 | 版本更新 | 意见反馈 | 联系我们</div>
  <div class="copyright cLight">Copyright © 2016 逸云科技 [ <a href="http://www.yiyunkeji.com/" target="_blank">yiyunkeji.com</a> ] All Rights Reserved .</div>
</div>
<script>
$(function(){
	$(document).mousemove(function(e) {
		var offset=$(document).width()/2-e.clientX;
		$(".background").css({"background-position":( ($(document).width()-1500)/2+offset/5 -100 )+"px 0px"});
		
	});
});
</script>



</body></html>	
	
	
	

EOT;

	
}



?>