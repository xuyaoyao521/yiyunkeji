<?php exit;?>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/viewthread_sort.css" type="text/css" media="all">
<!--{if $post['first']  && $threadsortshow}-->
<!--{if $ceo_sortthreadtemplate == 1}-->
    <!--{$threadsortshow['typetemplate']}-->
<!--{else}-->
    <!--{if $threadsortshow['optionlist'] && !($post['status'] & 1) && !$_G['forum_threadpay']}-->
        <!--{if $threadsortshow['optionlist'] == 'expire'}-->
            {lang has_expired}
        <!--{else}-->
            <div class="box_ex2 viewsort">
				<h4>$_G[forum][threadsorts][types][$_G[forum_thread][sortid]]</h4>
				<ul class="cl">
                    <!--{loop $threadsortshow['optionlist'] $option}-->
                    <li>
                        <div<!--{if $option['type'] == 'textarea' || $option['type'] == 'image'}--> class="sortblock"<!--{/if}-->>
                        <!--{if $option['type'] != 'info'}--><span>$option[title]</span>
                            <!--{if $option['value']}-->
                                <!--{if $option['type'] == 'image'}--><img src='$option[value]' /><!--{else}-->$option[value]<!--{/if}--> $option[unit]
                            <!--{else}-->
                            <span class="xg1">--</span>
                            <!--{/if}-->
                        <!--{/if}-->
                        </div>
                    </li>
                    <!--{/loop}-->
                </ul>
            </div>
        <!--{/if}-->
    <!--{/if}-->
<!--{/if}-->
<!--{/if}-->