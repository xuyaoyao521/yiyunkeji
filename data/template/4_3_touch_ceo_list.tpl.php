<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); require_once(TEMP_APP.'ceo_list.php');?><script>SetTopLeftNav("backpage");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/mod_toutiao.css" type="text/css" media="all">
<style><?php $wid = 100 / $ceo_listcell;?>section{ margin-top:10px;}
.list{ overflow: visible;}
.list li {width:<?php echo $wid;?>%; position:relative;}
.edit{ height:20px; line-height:20px; padding:0 10px; color:#ed344a; border:1px solid #ed344a; display: inline-block; float:right;-moz-border-radius: 20px;-webkit-border-radius: 20px;border-radius: 20px; font-size:12px; margin-top:5px; margin-left:10px;}
.edit.on{ background:#ed344a; color:#fff;}
.edit.editdel{ display:none;}
.msg{ font-size:16px; margin-bottom:10px;}
.msg .prompt{ font-size:12px; color:#999; display:none;}
.list li a{ background:#fff;border:1px dashed #fff;}
.list li a.close{ position:absolute; top:-7px; left:-7px; background:#ccc; color:#fff; width:14px; height:14px; text-align:center; line-height:14px; border:none;font-size:16px;-moz-border-radius: 50%;-webkit-border-radius: 50%;border-radius: 50%; display:none; z-index:999}
a{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none; user-select:none;-webkit-tap-highlight-color: rgba(0, 0, 0, 0);}
.list li.hover{ opacity:0.3}
.list li.on{opacity:1}
.list li.on a{background:#fff; border:1px dashed #ddd;}
.list li.on a.close{ border:none; background:none;}
</style>

<div id="wp">
<?php if($ceo_listclass == 4) { ?>
<section>
    <div class="con">
    <div class="msg"><?php echo m_lang('toutiao_list_diy'); ?></div>
    <ul class="list">
        <?php echo $ceo_listcode;?>
    </ul>
    </div>
</section>
<?php } if($ceo_listclass != 1 && $ceo_listclass != 4) { ?>
<section>
    <div class="con">
    <div class="msg"><?php echo m_lang('toutiao_list_forum'); ?>&nbsp;&nbsp;<span class="prompt">拖拽可以排序</span><a class="edit editsort">编辑</a><a class="edit editdel">删除</a></div>
        <ul class="list" id="editsort">
          	<li class="fixed"><a url="forum.php?mod=phone&amp;mods=forum" href="forum.php?mod=phone&amp;mods=forum"><span><?php echo m_lang('all'); ?></span></a></li>  
        <?php if(is_array($forumlist)) foreach($forumlist as $forums) { ?>            <li><a url="forum.php?mod=phone&amp;mods=forum&amp;fids=<?php echo $forums['fid'];?>" href="forum.php?mod=phone&amp;mods=forum"><span><?php echo $forums['name'];?></span></a><a class="close">×</a></li>
        <?php } ?>
        </ul>
    </div>
</section>
<?php } ?>



<section>
    <div class="con">
    <div class="msg"><?php echo m_lang('toutiao_list_portal'); ?></div>
    <ul class="list">
        <?php echo $ceo_listcode;?>
    </ul>
    </div>
</section>


</div>



<script src="/public/js/Sortable.min.js" type="text/javascript" type="text/javascript"></script>

<script>
var activation_sort = 0;
$(".editsort").click(function(){
var url = $("#editsort").find("li a").attr("url");
if(activation_sort==0){
$(this).html("完成");
$(this).addClass("on");
$("#editsort").find("li").addClass("yes");
$("#editsort").find("li").first().removeClass("yes");
$("#editsort").find("li a").attr("href","javascript:;")
//$("#editsort").find("li a.close").show();
$(".editdel").show();
$(".msg .prompt").show();
activation_sort=1;
}else{
$(this).html("编辑");
$(this).removeClass("on");
$("#editsort").find("li").removeClass("yes");
$(".editdel").hide();
$("#editsort").find("li a").attr("href",url)
$(".msg .prompt").hide();
activation_sort=0;

$(".editdel").html("删除");
$(".prompt").html("拖拽可以排序");
$("#editsort").find("li a.close").hide();
}
});

var editdel = 0;
$(".editdel").click(function(){
if(editdel==0){
$(this).html("自由排序");
$(".prompt").html("点击进行删除");
$("#editsort").find("li a.close").show();
$("#editsort").find("li").addClass("del");
$("#editsort").find("li").first().removeClass("del");
$("#editsort").find("li").removeClass("yes");
editdel=1;
}else{
$(this).html("删除");
$(".prompt").html("拖拽可以排序");
$("#editsort").find("li a.close").hide();
$("#editsort").find("li").removeClass("del");
$("#editsort").find("li").addClass("yes");
editdel=0;
}
});

$(document).on("click","#editsort li.del",function(){
alert("删除");
});

[].forEach.call($("#editsort"), function (el){
new Sortable(el, {
ghostClass: "on",
draggable: ".yes", 
onStart: function (evt){
$("#editsort").find("li").addClass("hover");
},
onEnd: function (evt){
$("#editsort").find("li").removeClass("hover");
},

});
});



</script>
