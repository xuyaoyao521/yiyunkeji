<?php exit;?>
<!--{eval $ceo_btoolopen = 0;}-->
	<form method="post" autocomplete="off" id="fastpostform" action="forum.php?mod=post&action=reply&fid=$_G[fid]&tid=$_G[tid]&extra=$_GET[extra]&replysubmit=yes&mobile=2">
	<input type="hidden" name="formhash" value="{FORMHASH}" />
    <div class="viewpi" id="ceo_reply">
        <div class="fastpostbox">
        <input type="text" id="ceo_reply_click" onclick=" $('#ceo_reply_post,#ceo_reply_hide').show();                               $('#fastpostmessage').focus().val('').attr('placeholder', '{echo m_lang('post_default_text1')}');" class="input finp" placeholder="{echo m_lang('post_default_text2')}">
        </div>
        <div class="icon_box">
        	<ul>
            	<li class="reply_view"><a href="javascript:;"><i class="iconfont icon-xinxi"></i>{if $_G['forum_thread']['allreplies']}<span>$_G[forum_thread][allreplies]</span>{/if}</a></li>
            	<script>
					var rep_height=$(".mobile_evaluate_main").offset().top;
                	$(".reply_view a").click(function(){
						
						$('html,body').animate({'scrollTop':rep_height-45},500);	
					})
                </script>
            	<li class="fav_view"><a href="home.php?mod=spacecp&ac=favorite&type=thread&id=$_G[tid]" class="favbtn<!--{if $thread['shoucang']}--> xi1<!--{/if}-->"><i class="iconfont icon-biaoxing"></i>{if !$_G['forum_thread']['favtimes']}<span></span>{/if}</a></li>
                
               <li class="share_view"><a href="javascript:sharenv('share_qt')"><i class="iconfont icon-fenxiang2"></i></a></li>
            	
            </ul>
        </div>
    </div>
    

<div id="ceo_reply_hide" style="position: fixed; width: 100%; height: 100%; left: 0px; top: 0px; opacity: 0.5; z-index: 80; display: none; background: rgb(0, 0, 0);" onclick="$('#ceo_reply_post,#ceo_reply_hide').hide(); $(this).empty().hide();"></div>
<div class="viewpi_t" id="ceo_reply_post" style="display: none;">
		<ul class="fastpost">
		<!--{if $_G[forum_thread][special] == 5 && empty($firststand)}-->
		<li>
		<select id="stand" name="stand" >
			<option value="">{lang debate_viewpoint}</option>
			<option value="0">{lang debate_neutral}</option>
			<option value="1">{lang debate_square}</option>
			<option value="2">{lang debate_opponent}</option>
		</select>
		</li>
		<!--{/if}-->
		<li{if $secqaacheck || $seccodecheck} class="mbm" {/if}><textarea type="text" value="{lang send_reply_fast_tip}" class="input grey" color="gray" name="message" id="fastpostmessage"></textarea></li>
		<li id="fastpostsubmitline"><!--{if $secqaacheck || $seccodecheck}--><!--{subtemplate common/seccheck}--><!--{/if}--><input type="button" value="发表" class="btn_default btn_threplay" name="replysubmit" id="fastpostsubmit"><!--{hook/viewthread_fastpost_button_mobile}--></li>
		</ul>
</div>
    </form>

<script type="text/javascript">
	(function() {
		var form = $('#fastpostform');
		<!--{if !$_G[uid] || $_G[uid] && !$allowpostreply}-->
		$('#fastpostmessage').on('focus', function() {
			<!--{if !$_G[uid]}-->
				$('#ceo_reply_post,#ceo_reply_hide').hide();  
				popup.open('{lang nologin_tip}', 'confirm', 'member.php?mod=logging&action=login');
			<!--{else}-->
				popup.open('{lang nopostreply}', 'alert');
				
			<!--{/if}-->
			
			
		});
		<!--{else}-->
		/*
		$('#fastpostmessage').on('focus', function() {
			var obj = $(this);
			if(obj.attr('color') == 'gray') {
				obj.attr('value', '');
				obj.removeClass('grey');
				obj.attr('color', 'black');
				$('#fastpostsubmitline').css('display', 'block');
			}
		})
		.on('blur', function() {
			var obj = $(this);
			if(obj.attr('value') == '') {
				obj.addClass('grey');
				obj.attr('value', '{lang send_reply_fast_tip}');
				obj.attr('color', 'gray');
			}
		});
		*/
		<!--{/if}-->
		$('#fastpostsubmit').on('click', function() {
			
			var msgobj = $('#fastpostmessage');
			if(msgobj.val() == '{lang send_reply_fast_tip}') {
				msgobj.attr('value', '');
			}
			$.ajax({
				type:'POST',
				url:form.attr('action') + '&handlekey=fastpost&loc=1&inajax=1',
				data:form.serialize(),
				dataType:'xml'
			})
			.success(function(s) {
				evalscript(s.lastChild.firstChild.nodeValue);
				$('#ceo_reply_post,#ceo_reply_hide').hide(); 
				$(this).empty().hide();
				
			
				
				
			})
			.error(function() {
				window.location.href = obj.attr('href');
				popup.close();
			});
			return false;
		});

		$('#replyid').on('click', function() {
			$(document).scrollTop($(document).height());
			$('#fastpostmessage')[0].focus();
		});

	})();

	function succeedhandle_fastpost(locationhref, message, param) {
		var pid = param['pid'];
		var tid = param['tid'];
		if(pid) {
			$.ajax({
				type:'POST',
				url:'forum.php?mod=viewthread&tid=' + tid + '&viewpid=' + pid + '&mobile=2',
				dataType:'xml'
			})
			.success(function(s) {
				alert("发表成功！");
				$('#post_new').append(s.lastChild.firstChild.nodeValue);
				
			})
			.error(function() {
				window.location.href = 'forum.php?mod=viewthread&tid=' + tid;
				popup.close();
			});
		} else {
			if(!message) {
				message = '{lang postreplyneedmod}';
			}
			popup.open(message, 'alert');
		}
		$('#fastpostmessage').attr('value', '');
		if(param['sechash']) {
			$('.seccodeimg').click();
		}
	}

	function errorhandle_fastpost(message, param) {
		popup.open(message, 'alert');
	}
</script>
