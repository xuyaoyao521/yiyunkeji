

<!--{template common/header}-->

<style>
.tip label{ width:48%; float:left}
.tip dd:after{ content:"";display: block;height:0;clear:both;}
</style>
<!--{if !$reportid}-->
<div class="tip">

<form  method="post" autocomplete="off" id="form_$_GET[handlekey]" name="form_$_GET[handlekey]" action="misc.php?mod=report">
	
	<dt>{lang report_reason}</dt>
    <dd>
    <label><input type="radio" name="report_select" class="pr" onclick="$('#report_other').hide();" value="广告垃圾"> 广告垃圾</label>
    <label><input type="radio" name="report_select" class="pr" onclick="$('#report_other').hide();" value="违规内容"> 违规内容</label>
    <label><input type="radio" name="report_select" class="pr" onclick="$('#report_other').hide();" value="恶意灌水"> 恶意灌水</label>
    <label><input type="radio" name="report_select" class="pr" onclick="$('#report_other').hide();" value="重复内容"> 重复内容</label>
    <label><input type="radio" name="report_select" class="pr" onclick="$('#report_other').hide();" value="疑似抄袭"> 疑似抄袭</label>
    <label><input type="radio" name="report_select" class="pr" onclick="$('#report_other').show();" value="其他理由"> 其他理由</label>
    </dd>
    <dd>
    <div id="report_other" style="display:none">
			<textarea id="report_message" name="message" style="width:76%;" class="reasonarea pt mtn xg1" onfocus="this.innerHTML='';this.focus=null;this.className='reasonarea pt mtn'" onkeydown="ctrlEnter(event, 'reportsubmit', 1);" onkeyup="strLenCalc(this, 'checklen');" rows="2">{lang report_reason_other}</textarea>		
		</div>
    </dd>
					<dd><input type="submit" class="formdialog btn_default" name="modsubmit" id="modsubmit"  value="{lang confirms}"><a href="javascript:;" onclick="popup.close();">{lang cancel}</a></dd>
	<input type="hidden" name="referer" value="{echo dreferer()}" />
	<input type="hidden" name="reportsubmit" value="true" />
	<input type="hidden" name="rtype" value="$_GET[rtype]" />
	<input type="hidden" name="rid" value="$_GET[rid]" />
	<!--{if $_GET['fid']}-->
	<input type="hidden" name="fid" value="$_GET[fid]" />
	<!--{/if}-->
	<!--{if $_GET['uid']}-->
	<input type="hidden" name="uid" value="$_GET[uid]" />
	<!--{/if}-->
	<input type="hidden" name="url" value="$_GET[url]" />
	<input type="hidden" name="inajax" value="$_G[inajax]" />
	<!--{if $_G[inajax]}--><input type="hidden" name="handlekey" value="$_GET[handlekey]" /><!--{/if}-->
	<input type="hidden" name="formhash" value="{FORMHASH}" />
</form>
</div>
<!--{else}-->
<div class="tip">
<dt>已经举报过了！</dt>
<dd><a href="javascript:;" onclick="popup.close();">关闭</a></dd>
</div>
<!--{/if}-->
<!--{template common/footer}-->