<?php
/**
 * 极光推送-V2. PHP服务器端
 * @author 夜阑小雨
 * @Email 37217911@qq.com
 * @Website http://www.yelanxiaoyu.com
 * @version 20130118 
 */

include('/push/jpush.php');

include('/push/config.inc.php'); 

include('/push/db.class.php');  

	
    switch ($_REQUEST['type']){
        	case 'send':	
			$n_title   =  $_REQUEST['n_title'];
			$n_content =  $_REQUEST['n_content'];	
			$n_extras =  $_REQUEST['n_extras'];
		
					
			$receiver_value = '';	
			dataConnect();
			$sql = "SELECT max(id) from ".DB_TAB."";
			$result = mysql_query($sql);
			$result= mysql_fetch_array($result);
			//print_r($result); 
			//echo "<br>";			
			$sendno = $result[0]+1;
			$platform = platform ;
			$msg_content = json_encode(array('n_builder_id'=>0, 'n_title'=>$n_title, 'n_content'=>$n_content,'n_extras'=>array('tid'=>$n_extras)));      
			$obj = new jpush(masterSecret,appkeys);			 
			$res = $obj->send($sendno, 4, $receiver_value, 1, $msg_content, $platform);		
			
			
			exit();		 
			break;	
				
        	case 'check':
			break;
			
	}





?>