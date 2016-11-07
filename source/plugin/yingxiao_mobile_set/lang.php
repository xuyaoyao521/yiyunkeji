<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//语言, 如修改注意标点符号
function m_lang($f) {	
$m_lang = array(
	'nav_style_title' => '模板配色设置',
	'nav_style_list' => '配色方案列表',
	'nav_style_add' => '添加新配色方案',
	'nav_url_edit' => '编辑配色方案',

	'style_name' => '配色方案名称（长度不大于9个汉字）',
	//'style_file' => '配色方案css文件名（长度小于16位的英文字母）',
	'style_htmlbg' => '页面背景色',
	'style_isopen' => '页面背景图片',
	'style_smenuorder' => '头部背景色',
	'style_smenulogo' => '头部字体色',
	'style_boxbg' => '区块背景色',
	'style_buttonbg' => '按钮背景色',
	'style_buttontext' => '按钮字体色',
	'style_selectbg' => '焦点背景色',
	'style_selecttext' => '焦点字体色',
	'style_userinfobg' => '用户中心背景色',
	'style_userinfobgimg' => '用户中心背景图片',
	'style_loginbg' => '登录注册页背景色',
	'style_loginbgimg' => '登录注册页背景图片',
	'style_btoolbg' => '底部导航背景色',
	'style_btooltext' => '底部导航字体色',
	'style_btooltexthover' => '底部导航焦点字体色',
	'style_html_style' => '自定义页面CSS代码',
	'style_btool_style' => '自定义底部导航CSS代码',
	
	'style_list1' => 'ID',
	'style_list2' => '配色方案名称',
	'style_list3' => '状态',
///////////////////////////////////////////////////////////////////
	'sidemenus_title' => '右侧菜单设置',
	'sidemenus_list' => '右侧菜单列表',
	'sidemenus_add' => '添加右侧菜单',
	'sidemenus_edit' => '编辑右侧菜单',

	'sidemenus_id' => 'ID',
	'sidemenus_name' => '名称',
	'sidemenus_url' => '链接',
	'sidemenus_logo' => '图标',
	'sidemenus_order' => '右显示顺序',
	
	'smenuname' => '显示名',
	'smenuurl' => '链接',
	'smenuorder' => '显示顺序',
	'isopen' => '是否隐藏',
	'smenulogo' => '图标代码',

/********************************************************************/
	'lang_var' => '语言变量名',
	'lang_str' => '语言变量值',
	'lang_echo' => '语言变量调用（复制粘贴到使用位置）',
	'lang_del_str' => '删除',
	'lang_add_str' => '新增',
	'lang_error_add' => '添加失败，已有相同的变量名！',


	
	'button_add' => '添加',
	'button_edit' => '修改',
	'button_del' => '删除',
	'button_submit' => '提交',
	'url_edit' => '编辑',
	'url_del' => '删除',
	'style_file' => '生成文件',
	'list_default' => '默认',
	'list_default_set' => '设为默认',
	'list_oper' => '操作',
	'list_hide' => '隐藏',
	'list_show' => '显示',
	
	'error_edit' => '编辑参数错误！',
	'error_fetch' => '参数查询错误！',
	'error_name' => '名称不能为空！',
	

	'OK_add' => '添加成功！',
	'OK_edit' => '修改成功！',
	'OK_del' => '删除成功！',
	'OK_default' => '设为默认成功！',
	'OK_file' => '成功生成文件！',
	'exit' => '退出'			
    );
	if($m_lang[$f]) $f = $m_lang[$f]; 
	if(CHARSET =='gbk'){
		return $f;
	}else{
		return diconv($f,'GBK',CHARSET);
	}
}

?>