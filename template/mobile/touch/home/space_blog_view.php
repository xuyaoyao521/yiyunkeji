<?php exit;?>
{eval
	$_G['home_tpl_titles'] = array($blog['subject'], '{lang blog}');
	$_G['home_tpl_spacemenus'][] = "<a href=\"home.php?mod=space&uid=$space[uid]&do=$do&view=me\">{lang they_blog}</a>";
	$_G['home_tpl_spacemenus'][] = "<a href=\"home.php?mod=space&uid=$space[uid]&do=blog&id=$blog[blogid]\">{lang view_blog}</a>";
	$friendsname = array(1 => '{lang friendname_1}',2 => '{lang friendname_2}',3 => '{lang friendname_3}',4 => '{lang friendname_4}');
} 
	<!--{template common/header}-->
<script>SetWebTitle("{lang blog}");SetTopLeftNav("backpage");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/portal/portal.css" type="text/css" media="all">


  <div class="ctt">
        <h1 class="vt_th">$blog[subject]</h1>
        <div class="xg1 user_first"> 
      <!--{if $blog[viewnum]}-->$blog[viewnum] {lang blog_read} <span class="pipe">|</span><!--{/if}--> 
      $blog[replynum] {lang blog_replay} <span class="pipe">|</span> 
      <!--{date($blog[dateline])}--> 
    </div>
        <div class="mess"> $blog[message] 
      <!--{$ceo_article_ad}--> 
      <!--{if $blog[friend] != 3 && !$blog[noreply]}-->
      <div id="click_div"> 
            <!--{template home/space_click}--> 
          </div>
      <!--{/if}--> 
    </div>
        <!--{$ceo_mshare}-->
        <div class="blog_bt"> 
      <!--{if $_G[uid] == $blog[uid] || checkperm('manageblog')}--> 
      <a href="home.php?mod=spacecp&ac=blog&blogid=$blog[blogid]&op=delete&handlekey=delbloghk_{$blog[blogid]}" id="blog_delete_$blog[blogid]" onclick="showWindow(this.id, this.href, 'get', 0);">{lang delete}</a> 
      <!--{/if}--> 
      <a href="home.php?mod=spacecp&ac=favorite&type=blog&id=$blog[blogid]&spaceuid=$blog[uid]&handlekey=favoritebloghk_{$blog[blogid]}" class="blogfav" >{lang favorite}</a> </div>
      <!--{if !empty($list)}-->
    <div class="titls" id="replay">
    	<dl>
        	<dt>{echo m_lang('blog_reply')}</dt>
            <dd>
    <a href="home.php?mod=space&uid=$blog[uid]&do=$do&id=$id#quickcommentform_{$id}" onclick="if($('comment_message')){$('comment_message').focus();return false;}">{lang publish_comment}</a>    
       <!--span>{echo m_lang('tt')} $blog[replynum] {lang blog_replay}</span-->
            </dd>
        </dl>
    </div>
      
      <!--{/if}--> 
      
      <ul id="alist">
        <!--{loop $list $k $value}-->
        <!--{template home/space_comment_li}--> 
        <!--{/loop}-->
      </ul>
 
<!--{if $ceo_norepages > 1}--> 
<!--{if $count > $perpage}-->
<div id="ajaxtag"></div> 
	<script type="text/javascript">
    var url = 'home.php?mod=space&uid=$blog[uid]&do=$do&id=$id';
    var pages=$_G['page'];
    var allpage={echo $thispage = ceil($count / $perpage);};
    </script>
    <!--{template common/ceo_ajaxpage}--> 
<!--{/if}-->
<!--{else}-->
<!--{if $multi}--><div class="pgbox">$multi</div><!--{/if}-->
<!--{/if}--> 
        
        <!--{if !$blog[noreply] && helper_access::check_module('blog')}-->
        
        <div class="post_from">
        <ul class="cl">
      <form id="quickcommentform_{$id}" action="home.php?mod=spacecp&ac=comment" method="post" autocomplete="off" onsubmit="ajaxpost('quickcommentform_{$id}', 'return_qcblog_$id');doane(event);">
            
            <!--{if $_G['uid'] || $_G['group']['allowcomment']}-->
         <li>
          <textarea id="comment_message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');" name="message" rows="3" ></textarea>
         </li>
            
            <!--{if checkperm('seccode') && ($secqaacheck || $seccodecheck)}--> 
            <!--{block sectpl}-->
            <sec>
            <span id="sec<hash>" onclick="showMenu(this.id);">
        <sec>
        </span>
            <div id="sec<hash>_menu" class="p_pop p_opt" style="display:none">
          <sec>
        </div>
            <!--{/block}--> 
            <!--{subtemplate common/seccheck}--> 
            <!--{/if}--> 
            
            <!--{else}-->
            <div class="mtn">
          <div class="pt box_bg hm">{lang login_to_comment} <a href="member.php?mod=logging&action=login" onclick="showWindow('login', this.href)" class="xi2">{lang login}</a> | <a href="member.php?mod={$_G[setting][regname]}" class="xi2">$_G['setting']['reglinkname']</a></div>
        </div>
            <!--{/if}-->
            
            <input type="hidden" name="referer" value="home.php?mod=space&uid=$blog[uid]&do=$do&id=$id" />
            <input type="hidden" name="id" value="$id" />
            <input type="hidden" name="idtype" value="blogid" />
            <input type="hidden" name="handlekey" value="qcblog_{$id}" />
            <input type="hidden" name="commentsubmit" value="true" />
            <input type="hidden" name="quickcomment" value="true" />
            
          <button type="submit" name="commentsubmit_btn"value="true" id="commentsubmit_btn" class="btn_default btn_w100 btn_submit"{if !$_G[uid]&&!$_G['group']['allowcomment']} onclick="showWindow(this.id, this.form.action);return false;"{/if}>{lang comment}</button>
        
            <span id="return_qcblog_{$id}"></span>
            <input type="hidden" name="formhash" value="{FORMHASH}" />
          </form>
      <script type="text/javascript">
							function succeedhandle_qcblog_$id(url, msg, values) {
								if(values['cid']) {
									comment_add(values['cid']);
								} else {
									$('return_qcblog_{$id}').innerHTML = msg;
								}
								<!--{if checkperm('seccode') && $sechash}-->
									<!--{if $secqaacheck}-->
									updatesecqaa('$sechash');
									<!--{/if}-->
									<!--{if $seccodecheck}-->
									updateseccode('$sechash');
									<!--{/if}-->
								<!--{/if}-->
							}
						</script> 
                        </ul>
    </div>
        <!--{/if}--> 
        
      </div>
  
  <!--{if !empty($_G['cookie']['clearUserdata']) && $_G['cookie']['clearUserdata'] == 'home'}--> 
  <script type="text/javascript">saveUserdata('home', '')</script> 
  <!--{/if}-->
  
  <script type="text/javascript">
	$('.blogfav').on('click', function() {
		var obj = $(this);
		$.ajax({
			type:'POST',
			url:obj.attr('href') + '&handlekey=blogfav&inajax=1',
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

    <!--{template common/footer}--> 
    