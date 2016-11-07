<!--{hook/viewthread_top_mobile}-->
<script>SetWebTitle("$_G['forum']['name']");SetTopLeftNav("forum_backpage");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/viewthread.css" type="text/css" media="all">
<div class="postlist">
<ul id="alist">
    <!--{eval $postcount = 0;}-->
    <!--{loop $postlist $post}-->
	<!--{eval $needhiddenreply = ($hiddenreplies && $_G['uid'] != $post['authorid'] && $_G['uid'] != $_G['forum_thread']['authorid'] && !$post['first'] && !$_G['forum']['ismoderator']);}-->
	<!--{hook/viewthread_posttop_mobile $postcount}-->
	<!--{if !$post[first]}-->
   <div class="plc cl<!--{if !$post[first]}--> li_brb<!--{/if}-->" id="pid$post[pid]">
       <div class="display pi" href="#replybtn_$post[pid]">
		   <ul class="authi">
				<li>
                   <span class="avatar"><img src="<!--{if !$post['authorid'] || $post['anonymous']}--><!--{avatar(0, small, true)}--><!--{else}--><!--{avatar($post[authorid], small, true)}--><!--{/if}-->" /></span>
					<em class="isnumber">
						<!--{if isset($post[isstick])}-->
							<img src ="{IMGDIR}/settop.png" title="{lang replystick}" class="vm" /> {lang from} {$post[number]}{$postnostick}
						<!--{elseif $post[number] == -1}-->
							{lang recommend_post}
						<!--{else}-->
							<!--{if !empty($postno[$post[number]])}-->$postno[$post[number]]<!--{else}--> <!--{eval echo $post[number]-1;}-->{$postno[0]}<!--{/if}-->
						<!--{/if}-->
					</em>
                    <p>
					<!--{if $post['authorid'] && $post['username'] && !$post['anonymous']}-->
						<a href="home.php?mod=auther&uid=$post[authorid]"<!--{if $post[first]}--> class="author"<!--{else}--> class="author2"<!--{/if}-->>$post[author]</a>
					<!--{else}-->
						<!--{if !$post['authorid']}-->
						<a href="javascript:;">{lang guest} <em>$post[useip]{if $post[port]}:$post[port]{/if}</em></a>
						<!--{elseif $post['authorid'] && $post['username'] && $post['anonymous']}-->
						<!--{if $_G['forum']['ismoderator']}--><a href="home.php?mod=auther&uid=$post[authorid]" target="_blank">{lang anonymous}</a><!--{else}-->{lang anonymous}<!--{/if}-->
						<!--{else}-->
						$post[author] <em>{lang member_deleted}</em>
						<!--{/if}-->
					<!--{/if}-->
						<!--{if !IS_ROBOT && !$_GET['authorid'] && !$_G['forum_thread']['archiveid']}-->
                            <!--{if $post[first]}-->
                            <a href="forum.php?mod=viewthread&tid=$post[tid]&page=$page&authorid=$post[authorid]" rel="nofollow">{lang viewonlyauthorid}</a>
                            <!--{else}-->
                            <a href="forum.php?mod=viewthread&tid=$post[tid]&page=$page&authorid=$post[authorid]" rel="nofollow">{lang thread_show_author}</a>
                            <!--{/if}-->
						<!--{elseif !$_G['forum_thread']['archiveid']}-->
							<a href="forum.php?mod=viewthread&tid=$post[tid]&page=$page" rel="nofollow">{lang thread_show_all}</a>
						<!--{/if}-->
    <!--{if $_G['forum']['ismoderator']}-->
        <!-- manage start -->
        <!--{if $post[first]}-->
            <!--{if $_G['uid']}--><em><a href="home.php?mod=auther&uid=$_G[tid]" class="favbtn1 blue">{lang favorite}</a></em><!--{/if}-->
            <em><a href="#moption_$post[pid]" class="popup blue">{lang manage}</a></em>
            <div id="moption_$post[pid]" popup="true" class="manages" style="display:none;">
                <!--{if !$_G['forum_thread']['special']}-->
                <input type="button" value="{lang edit}" class="redirect btn_default" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]<!--{if $_G[forum_thread][sortid]}--><!--{if $post[first]}-->&sortid={$_G[forum_thread][sortid]}<!--{/if}--><!--{/if}-->{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
                <!--{/if}-->
                <input type="button" value="{lang delete}" class="dialog btn_default" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&operation=delete&optgroup=3&from={$_G[tid]}">
                <input type="button" value="{lang close}" class="dialog btn_default" href="forum.php?mod=topicadmin&action=moderate&fid={$_G[fid]}&moderate[]={$_G[tid]}&from={$_G[tid]}&optgroup=4">
                <input type="button" value="{lang admin_banpost}" class="dialog btn_default" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
                <input type="button" value="{lang topicadmin_warn_add}" class="dialog btn_default" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&topiclist[]={$_G[forum_firstpid]}">
            </div>
        <!--{else}-->
            <em><a href="#moption_$post[pid]" class="popup blue">{lang manage}</a></em>
            <div id="moption_$post[pid]" popup="true" class="manages" style="display:none;">
                <input type="button" value="{lang edit}" class="redirect btn_default" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page">
                <!--{if $_G['group']['allowdelpost']}--><input type="button" value="删除" class="dialog btn_default" href="forum.php?mod=topicadmin&action=delpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
                <!--{if $_G['group']['allowbanpost']}--><input type="button" value="屏蔽" class="dialog btn_default" href="forum.php?mod=topicadmin&action=banpost&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
                <!--{if $_G['group']['allowwarnpost']}--><input type="button" value="警告" class="dialog btn_default" href="forum.php?mod=topicadmin&action=warn&fid={$_G[fid]}&tid={$_G[tid]}&operation=&optgroup=&page=&topiclist[]={$post[pid]}"><!--{/if}-->
            </div>
        <!--{/if}-->
        <!-- manage end -->					
    <!--{/if}-->				
                    </p>
                    <p>
                    $post[dateline]
        <!--{if $post[first]}-->
                    <em class="y"><i class="iconfont">&#xe92a;</i></span> $_G[forum_thread][allreplies]</em>
                    <em class="y"><i class="iconfont">&#xe92e;</i></span> $_G[forum_thread][views]</em>
        <!--{/if}-->
                    </p>
				</li>
				
            </ul>
            
			<div class="message<!--{if !$post[first]}--> message_pl<!--{/if}-->">
            <!--{if $post['first']}--><!--{if $_G['forum_thread']['replycredit'] > 0 || $rushreply}-->
            <div class="thread_info">
            <dl>
            	<dt>
                <strong>{$_G['forum_thread']['replycredit']} {$_G['setting']['extcredits'][$_G[forum_thread][replycredit_rule][extcreditstype]][unit]}{$_G['setting']['extcredits'][$_G[forum_thread][replycredit_rule][extcreditstype]][title]}</strong>
                </dt>
                <dd>
                {lang thread_replycredit_tips1} {lang thread_replycredit_tips2}<!--{if $_G['forum_thread']['replycredit_rule'][random] > 0}--><span class="xg1">{lang thread_replycredit_tips3}</span><!--{/if}-->
                </dd>
            </dl>
            </div>
            <!--{/if}--><!--{/if}-->
                	<!--{if $post['warned']}-->
                        <span class="grey quote">{lang warn_get}</span>
                    <!--{/if}-->
                    <!--{if !$post['first'] && !empty($post[subject])}-->
                        <h2><strong>$post[subject]</strong></h2>
                    <!--{/if}-->
                    <!--{if $_G['adminid'] != 1 && $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5) || $post['status'] == -1 || $post['memberstatus'])}-->
                        <div class="grey quote">{lang message_banned}</div>
                    <!--{elseif $_G['adminid'] != 1 && $post['status'] & 1}-->
                        <div class="grey quote">{lang message_single_banned}</div>
                    <!--{elseif $needhiddenreply}-->
                        <div class="grey quote">{lang message_ishidden_hiddenreplies}</div>
                    <!--{elseif $post['first'] && $_G['forum_threadpay']}-->
						<!--{template forum/viewthread_pay}-->
					<!--{else}-->

                    	<!--{if $_G['setting']['bannedmessages'] & 1 && (($post['authorid'] && !$post['username']) || ($post['groupid'] == 4 || $post['groupid'] == 5))}-->
                            <div class="grey quote">{lang admin_message_banned}</div>
                        <!--{elseif $post['status'] & 1}-->
                            <div class="grey quote">{lang admin_message_single_banned}</div>
                        <!--{/if}-->
                        <!--{if $post['first'] &&  $_G['forum_thread']['price'] > 0 && $_G['forum_thread']['special'] == 0}-->
                        <div class="locked">
                            {lang pay_threads}: <strong>$_G[forum_thread][price] {$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][unit]}{$_G['setting']['extcredits'][$_G['setting']['creditstransextra'][1]][title]} </strong><em class="y"><a href="forum.php?mod=misc&action=viewpayments&tid=$_G[tid]" >{lang pay_view}</a></em>
                        </div>
                        <!--{/if}-->

                        <!--{if $post['first'] && $threadsort && $threadsortshow && $ceo_sortopen}-->
                            <!--{template forum/viewthread_sort}-->
                        <!--{/if}-->
                        
                        <!--{if $post['first']}-->
                            <!--{if !$_G[forum_thread][special]}-->
                                $post[message]
                            <!--{elseif $_G[forum_thread][special] == 1}-->
                                <!--{template forum/viewthread_poll}-->
                            <!--{elseif $_G[forum_thread][special] == 2}-->
                                <!--{template forum/viewthread_trade}-->
                            <!--{elseif $_G[forum_thread][special] == 3}-->
                                <!--{template forum/viewthread_reward}-->
                            <!--{elseif $_G[forum_thread][special] == 4}-->
                                <!--{template forum/viewthread_activity}-->
                            <!--{elseif $_G[forum_thread][special] == 5}-->
                                <!--{template forum/viewthread_debate}-->
                            <!--{elseif $threadplughtml}-->
                                $threadplughtml
                                $post[message]
                            <!--{else}-->
                            	$post[message]
                            <!--{/if}-->
                        <!--{else}-->
                            $post[message]
                        <!--{/if}-->                       

					<!--{/if}-->
                <!--{if $_G['setting']['mobile']['mobilesimpletype'] == 0 || !$post[first]}-->
                <!--{if $post['attachment']}-->
                   <div class="grey quote">
                   {lang attachment}: <em><!--{if $_G['uid']}-->{lang attach_nopermission}<!--{else}-->{lang attach_nopermission_login}<!--{/if}--></em>
                   </div>
                <!--{elseif $post['imagelist'] || $post['attachlist']}-->
                   <!--{if $post['imagelist']}-->
                    <!--{if count($post['imagelist']) == 1}-->
                    <ul class="img_list cl vm">{echo showattach($post, 1)}</ul>
                    <!--{else}-->
                    <ul class="img_list cl vm">{echo showattach($post, 1)}</ul>
                    <!--{/if}-->
                    <!--{/if}-->
                    <!--{if $post['attachlist']}-->
                    <ul>{echo showattach($post)}</ul>
                    <!--{/if}-->
                <!--{/if}-->
                <!--{/if}-->
			</div>
                
                <!--{if $_G[uid] && $allowpostreply && !$post[first]}-->
                <div class="replybtn">
                    <!--{if $_G['forum_thread']['special'] == 3 && ($_G['forum']['ismoderator'] && (!$_G['setting']['rewardexpiration'] || $_G['setting']['rewardexpiration'] > 0 && ($_G[timestamp] - $_G['forum_thread']['dateline']) / 86400 > $_G['setting']['rewardexpiration']) || $_G['forum_thread']['authorid'] == $_G['uid']) && $post['authorid'] != $_G['forum_thread']['authorid'] && $post['first'] == 0 && $_G['uid'] != $post['authorid'] && $_G['forum_thread']['price'] > 0}-->
                    <button type="button" class="btn_default" onclick="setanswer($post['tid'], $post['pid'], '$_GET[from]')"><i class="iconfont flipy">&#xf609;</i>{lang reward_set_bestanswer}</button>
                    <!--{/if}-->
					<!--{if (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))}-->
						<a href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page"><i class="iconfont">&#xf60f;</i></a>
					<!--{elseif $_G['uid'] && $post['authorid'] == $_G['uid'] && $_G['setting']['postappend']}-->
						<a href="forum.php?mod=misc&action=postappend&tid=$post[tid]&pid=$post[pid]&extra=$_GET[extra]&page=$page" onClick="showWindow('postappend', this.href, 'get', 0)"><i class="iconfont">&#xf60f;</i></a>
					<!--{/if}-->
                    <a href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$post[pid]&extra=$_GET[extra]&page=$page" value=""><i class="iconfont">&#xf637;</i></a>
					<a href="forum.php?mod=misc&action=postreview&do=support&tid=$_G[tid]&pid=$post[pid]&hash={FORMHASH}"><i class="iconfont">&#xf661;</i><!--{if $post[postreview][support]}--><span id="review_support_$post[pid]">$post[postreview][support]</span><!--{/if}--></a>
                </div>
                <!--div class="replybtn">
					<<!--{if (($_G['forum']['ismoderator'] && $_G['group']['alloweditpost'] && (!in_array($post['adminid'], array(1, 2, 3)) || $_G['adminid'] <= $post['adminid'])) || ($_G['forum']['alloweditpost'] && $_G['uid'] && ($post['authorid'] == $_G['uid'] && $_G['forum_thread']['closed'] == 0) && !(!$alloweditpost_status && $edittimelimit && TIMESTAMP - $post['dbdateline'] > $edittimelimit)))}-->
						<button type="button" class="btn_default" href="forum.php?mod=post&action=edit&fid=$_G[fid]&tid=$_G[tid]&pid=$post[pid]{if !empty($_GET[modthreadkey])}&modthreadkey=$_GET[modthreadkey]{/if}&page=$page"><i class="iconfont">&#xf60f;</i><!--{if $_G['forum_thread']['special'] == 2 && !$post['message']}-->{lang post_add_aboutcounter}<!--{else}-->{lang edit}<!--{/if}--></button>
					<!--{elseif $_G['uid'] && $post['authorid'] == $_G['uid'] && $_G['setting']['postappend']}-->
						<button type="button" class="btn_default"  href="forum.php?mod=misc&action=postappend&tid=$post[tid]&pid=$post[pid]&extra=$_GET[extra]&page=$page" onClick="showWindow('postappend', this.href, 'get', 0)"><i class="iconfont">&#xf60f;</i>{lang postappend}</button>
					<!--{/if}-->
                    <button type="button" class="btn_default" href="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&repquote=$post[pid]&extra=$_GET[extra]&page=$page" value=""><i class="iconfont">&#xf637;</i>{lang reply}</button>
					<!--{if !$_G['forum_thread']['special'] && !$rushreply && !$hiddenreplies && $_G['setting']['repliesrank'] && !$post['first'] && !($post['isWater'] && $_G['setting']['filterednovote'])}-->
					<button type="button" class="btn_default" href="forum.php?mod=misc&action=postreview&do=support&tid=$_G[tid]&pid=$post[pid]&hash={FORMHASH}"><i class="iconfont">&#xf661;</i>{lang support_reply} <span id="review_support_$post[pid]">$post[postreview][support]</span></button>
					<button type="button" class="btn_default" href="forum.php?mod=misc&action=postreview&do=against&tid=$_G[tid]&pid=$post[pid]&hash={FORMHASH}"><i class="iconfont flipy">&#xf661;</i>{lang against_reply} <span id="review_against_$post[pid]">$post[postreview][against]</span></button>
					<!--{/if}-->
                </div>-->
                <!--{/if}-->     

              
        <!--{if $post['first'] && ($post[tags] || $relatedkeywords) && $_GET['from'] != 'preview'}-->
        <div class="tags mbm"> 
          <!--{if $post[tags]}--> 
              <!--{eval $tagi = 0;}--> 
              <!--{loop $post[tags] $var}--> 
              <a title="$var[1]" href="misc.php?mod=tag&id=$var[0]" target="_blank">$var[1]</a> 
              <!--{eval $tagi++;}--> 
              <!--{/loop}--> 
          <!--{/if}--> 
        </div>
        <!--{/if}--> 

<!--{if $post['first']}-->
<script>
<!--{eval}-->
$php_uri = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$php_self = substr($php_uri,0,strrpos($php_uri,'/')+1);
$bd_message = cutstr(reg_china_codeing($post[message]),160);
$bdimg_url = '';
if($post[attachments]) {
	$attch = current($post[attachments]);
	$bdimg_url = $php_self . $attch[url] . $attch[attachment];
}
<!--{/eval}-->
function WeiXinShareBtn() { 
	if (typeof WeixinJSBridge == "undefined") { 
		popup.open('{echo m_lang('share_weixin_alert')}', 'alert');
	} else { 
		WeixinJSBridge.invoke('shareTimeline', { 
			"title": "$post[subject]", 
			"link": "$php_uri", 
			"desc": "$bd_message", 
			"img_url": "$bdimg_url" 
		}); 
	} 
}
</script>
<!--{/if}-->
        
     

        </div>
       
   </div>
    <!--{subtemplate forum/ceo_relateitems}-->
  
 
   <!--{hook/viewthread_postbottom_mobile $postcount}-->
   <!--{eval $postcount++;}-->
   <!--{/if}-->
   <!--{/loop}-->
</ul>   

<div id="ajaxtag"></div>
<div id="post_new"></div>
<!--{if $ceo_norepages > 1}-->    
    <!--{if $_G['forum_thread']['replies'] > $_G['ppp']}-->
	<script type="text/javascript">
    var url = 'forum.php?mod=viewthread&tid=$_G[tid]&extra=$_GET[extra]&ordertype={if $ordertype != 1}2{else}1{/if}&threads=thread&mobile=2';
    var pages=$_G['page'];
    var allpage={echo $thispage = ceil($_G['forum_thread']['replies'] / $_G['ppp']);};
    </script>
    <!--{template common/ceo_ajaxpage}--> 
    <!--{/if}-->
<!--{else}-->
    <!--{if $multipage}--><div class="pgbox">$multipage</div><!--{/if}-->
<!--{/if}-->
</div>
<div class="content"><!--{subtemplate forum/forumdisplay_fastpost}--></div>
<form method="post" autocomplete="off" name="modactions" id="modactions">
	<input type="hidden" name="formhash" value="{FORMHASH}" />
	<input type="hidden" name="optgroup" />
	<input type="hidden" name="operation" />
	<input type="hidden" name="listextra" value="$_GET[extra]" />
	<input type="hidden" name="page" value="$page" />
</form>
<!--{template common/share}-->