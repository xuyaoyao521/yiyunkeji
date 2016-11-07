<?php exit;?>
<!--{subtemplate common/header}-->
<script>SetWebTitle("{lang friends}");SetTopLeftNav("home_backpage");</script>

<div id="tabox" class="tabox box_bg">
    <div class="hd">
<!--{if empty($_G['setting']['sessionclose'])}-->
        <ul class="tab4">
            <li class="{if $a_actives[me]}on{/if}"><a href="home.php?mod=space&do=friend">{echo m_lang('mfriendall')}</a></li>
            <li class="{if $a_actives[onlinefriend]}on{/if}"><a href="home.php?mod=space&do=friend&view=online&type=friend">{echo m_lang('mfriendol')}</a></li>
            <li class="{if $a_actives[blacklist]}on{/if}"><a href="home.php?mod=space&do=friend&view=blacklist">{echo m_lang('mfriendbl')}</a></li>
            <li class="{if $actives[request]}on{/if}"><a href="home.php?mod=spacecp&ac=friend&op=request">{lang friend_request}</a></li>
        </ul>
<!--{else}-->
        <ul class="tab3">
            <li class="{if $a_actives[me]}on{/if}"><a href="home.php?mod=space&do=friend">{echo m_lang('mfriendall')}</a></li>
            <li class="{if $a_actives[blacklist]}on{/if}"><a href="home.php?mod=space&do=friend&view=blacklist">{echo m_lang('mfriendbl')}</a></li>
            <li class="{if $actives[request]}on{/if}"><a href="home.php?mod=spacecp&ac=friend&op=request">{lang friend_request}</a></li>
        </ul>
<!--{/if}-->
    </div>
</div>

<!--{if $space[self]}--> 
    <!--{if $_GET['view']=='blacklist'}-->				
    <div class="ftfm box_bg mbm">
        <form method="post" autocomplete="off" name="blackform" action="home.php?mod=spacecp&ac=friend&op=blacklist&start=$_GET[start]">
            <table cellpadding="0" cellspacing="0" >
                <tr>
                    <td>{lang username}</td>
                    <th><p><input type="text" name="username" value="" size="15" style="width:150px;" /></p></th>
                    <td><button type="submit" name="blacklistsubmit_btn" id="moodsubmit_btn" value="true" class="btn_default btn_submit"><em>{lang add}</em></button></td>
                </tr>
            </table>
            <input type="hidden" name="blacklistsubmit" value="true" />
            <input type="hidden" name="formhash" value="{FORMHASH}" />
        </form>
    </div>
    <!--{/if}-->
<!--{/if}-->

    <!--{if $list}-->
        <div id="friend_ul">
            <ul class="buddy box_bg">
            <!--{loop $list $key $value}-->
                <li id="friend_{$value[uid]}_li">
                <!--{if $value[username] == ''}-->
                    <div class="friend_avt"><img src="{STATICURL}image/magic/hidden.gif" alt="{lang anonymity}" /></div>
                    <div class="friend_nm">{lang anonymity}</div>
                <!--{else}-->
                    <div class="friend_avt">
                        <a href="home.php?mod=space&uid=$value[uid]" c="1">
                            <!--{if $ols[$value[uid]]}--><em class="gol" title="{lang online} {date($ols[$value[uid]], 'H:i')}"></em><!--{/if}-->
                            <!--{avatar($value[uid],small)}-->
                        </a>
                    </div>
                    <div class="friend_nm">
                        <a href="home.php?mod=space&uid=$value[uid]" class="xi2"{eval g_color($value[groupid]);}>$value[username]</a>
                        <!--{eval g_icon($value[groupid]);}-->
                        <!--{if $value['videostatus']}-->
                            <img src="{IMGDIR}/videophoto.gif" alt="videophoto" class="vm" />
                        <!--{/if}-->                                            
                        <span class="xg1 y">
                        <!--{if $_GET['view'] == 'blacklist'}-->
                            <a href="home.php?mod=spacecp&ac=friend&op=blacklist&subop=delete&uid=$value[uid]&start=$_GET[start]">{lang delete_blacklist}</a>

                        <!--{elseif $_GET['view'] == 'online'}-->
                            <!--{date($ols[$value[uid]], 'H:i')}-->
                        <!--{else}-->
                            {lang hot}(<span id="spannum_$value[uid]">$value[num]</span>)
                        <!--{/if}-->
                        </span>
                        
                    </div>										
                <!--{/if}-->
                    <div class="xg1">
                        <!--{if isset($value['follow']) && $key != $_G['uid'] && $value[username] != ''}-->
                        <a href="home.php?mod=spacecp&ac=follow&op={if $value['follow']}del{else}add{/if}&fuid=$value[uid]&hash={FORMHASH}&from=a_followmod_" id="a_followmod_$key" onclick="showWindow('followmod', this.href, 'get', 0)"><!--{if $value['follow']}-->{lang follow_del}<!--{else}-->{lang follow_add}TA<!--{/if}--></a>
                        <!--{/if}-->
                        <!--{if $value[uid] != $_G['uid'] && $value[username] != ''}-->
                        <span class="pipe">|</span> <a href="home.php?mod=space&uid=$value[uid]&do=profile">{echo m_lang('mfriendprofile')}</a>                                            
                        <!--{/if}-->
                        <!--{if !$value[isfriend] && $value[username] != ''}-->
                        <span class="pipe">|</span><a href="home.php?mod=spacecp&ac=friend&op=add&uid=$value[uid]&handlekey=adduserhk_{$value[uid]}" id="a_friend_$key" onclick="showWindow(this.id, this.href, 'get', 0);" title="{lang add_friend}">{lang add_friend}</a>
                        <!--{elseif !in_array($_GET['view'], array('blacklist', 'visitor', 'trace', 'online'))}-->
                        <span class="pipe">|</span> <a href="home.php?mod=spacecp&ac=friend&op=changegroup&uid=$value[uid]&handlekey=editgrouphk_{$value[uid]}">{echo m_lang('mfriendgroup')}</a>
                        <span class="pipe">|</span> <a href="home.php?mod=spacecp&ac=friend&op=ignore&uid=$value[uid]&handlekey=delfriendhk_{$value[uid]}">{lang delete}</a>
                        <!--{/if}-->
                    </div>


                </li>
            <!--{/loop}-->
            </ul>
        </div>
        <!--{if $multi}--><div class="pgbox">$multi</div><!--{/if}-->

    <script type="text/javascript">
        function succeedhandle_followmod(url, msg, values) {
            var fObj = $(values['from']+values['fuid']);
            if(values['type'] == 'add') {
                fObj.innerHTML = '{lang follow_del}';
                fObj.className = 'flw_btn_unfo';
                fObj.href = 'home.php?mod=spacecp&ac=follow&op=del&fuid='+values['fuid']+'&from='+values['from'];
            } else if(values['type'] == 'del') {
                fObj.innerHTML = '{lang follow_add}TA';
                fObj.className = 'flw_btn_fo';
                fObj.href = 'home.php?mod=spacecp&ac=follow&op=add&hash={FORMHASH}&fuid='+values['fuid']+'&from='+values['from'];
            }
        }
    </script>

<!--{else}-->

    <div class="wmt">{lang count_member}</div>
    
<!--{/if}-->

<!--{subtemplate common/footer}-->
