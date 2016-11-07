<?php exit;?>
<!--{template common/header}-->
<!--{if $_GET['mod'] == 'phone'}-->
        <!--{template ceo/toutiao}-->
<!--{elseif $_GET['mod'] == 'photo'}-->
        <!--{template ceo/photo}-->
<!--{elseif $_GET['mod'] == 'list'}-->
        <!--{template ceo/list}-->
<!--{elseif $_GET['mod'] == 'catelist'}-->
        <!--{template ceo/catelist}-->
<!--{else}-->
    <!--{if $ceo_indexdiyopen != 0 && $_GET['forumlist'] != 1}-->
        <!--{eval dheader("location: $indexurl");exit; }-->
    <!--{/if}-->

<!--{if $_G['setting']['mobile']['mobilehotthread'] && $_GET['forumlist'] != 1}-->
	<!--{eval dheader('Location:forum.php?mod=guide&view=hot');exit;}-->
<!--{/if}-->

<script type="text/javascript">
	function getvisitclienthref() {
		var visitclienthref = '';
		if(ios) {
			visitclienthref = 'https://itunes.apple.com/cn/app/zhang-shang-lun-tan/id489399408?mt=8';
		} else if(andriod) {
			visitclienthref = 'http://www.discuz.net/mobile.php?platform=android';
		}
		return visitclienthref;
	}
</script>

<!--{hook/index_toutiao_list_mobile}-->
<!--{hook/index_top_mobile}-->

    <!--{if empty($gid) && !empty($forum_favlist)}-->
	<div class="catlist box_bg box_br">
		<div class="subforumshow cl" href="#sub_forum_fav">        			
		<h1><a href="home.php?mod=space&do=favorite&type=forum">{lang my_favorites_forums}</a><span class="y"><img src="template/mobile/toutiao_mobile/img/collapsed_<!--{if !$_G[setting][mobile][mobileforumview]}-->yes<!--{else}-->no<!--{/if}-->.png"></span></h1>
        </div>
    </div>
	<div class="catlist s_forum box_bg box_brb mbm" id="sub_forum_fav">
        <ul>
        <!--{eval $i=1;}-->
        <!--{loop $forum_favlist $key $favorite}-->
            <!--{eval $forum=$favforumlist[$favorite[id]];}-->
            <li>              
                <!--{if $forum[icon]}-->
                $forum[icon]
                <!--{else}-->
                <a href="forum.php?mod=forumdisplay&fid={$forum['fid']}"><img src="template/mobile/toutiao_mobile/img/forum{if $forum[folder]}_new{/if}.png"/></a>
                <!--{/if}-->                    
                <a href="forum.php?mod=forumdisplay&fid={$forum['fid']}" class="b">
                <h3>{$forum[name]}<span>($forum[todayposts])</span></h3>
                <div class="catlist_desc">{echo strip_tags($forum[description])}</div>
                <div class="ceo_info">
                <!--{if empty($forum[redirect])}--><span><!--{echo dnumber($forum[threads])}--></span>/<span><!--{echo dnumber($forum[posts])}--></span><!--{/if}-->
                </div>
                </a>
            </li>
        <!--{/loop}-->
        </ul>

	</div>

    <!--{/if}-->

<!-- main forumlist start -->

	<!--{loop $catlist $key $cat}-->
	<div class="catlist box_bg box_br">
		<div class="subforumshow cl" href="#sub_forum_$cat[fid]">        			
		<h1>$cat[name]<span class="y"><img src="template/mobile/toutiao_mobile/img/collapsed_<!--{if !$_G[setting][mobile][mobileforumview]}-->yes<!--{else}-->no<!--{/if}-->.png"></span></h1>
        </div>
    </div>
	<div class="catlist s_forum box_bg box_brb mbm" id="sub_forum_$cat[fid]">
        <ul>
        <!--{eval $i=1;}-->
        <!--{loop $cat[forums] $forumid}-->
            <!--{eval $sum=count($cat[forums]);}-->
            <li>              
            <!--{eval $i++;}-->
                <!--{eval $forum=$forumlist[$forumid];}-->
                <!--{if $forum[icon]}-->
                $forum[icon]
                <!--{else}-->
                <a href="forum.php?mod=forumdisplay&fid={$forum['fid']}"><img src="template/mobile/toutiao_mobile/img/forum{if $forum[folder]}_new{/if}.png"/></a>
                <!--{/if}-->                    
                <a href="forum.php?mod=forumdisplay&fid={$forum['fid']}" class="b">
                <h3>{$forum[name]}<span>($forum[todayposts])</span></h3>
                <div class="catlist_desc">{echo strip_tags($forum[description])}</div>
                <div class="ceo_info">
                <!--{if empty($forum[redirect])}--><span><!--{echo dnumber($forum[threads])}--></span>/<span><!--{echo dnumber($forum[posts])}--></span><!--{/if}-->
                </div>
                </a>
            </li>
        <!--{/loop}-->
        </ul>

	</div>
	<!--{/loop}-->

<!-- main forumlist end -->
<!--{hook/index_middle_mobile}-->
<script type="text/javascript">
	(function() {
		<!--{if !$_G[setting][mobile][mobileforumview]}-->
			$('.s_forum').css('display', 'block');
		<!--{else}-->
			$('.s_forum').css('display', 'none');
		<!--{/if}-->
		$('.subforumshow').on('click', function() {
			var obj = $(this);
			var subobj = $(obj.attr('href'));
			if(subobj.css('display') == 'none') {
				subobj.css('display', 'block');
				obj.find('img').attr('src', 'template/mobile/toutiao_mobile/img/collapsed_yes.png');
			} else {
				subobj.css('display', 'none');
				obj.find('img').attr('src', 'template/mobile/toutiao_mobile/img/collapsed_no.png');
			}
		});
	 })();
</script>
<!--{/if}-->
<!--{template common/footer}-->
