<?php  exit;?>

<!--{subtemplate common/header_common}-->

<body id="nv_{$_G[basescript]}" class="pg_index" onLoad="">
<div id="wp">
<div id="content" class="content">
<header class="header_bg">
    <div id="backpage" class="backpage" style="display:none"><a href="javascript:history.back(-1)" class="z"><i class="iconfont i_backpage">&#xe844;</i></a></div>
    <div id="forum_backpage" class="backpage" style="display:none"><a href="javascript:history.back(-1)"  class="z"><i class="iconfont i_backpage">&#xe844;</i></a></div>
    <div id="home_backpage" class="backpage" style="display:none"><a href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1" class="z"><i class="iconfont i_backpage">&#xe844;</i></a></div>
    <div id="userlogin" class="hd_mu">
    <!--{if $_G['uid'] || $_G['connectguest']}-->
        <a id="us_list_btn" href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1" class="z avatar"><img src="<!--{avatar($_G[uid], small, true)}-->" class="uspic" /><i class="iconfont i_usermenu">&#xe812;</i></a>
    <!--{else}-->    
        <a href="member.php?mod=logging&action=login" class="z"><i class="iconfont i_usermenu">&#xe812;</i></a>
    <!--{/if}-->
    <!--{if $_G[member][newpm] || $_G[member][newprompt] || $_G['connectguest'] }--><em></em><!--{/if}-->
    </div>
    <div id="webtitle" class="logo"><a href="./forum.php"><img src="template/mobile/toutiao_mobile/img/logo.png" /></a></div>
    <div id="side_pr" class="hd_mu"><a href="javascript:;" id="side_open" class="y"><i class="iconfont i_sidemenu">&#xe810;</i></a></div>
</header>
<div class="toptb" style=""></div>

<!--{subtemplate common/ceo_color}-->
<!--{$color_main}-->

<!--{hook/global_header_mobile}-->
