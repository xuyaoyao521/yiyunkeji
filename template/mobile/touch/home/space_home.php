<?php exit;?>
<!--{subtemplate common/header}-->
<script>SetWebTitle("{lang feed}");SetTopLeftNav("home_backpage");</script>

<div class="ct box_bg"> 
<div id="tabox" class="tabox">
    <div class="hd">
        <ul class="tab3">
            <li class="{if $actives[me]}on{/if}"><a href="home.php?mod=space&do=home&view=me">{lang my_feed}</a></li>
            <li class="{if $actives[we]}on{/if}"><a href="home.php?mod=space&do=home&view=we">{echo m_lang('friend_feed')}</a></li>
            <li class="{if $actives[all]}on{/if}"><a href="home.php?mod=space&do=home&view=all">{lang view_all}</a></li>
        </ul>
    </div>
</div>
			<!--{if $list}--> 
                
					<!--{loop $list $day $values}-->
                    <div class="feed">
						<!--{if $_GET['view']!='hot'}-->
							<h1 class="et xi2">
							<!--{if $day=='yesterday'}-->{lang yesterday}<!--{elseif $day=='today'}-->{lang today}<!--{else}-->$day<!--{/if}-->
							</h1>
						<!--{/if}-->

						<ul class="el myel">
						<!--{loop $values $value}-->
							<!--{subtemplate home/space_feed_li}-->
						<!--{/loop}-->
						</ul>
                     </div>   
					<!--{/loop}-->
                
			<!--{elseif $feed_users}-->
				<!--{loop $feed_users $day $users}-->
                <div class="feed">
				<h1 class="et xi2">
				<!--{if $day=='yesterday'}-->{lang yesterday}<!--{elseif $day=='today'}-->{lang today}<!--{else}-->$day<!--{/if}-->
				</h1>
				<!--{loop $users $user}-->
				<!--{eval $daylist = $feed_list[$day][$user[uid]];}-->
				<!--{eval $morelist = $more_list[$day][$user[uid]];}-->
				<div class="ecs">
					<div class="avatar">
						<!--{if $user[uid]}-->
						<a href="home.php?mod=space&uid=$user[uid]" target="_blank" c="1"><!--{avatar($user[uid],small)}--></a>
						<!--{else}-->
						<img src="{IMGDIR}/systempm.png" alt="" />
						<!--{/if}-->
					</div>					
						<ul class="el">
						<!--{loop $daylist $value}-->
							<!--{subtemplate home/space_feed_li}-->
						<!--{/loop}-->
						</ul>					
				</div>
				<!--{/loop}-->
                </div>
				<!--{/loop}-->                
                
			<!--{else}-->            
			<div class="wmt">{lang no_feed}</div>
			<!--{/if}-->            

 <!--{if $multi}--><div class="pgbox">$multi</div><!--{/if}-->			

</div>
<!--{subtemplate common/footer}-->