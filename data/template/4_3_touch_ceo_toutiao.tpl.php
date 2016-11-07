<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('toutiao');?>
<?php require_once(TEMP_APP.'function_toutiao.php');?><?php require_once(TEMP_APP.'ceo_toutiao.php');?><link rel="stylesheet" href="template/mobile/toutiao_mobile/css/mod_toutiao.css" type="text/css" media="all"><?php include template('ceo/header'); if(!$_GET['mods'] && $curPage == 1) { ?>
    <?php tplhtmlcode('toutiao_code',$ceo_piclistcode);?><?php } if($ceo_module == 1) { ?>
    <?php include template('ceo/forum'); } if($ceo_module == 2) { ?>
    <?php include template('ceo/portal'); } ?>

