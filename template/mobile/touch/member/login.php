<?php exit;?>
<!--{subtemplate common/header_common}-->
<link href="/public/css/Public_index.css" rel="stylesheet" type="text/css">
<link href="/public/css/Public_mobile.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/public/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="/public/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="/public/js/Moile_Slide.1.1.js"></script>
<script type="text/javascript" src="/cordova.js"></script>
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
    	
        <p><a href="javascript:;" class="get_code"><img onclick="updateseccode2(this)" style="width:80%"  src="misc.php?mod=seccode&update=<?php echo random(5,1); ?>&idhash=login"  /></a><input type="text" maxlength="4" placeholder="请输入验证码"  class="w100" name="code"></p>
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
