<?php exit;?>
<!--{if $ceo_norepages == 2}--> 
<div class="a_pg box_bg" id="a_pg">
    <div id="ajaxld">{echo m_lang('load_pic')}</div>
    <div id="ajnt" style="display:none;"><a href="javascript:" >{echo m_lang('load')}</a></div>
    <div id="ajaxlast" style="display:none;"><a href="javascript:" >{echo m_lang('load_last')}</a></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	if(pages == allpage) {							
		$("#ajaxlast").show();
	}
	else {
		$("#ajnt").show();
		$("#ajaxld").hide();
	}
	
	$("#ajnt").click(function(){
		$("#ajaxld").show();
		$("#ajaxld img").show();
		$("#ajnt").hide();
		pages++;
		url = url + '&page=' + pages;
		$.ajax({
			url:url,
		})
		.success(function(s) {
			setTimeout(function() {
				$("#alist").append(gethtml(s, first1, last1, first2, last2));
				$("#ajaxld").hide();
				if(pages >= allpage) {							
					$("#ajaxlast").show();
				}
				else {
					if(pages < allpage) {							
						$("#ajnt").show();
					}
				}
			}, 1000);
		})
		.error(function() {
			$("#ajaxld").hide();
			$("#ajnt").show();
		});
		return false;
	})
})
</script>
<!--{else}-->
<div class="a_pg" id="a_pg">
    <div id="ajaxld" style="display:none;">{echo m_lang('load_pic')}</div>
    <div id="ajaxlast" style="display:none;"><a href="javascript:" >{echo m_lang('load_last')}</a></div>
</div>
<script type="text/javascript">
$(document).ready(function(){
    $(window).scroll(function() {
		if(pages >= allpage) { 
			$('#ajaxld').hide();
		}
		else {
			if ($(document).scrollTop() <= 0) { }
			
			var range = 50; 
			var srollPos = $(window).scrollTop();  
			totalheight = parseFloat($(window).height()) + parseFloat(srollPos);  
            if(($(document).height()-range) <= totalheight) {
				$("#ajaxld").show();
				pages++;
				url = url + '&page=' + pages;
				
				$.ajax({
					url:url,
				})
				.success(function(s) {
					
					setTimeout(function() {
						
						$("#alist").append(gethtml(s, first1, last1, first2, last2));
						
						$("#ajaxld").hide();
						$('img.fade').lazyload({effect: "fadeIn"});
						if(pages >= allpage) { 
							$('#ajaxlast').show();
						}
					}, 1000);
li=$("li");//这里是区块名称
						liuxiaofan();
				})
				.error(function() {
					$("#ajaxld").hide();
				});
				return false;
			}
        }
		
    });
})
</script>
<!--{/if}--> 
<script type="text/javascript">
var first1 = "<ul id=\"alist\"";
var last1 = "<div id=\"ajaxtag\"></div>";
var first2 = ">";
var last2 = "</ul>";

function gethtml(html, first1, last1, first2, last2)
{
	html = html.replace(/\\n|\\r/g, "");
	var indexf1 = html.indexOf(first1);
	var indexl1 = html.indexOf(last1);
	html = html.substring(indexf1, indexl1);
	indexf2 = html.indexOf(first2) + first2.length;
	indexl2 = html.lastIndexOf(last2);
	html = html.substring(indexf2, indexl2);
	return html;
}
</script> 
