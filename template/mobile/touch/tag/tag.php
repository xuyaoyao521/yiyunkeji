<?php exit;?>
<!--{template common/header}-->
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/search/search.css" type="text/css" media="all">
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/tag/tag.css" type="text/css" media="all">

<!--{if $type != 'countitem'}-->

  <div class="pt box_bg box_brb mbm">  <a href="misc.php?mod=tag">{lang tag}</a> </div>
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
      <div class="taglist box_bg"> 
        <!--{if $tagarray}-->
            <!--{eval $i=0;}-->
            <!--{loop $tagarray $tag}--> 
                <!--{eval $t = $i % 5;}-->
                <a href="misc.php?mod=tag&id=$tag[tagid]" class="tag_bg t$t" >$tag[tagname]</a> 
                <!--{eval $i++;}-->
            <!--{/loop}--> 
        <!--{else}-->
            <div class="wmt">{lang no_tag}</div>
        <!--{/if}--> 
      </div>

<!--{else}--> 
$num 
<!--{/if}--> 
</section>

<!--{template common/footer}-->