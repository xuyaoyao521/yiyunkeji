<?php exit;?>
<!--{template common/header}-->
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/forum/modcp.css" type="text/css" media="all">

<!--{if $script == 'noperm'}-->
    <div class="modcp_box box_bg bw0">
        <h1 class="mt">{lang mod_option_error}</h1>
        <p>{lang mod_error_invalid}</p>
        <p class="notice">{lang mod_notice}</p>
    </div>
<!--{elseif !empty($modtpl)}-->
	<!--{if in_array($script, array('member', 'login'))}-->
    	<!--{eval include(template($modtpl));}-->
    <!--{else}-->
    	<div class="modcp_box box_bg ban pbn">
    		{lang admin_threadtopicadmin_error}
        </div>
    <!--{/if}-->
<!--{/if}-->

<!--{template common/footer}-->
