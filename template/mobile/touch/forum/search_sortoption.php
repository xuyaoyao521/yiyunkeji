<?php exit;?>
<div class="box_bg">
<script type="text/javascript">
	var forum_optionlist = <!--{if $forum_optionlist}-->'$forum_optionlist'<!--{else}-->''<!--{/if}-->;
</script>
<script type="text/javascript" src="{$_G['setting']['jspath']}threadsort.js?{VERHASH}"></script>
<!--{loop $quicksearchlist $optionid $option}-->
		<!--{eval $formsearch = '';}-->
        <!--{if getstatus($option['search'], 1)}-->
        	<!--{block formsearch}-->
	            <div>
	                <span class="th">$option[title]:</span>
	                <!--{if in_array($option['type'], array('radio', 'checkbox', 'select', 'range'))}-->
	                    <span id="select_$option[identifier]" class="td">
	                    <!--{if $option[type] == 'select'}-->
	                            <select name="searchoption[$optionid][value]" id="$option[identifier]" onchange="changeselectthreadsort(this.value, '$optionid', 'search');" class="ps vm">
	                                <option value="0">{lang please_select}</option>
	                            <!--{loop $option['choices'] $id $value}-->
	                                <!--{if !$value[foptionid]}-->
	                                <option value="$id"<!--{if $_GET[searchoption][$optionid][value] == $id}--> selected="selected"<!--{/if}-->>$value[content] <!--{if $value['level'] != 1}-->&raquo;<!--{/if}--></option>
	                                <!--{/if}-->
	                            <!--{/loop}-->
	                            </select>
								<input type="hidden" name="searchoption[$optionid][type]" value="$option[type]">
	                        <!--{if $_GET[searchoption][$optionid][value]}-->
	                            <script type="text/javascript">
	                                defaultselectthreadsort('$_GET[searchoption][$optionid][value]', '$option[identifier]');
	                            </script>
	                        <!--{/if}-->
	                    <!--{elseif $option[type] != 'checkbox'}-->
	                        <select name="searchoption[$optionid][value]" id="$option[identifier]" class="ps vm">
	                            <option value="0">{lang please_select}</option>
	                        <!--{loop $option['choices'] $id $value}-->
	                            <option value="$id" {if $_GET[searchoption][$optionid][value] == $id}selected="selected"{/if}>$value</option>
	                        <!--{/loop}-->
	                        </select>
	                        <input type="hidden" name="searchoption[$optionid][type]" value="$option[type]">
	                    <!--{else}-->
	                        <!--{loop $option['choices'] $id $value}-->
	                            <label><input type="checkbox" class="pc" name="searchoption[$optionid][value][$id]" value="$id" {if is_array($_GET[searchoption][$optionid]) && $_GET[searchoption][$optionid][value][$id]}checked="checked"{/if}>$value</label>
	                        <!--{/loop}-->
	                        <input type="hidden" name="searchoption[$optionid][type]" value="checkbox">
	                    <!--{/if}-->
	                    </span>
	                <!--{else}-->
	                    <!--{if $option['type'] == 'calendar'}-->
	                        <script type="text/javascript" src="{$_G[setting][jspath]}calendar.js?{VERHASH}"></script>
	                        <input type="text" name="searchoption[$optionid][value]" size="15" class="px vm" value="{if is_array($_GET[searchoption][$optionid])}$_GET[searchoption][$optionid][value]{/if}" onclick="showcalendar(event, this, false)" />
	                    <!--{else}-->
	                        <input type="text" name="searchoption[$optionid][value]" size="15" class="px vm" value="{if is_array($_GET[searchoption][$optionid])}$_GET[searchoption][$optionid][value]{/if}" />
	                    <!--{/if}-->
	                <!--{/if}-->
	            </div>
	            <!--{/block}-->
		<!--{/if}-->
    <!--{eval $formsearch_html .= $formsearch;}-->

	<!--{eval $fontsearch = '';$showoption = array();$tmpcount = 0;}-->
	<!--{if getstatus($option['search'], 2)}-->
    	<!--{block fontsearch}-->
			<tr>
				<th>$option[title]:</th>
	            <td>
	                <ul class="cl">
	                    <li{if $_GET[''.$option[identifier]] == 'all'} class="a"{/if}><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=sortid&sortid=$_GET['sortid']&searchsort=1$filterurladd&$option[identifier]=all$sorturladdarray[$option[identifier]]" class="xi2">{lang unlimited}</a></li>
						<!--{if $option[type] == 'select'}-->
							<!--{loop $option['choices'] $id $value}-->
								<!--{if $value[foptionid] == 0}-->
								<li{if preg_match('/^'.$value[optionid].'\./i', $_GET[''.$option[identifier]]) || preg_match('/^'.$value[optionid].'$/i', $_GET[''.$option[identifier]])} class="a"{/if}><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=sortid&sortid=$_GET[sortid]&searchsort=1&$option[identifier]=$id$sorturladdarray[$option[identifier]]" class="xi2">$value[content]</a></li>
								<!--{/if}-->
							<!--{/loop}-->
							<!--{if !($_GET[''.$option[identifier]] == 'all' || !isset($_GET[''.$option[identifier]]))}-->
								<!--{loop $option['choices'] $id $value}-->
									<!--{if (preg_match('/^'.$value[foptionid].'\./i', $_GET[''.$option[identifier]]) || preg_match('/^'.$value[foptionid].'$/i', $_GET[''.$option[identifier]])) && ($showoption[$value[count]][$id] = $value)}-->
									<!--{/if}-->
								<!--{/loop}-->
								<!--{if ksort($showoption)}--><!--{/if}-->
								<!--{loop $showoption $optioncount $values}-->
									<!--{if $tmpcount != $optioncount && ($tmpcount = $optioncount)}-->
									</ul><ul class="subtsm cl">
										<!--{loop $values $id $value}-->
											<li{if preg_match('/^'.$value[optionid].'\./i', $_GET[''.$option[identifier]]) || preg_match('/^'.$value[optionid].'$/i', $_GET[''.$option[identifier]])} class="a"{/if}><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=sortid&sortid=$_GET[sortid]&searchsort=1&$option[identifier]=$id$sorturladdarray[$option[identifier]]" class="xi2">$value[content]</a></li>
										<!--{/loop}-->
									</ul><ul>
									<!--{/if}-->
								<!--{/loop}-->
							<!--{/if}-->
						<!--{else}-->
							<!--{loop $option['choices'] $id $value}-->
								<li{if $_GET[''.$option[identifier]] && !strcmp($id, $_GET[''.$option[identifier]])} class="a"{/if}><a href="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=sortid&sortid=$_GET[sortid]&searchsort=1&$option[identifier]=$id$sorturladdarray[$option[identifier]]" class="xi2">$value</a></li>
							<!--{/loop}-->
						<!--{/if}-->
	                </ul>
	            </td>
			</tr>
		<!--{/block}-->
     <!--{/if}-->
     <!--{eval $fontsearch_html .= $fontsearch;}-->
<!--{/loop}-->

<!--{if $formsearch_html || $fontsearch_html}-->
	<!--{if $fontsearch_html}-->
		    <table id="fontsearch" class="fontsearch">
		         $fontsearch_html
		    </table>
	<!--{/if}-->
	<!--{if $formsearch_html}-->
	    <form method="post" autocomplete="off" name="searhsort" id="searhsort" class="formsearch box_bg box_brb" action="forum.php?mod=forumdisplay&fid=$_G[fid]&filter=sortid&sortid=$_GET[sortid]">
	        <input type="hidden" name="formhash" value="{FORMHASH}" />
	        $formsearch_html
	        <div class="ptm cl"><button type="submit" class="btn_default" name="searchsortsubmit"><em>{lang search}</em></button></div>
	    </form>
	<!--{/if}-->
<!--{/if}-->
</div>