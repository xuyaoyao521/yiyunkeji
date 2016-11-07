<?php
require './source/class/class_core.php';  

require './source/function/function_forum.php';
$discuz = & discuz_core::instance();  
$discuz->init_cron = false;  
$discuz->init_session = false;  
$discuz->init();  
//echo $_G['uid'];  
if($_GET['act']=="notinterested"){
	if(!$_G['uid']){
		echo 0;
		exit;	
	}else{
		$notinterested=DB::result_first("SELECT notinterested FROM " .DB::table('forum_notinterested')." where uid=".$_G['uid']);	
		if($notinterested){
			$istrue=0;
			$arr = explode(",",$notinterested);
				foreach($arr as $u){
					if($u==$_POST['tid']){
						$istrue=1;
						break;	
					}
				}
			if($istrue==0){
				$notinterested.=",".$_POST['tid'];	
			}
			DB::update('forum_notinterested', array('notinterested'=>$notinterested),array('uid'=> $_G['uid']));
			echo 1;
			exit;		
		}else{
			DB::insert('forum_notinterested',array('uid'=>$_G['uid'],"notinterested"=>$_POST['tid']));
			
			echo 1;
			exit;	
		}
		
	}	
	
} 
if($_GET['act']=="getpinglun"){
	require_once libfile('function/discuzcode');
	
	$start_limit=($_G['forum_pagebydesc'] ? $_G['forum_ppp2'] : $_G['ppp'])*($_GET['page']-1);
	
	$commontlists = C::t('forum_post')->fetch_all_debatepost_viewthread_by_tid_commont($_GET['tid'], "", 0, "", "", 0, $start_limit, ($_G['forum_pagebydesc'] ? $_G['forum_ppp2'] : $_G['ppp']));
	foreach($commontlists as $kkk=>$vvv){
				
					$commontlists[$kkk]['message'] = discuzcode($vvv['message'],$vvv['smileyoff'], $vvv['bbcodeoff'], 0, $_G['forum']['allowsmilies'], -1,1,0, 0, 0, $vvv['authorid'], "", $vvv['pid'], $_G['setting']['lazyload'], $vvv['dateline'], 0);
					
					
					$commontlists[$kkk]['dateline']=dgmdate($vvv['dateline'], 'u', '9999', getglobal('setting/dateformat').' H:i:s');
					
					
					
	}
	$html="";
	foreach($commontlists as $k=>$v){
			$html.='<dl class="info">
                 
				   <dt><p><img src="uc_server/avatar.php?uid='.$v[authorid].'&size=middle"></p>'.$v[author].'</dt>
                        <dd>
                        	<div class="info_title">'.$v[dateline].'<span>|</span>来自PC电脑端</div>
                            <div class="info_content">'.$v[message].'</div>
                            <div class="info_function">
                          
                            <a href="forum.php?mod=post&action=reply&fid='.$_G[fid].'&tid='.$_G[tid].'&repquote='.$v[pid].'"';
							
							  if ($_G['uid']){
							  
							  $html.='onClick="pinglunzan('.$v[pid].',this)"';
							  }
							  else {
								 $html.='onclick="showWindow(\'login\', this.href)"';
							  }
							  $html.='title="点赞">'.$v[zhichi].'</a>';
							  
							  
                           
                           
						
							 $html.='<a  href="forum.php?mod=post&action=reply&fid='.$v[fid].'&tid='.$v[tid].'&repquote='.$v[pid].'" onclick="showWindow(\'reply\', this.href)" title="回复">回复</a>';
						
							
                            
                            
							 
							  if ($v['authorid'] != $_G['uid']){
							$html.='<a href="javascript:;" class="complain" onclick="showWindow(\'miscreport'.$v[pid].'\', \'misc.php?mod=report&rtype=post&rid='.$v[pid].'&tid='.$v[tid].'&fid='.$v[fid].'\', \'get\', -1);return false;">举报</a>';
							  }
							 
							 
							$html.=' </div>
                        </dd>
</dl>';
	}
	echo $html;	
}
if($_GET['act']=="fenxiang"){
	$tid=$_POST["tid"];
	DB::query("update  " .DB::table('forum_thread')." set sharetimes=sharetimes+1 where  tid=".$tid);	
		
}
if($_GET['act']=="duanzizan"){
	$type=$_POST["type"];
	$tid=$_POST["tid"];
	$ip=$_SERVER["REMOTE_ADDR"]; 
	
	if(!$_G['uid']){
		$id=DB::result_first("SELECT id FROM " .DB::table('froum_zan')." where openid='".$openid."' and tid=".$tid." and type=".$type);	
		if($id){
			echo 0;
			exit;	
		}else{
			DB::insert('froum_zan',array("openid"=>$_COOKIE['openid'],'tid'=>$tid,'type'=>$type));
			if($type==1){
			DB::query("update  " .DB::table('forum_thread')." set ding=ding+1 where  tid=".$tid);	
			}else{
			DB::query("update  " .DB::table('forum_thread')." set bishi=bishi+1 where  tid=".$tid);
			}
			echo 1;
			exit;	
		}
	}else{
		$id=DB::result_first("SELECT id FROM " .DB::table('froum_zan')." where uid='".$_G['uid']."' and tid=".$tid." and type=".$type);	
		if($id){
			echo 0;
			exit;	
		}else{
			DB::insert('froum_zan',array("uid"=>$_G['uid'],'tid'=>$tid,'type'=>$type));
			if($type==1){
			DB::query("update  " .DB::table('forum_thread')." set ding=ding+1 where  tid=".$tid);	
			}else{
			DB::query("update  " .DB::table('forum_thread')." set bishi=bishi+1 where  tid=".$tid);
			}
			echo 1;
			exit;	
		}
		
	}
	
	
} 



if($_GET['act']=="feedback"){
	$contact=$_POST["contact"];
	$content=$_POST["content"];
	
	$todaytime=strtotime(date('Y-m-d'));
	$mintime=strtotime(date('Y-m-d',strtotime('+1 day')));
	
	$count=DB::result_first("SELECT count(id) FROM " .DB::table('feedback')." where uid='".$_G['uid']."' and datetime>=".$todaytime." and datetime<=".$mintime);
	if($count>=3){
			echo 0;
			exit;
	}	else{
			DB::insert('feedback',array('contact'=>$contact,'content'=>$content,"uid"=>$_G['uid'],'datetime'=>time()));
			
			echo 1;
			exit;	
	}

} 

if($_GET['act']=="delete_coll"){
	$tid=$_POST['tid'];
	DB::query("delete from " .DB::table('home_favorite')." where uid=".$_G['uid']." and id=".$tid." and idtype='tid'")	;
	echo 1;
	exit;
}

if($_GET['act']=="delete_dingyue"){
	$puid=$_POST['id'];
	DB::query("delete from " .DB::table('froum_dingyue')." where uid=".$_G['uid']." and puid=".$puid."")	;
	echo 1;
	exit;
}

if($_GET['act']=="sendsms"){
	$mobile=$_POST['mobile'];
	$code=$_POST['code'];
	
	
	$code=check_seccode($code, "login");
	
	if($code){
		
		$CheckCode= rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
		
		setcookie('mobile', $mobile, time()+600);
		setcookie('checkcode', md5($CheckCode), time()+600);
		
		$sendUrl = 'http://sms.outeng.net/public/sendsms'; 
		$smsConf = array(
					'key'   => 'ALoSOttj3SNbJI1ZUeFtJypBPdlg90VL', 
					'mobile'    => $mobile,
					'tpl_id'    => '29', 
					'tpl_value' =>'#code#='.$CheckCode
				);
		$status=otcurl($sendUrl,$smsConf,1);
		if(!$status){
		echo 1;
		exit;
		}
		else{
			echo 3;
			exit;	
		}
	}else{
		echo 2;
		exit;	
	}
		
	
}
if($_GET['act']=="mobilelogin"){
	$mobile=$_POST['mobile'];
	$code=$_POST['code'];
	$mcode=$_POST['mcode'];
	$data=array();
	if(!$mobile){
		$data['error']=1;
		$data['msg']="请输入手机号码！";
		echo json_encode($data);
		exit;	
	}
	if(!$code){
		$data['error']=1;
		$data['msg']="请输入验证码！";
		echo json_encode($data);
		exit;	
	}
	if(!$mcode){
		$data['error']=1;
		$data['msg']="请输入手机验证码！";
		echo json_encode($data);
		exit;	
	}
	if(!$_COOKIE['checkcode']){
		$data['error']=1;
		$data['msg']="请获取手机验证码！";
		echo json_encode($data);
		exit;	
	}
	if(md5($mcode)!=$_COOKIE['checkcode']){
			$data['error']=1;
		$data['msg']="手机验证码不正确！";
		echo json_encode($data);
		exit;	
	}
	if($mobile!=$_COOKIE['mobile']){
		$data['error']=1;
		$data['msg']="手机号码与手机验证码不匹配！";
		echo json_encode($data);
		exit;		
	}
	
	$code=check_seccode($code, "login");
	if(!$code){
		$data['error']=1;
		$data['msg']="验证码不正确！";
		echo json_encode($data);
		exit;		
	}
	
	$uid=DB::result_first("SELECT uid FROM " .DB::table('common_member_profile')." where mobile='".$mobile."'");	
	$member = getuserbyuid($uid, 1);
	require './source/function/function_member.php';
	$cookietime = 1296000;
	if(!$member){
		$username='U_'.getRandChar(6);
		$uid=DB::insert('ucenter_members',array("username"=>$username,'password'=>md5($mcode),'email'=>$mobile."@163.com","regip"=>$_SERVER["REMOTE_ADDR"],'regdate'=>time()),1);
		
		
		
		$password = md5(random(10));
		DB::insert('common_member',array('uid'=>$uid, 'username'=>$username, 'password'=>$password, 'email'=>$mobile."@163.com",'groupid'=>10,'regdate'=>time()));
		DB::insert('common_member_profile',array('uid'=>$uid, 'mobile'=>$mobile));
		DB::insert('common_member_count',array('uid'=>$uid));
		DB::insert('common_member_field_forum',array('uid'=>$uid,'customshow'=>26));
		DB::insert('common_member_status',array('uid'=>$uid,'regip'=>$_SERVER["REMOTE_ADDR"],'lastip'=>$_SERVER["REMOTE_ADDR"],'lastvisit'=>time(),'lastactivity'=>time()));
		$member = getuserbyuid($uid, 1);
		setloginstatus($member, $cookietime);
		
		$data['error']=0;
		$data['msg']="登录成功！";
		echo json_encode($data);
		exit;
	}
	else{
		
		setloginstatus($member, $cookietime);
		
		$data['error']=0;
		$data['msg']="登录成功！";
		echo json_encode($data);
		exit;
	}
}
if($_GET['act']=="pinglunzan"){
	
	$pid=$_POST["pid"];
	
	
	
		$id=DB::result_first("SELECT id FROM " .DB::table('froum_plzan')." where uid='".$_G['uid']."' and pid=".$pid);	
		if($id){
			echo 0;
			exit;	
		}else{
			DB::insert('froum_plzan',array("uid"=>$_G['uid'],'pid'=>$pid));
			
			DB::query("update  " .DB::table('forum_post')." set zhichi=zhichi+1 where  pid=".$pid);	
			
			echo 1;
			exit;	
		}
		

	echo $ip;
	
} 


if($_GET['act']=="plunzan"){
	
	$pid=$_POST["pid"];
	
	
	
		$id=DB::result_first("SELECT id FROM " .DB::table('forum_hotreply_user')." where (uid='".$_G['uid']."' or openid='".$openid."') and pid=".$pid." and type=1");	
		if($id){
			echo 0;
			exit;	
		}else{
			
		
			
			DB::insert('forum_hotreply_user',array("uid"=>$_G['uid'],'pid'=>$pid,'type'=>'1','datetime'=>time(),'openid'=>$openid));
			
			$nid=DB::result_first("SELECT pid FROM " .DB::table('forum_hotreply_number')." where pid=".$pid);	
			if($nid){
			DB::query("update  " .DB::table('forum_hotreply_number')." set support=support+1,total=total+1 where  pid=".$pid);	
			}else{
			DB::insert('forum_hotreply_number',array('pid'=>$pid,'tid'=>'','support'=>1,'against'=>1,'total'=>1));		
			}
			echo 1;
			exit;	
		}
		

	echo $ip;
	
} 


if($_GET['act']=="dingyue"){
	
	$uid=$_POST["uid"];
	
	
	
		$id=DB::result_first("SELECT id FROM " .DB::table('froum_dingyue')." where uid='".$_G['uid']."' and puid=".$uid);	
		if(!$_G['uid']){
			echo 2;
			exit;		
		}
		if($id){
			echo 0;
			exit;	
		}else{
			DB::insert('froum_dingyue',array("uid"=>$_G['uid'],'puid'=>$uid));
			
			
			
			echo 1;
			exit;	
		}
		

	echo $ip;
	
} 


if($_GET['act']=="collection_arc"){
	
		$tid=$_POST["tid"];
	
		if(!$_G['uid']){
			echo 2;
			exit;
		}
	
		$id=DB::result_first("SELECT favid FROM " .DB::table('home_favorite')." where idtype='tid' and id=".$tid." and uid=".$_G['uid']);	
		if($id){
			echo 0;
			exit;	
		}else{
			DB::insert('home_favorite',array("uid"=>$_G['uid'],'id'=>$tid,'idtype'=>'tid'));
			
			
			
			echo 1;
			exit;	
		}
		

	echo $ip;
	
}
if($_GET['act']=="get_login"){
	if($_G['uid'])
	echo 1;
	else
	echo 0;
	
	exit;	
}


if($_GET['act']=="delete_post"){
	$pid=$_POST['pid'];
	$tid=$_POST['tid'];
	$id=DB::result_first("SELECT pid FROM " .DB::table('forum_post')." where tid=".$tid." and pid=".$pid." and authorid=".$_G['uid']);
	if($id){
		DB::query("update  " .DB::table('forum_post')." set invisible=-5  where tid=".$tid." and pid=".$pid." and authorid=".$_G['uid']);
		echo 1;	
	}else{
		echo 0;		
	}
	
	exit;
}

 function otcurl($url,$params=false,$ispost=0){
		$httpInfo = array();
		$ch = curl_init();
	 
		curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
		curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
		curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
		if( $ispost )
		{
			curl_setopt( $ch , CURLOPT_POST , true );
			curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
			curl_setopt( $ch , CURLOPT_URL , $url );
		}
		else
		{
			if($params){
				curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
			}else{
				curl_setopt( $ch , CURLOPT_URL , $url);
			}
		}
		$response = curl_exec( $ch );
		if ($response === FALSE) {
			//echo "cURL Error: " . curl_error($ch);
			return false;
		}
		$httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
		$httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
		curl_close( $ch );
		return $response;
	}
	
function getRandChar($length){
   $str = null;
   $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
   $max = strlen($strPol)-1;
   for($i=0;$i<$length;$i++){
    $str.=$strPol[rand(0,$max)];//rand($min,$max)生成介于min和max两个数之间的一个随机整数
   }
   return $str;
  }
?>