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
<!--产品列表开始-->
<section class="content caselist">
  <ul class="list-loop clearfix">
   {pboot:list num=6 order=sorting}
    <li class="loop"><a href="[list:link]" title="[list:title]">
      <figure><img src="[list:ico]" alt="[list:title]"></figure>
      <h3 >[list:title]</h3>
      </a></li>
     {/pboot:list}
  </ul>
</section>
<div class="pglist"><!-- 分页 -->
{pboot:if({page:rows}>0)}
   <nav aria-label="page navigation" class="my-4">
     <div class="pagination justify-content-center">
     	<a class="page-item page-link" href="{page:pre}">上一页</a>
      	{page:numbar}<!-- 数字条，小屏幕时自动隐藏-->
      	<a class="page-item page-link" href="{page:next}">下一页</a>
     </div>
   </nav>	
{else}
   	<div class="text-center my-5 text-secondary">本分类下无任何数据！</div>
{/pboot:if} </div>
<!--产品列表结束--> 
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
  2 => '/www/wwwroot/pbootcms/template/default/wap/comm/page.html',
  3 => '/www/wwwroot/pbootcms/template/default/wap/comm/foot.html',
); ?>