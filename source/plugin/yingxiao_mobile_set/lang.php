<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//����, ���޸�ע�������
function m_lang($f) {	
$m_lang = array(
	'nav_style_title' => 'ģ����ɫ����',
	'nav_style_list' => '��ɫ�����б�',
	'nav_style_add' => '�������ɫ����',
	'nav_url_edit' => '�༭��ɫ����',

	'style_name' => '��ɫ�������ƣ����Ȳ�����9�����֣�',
	//'style_file' => '��ɫ����css�ļ���������С��16λ��Ӣ����ĸ��',
	'style_htmlbg' => 'ҳ�汳��ɫ',
	'style_isopen' => 'ҳ�汳��ͼƬ',
	'style_smenuorder' => 'ͷ������ɫ',
	'style_smenulogo' => 'ͷ������ɫ',
	'style_boxbg' => '���鱳��ɫ',
	'style_buttonbg' => '��ť����ɫ',
	'style_buttontext' => '��ť����ɫ',
	'style_selectbg' => '���㱳��ɫ',
	'style_selecttext' => '��������ɫ',
	'style_userinfobg' => '�û����ı���ɫ',
	'style_userinfobgimg' => '�û����ı���ͼƬ',
	'style_loginbg' => '��¼ע��ҳ����ɫ',
	'style_loginbgimg' => '��¼ע��ҳ����ͼƬ',
	'style_btoolbg' => '�ײ���������ɫ',
	'style_btooltext' => '�ײ���������ɫ',
	'style_btooltexthover' => '�ײ�������������ɫ',
	'style_html_style' => '�Զ���ҳ��CSS����',
	'style_btool_style' => '�Զ���ײ�����CSS����',
	
	'style_list1' => 'ID',
	'style_list2' => '��ɫ��������',
	'style_list3' => '״̬',
///////////////////////////////////////////////////////////////////
	'sidemenus_title' => '�Ҳ�˵�����',
	'sidemenus_list' => '�Ҳ�˵��б�',
	'sidemenus_add' => '����Ҳ�˵�',
	'sidemenus_edit' => '�༭�Ҳ�˵�',

	'sidemenus_id' => 'ID',
	'sidemenus_name' => '����',
	'sidemenus_url' => '����',
	'sidemenus_logo' => 'ͼ��',
	'sidemenus_order' => '����ʾ˳��',
	
	'smenuname' => '��ʾ��',
	'smenuurl' => '����',
	'smenuorder' => '��ʾ˳��',
	'isopen' => '�Ƿ�����',
	'smenulogo' => 'ͼ�����',

/********************************************************************/
	'lang_var' => '���Ա�����',
	'lang_str' => '���Ա���ֵ',
	'lang_echo' => '���Ա������ã�����ճ����ʹ��λ�ã�',
	'lang_del_str' => 'ɾ��',
	'lang_add_str' => '����',
	'lang_error_add' => '���ʧ�ܣ�������ͬ�ı�������',


	
	'button_add' => '���',
	'button_edit' => '�޸�',
	'button_del' => 'ɾ��',
	'button_submit' => '�ύ',
	'url_edit' => '�༭',
	'url_del' => 'ɾ��',
	'style_file' => '�����ļ�',
	'list_default' => 'Ĭ��',
	'list_default_set' => '��ΪĬ��',
	'list_oper' => '����',
	'list_hide' => '����',
	'list_show' => '��ʾ',
	
	'error_edit' => '�༭��������',
	'error_fetch' => '������ѯ����',
	'error_name' => '���Ʋ���Ϊ�գ�',
	

	'OK_add' => '��ӳɹ���',
	'OK_edit' => '�޸ĳɹ���',
	'OK_del' => 'ɾ���ɹ���',
	'OK_default' => '��ΪĬ�ϳɹ���',
	'OK_file' => '�ɹ������ļ���',
	'exit' => '�˳�'			
    );
	if($m_lang[$f]) $f = $m_lang[$f]; 
	if(CHARSET =='gbk'){
		return $f;
	}else{
		return diconv($f,'GBK',CHARSET);
	}
}

?>