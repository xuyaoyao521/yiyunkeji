<?php exit;?>
<!--{if !empty($srchtype)}--><input type="hidden" name="srchtype" value="$srchtype" /><!--{/if}-->
<div class="search box_bg">
    <table width="100%" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <td>
                    <input value="$keyword" autocomplete="off" class="txt" name="srchtxt" id="scform_srchtxt" value="" placeholder="{lang searchthread}">
                </td>
                <th><input type="hidden" name="searchsubmit" value="yes"><input type="submit" value="{lang search}" class="btn_search" id="scform_submit"></th>
            </tr>
        </tbody>
    </table>
</div>
