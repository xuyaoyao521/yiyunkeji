jq(document).ready(function() {
    jq(window).scroll(function() {
        if (jq(document).scrollTop() > jq('#hd').offset().top) {
			if(jq('#hd').is('.fixeds') == false) {
				jq("#hd").addClass("fixeds");
			}
		} else if(jq(document).scrollTop() < jq('#hd').offset().top || jq(document).scrollTop() == 0){
			if(jq('#hd').is('.fixeds')) {
				jq("#hd").removeClass("fixeds");
			}
		}
    });
});


function showMenuSearch(v) {
	showMenu(v);
	jq("#"+v+"_menu").css("top", jq("#"+v).position().top+35);
}