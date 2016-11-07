<?php exit;?>
<!--{eval define('TEMP_APP', DISCUZ_ROOT.'./template/pc/ceo/');}-->
<!--{eval require_once(TEMP_APP.'ceo_lang.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_function.php');}-->
<!--{eval require_once(TEMP_APP.'ceo_imglist.php');}-->

<ul class="listBox" id="alist">
    <!--{if $toutiaolist}-->
   

        <!--{if $ceo_module == 1}-->
            <!--{template ceo/forum_imglist}-->
        <!--{/if}-->
       



    <!--{else}-->
    <li class="wmt">当前频道暂时没有文章...</li>
    <!--{/if}-->

    </ul>
   
    <div id="ajaxtag"></div>
    <script type="text/javascript">
        var url = 'forum.php?mod=forumdisplay$ceo_url';
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




