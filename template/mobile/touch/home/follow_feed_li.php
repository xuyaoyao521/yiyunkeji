<?php exit;?>
<!--{eval $carray = array();}-->
<!--{eval $beforeuser = 0;}-->
<!--{eval $hiddennum = 0;}-->
<!--{loop $list['feed'] $feed}-->
	<!--{eval $content = $list['content'][$feed['tid']];}-->
	<!--{eval $thread = $list['threads'][$content['tid']];}-->
	<!--{if !empty($thread) && $thread['displayorder'] >= 0 || !empty($feed['note'])}-->
	<li class="cl {if $lastviewtime && $feed[dateline] > $lastviewtime} unread{/if}" id="feed_li_$feed['feedid']" onmouseover="this.className='flw_feed_hover cl'" onmouseout="this.className='cl'">
    
		<div class="z flw_avt avatar">
			<a href="home.php?mod=space&uid=$feed[uid]"><!--{avatar($feed[uid],'small')}--></a>			
		</div>
        
		<div class="flw_article">
			<!--{if $feed[uid] == $_G[uid] || $_G['adminid'] == 1}-->
			<a href="home.php?mod=spacecp&ac=follow&feedid=$feed[feedid]&op=delete" id="c_delete_$feed['feedid']" onclick="showWindow(this.id, this.href, 'get', 0);" class="flw_delete">{lang delete}</a>
			<!--{/if}-->
			<div class="flw_author">
			<a href="home.php?mod=space&uid=$feed[uid]" c="1" shref="home.php?mod=space&uid=$feed[uid]">$feed['username']</a>
			<span class="xg1">&nbsp;<!--{eval echo dgmdate($feed['dateline'], 'u');}--></span>
			</div>
			<!--{if $feed['note']}-->
			<div class="flw_quotenote xs2 pbw">
				$feed['note']
			</div>
			<div class="flw_quote">
			<!--{/if}-->
			<!--{if !empty($thread) && $thread['displayorder'] >= 0}-->
			<h2 class="wx pbn">
				<!--{if isset($carray[$feed['cid']])}-->
				<a href="javascript:;" onclick="vieworiginal(this, 'original_content_$feed[feedid]');return false;" class="flw_readfull y xw0 xs1 xi2">+ {lang follow_open_feed}</a>
				<!--{/if}-->
				<!--{if $thread[fid] != $_G[setting][followforumid]}-->
				<a href="forum.php?mod=viewthread&tid=$content['tid']&extra=page%3D1" target="_blank">$thread['subject']</a>
				<!--{/if}-->
			</h2>

			<div class="pbm c cl" id="original_content_$feed[feedid]" {if isset($carray[$feed['cid']])} style="display: none"{/if}>
				$content['content']
				<!--{if $thread['special'] && $thread[fid] != $_G[setting][followforumid]}-->
				<br/>
				<a href="forum.php?mod=viewthread&tid=$content['tid']&extra=page%3D1" target="_blank">{lang follow_special_thread_tip}</a>
				<!--{/if}-->
			</div>
			<div class="xg1 cl">
				<!--{if $feed['note']}--><a href="home.php?mod=space&uid=$feed[uid]">$thread['author']</a> {lang follow_post_by_time} <!--{date($thread['dateline'])}-->&nbsp;<!--{/if}-->
				<!--{if $thread[fid] != $_G[setting][followforumid] && $_G['cache']['forums'][$thread['fid']]['name']}-->#<a href="forum.php?mod=forumdisplay&fid=$thread['fid']">$_G['cache']['forums'][$thread['fid']]['name']</a><!--{/if}-->
			</div>
			<!--{else}-->
			<div class="pbm c cl" id="original_content_$feed[feedid]" {if isset($carray[$feed['cid']])} style="display: none"{/if}>
			{lang follow_thread_deleted}
			</div>
			<!--{/if}-->
			<!--{if $feed['note']}--></div><!--{/if}-->
		</div>
		<div id="replybox_$feed['feedid']" class="flw_replybox cl" style="display: none; width:200px;"></div>
		<div id="relaybox_$feed['feedid']" class="flw_replybox cl" style="display: none; width:200px;"></div>
	</li>
	<!--{else}-->
		<!--{eval $hiddennum++;}-->
	<!--{/if}-->
	<!--{if !isset($carray[$feed['cid']])}-->
		<!--{eval $carray[$feed['cid']] = $feed['cid'];}-->
	<!--{/if}-->
<!--{/loop}-->
