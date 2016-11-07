<?php exit;?>
    <h3> 
      <!--{if $thread[folder] == 'lock'}--> 
      <span class="t_att t_o">{echo p_lang('tlock')}</span> 
      <!--{elseif $thread['special'] == 1}--> 
      <span class="t_att t_g">{echo p_lang('ts1')}</span> 
      <!--{elseif $thread['special'] == 2}--> 
      <span class="t_att t_g">{echo p_lang('ts2')}</span> 
      <!--{elseif $thread['special'] == 3}--> 
      <span class="t_att t_g">{echo p_lang('ts3')}</span> 
      <!--{elseif $thread['special'] == 4}--> 
      <span class="t_att t_g">{echo p_lang('ts4')}</span>
      <!--{elseif $thread['special'] == 5}--> 
      <span class="t_att t_g">{echo p_lang('ts5')}</span> 
      <!--{elseif in_array($thread['displayorder'], array(1, 2, 3, 4))}--> 
      <span class="t_att t_b">{echo p_lang('tdis')}$thread[displayorder]</span> 
      <!--{elseif $thread['digest'] > 0}--> 
      <span class="t_att t_b">{echo p_lang('tdig')}</span> 
      <!--{elseif $thread['cover'] != 0}--> 
      <span class="t_att">{echo p_lang('tatt')}</span> 
      <!--{else}--> 
      <!--{/if}--> 
      {$thread[subject]}
      </h3>