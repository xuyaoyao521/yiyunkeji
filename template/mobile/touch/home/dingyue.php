<?php exit;?>
<!--{template common/header}-->

 <!--{template ceo/toutiao2}-->
 <script>SetWebTitle("我的订阅");SetTopLeftNav("home_backpage");
$("#top_nav").remove();
$(".toptb").css("height","45px");
</script>
  <!--{if $dycount<=0}-->
				<div class="NO_data">
                暂无订阅
                </div>
			<!--{else}-->
  <ul class="mobile_subscribe">
  <!--{loop $dylist $list}-->
	<li><a href="home.php?mod=auther&uid=$list[uid]"><div class="pic"><img src="uc_server/avatar.php?uid=$list[uid]&size=middle"><span>$list['count']</span></div><div class="info"><p>$list[username]<span>$list[dateline]</span></p><p>$list[jianjie]</p></div></a></li>
     <!--{/loop}-->
   
</ul>
 <!--{/if}-->
<!--{template common/footer}-->
