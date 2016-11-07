<?php exit;?>
<!--{eval define('TEMP_APP', DISCUZ_ROOT.'./template/pc/ceo/');}-->
<!--{eval require_once(TEMP_APP.'ceo_lang.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_function.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_toutiao.php');}-->


<!--{if $top_list}-->
<div class="Focus_main">
			 <!--{eval $i = 0;}-->
			<!--{loop $top_list $v}-->
            <!--{eval $i++;}-->
            <!--{if $i==1}-->
        	<div class="fm_left background"><a href="forum.php?mod=viewthread&tid=$v[tid]"></a><img class="fade" data-original="$v['pic']" src="/public/images/NO_IMG.jpg"><div class="fm_title"><p>{$v[subject]}</p></div></div>
            <!--{else}-->
            <div class="fm_right background"><a href="forum.php?mod=viewthread&tid=$v[tid]"></a><img class="fade" data-original="$v['pic']" src="/public/images/NO_IMG.jpg"><div class="fm_title"><p>{$v[subject]}</p></div></div>
            <!--{/if}-->
         	<!--{/loop}-->
        </div>
<!--{/if}-->

<ul class="listBox" id="alist">
    <!--{if $toutiaolist}-->
   

        <!--{if $ceo_module == 1}-->
            <!--{template ceo/forum}-->
        <!--{/if}-->
        <!--{if $ceo_module == 2}-->
            <!--{template ceo/portal}-->
        <!--{/if}-->



    <!--{else}-->
    
    <!--{if $keyword==""}-->
    <li class="wmt">当前频道暂时没有文章...</li>
     <!--{else}-->
      <li class="wmt">暂无搜索结果</li>
    <!--{/if}-->
    <!--{/if}-->

    </ul>
   
    <div id="ajaxtag"></div>
    <script type="text/javascript">
        var url = 'portal.php?mod=toutiao$ceo_url';
        var pages=$_G['page'];
        var allpage={echo $thispage = ceil($allnum / $ceo_num);};
		jq(function(){
			if(pages==allpage){
				jq("#ceo_load").hide();	
				jq("#ceo_loadlast").html("最后一页").show();
			}	
			if(allpage==0){
					jq("#ceo_load").hide();	
			}
		})
    </script> 
    <div class="a_pg" id="a_pg">
        <div id="ceo_loading" style="display:none;"><img src="template/index/images/loading.gif" /> {echo m_lang('load_pic')}</div>
        <div id="ceo_loadlast" style="display:none;"><a href="javascript:" >{echo m_lang('load_last')}</a></div>
        <div id="ceo_load"><a href="javascript:" >{echo m_lang('load')}</a></div>
    </div>
<script src="template/pc/ceo/ceo_ajaxpage.js"></script>




