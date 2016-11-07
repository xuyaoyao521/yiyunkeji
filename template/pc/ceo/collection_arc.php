<?php exit;?>
<!--{eval define('TEMP_APP', DISCUZ_ROOT.'./template/pc/ceo/');}-->
<!--{eval require_once(TEMP_APP.'ceo_lang.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_function.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_collection_arc.php');}-->

<ul class="listBox" id="alist">
    <!--{if $toutiaolist}-->
   

       
            <!--{template ceo/forum_coll}-->
       



    <!--{else}-->
    
  
    <li class="wmt">当前收藏暂时没有文章...</li>
    
    <!--{/if}-->

    </ul>
   
    <div id="ajaxtag"></div>
    <script type="text/javascript">
        var url = 'home.php?mod=collection$ceo_url';
        var pages=1;
        var allpage={echo $thispage = ceil($allnum / $ceo_num);};
		jq(function(){
			if(pages==allpage){
				
				jq(".info_page a").html("最后一页").hide();
			}	
			if(allpage==0){
					jq(".info_page a").html("最后一页").hide();
			}
		})
    </script> 
    <div class="evaluate_content" id="loadmore">   
                    <div class="info_page"><a href="javascript:;">点击加载更多</a></div>
                </div>
<script src="template/pc/ceo/ceo_ajaxpage_collection.js"></script>




