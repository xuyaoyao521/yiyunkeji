<?php exit;?>
<!--{template common/header}-->
 <!--{template ceo/toutiao2}-->
 
  <div class="mobile_author">
    <p><!--{avatar($usercontent[uid])}--></p>
    <p>$usercontent[username]</p>
    <p>$usercontent[jianjie]</p>
    
    <p><!--{if $dyid}--><a onclick="qxdingyue($uid,this)" href="javascript:;">取消关注</a><!--{else}--><a onclick="dingyue3($uid,this)" href="javascript:;">关注</a>{/if}</p>
    
</div>
<div class="mobile_author_list"  id="mobile_author_list">
	<ul class="screen">
    	<li <!--{if $type==1}-->class="on"<!--{/if}-->><a href="home.php?mod=auther&uid=$uid&type=1">文章</a></li>
        <li <!--{if $type==2}-->class="on"<!--{/if}-->><a href="home.php?mod=auther&uid=$uid&type=2">视频</a></li>
        <li <!--{if $type==3}-->class="on"<!--{/if}-->><a href="home.php?mod=auther&uid=$uid&type=3">图片</a></li>
    </ul>
    <div class="Slide_main">
   
    	

       
            <!--{template ceo/forum_auther}-->
       
 		

    
    
  
 
        
    </div>
</div>
<!--{template common/footer}-->
