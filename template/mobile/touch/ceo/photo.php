<?php exit;?>
<script>SetWebTitle("{echo m_lang('pic')}");SetTopLeftNav("userlogin");</script>
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/mod_photo.css" type="text/css" media="all">

<!--{if $ceo_photowall == 1}-->
    <!--{eval require_once('./template/mobile/toutiao_mobile/ceo_photo.php');}-->
    <style type="text/css">
    <!--{if $ceo_photosize == 1}-->
    .sub img { width:100%; height:100%; }
    <!--{/if}-->
    </style>
    
    <!--{if $ceo_module == 1}-->
        <!--{if $ceo_listmodule == 3}-->
            <div class="wrapper">
                <ul id="alist" class="container-fluid">
                <!--{loop $photolist $thread}-->
                    <li class="sub">
                        <a href="forum.php?mod=viewthread&tid=$thread[tid]">
                            <img src="$thread[pic]" />
                        <h1>{echo strip_tags($thread[subject])}</h1>
                    <span>$thread[piccount]{echo m_lang('photo_picnum')}</span>
                        </a>
                    </li>
                <!--{/loop}-->
                </ul>
            </div>
        <!--{else}-->
            <ul id="alist" class="photo_list{$ceo_listmodule}">
            <!--{loop $photolist $thread}-->
                <li class="sub">
                    <a href="forum.php?mod=viewthread&tid=$thread[tid]">
                    <img src="$thread[pic]" />
                    <h1>{echo strip_tags($thread[subject])}</h1>
                    <span>$thread[piccount]{echo m_lang('photo_picnum')}</span>
                    </a>
                </li>
            <!--{/loop}-->
            </ul>         
        <!--{/if}-->
    <!--{/if}-->
    
    <!--{if $ceo_module == 2}-->
        <!--{if $ceo_listmodule == 3}-->
            <div class="wrapper">
                <ul id="alist" class="container-fluid">
                <!--{loop $photolist $value}-->
                    <li class="sub">
                        <a href="portal.php?mod=view&aid=$value[aid]">
                            <img src="data/attachment/$value[pic].thumb.jpg" />
                        <h1>{echo strip_tags($value[title])}</h1>
                        </a>
                    </li>
                <!--{/loop}-->
                </ul>
                
            </div>
        <!--{else}-->
            <ul id="alist" class="photo_list{$ceo_listmodule}">
            <!--{loop $photolist $value}-->
                <li class="sub">
                    <a href="portal.php?mod=view&aid=$value[aid]">
                    <img src="data/attachment/$value[pic].thumb.jpg" />
                    <h1>{echo strip_tags($value[title])}</h1>
                    </a>
                </li>
            <!--{/loop}-->
            </ul>         
        <!--{/if}-->
    <!--{/if}-->

    <!--{if $ceo_listmodule == 3}-->
		<script src="template/mobile/toutiao_mobile/js/masonry.pkgd.min.js" type="text/javascript"></script>
        <script type="text/javascript">
		$(function(){
			var $container = $('#alist');
			$container.imagesLoaded( function(){
				$container.masonry({
					itemSelector : '.sub',
					gutterWidth : 20,
					isAnimated: true,
				});
			});
		});

        </script>
    <!--{/if}-->

    <!--{if $ceo_norepages > 1}--> 
        <!--{if $allnum > $ceo_photonum}-->
            <div id="ajaxtag"></div>
            <script type="text/javascript">
            var url = 'forum.php?mod=photo';
            var pages=$_G['page'];
            var allpage={echo $thispage = ceil($allnum / $ceo_photonum);};
            </script> 
            <!--{template common/ceo_ajaxpage}--> 
        <!--{/if}--> 
    <!--{else}-->
        <div class="pgbox">$pagenav</div>
    <!--{/if}--> 
<!--{else}-->
    <!--{eval dheader("location: $indexurl");exit; }-->
<!--{/if}-->