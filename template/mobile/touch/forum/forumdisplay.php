<?php exit;?>
<!--{template common/header_default}-->
<!--{eval require_once(TEMP_APP.'mod_forumdisplay.php');}-->

<!-- header start -->
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/forumdisplay.css" type="text/css" media="all">
<div class="forum_topb"></div>
<div class="forum_top">
	<div class="header">
        <div id="header_left" class="header_left"><a href="forum.php?forumlist=1"><i class="iconfont i_backpage">&#xe844;</i></a></div>
        <h1 id="forum_name">$_G['forum']['name']</h1>
    	<div class="header_right">
   <!--{if !$shoucang}--> <a href="home.php?mod=spacecp&ac=favorite&type=forum&id=$_G[fid]&handlekey=favoriteforum&formhash={FORMHASH}" class="favorite " onClick="jubao(this); return false;" >{echo m_lang('forum_fav')}</a><!--{else}--><a href="javascript:;" class="favorite "  >已收藏</a><!--{/if}-->
        </div>
    <div class="fbt">
    </div>
    </div>
    
    <div class="forum_head">
        <a href="forum.php?mod=forumdisplay&fid=$_G[fid]" title="$_G['forum'][name]" class="flogo"><img alt="$_G['forum'][name]" src="<!--{if $_G['forum'][icon]}-->data/attachment/common/$_G['forum'][icon]<!--{else}-->template/mobile/toutiao_mobile/img/forum.png<!--{/if}-->"></a>
        <h1>$_G['forum']['name']</h1>
        <p><span>{lang index_today} $_G[forum][todayposts]</span><span>{lang index_threads} $_G[forum][threads]</span><span><a href="forum.php?mod=forumdisplay&fid=$_G[fid]" title="$_G['forum'][name]">{echo m_lang('forum_info')}</a></span></p>
    </div>
</div>

<!--{if  (!$_G[setting][mobile][mobilesimpletype] &&$_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || $_G['forum']['threadsorts'] || $subexists}-->
<div class="tabBox box_bg box_br mbm">
    <div class="hd">
        <ul>
            <!--{if !$_G[setting][mobile][mobilesimpletype]}-->
                <!--{if $_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']}--><li><a href="javascript:;" id="thtys" onclick="dbox('thtys','dbbox');">{lang threadtype}</a></li><!--{/if}-->
                <!--{if $_G['forum']['threadsorts'] && $ceo_sortopen}--><li><a href="javascript:;" id="thsort" onclick="dbox('thsort','dbbox');">{lang threadsort}</a></li><!--{/if}-->
            <!--{/if}--> 
            <!--{if $subexists}--><li><a href="javascript:;" id="subfrm" onclick="dbox('subfrm','dbbox');"{if $ceo_subopen == 1 && $_G['page'] == 1} class="dbbox"{/if}>{echo m_lang('subforums')}</a></li><!--{/if}--> 
        </ul>
    </div>
    <div class="bd">
        <!--{if $subexists}-->
    	<div id="subfrm_menu" style="display:{if $ceo_subopen == 1 && $_G['page'] == 1}block{else}none{/if}">
        	<ul>
                <!--{loop $sublist $sub}-->
            	<li><a href="forum.php?mod=forumdisplay&fid={$sub[fid]}">{$sub['name']}</a></li>
                <!--{/loop}-->
            </ul>
        </div>
        <!--{/if}--> 

        <!--{if !$_G[setting][mobile][mobilesimpletype]}--> 
            <!--{if $_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']}--> 
            <div id="thtys_menu" style="display:none"> 
                <ul>
                    <li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="<!--{if $_GET['filter'] != 'typeid'}-->a<!--{/if}-->">{lang forum_viewall}</a></li>
                    <!--{loop $_G['forum']['threadtypes']['types'] $id $name}--> 
                    <li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=typeid&typeid=$id$forumdisplayadd[typeid]" {if $_GET['filter'] == 'typeid' && $_GET['typeid'] == $id} class="a"{/if}>$name</a></li>
                    <!--{/loop}--> 
                </ul>
            </div>
            <!--{/if}--> 

            <!--{if $_G['forum']['threadsorts'] && $ceo_sortopen}--> 
            <div id="thsort_menu" style="display:none"> 
                <ul>
                    <li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}" class="<!--{if $_GET['filter'] != 'sortid'}-->a<!--{/if}-->">{lang forum_viewall}</a></li>
                    <!--{loop $_G['forum']['threadsorts']['types'] $id $name}--> 
                    <li><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=sortid&sortid=$id$forumdisplayadd[sortid]" class="<!--{if $_GET[sortid] == $id}-->a<!--{/if}-->">$name</a></li>
                    <!--{/loop}--> 
                </ul>
            </div>
            <!--{/if}--> 
        <!--{/if}--> 
    </div>
</div>
<!--{/if}--> 
<!-- header end --> 

<div id="tabox" class="tabox box_bg">
    <div class="hd">
        <ul class="tab3">
    <li class="{if !$_GET['filter']}on{/if}"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]">{lang threads_all}</a></li>
   <li class="{if $_GET['filter'] == 'heat'}on{/if}"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=heat&orderby=heats$forumdisplayadd[heat]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang order_heats}</a></li>
   <li class="{if $_GET['filter'] == 'digest'}on{/if}"><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=digest&digest=1$forumdisplayadd[digest]{if $_GET['archiveid']}&archiveid={$_GET['archiveid']}{/if}">{lang digest_posts}</a></li>
        </ul>
    </div>
</div>
<!--{if $quicksearchlist && !$_GET['archiveid']}--><!--{subtemplate forum/search_sortoption}--><!--{/if}-->


<!--{hook/forumdisplay_top_mobile}--> 

<!-- main threadlist start --> 
<!--{if !$subforumonly}--> 
    <!--{if $_G['forum_threadcount']}-->
        <!--{subtemplate forum/forumdisplay_list}-->
    <!--{else}-->
<div class="threadlist box_bg">
        <li class="wmt">{lang forum_nothreads}</li>
</div>
    <!--{/if}--> 
<!--{/if}-->

<!--{if $ceo_norepages > 1}--> 
    <!--{if $_G['forum_threadcount'] > $_G['tpp']}-->
    <div id="ajaxtag"></div>
	<script type="text/javascript">
    var url = 'forum.php?mod=forumdisplay&fid={$_G[fid]}&filter={$filter}&orderby={$_GET[orderby]}{$forumdisplayadd[page]}&{$multipage_archive}';
    var pages=$_G['page'];
    var allpage={echo $thispage = ceil($_G['forum_threadcount'] / $_G['tpp']);};
    </script> 
    <!--{template common/ceo_ajaxpage}--> 
    <!--{/if}-->
<!--{else}--> 
    <!--{if $multipage}--><div class="pgbox">$multipage</div><!--{/if}--> 
<!--{/if}-->

<script type="text/javascript">
	$('.favorite').on('click', function() {
		var obj = $(this);
		$.ajax({
			type:'POST',
			url:obj.attr('href') + '&handlekey=favorite&inajax=1',
			data:{'favoritesubmit':'true', 'formhash':'{FORMHASH}'},
			dataType:'xml',
		})
		.success(function(s) {
			popup.open(s.lastChild.firstChild.nodeValue);
			evalscript(s.lastChild.firstChild.nodeValue);
		})
		.error(function() {
			window.location.href = obj.attr('href');
			popup.close();
		});
		return false;
	});

$(document).ready(function(){
    $(window).scroll(function() {
        if ($(document).scrollTop() > 10 && ($(document).height() - window.screen.availHeight) > 10) {
			$(".forum_head").hide("slow");
			$(".forum_top").css("position","fixed"); 
			$(".forum_top").css("top","0"); 
			$(".forum_top").css("z-index","100"); 
			if($(document).scrollTop() < 45) {
				$(".forum_topb").css("height",( $(document).scrollTop() + 45) + "px");
			}
			$("#forum_name").show("slow"); 
		}
        if ($(document).scrollTop() <= 10 && ($(document).height() - window.screen.availHeight) > 10) {
			$("#forum_name").hide("slow"); 
			$(".forum_head").show("slow");
			if($(document).scrollTop() < 45) {
				$(".forum_topb").css("height", $(document).scrollTop() + "px");
			}
			$(".forum_top").css("position","relative"); 
			$(".forum_top").css("z-index","0"); 
		}
		
    });
	
})


</script> 

<!-- main threadlist end --> 
<!--{hook/forumdisplay_bottom_mobile}-->
<!--div class="pullrefresh" style="display:none;"></div-->
<!--{template common/footer_default}--> 
