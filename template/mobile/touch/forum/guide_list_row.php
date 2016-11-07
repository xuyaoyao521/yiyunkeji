<?php exit;?>

<li>
    <a class="act_link guide" href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra">
        <div class="guide_list">
            <div class="avt"><img src="<!--{avatar($thread[authorid], middle, true)}-->" /></div>
            <h3>
                <!--{if $thread[folder] == 'lock'}--> 
                <span class="tag_bg t4">{echo m_lang('tlock')}</span>
                <!--{elseif $thread['special'] == 1}--> 
                <span class="tag_bg">{echo m_lang('ts1')}</span> 
                <!--{elseif $thread['special'] == 2}--> 
                <span class="tag_bg">{echo m_lang('ts2')}</span> 
                <!--{elseif $thread['special'] == 3}--> 
                <span class="tag_bg">{echo m_lang('ts3')}</span> 
                <!--{elseif $thread['special'] == 4}--> 
                <span class="tag_bg">{echo m_lang('ts4')}</span> 
                <!--{elseif $thread['special'] == 5}--> 
                <span class="tag_bg">{echo m_lang('ts5')}</span> 
                <!--{elseif in_array($thread['displayorder'], array(1, 2, 3, 4))}--> 
                <span class="tag_bg t1">{echo m_lang('tdis')}$thread[displayorder]</span> 
                <!--{elseif $thread['digest'] > 0}--> 
                <span class="tag_bg t2">{echo m_lang('tdig')}</span> 
                <!--{elseif $thread['cover'] != 0}--> 
                <span class="tag_bg">{echo m_lang('tatt')}</span>
                <!--{else}--> 
                <!--{/if}--> 
                {$thread[subject]}
            </h3>
            <div class="item_info">
                <span class="src space"><!--{if $thread['authorid'] && $thread['author']}-->{$thread[author]}<!--{else}--><!--{if $_G['forum']['ismoderator']}-->{lang anonymous}<!--{else}-->{$_G[setting][anonymoustext]}<!--{/if}--><!--{/if}--></span>
                <span class="cmt space">{echo m_lang('views')}&nbsp;<!--{if $thread[views] > 0}-->{$thread[views]}<!--{else}-->0<!--{/if}--></span>
                <span class="cmt space">{echo m_lang('reply')}&nbsp;<!--{if $thread[replies] > 0}-->{$thread[replies]}<!--{else}-->0<!--{/if}--></span>
                <span class="time">{$thread[dateline]}</span>
            </div>
        </div>
    </a>
</li>

