<?php exit;?>
<!--{subtemplate common/header}-->
{eval}
	$settings = $_G['cache']['plugin']['yingxiao_toutiaom'];
	$ceo_message = isset($settings['ceo_message']) ? intval($settings['ceo_message']) : 0;
	$ceo_messagenum = isset($settings['ceo_messagenum']) ? intval($settings['ceo_messagenum']) : 100;
	$ceo_picwidth = isset($settings['ceo_picwidth']) ? intval($settings['ceo_picwidth']) : 150;
	$ceo_picheight = isset($settings['ceo_picheight']) ? intval($settings['ceo_picheight']) : 100;
	$ceo_pictype = isset($settings['ceo_pictype']) ? trim($settings['ceo_pictype']) : 'fixwr';
{/eval}
<!--{eval $list = array();}-->
<!--{eval $wheresql = category_get_wheresql($cat);}-->
<!--{eval $list = category_get_list($cat, $wheresql, $page);}-->
<script>SetWebTitle("$cat[catname]");SetTopLeftNav("backpage");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/portal/portal.css" type="text/css" media="all">
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/mod_toutiao.css" type="text/css" media="all">
<div class="ct">
<!--{if $cat[subs] || $cat[others]}-->
<div class="tabBox box_bg box_br mbm">
    <div class="hd">
        <ul>
<!--{if $cat[subs]}--><li><a href="javascript:;" id="cats" onclick="dbox('cats', 'cats');">{lang sub_category}</a></li><!--{/if}-->   
<!--{if $cat[others]}--><li><a href="javascript:;" id="cato" onclick="dbox('cato', 'cato');">{lang category_related}</a></li><!--{/if}-->
        </ul>
    </div>
    <div class="bd">
        <!--{if $cat[subs]}-->
        <div id="cats_menu" style="display:none;">
            <ul>
                <!--{loop $cat[subs] $value}-->
                <li><a href="{echo getportalcategoryurl($value[catid]);}">$value[catname]</a></li>
                <!--{/loop}-->
            </ul>
        </div>
        <!--{/if}-->
        <!--{if $cat[others]}-->
        <div id="cato_menu" style="display:none;">
            <ul>
                <!--{loop $cat[others] $value}-->
                <li><a href="{echo getportalcategoryurl($value[catid]);}">$value[catname]</a></li>
                <!--{/loop}-->
            </ul>
        </div>
        <!--{/if}-->
    </div>
</div>
<!--{/if}-->  

<div class="threadlist box_bg">
        <ul id="alist">
            <!--{loop $list['list'] $value}-->
<li><a class="act_link" href="portal.php?mod=view&aid=$value[aid]">
<!--{if $value[pic]}-->
<div class="desc">
    <h3>$value[title]</h3>
    <div class="item_info">
        <span class="src space">$value[username]</span>
        <!--{if $value[catname] && $cat[subs]}--><span class="cmt space">$value[catname]</span><!--{/if}-->
       
        <span class="time"><!--{eval $value[dateline] = date('Y-m-d', strtotime($value[dateline]));}-->$value[dateline]</span>
    </div>
</div>
<div class="list_img_holder" style="background: none;">
<span style="height: 62.6667px;"><img src="$value[pic]" onload="resize(this, 150, 100, 0)"></span>
</div>
<!--{else}-->
    <h3>$value[title]</h3>
    <!--{if $ceo_message}--><div class="item_message"><!--{eval substr($value[summary],$ceo_messagenum);}--></div><!--{/if}-->
    <div class="item_info">
        <span class="src space">$value[username]</span>
        <!--{if $value[catname] && $cat[subs]}--><span class="cmt space">$value[catname]</span><!--{/if}-->
        
        <span class="time"><!--{eval $value[dateline] = date('Y-m-d', strtotime($value[dateline]));}-->$value[dateline]</span>
    </div>
<!--{/if}-->
</a></li>
			<!--{/loop}-->
        </ul>
</div>

<!--{if $ceo_norepages > 1}--> 
<!--{if $list['count'] > $cat['perpage']}-->
<!--{eval $nextpage = $page + 1; }--> 
<div id="ajaxtag"></div>
	<script type="text/javascript">
    var url = '$cat['caturl']?page=$nextpage';
    var pages=$_G['page'];
    var allpage={echo $thispage = ceil($list['count'] / $cat['perpage']);};
    </script>
    <!--{template common/ceo_ajaxpage}--> 
<!--{/if}-->
<!--{else}-->
    <!--{if $list['multi']}--><div class="pgbox">$list['multi']</div><!--{/if}-->
<!--{/if}-->  

</div>
<!--{subtemplate common/footer}-->