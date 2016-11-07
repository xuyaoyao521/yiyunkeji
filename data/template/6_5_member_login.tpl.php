<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('login');?><?php include template('common/header'); $loginhash = 'L'.random(4);?><?php if(empty($_GET['infloat'])) { ?>
<div id="ct" class="ptm wp w cl">
<div class="nfl" id="main_succeed" style="display: none">
<div class="f_c altw">
<div class="alert_right">
<p id="succeedmessage"></p>
<p id="succeedlocation" class="alert_btnleft"></p>
<p class="alert_btnleft"><a id="succeedmessage_href">如果您的浏览器没有自动跳转，请点击此链接</a></p>
</div>
</div>
</div>
<div class="mn" id="main_message">
<div class="bm">
<div class="bm_h bbs">
<span class="y">
<?php if(!empty($_G['setting']['pluginhooks']['logging_side_top'])) echo $_G['setting']['pluginhooks']['logging_side_top'];?>
<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>" class="xi2">没有帐号？<a href="member.php?mod=<?php echo $_G['setting']['regname'];?>"><?php echo $_G['setting']['reglinkname'];?></a></a>
</span>
<?php if(!$secchecklogin2) { ?>
<h3 class="xs2">登录</h3>
<?php } else { ?>
<h3 class="xs2">请输入验证码后继续登录</h3>
<?php } ?>
</div>
<div>
<?php } ?>

<div id="main_messaqge_<?php echo $loginhash;?>"<?php if($auth) { ?> style="width: auto"<?php } ?>>
<div id="layer_login_<?php echo $loginhash;?>">
<h3 class="flb login_h3">
<em id="returnmessage_<?php echo $loginhash;?>" class="login_em">
<?php if(!empty($_GET['infloat'])) { if(!empty($_GET['guestmessage'])) { ?>您需要先登录才能继续本操作<?php } elseif($auth) { ?>请补充下面的登录信息<?php } else { ?>用户登录<?php } } ?>
</em>
<span><?php if(!empty($_GET['infloat']) && !isset($_GET['frommessage'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('<?php echo $_GET['handlekey'];?>', 0, 1);" title="关闭">关闭</a><?php } ?></span>
</h3>
<?php if(!empty($_G['setting']['pluginhooks']['logging_top'])) echo $_G['setting']['pluginhooks']['logging_top'];?>

<div class="c cl">

<input type="hidden" name="referer" value="<?php echo dreferer(); ?>" />




<?php if(!$auth) { ?>
<div class="rfm login_rfm">
<table>
<tr>
<th>
<label for="password3_<?php echo $loginhash;?>">手机号码</label>
</th>
<td><input type="tel" name="mobile" placeholder="请输入手机号码" maxlength="11" class="px p_fre login_input"></td>
<td class="tipcol"><a class="get_code" href="javascript:;" onClick="getmcode(this)">发送验证码</a></td>
</tr>
</table>
</div>
<div class="rfm login_rfm">
<table>
<tr>
<th>
<label for="password3_<?php echo $loginhash;?>">验证码</label>
</th>
<td><input type="text" maxlength="6" placeholder="请输入验证码"  class="px p_fre login_input" name="code"></td>
<td class="tipcol"><img onclick="updateseccode2(this)" style="width:80%"  src="misc.php?mod=seccode&amp;update=<?php echo random(5,1); ?>&amp;idhash=login"  /></td>
</tr>
</table>
</div>
                <div class="rfm login_rfm">
<table>
<tr>
<th>
<label for="password3_<?php echo $loginhash;?>">手机验证码</label>
</th>
<td><input type="text" name="mcode" maxlength="6"  placeholder="请输入手机验证码" class="px p_fre login_input"></td>
<td class="tipcol"></td>
</tr>
</table>
</div>
<?php } ?>








<div class="rfm mbw bw0 login_rfm">
<table width="100%">
<tr>
<th>&nbsp;</th>
<td>
<button class="pn pnc" type="button" onClick="mobilelogin()" name="loginsubmit" value="true" tabindex="1"><strong>登录</strong></button>
</td>
<td>

</td>
</tr>
</table>
</div>


</div>

</div>
    
    <script>
//登录
function mobilelogin(){
var mobile=jq("input[name='mobile']").val();
var code=jq("input[name='code']").val();
var mcode=jq("input[name='mcode']").val();
jq.post("ajax.php?act=mobilelogin",{mobile:mobile,code:code,mcode:mcode},function(data){
var arr = eval('(' + data + ')');
if(arr.error==1){

showDialog(arr.msg, 'notice');
}
else{
location=jq("input[name='referer']").val();

}
})
}
var getcode=0;
function getmcode(obj){
var mobile=jq("input[name='mobile']").val();
var code=jq("input[name='code']").val();
if(mobile==""){


 showDialog('请输入手机号！', 'notice');
return false;
}
 var reg = /^0?1[3|4|5|7|8][0-9]\d{8}$/;
 if (!reg.test(mobile)) {
 
   showDialog('手机号码不正确！', 'notice');
  return false;
 }

 if(code==""){


  showDialog('请输入验证码！', 'notice');
return false;
}

if(getcode==0){
getcode=1;
jq.post("ajax.php?act=sendsms",{mobile:mobile,code:code},function(data){
if(data==1){
getcode=1;
  			settimecode(obj);	
}	
if(data==2){
getcode=0;
showDialog('验证码错误！', 'notice');
}
if(data==3){
getcode=0;
showDialog('发送失败！请重新发送！', 'notice');
}
})

}

}



function updateseccode2(obj){
jq(obj).attr("src",'misc.php?mod=seccode&update='+Math.random(5,1)+'&idhash=login');	
}


var countdown=60; 
function settimecode(obj) { 

    if (countdown == 0) { 
        //obj.removeAttribute("disabled");    
        
jq(obj).html("发送验证码"); 
        countdown = 60; 
getcode=0;
        return;
    } else { 
       // obj.setAttribute("disabled", true); 
        jq(obj).html("重新发送(" + countdown + ")"); 
        countdown--; 
    } 
setTimeout(function() { 
    settimecode(obj) }
    ,1000) 
}

</script>
<?php if($_G['setting']['pwdsafety']) { ?>
<script src="<?php echo $_G['setting']['jspath'];?>md5.js?<?php echo VERHASH;?>" type="text/javascript" reload="1"></script>
<?php } ?>
<div id="layer_lostpw_<?php echo $loginhash;?>" style="display: none;">
<h3 class="flb">
<em id="returnmessage3_<?php echo $loginhash;?>">找回密码</em>
<span><?php if(!empty($_GET['infloat']) && !isset($_GET['frommessage'])) { ?><a href="javascript:;" class="flbc" onclick="hideWindow('login')" title="关闭">关闭</a><?php } ?></span>
</h3>
<form method="post" autocomplete="off" id="lostpwform_<?php echo $loginhash;?>" class="cl" onsubmit="ajaxpost('lostpwform_<?php echo $loginhash;?>', 'returnmessage3_<?php echo $loginhash;?>', 'returnmessage3_<?php echo $loginhash;?>', 'onerror');return false;" action="member.php?mod=lostpasswd&amp;lostpwsubmit=yes&amp;infloat=yes">
<div class="c cl">
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="handlekey" value="lostpwform" />
<div class="rfm">
<table>
<tr>
<th><span class="rq">*</span><label for="lostpw_email">Email:</label></th>
<td><input type="text" name="email" id="lostpw_email" size="30" value=""  tabindex="1" class="px p_fre" /></td>
</tr>
</table>
</div>
<div class="rfm">
<table>
<tr>
<th><label for="lostpw_username">用户名:</label></th>
<td><input type="text" name="username" id="lostpw_username" size="30" value=""  tabindex="1" class="px p_fre" /></td>
</tr>
</table>
</div>

<div class="rfm mbw bw0">
<table>
<tr>
<th></th>
<td><button class="pn pnc" type="submit" name="lostpwsubmit" value="true" tabindex="100"><span>提交</span></button></td>
</tr>
</table>
</div>
</div>
</form>
</div>
</div>

<div id="layer_message_<?php echo $loginhash;?>"<?php if(empty($_GET['infloat'])) { ?> class="f_c blr nfl"<?php } ?> style="display: none;">
<h3 class="flb" id="layer_header_<?php echo $loginhash;?>">
<?php if(!empty($_GET['infloat']) && !isset($_GET['frommessage'])) { ?>
<em>用户登录</em>
<span><a href="javascript:;" class="flbc" onclick="hideWindow('login')" title="关闭">关闭</a></span>
<?php } ?>
</h3>
<div class="c"><div class="alert_right">
<div id="messageleft_<?php echo $loginhash;?>"></div>
<p class="alert_btnleft" id="messageright_<?php echo $loginhash;?>"></p>
</div>
</div>

<script type="text/javascript" reload="1">
<?php if(!isset($_GET['viewlostpw'])) { ?>
var pwdclear = 0;
function initinput_login() {
document.body.focus();
<?php if(!$auth) { ?>
if($('loginform_<?php echo $loginhash;?>')) {
$('loginform_<?php echo $loginhash;?>').username.focus();
}
<?php if(!$this->setting['autoidselect']) { ?>
simulateSelect('loginfield_<?php echo $loginhash;?>');
<?php } } elseif($seccodecheck && !(empty($_GET['auth']) || $questionexist)) { ?>
if($('loginform_<?php echo $loginhash;?>')) {
safescript('seccodefocus', function() {$('loginform_<?php echo $loginhash;?>').seccodeverify.focus()}, 500, 10);
}			
<?php } ?>
}
initinput_login();
<?php if($this->setting['sitemessage']['login']) { ?>
showPrompt('custominfo_login_<?php echo $loginhash;?>', 'mouseover', '<?php echo trim($this->setting['sitemessage']['login'][array_rand($this->setting['sitemessage']['login'])]); ?>', <?php echo $this->setting['sitemessage']['time'];?>);
<?php } ?>

function clearpwd() {
if(pwdclear) {
$('password3_<?php echo $loginhash;?>').value = '';
}
pwdclear = 0;
}
<?php } else { ?>
display('layer_login_<?php echo $loginhash;?>');
display('layer_lostpw_<?php echo $loginhash;?>');
$('lostpw_email').focus();
<?php } ?>
</script><?php updatesession();?><?php if(empty($_GET['infloat'])) { ?>
</div></div></div></div>
</div>
<?php } include template('common/footer'); ?>