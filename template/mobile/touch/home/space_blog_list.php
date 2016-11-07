<?php exit;?>
{eval
	$_G[home_tpl_spacemenus][] = "<a href=\"home.php?mod=space&uid=$space[uid]&do=blog&view=me\">{lang they_blog}</a>";
	$friendsname = array(1 => '{lang friendname_1}',2 => '{lang friendname_2}',3 => '{lang friendname_3}',4 => '{lang friendname_4}');
}

<!--{template common/header}-->
<script>SetWebTitle("{lang blog}");SetTopLeftNav("home_backpage");</script>

<div class="ct">

<div id="tabox" class="tabox box_bg">
    <div class="hd">
        <ul class="tab3">
            <li class="{if $actives[we]}on{/if}"><a href="home.php?mod=space&do=blog&view=we">{lang friend_blog}</a></li>
            <li class="{if $actives[me]}on{/if}"><a href="home.php?mod=space&do=blog&view=me">{lang my_blog}</a></li>
            <li class="{if $actives[all]}on{/if}"><a href="home.php?mod=space&do=blog&view=all">{lang view_all}</a></li>
        </ul>
    </div>
</div>

			<!--{if $searchkey}-->
				<p class="tbmu">{lang follow_search_blog} <span style="color: red; font-weight: 700;">$searchkey</span> {lang doing_record_list}</p>
			<!--{/if}-->

		<!--{if $count}-->
			<div class="blog">
            <ul id="alist">            
			<!--{loop $list $k $value}-->
				<li>
					<!--{if empty($diymode)}-->
						<div class="blog_avt"><a href="home.php?mod=space&uid=$value[uid]" c="1"><!--{avatar($value[uid],small)}--></a></div>				
					<!--{/if}-->
					<h1 class="mbn">
						<a href="home.php?mod=space&uid=$value[uid]&do=blog&id=$value[blogid]" class="xi2">$value[subject]</a>						
					</h1>                    
					<p class="mbm">
						<!--{if empty($diymode)}--><a href="home.php?mod=space&uid=$value[uid]">$value[username]</a> <!--{/if}--> <span class="xg1">$value[dateline]</span>
					</p>
					<div class="message mbm"{if $value[pic]} style="min-height:80px;"{/if} id="blog_article_$value[blogid]">
						<!--{if $value[pic]}--><div class="y"><a href="home.php?mod=space&uid=$value[uid]&do=blog&id=$value[blogid]" target="_blank"><img src="$value[pic]" alt="$value[subject]" class="tn" /></a></div><!--{/if}-->
						$value[message]
					</div>
					<p class="xg1">
						<!--{if $value[viewnum]}-->$value[viewnum] {lang blog_read}
                        <span class="pipe">|</span>
                        <!--{/if}-->						
                        $value[replynum] {lang blog_replay}
                        <!--{if $value['hot']}--> <span class="pipe">|</span> {lang hot} $value[hot]<!--{/if}-->						
						<!--{if $_GET['view']=='me' && $space['self']}-->
							<span class="pipe">|</span>
                            <a href="home.php?mod=spacecp&ac=blog&blogid=$value[blogid]&op=delete&handlekey=delbloghk_{$value[blogid]}" >{lang delete}</a>
						<!--{/if}-->						
					</p>
				</li>
			<!--{/loop}-->
            </ul>
			</div>
            
            
<!--{if $ceo_norepages > 1}--> 
    <!--{if $count > $perpage}-->
    <div id="ajaxtag"></div> 
        <script type="text/javascript">
        var url = 'home.php?mod=space&do=blog&{if $actives[we]}view=we{elseif $actives[me]}view=me{elseif $actives[all]}view=all{/if}';
        var pages=$_G['page'];
        var allpage={echo $thispage = ceil($count / $perpage);};
        </script>
        <!--{template common/ceo_ajaxpage}--> 
    <!--{/if}-->
<!--{else}-->
    <!--{if $multi}--><div class="pgbox">$multi</div><!--{/if}-->
<!--{/if}-->          

		<!--{else}-->
			<div class="wmt">{lang no_related_blog}</div>
		<!--{/if}-->

<script type="text/javascript">
	function fuidgoto(fuid) {
		var parameter = fuid != '' ? '&fuid='+fuid : '';
		window.location.href = 'home.php?mod=space&do=blog&view=we'+parameter;
	}
</script>
</div>
<!--{template common/footer}-->