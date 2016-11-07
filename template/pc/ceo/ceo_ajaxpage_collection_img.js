var flag3 = 0;

jq(document).ready(function(){
	
    jq("#loadmore3 .info_page a").click(function() {
		
		
		
		
		
		if(pages3 >= allpage3) { 
			jq("#loadmore3 .info_page a").html("最后一页");
			return false;
		}
		else {
			
		
				if(flag3 == 0) {
					flag3 = 1;
					
					pages3++;
					url1 = url3 + '&page=' + pages3;
					
					jq.ajax({
						url:url1,
						success:function(s) {
						
								jq("#alistimg").append(gethtml(s, first13, last13, first23, last23));
								flag2 = 0;
								setTimeout(function() {
									
									if(pages3 >= allpage3) { 
										jq("#loadmore3 .info_page a").html("最后一页");
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

var first13 = "<ul class=\"piclist\" id=\"alistimg\"";
var last13 = "<div id=\"ajaxtag3\"></div>";
var first23 = ">";
var last23 = "</ul>";

