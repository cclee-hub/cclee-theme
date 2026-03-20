<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{sort:title}</title>
<meta name="keywords" content="{sort:keywords}">
<meta name="description" content="{sort:description}">
<meta name="viewport" content="width=1380">
<link href="{pboot:sitedomain}/skin/css/aos.css" rel="stylesheet">
<link href="{pboot:sitedomain}/skin/css/style.css" rel="stylesheet">
<link href="{pboot:sitedomain}/skin/css/common.css" rel="stylesheet">
<script src="{pboot:sitedomain}/skin/js/jquery.js"></script>
<script src="{pboot:sitedomain}/skin/js/jquery.superslide.2.1.1.js"></script>
<script src="{pboot:sitedomain}/skin/js/common.js"></script>
</head>
<body>
<!--页头开始-->
<div class="top_bg">
  <div class="w1200">
    <div class="fl">{label:top}</div>
    <div class="top_con"> <a href="{pboot:sitedomain}/sitemap.xml" title="网站地图">网站地图</a> {pboot:sort scode=10,11} <a href="[sort:link]" >[sort:name]</a> 
 {/pboot:sort}
    </div>
      {pboot:if({pboot:islogin}==1)}<a class="text-secondary" href="{pboot:ucenter}" >个人中心</a>
		     {else}
		     	{pboot:2if({pboot:registerstatus})}<a class="text-secondary" href="{pboot:register}" >注册</a>{/pboot:2if}
		     	/ {pboot:2if({pboot:loginstatus})}<a class="text-secondary" href="{pboot:login}" >登录</a>{/pboot:2if}
		     {/pboot:if}
    <div class="clearboth"></div>
  </div>
</div>
<div class="header_main">
  <div class="header w1200 clearfix"><a class="logo fl" href="{pboot:sitedomain}/" title="{pboot:companyname}" aos="fade-right" aos-easing="ease" aos-duration="700" aos-delay="100" aos-duration="700"> <img src="{pboot:sitelogo}" alt="{pboot:companyname}"></a>
    <div class="tel fr" aos="fade-left" aos-easing="ease" aos-duration="700" aos-delay="100"><s class="ico"></s><span>{pboot:companyphone}</span><br />
      <span>{pboot:companymobile}</span></div>
  </div>
</div>
<!--页头结束--> 
 
<!--导航开始-->
<div class="nav_main" aos="fade-down" aos-easing="ease" aos-duration="700">
  <div class="nav w1200">
    <ul class="list clearfix" id="nav">
      <li id="cur"   {pboot:if(0=='{sort:scode}')}class='hover'{/pboot:if} ><a href="{pboot:sitedomain}/" title="网站首页">网站首页</a></li>
      {pboot:nav parent=0}
      <li><a href="[nav:link]" title="[nav:name]" class='{pboot:if('[nav:scode]'=='{sort:tcode}')}hover{/pboot:if}'>[nav:name]</a> {pboot:if([nav:soncount]>0)}
        <dl>
          {pboot:2nav parent=[nav:scode]}
          <dd><a href="[2nav:link]" title="[2nav:name]">[2nav:name]</a> </dd>
          {/pboot:2nav}
            
        </dl>
        {/pboot:if} </li>
      {/pboot:nav}
    </ul>
    
  </div>
</div>
<!--导航结束--> 
<!--内页大图开始-->
<div class="nybanner" aos="fade-up" aos-easing="ease" aos-duration="700">{pboot:sort scode={sort:tcode}}<img src="[sort:pic]">{/pboot:sort}</div>
<!--内页大图结束-->
<div class="submian">
  <div class="w1200 clearfix">
    <div class="sobtitle"><s class="ico"></s><!-- 当前位置 -->
当前位置：{pboot:position separator='>'}</div>
   <div class="subleft fl"> 
  <!--栏目分类开始-->
  <div class="lefta bor9">
    <div class="title">
      <h2>{sort:parentname}</h2>
    </div>
    <div class="comt">
      <ul>
        {pboot:nav num=10 parent={sort:tcode}}
        {pboot:if('[nav:scode]'=='{sort:scode}')}
        <li class='hover'><a href='[nav:link]'>[nav:name]</a></li>
       {else}
        <li><a href="[nav:link]" title="[nav:name]">[nav:name]</a> </li>
       {/pboot:if}{/pboot:nav}
      </ul>
    </div>
  </div>
  <!--栏目分类结束--> 
  
 <!--推荐产品开始-->
  <div class="leftnews bor9">
    <div class="title"><i>推荐产品</i></div>
    <div class="leftprocomt clearfix">
      <ul>
       {pboot:list scode=5 num=6 order=date}
        <li {pboot:if([list:i]%2==0)}style='margin-right:0;'{else}{/pboot:if}> <a href="[list:link]" title="[list:title]"><img src="[list:ico]" alt="[list:title]">
          <p >[list:title]</p>
          </a></li>

       {/pboot:list}

      </ul>
    </div>
  </div>
  <!--推荐产品结束--> 
  

  
  <!--联系我们开始-->
  <div class="leftnews bor9">
    <div class="title"><i>联系我们</i></div>
    <div class="leftcont">
      <h2>{pboot:companyname}</h2>
      <span>地址：{pboot:companyaddress}<br>
      手机：{pboot:companymobile}<br>
      </span>
      <p>咨询热线<i>{pboot:companyphone}</i></p>
    </div>
  </div>
  <!--联系我们结束--> 
</div>

    <div class="subright fr"> 
      <!--文章列表开始-->
      <div class="thumblist">
        <ul class="list clearfix">
           {pboot:list num=6 order=date}
          <li class="item"><a class="clearfix" href="[list:link]" title="[list:title lencn=30]">
            <div class="txt fr">
              <h3 >[list:title]</h3>
              <div class="mark"><span>时间：[list:date style=Y-m-d]</span><span>浏览量：[list:visits]</span></div>
              <p class="desc">[list:content drophtml=1 lencn=60]</p>
            </div>
            <div class="img"><img src="[list:ico]" alt="[list:title]"></div>
            </a></li>
          {/pboot:list}
        </ul>
        <div class="clear"></div>
        <!--分页样式-->
        
        <div class="pglist"><!-- 分页 -->
{pboot:if({page:rows}>0)}
   <nav aria-label="page navigation" class="my-4">
     <div class="pagination justify-content-center">
     	<a class="page-item page-link" href="{page:index}">首页</a>
     	<a class="page-item page-link" href="{page:pre}">上一页</a>
      	{page:numbar}<!-- 数字条，小屏幕时自动隐藏-->
      	<a class="page-item page-link" href="{page:next}">下一页</a>
      	<a class="page-item page-link" href="{page:last}">尾页</a>
     </div>
   </nav>	
{else}
   	<div class="text-center my-5 text-secondary">本分类下无任何数据！</div>
{/pboot:if}</div>
      </div>
      <!--文章列表结束--> 
  <!--推荐资讯开始-->
      <h4 class="anlitopH4"><span>推荐资讯</span></h4>
      <div class="divremmnews">
        <ul class="clearfix">
		 {pboot:list scode=2 num=8 order=sorting}
          <li><span class="fr">[list:date style=Y-m-d]</span><a href="[list:link]" title="[list:title]" >[list:title]</a></li>
		   {/pboot:list}
        </ul>
      </div>
      <!--推荐资讯结束--> 
    </div>
  </div>
</div>
<div class="link_bg mt40">
  <div class="w1200">
    <h4>友情链接<span>LINKS</span></h4>
    <div class="links_n">{pboot:link gid=1} <a href="[link:link]" title="[link:name]">[link:name]</a> {/pboot:link}</div>
  </div>
</div>
<div class="footer">
  <div class="footerTop">
    <div class="w1200">
      <div class="footerMenu" aos="fade-up" aos-easing="ease" aos-duration="700">
        <ul class="clearfix">
          <li><a href="/">网站首页</a></li>
          {pboot:nav}
          <li ><a href="[nav:link]">[nav:name]</a></li>
          {/pboot:nav}
        </ul>
      </div>
      <div class="conBox clearfix" aos="fade-up" aos-easing="ease" aos-duration="700" aos-delay="300">
        <div class="conL"> {pboot:nav parent=0 num=4}
          <dl>
            <dt><a href="[nav:link]" title="[nav:name]">[nav:name]</a></dt>
            <dd> {pboot:if([nav:soncount]>0)}{pboot:2nav parent=[nav:scode]} <a href="[2nav:link]" title="[2nav:name]">[2nav:name]</a> {/pboot:2nav}{/pboot:if} </dd>
          </dl>
          {/pboot:nav}
          <dl class="dl5">
            <dt>联系我们</dt>
            <dd>
              <p>客服QQ：{pboot:companyqq} </p>
              <p>电话：{pboot:companymobile} </p>
              <p>地址：{pboot:companyaddress}　</p>
            </dd>
          </dl>
        </div>
        <div class="conR" aos="fade-up" aos-easing="ease" aos-duration="700" aos-delay="300">
          <p> <img src="{pboot:companyweixin}" width="102" height="103" alt=""> <span>扫一扫，加微信</span> </p>
        </div>
      </div>
    </div>
  </div>
  <div class="footerBottom">
    <p>{pboot:sitecopyright} {pboot:siteicp}</p>
  </div>
</div>

<!--浮动客服开始-->
<dl class="toolbar" id="toolbar">
  <dd><a class="slide tel slide-tel" href="javascritp:void(0);" title="咨询热线"><i><span></span></i>{pboot:companyphone}</a></dd>
  <dd><a href="http://wpa.qq.com/msgrd?v=3&uin={pboot:companyqq}&site=qq&menu=yes" title="在线QQ"><i class="qq"><span></span></i></a></dd>
  <dd><i class="code"><span></span></i>
    <ul class="pop pop-code">
      <li> <img src="{pboot:companyweixin}" alt="{pboot:companyname}"/>
        <h3><b>微信：{label:wx}</b>微信二维码</h3>
      </li>
    </ul>
  </dd>
  <dd> <a href="javascript:;"><i id="top" class="top"><span></span></i></a></dd>
</dl>
<!--浮动客服结束--> 
<script src="{pboot:sitedomain}/skin/js/aos.js"></script> 
<script src="{pboot:sitedomain}/skin/js/app.js"></script> 
<script type="text/javascript">   			
	AOS.init({
		easing: 'ease-out-back',
		duration: 1000
	});
</script> 

</body>
</html><?php return array (
  0 => '/www/wwwroot/pbootcms/template/default/comm/head.html',
  1 => '/www/wwwroot/pbootcms/template/default/comm/position.html',
  2 => '/www/wwwroot/pbootcms/template/default/comm/left.html',
  3 => '/www/wwwroot/pbootcms/template/default/comm/page.html',
  4 => '/www/wwwroot/pbootcms/template/default/comm/foot.html',
); ?>