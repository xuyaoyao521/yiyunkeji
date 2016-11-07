<?php exit;?>
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