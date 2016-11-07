var flag4 = 0;

jq(document).ready(function(){
	
    jq("#loadmore4 .info_page a").click(function() {
		
		
		
		
		
		if(pages4 >= allpage4) { 
			jq("#loadmore4 .info_page a").html("最后一页");
			return false;
		}
		else {
			
		
				if(flag4 == 0) {
					flag4 = 1;
					
					pages4++;
					url1 = url4 + '&page=' + pages4;
					
					jq.ajax({
						url:url1,
						success:function(s) {
						
								jq("#alistduanzi").append(gethtml(s, first14, last14, first24, last24));
								flag2 = 0;
								setTimeout(function() {
									
									if(pages4 >= allpage4) { 
										jq("#loadmore4 .info_page a").html("最后一页");
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

var first14 = "<ul class=\"duanzilist\" id=\"alistduanzi\"";
var last14 = "<div id=\"ajaxtag4\"></div>";
var first24 = ">";
var last24 = "</ul>";

