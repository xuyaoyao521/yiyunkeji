<?php exit;?>
{eval}
$curtime = time();
$cooktime = intval(getcookie('showadvopen'));
$exptime = $curtime - $ceo_showadvtime;
{/eval}
	<!--{if $exptime > $cooktime}-->
{eval}
    	$cookietime = $curtime + $ceo_showadvtime;
		dsetcookie('showadvopen', $cookietime, $cookietime);
        $advlist = explode("\n",$ceo_showadv); 
{/eval}
<link rel="stylesheet" href="template/mobile/toutiao_mobile/css/showadv.css" type="text/css" media="all">
<script src="./template/mobile/toutiao_mobile/js/swipe.js"></script>
<div class="showadv">
	<div class="exit" onclick="showadvext()">{echo m_lang('adv_exit')}</div>
    <div class="autoscroll">
        <div id="slider">
        <ul>
        <!--{loop $advlist $list}-->
            {eval $adv = explode("|",$list);}
            <li><a href="$adv[1]"><img src="$adv[0]" /></a></li>
        <!--{/loop}-->
        </ul>
        </div>
    </div>

<script type="text/javascript">
$('#mask').show();
$(document).ready(function() { 
	var slider = new Swipe(document.getElementById('slider'), {
		callback: function(e, pos) {
			var i = bullets.length;
			while (i--) {
				bullets[i].className = ' ';
			}
			bullets[pos].className = 'on';
		}
	})//,
	//bullets = document.getElementById('position').getElementsByTagName('img');
});

function showadvext(id){
	$('#mask').hide();
	$('.showadv').hide();
}
</script>
    
</div>

    <!--{/if}-->
