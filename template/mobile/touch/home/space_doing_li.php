<?php exit;?>
<!--{if $list}-->
<div class="doing_tls mbm bt">  

<!--{loop $list $value}-->
	<!--{if $value[uid]}-->
	<p>
		<a href="home.php?mod=space&uid=$value[uid]" class="xi2">$value[username]</a>: $value[message] (<!--{date($value['dateline'], 'n-j H:i')}-->)        
		<!--{if $value[uid]==$_G[uid] || $dv['uid']==$_G[uid] || checkperm('managedoing')}-->
			 <a href="home.php?mod=spacecp&ac=doing&op=delete&doid=$value[doid]&id=$value[id]&handlekey=doinghk_{$value[doid]}_$value[id]" class="xi2" >({lang delete})</a>
		<!--{/if}-->
	</p>
	<!--{/if}-->
   
<!--{/loop}-->
</div>
<!--{/if}-->
