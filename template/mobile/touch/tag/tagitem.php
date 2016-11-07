<?php exit;?>
<!--{template common/header}-->
<script>SetWebTitle("{lang tag}[$tagname{eval echo $_POST['name']}]");SetTopLeftNav("backpage");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/search/search.css" type="text/css" media="all">

<!--{if $tagname}-->
<div class="ct">
    <div class="pt box_bg box_brb mbm">
    	<a href="misc.php?mod=tag">{lang tag}</a> 
        <!--{if $tagname}--><em> &gt; </em> <a href="misc.php?mod=tag&id=$id">$tagname</a><!--{/if}--> 
        <!--{if $showtype == 'thread'}--> <em> &gt; </em> {lang related_thread}<!--{/if}--> 
        <!--{if $showtype == 'blog'}--><em> &gt; </em> {lang related_blog}<!--{/if}--> 
    </div>
  
<!--{if empty($showtype) || $showtype == 'thread'}--> 
	<!--{if $threadlist}-->
<div class="threadlist box_bg">
    <ul id="alist">
        <!--{loop $threadlist $thread}-->
            <li><a class="act_link" href="forum.php?mod=viewthread&tid=$thread[tid]&{if $_GET['archiveid']}archiveid={$_GET['archiveid']}&{/if}extra=$extra" class="guide">
                <!--{subtemplate ceo/forumdisplay_list_title}-->
                <!--{subtemplate ceo/forumdisplay_list_message}-->
                <!--{subtemplate ceo/forumdisplay_list_info}-->
            </a></li>
        <!--{/loop}-->
    </ul>
        <!--{if empty($showtype)}-->
            <div class="a_pg"><a href="misc.php?mod=tag&id=$id&type=thread">{lang more}...</a></div>
        <!--{else}--> 
            <!--{if $multipage}--><div class="pgbox">$multipage</div><!--{/if}--> 
        <!--{/if}--> 
</div>
    <!--{else}-->
        <div class="wmt">{lang no_content}</div>
    <!--{/if}--> 
  
<!--{/if}--> 
  
</div>
<!--{else}-->
  <div class="pt box_bg"><a href="misc.php?mod=tag">{lang tag}</a> </div>
  <section>
    <div class="search box_bg">
      <form method="post" action="misc.php?mod=tag" class="pns">
        <table width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td><input class="txt" name="name" value="" placeholder="{lang tag}"></td>
                    <th><button type="submit" class="btn_search">{lang search}</button></th>
                </tr>
            </tbody>
        </table>
      </form>
      </div>
  <div class="wmt">{lang empty_tags}</div>
  </section>


<!--{/if}--> 
<!--{template common/footer}-->