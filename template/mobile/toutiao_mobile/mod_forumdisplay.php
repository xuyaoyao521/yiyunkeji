<?php
require_once TEMP_APP.'function_toutiao.php';

$settings = $_G['cache']['plugin']['yingxiao_mobile_set'];

$ceo_forum_toutiao = isset($settings['ceo_forum_toutiao']) ? dunserialize($settings['ceo_forum_toutiao']) : 0;
$ceo_forum_tieba = isset($settings['ceo_forum_tieba']) ? dunserialize($settings['ceo_forum_tieba']) : 0;
$ceo_listmodule = isset($settings['ceo_forum_pic']) ? intval($settings['ceo_forum_pic']) : 1;

$ceo_ForumStyle = 0;
foreach($ceo_forum_toutiao as $fs) {
	if($fs == $_G['forum']['fid']) {
    	$ceo_ForumStyle = 1;
        break;
    }
}
foreach($ceo_forum_tieba as $fs) {
	if($fs == $_G['forum']['fid']) {
    	$ceo_ForumStyle = 2;
        break;
    }
}
if($ceo_ForumStyle != 0) {
	$settings = $_G['cache']['plugin']['yingxiao_toutiaom'];
	$ceo_message = isset($settings['ceo_message']) ? intval($settings['ceo_message']) : 0;
	$ceo_messagenum = isset($settings['ceo_messagenum']) ? intval($settings['ceo_messagenum']) : 100;
	$ceo_picwidth = isset($settings['ceo_picwidth']) ? intval($settings['ceo_picwidth']) : 150;
	$ceo_picheight = isset($settings['ceo_picheight']) ? intval($settings['ceo_picheight']) : 100;
	$ceo_pictype = isset($settings['ceo_pictype']) ? trim($settings['ceo_pictype']) : 'fixwr';
}

?>
