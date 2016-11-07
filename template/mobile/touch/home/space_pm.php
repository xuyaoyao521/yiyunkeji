<?php exit;?>
<!--{eval $_G['home_tpl_titles'] = array('{lang pm}');}-->
<!--{template common/header}-->
<script>SetWebTitle("<!--{if in_array($_GET[subop], array('view'))}--><!--{if $membernum >= 2 && $subject}-->{$membernum}{lang pm_members_message}:{echo cutstr($subject,4)}<!--{elseif $tousername}-->{lang pm_with}{$tousername}{lang pm_totail}<!--{/if}--><!--{else}-->{lang mypm}<!--{/if}-->");SetTopLeftNav("home_backpage");</script>

	<!-- header start -->
<div id="tabox" class="tabox box_bg">
    <div class="hd">
        <ul class="tab2">
            <li class="{if $_GET[do]}on{/if}"><a href="home.php?mod=space&do=pm">{lang pm}</a></li>
            <li class="{if $_GET[ac]}on{/if}"><a href="home.php?mod=spacecp&ac=pm">{lang send_pm}</a></li>
        </ul>
    </div>
</div>
	<!-- header end -->
<!--{if in_array($filter, array('privatepm')) || in_array($_GET[subop], array('view'))}-->

	<!--{if in_array($filter, array('privatepm'))}-->

	<!-- main pmlist start -->
	<div class="pmbox">
		<ul>
			<!--{loop $list $key $value}-->
			<li>
			<div class="avatar_img"><img style="height:32px;width:32px;" src="<!--{if $value[pmtype] == 2}-->{STATICURL}image/common/grouppm.png<!--{else}--><!--{avatar($value[touid] ? $value[touid] : ($value[lastauthorid] ? $value[lastauthorid] : $value[authorid]), small, true)}--><!--{/if}-->" /></div>
				<a href="{if $value[touid]}home.php?mod=space&do=pm&subop=view&touid=$value[touid]{else}home.php?mod=space&do=pm&subop=view&plid={$value['plid']}&type=1{/if}">
					<div class="cl">
						<!--{if $value[new]}--><span class="num">$value[pmnum]</span><!--{/if}-->
						<!--{if $value[touid]}-->
							<!--{if $value[msgfromid] == $_G[uid]}-->
								<span class="name">{lang me}{lang you_to} {$value[tousername]}{lang say}:</span>
							<!--{else}-->
								<span class="name">{$value[tousername]} {lang you_to}{lang me}{lang say}:</span>
							<!--{/if}-->
						<!--{elseif $value['pmtype'] == 2}-->
							<span class="name">{lang chatpm_author}:$value['firstauthor']</span>
						<!--{/if}-->
					</div>
					<div class="cl grey">
						<span class="time"><!--{date($value[dateline], 'u')}--></span>
						<span><!--{if $value['pmtype'] == 2}-->[{lang chatpm}]<!--{if $value[subject]}-->$value[subject]<br><!--{/if}--><!--{/if}--><!--{if $value['pmtype'] == 2 && $value['lastauthor']}--><div style="padding:0 0 0 20px;">......<br>$value['lastauthor'] : $value[message]</div><!--{else}-->$value[message]<!--{/if}--></span>
					</div>
				</a>
			</li>
			<!--{/loop}-->
		</ul>
	</div>
	<!-- main pmlist end -->

    <!--{elseif in_array($_GET[subop], array('view'))}-->

	<!-- main viewmsg_box start -->
	<div class="bm_c box_bg">
        <!--{if !$list}-->
            {lang no_corresponding_pm}
        <!--{else}-->
            <div class="msgbox">
            <!--{loop $list $key $value}-->
                <!--{subtemplate home/space_pm_node}-->
            <!--{/loop}-->
            <!--{if $multi}-->
            <div class="pgbox pgbox_b">$multi</div>
            <!--{/if}-->
            </div>
        <!--{/if}-->
		<!--{if $list}-->
        <div class="pm_reply">
            <form id="pmform" class="pmform" name="pmform" method="post" action="home.php?mod=spacecp&ac=pm&op=send&pmid=$pmid&daterange=$daterange&pmsubmit=yes&mobile=2" >
			<input type="hidden" name="formhash" value="{FORMHASH}" />
			<!--{if !$touid}-->
			<input type="hidden" name="plid" value="$plid" />
			<!--{else}-->
			<input type="hidden" name="touid" value="$touid" />
			<!--{/if}-->
			<div><input type="text" value="" class="px" autocomplete="off" id="replymessage" name="message"></div>
			<div class="reply"><input type="button" name="pmsubmit" id="pmsubmit" class="formdialog btn_default" value="{lang reply}" /></div>
            </form>

        </div>
		<!--{/if}-->
	</div>
	<!-- main viewmsg_box end -->

	<!--{/if}-->

<!--{else}-->
	<div class="bm_c box_bg">
		{lang user_mobile_pm_error}
	</div>
<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
