<?php exit;?>
<li class="bt">

	<div class="cl">
      <p class="mbn xg1 xi3">        
	<!--{if $value[uid] && empty($_G['home']['tpl'][hidden_more])}-->
	<a href="home.php?mod=spacecp&ac=feed&op=menu&feedid=$value[feedid]" class="y">({lang delete})</a>
	<!--{/if}-->       
		
		$value[title_template]  
		<!--{if $value[new]}-->
		<span style="color:red;">New</span> 
		<!--{/if}-->
		<span class="xg1"><!--{date($value[dateline], 'u')}--></span>
        </p>
	
		<div class="ec">

			<!--{if empty($_G['home']['tpl'][hidden_hot]) && $value[hot]}-->
			<a href="home.php?mod=spacecp&ac=feed&feedid=$value[feedid]"><em>$value[hot]</em>{lang join_immediately}</a>
			<!--{/if}-->

			<!--{if $value['image_1']}-->
			<img src="$value[image_1]" />
			<!--{/if}-->
			<!--{if $value['image_2']}-->
			<img src="$value[image_2]" />
			<!--{/if}-->
			<!--{if $value['image_3']}-->
			<img src="$value[image_3]" />
			<!--{/if}-->
			<!--{if $value['image_4']}-->
			<img src="$value[image_4]" />
			<!--{/if}-->

			<!--{if $value['body_template']}-->
		  <div class="mess">$value[body_template]</div>
			<!--{/if}-->

			<!--{if !empty($value['body_data']['flashvar'])}-->
				<!--{if !empty($value['body_data']['imgurl'])}-->
				<table class="mtm" title="{lang click_play}" onclick="javascript:showFlash('{$value['body_data']['host']}', '{$value['body_data']['flashvar']}', this, '{$value['feedid']}');"><tr><td class="vdtn hm" style="background: url($value['body_data']['imgurl']) no-repeat">
					<img src="{IMGDIR}/vds.png" />
				</td></tr></table>
				<!--{else}-->
				<img src="{IMGDIR}/vd.gif" />
				<!--{/if}-->
			<!--{elseif !empty($value['body_data']['musicvar'])}-->
			<img src="{IMGDIR}/music.gif" />
			<!--{elseif !empty($value['body_data']['flashaddr'])}-->
			<img src="{IMGDIR}/flash.gif" />
			<!--{/if}-->

			<!--{if $user_list[$value['hash_data']]}-->
			<p>{lang other_participants}:<!--{eval echo implode(', ', $user_list[$value['hash_data']]);}--></p>
			<!--{/if}-->

			<!--{if trim(str_replace('&nbsp;', '', $value['body_general']))}-->
			<div class="quote{if $value['image_1']} z{/if}"><blockquote>$value[body_general]</blockquote></div>
			<!--{/if}-->
		</div>
	</div>
</li>