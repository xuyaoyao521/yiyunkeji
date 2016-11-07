<?php exit;?>

<!--底部导航-->
<!--{if $ceo_btoolopen }-->
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/btool/t1.css" type="text/css" media="all">
<!--{if $ceo_btooldiycolor == 1}--><link rel="stylesheet" href="template/mobile/toutiao_mobile/css/btool/t-diy.css" type="text/css" media="all"><!--{/if}-->

<div id="btoolbar">
    <div class="btool btoolft cl">
        <ul>
            <li class="c1{if $_GET['mod'] == 'phone'} current{/if}"><a href="forum.php?mod=phone&mobile=2"><i class="mobile_icon ib_index">&#xe602;</i><span>新闻</span></a></li>
            <li class="c2{if $_GET['mod'] == 'forumdisplay' || $_GET['forumlist'] == '1'} current{/if}"><a href="forum.php?forumlist=1"><i class="mobile_icon ib_forum" style="font-size:22px;">&#xe600;</i><span>论坛</span></a></li>
            <li class="c3{if $_GET['mod'] == 'post'||($_GET['mod'] == 'misc'&&$_GET['action'] == 'nav')} current{/if}">
    <a href="<!--{if $_GET['mod'] == 'forumdisplay' || $_GET['mod'] == 'viewthread' || $_GET['mod'] == 'group'}-->forum.php?mod=post&action=newthread&fid=$_G[fid]<!--{else}-->forum.php?mod=misc&action=nav&mobile=2<!--{/if}-->"><i class="iconfont ib_post" style="font-size:23px;">&#xf604;</i><span>发帖</span></a>
            </li>
            <li class="c1{if $_GET['mod'] == 'dingyue' } current{/if}"><a href="home.php?mod=dingyue"><i class="mobile_icon ib_serach">&#xe601;</i><span>订阅</span></a></li>
<li class="c1{if $_GET['mod'] == 'space'} current{/if}"><a href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1"><i class="iconfont ib_profile">&#xf632;</i><span>我的</span></a></li>
        </ul>
    </div>
</div>
<!--{/if}-->

