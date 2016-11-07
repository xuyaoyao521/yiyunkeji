<?php exit;?>
<div class="searchlist box_bg">
	<h2 class="title"><!--{if $keyword}-->{lang search_result_keyword} <!--{if $modfid}--><a href="forum.php?mod=modcp&action=thread&fid=$modfid&keywords=$modkeyword&submit=true&do=search&page=$page" target="_blank">{lang goto_memcp}</a><!--{/if}--><!--{else}-->{lang search_result}<!--{/if}--></h2>
	<!--{if empty($threadlist)}-->
        <div class="wmt"><a href="javascript:;">{lang search_nomatch}</a></div>
	<!--{else}-->
        <ul id="alist">
            <!--{loop $threadlist $thread}-->
            <li class="solist">
                <a href="forum.php?mod=viewthread&tid=$thread[realtid]&highlight=$index[keywords]" $thread[highlight]>$thread[subject]</a>
            </li>
            <!--{/loop}-->
        </ul>
	<!--{/if}-->
 
<!--{if $ceo_norepages > 1}--> 
<!--{if $index['num'] > $_G['tpp']}-->
    <div id="ajaxtag"></div> 
    <script type="text/javascript">
    var url = 'search.php?mod=forum&searchid={$searchid}&orderby={$orderby}&ascdesc={$ascdesc}&searchsubmit=yes';
    var pages=$_G['page'];
    var allpage={echo $thispage = ceil($index['num'] / $_G['tpp']);};
    </script>
    <!--{template common/ceo_ajaxpage}--> 
<!--{/if}-->
<!--{else}-->
    <!--{if $multipage}--><div class="pgbox">$multipage</div><!--{/if}-->
<!--{/if}-->

</div>
