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
<script src="{pboot:sitedomain}/skin/js/jquery.validator.js"></script>
<script src="{pboot:sitedomain}/skin/js/zh_cn.js"></script>
<script src="{pboot:sitedomain}/skin/js/jquery.tips.js"></script>
<script src="{pboot:sitedomain}/js/jquery-1.12.4.min.js" ></script>
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

<div class="submian">
  <div class="w1200 clearfix">
    <div class="sobtitle"><s class="ico"></s><!-- 当前位置 -->
当前位置：{pboot:position separator='>'}</div>
     
    <div class="subright fr"> 

       <!-- 用户登录 -->
    <div class="row">
    	<div class="col-lg-3"></div>
    	<div class="col-12 col-lg-6">
        	<form class="my-4" onsubmit="return login(this);">
                <div class="form-group">
                    <label for="username">账　号</label>
                    <div>
                        <input type="text" name="username" required id="username" class="form-control" placeholder="请输入登录用户名/邮箱/手机号码">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password">密　码</label>
                    <div>
                        <input type="password" name="password" required id="password" class="form-control" placeholder="请输入登录密码">
                    </div>
                </div>
                
                {pboot:if({pboot:logincodestatus})}
                <div class="form-group">
                    <label for="checkcode">验证码</label>
                    <div class="row">
                        <div class="col-6">
                            <input type="text" name="checkcode" required id="checkcode" class="form-control" placeholder="请输入验证码">
                        </div>
                        <div class="col-6">
                            <img title="点击刷新" style="height:33px;" id="codeimg" src="{pboot:checkcode}" onclick="this.src='{pboot:checkcode}?'+Math.round(Math.random()*10);" />
                        </div>
                    </div>
                </div>
                {/pboot:if}
                
                <div class="form-group">
                   <button type="submit" class="btn btn-info mb-2">立即登录</button>
				   <span class="text-secondary ml-3"><a href="{pboot:register}">注册账号</a></span>
				   <span class="text-secondary ml-3"><a href="{pboot:retrieve}">找回密码</a></span>
                </div>
            </form>
        </div>
        <div class="col-lg-3"></div>
    </div> 
</div>

<script>

//ajax登录
function login(obj){
  var url='{pboot:login}';
  var username=$(obj).find("#username").val();
  var password=$(obj).find("#password").val();
  var checkcode=$(obj).find("#checkcode").val();
  
  $.ajax({
    type: 'POST',
    url: url,
    dataType: 'json',
    data: {
    	username: username,
    	password: password,
    	checkcode: checkcode
    },
    success: function (response, status) {
      if(response.code){
    	 alert("登录成功！");
		 location.href=response.tourl; 
      }else{
    	  $('#codeimg').click();
    	 alert(response.data);
      }
    },
    error:function(xhr,status,error){
      alert('返回数据异常！');
    }
  });
  return false;
}
</script>
    
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
  2 => '/www/wwwroot/pbootcms/template/default/comm/foot.html',
); ?>