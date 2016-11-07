<?php exit;?>
<!--{eval $_G['home_tpl_titles'] = array('{lang remind}');}-->
<!--{subtemplate common/header}-->
<script>SetWebTitle("{lang remind}");SetTopLeftNav("home_backpage");</script>

<div class="ct"> 
<div id="tabox" class="tabox box_bg">
    <div class="hd">
        <ul class="tab2">
		<!--{eval $t = 1;}-->
        <!--{loop $_G['notice_structure'] $key $type}-->
        <!--{if $t < 4}-->
        <!--{if $key!='interactive'}-->
		<li class="{if $actives[$key]}on{/if}"><a href="home.php?mod=space&do=notice&view=$key"><!--{eval echo lang('template', 'notice_'.$key)}--><!--{if $_G['member']['category_num'][$key]}-->($_G['member']['category_num'][$key])<!--{/if}--></a></li>
        <!--{/if}--><!--{/if}-->
        <!--{eval $t++;}-->
		<!--{/loop}-->
        </ul>
    </div>
</div>

<div class="noticebox">

			<!--{if empty($list)}-->
			<div class="wmt">
				<!--{if $_GET[isread] != 1}-->
					{lang no_new_notice}<a href="home.php?mod=space&do=notice&isread=1">{lang view_old_notice}</a>
				<!--{else}-->
					{lang no_notice}
				<!--{/if}-->
			</div>
			<!--{/if}-->

			<!--{if $list}-->

                <!--{loop $list $key $value}-->
                    <div class="noticelist">

                        <p class="mbn">
                      
                        <span class="xg1"><!--{date($value[dateline], 'u')}--></span>
                        </p>
                        
                        <p class="xg3">$value[note]</p>
                        
                        <!--{if $value[from_num]}-->
                        <p class="mtn ptn bt xg3">{lang ignore_same_notice_message}</p>
                        <!--{/if}-->
                    </div>
                <!--{/loop}-->

				<!--{if $view!='userapp' && $space[notifications]}-->
				<div class="wmt"><a href="home.php?mod=space&do=notice&ignore=all">{lang ignore_same_notice_message}</a></div>
				<!--{/if}-->

				<!--{if $multi}--><div class="pgbox">$multi</div><!--{/if}-->
			<!--{/if}-->

		</div>
        </div>

<!--{subtemplate common/footer}-->