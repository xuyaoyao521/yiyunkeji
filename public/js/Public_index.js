//public
jq('img.fade').lazyload({effect: "fadeIn"});
jq('img.left').lazyload({effect: "fadeIn"});
//public END

jq(".frame_top .right a.app").hover(function(){
		jq(".frame_top .app_QR_code").slideDown();
	},function(){
		jq(".frame_top .app_QR_code").hide();
});

jq(".frame_head .search #KeyWord").focus(function(){
	var num = jq(this).val();
	if(!num){
	jq(this).parent().find(".hot").hide();
	}
	});
jq(".frame_head .search #KeyWord").blur(function(){
	var num = jq(this).val();
	if(!num){
	jq(this).parent().find(".hot").show();
	}
	});
	
jq(".frame_menu ul.one li.more").hover(function(){
		jq(".frame_menu ul .more_main").slideDown();
	},function(){
		jq(".frame_menu ul .more_main").hide();
});

 var ShareId = "";
 var Sharetext = "";
  jq(document).on("mouseover",".Satin_function .Satin_r .share",function(){
		   ShareId = jq(this).attr("data-id");
		   Sharetext = jq(this).parents(".Satin_function").parent().find("p").eq(1).html();
		  

  });  
  
 jq(document).on("click",".Satin_function .Satin_r .share .share_main a",function(){
		   var tid =jq(this).parents(".share").attr("data-id");
		   var num=parseInt(jq(this).parents(".share").find("font").html());
		   var obj=jq(this).parents(".share").find("font");
		   jq.post("ajax.php?act=fenxiang",{tid:tid},function(data){
				   obj.html(num+1);
		   });

  });    
     
       

function SetShareUrl(cmd, config) {            
            if (ShareId) {
                config.bdUrl = "http://"+document.domain+"/forum.php?mod=viewthread&tid=" + ShareId;  
				config.bdText =+ Sharetext;  
				
            }
            return config;
        }


//分享
window._bd_share_config={"common":{onBeforeClick: SetShareUrl,"bdSnsKey":{},"bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];

jq(".frame_main.text .details_main .details_evaluate dl dd .message .text textarea").click(function(){
	jq(this).parents(".message").addClass("on");
});


//投诉

/*jq(document).on("click",".complain",function(){
	jq(".alert-background").fadeTo("show",1);
	jq(".complain_alert").show();
	
});*/
jq(".complain_alert .close").click(function(){
	jq(".complain_alert").hide();
	jq(".alert-background").fadeOut();
});

jq(".complain_alert .complain_content label input").click(function(){
var val=jq('input:radio[name="complain"]:checked').val();
var html=jq(this).val();
var type=jq(this).attr("class");
   if(val!=null){
	   if(type=="textarea"){
		  jq(".complain_alert .complain_content textarea").slideDown();
	   }else{
		  jq(".complain_alert .complain_content textarea").slideUp();
		}
   }
});






function buganxingqu(tid,obj){
		
		
		jq.post("ajax.php?act=notinterested",{tid:tid},function(data){
			if(data==0){
				
				showWindow('login', 'member.php?mod=logging&action=login')
			}else if(data==1){
				
				jq(obj).parents("li").remove();
			}
		});
		doane();
}
function forumzan(tid,type,obj){
	
	var num=parseInt(jq(obj).html());
	
	jq.post("ajax.php?act=duanzizan",{tid:tid,type:type},function(data){
			
			if(data==1){
				jq(obj).html(num+1);
				jq(obj).addClass("on");
			}else{
				showDialog("您已经点过了！", 'alert', '错误信息', null, true, null, '', '', '', 3);
				
			}
		});
		doane();
}


function pinglunzan(pid,obj){
	
	var num=parseInt(jq(obj).html());
	
	jq.post("ajax.php?act=pinglunzan",{pid:pid},function(data){
			
			if(data==1){
				jq(obj).html(num+1);
				jq(obj).addClass("on");
			}else{
				showDialog("您已经点过了！", 'alert', '错误信息', null, true, null, '', '', '', 3);
				
			}
		});
		doane();
		
}


function plunzan(pid,obj){
	
	var num=parseInt(jq(obj).find('font').html());
	
	jq.post("ajax.php?act=plunzan",{pid:pid},function(data){
			
			if(data==1){
				jq(obj).find('font').html(num+1);
				jq(obj).addClass("on");
			}else{
				showDialog("您已经点过了！", 'alert', '错误信息', null, true, null, '', '', '', 3);
				
			}
		});
		doane();
		
}

function dingyue(uid,obj){
	
	
	
	jq.post("ajax.php?act=dingyue",{uid:uid},function(data){
			
			if(data==1){
				
				showDialog("订阅成功！", 'notice');
				jq(obj).addClass("on");
				jq(obj).attr("onclick","").html("已订阅");
			}else{
				
				showDialog("您已经订阅过了！", 'alert', '错误信息', null, true, null, '', '', '', 3);
				
			}
		})
		doane();
}

function getMousePos(event) {
            var e = event || window.event;
            var scrollX = document.documentElement.scrollLeft || document.body.scrollLeft;
            var scrollY = document.documentElement.scrollTop || document.body.scrollTop;
            var x = e.pageX || e.clientX + scrollX;
            var y = e.pageY || e.clientY + scrollY;
            //alert('x: ' + x + '\ny: ' + y);
			var info = [x,y];
            return info;
        }	


var left_height = jq(".frame_main .left").height();
var data_type = jq(".frame_main .left").attr("data-type");
jq(window).scroll(function() {
	//菜单滑动
	var scrollTop = jq(window).scrollTop();
	if(scrollTop>190){
		jq(".frame_menu").css({"position":"fixed","top":0});
	}else{
		jq(".frame_menu").css({"position":"","top":""});
	}
	
	if(data_type!=1){
		if(scrollTop>left_height){
			jq(".frame_main .left").addClass("on");
			jq(".frame_main .Selected_pic,.frame_main .Selected_video,.frame_main .friendly_links,.frame_main .Copyright").hide();
		}else{
			jq(".frame_main .left").removeClass("on");
			jq(".frame_main .Selected_pic,.frame_main .Selected_video,.frame_main .friendly_links,.frame_main .Copyright").show();
		}
	}
	//菜单滑动 END
	
	//frame_go_top
	if(scrollTop>200){
		jq(".frame_go_top").slideDown();
	}else{
		jq(".frame_go_top").slideUp();
	}
	
	//frame_go_top END
});

//frame_go_top
jq(".frame_go_top .Gototop").click(function(){
	jq('html,body').animate({'scrollTop':0},500);	
});
//frame_go_top END





//会员中心
jq(".usercenter_content_r_bottom").slide({mainCell:".main",titCell:".tabBox li",trigger:"click"});

function coll_del(id,obj){
		
		jq.post("ajax.php?act=delete_coll",{tid:id},function(data){
			
			if(data==1){
				jq(obj).parents("li").remove();
				showDialog("删除成功！", 'notice');
			}
		})
		doane();
}

function dingyue_del(id,obj){
		
		jq.post("ajax.php?act=delete_dingyue",{id:id},function(data){
			
			if(data==1){
				jq(obj).parents("li").remove();
				showDialog("删除成功！", 'notice');
			}
		})
		doane();
}

function collection_arc(tid,obj){
	
	var num=parseInt(jq(obj).find('font').html());
	
	jq.post("ajax.php?act=collection_arc",{tid:tid},function(data){
			
			if(data==2){
				location='member.php?mod=logging&action=login';
				return false;	
			}
			
			if(data==1){
				showDialog("收藏成功！", 'alert', '错误信息', null, true, null, '', '', '', 3);
				jq(obj).find('font').html(num+1)
				jq(obj).addClass("on");
			}else{
				showDialog("您已经收藏过了！", 'alert', '错误信息', null, true, null, '', '', '', 3);
				
				
				
			}
		});
		doane();
}


function dingyue3(uid,obj){
	
	
	
	jq.post("ajax.php?act=dingyue",{uid:uid},function(data){
			
			showDialog("订阅成功！", 'alert', '错误信息', null, true, null, '', '', '', 3);
			jq(obj).html("取消订阅").addClass("on");
			jq(obj).attr("onclick","qxdingyue("+uid+",this)");
		})
		
}

function qxdingyue(uid,obj){
	
	
	
	jq.post("ajax.php?act=delete_dingyue",{id:uid},function(data){
		showDialog("取消订阅成功！", 'alert', '错误信息', null, true, null, '', '', '', 3);
			jq(obj).html("订阅").removeClass("on");
			
			jq(obj).attr("onclick","dingyue3("+uid+",this)");
		})
		
}