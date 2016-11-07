var flag = 0;

	
   jq("#loadmore").click(function() {
		
		
		
		
		
		if(pages >= allpage) { 
			jq("#loadmore").hide();
		}
		else {
			
			
				if(flag == 0) {
					flag = 1;
					pages++;
					url1 = urlpage + '&page=' + pages;
					jq.ajax({
						url:url1,
						success:function(s) {
						
						flag = 0;
						jq("#alist").append(gethtml(s, first1, last1, first2, last2));
						if(pages >= allpage) { 
							jq("#loadmore").hide();
						}
					},
						error:function() {
							jq("#loadmore").hide();
							
						}
						});
					
				}
				
			
        }
		
   })

var first1 = "<div class=\"evaluate_content\" id=\"alist\"";
var last1 = "<div class=\"evaluate_content\" id=\"loadmore\"";
var first2 = ">";
var last2 = "</div>";

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
