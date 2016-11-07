// JavaScript Document

jQuery(document).ready(function(){
	jQuery('#side_open').click(function() {
			jQuery('#side_nv').addClass('oy');
			jQuery('#sidemask').show();
			$("#wp").on('touchmove',function(event) { event.preventDefault(); }, false);
	});
	
	jQuery('#sidemask').click(function() {
			jQuery('#side_nv').removeClass('oy');
			jQuery('#sidemask').hide();
			$("#wp").unbind('touchmove');
	});
	
	if($('.scrolltop').length > 0) {
		scrolltop.init($('.scrolltop'));
	}

});

var scrolltop = {
	obj : null,
	init : function(obj) {
		scrolltop.obj = obj;
		var fixed = this.isfixed();
		obj.css('opacity', '.618');
		if(fixed) {
			obj.css('bottom', '98px');
		} else {
			obj.css({'visibility':'visible', 'position':'absolute'});
		}
		$(window).on('resize', function() {
			if(fixed) {
				obj.css('bottom', '98px');
			} else {
				obj.css('top', ($(document).scrollTop() + $(window).height() - 40) + 'px');
			}
		});
		obj.on('tap', function() {
			$(document).scrollTop($(document).height());
		});
		$(document).on('scroll', function() {
			if(!fixed) {
				obj.css('top', ($(document).scrollTop() + $(window).height() - 40) + 'px');
			}
			if($(document).scrollTop() >= 400) {
				obj.removeClass('bottom')
				.off().on('tap', function() {
					window.scrollTo('0', '1');
				});
			} else {
				obj.addClass('bottom')
				.off().on('tap', function() {
					$(document).scrollTop($(document).height());
				});
			}
		});

	},
	isfixed : function() {
		var offset = scrolltop.obj.offset();
		var scrollTop = $(window).scrollTop();
		var screenHeight = document.documentElement.clientHeight;
		if(offset == undefined) {
			return false;
		}
		if(offset.top < scrollTop || (offset.top - scrollTop) > screenHeight) {
			return false;
		} else {
			return true;
		}
	}
};

function auto_height(){
	var h = document.documentElement.clientHeight - 0;
	var high = document.getElementById('wp');
	//high.style.height = h + "px";
}	

function resize(obj, w, h, type) {
    var img = obj || this;
	//var pd = img.parentNode.style.width;
	e = img.parentNode;
	if(w == h)
	{
		e.style.height = "" + e.offsetWidth + "px";
		img.style.width = "100%";
		
	}
	else
	{
		e.style.height = "" + ((e.offsetWidth - 2) / 1.5 + 2) + "px";
	}
    
	if(img.offsetHeight < (e.offsetHeight - 2)) {
		//img.style.width = "" + (img.style.width - 2) + "px";
		img.style.marginTop = (e.offsetHeight - img.offsetHeight - 2) / 2 + "px";
	}
}
function rephotosize(obj, w, h) {
    var img = obj || this;
	e = img.parentNode;
	e.parentNode.style.height = "" + (e.parentNode.offsetWidth * (h / w)) + "px";
}
 
function rephotosize1(obj, w, h) {
	wid = obj.width();
	he = wid * (h / w);
	obj.css("height", he + "px");
}
 
function reCenter(img, size) {
    if (img.offsetWidth > size.x) {
        img.style.marginLeft = '-' + (img.offsetWidth - size.x)/2 + "px";
    }
    if (img.offsetWidth < size.x) {
        img.style.marginLeft = (size.x - img.offsetWidth)/2 + "px";
    }
}

//showbox
function showbox(id){
	$('#'+id+'_box').css('display','block');
}

//hidenbox
function hidebox(id){
	$('#'+id+'_box').css('display','none');
}

//showbox
function showboxWindow(id, url){
  if(!$('#box').attr('class') || $('#box').attr('class') == id){
		if($('#box').css('display')=='none'){
			$('#'+id+'_box').load(url + ' #payform');	
			$('#'+id+'_box').fadeIn(300);
			$('#box').addClass(id);
			$('#box').css({'display':'block','width':'100%','height':'100%','position':'fixed','top':'0','left':'0','background':'black','opacity':'0.4','z-index':'19'});	
		}else{
			$('#'+id+'_box').fadeOut(300);
			$('#'+id+'_box').html('');	
			$('#box').css({'display':'none'});
		}		
	}
}

//hidenbox
function hideboxWindow(id){
	if(id){
		var hide=id;
	}else{
		var hide=$('#box').attr('class');
	}
	$('#'+hide+'_box').fadeOut(300);
	$('#box').removeClass(hide);
	$('#box').css({'display':'none'});
}

function SetTopLeftNav(id) {
	if(id) {
		jQuery("#userlogin").css('display', "none");
		jQuery("#" + id).css('display', "block");
	}
	else {
		jQuery("#" + id).css('display', "none");
		jQuery("#userlogin").css('display', "block");
	}
}
function SetTopRightNav(id) {
	if(id) {
		if(id == 'no') {
			jQuery("#side_pr").css('display', "none");
			jQuery("#" + id).css('display', "block");
		}
		else {
			jQuery("#side_pr").css('display', "none");
			jQuery("#" + id).css('display', "block");
		}
	}
	else {
		jQuery("#" + id).css('display', "none");
		jQuery("#side_pr").css('display', "block");
	}
}

function SetTopfenxiang(){
		$("#side_pr").html('<a href="javascript:sharenv(\'share_qt\')"><i class="public_icon icon-fenxiang"></i></a>');
}

function SetWebTitle(tit) {$("#webtitle").html(tit);}
