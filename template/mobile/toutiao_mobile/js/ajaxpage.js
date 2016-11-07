$(document).ready(function(){
    $(window).scroll(function() {
        if ($(document).scrollTop() <= 0) { }

        if ($(document).scrollTop() >= $(document).height() - window.screen.availHeight) {
			$("#a_pg").show();
			pages++;
			if(pages <= allpage)
			{
				url = url + '&page=' + pages;
				htmlobj = $.ajax({url:url,async:false});
				$("#alist").append(gethtml(htmlobj.responseText, first1, last1, first2, last2));
			}
			$('#a_pg').hide();
        }
    });
	
	$("#ajnt").click(function(){
		$("#ajaxld").css("display","block");
		$("#ajnt").css("display","none");
		pages++;
		url = url + '&page=' + pages;
		htmlobj = $.ajax({url:url,async:false});
		$("#alist").append(gethtml(htmlobj.responseText, first1, last1, first2, last2));
		$("#ajaxld").css("display","none");
		if(pages == allpage){							
			$("#a_pg").css("display","none");
		}else{
			$("#ajnt").css("display","block");
		}
	})
})



