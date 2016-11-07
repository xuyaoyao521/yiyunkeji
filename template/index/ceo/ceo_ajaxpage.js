var flag = 0;
jQuery(document).ready(function(){
    jQuery(window).scroll(function() {
		var srollTop = 90;  
		var srollPos = jQuery(window).scrollTop();  
		var alisttop = jQuery('#alist').offset().top;
		var alistheight = jQuery('#alist').innerHeight();
		
		if (srollPos >= ceo_follow) {
			jQuery(".ceo_follow").css({top: '85px', position: 'fixed'});
		}
		else {
			jQuery(".ceo_follow").removeAttr("style");;
		}
		if (srollPos > srollTop) {
			jQuery("#page-channel").css({top: '85px', position: 'fixed'});
		}
		else {
			jQuery("#page-channel").removeAttr("style");;
		}
		if(pages >= allpage) { 
			jQuery('#ceo_loading').hide();
		}
		else {
			
			var range = 50; 
			totalheight = parseFloat(jQuery(window).height()) + parseFloat(srollPos);  
            if((alisttop + alistheight) <= totalheight) {
				if(flag == 0) {
					flag = 1;
					jQuery("#ceo_load").hide();
					jQuery("#ceo_loading").show();
					pages++;
					url1 = url + '&page=' + pages;
					jQuery.ajax({
						url:url1,
						success:function(s) {
							setTimeout(function() {
								jQuery("#alist").append(gethtml(s, first1, last1, first2, last2));
								flag = 0;
								setTimeout(function() {
									jQuery("#ceo_loading").hide();
									if(pages >= allpage) { 
										jQuery('#ceo_loadlast').show();
									}
									else {
										jQuery('#ceo_load').show();
									}
								}, 500);
							}, 1000);
						},
						error:function() {
							jQuery("#ceo_loading").hide();
							jQuery("#ceo_load").show();
						}
					});
				}
				return false;
			}
        }
		
    });
})

var first1 = "<ul id=\"alist\"";
var last1 = "<div id=\"ajaxtag\"></div>";
var first2 = ">";
var last2 = "</ul>";

function gethtml(html, first1, last1, first2, last2)
{
	html = html.replace(/\\n|\\r/g, "");
	var indexf1 = html.indexOf(first1);
	if(indexf1 > 0)
	{ 
		var indexl1 = html.indexOf(last1);
		if(indexl1 > 0 && indexl1 > indexf1) 
		{
			html = html.substring(indexf1, indexl1);
			indexf2 = html.indexOf(first2) + first2.length;
			if(indexf2 > 0)
			{ 
				indexl2 = html.lastIndexOf(last2);
				if(indexl2 > 0 && indexl2 > indexf2) 
				{
					html = html.substring(indexf2, indexl2);
				}
				else {html = '';}
			} 
			else {html = '';}
		}
		else {html = '';}
	}
	else {html = '';}
	return html;
}
