<?php exit;?>
<!--{eval $friendsname = array(1 => '{lang friendname_1}',2 => '{lang friendname_2}',3 => '{lang friendname_3}',4 => '{lang friendname_4}');}-->
<!--{template common/header}-->
<script>SetWebTitle("{lang album}");SetTopLeftNav("home_backpage");</script>

<div id="tabox" class="tabox box_bg">
    <div class="hd">
        <ul class="tab3">
            <li class="{if $actives[we]}on{/if}"><a href="home.php?mod=space&do=album&view=we">{lang friend_album}</a></li>
            <li class="{if $actives[me]}on{/if}"><a href="home.php?mod=space&do=album&view=me">{lang my_album}</a></li>
            <li class="{if $actives[all]}on{/if}"><a href="home.php?mod=space&do=album&view=all">{lang view_all}</a></li>
        </ul>
    </div>
</div>

						<!--{if $count}-->

						<div class="album box_bg">
                        <ul>
                        
 							<!--{loop $list $key $value}-->
							<!--{eval $pwdkey = 'view_pwd_album_'.$value['albumid'];}-->
							<li>
								<a href="home.php?mod=space&uid=$value[uid]&do=album&id=$value[albumid]"><!--{if $value[pic]}--><img src="$value[pic]" alt="$value[albumname]" /><!--{/if}--></a>
								<p><!--{if $value[albumname]}-->{echo cutstr(strip_tags($value[albumname]),10)}<!--{else}-->{lang default_album}<!--{/if}--></p>			
							</li>
							<!--{/loop}-->                            
							<!--{if $space[self] && $_GET['view']=='me'}-->                            
							<li>
								<a href="home.php?mod=space&uid=$value[uid]&do=album&id=-1"><img src="{IMGDIR}/nopic.gif" alt="{lang default_album}" width="91" height="91" /></a>
								<p>{lang default_album}</p>
							</li>
							<!--{/if}-->                            
                          </ul>  
						</div>
                        
						<!--{if $multi}--><div class="pgbox">$multi</div><!--{/if}-->                            
                            
						<!--{/if}-->                   


<script type="text/javascript">
function fuidgoto(fuid) {
	var parameter = fuid != '' ? '&fuid='+fuid : '';
	window.location.href = 'home.php?mod=space&do=album&view=we'+parameter;
}
</script>

</div>

<!--{template common/footer}-->