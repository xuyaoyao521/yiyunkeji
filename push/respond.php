<?php

/**
 * ��������-V2. PHP��������
 * @author ҹ��С��
 * @Email 37217911@qq.com
 * @Website http://www.yelanxiaoyu.com
 * @version 20130118 
 */
 
 
 // ���ļ����������ܷ��������ڷ�����������Ϣ������������Ϣ�� ����ļ���ַ��Ҫ��д�ڼ�������portal�Ļص���ַ�����档


// ��Ϣ���ͻص��ӿ�
//����ڼ�������portal ����ע����Ϸ��Ļص�URL�ӿڣ�����Push Server��Ϣ���ͽ���ʱ�����ô˻ص��ӿڣ���������߷������ͽ����
//
//�뿪�����ṩ�˽ӿ�֧�� HTTP POST ����
//
//������������ǣ�"push_result"��
//
//�������ݣ�JSON ��ʽ������������µ���Ϣ��
//
//Key����	Value����˵��
//sendno	������š��ӿڵ���ʱָ���ġ�
//errcode	�����롣�ο��������붨��
//errmsg	����˵��
//total_user	�������������������û���
//send_cnt	�������͵�ǰ�����û���

 
include('/push/config.inc.php'); 
include('/push/db.class.php'); 

$ret = $_REQUEST['push_result'];

//print_r($_REQUEST);
$ret = stripslashes($ret); //ȥ��ת���

$res = json_decode($ret,true);


$result = array();

$res['app_keys'] = "1dad03ee5308c4eed680e920";// Ŀǰ�ٷ�û���ṩpush_result[app_keys],�������Լ�дһ���������Ȱ�����д��һ������ȥ��
//����ȹٷ��ṩ�������������ע�͵�����������app_keys���ж����Ǹ�app�ķ�����Ϣ��

 if ($res['app_keys'] == appkeys ){
	dataConnect();
	$sql = "UPDATE `".DB_TAB."` SET `total_user` = '".$res['total_user']."', `send_cnt` = '".$res['send_cnt']."' WHERE `sendno` = ".$res['sendno']."";
	echo "$sql";
	$query = mysql_query($sql);		
	//print_r($query); 
	 
 } 

record($ret);

function record($con)
{
	$con .= '  '.date('Y-m-d H:i:s',time())."\r\n";
	$handler = fopen('log.txt','a');
	fwrite($handler,$con);
	fclose($handler);
 
}
 
?>