<?php exit;?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>【E云网】不只是一个新闻门户网!</title>
<meta name="robots" content="noindex,nofollow,nosnippet,noarchive,noodp" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<link href="/public/css/Public_index.css" rel="stylesheet" type="text/css">
<link href="/public/css/Public_mobile.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/public/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/public/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="/public/js/Moile_Slide.1.1.js"></script>
</head>

<body style="background:#000;">
<div class="mobile_login_bj"></div>
<div class="mobile_login_logo"></div>
<div class="mobile_login_main">
	<div class="button"><a class="alert_tel">手机号登录</a></div>
    <div class="Third_party">
    	<div class="title">第三方登录方式</div>
        <div class="list"><a></a><a></a></div>
    </div>
</div>

<div class="mobile_login_alert">
	<div class="close"></div>
    <div class="title">登录后为您保存阅读习惯<br>为您精准推荐</div>
    <div class="works">
    	<p><a class="get_code" href="javascript:;" onClick="getmcode(this)">发送验证码</a><input type="tel" name="mobile" placeholder="请输入手机号码" maxlength="11"></p>
        <p><a href="javascript:;" class="get_code"><img onclick="updateseccode2(this)" style="width:80%"  src="misc.php?mod=seccode&update=<?php echo random(5,1); ?>&idhash=$idhash2"  /></a><input type="text" maxlength="6" placeholder="请输入验证码"  class="w100" name="code"></p>
         <p><a href="javascript:;" class="get_code">手机验证码</a><input type="text" name="mcode" maxlength="6"  placeholder="请输入手机验证码" class="w100"></p>
        <div class="prompt">未注册手机号验证后自动注册</div>
        <a class="button">登&nbsp;&nbsp;录</a>
        <a class="other">第三方登录</a>
    </div>
</div>
</body>
<script>
//登录
var getcode=0;
function getmcode(){
	var mobile=$("input[name='mobile']").val();
	if(mobile==""){
		alert("请输入手机号");	
		return false;
	}
	 var reg = /^0?1[3|4|5|7|8][0-9]\d{8}$/;
	 if (!reg.test(mobile)) {
		  alert("手机号码不正确！");
		  return false;
	 }
	
}
$(function(){
$(window).load(function(){
		var width=$("body").width();
		
		var search_width = width*0.98*0.85;
			
		var button_width = $(".mobile_login_alert .works p .get_code").width();
		
		$(".mobile_login_alert .works p").find("input").width(search_width-button_width-50);	
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
	$(obj).attr("src",'misc.php?mod=seccode&update='+Math.random(5,1)+'&idhash=$idhash2');	
}

</script>
</html>
