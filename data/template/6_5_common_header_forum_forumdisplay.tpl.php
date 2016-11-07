<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); 
0
|| checktplrefresh('./template/pc/common/header.htm', './template/default/common/header_common.htm', 1478324570, '5', './data/template/6_5_common_header_forum_forumdisplay.tpl.php', './template/pc', 'common/header_forum_forumdisplay')
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
    
<base href="<?php echo $_G['siteurl'];?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_6_common.css?<?php echo VERHASH;?>" /><link rel="stylesheet" type="text/css" href="data/cache/style_6_forum_forumdisplay.css?<?php echo VERHASH;?>" /><?php if($_G['uid'] && isset($_G['cookie']['extstyle']) && strpos($_G['cookie']['extstyle'], TPLDIR) !== false) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['cookie']['extstyle'];?>/style.css" /><?php } elseif($_G['style']['defaultextstyle']) { ?><link rel="stylesheet" id="css_extstyle" type="text/css" href="<?php echo $_G['style']['defaultextstyle'];?>/style.css" /><?php } ?><script type="text/javascript">var STYLEID = '<?php echo STYLEID;?>', STATICURL = '<?php echo STATICURL;?>', IMGDIR = '<?php echo IMGDIR;?>', VERHASH = '<?php echo VERHASH;?>', charset = '<?php echo CHARSET;?>', discuz_uid = '<?php echo $_G['uid'];?>', cookiepre = '<?php echo $_G['config']['cookie']['cookiepre'];?>', cookiedomain = '<?php echo $_G['config']['cookie']['cookiedomain'];?>', cookiepath = '<?php echo $_G['config']['cookie']['cookiepath'];?>', showusercard = '<?php echo $_G['setting']['showusercard'];?>', attackevasive = '<?php echo $_G['config']['security']['attackevasive'];?>', disallowfloat = '<?php echo $_G['setting']['disallowfloat'];?>', creditnotice = '<?php if($_G['setting']['creditnotice']) { ?><?php echo $_G['setting']['creditnames'];?><?php } ?>', defaultstyle = '<?php echo $_G['style']['defaultextstyle'];?>', REPORTURL = '<?php echo $_G['currenturl_encode'];?>', SITEURL = '<?php echo $_G['siteurl'];?>', JSPATH = '<?php echo $_G['setting']['jspath'];?>', CSSPATH = '<?php echo $_G['setting']['csspath'];?>', DYNAMICURL = '<?php echo $_G['dynamicurl'];?>';</script>
<script src="<?php echo $_G['setting']['jspath'];?>common.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<?php if(empty($_GET['diy'])) { $_GET['diy'] = '';?><?php } if(!isset($topic)) { $topic = array();?><?php } ?>
<link rel="Shortcut Icon" href="/public/images/favicon.ico">
<link rel="Bookmark" href="/public/images/favicon.ico">
<link rel="apple-touch-icon" href="/public/images/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="72x72" href="/public/images/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="114x114" href="/public/images/apple-touch-icon-114x114.png" />
<link href="/public/css/Public_index.css" rel="stylesheet" type="text/css">

<script src="/public/js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script type="text/javascript"> var jq=jQuery.noConflict();</script>
<script src="/public/js/jquery-2.1.1.js" type="text/javascript"></script>

<script src="/public/js/jquery.lazyload.js" type="text/javascript"></script>
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

<!--frame_head-->
<div class="frame_head" <?php if($_GET['isadmin']==1) { ?>style="display:none"<?php } ?>>
<div class="public_width">
<div class="logo"><a href="/"><img src="/public/images/logo.png" alt="E云网"></a></div>
        <div class="nav font_yahei">
        	<a href="/">首页</a><a href="forum.php">论坛</a><a href="portal.php?mod=feedback">反馈</a>
        </div>
        <form action="portal.php" method="get">
        <div class="search"><input type="text" id="KeyWord" name="keyword" placeholder="请输入您想搜索的关键词！"><input type="submit" class="submit" value="&#xe601;" ><!--<div class="hot" style="display:none"><a href="/portal.php?keyword=威海">威海</a><a href="/portal.php?keyword=旅游">旅游</a><a href="/portal.php?keyword=乳山">乳山</a></div>--></div>
        </form>
    </div>
</div>
<!--frame_head END-->


<!--frame_go_top-->
<div class="frame_go_top" <?php if($_GET['isadmin']==1) { ?>style="display:none"<?php } ?>>
    <p><a class="Feedback" href="portal.php?mod=feedback"><span>&#xe627;</span><span>意 见<br>反 馈</span></a></p>
    <p><a class="Gototop" href="javascript:;"><span>&#xe626;</span><span>返 回<br>顶 部</span></a></p>
</div>
<!--frame_go_top END-->