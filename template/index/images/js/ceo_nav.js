jQuery(document).ready(function() {
    jQuery(window).scroll(function() {
        if (jQuery(document).scrollTop() > jQuery('#hd').offset().top) {
			if(jQuery('#hd').is('.fixeds') == false) {
				jQuery("#hd").addClass("fixeds");
			}
		} else if(jQuery(document).scrollTop() < jQuery('#hd').offset().top || jQuery(document).scrollTop() == 0){
			if(jQuery('#hd').is('.fixeds')) {
				jQuery("#hd").removeClass("fixeds");
			}
		}
    });
});


function showMenuSearch(v) {
	showMenu(v);
	jQuery("#"+v+"_menu").css("top", jQuery("#"+v).position().top+35);
}