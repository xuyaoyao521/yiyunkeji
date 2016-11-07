var flag2 = 0;

jq(document).ready(function(){
	
    jq("#loadmore2 .info_page a").click(function() {
		
		
		
		
		
		if(pages2 >= allpage2) { 
			jq("#loadmore2 .info_page a").html("最后一页");
			return false;
		}
		else {
			
		
				if(flag2 == 0) {
					flag2 = 1;
					
					pages2++;
					url1 = url2 + '&page=' + pages2;
					
					jq.ajax({
						url:url1,
						success:function(s) {
						
								jq("#alistvideo").append(gethtml(s, first12, last12, first22, last22));
								flag2 = 0;
								setTimeout(function() {
									
									if(pages2 >= allpage2) { 
										jq("#loadmore2 .info_page a").html("最后一页");
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

var first12 = "<ul class=\"video\" id=\"alistvideo\"";
var last12 = "<div id=\"ajaxtag2\"></div>";
var first22 = ">";
var last22 = "</ul>";

