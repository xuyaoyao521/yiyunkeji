<?php exit;?>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/viewthread_poll.css" type="text/css" media="all">

<div id="postmessage_$post[pid]" class="postmessage">$post[message]</div>

<script type="text/javascript">
<!--{if $optiontype=='checkbox'}-->
	var max_obj = $maxchoices;
	var p = 0;
<!--{/if}-->
</script>

<form id="poll" name="poll" method="post" autocomplete="off" action="forum.php?mod=misc&action=votepoll&fid=$_G[fid]&tid=$_G[tid]&pollsubmit=yes{if $_GET[from]}&from=$_GET[from]{/if}&quickforward=yes" onsubmit="if($('post_$post[pid]')) {ajaxpost('poll', 'post_$post[pid]', 'post_$post[pid]');return false}">
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<div class="pinf">
		<p><!--{if $multiple}--><strong>{lang poll_multiple}{lang thread_poll}</strong><!--{if $maxchoices}-->: ( {lang poll_more_than} )<!--{/if}--><!--{else}--><strong>{lang poll_single}{lang thread_poll}</strong><!--{/if}--><!--{if $visiblepoll && $_G['group']['allowvote']}--> , {lang poll_after_result}<!--{/if}-->
        </p>
        <p>
        {lang poll_voterscount}
		<!--{if !$visiblepoll && ($overt || $_G['adminid'] == 1 || $thread['authorid'] == $_G['uid']) && $post['invisible'] == 0}-->
			<a href="forum.php?mod=misc&action=viewvote&tid=$_G[tid]">{lang poll_view_voters}</a>
		<!--{/if}-->
        </p>
	<!--{if $_G[forum_thread][remaintime]}-->
	<p>
		{lang poll_count_down}:
		<strong>
		<!--{if $_G[forum_thread][remaintime][0]}-->$_G[forum_thread][remaintime][0] {lang days}<!--{/if}-->
		<!--{if $_G[forum_thread][remaintime][1]}-->$_G[forum_thread][remaintime][1] {lang poll_hour}<!--{/if}-->
		$_G[forum_thread][remaintime][2] {lang poll_minute}
		</strong>
	</p>
	<!--{elseif $expiration && $expirations < TIMESTAMP}-->
	<p><strong>{lang poll_end}</strong></p>
	<!--{/if}-->
	</div>

	<div class="pcht">

        <!--{if $isimagepoll}-->
        <table summary="poll panel" cellspacing="0" cellpadding="0" width="100%">
            <!--{eval $i = 0;}-->
            <tr>
                <!--{loop $polloptions $key $option}-->
                <!--{eval $i++;}-->
                <!--{eval $imginfo=$option['imginfo'];}-->
                
                <td valign="bottom" id="polloption_$option[polloptionid]" width="50%">
                    <div class="polltd cl">
                        <!--{if $imginfo}-->
                        <a href="javascript:;" title="$imginfo[filename]" >
                            <img id="aimg_$imginfo[aid]" aid="$imginfo[aid]" src="$imginfo[small]" width="100%" onclick="window.open('$imginfo[big]')" alt="$imginfo[filename]" title="$imginfo[filename]" w="$imginfo[width]" />
                        </a>
                        <!--{else}-->
                        <a href="javascript:;" title=""><img src="{IMGDIR}/nopic.gif" width="130px" /></a>
                        <!--{/if}-->
                        <p class="mtn mbn xi2">
                            <!--{if $_G['group']['allowvote']}-->
                                <label><input class="pr" type="$optiontype" id="option_$key" name="pollanswers[]" value="$option[polloptionid]" {if $_G['forum_thread']['is_archived']}disabled="disabled"{/if} {if $optiontype=='checkbox'}onclick="poll_checkbox(this)"{else}onclick="$('pollsubmit').disabled = false"{/if} /></label>
                            <!--{/if}-->
                            $option[polloption]
                        </p>
                        <!--{if !$visiblepoll}-->
                        <div class="imgf imgf2">
                            <span class="jdt" style="width: $option[width]; background-color:#$option[color]">&nbsp;</span>
                            <p class="imgfc">
                                <span class="z<!--{if $option[votes] > 0}--> vote_fff <!--{/if}-->-->">$option[votes]{lang debate_poll}</span>
                                <span class="y">{$option[percent]}% </span>
                            </p>
                        </div>
                        <!--{/if}-->
                    </div>
                </td>
                <!--{if $key % 2 == 0 && isset($polloptions[$key])}--></tr><tr><!--{/if}-->
                <!--{/loop}-->
                <!--{if ($imgpad = $key % 2) > 0}--><!--{echo str_repeat('<td width="50%"></td>', 2 - $imgpad);}--><!--{/if}-->
            </tr>
        </table>
        
        <!--{else}-->
        <div class="ptl">
            <!--{loop $polloptions $key $option}-->
                <dl>
                    <dt>
                    <!--{if $_G['group']['allowvote']}-->
                        <input type="$optiontype" id="option_$key" name="pollanswers[]" value="$option[polloptionid]" {if $_G['forum_thread']['is_archived']}disabled="disabled"{/if}  />
                    <!--{/if}-->
                        <label for="option_$key">$key. &nbsp;$option[polloption]</label>
                    <!--{if !$visiblepoll}--><span class="pvts">$option[percent]% <em style="color:#$option[color]">($option[votes])</em></span><!--{/if}-->
                    </dt>
                    <dd>
                <!--{if !$visiblepoll}-->
                        <div class="pbg">
                            <div class="pbr" style="width: $option[width]; background-color:#$option[color]"></div>
                        </div>
                <!--{/if}-->
                    </dd>
                </dl>
            <!--{/loop}-->
        </div>
        <!--{/if}-->
        <div class="thread_btn"><button class="btn_default" type="submit" name="pollsubmit" id="pollsubmit" value="true"{if $post['invisible'] < 0} disabled="disabled"{/if}><span>{lang submit}</span></button></div>
        <div class="warning">
        <!--{if $_G['group']['allowvote'] && !$_G['forum_thread']['is_archived']}-->
            <!--{if $overt}-->
                ({lang poll_msg_overt})
            <!--{/if}-->
        <!--{elseif !$allwvoteusergroup}-->
            {lang poll_msg_allwvoteusergroup}
        <!--{elseif !$allowvotepolled}-->
            {lang poll_msg_allowvotepolled}
        <!--{elseif !$allowvotethread}-->
            {lang poll_msg_allowvotethread}
        <!--{/if}-->
        </div>
		
	</div>
</form>
