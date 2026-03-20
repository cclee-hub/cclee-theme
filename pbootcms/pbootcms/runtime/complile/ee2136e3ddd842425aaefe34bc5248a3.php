<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no, minimal-ui" />
<meta name="format-detection" content="telephone=no" />
<title>{pboot:sitetitle}</title>
<meta name="keywords" content="{pboot:sitekeywords}">
<meta name="description" content="{pboot:sitedescription}">
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
<!--幻灯片大图开始-->
<div id="banner_main">
  <div id="banner" class="banner">
    <ul class="list clearfix">
      {pboot:slide gid=2}
      <li><a href="[field:url/]"><img src="[slide:src]" alt="[slide:title]"></a></li>
      {/pboot:slide}
    </ul>
    <div class="tip"></div>
  </div>
</div>
<!--幻灯片大图结束--> 

<!--首页导航开始-->
<nav class="inav_t">
  <dl>
    {pboot:nav parent=0 num=6}
    <dd><a href='[nav:link]'>[nav:name]</a></dd>
    {/pboot:nav}
  </dl>
</nav>
<!--首页导航结束-->

<section class="wrapper index"> 
  <!--产品中心开始-->
  
  <section id="floor_2_main">
    <div class="floor_2">
      <div class="in_title">{pboot:sort scode=5}
        <p class="entit">[sort:subname]</p>
        <h3 class="tit"><em class="line fl"></em><span class="word">[sort:name]</span><em class="line fr"></em></h3>
        {/pboot:sort} </div>
      <!--产品分类开始-->
      <div class="tab"> {pboot:nav parent=5 num=9}<a href="[nav:link]" title="[nav:name]">[nav:name]</a> {/pboot:nav} </div>
      <!--产品分类结束-->
      <div class="proCenter">
        <ul class="list clearfix">
          {pboot:list scode=5 num=6 order=sorting}
          <li><a href="[list:link]" title="[list:title]">
            <div class="img"><img class="img" src="[list:ico]" alt="[list:title]"/></div>
            <div class="txt">
              <h3 class="tit" >[list:title]</h3>
            </div>
            <p class="detail">详情>></p>
            </a></li>
          {/pboot:list}
        </ul>
      </div>
      {pboot:sort scode=5} <a class="look_more" href="[sort:link]" title="查看更多>">查看更多>></a>{/pboot:sort}</div>
  </section>
  
  <!--产品中心结束--> 
  
  <!--小banner开始-->
  <section class="index_slip index_slip1">
    <h3 class="tit">{label:mpc_banner}</h3>
    <a class="slip_btn" href="tel:{pboot:companyphone}">拨打电话</a></section>
  <!--小banner结束--> 
  
  <!--产品优势开始-->
  <section id="floor_3_main">
    <div class="floor_3">
      <div class="in_title">{pboot:sort scode=9}
        <p class="entit">[sort:subname]</p>
        <h3 class="tit"><em class="line fl"></em><span class="word">[sort:name]</span><em class="line fr"></em></h3>
        {/pboot:sort} </div>
      <div class="proAdvant">
        <ul class="list clearfix">
          {pboot:list scode=9 num=6 order=sorting}
          <li class="clearfix"><a>
            <div class="img"><img src="[list:enclosure]"  alt="[nav:name]"/></div>
            <div class="txt">
              <h3 class="tit">[list:title]</h3>
              <p class="cont">[list:content drophtml=1 lencn=100]</p>
            </div>
            </a></li>
          {/pboot:list}
        </ul>
      </div>
    </div>
  </section>
  <!--产品优势结束--> 
  
  <!--工程案例开始-->
  
  <section id="floor_4_main">
    <div class="floor_4">
      <div class="in_title">{pboot:sort scode=8}
        <p class="entit">[sort:subname]</p>
        <h3 class="tit"><em class="line fl"></em><span class="word">[sort:name]</span><em class="line fr"></em></h3>
        {/pboot:sort} </div>
      <!--案例分类开始-->
      <div class="tab"> {pboot:nav parent=8}<a href="[nav:link]" title="[nav:name]">[nav:name]</a> {/pboot:nav} </div>
      <!--案例分类结束-->
      <div class="caseList" id="caseShow">
        <div class="bd">
          <ul class="list clearfix">
            {pboot:list scode=8 num=3 order=sorting}
            <li><a href="[list:link]" title="[list:title]">
              <div class="img"><img class="img" src="[list:ico]" alt="[list:title]"/></div>
              <div class="txt">
                <h3 class="tit" >[list:title]</h3>
                <p class="cont">[list:description lencn=40]</p>
              </div>
              </a></li>
            {/pboot:list}
          </ul>
        </div>
        <div class="hd">
          <ul class="iconList">
          </ul>
        </div>
      </div>
      {pboot:sort scode=8} <a class="look_more" href="[sort:link]" title="查看更多>">查看更多>></a>{/pboot:sort}</div>
  </section>
  
  <!--工程案例结束--> 
  
  <!--小banner开始-->
  <section class="index_slip">
    <h3 class="tit">{label:mcase_banner}</h3>
    <a class="slip_btn" href="tel:{pboot:companyphone}">拨打电话</a></section>
  <!--小banner结束--> 
  
  <!--关于我们开始-->
  
  <section id="floor_1_main">
    <div class="floor_1">{pboot:sort scode=1}
      <div class="about clearfix"><a class="item fl" href="[sort:link]"> <img src="[sort:ico]" /></a>
        <div class="contW fl">{/pboot:sort}
          <div class="in_title">{pboot:sort scode=1}
            <p class="entit">[sort:subname]</p>
            <h3 class="tit"><em class="line fl"></em><span class="word">[sort:name]</span><em class="line fr"></em></h3>
            {/pboot:sort} </div>
          {pboot:content id=1} <a href="[content:link]">
          <p class="cont"> [content:content drophtml=1 len=100]</p>
          </a><a class="view_detail" href="[content:link]" title="了解详情>>">了解详情>></a> </div>
        {/pboot:content} </div>
    </div>
  </section>
  
  <!--关于我们结束--> 
  
  <!--新闻动态开始-->
  
  <section id="floor_5_main">
    <div class="floor_5">
      <div class="in_title">{pboot:sort scode=2}
        <p class="entit">[sort:subname]</p>
        <h3 class="tit"><em class="line fl"></em><span class="word">[sort:name]</span><em class="line fr"></em></h3>
        {/pboot:sort} </div>
      <!--新闻分类开始-->
      <div class="tab"> {pboot:nav parent=2} <a href="[nav:link]" title="[nav:name]">[nav:name]</a> {/pboot:nav} </div>
      <!--新闻分类结束-->
      <div class="inews">
        <ul class="list">
          {pboot:list scode=2 num=8 order=sorting}
          <li><a href="[list:link]" title="[list:title]">
            <h3 class="tit" >[list:title]</h3>
            <p class="time">[list:date style=Y-m-d]</p>
            </a></li>
          {/pboot:list}
        </ul>
        {pboot:sort scode=2} <a class="look_more" href="[sort:link]" title="查看更多>">查看更多>></a> {/pboot:sort}</div>
    </div>
  </section>
  
  <!--新闻动态结束--> 
</section>
<script type="text/javascript" src="{pboot:sitedomain}/m/js/touchslide.1.1.js" ></script> 
<script type="text/javascript">TouchSlide({ slideCell:"#caseShow",titCell:".hd ul",mainCell:".bd ul", effect:"leftLoop", interTime:"5000", autoPage:true,autoPlay:true});</script> 
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
  1 => '/www/wwwroot/pbootcms/template/default/wap/comm/foot.html',
); ?>