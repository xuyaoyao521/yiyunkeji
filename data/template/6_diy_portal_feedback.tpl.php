<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('feedback');?><?php include template('common/header'); ?><!--frame_pic_content-->
<div class="frame_pic_content public_width font_yahei">
<div class="public_position"><a href="/">首页</a>&nbsp;&nbsp;&gt;&nbsp;&nbsp;反馈</div>
    <div class="details_main">
    	<div class="frame_form">
        	<div class="title">意见反馈</div>
        	<dl>
            	<dt>联系方式（必填）</dt>
                <dd><input type="text" placeholder="请输入您的QQ\邮箱\手机号" id="contact" class="font_yahei"></dd>
            </dl>
            <dl>
            	<dt>您的意见（必填）</dt>
                <dd><textarea placeholder="请输入您要反馈的意见..." id="content" class="font_yahei"></textarea></dd>
            </dl>
            <dl>
            	<dt>&nbsp;</dt>
                <dd><input type="button" id="submit" value="提  交" class="font_yahei"></dd>
            </dl>
        </div>
    </div>
</div>
<!--frame_pic_content END-->

</body>
<script>
jq("#submit").click(function(){
var contact=jq("#contact").val();
var content=jq("#content").val();
if(contact==""){
showDialog("请输入联系方式！", 'alert', '错误信息', null, true, null, '', '', '', 3);	
return false;
}
if(content==""){
showDialog("请输入您要反馈的意见！", 'alert', '错误信息', null, true, null, '', '', '', 3);	
return false;
}
jq.post("ajax.php?act=feedback",{contact:contact,content:content},function(data){

if(data==1){
showDialog("反馈成功！", 'notice');
window.location="/";

}else{
showDialog("每天最多可以反馈3条！", 'notice');
}

});
});

</script>
<script src="/public/js/Public_index.js" type="text/javascript"></script><?php include template('common/footer'); ?>