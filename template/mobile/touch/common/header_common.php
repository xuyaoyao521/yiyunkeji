
<!--{eval define('TEMP_APP', DISCUZ_ROOT.'./template/mobile/toutiao_mobile/');}-->


<!--{eval require_once(TEMP_APP.'function.php');}-->


<!--{eval require_once(TEMP_APP.'config.php');}-->
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-control" content="{if $_G['setting']['mobile'][mobilecachetime] > 0}{$_G['setting']['mobile'][mobilecachetime]}{else}no-cache{/if}" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<meta name="format-detection" content="telephone=no" />
<meta name="keywords" content="{if !empty($metakeywords)}{echo dhtmlspecialchars($metakeywords)}{/if}" />
<meta name="description" content="{if !empty($metadescription)}{echo dhtmlspecialchars($metadescription)} {/if},$_G['setting']['bbname']" />
<!--{if $_G['basescript'] == 'portal'}--><base href="{$_G['siteurl']}" /><!--{/if}-->
<title><!--{if !empty($navtitle)}-->$navtitle<!--{/if}--><!--{if empty($nobbname)}--> -  $_G['setting']['bbname']<!--{/if}--></title>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/font/iconfont.css" type="text/css" media="all">
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/common.css" type="text/css" media="all">

<script src="{STATICURL}js/mobile/jquery-1.8.3.min.js?{VERHASH}"></script>

<script type="text/javascript">var STYLEID = '{STYLEID}', STATICURL = '{STATICURL}', IMGDIR = '{IMGDIR}', VERHASH = '{VERHASH}', charset = '{CHARSET}', discuz_uid = '$_G[uid]', cookiepre = '{$_G[config][cookie][cookiepre]}', cookiedomain = '{$_G[config][cookie][cookiedomain]}', cookiepath = '{$_G[config][cookie][cookiepath]}', showusercard = '{$_G[setting][showusercard]}', attackevasive = '{$_G[config][security][attackevasive]}', disallowfloat = '{$_G[setting][disallowfloat]}', creditnotice = '<!--{if $_G['setting']['creditnotice']}-->$_G['setting']['creditnames']<!--{/if}-->', defaultstyle = '$_G[style][defaultextstyle]', REPORTURL = '$_G[currenturl_encode]', SITEURL = '$_G[siteurl]', JSPATH = '$_G[setting][jspath]';</script>
<script src="{STATICURL}js/mobile/common.js?{VERHASH}" charset="{CHARSET}"></script>
<script src="template/mobile/toutiao_mobile/js/yingxiaomobile.js"></script>
<script src="/public/js/jquery.lazyload.js" type="text/javascript"></script>
<script type="text/javascript" src="/cordova.js"></script>
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
