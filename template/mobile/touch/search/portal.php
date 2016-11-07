<?php exit;?>
<!--{subtemplate common/header}-->
<!-- header start -->
<script>SetWebTitle("{echo m_lang('search')}{echo m_lang('marticle')}");SetTopLeftNav("backpage");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/search/search.css" type="text/css" media="all">
<div id="tabox" class="tabox box_bg">
    <div class="hd">
        <ul class="tab2">
            <li><a href="search.php?mod=forum">{echo m_lang('mthread')}</a></li>
            <li class="on"><a href="search.php?mod=portal">{echo m_lang('marticle')}</a></li>
        </ul>
    </div>
</div>
<!-- header end -->
  
<div class="search box_bg">
      <form id="mod_portal" method="post" action="search.php">
        <input type="hidden" id="mod_portal" name="mod" value="portal" checked="checked" />
        <input type="hidden" value="yes" name="searchsubmit">
		<table width="100%" cellspacing="0" cellpadding="0">
			<tbody>
				<tr>
					<td>						
                        <input type="text" name="srchtxt" value="" autocomplete="off" class="txt" placeholder="{echo m_lang('searchportal')}">
					</td>
					<th><input type="submit" name="btnG" value="{lang search}" class="btn_search" ></th>
				</tr>
			</tbody>
		</table>
        </form>
</div>
  
<div class="searchlist box_bg">
  <!--{if $keyword}-->  
  <h2 class="title">{lang search_result_keyword}</h2>
  <!--{/if}--> 
  
  <!--{if !empty($searchid) && submitcheck('searchsubmit', 1)}-->
  <ul id="alist"> 
    <!--{if empty($articlelist)}-->
    <li class="wmt"><a href="javascript:;">{lang search_nomatch}</a></li>
    <!--{else}--> 
    <!--{loop $articlelist $article}-->
    <li class="solist"><a href="portal.php?mod=view&aid=$article[aid]">$article[title]</a></li>
    <!--{/loop}--> 
    <!--{/if}--> 
  </ul>  
  <!--{/if}-->

<!--{if $ceo_norepages > 1}--> 
<!--{if $index['num'] > $_G['tpp']}-->
<div id="ajaxtag"></div> 
	<script type="text/javascript">
    var url = 'search.php?mod=portal&searchid={$searchid}&orderby={$orderby}&ascdesc={$ascdesc}&searchsubmit=yes';
    var pages=$_G['page'];
    var allpage={echo $thispage = ceil($index['num'] / $_G['tpp']);};
    </script>
    <!--{template common/ceo_ajaxpage}--> 
<!--{/if}-->
<!--{else}-->
    <!--{if $multipage}--><div class="pgbox">$multipage</div><!--{/if}-->
<!--{/if}-->  

</div>

<!--{subtemplate common/footer}-->