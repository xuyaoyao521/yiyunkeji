<?php exit;?>
<!--{subtemplate common/header}-->
<script>SetWebTitle("{lang comment}");SetTopLeftNav("backpage");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/portal/portal.css" type="text/css" media="all">
<div class="ct box_bg">

<div class="pt">
    <a href="$url" class="xi2">&laquo;{echo m_lang('tthread')}</a>
    <span class="y">{echo m_lang('tt')}$csubject[commentnum]{echo m_lang('od')}{lang comment}</span>
</div>

<ul id="alist">
<!--{loop $commentlist $comment}-->
    <!--{subtemplate portal/comment_li}-->
<!--{/loop}-->
</ul>
            
<!--{if $ceo_norepages > 1}--> 
<!--{if $csubject['commentnum'] > $perpage}-->
<!--{eval $nextpage = $page + 1; }--> 
<div id="ajaxtag"></div> 
	<script type="text/javascript">
    var url = 'portal.php?mod=comment&id=$_GET['id']&idtype=aid&page=$nextpage';
    var pages=$_G['page'];
    var allpage={echo $thispage = ceil($csubject['commentnum'] / $perpage);};
    </script>
    <!--{template common/ceo_ajaxpage}--> 
<!--{/if}-->
<!--{else}-->
    <!--{if $multi}--><div class="pgbox">$multi</div><!--{/if}-->
<!--{/if}-->           
           
            <!--{if $csubject['allowcomment'] == 1}-->            
                   
            <div class="post_from b_p">
            <ul>            
				<form name="cform" action="portal.php?mod=portalcp&ac=comment" method="post" autocomplete="off">
					<li class="mtm">
					<textarea name="message" cols="60" rows="3" id="message"></textarea>
					</li>
					<!--{if checkperm('seccode') && ($secqaacheck || $seccodecheck)}-->
						<!--{subtemplate common/seccheck}-->
					<!--{/if}-->

					<!--{if $idtype == 'topicid' }-->
						<input type="hidden" name="topicid" value="$id">
					<!--{else}-->
						<input type="hidden" name="aid" value="$id">
					<!--{/if}-->
					<input type="hidden" name="formhash" value="{FORMHASH}">
					<button type="submit" name="commentsubmit" value="true" class="btn_default btn_w100 btn_submit">{lang comment}</button>
				</form>
                </ul>                
                </div>

			<!--{/if}-->
      </div>
      

<!--{subtemplate common/footer}-->