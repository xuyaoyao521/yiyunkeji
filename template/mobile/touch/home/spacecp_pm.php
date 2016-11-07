<?php exit;?>
<!--{template common/header}-->
<script>SetWebTitle("{lang send_pm}");SetTopLeftNav("backpage");</script>

<!--{if $op != ''}-->
<div class="bm_c box_bg">{lang user_mobile_pm_error}</div>
<!--{else}-->

<form id="pmform_{$pmid}" name="pmform_{$pmid}" method="post" autocomplete="off" action="home.php?mod=spacecp&ac=pm&op=send&touid=$touid&pmid=$pmid&mobile=2" >
	<input type="hidden" name="referer" value="{echo dreferer();}" />
	<input type="hidden" name="pmsubmit" value="true" />
	<input type="hidden" name="formhash" value="{FORMHASH}" />

<!-- header start -->
<div id="tabox" class="tabox box_bg">
    <div class="hd">
        <ul class="tab2">
            <li class="{if $_GET[do]}on{/if}"><a href="home.php?mod=space&do=pm">{lang pm}</a></li>
            <li class="{if $_GET[ac]}on{/if}"><a href="home.php?mod=spacecp&ac=pm">{lang send_pm}</a></li>
        </ul>
    </div>
</div>
<!-- header end -->
<!-- main post_msg_box start -->
<div class="bm_c box_bg">
	<div class="post_msg_from">
		<ul>
			<!--{if !$touid}-->
			<li class="mbm"><input type="text" value="" tabindex="1" class="px" size="30" autocomplete="off" id="username" name="username" placeholder="{lang addressee}"></li>
			<!--{/if}-->             
			<li class="area mbm">
				<textarea class="pt box_bg" tabindex="2" autocomplete="off" value="" id="sendmessage" name="message" cols="80" rows="4"  placeholder="{lang thread_content}"></textarea>
			</li>
        <button id="pmsubmit_btn" class="btn_default btn_w100 btn_disable" disable="true"><span>{lang sendpm}</span></button>
		<input type="hidden" name="pmsubmit_btn" value="yes" />
            
            
		</ul>
	</div>
</div>
<!-- main postbox start -->
</form>
<script type="text/javascript">
	(function() {
		$('#sendmessage').on('keyup input', function() {
			var obj = $(this);
			if(obj.val()) {
				$('.btn_default').removeClass('btn_disable').addClass('btn_submit');
				$('.btn_default').attr('disable', 'false');
			} else {
				$('.btn_default').removeClass('btn_submit').addClass('btn_disable');
				$('.btn_default').attr('disable', 'true');
			}
		});
		var form = $('#pmform_{$pmid}');
		$('#pmsubmit_btn').on('click', function() {
			var obj = $(this);
			if(obj.attr('disable') == 'true') {
				return false;
			}
			$.ajax({
				type:'POST',
				url:form.attr('action') + '&handlekey='+form.attr('id')+'&inajax=1',
				data:form.serialize(),
				dataType:'xml'
			})
			.success(function(s) {
				
				popup.open(s.lastChild.firstChild.nodeValue);
			})
			.error(function() {
				popup.open('{lang networkerror}', 'alert');
			});
			return false;
			});
	 })();
</script>
<!--{/if}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer}-->
