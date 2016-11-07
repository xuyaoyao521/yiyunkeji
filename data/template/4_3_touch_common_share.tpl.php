<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<script src="/cordova.js" type="text/javascript"></script>
<script type="text/javascript">
//创建公用参数
var public_url = window.location.href;
var public_host = window.location.host;
var public_title = document.title;
var public_icon = "http://"+public_host+"/public/images/ico.png";
var public_description;
function getdata(url,title,description,image){
public_url="http://"+public_host+"/"+url;
public_title=title;

if(description){
public_description=	description;
}else{
public_description="";
}
if(image){

public_icon="http://"+public_host+"/"+image;


}
}
//创建公用参数 END
function shareToMore() {
    plugins.socialsharing.share(public_title, null, null, public_url);	
 };	


function shareToWeixinScene() {
function success(result) {
        alert(JSON.stringify(result));
    }
    function error(result) {
        alert(JSON.stringify(result));
    }
    navigator.weixin.share({
        message : {
            title : public_title,
            description : "分享到微信朋友圈",
            mediaTagName : "Media Tag Name(optional)",
            thumb : "http://YOUR_THUMBNAIL_IMAGE",
            media : {
                // type: weixin.Type.WEBPAGE, // webpage
                webpageUrl : public_url
            // webpage
            }
        },
        scene : navigator.weixin.Scene.TIMELINE
    }, success, error);
};//分享到微信朋友圈

function shareToWeixin() {
function success(result) {
        alert(JSON.stringify(result));
    }
    function error(result) {
        alert(JSON.stringify(result));
    }
    navigator.weixin.share({
        message : {
            title : public_title,
            description : "分享到微信联系人",
            mediaTagName : "Media Tag Name(optional)",
            thumb : "http://YOUR_THUMBNAIL_IMAGE",
            media : {
                // type: weixin.Type.WEBPAGE, // webpage
                webpageUrl : public_url
            // webpage
            }
        },
        scene : navigator.weixin.Scene.SESSION
    }, success, error);
};//分享到微信联系人

function shareToQzone() {
function success(result) {
        //alert(JSON.stringify(result));
    }
    function error(result) {
        //alert(JSON.stringify(result));
    }
    var args = {};
    args.url = location.href.split('#')[0];
    args.title = public_title;
    args.description = public_description;
    args.imageUrl = [public_icon];
    args.appName = "<?php echo $_G['setting']['bbname'];?>";
 
    navigator.QQ.shareToQzone(success, error, args);
};//分享到qq空间

function shareToQQ() {
function success(result) {
//alert(JSON.stringify(result));
}
function error(result) {
//alert(JSON.stringify(result));
}

var args = {};
args.url = public_url;
args.title = public_title;
args.description = public_description;
args.imageUrl = public_icon;
args.appName = "<?php echo $_G['setting']['bbname'];?>"; 
navigator.QQ.shareToQQ(success, error, args);
};//分享到QQ好友

function shareToWeibo() {
function success(result) {
            alert(JSON.stringify(result));
        }
        function error(result) {
            alert(JSON.stringify(result));
        }
        navigator.Weibo.shareToWeibo(success, error, {
            "title" : public_title,
            "url" : public_url,
            "imageUrl" : public_icon
        });
};///新浪微博分享

</script>
<div id="box" style="display:none;" class=""></div>
<a href="javascript:;" title="返回顶部" class="scrolltop bottom"></a>
<div id="share_other" class="sharepop share_qt" style="display:none">
    <div onclick="sharenv('hide')" style="width: 100%;height: 100%"></div>
    
    <div class="share_fx">
    	<div class="share_scrolls">
      
                <ul>
                    <li><a href="javascript:shareToWeixinScene();"><span></span>微信朋友圈</a></li>
                    <li><a href="javascript:shareToWeixin();"><span class="weixin"></span>微信好友</a></li>
                    <li><a href="javascript:shareToQzone();"><span class="qqzone"></span>QQ空间</a></li>
                    <li><a href="javascript:shareToQQ();"><span class="qqfriends"></span>QQ好友</a></li>
                    <li><a href="javascript:shareToWeibo();"><span class="sinablog"></span>新浪微博</a></li>
                    <li><a href="javascript:shareToMore();"><span class="moreshare"></span>更多</a></li>
                </ul>
         
        </div>
        <!-- JiaThis Button BEGIN -->
<script src="template/mobile/toutiao_mobile/js/iscroll.js" type="text/javascript"></script>
<script>
var share_num = $(".share_fx ul li").length;

var body_width = $("body").width();
var share_width = $(".share_fx ul li").width();
$(".share_fx ul li").width(body_width*share_width/100);
$(".share_fx ul").width(body_width*share_width/100*share_num);

var shareScroll;
function shareloaded () {
shareScroll = new IScroll('.share_scrolls', { scrollX: true, scrollY: false, mouseWheel: true, click: true });
}
</script>
<script src="template/mobile/toutiao_mobile/js/jiathis_m.js" type="text/javascript"></script>
        <!-- JiaThis Button END -->
    <p onclick="sharenv('hide')"><?php echo m_lang('share_exit'); ?></p>
</div>
</div>
<script>
function sharenv(action) {
if (action == 'share_qt') {
$('#share_other').fadeIn(350);
$(".share_fx").slideDown();
} else {
$(".share_fx").slideUp();
$('#share_other').fadeOut(350);
}
shareloaded();
}

</script>
