<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); define('TEMP_APP', DISCUZ_ROOT.'./template/pc/ceo/');?><?php require_once(TEMP_APP.'ceo_lang.php');?><?php require_once(TEMP_APP.'ceo_function.php');?><?php require_once(TEMP_APP.'ceo_collection_duanzi.php');?><ul class="duanzilist" id="alistduanzi">
    <?php if($toutiaolist4) { ?>
   <?php if(is_array($toutiaolist4)) foreach($toutiaolist4 as $thread) { ?> 						 <li>
                
          
                	
                                <p><a  href="home.php?mod=auther&amp;uid=<?php echo $thread['authorid'];?>"><img src="uc_server/avatar.php?uid=<?php echo $thread['authorid'];?>&amp;size=middle"><?php echo $thread['author'];?></a></p>
                                <p><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>"><?php echo $thread['message'];?></a></p>
                                <div class="Satin_function" ><a href="javascript:;" class="praise <?php echo $thread['zanguo'];?>" onClick="forumzan(<?php echo $thread['tid'];?>,1,this)"><?php echo $thread['ding'];?></a><a href="javascript:;" class="despise <?php echo $thread['bishiguo'];?>"  onClick="forumzan(<?php echo $thread['tid'];?>,2,this)"><?php echo $thread['bishi'];?></a>
                                    <div class="Satin_r"><a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" class="evaluate"><?php if($thread['replies'] > 0) { ?><?php echo $thread['replies'];?><?php } else { ?>0<?php } ?>评价</a>
                                    </div>
                                </div>
                                    
                                           
                                
                                
                                    
                                    
                              
                         
                          
                                
                            </li>
<?php } ?>

    <?php } else { ?>
    
  
    <li class="wmt">当前收藏暂时没有段子</li>
    
    <?php } ?>

    </ul>
   
    <div id="ajaxtag4"></div>
    <script type="text/javascript">
        var url4 = 'home.php?mod=collection<?php echo $ceo_url;?>';
        var pages4=1;
        var allpage4=<?php echo $thispage4 = ceil($allnum / $ceo_num);; ?>;
jq(function(){
if(pages4==allpage4){

jq("#loadmore4 .info_page a").html("最后一页").hide();
}	
if(allpage4==0){
jq("#loadmore4 .info_page a").html("最后一页").hide();	
}
})
    </script> 
    <div class="evaluate_content" id="loadmore4" style="clear:both">   
                    <div class="info_page"><a href="javascript:;">点击加载更多</a></div>
                </div>
<script src="template/pc/ceo/ceo_ajaxpage_collection_duanzi.js" type="text/javascript"></script>




