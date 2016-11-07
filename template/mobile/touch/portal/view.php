<?php exit;?>
<!--{subtemplate common/header}-->
<script>SetWebTitle("$cat[catname]");SetTopLeftNav("backpage");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/portal/portal.css" type="text/css" media="all">
<div class="ct"> 

<div class="ctt"> 
	<h1 class="vt_th">$article[title] <!--{if $article['status'] == 1}--><span>({lang moderate_need})</span><!--{elseif $article['status'] == 2}--><span>({lang ignored})</span><!--{/if}--></h1> 
								   
	<div class="user_first">                
		<!--{if $_G['uid']}--><a href="home.php?mod=spacecp&ac=favorite&type=article&id=$article[aid]&handlekey=favoritearticlehk_{$article[aid]}" class="fav" >{lang favorite}</a><!--{/if}-->
		<span><a href="home.php?mod=space&uid=$article[uid]">$article[username]</a></span>
		<span>{echo m_lang('pta')}$article[dateline]</span><br />
		<span>{lang view_views}: <em id="_viewnum"><!--{if $article[viewnum] > 0}-->$article[viewnum]<!--{else}-->0<!--{/if}--></em></span>
		<span>{lang view_comments}: <!--{if $article[commentnum] > 0}--><a href="$common_url" title="{lang view_all_comments}"><em id="_commentnum">$article[commentnum]</em></a><!--{else}-->0<!--{/if}--></span>
		<!--{if $article[author]}--><span>{lang view_author_original}: $article[author]</span><!--{/if}-->
		<!--{if $article[from]}--><span>{lang from}: <!--{if $article[fromurl]}--><a href="$article[fromurl]" target="_blank">$article[from]</a><!--{else}-->$article[from]<!--{/if}--></span><!--{/if}-->
		
		<!--{if $_G['uid']}-->                    
		<!--{if $_G['group']['allowmanagearticle'] || ($_G['group']['allowpostarticle'] && $article['uid'] == $_G['uid'] && (empty($_G['group']['allowpostarticlemod']) || $_G['group']['allowpostarticlemod'] && $article['status'] == 1)) || $categoryperm[$value['catid']]['allowmanage']}-->
			&nbsp;						
			<!--{if $article[status]>0 && ($_G['group']['allowmanagearticle'] || $categoryperm[$value['catid']]['allowmanage'])}-->
				<em><a href="portal.php?mod=portalcp&ac=article&op=verify&aid=$article[aid]" >({lang moderate})</a></em>
			<!--{else}-->
				<em><a href="portal.php?mod=portalcp&ac=article&op=delete&aid=$article[aid]" >({lang delete})</a></em>
			<!--{/if}-->
		<!--{/if}-->                  
		<!--{/if}-->
						
        <div class="mess">
        <!--{hook/view_article_content_mobile}-->
        <!--{if $content[title]}-->$content[title]<!--{/if}-->  
            <div><table cellspacing="0" cellpadding="0"><tr><td>$content[content]</td></tr></table></div>                
            <!--{if $multi}--><div class="pgbox">$multi</div><!--{/if}-->             
            <!--{$ceo_mshare}-->            
            <!--{$ceo_article_ad}--> 
            <!--{subtemplate home/space_click}-->
            </div>                                        
        </div>

        <!--{if $article['related']}-->
        <div class="nsj">
            <ul>
                <!--{loop $article['related'] $value}-->
                <li> &#x25C6; <a href="portal.php?mod=view&aid=$value[aid]">{echo cutstr($value[title],36)}</a></li>
                <!--{/loop}-->
            </ul>			
        </div>
        <!--{/if}-->           
	<!--{if $article['allowcomment']==1}-->
	<!--{eval $data = &$article}-->			
		<!--{subtemplate portal/portal_comment}-->
	<!--{/if}-->
	</div>


</div>

	
	<style type="text/css">.mess img { max-width:100% !important; }</style>
	
<script type="text/javascript">
$('.fav').on('click', function() {
	var obj = $(this);
	$.ajax({
		type:'POST',
		url:obj.attr('href') + '&handlekey=fav&inajax=1',
		data:{'favoritesubmit':'true', 'formhash':'{FORMHASH}'},
		dataType:'xml',
	})
	.success(function(s) {
		popup.open(s.lastChild.firstChild.nodeValue);
		evalscript(s.lastChild.firstChild.nodeValue);
	})
	.error(function() {
		window.location.href = obj.attr('href');
		popup.close();
	});
	return false;
});
</script>

<!--{subtemplate common/footer}-->