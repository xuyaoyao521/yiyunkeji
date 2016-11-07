<?php exit;?>
<!--{block color_main}-->

<!--{if $_GET['mod'] == 'post'}-->
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/post.css" type="text/css" media="all">
<!--{/if}-->

<!--{if $php_self == 'home.php'}-->
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/home/home.css" type="text/css" media="all">
<!--{/if}-->

<!--{if $ceo_diycolor}-->
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/style/t-diy.css" type="text/css" media="all">
<!--{else}-->
    <!--{if $ceo_mobilecolor}-->
    <link rel="stylesheet" href="template/mobile/toutiao_mobile/css/style/t$ceo_mobilecolor.css" type="text/css" media="all">
    <!--{else}-->
    <link rel="stylesheet" href="template/mobile/toutiao_mobile/css/style/t1.css" type="text/css" media="all">
    <!--{/if}-->
<!--{/if}-->
<!--{/block}-->

<!--{block color_login}-->
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/member/member.css" type="text/css" media="all">
<!--{/block}-->

