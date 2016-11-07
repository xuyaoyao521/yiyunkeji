<?php exit;?>
<!--{if $_G['forum']['picstyle'] == 1 && $ceo_listmodule > 0}-->
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/mod_photo.css" type="text/css" media="all">
<div class="threadlist box_bg">
    <ul id="alist" class="photo_list{$ceo_listmodule}">
        <!--{loop $_G['forum_threadlist'] $thread}-->
            <li class="sub">
                <a href="forum.php?mod=viewthread&tid=$thread[tid]">
                <img src="$thread[coverpath]" />
                <h1>{echo cutstr(strip_tags($thread[subject]),16)}</h1>
                </a>
            </li>
        <!--{/loop}-->
    </ul>
</div>
<!--{else}-->
    <!--{if $ceo_ForumStyle == 0}-->
        <!--{if $ceo_message == 1}-->
            <!--{eval require_once(TEMP_APP.'mod_forumdisplay_list.php');}-->
        <!--{/if}-->
<div class="threadlist box_bg">
    <ul id="alist">
        <!--{loop $_G['forum_threadlist'] $thread}-->
            <li><a class="act_link" href="forum.php?mod=viewthread&tid=$thread[tid]">
                <!--{subtemplate ceo/forumdisplay_list_title}-->
                <!--{subtemplate ceo/forumdisplay_list_message}-->
                <!--{subtemplate ceo/forumdisplay_list_info}-->
            </a></li>
        <!--{/loop}-->
    </ul>
</div>
    <!--{else}-->
        <!--{eval require_once(TEMP_APP.'mod_forumdisplay_list.php');}-->
        <!--{if $ceo_ForumStyle == 1}-->
            <link rel="stylesheet" href="template/mobile/toutiao_mobile/css/mod_toutiao.css" type="text/css" media="all">
<div class="threadlist box_bg">
            <ul id="alist">
            <!--{eval $i = 0;}-->
            <!--{loop $_G['forum_threadlist'] $key $thread}-->
                <!--{eval $i++;}-->
                <li><a class="act_link" href="forum.php?mod=viewthread&tid=$thread[tid]">
                <!--{if $thread[attachment] == 2}-->
                    <!--{if $thread['piccount'] >= 1 && $thread['piccount'] < 3}-->
                        <div class="desc">
                            <!--{subtemplate ceo/forumdisplay_list_title}-->
                            <!--{subtemplate ceo/forumdisplay_list_info}-->
                        </div>
                        <!--{subtemplate ceo/forumdisplay_list_pic}-->
                    <!--{elseif  $thread['piccount'] >= 3}-->
                        <!--{subtemplate ceo/forumdisplay_list_title}-->
                        <!--{subtemplate ceo/forumdisplay_list_piclist}-->
                        <!--{subtemplate ceo/forumdisplay_list_info}-->
                    <!--{else}-->
                        <!--{subtemplate ceo/forumdisplay_list_title}-->
                        <!--{subtemplate ceo/forumdisplay_list_message}-->
                        <!--{subtemplate ceo/forumdisplay_list_info}-->
                    <!--{/if}-->
                <!--{else}-->
                    <!--{subtemplate ceo/forumdisplay_list_title}-->
                    <!--{subtemplate ceo/forumdisplay_list_message}-->
                    <!--{subtemplate ceo/forumdisplay_list_info}-->
                <!--{/if}-->
                </a></li>
                <!--{if $ceo_ad[$i]}-->
                <li><a class="act_link" href="$ceo_ad[$i][1]"><h3><span class="tag_bg">{echo m_lang('tads')}</span></h3><img src="$ceo_ad[$i][0]" width="100%" /></a></li>
                <!--{/if}-->
            <!--{/loop}-->
            </ul>
</div>
        <!--{/if}-->
        <!--{if $ceo_ForumStyle == 2}-->
        <link rel="stylesheet" href="template/mobile/toutiao_mobile/css/mod_tieba.css" type="text/css" media="all">
	<!--{if $_G['forum_threadcount']}-->
<div class="threadlist">
	<div class="ceo_forumdisplay_info">
	    <ul>
        <!--{loop $_G['forum_threadlist'] $key $thread}-->
            <!--{if in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
                <li>
                    <i>$thread[dateline]</i>
                    <a href="forum.php?mod=viewthread&tid=$thread[tid]&extra=$extra"><span class="tag_bg t1">{echo m_lang('tdis')}$thread[displayorder]</span>{$thread[subject]}</a>
                </li>
            <!--{/if}-->
        <!--{/loop}-->
		</ul>
	</div>
        <ul id="alist" class="ceo_tieba">
            <!--{eval $i = 0;}-->
            <!--{loop $_G['forum_threadlist'] $key $thread}-->
                <!--{if !in_array($thread['displayorder'], array(1, 2, 3, 4))}-->
                <!--{eval $i++;}-->
                <li>
                <span class="z"><!--{avatar($thread[authorid],small)}--></span>
                <a href="forum.php?mod=viewthread&tid=$thread[tid]" class="ceo_tieba_top">
                    <span class="tit">$thread[subject]</span>
                    <div class="hymcdj cl"><span class="by z">$thread[author]</span>
                    <!--{subtemplate ceo/forumdisplay_list_title_label}-->
                    </div>
                </a> 
                <a href="forum.php?mod=viewthread&tid=$thread[tid]" class="ceo_tieba_pic bm_c bt">
                    <!--{if $ceo_message == 1 && !empty($thread['message'])}--><p class="item_message cl">{$thread['message']} ...</p><!--{/if}-->
                    <div class="ceo_tieba_pics cl">
                        <ul>
                            <!--{loop $thread['pics'] $key}-->                        
                                <li><img src="$key" onload="resize(this, $ceo_picwidth, $ceo_picwidth, 1)"></li>
                            <!--{/loop}-->
                        </ul>
                    </div>
                    <div class="ceo_info cl">
                        <div class="time z iconfont icon-shizhong">{$thread[dateline]}</div>
                        <div class="cmt y cl"><span class="iconfont icon-zantong">{$thread[recommend_add]}</span><span class="iconfont icon-attention">{$thread[views]}</span><span class="iconfont icon-liuyan">{$thread[replies]}</span></div>
                    </div>
                </a>
                </li>
                    <!--{if $ceo_ad[$i]}-->
                        <li><a href="$ceo_ad[$i][1]"><img src="$ceo_ad[$i][0]" width="100%" /></a></li>
                    <!--{/if}-->
                <!--{/if}-->
            <!--{/loop}-->
            </ul>
    <!--{/if}-->
</div>
        <!--{/if}-->
    <!--{/if}-->
<!--{/if}-->

