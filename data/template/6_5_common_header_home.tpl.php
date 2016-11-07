<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/pc/common/header_home.htm', './template/default/common/header_common.htm', 1477886240, '5', './data/template/6_5_common_header_home.tpl.php', './template/pc', 'common/header_home')
;?>
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
    
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_6_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_6_home_dingyue.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>', CSSPATH = '<?php echo $_G['setting']['csspath'];?>', DYNAMICURL = '<?php echo $_G['dynamicurl'];?>';</script>
<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php if(empty($_GET['diy'])) { $_GET['diy'] = '';?><?php } if(!isset($topic)) { $topic = array();?><?php } ?>
<link rel="Shortcut Icon" href="/public/images/favicon.ico">
<link rel="Bookmark" href="/public/images/favicon.ico">
<link rel="apple-touch-icon" href="/public/images/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="72x72" href="/public/images/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="114x114" href="/public/images/apple-touch-icon-114x114.png" />
<link href="/public/css/Public_index.css" rel="stylesheet" type="text/css">
<link href="/public/css/usercenter.css" rel="stylesheet" type="text/css" />
<script src="/public/js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script type="text/javascript"> var jq=jQuery.noConflict();</script>
<script src="/public/js/jquery-2.1.1.js" type="text/javascript"></script>

<script src="/public/js/jquery.lazyload.js" type="text/javascript"></script>
<style>
.appl{ width:200px; padding:0; background:#fff}

.appl .tbn .bbda{ padding:0;height: 57px;
    line-height: 57px;
    text-indent: 30px;
    color: #666;
    font-size: 16px;
    border-bottom: 1px solid #e9e9e9;
    margin-bottom: 10px;
    color: #333;}
.wp{ margin-top:20px}
.appl .tbn li{ border:0} 
.appl .tbn li.a{ padding:0} 
.appl .tbn li.a a{color: #000;
    -moz-border-radius: 30px;
    -webkit-border-radius: 30px;
    border-radius: 30px;
    padding: 5px 10px;
    line-height: 30px; display:initial; margin-left:30px}
.appl .tbn li.a a.on{background: #f2f2f2;}
.ct2_a{ background:none}
.ct2_a .mn{ background:#fff}
</style>
</head>

<body>

<!--frame_top-->
<div id="append_parent"></div><div id="ajaxwaitid"></div>
<div class="frame_top" <?php if($_GET['isadmin']==1) { ?>style="display:none"<?php } ?>>

    	<div class="left">
        	<iframe width="550" class="weather" scrolling="no" height="20" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&amp;id=1&amp;color=%23FFFFFF&amp;icon=1&amp;py=weihai&amp;wind=1&amp;num=2"></iframe>
        </div>
        <div class="right"><a class="app" href="javascript:;">APP下载<div class="app_QR_code"><img src="/public/images/QR_code.jpg"><p>手机扫码下载APP</p></div></a><span>|</span>
        
       <?php include template('common/header_userstatus'); ?> 
        
        
        </div>
        
   
</div>
<!--frame_top END-->

<div class="useercenter_navbar font_yahei">
<div class="useercenter_navbarbox public_width">
<div class="useercenter_navbar_l">
<div class="userheadpic"><?php echo avatar($_G[uid]);?></div>
<div class="userinformation">
<h2><?php echo $_G['member']['username'];?></h2>

<p>上次登录：<?php echo $_G['member']['lastvisit'];?></p>
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

<div class="useercenter_menu font_yahei">
<div class="useercenter_menubox">
<ul>
        	<li>
<a <?php if($_GET['do']=="notice"||$_GET['do']=="pm") { ?>class="on"<?php } ?> href="home.php?mod=space&amp;do=pm">消息(<i><?php echo $newpmcount;?></i>)</a>
<li>
<a <?php if($action=="collection") { ?>class="on"<?php } ?> href="home.php?mod=collection">收藏(<i><?php echo $allcount;?></i>)</a>
</li>
<li>
<a <?php if($action=="dingyue") { ?>class="on"<?php } ?> href="home.php?mod=dingyue">订阅(<i><?php echo $dycount;?></i>)</a>
</li>
            <li>
<a <?php if($_GET['mod']=="guide") { ?>class="on"<?php } ?> href="forum.php?mod=guide&amp;view=my">帖子(<i><?php echo $tiezicount;?></i>)</a>
</li>
            <li>
<a <?php if($_GET['ac']=="avatar"||$_GET['ac']=="credit") { ?>class="on"<?php } ?> href="home.php?mod=spacecp&amp;ac=avatar">设置</a>
</li>
</ul>
</div>
</div>