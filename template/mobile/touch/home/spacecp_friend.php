<?php exit;?>
<!--{subtemplate common/header}-->
<script>SetWebTitle("{lang friends}<!--{if $op == 'find'}-->-{lang people_might_know}<!--{elseif $op == 'request'}-->-{lang friend_request}<!--{elseif $op == 'group'}-->-{lang set_friend_group}<!--{elseif $op=='changegroup'}-->-{lang set_friend_group}<!--{elseif $op=='add2'}-->	-{lang approval_the_request}<!--{elseif $op =='ignore'}-->-{lang lgnore_friend}<!--{elseif $op=='add'}-->-{lang add_friend}<!--{/if}-->");SetTopLeftNav("backpage");</script>

<div id="tabox" class="tabox box_bg">
    <div class="hd">
<!--{if empty($_G['setting']['sessionclose'])}-->
        <ul class="tab4">
            <li class="{if $a_actives[me]}on{/if}"><a href="home.php?mod=space&do=friend">{echo m_lang('mfriendall')}</a></li>
            <li class="{if $a_actives[onlinefriend]}on{/if}"><a href="home.php?mod=space&do=friend&view=online&type=friend">{echo m_lang('mfriendol')}</a></li>
            <li class="{if $a_actives[blacklist]}on{/if}"><a href="home.php?mod=space&do=friend&view=blacklist">{echo m_lang('mfriendbl')}</a></li>
            <li class="{if $actives[request]}on{/if}"><a href="home.php?mod=spacecp&ac=friend&op=request">{echo m_lang('mfriendrq')}</a></li>
        </ul>
<!--{else}-->
        <ul class="tab3">
            <li class="{if $a_actives[me]}on{/if}"><a href="home.php?mod=space&do=friend">{echo m_lang('mfriendall')}</a></li>
            <li class="{if $a_actives[blacklist]}on{/if}"><a href="home.php?mod=space&do=friend&view=blacklist">{echo m_lang('mfriendbl')}</a></li>
            <li class="{if $actives[request]}on{/if}"><a href="home.php?mod=spacecp&ac=friend&op=request">{echo m_lang('mfriendrq')}</a></li>
        </ul>
<!--{/if}-->
    </div>
</div>

		<!--{if $op =='ignore'}-->

            <div class="ftfm_s bm_c box_bg">
			<div class="wmt">{lang determine_lgnore_friend}</div>
            <form method="post" autocomplete="off" id="friendform_{$uid}" name="friendform_{$uid}" action="home.php?mod=spacecp&ac=friend&op=ignore&uid=$uid&confirm=1" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
				<input type="hidden" name="referer" value="{echo dreferer()}">
				<input type="hidden" name="friendsubmit" value="true" />
				<input type="hidden" name="formhash" value="{FORMHASH}" />
				<input type="hidden" name="from" value="$_GET[from]" />
				<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
				
				<div class="mtm mbm">
					<button type="submit" name="friendsubmit_btn" class="btn_default btn_submit" value="true">{lang determine}</button>
				</div>
			</form>
            </div>
			<script type="text/javascript">
				function succeedhandle_{$_GET[handlekey]}(url, msg, values) {
					if(values['from'] == 'notice') {
						deleteQueryNotice(values['uid'], 'pendingFriend');
					} else if(typeof friend_delete == 'function') {
						friend_delete(values['uid']);
					}
				}
			</script>            
            
		<!--{elseif $op=='changegroup'}-->

			<div class="ftfm_group bm_c box_bg">
            <form method="post" autocomplete="off" id="changegroupform_{$uid}" name="changegroupform_{$uid}" action="home.php?mod=spacecp&ac=friend&op=changegroup&uid=$uid" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
				<input type="hidden" name="referer" value="{echo dreferer()}">
				<input type="hidden" name="changegroupsubmit" value="true" />
				<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
				<input type="hidden" name="formhash" value="{FORMHASH}" />
					<table><tr>
					<!--{eval $i=0;}-->
					<!--{loop $groups $key $value}-->
					<td style="padding:15px 15px 0 0;"><label><input type="radio" name="group" value="$key"$groupselect[$key] /> $value</label></td>
					<!--{if $i%2==1}--></tr><tr><!--{/if}-->
					<!--{eval $i++;}-->
					<!--{/loop}-->
					</tr></table>
				<div class="mtm mbm">
					<button type="submit" name="changegroupsubmit_btn" class="btn_default btn_submit" value="true"><strong>{lang determine}</strong></button>
                </div>
			</form>
            </div>
			<script type="text/javascript">
				function succeedhandle_$_GET[handlekey](url, msg, values) {
					friend_changegroup(values['gid']);
				}
			</script>
            		
            
		<!--{elseif $op=='request'}-->

				<!--{if $list}-->
				<div class="wmt">
					<a href="home.php?mod=spacecp&ac=friend&op=addconfirm&key=$space[key]">{lang confirm_all_applications}</a><span class="pipe">|</span><a href="home.php?mod=spacecp&ac=friend&op=ignore&confirm=1&key=$space[key]" onclick="return confirm('{lang determine_ignore_all_friends_application}');">{lang ignore_all_friends_application}</a>
				</div>
				<!--{/if}--> 
                
			<!--{if $list}-->
			<ul id="friend_ul" class="buddy box_bg">
				<!--{loop $list $key $value}-->
				<li id="friend_tbody_$value[fuid]">

								<div class="friend_avt"><a href="home.php?mod=space&uid=$value[fuid]" c="1"><!--{avatar($value[fuid],small)}--></a></div>

								<div class="friend_nm">
									<a href="home.php?mod=space&uid=$value[fuid]">$value[fusername]</a>
									<!--{if $ols[$value[fuid]]}--><img src="{IMGDIR}/ol.gif" alt="online" title="{lang online}" class="vm" /> <!--{/if}-->
									<!--{if $value['videostatus']}-->
									<img src="{IMGDIR}/videophoto.gif" alt="videophoto" class="vm" /> <span class="xg1">{lang certified_by_video}</span>
									<!--{/if}-->
                                    <span class="xg1 y"><!--{date($value[dateline], 'n-j H:i')}--></span>
								</div>
								<div id="friend_$value[fuid]" class="xg1">
										<a href="home.php?mod=spacecp&ac=friend&op=add&uid=$value[fuid]&handlekey=afrfriendhk_{$value[uid]}" id="afr_$value[fuid]" onclick="showWindow(this.id, this.href, 'get', 0);" >{lang confirm_applications}</a>
                                        <span class="pipe">|</span> <a href="home.php?mod=spacecp&ac=friend&op=ignore&uid=$value[fuid]&confirm=1&handlekey=afifriendhk_{$value[uid]}" id="afi_$value[fuid]" onclick="showWindow(this.id, this.href, 'get', 0);" >{lang ignore}</a>									
								</div>

				</li>
				<!--{/loop}-->
			</ul>
			<!--{if $multi}--><div class="pgbox">$multi</div><!--{/if}-->
			<!--{else}-->
			<div class="wmt">{lang no_new_friend_application}</div>
			<!--{/if}-->

		<!--{elseif $op=='add'}-->

			<div class="wmt">{lang view_note_message}</div>
            <div class="bm_c box_bg mtm">
            <form method="post" autocomplete="off" id="addform_{$tospace[uid]}" name="addform_{$tospace[uid]}" action="home.php?mod=spacecp&ac=friend&op=add&uid=$tospace[uid]" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
				<input type="hidden" name="referer" value="{echo dreferer()}" />
				<input type="hidden" name="addsubmit" value="true" />
				<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
				<input type="hidden" name="formhash" value="{FORMHASH}" />
					<table>
						<tr>							
							<td valign="top"><p style="padding:10px 0px;">{lang add} <strong class="xi2">{$tospace[username]}</strong> {lang add_friend_note}:</p>
								<p class="mbm"><input type="text" name="note" value="" size="35" style="width:100%" onkeydown="ctrlEnter(event, 'addsubmit_btn', 1);" /></p>
									<p><select name="gid" class="ps">
									<!--{loop $groups $key $value}-->
									<option value="$key" {if empty($space['privacy']['groupname']) && $key==1} selected="selected"{/if}>$value</option>
									<!--{/loop}-->
									</select>&nbsp;&nbsp;&nbsp;{lang friend_group}</p>
							</td>
						</tr>
					</table>
				<div class="mtm mbm">
					<button type="submit" name="addsubmit_btn" id="addsubmit_btn" value="true" class="btn_default btn_submit">{lang determine}</button>
				</div>
			</form>
            </div>
		<!--{elseif $op=='add2'}-->
			<div class="wmt">{lang approval_the_request_group}</div>
            <div class="bm_c box_bg mtm">
            <form method="post" autocomplete="off" id="addratifyform_{$tospace[uid]}" name="addratifyform_{$tospace[uid]}" action="home.php?mod=spacecp&ac=friend&op=add&uid=$tospace[uid]" {if $_G[inajax]}onsubmit="ajaxpost(this.id, 'return_$_GET[handlekey]');"{/if}>
				<input type="hidden" name="referer" value="{echo dreferer()}" />
				<input type="hidden" name="add2submit" value="true" />
				<input type="hidden" name="from" value="$_GET[from]" />
				<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
				<input type="hidden" name="formhash" value="{FORMHASH}" />					
                    <table cellspacing="0" cellpadding="0" width="90%" align="center">
						<tr>							
                            <!--{eval $i=0;}-->
                            <!--{loop $groups $key $value}-->
                            <td style="padding:5px 15px;"><label for="group_$key"><input type="radio" name="gid" id="group_$key" value="$key"$groupselect[$key] /> $value</label></td>
                            <!--{if $i%2==1}--></tr><tr><!--{/if}-->
                            <!--{eval $i++;}-->
                            <!--{/loop}-->
						</tr>
					</table>
				
				<div style="padding:5px 15px;">
					<button type="submit" name="add2submit_btn" value="true" class="btn_default btn_submit"><strong>{lang approval}</strong></button>
				</div>
                
			</form>
			<script type="text/javascript">
				function succeedhandle_$_GET[handlekey](url, msg, values) {
					if(values['from'] == 'notice') {
						deleteQueryNotice(values['uid'], 'pendingFriend');
					} else {
						myfriend_post(values['uid']);
					}
				}
			</script>
            </div>
		<!--{/if}-->

<!--{subtemplate common/footer}-->
