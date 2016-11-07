<?php exit;?>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/viewthread_activity.css" type="text/css" media="all">

<div class="act_info">
	<!--{if $activity['thumb']}--><img src="$activity['thumb']" width="100%" /><!--{else}--><img src="{IMGDIR}/nopic.gif" width="230" height="230" /><!--{/if}-->
  <table cellpadding="0" cellspacing="0" class="box_bg"><tbody>
		<tr><th>{lang activity_type}:</th><td> <strong>$activity[class]</strong></td></tr>
        <tr>
        	<th>{lang activity_starttime}:</th>
        	<td>
				<!--{if $activity['starttimeto']}-->
					{lang activity_start_between}
				<!--{else}-->
					$activity[starttimefrom]
				<!--{/if}-->
			</td>
        </tr>
        <tr><th>{lang activity_space}:</th><td> $activity[place]</td></tr>
        <tr>
			<th>{lang gender}:</th>
            <td>
				<!--{if $activity['gender'] == 1}-->
					{lang male}
				<!--{elseif $activity['gender'] == 2}-->
					{lang female}
				<!--{else}-->
					 {lang unlimited}
				<!--{/if}-->
			</td>
        </tr>
        <!--{if $activity['cost']}-->
            <tr><th>{lang activity_payment}:</th><td> <span class="xi1">$activity[cost] {lang payment_unit}</span></td></tr>
        <!--{/if}-->
		<!--{if !$_G['forum_thread']['is_archived']}-->
        <tr>
			<th>{lang activity_already}:</th>
				<td><em>$allapplynum</em>{lang activity_member_unit}
				<!--{if $post['invisible'] == 0 && ($_G['forum_thread']['authorid'] == $_G['uid'] || (in_array($_G['group']['radminid'], array(1, 2)) && $_G['group']['alloweditactivity']) || ( $_G['group']['radminid'] == 3 && $_G['forum']['ismoderator'] && $_G['group']['alloweditactivity']))}-->
					<span class="xi1">{lang activity_mod}</span>
				<!--{/if}-->
                </td>
        </tr>
			<!--{if $activity['number']}-->
        <tr><th>{lang activity_about_member}:</th><td>$aboutmembers {lang activity_member_unit}</td></tr>
			<!--{/if}-->
			<!--{if $activity['expiration']}-->
				<tr><th>{lang post_closing}: </th><td>$activity[expiration]</td></tr>
			<!--{/if}-->
		<tr>
            <!--{if $post['invisible'] == 0}-->
                <th colspan="2">
                <!--{if $applied && $isverified < 2}-->
                    <span class="xg1"><!--{if !$isverified}-->{lang activity_wait}<!--{else}-->{lang activity_join_audit}<!--{/if}--></span>
                    <!--{if !$activityclose}-->
                    <!--{/if}-->
                <!--{elseif !$activityclose}-->
                    <!--{if $isverified != 2}-->
                    <!--{else}-->
                      <input value="{lang complete_data}" name="ijoin" id="ijoin" />
                    <!--{/if}-->
                <!--{/if}-->
                </th>
            <!--{/if}-->
		</tr>
		<!--{/if}-->
      </tbody></table>
</div>

<div id="postmessage_$post[pid]" class="postmessage">$post[message]</div>

<!--{if $_G['uid'] && !$activityclose && (!$applied || $isverified == 2)}-->
<div class="thread_btn"><button  class="btn_default btn_w100" onclick="showbox('join')">{lang activity_join}</button></div>
<div id="join_box" class="joinbox" style="display: none;">
  <div class="box_header">{lang activity_join}</div>
  <div class="box_content">
	<!--{if $_G['forum']['status'] == 3 && helper_access::check_module('group') && $isgroupuser != 'isgroupuser'}-->
        <p class="fp">{lang activity_no_member}<a href="forum.php?mod=group&action=join&fid=$_G[fid]" class="xi2">{lang activity_join_group}</a></p>
	<!--{else}-->
		<form name="activity" id="activity" method="post" autocomplete="off" action="forum.php?mod=misc&action=activityapplies&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if $_GET['from']}&from=$_GET['from']{/if}&mobile=2" >
			<input type="hidden" name="formhash" value="{FORMHASH}" />
        <div class="post_form_area b_f bo_t" style="margin-top:0px;">
			<!--{if $_G['setting']['activitycredit'] && $activity['credit'] && !$applied}-->
          <p class="fp">{lang activity_need_credit} $activity[credit] {$_G['setting']['extcredits'][$_G['setting']['activitycredit']][title]}</p>
            <!--{/if}-->
                <!--{if $activity['cost']}-->
                   <div class="fp fp_li"><span class="cg">{lang activity_paytype}</span>
 <label><input class="pr" type="radio" value="0" name="payment" id="payment_0" checked="checked" />{lang activity_pay_myself}</label> <label><input class="pr" type="radio" value="1" name="payment" id="payment_1" />{lang activity_would_payment}<input name="payvalue" size="3" /> {lang payment_unit} </label> </div>
                <!--{/if}-->
                <!--{if !empty($activity['ufield']['userfield'])}-->
                    <!--{loop $activity['ufield']['userfield'] $fieldid}-->
                    <!--{if $settings[$fieldid][available]}-->
<div class="fp fp_li"> <span class="cg">$settings[$fieldid][title]<i class="xi1">*</i></span>
                        $htmls[$fieldid]</div>
                    <!--{/if}-->
                    <!--{/loop}-->
                <!--{/if}-->
                <!--{if !empty($activity['ufield']['extfield'])}-->
                    <!--{loop $activity['ufield']['extfield'] $extname}-->
    <div class="fp fp_li"><span class="cg">$extname</span><input type="text" name="$extname" maxlength="200" class="txt" value="{if !empty($ufielddata)}$ufielddata[extfield][$extname]{/if}" /></div>
                    <!--{/loop}-->
                <!--{/if}-->
            <div class="fp fp_li"><span class="cg">{lang leaveword}</span><textarea name="message" maxlength="200" class="txt">$applyinfo[message]</textarea></div>
          </div>
				<!--{if $_G['setting']['activitycredit'] && $activity['credit'] && checklowerlimit(array('extcredits'.$_G['setting']['activitycredit'] => '-'.$activity['credit']), $_G['uid'], 1, 0, 1) !== true}-->
					<p class="xi1">{$_G['setting']['extcredits'][$_G['setting']['activitycredit']][title]} {lang not_enough}$activity['credit']</p>
				<!--{else}-->
					<input type="hidden" name="activitysubmit" value="true">
					<em class="xi1" id="return_activityapplies"></em>
                    <p class="tip_btn p10">
                      <button type="submit" class="btn_default" value="true" tabindex="3"><span>{lang submit}</span></button>
                      <button type="button" class="btn_default btn_reset" onclick="hidebox();">{echo m_lang('exit');}</button>
                    </p>
				<!--{/if}-->
		</form>

		<script type="text/javascript">
			function succeedhandle_activityapplies(locationhref, message) {
				showDialog(message, 'notice', '', 'location.href="' + locationhref + '"');
			}
		</script>
  </div>
</div>
	<!--{/if}-->
<!--{elseif $_G['uid'] && !$activityclose && $applied}-->
<div class="thread_btn"><button  class="btn_default btn_w100" onclick="showbox('join')">{lang activity_join_cancel}</button></div>
<div id="join_box" class="joinbox" style="display: none;">
    <div class="box_header">{lang activity_join_cancel}</div>
    <div class="box_content">
        <form name="activity" method="post" autocomplete="off" action="forum.php?mod=misc&action=activityapplies&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if $_GET['from']}&from=$_GET['from']{/if}">
        <div class="post_form_area b_f bo_t" style="margin-top:0px;">
        <input type="hidden" name="formhash" value="{FORMHASH}" />
        <p class="fp fp_li"><span class="cg">{lang leaveword}</span><input type="text" name="message" maxlength="200" class="px" value="" /></p>
        </div>
    <p class="tip_btn p10">
        <button type="submit" name="activitycancel"  class="btn_default" value="true" tabindex="3" onclick="hidebox();"><span>{lang submit}</span></button>
      <button type="button" class="btn_default btn_reset" onclick="hidebox();">{echo m_lang('exit');}</button>
    </p>
        </form>
    </div>
</div>
<!--{/if}-->
<!--{if $applylist}-->
<div class="thread_block">
  <h3 class="cc">{lang activity_new_join} ($applynumbers {lang activity_member_unit})</h3>
  <ul class="applylist" id="applylist">
        <!--{loop $applylist $apply}-->
        <li class="bo_t cl">
      	<div class="avatar"><a target="_blank" href="home.php?mod=space&uid=$apply[uid]"><!--{echo avatar($apply[uid], 'small')}--></a></div>
        <h4><a href="home.php?mod=space&uid=$apply[uid]">$apply[username]</a><span class="cg"><!--{if $activity['cost']}--><!--{if $apply[payment] >= 0}-->$apply[payment] {lang payment_unit}<!--{else}-->{lang activity_self}<!--{/if}--><!--{/if}--></span><span class="date cg">$apply[dateline]</p></h4>
        <p class="message">$apply[message]</p>
    </li>
        <!--{/loop}-->
   </ul>
</div>

<!--{/if}-->

