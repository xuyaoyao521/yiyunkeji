<?php exit;?>
<!--{template common/header}-->
<script>SetWebTitle("{echo m_lang('guide')}");</script>

<div class="ct">
<div id="tabox" class="tabox box_bg">
    <div class="hd">
        <ul class="tab3">
            <li class="{if $view == 'newthread'}on{/if}"><a href="forum.php?mod=guide&view=newthread">{lang guide_newthread}</a></li>
            <li class="{if $view == 'hot'}on{/if}"><a href="forum.php?mod=guide&view=hot">{lang guide_hot}</a></li>
            <li class="{if $view == 'digest'}on{/if}"><a href="forum.php?mod=guide&view=digest">{lang guide_digest}</a></li>
        </ul>
    </div>
</div>
    <div class="threadlist box_bg">
<!--{if $view == 'index'}-->
<!--{eval dheader("location: forum.php?mod=guide&view=newthread");exit; }-->
<!--{elseif $view == 'hot'}-->
    <!--{loop $data $key $list}-->
            <ul>                      
                <!--{if $list['threadcount']}-->					 			
                    <!--{loop $list['threadlist'] $thread}-->
                    <!--{if $key == 'hot'}-->
                        <!--{subtemplate forum/guide_list_row}-->
                    <!--{/if}-->
                    <!--{/loop}-->
                <!--{else}-->
                <li class="wmt">{lang guide_nothreads}</li>					 		
                <!--{/if}-->                            
            </ul>
    <!--{/loop}-->				
<!--{elseif $view == 'digest'}-->
    <!--{loop $data $key $list}-->
            <ul>                      
                <!--{if $list['threadcount']}-->					 			
                    <!--{loop $list['threadlist'] $thread}-->
                    <!--{if $key == 'digest'}-->
                        <!--{subtemplate forum/guide_list_row}-->
                    <!--{/if}-->
                    <!--{/loop}-->
                <!--{else}-->
                <li class="wmt">{lang guide_nothreads}</li>					 		
                <!--{/if}-->                            
            </ul>
    <!--{/loop}-->
    <!--{elseif $view == 'newthread'}-->   
    <!--{loop $data $key $list}-->
    <!--{eval //var_dump($list['threadlist']);}-->
            <ul>                      
                <!--{if $list['threadcount']}-->					 			
                    <!--{loop $list['threadlist'] $thread}-->
                    <!--{if $key == 'newthread'}-->
                        <!--{subtemplate forum/guide_list_row}-->
                    <!--{/if}-->
                    <!--{/loop}-->
                <!--{else}-->
                <!--{if $key == 'newthread'}-->
                <li class="wmt">{lang guide_nothreads}</li>	
                <!--{/if}-->  				 		
                <!--{/if}-->                            
            </ul>
    <!--{/loop}-->  
<!--{/if}-->
    </div>
</div>
<!--{template common/footer}-->
