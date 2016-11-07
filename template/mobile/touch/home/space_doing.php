<?php exit;?>
	<!--{subtemplate common/header}--> 
<script>SetWebTitle("{lang doing}");SetTopLeftNav("home_backpage");</script>

    <div class="ct">         		      
					<!--{if helper_access::check_module('doing')}-->
					<!--{subtemplate home/space_doing_form}-->
					<!--{/if}-->
<div id="tabox" class="tabox box_bg">
    <div class="hd">
        <ul class="tab3">
            <li class="{if $actives[we]}on{/if}"><a href="home.php?mod=space&do=$do&view=we">{echo m_lang('mefriend_doing')}</a></li>
            <li class="{if $actives[me]}on{/if}"><a href="home.php?mod=space&do=$do&view=me">{lang doing_view_me}</a></li>
            <li class="{if $actives[all]}on{/if}"><a href="home.php?mod=space&do=$do&view=all">{lang view_all}</a></li>
        </ul>
    </div>
</div>

		<!--{if $dolist}--> 
        
            <ul class="doing">
			<!--{loop $dolist $dv}-->
			<!--{eval $doid = $dv[doid];}-->
			<!--{eval $_GET[key] = $key = random(8);}-->
				<li>
				<a href="home.php?mod=space&uid=$dv[uid]" class="avatar"><!--{avatar($dv[uid],small)}--></a>
                                
					<div class="doing_user">
                    <!--{if empty($diymode)}--><a href="home.php?mod=space&uid=$dv[uid]">$dv[username]</a><!--{/if}-->
                    <span class="y"><!--{date($dv['dateline'], 'u')}--></span>
                    </div>
                    
                    <p class="mbb">$dv[message]</p>
                    
					<!--{eval $list = $clist[$doid];}-->											
					<!--{template home/space_doing_li}-->
                     <!--{if $dv[uid]==$_G[uid]}-->
                     <p style=" height:14px;">
                     <a href="home.php?mod=spacecp&ac=doing&op=delete&doid=$doid&id=$dv[id]&handlekey=doinghk_{$doid}_$dv[id]" class="xi2 y">({lang delete})</a>
                     </p>
                     <!--{/if}-->                     
				</li>
			<!--{/loop}-->
            </ul>

			<!--{if $multi}--><div class="pgbox">$multi</div><!--{/if}-->
            
		<!--{else}-->
        
			<div class="wmt">{lang doing_no_replay}<!--{if $space[self]}-->{lang doing_now}<!--{/if}--></div>
            
		<!--{/if}-->
</div>
<!--{subtemplate common/footer}-->