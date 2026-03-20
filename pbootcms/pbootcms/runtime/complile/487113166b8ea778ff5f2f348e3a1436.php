<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui" />
<meta name="format-detection" content="telephone=no" />
<title>{sort:title}</title>
<meta name="keywords" content="{sort:keywords}">
<meta name="description" content="{sort:description}">
<link href="{pboot:sitedomain}/m/css/style.css" rel="stylesheet">
<link href="{pboot:sitedomain}/m/css/common.css" rel="stylesheet">
<script src="{pboot:sitedomain}/m/js/autofontsize.min.js"></script>
<script src="{pboot:sitedomain}/m/js/jquery.js"></script>
<script src="{pboot:sitedomain}/m/js/clipboard.min.js"></script>
<script src="{pboot:sitedomain}/m/js/common.js"></script>
</head>
<body>
<!--顶部开始-->
<header id="top_main" class="header">
  <div id="top" class="clearfix"><a class="logo" href="{pboot:sitedomain}/" title="{pboot:companynam"> <img src="{label:logo_m}" alt="{pboot:companynam}"></a>
    <div class="topsearch" id="topsearch"><span class="btn_search icon"></span></div>
    <!--搜索栏开始-->
    <div class="tsearch hidden" id="tsearch">
      <form action="{pboot:scaction}">
        <input class="txt" type="text" name="keyword" value="请输入关键字" onfocus="if(this.value==defaultValue)this.value=''" onblur="if(this.value=='')this.value=defaultValue">
        <input class="btn icon" type="submit" value="" name="">
      </form>
    </div>
    <!--搜索栏结束-->
    <div class="btn_close_main hidden" style="display: none;"><a class="btn_close icon"></a></div>
    <div id="nav" class="cur">
      <p class="nav icon"></p>
    </div>
  </div>
</header>
<!--顶部结束--> 
<!--右侧导航开始-->
<nav class="subNav trans" id="subNav">
  <div class="subNavCon trans">
    <ul class="clearfix">
      <li><a href="{pboot:sitedomain}/"  title="网站首页">网站首页</a></li>
      {pboot:nav parent=0}
      <li><a href='[nav:link]'>[nav:name]</a></li>
     {/pboot:nav}
    </ul>
  </div>
</nav>
<!--右侧导航结束--> 
<!--位置开始--> 
<section class="cateList"> <span class="goBack iconbef" id="goBack"></span>
  <h3>{sort:parentname}<s class="iconn"></s></h3>
  <!--栏目分类开始-->
  <div class="box">  {pboot:nav num=10 parent={sort:tcode}} {pboot:if('[nav:scode]'=='{sort:scode}')}<a href='[nav:link]' class='on'>[nav:name]</a> {else}<a href="[nav:link]" title="[nav:name]">[nav:name]</a> {/pboot:if}{/pboot:nav} </div>
  <!--栏目分类结束--> 
</section>

<!--位置结束--> 
<!--单页内容开始-->
<section class="content showInfo">
  <div class="contxt">
    <p>{content:content}</p>
    <!--地图开始--> 
    <script type="text/javascript" src="{pboot:sitedomain}/m/js/map.js"></script>
    <style type="text/css">
#allmap {width: 100%;height: 6.2rem; margin-top: .2rem;}
#allmap b{color: #CC5522;font-weight: bold;}
#allmap img{max-width: none;}
</style>
    <div id="allmap"></div>
    <script type="text/javascript">
	  var map = new BMap.Map("allmap");
	  map.centerAndZoom(new BMap.Point({label:zuobiao}), 18);
	  var marker1 = new BMap.Marker(new BMap.Point({label:zuobiao}));  // 创建标注
	  map.addOverlay(marker1);              // 将标注添加到地图中
	  //marker1.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画				
	  //创建信息窗口 
	  var infoWindow1 = new BMap.InfoWindow("<b>{pboot:companyname}</b><br>地址：{pboot:companyaddress}<br>电话：{pboot:companyphone}");
	  marker1.openInfoWindow(infoWindow1);
	  //marker1.addEventListener("click", function(){this.openInfoWindow(infoWindow1);});	
	  //向地图中添加缩放控件
 var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
 map.addControl(ctrl_nav);
      //向地图中添加缩略图控件
 var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
 map.addControl(ctrl_ove);
      //向地图中添加比例尺控件
 var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
 map.addControl(ctrl_sca);
 
 map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地				
</script> 
    <!--地图结束--></div>
</section>
<!--单页内容结束--> 
<div id="returntop" class="icon hidden"></div>
<!--页尾开始-->
<footer id="footer_main"> 
  <!--底部导航开始-->
  <div class="bottomNav">
    <ul class="list">
       {pboot:nav parent=0}
      <li><a href='[nav:link]'>
        <h3 class='tit'>[nav:name]</h3>
        <em class='icon'></em></a></li>
   {/pboot:nav}
    </ul>
  </div>
  <!--底部导航结束--> 
  
  <!--版权开始-->
  <div id="copyright">
    <p>{pboot:sitecopyright}</p>
    <p>备案号：<a href="http://beian.miit.gov.cn"  target="_blank" title="{pboot:siteicp}">{pboot:siteicp}</a>　<!--<a href="">网站地图</a>--
     </p>
  </div>
  <!--版权结束--> 
</footer>
<!--页尾结束--> 

<!--底部图标开始-->
<section id="toolbar">
  <ul class="list clearfix">
    <li><a href="{pboot:sitedomain}/" title="首页"><s class="icon"></s><span>首页</span></a></li>
    <li><a href="tel:{pboot:companymobile}" title="电话"><s class="icon"></s><span>电话</span></a></li>
    <li><a onclick="dkcf()" title="微信"><s class="icon"></s><span>微信</span></a></li>
   {pboot:sort scode=11} <li><a href="[sort:link]" title="地图"><s class="icon"></s><span>地图</span></a></li>{/pboot:sort}
  
  </ul>
</section>
<!--底部图标结束-->

<div id="wxnr">
  <div class="nrdf"> <i onclick="gbcf()">X</i><img src="{pboot:companyweixin}" />
    <p>截屏，微信识别二维码</p>
    <p>微信：<span id="btn" data-clipboard-text="{label:wx}">{label:wx}</span></p>
    <p>（点击微信号复制，添加好友）</p>
  </div>
</div>
<div id="weixin">微信号已复制，请打开微信添加咨询详情！</div>
<script type="text/javascript" src="{pboot:sitedomain}/m/js/app.js" ></script>
</body>
</html><?php return array (
  0 => '/www/wwwroot/pbootcms/template/default/wap/comm/head.html',
  1 => '/www/wwwroot/pbootcms/template/default/wap/comm/left.html',
  2 => '/www/wwwroot/pbootcms/template/default/wap/comm/foot.html',
); ?>