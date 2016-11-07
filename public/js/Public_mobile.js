//public
$('img.fade').lazyload({effect: "fadeIn"});
//public END


//图片列表
$(document).on("click",".mobile_public_list.pic .del,.mobile_common_list .del",function(){
	$(this).parent().find(".del_confirm").animate({width: 'toggle'},300);
});

//图片详情
TouchSlide({slideCell:"#mobile_pic_Slide_main",titCell:".screen",mainCell:".Slide_main",effect:"left",autoPlay:false,toPage:true,autoPage:true,startFun:function(i,c){
		$(".mobile_pic_Slide_main").css({"opacity":1});

		i=i+1;
		if(i!=c){
			c=c-1;
			$(".mobile_pic_Slide_footer span").show();
			$(".mobile_pic_Slide_footer span").html("<b>"+i+"</b>/"+c);
			$(".mobile_pic_Slide_footer").show();
			$(".mobile_pic_Slide_main ul li.Related").hide();
		}else{
			$(".mobile_pic_Slide_footer span").hide();
			$(".mobile_pic_Slide_footer").hide();
			$(".mobile_pic_Slide_main ul li.Related").show();
		}		
       
}});
$(".mobile_pic_Slide_main ul li.Related .Related_title .replay").click(function(){
	$(".mobile_pic_Slide_main .screen li").first().click();
});
$(function(){
$(window).resize(function(){
		var window_height = $(window).height();
		$(".mobile_pic_Slide_main .Slide_main li").height(window_height);
	});
$(window).resize();
});



//作者
TouchSlide({ slideCell:"#mobile_author_list",titCell:".screen li",mainCell:".Slide_main",effect:"leftLoop"});
$(window).scroll(function() {
	var scrollTop = $(window).scrollTop();
	var author_height= $(".mobile_author").height();
	if(scrollTop>author_height){
		$(".mobile_author_list ul.screen").css({"position":"fixed","top":0});
		}else{
		$(".mobile_author_list ul.screen").css({"position":"","top":""});
			}

	});
	
function buganxingqu(tid,obj){
		
		
		$.post("ajax.php?act=notinterested",{tid:tid},function(data){
			
			if(data==0){
				
				location='member.php?mod=logging&action=login&mobile=2';
				return false;	
			}else if(data==1){
				
				$(obj).parents(".mobile_public_list").remove();
				$(obj).parents("dl").remove();
				
			}
		});
		
}

function forumzan(tid,type,obj){
	
	var num=parseInt($(obj).html());
	
	$.post("ajax.php?act=duanzizan",{tid:tid,type:type},function(data){
			
			if(data==1){
				$(obj).html(num+1);
				$(obj).addClass("on");
			}else{
				
				popup.open('您已经点过了!', 'alert');
			}
		});
		doane();
}

function collection_arc(tid,obj){
	
	
	
	$.post("ajax.php?act=collection_arc",{tid:tid},function(data){
			
			if(data==2){
				location='member.php?mod=logging&action=login&mobile=2';
				return false;	
			}
			
			if(data==1){
				
				popup.open('收藏成功!', 'alert');
				$(obj).addClass("on");
			}else{
				
				popup.open('您已经收藏过了!', 'alert');
				
			}
		});
		doane();
}
function dingyue(uid){
	
	
	
	$.post("ajax.php?act=dingyue",{uid:uid},function(data){
			if(data==2){
				location='member.php?mod=logging&action=login&mobile=2';
				return false;	
			}
			else if(data==1){
				
				
				popup.open('订阅成功', 'alert');
			}else{
				
				
				popup.open('您已经订阅过了', 'alert');
			}
		})
		
}

function dingyue3(uid,obj){
	
	
	
	$.post("ajax.php?act=dingyue",{uid:uid},function(data){
			popup.open('关注成功！', 'alert');
			$(obj).html("取消关注");
			$(obj).attr("onclick","qxdingyue("+uid+",this)");
		})
		
}

function qxdingyue(uid,obj){
	
	
	
	$.post("ajax.php?act=delete_dingyue",{id:uid},function(data){
			$(obj).html("关注");
			$(obj).attr("onclick","dingyue3("+uid+",this)");
		})
		
}

function dingyue2(uid,obj){
	
	
	
	$.post("ajax.php?act=dingyue",{uid:uid},function(data){
			
			if(data==2){
				location='member.php?mod=logging&action=login&mobile=2';
				return false;	
				
			}
			else if(data==1){
				$(obj).html('&radic; 已关注').addClass("on");
				
			}else{
				
				
				popup.open('已关注！', 'alert');
				
			}
		})
		
}

function jubao(obj){
	var href=$(obj).attr("href");
	$.post("ajax.php?act=get_login",function(data){
		if(data==0){
			location='member.php?mod=logging&action=login&mobile=2';
			return false;		
		}
	});
}

function delete_post(pid,tid,obj){
	 if (confirm("你确定删除吗？")) {  
	$.post("ajax.php?act=delete_post",{pid:pid,tid:tid},function(data){
		if(data==1){
				$("#pid"+pid).remove();
				popup.open('删除成功！', 'alert');
		}else{
				popup.open('没有权限！', 'alert');
		}
	});	
	 }
}

function plunzan(pid,obj){
	
	var num=parseInt($(obj).find('span').html());
	
	$.post("ajax.php?act=plunzan",{pid:pid},function(data){
			
			if(data==1){
				if($(obj).find('span').length){
				$(obj).find('span').html(num+1);
				}else{
					$(obj).append("<span>1</span>");	
				}
				
			}else{
				
				popup.open('您已经点过了！', 'alert');
			}
		});
		
		
}