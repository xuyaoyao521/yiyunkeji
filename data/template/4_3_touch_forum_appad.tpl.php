<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<html>
<head>
<meta charset="utf-8">
<title>【E云网】不只是一个新闻门户网!</title>
<meta name="robots" content="noindex,nofollow,nosnippet,noarchive,noodp" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<script src="public/js/jquery-1.11.0.min.js" type="text/javascript"></script>
<script src="public/js/Moile_Slide.1.1.js" type="text/javascript"></script>
<style>
body{ margin:0; padding:0; background:#000;}
.index_main{ position:absolute; width:100%; height:100%;animation:myfirst 2s forwards;-moz-animation:myfirst 2s forwards; /* Firefox */-webkit-animation:myfirst 2s forwards; /* Safari and Chrome */-o-animation:myfirst 2s forwards; /* Opera */}

@keyframes myfirst
{
0% { opacity:0}
100% {opacity:1;}
}
@keyframes myfirst
{
0% { opacity:0}
100% {opacity:1;}
}

@-moz-keyframes myfirst /* Firefox */
{
0% { opacity:0}
100% {opacity:1;}
}

@-webkit-keyframes myfirst /* Safari and Chrome */
{
0% { opacity:0}
100% {opacity:1;}
}

@-o-keyframes myfirst /* Opera */
{
0% { opacity:0}
100% {opacity:1;}
}

.go_url{ width:80px; text-align:center; line-height:25px;height:25px;-moz-border-radius: 25px;-webkit-border-radius: 25px;border-radius: 25px; position:absolute; right:15px; top:15px; z-index:99; background:transparent;zoom: 1;background-color: rgba(0,0,0,0.3); /* FF3+, Saf3+, Opera 10.10+, Chrome */filter:alpha(opacity=0.6); color:#fff; font-size:12px; line-height:25px; text-align:center}
.go_url a{ text-decoration:none; color:#fff; display:inline-block; width:100%; height:100%;}


/* 本例子css -------------------------------------- */
.focus{ width:100%; height:100%;  margin:0 auto; overflow:hidden;   }
.focus .hd{ width:100%; height:11px;  position:absolute; z-index:1; bottom:20px; text-align:center;  }
.focus .hd ul{ display:inline-block; height:5px; padding:3px 5px;background:transparent;zoom: 1;background-color: rgba(255,255,255,0.5); /* FF3+, Saf3+, Opera 10.10+, Chrome */filter:alpha(opacity=0.6);	-webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; font-size:0; vertical-align:top;	}
.focus .hd ul li{ display:inline-block; width:5px; height:5px; -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px;background-color: rgba(255,255,255,0.7); /* FF3+, Saf3+, Opera 10.10+, Chrome */filter:alpha(opacity=0.6); margin:0 5px;  vertical-align:top; overflow:hidden;   }
.focus .hd ul .on{ background:#ed344a;  }

.focus .bd{  }
.focus .bd li{}
.focus .bd li img{ width:100%;  height:100%;  }
.focus .bd li a{ -webkit-tap-highlight-color:rgba(0, 0, 0, 0); /* 取消链接高亮 */  }



</style>
</head>

<body>
<div class="go_url"><a href="forum.php?mod=phone&amp;mobile=2">跳过广告</a></div>
<div class="index_main">

<!--Start ================================ -->
<div id="focus" class="focus">
            	
                <?php if($adscount>1) { ?>
<div class="hd">
<ul></ul>
</div>
                <?php } ?>
<div class="bd">
<ul>
                    <?php if(is_array($appads)) foreach($appads as $list) { ?><li><?php echo $list['code'];?></li>
 <?php } ?>
</ul>
</div>
</div>

<!--================================ -->
</div>
<script type="text/javascript">
TouchSlide({ 
slideCell:"#focus",
titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
mainCell:".bd ul", 
effect:"left", 
autoPage:true, //自动分页

});

$(function(){
$(window).resize(function(){
var window_height = $(window).height();
$(".focus .bd li").height(window_height);
});
$(window).resize();
});
</script>
</body>

</html>
