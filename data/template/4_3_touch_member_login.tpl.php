<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/mobile/touch/member/login.htm', './template/mobile/touch/common/header_common.htm', 1478075649, '3', './data/template/4_3_touch_member_login.tpl.php', './template/mobile', 'touch/member/login')
;?>
<?php define('TEMP_APP', DISCUZ_ROOT.'./template/mobile/toutiao_mobile/');?><?php require_once(TEMP_APP.'function.php');?><?php require_once(TEMP_APP.'config.php');?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="<?php if($_G['setting']['mobile']['mobilecachetime'] > 0) { ?><?php echo $_G['setting']['mobile']['mobilecachetime'];?><?php } else { ?>no-cache<?php } ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } ?>,<?php echo $_G['setting']['bbname'];?>" />
<?php if($_G['basescript'] == 'portal') { ?><base href="<?php echo $_G['siteurl'];?>" /><?php } ?>
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?><?php } if(empty($nobbname)) { ?> -  <?php echo $_G['setting']['bbname'];?><?php } ?></title>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/font/iconfont.css" type="text/css" media="all">
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/common.css" type="text/css" media="all">

<script src="<?php echo STATICURL;?>js/mobile/jquery-1.8.3.min.js?<?php echo VERHASH;?>" type="text/javascript"></script>

<script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>';</script>
<script src="<?php echo STATICURL;?>js/mobile/common.js?<?php echo VERHASH;?>" type="text/javascript" charset="<?php echo CHARSET;?>"></script>
<script src="template/mobile/toutiao_mobile/js/yingxiaomobile.js" type="text/javascript"></script>
<script src="/public/js/jquery.lazyload.js" type="text/javascript" type="text/javascript"></script>
<script src="/cordova.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){
JPushInstance();
});
var registrationID="";
var JPushInstance = function() {
document.addEventListener("deviceready", JPushInstance.prototype.onDeviceReady, false);
 		document.addEventListener("jpush.openNotification", JPushInstance.prototype.onOpenNotification, false);
};

//设备准备好的时候获取注册id
JPushInstance.prototype.onDeviceReady = function() {
var self = this;
window.plugins.jPushPlugin.init();
//alert("准备获取")
window.plugins.jPushPlugin.getRegistrationID(function(registrationID) {
self.registrationID = registrationID;
//alert("registrationID："+registrationID);
});
if (device.platform == "Android") {
window.plugins.jPushPlugin.setDebugMode(false);
window.plugins.jPushPlugin.setApplicationIconBadgeNumber(0);
} else {
window.plugins.jPushPlugin.setDebugMode(false);
window.plugins.jPushPlugin.setApplicationIconBadgeNumber(0);
}
};
//打开通知的处理
JPushInstance.prototype.onOpenNotification = function(event) {
var alertContent;
var extras;
var title;
var content;
if (device.platform == "Android") {
alertContent = window.plugins.jPushPlugin.openNotification.alert;
extras = window.plugins.jPushPlugin.openNotification.extras;
title = window.plugins.jPushPlugin.openNotification.title;
content = window.plugins.jPushPlugin.openNotification.content;
} else {
alertContent = event.aps.alert;
extras = event.aps.extras;
}
window.plugins.jPushPlugin.setApplicationIconBadgeNumber(0);

var vv="";
var kk="";
$.each(extras,function(k,v){
vv+=v+",";	
kk+=k+",";
})
var array = vv.split(",");

//alert(title)
//alert(array[1]);
//alert(alertContent)
var tid = array[1];
window.location.href='/forum.php?mod=viewthread&ordertype=1&mobile=2&tid='+tid;
};
</script>
<link rel="stylesheet" href="public/css/Public_index.css" type="text/css" media="all">
<link rel="stylesheet" href="public/css/Public_mobile.css" type="text/css" media="all">
</head>
<link href="/public/css/Public_index.css" rel="stylesheet" type="text/css">
<link href="/public/css/Public_mobile.css" rel="stylesheet" type="text/css">
<script src="/public/js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="/public/js/jquery.lazyload.js" type="text/javascript"></script>
<script src="/public/js/Moile_Slide.1.1.js" type="text/javascript"></script>
<script src="/cordova.js" type="text/javascript"></script>
<script type="text/javascript">
function QQ_Login(){
if (!navigator.qq) {
justep.Util.hint("请安装最新版本(含插件)体验！");
return;
}
;
var self = this;
function success(info) {
navigator.qq.getUserInfo(function(info) {
/*var user = {};
user.accountType = "QQ";
user.userid = info.userid;
user.name = info.nickname || "NONAME";
justep.Shell.userType.set(user.accountType);
justep.Shell.userName.set(user.name);
localStorage.setItem("userUUID", JSON.stringify(user));*/
var vv="";
var kk="";
$.each(info,function(k,v){
vv+=v+",";	
kk+=k+",";
})
alert(kk);
alert(vv);


/*setTimeout(function() {
justep.Shell.showPage("main");
}, 3000);*/
}, function(err) {
justep.Util.hint("登录失败: " + err, {
"type" : "danger"
});
});
}
;
navigator.qq.ssoLogin(success, function(info) {
alert("登录失败");
});
}//QQ登录


function Weixin_Login(){
var self = this;
if (!navigator.weixin) {
justep.Util.hint("请安装最新版本(含插件)体验！");
return;
}
;

var weixin = navigator.weixin;

function saveUser(data) {
var user = {};
user.userid = data.openid;
user.accountType = "WX";
user.name = data.nickname || "NONAME";
justep.Shell.userType.set(user.accountType);
justep.Shell.userName.set(user.name);
localStorage.setItem("userUUID", JSON.stringify(user));
justep.Util.hint("登录成功");
setTimeout(function() {
justep.Shell.showPage("main");
}, 3000);
}

weixin.ssoLogin(function() {
weixin.getUserInfo(saveUser, function(reason) {
justep.Util.hint("登录失败: " + JSON.stringify(reason), {
"type" : "danger"
});
});
}, function(reason) {

justep.Util.hint("登录失败: " + JSON.stringify(reason), {
"type" : "danger"
});
});
}//微信登录
</script>

<body style="background:#000;">
<div class="login_backpage"><a href="javascript:history.back(-1)"></a></div>
<div class="mobile_login_bj"></div>
<div class="mobile_login_logo"></div>
<div class="mobile_login_main">
<div class="button"><a class="alert_tel">手机号登录</a></div>
    <div class="Third_party">
    	<div class="title">第三方登录方式</div>
        <div class="list"><a class="qq" href="javascript:QQ_Login();"</a><a class="weixin" href="javascript:Weixin_Login();"></a></div>
    </div>
</div>

<div class="mobile_login_alert">
<div class="close"></div>
    <div class="title">登录后为您保存阅读习惯<br>为您精准推荐</div>
    <div class="works">
    	
        <p><a href="javascript:;" class="get_code"><img onclick="updateseccode2(this)" style="width:80%"  src="misc.php?mod=seccode&amp;update=<?php echo random(5,1); ?>&amp;idhash=login"  /></a><input type="text" maxlength="4" placeholder="请输入验证码"  class="w100" name="code"></p>
        <p><a class="get_code" href="javascript:;" onClick="getmcode(this)">发送验证码</a><input type="tel" name="mobile" placeholder="请输入手机号码" maxlength="11"></p>
         <p><input type="tel" name="mcode" maxlength="6"  placeholder="请输入手机验证码" ></p>
         
        <div class="prompt">未注册手机号验证后自动注册</div>
        <a class="button" href="javascript:;" onClick="mobilelogin()">登&nbsp;&nbsp;录</a>
        <a class="other">第三方登录</a>
    </div>
</div>
</body>
<script>
//登录
function mobilelogin(){
var mobile=$("input[name='mobile']").val();
var code=$("input[name='code']").val();
var mcode=$("input[name='mcode']").val();
$.post("ajax.php?act=mobilelogin",{mobile:mobile,code:code,mcode:mcode},function(data){
var arr = eval('(' + data + ')');
if(arr.error==1){
alert(arr.msg);
}
else{
location='home.php?mod=space&do=profile&mobile=2'	
}
})
}
var getcode=0;
function getmcode(obj){
var mobile=$("input[name='mobile']").val();
var code=$("input[name='code']").val();
 if(code==""){

 alert('请输入验证码！');
 $("input[name='code']").focus();
return false;
}
if(mobile==""){

 alert('请输入手机号！');
  $("input[name='mobile']").focus();
return false;
}
 var reg = /^0?1[3|4|5|7|8][0-9]\d{8}$/;
 if (!reg.test(mobile)) {
   alert('手机号码不正确！');
  return false;
 }


if(getcode==0){
getcode=1;
$.post("ajax.php?act=sendsms",{mobile:mobile,code:code},function(data){
if(data==1){

  			settimecode(obj);	
}	
if(data==2){
alert("验证码错误！");	
getcode=0;
}
if(data==3){
alert("发送失败！请重新发送！");		
getcode=0;
}
})

}

}
$(function(){
$(window).load(function(){
var width=$("body").width();

var search_width = width*0.98*0.85;

var button_width = $(".mobile_login_alert .works p .get_code").width();

$(".mobile_login_alert .works p").find("input").width(search_width-button_width-60);	
})
$(window).resize(function(){
var search_width = $(".mobile_login_alert .works").width();
var button_width = $(".mobile_login_alert .works p .get_code").width();
$(".mobile_login_alert .works p").first().find("input").width(search_width-button_width-20);
});

});

$(".mobile_login_main .button a.alert_tel").click(function(){
$(".mobile_login_alert").animate({height: 'toggle'},300);
});
$(".mobile_login_alert .close,.mobile_login_alert .works .other").click(function(){
$(".mobile_login_alert").animate({height: 'toggle'},200);
});

function updateseccode2(obj){
$(obj).attr("src",'misc.php?mod=seccode&update='+Math.random(5,1)+'&idhash=login');	
}


var countdown=60; 
function settimecode(obj) { 

    if (countdown == 0) { 
        //obj.removeAttribute("disabled");    
        
$(obj).html("发送验证码"); 
        countdown = 60; 
getcode=0;
        return;
    } else { 
       // obj.setAttribute("disabled", true); 
        $(obj).html("重新发送(" + countdown + ")"); 
        countdown--; 
    } 
setTimeout(function() { 
    settimecode(obj) }
    ,1000) 
}

</script>
</html>
