<?php exit;?>
<!--{eval require_once(TEMP_APP.'function_toutiao.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_toutiao.php');}-->
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/mod_toutiao.css" type="text/css" media="all">
<!--{template ceo/header}-->
<!--{if !$_GET['mods'] && $curPage == 1}-->
    <!--{eval tplhtmlcode('toutiao_code',$ceo_piclistcode);}-->
<!--{/if}-->
<!--{if $ceo_module == 1}-->
    <!--{template ceo/forum}-->
<!--{/if}-->
<!--{if $ceo_module == 2}-->
    <!--{template ceo/portal}-->
<!--{/if}-->

