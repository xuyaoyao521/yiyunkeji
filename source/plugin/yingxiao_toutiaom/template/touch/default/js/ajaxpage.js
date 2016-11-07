
$(document).ready(function() {
    $(window).scroll(function() {
        if ($(document).scrollTop() <= 0) { }

        if ($(document).scrollTop() >= $(document).height() - window.screen.availHeight) {
			$('#a_pg').show();
			pages++;
			if(pages <= allpage)
			{
				alert(pages);
				alert(allpage);
				url = url + '&page=' + pages;
				htmlobj = $.ajax({url:url,async:false});
				$("#alist").append(gethtml(htmlobj.responseText, first1, last1, first2, last2));
			}
			$('#a_pg').hide();
        }
    });
});

function gethtml(html, first1, last1, first2, last2){
	html = html.replace(/\\n|\\r/g, "");
	var indexf1 = html.indexOf(first1);//alert(ind1);
	var indexl1 = html.indexOf(last1);
	html = html.substring(indexf1, indexl1);
	indexf2 = html.indexOf(first2) + first2.length;
	indexl2 = html.lastIndexOf(last2);
	html = html.substring(indexf2, indexl2);
	return html;
}

    