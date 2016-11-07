<?php exit;?>
<script>SetWebTitle("{echo m_lang("channel")}");SetTopLeftNav("userlogin");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/portal/catelist.css" type="text/css" media="all">
<!--{eval require_once('./template/mobile/toutiao_mobile/ceo_catelist.php');}-->
<style>
<!--{eval $wid = 100 / $ceo_catelist;}-->
.list li {width:$wid%;}
</style>
<section>
    <div class="con">
    <!--{if $ceo_cateliststyle == 1}-->
        <ul class="list">
        <!--{loop $catelist $cate}-->
                <li><a href="portal.php?mod=list&catid=$cate['catid']"><span>$cate['catname']</span></a></li>
        <!--{/loop}-->
        </ul>
    <!--{else}-->
        <!--{loop $catelist $cate}-->
            <div class="msg">$cate['up']['catname']</div>
            <ul class="list">
                <li class="fixed"><a href="portal.php?mod=list&catid=$cate['up']['catid']"><span>{echo m_lang('all')}</span></a></li>
                <!--{loop $cate['sub'] $catesub}-->
                <li><a href="portal.php?mod=list&catid=$catesub['catid']"><span>$catesub['catname']</span></a></li>
                <!--{/loop}-->
            </ul>
        <!--{/loop}-->
    <!--{/if}-->
    </div>
</section>

