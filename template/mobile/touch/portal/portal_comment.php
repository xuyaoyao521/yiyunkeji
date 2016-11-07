<?php exit;?>
            <!--{if $data[commentnum]}-->
    <div class="titls" id="replay">
    	<dl>
        	<dt>{echo m_lang('portal_reply')}</dt>
            <dd>
   <a href="$common_url" class="xi2">{echo m_lang('acom')}</a><!--span>{echo m_lang('tt')}{$data[commentnum]}{echo m_lang('od')}{lang comment}</span-->
            </dd>
        </dl>
    </div>
            <!--{/if}-->

<div class="post_from">
<ul>		
		<form id="cform" name="cform" action="$form_url" method="post" autocomplete="off">

				<li class="mtm">
				<textarea name="message" rows="3" id="message" onkeydown="ctrlEnter(event, 'commentsubmit_btn');"></textarea>
				</li>

			<!--{if checkperm('seccode') && ($secqaacheck || $seccodecheck)}-->
			<!--{subtemplate common/seccheck}-->
			<!--{/if}-->
			<!--{if !empty($topicid) }-->
				<input type="hidden" name="referer" value="portal.php?mod=topic&topicid=$topicid#comment" />
				<input type="hidden" name="topicid" value="$topicid">
			<!--{else}-->
				<input type="hidden" name="portal_referer" value="portal.php?mod=view&aid=$aid#comment">
				<input type="hidden" name="referer" value="portal.php?mod=view&aid=$aid#comment" />
				<input type="hidden" name="id" value="$data[id]" />
				<input type="hidden" name="idtype" value="$data[idtype]" />
				<input type="hidden" name="aid" value="$aid">
			<!--{/if}-->
			<input type="hidden" name="formhash" value="{FORMHASH}">
			<input type="hidden" name="replysubmit" value="true">
			<input type="hidden" name="commentsubmit" value="true" />
			<button type="submit" name="commentsubmit_btn" id="commentsubmit_btn" value="true" class="btn_default btn_w100 btn_submit">{lang comment}</button>
		</form>	
        </ul>
</div>
