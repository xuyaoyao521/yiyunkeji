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
           
        </div>
        
        <!--{/if}-->
    </div> 
    <div class="userinfo">
        <div class="z user_avt"><img src="<!--{avatar($space[uid], middle, true)}-->" /></div>
        <div class="z user_item">
            <h2 class="user_name">$space[username]（UID:{$space[uid]}）
         
            </h2>
            <div class="user_group">
                <span>{$space[group][grouptitle]}{$space[group][icon]}</span>
   				<span>{lang credits}:$space[credits]</span>
        <!--{loop $_G[setting][extcredits] $key $value}-->
        <!--{if $value[title]}-->
        <span>$value[title]:{$space["extcredits$key"]} $value[unit]</span>
        <!--{/if}-->
        <!--{/loop}--></span>
            </div>
        </div>
    </div>
  
</div>

<!--{if $_G['uid'] == $space[uid]}-->
<div class="user_box box_bg">
    <ul class="row">
    <li><a href="home.php?mod=space&uid={$_G[uid]}&do=favorite&view=me&type=forum"><i class="iconfont i_favorite">&#xf60a;</i>{echo m_lang('favorite')}</a></li>
        
    <li><a href="home.php?mod=dingyue"><i class="mobile_icon i_friend" style="font-size:14px;">&#xe601;</i>订阅</a></li>
    <li><a href="home.php?mod=space&do=pm"{if $_G[member][newpm]} class="xi1"{/if}><i class="iconfont i_pm">&#xf637;</i><!--{if $_G[member][newpm]}-->{lang new_pm}<!--{else}-->{lang pm_center}<!--{/if}--></a></li>   
    </ul>
</div>
<!--{/if}-->

<section>
<div class="user_box box_bg box_brb">
    <ul class="cell">

        <li><a href="home.php?mod=space&uid=$space[uid]&do=thread&view=me&type=thread&from=space">我的发帖<span>$space[threads]</span><i></i></a></li>

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
        <li><span>$space[lastpost]</span>上次发表</li>
        <li><span>$space[lastactivity]</span>上次活动</li>

    <!--{if $space[uid] == $_G[uid]}-->
        <!--{if $_G[uid] == $space[uid] || $_G[group][allowviewip]}-->
        <li><span>$space[lastip] $space[lastip_loc]</span>上次访问</li>
		<li><span>$space[regip] $space[regip_loc]</span>注册地区</li>
        <!--{/if}-->
        
        
    <!--{/if}-->
    </ul>
</div>
</section>
    
<!--{if $space['uid'] == $_G['uid']}-->
<div class="btn_exit mtn mbm"><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}" class="btn_default btn_w100" style="display:block; width:auto;">{lang logout_mobile}</a></div>
<!--{/if}-->
<!-- userinfo end -->

<!--{template common/footer}-->
