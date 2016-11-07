<?php exit;?>
<div id="sidemask" style="display:none;"><div class="sidemask_not"><i class="iconfont icon-xiangyou1 a"></i><em>{echo m_lang('side_exit')}</em></div></div>
<div id="side_nv" class="side_nv">
<div class="nv">
<div class="sideuser">
    <!--{if $_G['uid'] || $_G['connectguest']}-->
<a href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1" class="sideavatar"><img src="<!--{avatar($space[uid], middle, true)}-->" /></a>
<p class="sideusername"><a href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1">$_G[username]</a></p>
    <!--{else}-->    
<div class="sidelogin">
    <p>{echo m_lang('user_nologin')}</p>
    <span><a href="member.php?mod=logging&action=login&mobile=2" class="ceologin">{lang login}</a><a href="member.php?mod=register&mobile=2" class="ceoregister">{lang register}</a></span>
</div>
    <!--{/if}-->
</div>
<ul class="nv_menu">
<!--{if ( $ceo_sidemenus)}-->
{$ceo_sidemenus}
<!--{else}-->
<li><a href="portal.php?mod=index"><i class="iconfont">&#xf628;</i>{echo m_lang('portal')}</a></li>
<li><a href="forum.php?mod=phone"><i class="iconfont">&#xe926;</i>{echo m_lang('toutiao')}</a></li>
<li><a href="forum.php?forumlist=1"><i class="iconfont">&#xf665;</i>{echo m_lang('forum')}</a></li>
<li><a href="forum.php?mod=photo"><i class="iconfont">&#xe907;</i>{echo m_lang('pic')}</a></li>
<li><a href="forum.php?mod=guide&view=newthread"><i class="iconfont">&#xe808;</i>{echo m_lang('guide')}</a></li>
<li><a href="misc.php?mod=tag"><i class="iconfont">&#xf659;</i>{echo m_lang('tag')}</a></li>
<li><a href="search.php?mod=forum"><i class="iconfont">&#xf62b;</i>{echo m_lang('search')}</a></li>
<li><a href="forum.php?mod=catelist"><i class="iconfont">&#xf619;</i>{echo m_lang('channel')}</a></li>
<!--{/if}-->
</ul>
<!--{if $_G['uid']}-->
    <ul class="nv_bottom">
        <li>
            <a href="home.php?mod=space&uid=$_G[uid]&do=profile&mycenter=1"><i class="iconfont">&#xf624;</i>{echo m_lang('mycenter')}</a>
            <a href="member.php?mod=logging&action=logout&formhash={FORMHASH}"><i class="iconfont">&#xf602;</i>{echo m_lang('myexit')}</a>
        </li>
    </ul>
<!--{/if}-->
</div></div>
