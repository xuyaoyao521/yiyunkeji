<?php exit;?>
<!--{eval define('TEMP_APP', DISCUZ_ROOT.'./template/index/ceo/');}-->
<!--{eval require_once(TEMP_APP.'ceo_lang.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_function.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_toutiao.php');}-->
<link rel="stylesheet" href="template/index/ceo/mod_toutiao.css" type="text/css" media="all">
<div class="threadlist bp">
    <!--{if $toutiaolist}-->
    <ul id="alist">

<!--{if $ceo_module == 1}-->
    <!--{template ceo/forum}-->
<!--{/if}-->
<!--{if $ceo_module == 2}-->
    <!--{template ceo/portal}-->
<!--{/if}-->

    </ul>       
    <!--{else}-->
    <li class="wmt">{echo m_lang('toutiao_nolist')}</li>
    <!--{/if}-->

    <div id="ajaxtag"></div>
    <script type="text/javascript">
        var url = 'portal.php?mod=toutiao$ceo_url';
        var pages=$_G['page'];
        var allpage={echo $thispage = ceil($allnum / $ceo_num);};
    </script> 
    <div class="a_pg" id="a_pg">
        <div id="ceo_loading" style="display:none;"><img src="template/index/images/loading.gif" /> {echo m_lang('load_pic')}</div>
        <div id="ceo_loadlast" style="display:none;"><a href="javascript:" >{echo m_lang('load_last')}</a></div>
        <div id="ceo_load"><a href="javascript:" >{echo m_lang('load')}</a></div>
    </div>
<script src="template/pc/ceo/ceo_ajaxpage.js"></script>

</div>

