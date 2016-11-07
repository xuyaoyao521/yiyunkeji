<?php exit;?>
<!--{if $_GET['mycenter'] && !$_G['uid']}-->
	<!--{eval dheader('Location:member.php?mod=logging&action=login');exit;}-->
<!--{/if}-->
<!--{template common/header}-->
<!-- header start -->

<style>header { display:none; }.toptb { display:none; }</style>

<!-- header end -->
<!-- userinfo start -->
<div class="user_header userinfo_bg">
    <div class="top">
        <div class="z backpage"><a href="javascript:history.back(-1)" class="z"><i class="iconfont i_backpage">&#xe844;</i></a></div>
        <!--{if $_G['uid'] == $space[uid]}-->
        <div class="y not"><a href="home.php?mod=space&do=notice"><i class="iconfont i_notice">&#xf62f;</i>{if $_G[member][newprompt]}<span></span>{/if}</a></div>
        <!--{else}-->
        <div class="y mods">
             <!--{if !$isfriend}--><a href="home.php?mod=spacecp&ac=friend&op=add&uid=$space[uid]&handlekey=addfriendhk_{$space[uid]}" class="tag_bg t0">{lang add_friend}</a><!--{else}--><a href="home.php?mod=spacecp&ac=friend&op=ignore&uid=$space[uid]&handlekey=ignorefriendhk_{$space[uid]}" class="tag_bg t1">{lang ignore_friend}</a><!--{/if}--><!--{if $_G['group']['allowbanuser']}--><a href="forum.php?mod=modcp&action=member&op=ban&uid={$space[uid]}" class="tag_bg t3">{lang ban_member}</a><!--{/if}-->	
        </div>
        
        <!--{/if}-->
    </div> 
    <div class="userinfo">
        <div class="z user_avt"><img src="<!--{avatar($space[uid], middle, true)}-->" /></div>
        <div class="z user_item">
            <h2 class="user_name">$space[username]
                <!--{if $space[uid] != $_G[uid]}--><a href="home.php?mod=spacecp&ac=pm&touid={$space[uid]}" class="tag_bg t2">{lang send_pm}</a><!--{/if}-->	
            </h2>
            <div class="user_group">
                <span>{$space[group][grouptitle]}{$space[group][icon]}:{lang usergroup}</span>
                <span>{lang space_visits}:$space[views]</span>
            </div>
        </div>
    </div>
    <div class="user_ext">
        <span>{lang credits}:$space[credits]</span>
        <!--{loop $_G[setting][extcredits] $key $value}-->
        <!--{if $value[title]}-->
        <span>$value[title]:{$space["extcredits$key"]} $value[unit]</span>
        <!--{/if}-->
        <!--{/loop}-->
    </div>
</div>

<!--{if $_G['uid'] == $space[uid]}-->
<div class="user_box box_bg">
    <ul class="row">
        <li><a href="home.php?mod=space&do=pm"{if $_G[member][newpm]} class="xi1"{/if}><i class="iconfont i_pm">&#xf637;</i><!--{if $_G[member][newpm]}-->{lang new_pm}<!--{else}-->{lang pm_center}<!--{/if}--></a></li>
    <li><a href="home.php?mod=space&do=friend"><i class="iconfont i_friend">&#xf61e;</i>{echo m_lang('mfriend')}</a></li>
        <li><a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=forum"><i class="iconfont i_favorite">&#xf60a;</i>{echo m_lang('favorite')}</a></li>
    </ul>
</div>
<!--{/if}-->

<section>
<div class="user_box box_bg box_brb">
    <ul class="cell">
		<!--{if helper_access::check_module('follow')}-->
		<li><a href="home.php?mod=follow&uid=$space[uid]&do=view&from=space">{lang follow}<i></i></a></li>
		<!--{/if}-->
    <!--{if $_G['setting']['allowviewuserthread'] !== false}-->
        <li><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=thread&from=space">{echo m_lang('mthreads')}<span>$space[threads]</span><i></i></a></li>
    <!--{/if}-->
    <!--{if helper_access::check_module('feed')}-->
        <li><a href="home.php">{echo m_lang('mfeed')}<i></i></a></li>
    <!--{/if}-->
    <!--{if helper_access::check_module('blog')}-->
        <li><a href="home.php?mod=space&uid=$space[uid]&do=blog&view=me">{echo m_lang('mblog')}<span>$space[blogs]</span><i></i></a></li>
    <!--{/if}-->
    <!--{if helper_access::check_module('doing')}-->
        <li><a href="home.php?mod=space&uid=$space[uid]&do=doing&view=me">{echo m_lang('mdoing')}<span>$space[doings]</span><i></i></a></li>
    <!--{/if}-->
    <!--{if helper_access::check_module('album')}-->
        <li><a href="home.php?mod=space&uid=$space[uid]&do=album&view=me"><i></i>{echo m_lang('photo')}<span>$space[albums]</span><i></i></a></li>
    <!--{/if}-->
    </ul>
</div>
</section>

<section>
<div class="user_box box_bg box_br mtm">
    <ul class="cell cell2">
        <!--{if $space[uid] == $_G[uid]}--><li><span>{$space[uid]}</span>UID</li><!--{/if}-->
        <!--{if in_array($_G[adminid], array(1, 2))}--><li><span>$space[email]</span>Email</li><!--{/if}-->            
        <!--{loop $profiles $value}-->
        <li><span>$value[value]</span>$value[title]</li>
        <!--{/loop}-->
    </ul>
</div>    
</section>

<section>
<div class="user_box box_bg box_br mtm">
    <ul class="cell cell2">
    <!--{if $space[adminid]}-->
        <li><span>{$space[admingroup][grouptitle]} {$space[admingroup][icon]}</span>{lang management_team}</li>
    <!--{/if}-->
    <!--{if $space[extgroupids]}-->
        <li><span>$space[extgroupids]</span>{lang group_expiry_type_ext}</li>
    <!--{/if}-->
        <li><span>$space[oltime] {lang hours}</span>{lang online_time}</li>
        <li><span>$space[regdate]</span>{lang regdate}</li>
        <li><span>$space[lastvisit]</span>{lang last_visit}</li>
    <!--{if $space[uid] == $_G[uid]}-->
        <!--{if $_G[uid] == $space[uid] || $_G[group][allowviewip]}-->
        <li><span>$space[regip] - $space[regip_loc]</span>{lang register_ip}</li>
        <li><span>$space[lastip] - $space[lastip_loc]</span>{lang last_visit_ip}</li>
        <!--{/if}-->
        <li><span>$space[lastactivity]</span>{lang last_activity_time}</li>
        <li><span>$space[lastpost]</span>{lang last_post_time}</li>
        <li><span>$space[lastsendmail]</span>{lang last_send_email}</li>
        <li style="border-bottom:none;"><span>
            <!--{eval $timeoffset = array({lang timezone});}-->
            $timeoffset[$space[timeoffset]]
        </span>{lang time_offset}</li>            
    <!--{/if}-->
    </ul>
</div>
</section>
    
<!--{if $space['uid'] == $_G['uid']}-->
<div class="btn_exit mtn mbm"><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}" class="btn_default btn_w100">{lang logout_mobile}</a></div>
<!--{/if}-->
<!-- userinfo end -->

<!--{template common/footer}-->
