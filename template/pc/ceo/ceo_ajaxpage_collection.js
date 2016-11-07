var flag = 0;

jq(document).ready(function(){
	
    jq("#loadmore .info_page a").click(function() {
		
	
		
		
		
		if(pages >= allpage) { 
			jq("#loadmore .info_page a").html("最后一页");
			return false;
		}
		else {
			
		
				if(flag == 0) {
					flag = 1;
					
					pages++;
					url1 = url2 + '&page=' + pages;
					
					jq.ajax({
						url:url1,
						success:function(s) {
						
								jq("#alist").append(gethtml(s, first1, last1, first2, last2));
								flag = 0;
								setTimeout(function() {
									
									if(pages >= allpage) { 
										jq("#loadmore .info_page a").html("最后一页");
									}
									
								}, 1500);
								jq('img.fade').lazyload({effect: "fadeIn"});
							
						},
						error:function() {
							
						}
					});
				}
				return false;
			
        }
		
    });
})

var first1 = "<ul class=\"listBox\" id=\"alist\"";
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
