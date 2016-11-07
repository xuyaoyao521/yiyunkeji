<?php exit;?>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/viewthread_debate.css" type="text/css" media="all">

<!--{if $debate[umpire]}-->
	<!--{if $debate['umpirepoint']}-->
	<div class="debate_fill">
		<p>
			<!--{if $debate[winner]}-->
			<!--{if $debate[winner] == 1}-->
			<strong>{lang debate_square}</strong>{lang debate_winner}
			<!--{elseif $debate[winner] == 2}-->
			<strong>{lang debate_opponent}</strong>{lang debate_winner}
			<!--{else}-->
			<strong>{lang debate_draw}</strong>
			<!--{/if}-->
			<!--{/if}-->
			<em>{lang debate_comment_dateline}: $debate[endtime]</em>
		</p>
		<!--{if $debate[umpirepoint]}--><p><strong>{lang debate_umpirepoint}</strong>$debate[umpirepoint]</p><!--{/if}-->
		<!--{if $debate[bestdebater]}--><p><strong>{lang debate_bestdebater}</strong>$debate[bestdebater]</p><!--{/if}-->
	</div>
	<!--{/if}-->
<!--{/if}-->

<div id="postmessage_$post[pid]" class="postmessage j-sub">$post[message]</div>

<div class="t-debate">

<div class="debate-landing-item"> <div class="item"> <span class="debate-item-pct">{lang debate_square} ($debate[affirmvotes])</span> </div> <div class="item"> <span>{lang debate_opponent} ($debate[negavotes])</span> </div> </div>

<div class="debate-landing-bar"> <div id="debatebar" class="it0"></div> </div>
<script>
function setdebatebar(obj, i, j) {
	if(i == j) {
		obj.style.width = '50%';
	}
	else if(i > j) {
		s = (j / (i + j)) * 100;
		if(s <= 1) { obj.style.width = (100 - 1) + '%';} else { obj.style.width = s + '%'; }
	}
	else if(i < j) {
		s = (i / (i + j)) * 100;
		if(s <= 1) { obj.style.width = '1%';} else { obj.style.width = s + '%'; }
	}
}
setdebatebar(document.getElementById('debatebar'), $debate[affirmvotes], $debate[negavotes]);
</script>
<div class="debate-think debate-landing">
    <div class="item">
        <a href="forum.php?mod=misc&action=debatevote&tid=$_G[tid]&stand=1" class="J-twice-sub"> <span class="icon"></span><span class="it_title">{lang debate_support}{lang debate_square_point}</span></a>
        <div class="debate-s">({lang debater}:$debate[affirmdebaters]) </div>
        <div class="point" id="debate-aff">$debate[affirmpoint]</div>
    </div>
    <div class="vs">vs</div>
    <div class="item">
        <a href="forum.php?mod=misc&action=debatevote&tid=$_G[tid]&stand=2" class="J-twice-sub"> <span class="it_title">{lang debate_support}{lang debate_opponent_point}</span><span class="icon"></span> </a>
        <div class="debate-s">({lang debater}:$debate[negadebaters])</div>
        <div class="point" id="debate-neg">$debate[negapoint]</div>
    </div>
</div>
<script>
function setdebatepoint(obj, objs) {
	if(obj.offsetHeight > objs.offsetHeight) { objs.style.height = obj.offsetHeight + 'px';obj.style.height = obj.offsetHeight + 'px';}
	if(obj.offsetHeight < objs.offsetHeight) { obj.style.height = objs.offsetHeight + 'px';objs.style.height = objs.offsetHeight + 'px';}
}
setdebatepoint(document.getElementById('debate-aff'), document.getElementById('debate-neg'));
</script>

</div>

<div class="t-debate-end">
<!--{if $debate[endtime]}-->
	<p>{lang endtime}: $debate[endtime] <!--{if $debate[umpire]}-->{lang debate_umpire}: $debate[umpire]<!--{/if}--></p>
<!--{/if}-->

<!--{if $debate[umpire] && $_G['username'] && $debate[umpire] == $_G['member']['username']}-->
	<p class="mtn">
	<!--{if $debate[remaintime] && !$debate[umpirepoint]}-->
	 <a href="forum.php?mod=misc&action=debateumpire&tid=$_G[tid]&pid=$post[pid]{if $_GET[from]}&from=$_GET[from]{/if}" >{lang debate_umpire_end}</a>
	<!--{elseif TIMESTAMP - $debate['dbendtime'] < 3600}-->
	 <a href="forum.php?mod=misc&action=debateumpire&tid=$_G[tid]&pid=$post[pid]{if $_GET[from]}&from=$_GET[from]{/if}" >{lang debate_umpirepoint_edit}</a>
	<!--{/if}-->
	</p>
<!--{/if}-->
</div>