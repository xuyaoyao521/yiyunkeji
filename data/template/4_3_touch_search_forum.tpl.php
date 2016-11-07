<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); include template('common/header_search'); ?><div class="mobile_search_main">
<div class="search_top">
    	<a href="javascript:history.go(-1);"><div class="return"></div></a>
    	<div class="search" >
        
        <form action="forum.php" id="from_search" method="get">
        	<input type="hidden" name="mod" value="phone">
            <input type="hidden" name="mobile" value="2">
        	<div class="button"><a href="javascript:;">搜索</div>
            <div class="works"><input type="text" name="keyword" class="Key_word"></div>
             </form>
          <script>
          	$(".search .button a").click(function(){
$("#from_search").submit();
});
          </script>  
        </div>
    </div>
    
    <div class="search_history">
    	<a>E云网<span></span></a>
        <a>搜索关键词<span></span></a>
        <a>关键词<span></span></a>
        <div class="del">清除历史搜索记录</div>
    </div>
    
    <div class="search_default">
    	<h2>搜索您感兴趣的内容</h2>
        <div class="list">
        	<a><i>&#xe602;</i>文章</a><a><i>&#xe605;</i>图片</a><a><i>&#xe606;</i>视频</a><a><i>&#xe600;</i>帖子</a>
        </div>
    </div>
</div>


