<?php exit;?>
<!--{template common/header}-->
<script>SetWebTitle("{echo m_lang('favorite')}");SetTopLeftNav("home_backpage");</script>

<div id="tabox" class="tabox box_bg">
    <div class="hd">
        <ul class="tab3">
            <li class="{if $_GET[type] == 'forum'}on{/if}"><a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=forum">{echo m_lang('mforum')}</a></li>
            <li class="{if $_GET[type] == 'thread'}on{/if}"><a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=thread">{echo m_lang('mthread')}</a></li>
            <li class="{if $_GET[type] == 'article'}on{/if}"><a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=article">{echo m_lang('marticle')}</a></li>
        </ul>
    </div>
</div>

    <!--{if $list}-->
    <div class="spacelist box_bg">
        <ul id="alist">
        <!--{loop $list $k $value}-->
            <li>
            <a href="$value[url]" class="xs1">$value[title]</a>
            <p class="mtn xs2">
            <!--{if $value[description]}-->
            <span class="xg1">$value[description]</span>
            <!--{/if}-->
            <span class="xg1"><!--{date($value[dateline], 'u')}--></span>&nbsp;&nbsp;
            <a href="home.php?mod=spacecp&ac=favorite&op=delete&favid=$k&type=<!--{if $_GET[type]=='forum'}-->forum<!--{else}-->thread<!--{/if}-->" class="nofav xg1">({lang favorite_delete})</a>
            </p>
            </li>
        <!--{/loop}-->
        </ul>
    </div>
    <!--{else}-->
    	<div class="wmt">{lang no_favorite_yet}</div>
    <!--{/if}-->
    
<!--{if $multi}--><div class="pgbox">$multi</div><!--{/if}-->

<script type="text/javascript">
	$('.nofav').on('click', function() {
		var obj = $(this);
		$.ajax({
			type:'POST',
			url:obj.attr('href') + '&handlekey=nofav&inajax=1',
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
</script>

<!--{template common/footer}-->
