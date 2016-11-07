<?php exit;?>
<!--{template common/header_default}-->
<!--{$color_login}-->
<div class="usertop">
<a href="javascript:history.back();" class="userback"><i class="iconfont">&#xe844;</i>{echo m_lang('back');}</a>
<span class="y"><a href="member.php?mod=logging&action=login&mobile=2">{lang login}</a></span>
</div>

<!-- registerbox start -->
<div class="userbox">
    <div class="loginlogo"><img src="template/mobile/toutiao_mobile/img/login_logo.png"/></div>
    <div class="loginbox registerbox">
        <div class="login_from">
            <form method="post" autocomplete="off" name="register" id="registerform" action="member.php?mod={$_G[setting][regname]}&mobile=2">
            <input type="hidden" name="regsubmit" value="yes" />
            <input type="hidden" name="formhash" value="{FORMHASH}" />
            <!--{eval $dreferer = str_replace('&amp;', '&', dreferer());}-->
            <input type="hidden" name="referer" value="$dreferer" />
            <input type="hidden" name="activationauth" value="{if $_GET[action] == 'activation'}$activationauth{/if}" />
            <input type="hidden" name="agreebbrule" value="$bbrulehash" id="agreebbrule" checked="checked" />
            <ul>
                <li><input type="text" tabindex="1" class="p_fre" size="30" autocomplete="off" value="" name="{$_G['setting']['reginput']['username']}" placeholder="{lang registerinputtip}" fwin="login"></li>
                <li><input type="password" tabindex="2" class="p_fre" size="30" value="" name="{$_G['setting']['reginput']['password']}" placeholder="{lang login_password}" fwin="login"></li>
                <li><input type="password" tabindex="3" class="p_fre" size="30" value="" name="{$_G['setting']['reginput']['password2']}" placeholder="{lang registerpassword2}" fwin="login"></li>
                <li class="bl_none"><input type="email" tabindex="4" class="p_fre" size="30" autocomplete="off" value="" name="{$_G['setting']['reginput']['email']}" placeholder="{lang registeremail}" fwin="login"></li>
                <!--{if empty($invite) && ($_G['setting']['regstatus'] == 2 || $_G['setting']['regstatus'] == 3)}-->
                    <li><input type="text" name="invitecode" autocomplete="off" tabindex="5" class="p_fre" size="30" value="{lang invite_code}" placeholder="{lang invite_code}" fwin="login"></li>
                <!--{/if}-->
                <!--{if $_G['setting']['regverify'] == 2}-->
                    <li><input type="text" name="regmessage" autocomplete="off" tabindex="6" class="p_fre" size="30" value="{lang register_message}" placeholder="{lang register_message}" fwin="login"></li>
                <!--{/if}-->
                <!--{loop $_G['cache']['fields_register'] $field}-->
                    <!--{if $htmls[$field['fieldid']]}-->
                    <li class="regfield"><label for="$field['fieldid']" class="labs"><!--{if $field['required']}--><span class="rq">*</span><!--{/if}-->$field[title]</label>
                        $htmls[$field['fieldid']]
                    </li>
                    <!--{/if}-->
                <!--{/loop}-->
            <!--{if $secqaacheck || $seccodecheck}-->
                <li><!--{subtemplate common/seccheck}--></li>
            <!--{/if}-->
        <li class="btn_register"><button tabindex="7" value="true" name="regsubmit" type="submit" class="formdialog btn_default btn_w100"><span>{lang quickregister}</span></button></li>
            </ul>
        </form>
        </div>
    </div>
<!-- registerbox end -->
</div>
<!--{eval updatesession();}-->
<!--{eval $nofooter = true;}-->
<!--{template common/footer_default}-->
