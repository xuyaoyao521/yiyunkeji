<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/default/home/auther.htm', './template/default/common/header_common.htm', 1477886245, '5', './data/template/6_5_home_auther.tpl.php', './template/pc', 'home/auther')
;
block_get('101');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="robots" content="index, follow" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<?php if($_G['config']['output']['iecompatible']) { ?><meta http-equiv="X-UA-Compatible" content="IE=EmulateIE<?php echo $_G['config']['output']['iecompatible'];?>" /><?php } ?>
<title><?php if(!empty($navtitle)) { ?><?php echo $navtitle;?><?php } if(empty($nobbname)) { ?> <?php echo $_G['setting']['bbname'];?><?php } ?></title>
<?php echo $_G['setting']['seohead'];?>

<meta name="keywords" content="<?php if(!empty($metakeywords)) { echo dhtmlspecialchars($metakeywords); } ?>" />
<meta name="description" content="<?php if(!empty($metadescription)) { echo dhtmlspecialchars($metadescription); ?> <?php } if(empty($nobbname)) { ?>,<?php echo $_G['setting']['bbname'];?><?php } ?>" />
<meta name="MSSmartTagsPreventParsing" content="True" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
    
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_6_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_6_home_auther.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>', CSSPATH = '<?php echo $_G['setting']['csspath'];?>', DYNAMICURL = '<?php echo $_G['dynamicurl'];?>';</script>
<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php if(empty($_GET['diy'])) { $_GET['diy'] = '';?><?php } if(!isset($topic)) { $topic = array();?><?php } ?>
<link rel="Shortcut Icon" href="/public/images/favicon.ico">
<link rel="Bookmark" href="/public/images/favicon.ico">
<link rel="apple-touch-icon" href="/public/images/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="72x72" href="/public/images/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="114x114" href="/public/images/apple-touch-icon-114x114.png" />
<link href="/public/css/Public_index.css" rel="stylesheet" type="text/css">
<link href="/public/css/usercenter.css" rel="stylesheet" type="text/css" />
<link href="template/pc/ceo/mod_toutiao.css" rel="stylesheet" type="text/css" />

<script src="/public/js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script type="text/javascript"> var jq=jQuery.noConflict();</script>
<script src="/public/js/jquery-2.1.1.js" type="text/javascript"></script>

<script src="/public/js/jquery.lazyload.js" type="text/javascript"></script>
</head>

<body>
<!--frame_top-->
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div class="frame_top">
<div class="public_width">
    	<div class="left">
        	<iframe class="weather" allowtransparency="true" frameborder="0" width="180" height="36" scrolling="no" src="http://tianqi.2345.com/plugin/widget/index.htm?s=3&amp;z=2&amp;t=0&amp;v=0&amp;d=1&amp;bd=0&amp;k=000000&amp;f=&amp;q=1&amp;e=1&amp;a=0&amp;c=54774&amp;w=180&amp;h=36&amp;align=left"></iframe>
        </div>
        <div class="right"><a class="app" href="javascript:;">APP下载</a><span>|</span>
        
       <?php include template('common/header_userstatus'); ?> 
        
        <div class="app_QR_code"><img src="/public/images/QR_code.jpg"><p>手机扫码下载APP</p></div>
        </div>
        
    </div>
</div>
<div class="useercenter_navbar font_yahei">
<div class="useercenter_navbarbox public_width">
<div class="useercenter_navbar_l">
<div class="userheadpic"><?php echo avatar($usercontent[uid]);?></div>
<div class="userinformation author">
<h2 style="border:0"><?php echo $usercontent['username'];?></h2>

                     
                       <p><?php if($dyid) { ?><a onclick="qxdingyue(<?php echo $uid;?>,this)" class="cancel on" href="javascript:;">取消订阅</a><?php } else { ?><a onclick="dingyue3(<?php echo $uid;?>,this)" href="javascript:;" class="cancel">订阅</a><?php } ?></p>
</div>
</div>
<div class="useercenter_navbar_r">
<ul>
<li><a href="/">首页</a></li>
<li><a href="forum.php">论坛</a></li>
<li><a href="portal.php?mod=feedback">反馈</a></li>
</ul>
</div>
</div>
</div>
<!--frame_main-->
<div class="frame_main public_width font_yahei" style="margin-top:30px;">
<div class="left">

     <!--Best_history-->
          <div class="Best_history">
            <div class="title">历史最佳文章</div>
             <ul class="list">
             <?php if(is_array($historylist)) foreach($historylist as $v) { ?>                <li><p><i></i><a href="forum.php?mod=viewthread&amp;tid=<?php echo $v['tid'];?>" target="_blank" title="<?php echo $v['subject'];?>"><span><?php echo $v['subject'];?></span></a></p><p><?php echo $v['chakan'];?>阅读&nbsp;&nbsp;-&nbsp;&nbsp;<?php echo $v['dateline'];?></p></li>
               	<?php } ?>

              </ul>
        </div>
<!--Best_history End-->
    
   <!--Focus_News-->
            <div class="Focus_News">
            <h2 class="caption">24小时要闻</h2>
            
            
           
            
           <?php block_display('101');?>           
        </div>
<!--Focus_News End-->

    </div>
    
    <div class="right">
    	<ul class="Condition_selection">
        	<li <?php if($type==1) { ?>class="on"<?php } ?>><a href="home.php?mod=auther&amp;uid=<?php echo $uid;?>&amp;type=1">文章</a></li>
            <li <?php if($type==2) { ?>class="on"<?php } ?>><a href="home.php?mod=auther&amp;uid=<?php echo $uid;?>&amp;type=2">视频</a></li>
            <li <?php if($type==3) { ?>class="on"<?php } ?>><a href="home.php?mod=auther&amp;uid=<?php echo $uid;?>&amp;type=3">图片</a></li>
            <li <?php if($type==4) { ?>class="on"<?php } ?>><a href="home.php?mod=auther&amp;uid=<?php echo $uid;?>&amp;type=4">段子</a></li>
           
        </ul>
        <ul class="listBox" id="alist">
        
        <?php if($toutiaolist2) { ?>
   

       	  <?php if($type!=4) { ?>
          
            <?php include template('ceo/forum_auther'); ?>       
 			
       		<?php } else { ?>
              <?php include template('ceo/forum_auther_duanzi'); ?> 			<?php } ?>


    <?php } else { ?>
    
    
    <li class="wmt">暂时没有内容</li>
    
    <?php } ?>


        </ul>
         <div id="ajaxtag"></div>
    <script type="text/javascript">
        var url = 'home.php?mod=auther<?php echo $ceo_url;?>';
        var pages=<?php echo $_G['page'];?>;
        var allpage=<?php echo $thispage = ceil($allnum / $ceo_num);; ?>;
jq(function(){
if(pages==allpage){
jq("#ceo_load").hide();	
jq("#ceo_loadlast").html("最后一页").show();
}	
if(allpage==0){
jq("#ceo_load").hide();	
}
})
    </script> 
    <div class="a_pg" id="a_pg">
        <div id="ceo_loading" style="display:none;"><img src="template/index/images/loading.gif" /> 加载中</div>
        <div id="ceo_loadlast" style="display:none;"><a href="javascript:" >最后一页</a></div>
        <div id="ceo_load"><a href="javascript:" >加载更多</a></div>
    </div>
<script src="template/pc/ceo/ceo_ajaxpage.js" type="text/javascript"></script>
    </div>
</div>
<!--frame_main END-->
<script src="/public/js/Public_index.js" type="text/javascript"></script><?php include template('common/footer'); ?>