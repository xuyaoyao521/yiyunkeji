<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="http://www.outeng.net/Public/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
            $(document).ready(function(){
               
            });       
			 function sendPushall(){
                var data = $('form#all').serialize();
                $('form#all').unbind('submit');  
				             
                $.ajax({
                    url: "eyun_admins.php?action=pushsend&type=send",
                    type: 'GET',
                    data: data,
                    beforeSend: function() {
						
						   html = "<b>请等待，正在发送中……</b>";
						  
						    $('.info').html(html);
                        
                    },
                    success: function(data, textStatus, xhr) {
                         // $('.txt_message').val("");			
						 
						 
						 			  
						  $('.info').html(data);
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        
                    }
                });
                return false;
            }
		 
        </script>
<link href="static/image/admincp/admincp.css?uGE" rel="stylesheet" type="text/css">
<style type="text/css">
body {
	text-align: left;
	overflow-x: hidden;
}
.info {
	color: #F00;
}
</style>
</head>
<body>
<div class="floattop" style="position:static;">
  <div class="itemtitle">
    <h3>消息推送</h3>
    <ul class="tab1">
      <li <?php if(!$_GET['type']){?>class="current"<?php }?>><a href="eyun_admins.php?action=push"><span>发送消息</span></a></li>
      <li <?php if($_GET['type']=='pushList'){?>class="current"<?php }?>><a href="eyun_admins.php?action=push&type=pushList"><span>推送记录</span></a></li>
    </ul>
  </div>
</div>
<?php
        include_once '/push/config.inc.php';
		include_once '/push/db.class.php'; 
		dataConnect();
		$sql = "SELECT * FROM ".DB_TAB." ORDER BY `created` DESC";
        $users = mysql_query($sql);
		//$info1 = mysql_fetch_row($users); 
		//print_r($info1);
		
        if ($users != false)
            $no_of_users = mysql_num_rows($users);
        else
            $no_of_users = 0;
		
		 switch ($_REQUEST['type']){
			 	case 'pushList':
				?>
 
  <div style="padding:0 20px">               
  <table class="tb tb2 fixpadding">
    <tbody>
      <tr class="header">
        <th>序号</th>
        <th>发送时间</th>
        <th>消息内容</th>
        <th>发送结果</th>
        <th>满足条件</th>
        <th>推送成功</th>
      </tr>
      

    <?php
                if ($no_of_users > 0) {
                    ?>
    <?php
                    while ($row = mysql_fetch_array($users)) {
                        ?>
    <tr class="hover">
        <td><?php echo $row["sendno"] ?></td>
        <td width="20%"><?php echo $row["created"] ?></td>
        <td width="40%"><?php echo $row["n_content"] ?></td>
        <td><?php echo $row["errmsg"] ?></td>
        <td><?php echo $row["total_user"] ?></td>
        <td><?php echo $row["send_cnt"] ?></td>
      </tr>

    <?php }
                } else { ?>
    <p> 暂无记录</p>
    <?php } ?>
    </tbody>
  </table>
  </div>
<?php 			
				break;
				default: 			 
			 ?>
<form id="all" method="post" onsubmit="return sendPushall()">

  <div style="padding:0 20px">
    <table class="tb tb2 fixpadding">
      <tbody>
        <tr onmouseover="setfaq(this, 'faqf4e1')">
          <td colspan="2" class="td27" s="1">推送标题：</td>
        </tr>
        <tr class="noborder" onmouseover="setfaq(this, 'faqf4e1')">
          <td class="vtop rowform"><input type="text" name="n_title" class="txt"></td>
          <td class="vtop tips2" s="1">注意：推送标题不填写，默认为“E云网”。</td>
        </tr>
        <tr onmouseover="setfaq(this, 'faqf4e1')">
          <td colspan="2" class="td27" s="1">新闻ID：</td>
        </tr>
        <tr class="noborder" onmouseover="setfaq(this, 'faqf4e1')">
          <td class="vtop rowform"><input type="text" name="n_extras" class="txt"></td>
          <td class="vtop tips2" s="1">注意：不进行新闻推送请留空。</td>
        </tr>
        <tr onmouseover="setfaq(this, 'faqf4e1')">
          <td colspan="2" class="td27" s="1">推送内容：</td>
        </tr>
        <tr class="noborder" onmouseover="setfaq(this, 'faqf4e1')">
          <td class="vtop rowform"><textarea rows="3" name="n_content" cols="105" class="n_content"  style="width:600px; height:100px;"></textarea></td>
          <td class="vtop tips2" s="1">&nbsp;</td>
        </tr>
        <tr onmouseover="setfaq(this, 'faqf4e1')">
          <td colspan="2" class="td27" s="1"><input type="submit" class="btn" value="立即推送" onclick=""/></td>
        </tr>
      </tbody>
    </table>
    <div class="info"></div>
  </div>
</form>
<?php } ?>
</body>
</html>
