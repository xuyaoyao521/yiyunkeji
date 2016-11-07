<?php


if(!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
	exit('Access Denied');
}
define('APP', DISCUZ_ROOT.'./source/plugin/yingxiao_mobile_set/');
define('APP_URL', 'plugins&operation=config&identifier=yingxiao_mobile_set&pmod=admin_lang');
define('APP_LANG', APP.'cache/');
require_once APP.'lang.php';
require_once APP.'function.php';

$flag = isset($_GET['flag']) ? $_GET['flag'] : 0;

if($flag == 1) {
	$delete = $_GET['delete'];
	if(is_array($delete)) {
		foreach($delete as $value) {
			C::t('#yingxiao_mobile_set#admin_lang')->delete_by_langid($value);
		}
		cpmsg(m_lang('OK_del'), 'action=' .APP_URL, 'succeed');
	}
	unset($delete);
	
	$langvar =  $_GET['langvar'];
	$langstr =  $_GET['langstr'];
	$lang = array();
	foreach($langvar as $key => $la) {
		$lang[$la] = $langstr[$key];
	}
	$settingnew = C::t('#yingxiao_mobile_set#admin_lang')->fetch_all();
	foreach($settingnew as $mod)
	{
		if($mod['langstr'] != $lang[$mod['langvar']]) {
			C::t('#yingxiao_mobile_set#admin_lang')->update_by_langid($mod['langid'], $lang[$mod['langvar']]);
		}
	}
	
	if(strlen($_GET['addlangvar']) > 0) {
		if(!$lang[$_GET['addlangvar']]) {
			C::t('#yingxiao_mobile_set#admin_lang')->insert($_GET['addlangvar'], $_GET['addlangstr']);
			cpmsg(m_lang('OK_add'), 'action=' .APP_URL, 'error'); 
		}
		else {cpmsg(m_lang('lang_error_add'), 'action=' .APP_URL, 'error'); }
	}
	unset($lang);
	
	$settingnew = C::t('#yingxiao_mobile_set#admin_lang')->fetch_all();
	$m_lang = array();
	foreach($settingnew as $mod)
	{
		$m_lang[$mod['langvar']] = $mod['langstr'];
	}
	if(CHARSET =='gbk'){
	}else{
		$m_lang = array_iconv('utf-8','gbk',$m_lang);
	}
	//print_r($m_lang);die();
	$cachefile = "./source/plugin/yingxiao_mobile_set/cache/lang.php";
	file_put_php( $cachefile, $m_lang );
	unset($settingnew);
	unset($m_lang);

}

shownav('plugin', $plugin['name'], m_lang('nav_style_title'));
echo '<link rel="stylesheet" href="./source/plugin/yingxiao_mobile_set/template/style.css" type="text/css">';
showformheader(APP_URL . '&flag=1');
showtableheader(m_lang('nav_style_title'), 'nobottom');
showsubtitle(array(m_lang('lang_del_str'), m_lang('lang_var'), '', m_lang('lang_str'), m_lang('lang_echo')));

$settingnew = C::t('#yingxiao_mobile_set#admin_lang')->fetch_all();
if(count($settingnew)) {
	foreach($settingnew as $mod)
	{
		showtablerow('', array('class="td1"','class="td2"','class="td3"','class="td4"','class="td5"'), array(
		'<input type="checkbox" class="checkbox" name="delete[]" value="'.$mod[langid].'" />', '<input type="text" name="langvar[]" value="'.$mod[langvar].'" />', '=>',
		'<input type="text" name="langstr[]" value="'.$mod[langstr].'" />', '<input type="text" name="langecho[]" value="{echo m_lang(\''.$mod[langvar].'\')}" />'
		));
	}
	showtablerow('', array('class="td1"','class="td2"','class="td3"','class="td4"','class="td5"'), array(
	m_lang('lang_add_str'), '<input type="text" name="addlangvar" value="" />',	'=>', '<input type="text" name="addlangstr" value="" />', ''
	));
	showsubmit('sumbit', m_lang('button_submit'));
	showtablefooter();
	showformfooter();
}
else {cpmsg('error_fetch', '', 'error');}


?>