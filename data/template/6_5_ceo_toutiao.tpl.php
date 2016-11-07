<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); define('TEMP_APP', DISCUZ_ROOT.'./template/pc/ceo/');?><?php require_once(TEMP_APP.'ceo_lang.php');?><?php require_once(TEMP_APP.'ceo_function.php');?><?php require_once(TEMP_APP.'ceo_toutiao.php');?><?php if($top_list) { ?>
<div class="Focus_main">
 <?php $i = 0;?><?php if(is_array($top_list)) foreach($top_list as $v) { ?>            <?php $i++;?>            <?php if($i==1) { ?>
        	<div class="fm_left background"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $v['tid'];?>"></a><img class="fade" data-original="<?php echo $v['pic'];?>" src="/public/images/NO_IMG.jpg"><div class="fm_title"><p><?php echo $v['subject'];?></p></div></div>
            <?php } else { ?>
            <div class="fm_right background"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $v['tid'];?>"></a><img class="fade" data-original="<?php echo $v['pic'];?>" src="/public/images/NO_IMG.jpg"><div class="fm_title"><p><?php echo $v['subject'];?></p></div></div>
            <?php } ?>
         	<?php } ?>
        </div>
<?php } ?>

<ul class="listBox" id="alist">
    <?php if($toutiaolist) { ?>
   

        <?php if($ceo_module == 1) { ?>
            <?php include template('ceo/forum'); ?>        <?php } ?>
        <?php if($ceo_module == 2) { ?>
            <?php include template('ceo/portal'); ?>        <?php } ?>



    <?php } else { ?>
    
    <?php if($keyword=="") { ?>
    <li class="wmt">当前频道暂时没有文章...</li>
     <?php } else { ?>
      <li class="wmt">暂无搜索结果</li>
    <?php } ?>
    <?php } ?>

    </ul>
   
    <div id="ajaxtag"></div>
    <script type="text/javascript">
        var url = 'portal.php?mod=toutiao<?php echo $ceo_url;?>';
        var pages=<?php echo $_G['page'];?>;
        var allpage=<?php echo $thispage = ceil($allnum / $ceo_num);; ?>;
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
        <div id="ceo_loading" style="display:none;"><img src="template/index/images/loading.gif" /> <?php echo m_lang('load_pic'); ?></div>
        <div id="ceo_loadlast" style="display:none;"><a href="javascript:" ><?php echo m_lang('load_last'); ?></a></div>
        <div id="ceo_load"><a href="javascript:" ><?php echo m_lang('load'); ?></a></div>
    </div>
<script src="template/pc/ceo/ceo_ajaxpage.js" type="text/javascript"></script>




