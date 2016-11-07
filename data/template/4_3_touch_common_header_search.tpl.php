<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/mobile/touch/common/header_search.htm', './template/mobile/touch/common/header_common.htm', 1477403318, '3', './data/template/4_3_touch_common_header_search.tpl.php', './template/mobile', 'touch/common/header_search')
|| checktplrefresh('./template/mobile/touch/common/header_search.htm', './template/mobile/touch/common/ceo_color.htm', 1477403318, '3', './data/template/4_3_touch_common_header_search.tpl.php', './template/mobile', 'touch/common/header_search')
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
<body id="nv_<?php echo $_G['basescript'];?>" class="pg_index" onLoad="">
<div id="wp">
<div id="content" class="content"><?php
$color_main = <<<EOF



EOF;
 if($_GET['mod'] == 'post') { 
$color_main .= <<<EOF

<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/post.css" type="text/css" media="all">

EOF;
 } if($php_self == 'home.php') { 
$color_main .= <<<EOF

<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/home/home.css" type="text/css" media="all">

EOF;
 } if($ceo_diycolor) { 
$color_main .= <<<EOF

<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/style/t-diy.css" type="text/css" media="all">

EOF;
 } else { 
$color_main .= <<<EOF

    
EOF;
 if($ceo_mobilecolor) { 
$color_main .= <<<EOF

    <link rel="stylesheet" href="template/mobile/toutiao_mobile/css/style/t{$ceo_mobilecolor}.css" type="text/css" media="all">
    
EOF;
 } else { 
$color_main .= <<<EOF

    <link rel="stylesheet" href="template/mobile/toutiao_mobile/css/style/t1.css" type="text/css" media="all">
    
EOF;
 } } 
$color_main .= <<<EOF


EOF;
?><?php
$color_login = <<<EOF

<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/member/member.css" type="text/css" media="all">

EOF;
?>

<?php echo $color_main;?>

<?php if(!empty($_G['setting']['pluginhooks']['global_header_mobile'])) echo $_G['setting']['pluginhooks']['global_header_mobile'];?>
