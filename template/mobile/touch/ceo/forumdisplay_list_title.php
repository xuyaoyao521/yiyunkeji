<?php exit;?>
    <h3 $thread[highlight]> 
    <!--{subtemplate ceo/forumdisplay_list_title_label}-->
      {$thread[subject]} 
        <!--{if $thread['price'] > 0}-->
            <span><!--{if $thread['special'] == '3'}-->
            - <span class="xi1">[{lang thread_reward} <span class="xw1">$thread[price]</span> {$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][2]][title]}]</span>
            <!--{else}-->
            - [{lang price} <span class="xw1">$thread[price]</span> {$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][unit]}{$_G[setting][extcredits][$_G['setting']['creditstransextra'][1]][title]}]
            <!--{/if}--></span>
        <!--{elseif $thread['special'] == '3' && $thread['price'] < 0}-->
            <span>- [{lang reward_solved}]</span>
        <!--{/if}-->
        <!--{if $thread['replycredit'] > 0}-->
            - <span class="xi1">[{lang replycredit} <strong> $thread['replycredit']</strong> ]</span>
        <!--{/if}-->
        <!--{if $thread['weeknew']}-->
            <span class="xi1">New</span>
        <!--{/if}-->
      </h3>