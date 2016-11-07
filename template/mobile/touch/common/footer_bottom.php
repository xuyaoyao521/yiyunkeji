<?php exit;?>
<script type="text/javascript">
<!--{if $_G['basescript'] == 'forum' && CURMODULE == forumdisplay || $_G['basescript'] == 'portal' && $_GET['mod'] == 'list' }-->
function mys(id){
    return !id ? null : document.getElementById(id);
}

function dbox(id,classname){
	if(mys(id+'_menu').style.display == 'block'){
		mys(id+'_menu').style.display = 'none';
		mys(id).className = '';
	} else {
		mys(id+'_menu').style.display = 'block';
		mys(id).className = classname;
	}
}
<!--{/if}-->
if(window.onload != null){   
    //window.onload=function(){auto_height();} 
}
</script>

</body>
</html>
<!--{eval updatesession();}-->
<!--{if defined('IN_MOBILE')}-->
	<!--{eval output();}-->
<!--{else}-->
	<!--{eval output_preview();}-->
<!--{/if}-->
