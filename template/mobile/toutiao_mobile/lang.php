<?php

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

//����, ���޸�ע�������
function m_lang($f) {	
$m_lang = array(
	'home' => '��ҳ',
	'portal' => '�Ż�',
	'toutiao' => 'ͷ��',
	'forum' => '��̳',
	'pic' => '��ͼ',
	'guide' => '����',
	'tag' => '��ǩ',
	'channel' => 'Ƶ��',
	'group' => 'Ⱥ��',
	'me' => '��',
	'mycenter' => '��Ա����',
	'myexit' => '�˳���¼',
	
	'mdoing' => '��¼',
	'mfollow' => '�㲥',
	'mfriend' => '����',
	'mfriendall' => 'ȫ��',
	'mfriendol' => '���ߺ���',
	'mfriendbl' => '������',
	'mfriendrq' => '��������',
	'mfriendprofile' => '����',
	'mfriendgroup' => '����',
	'mefriend_doing' => '�Һͺ���',
	'friend_feed' => '���Ѷ�̬',
	'mthreads' => '����',
	'mblog' => '��־',
	'mfeed' => '��̬',
	'photo' => '���',
	'subforums' => '�Ӱ��',
	'threadtype' => '����',
	'forum_subforums' => '�Ӱ��',
	'forum_info' => '���� >',
	'forum_fav' => '+�ղ�',
	'forum_fav_OK' => '���ղ�',
	'pta' => '������',
	'acom' => '�鿴����',
	'tlock' => '�ر�',
	'ts1' => 'ͶƱ',
	'ts2' => '��Ʒ',
	'ts3' => '����',
	'ts4' => '�',
	'ts5' => '����',
	'tdis' => '�ö�',
	'tdig' => '����',
	'tatt' => 'ͼƬ',
	'tads' => '�ƹ�',
	'views' => '�鿴',
	'reply' => '�ظ�',
	'post' => '����',
	'send_thread' => '����������',
	'join_thread' => '����/�ظ�����',
	'edit_thread' => '�༭����',
	'thread_setanswer' => '��ȷ��Ҫ�Ѹûظ�ѡΪ"��Ѵ�"��',
	'thread_reply' => '�ظ�',
	'blog_reply' => '����',
	'portal_reply' => '����',
	'profile' => '��������',
	'favorite' => '�ղ�',
	'mypm' => '�ҵ���Ϣ',
	'mthread' => '����',
	'mforum' => '���',
	'marticle' => '����',	
	'back' => '����',
	'search' => '����',
	'searchportal' => '��������',
	'new_remind' => '��������',	
	'tthread' => '����',
	'photo_picnum' => '��ͼƬ',
	'all' => 'ȫ��',
	'datetime_format' => 'ʱ���ʽ��',
	
	
	'user_nologin' => '����û�е�¼Ŷ���Ͽ�ȥ��¼�ɣ�',
	'noid' => 'û���˺�?',
	'yesid' => '�����˺�?',	
	'load' => '���ظ���',
	'load_photo' => '�鿴����ͼƬ',
	'load_pic' => '������...',
	'load_last' => '���һҳ',
	'ucspeed' => '��ر�UC������ļ���ģʽ��<br />�ٳ���ˢ�´�ҳ��',			
	'openhome' => '�������',			
	'indextopnav' => '��վ����',
	'toutiao_tab1' => 'ͷ���б�tab��ʾ',
	'toutiao_tab2' => 'ͷ���б���ʾ',
	'toutiao_nolist' => '��������',
	'toutiao_list_forum' => '���',
	'toutiao_list_portal' => 'Ƶ��',
	'toutiao_list_diy' => '�Զ������',
	
	'post_default_text1' => '��Ҳ˵һ��',
	'post_default_text2' => 'д����...',
	
	'share_tit' => '����',
	'share_weixin' => '΢��',
	'share_qzone' => 'QQ�ռ�',
	'share_tsina' => '����΢��',
	'share_tqq' => '��Ѷ΢��',
	'share_exit' => 'ȡ������',
	'share_weixin_alert' => '����΢�Ŵ򿪱�ҳ�沢�����Ͻǲ˵�����',
	
	'adv_exit' => '�������',		
	'side_exit' => '����˴�����',		
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