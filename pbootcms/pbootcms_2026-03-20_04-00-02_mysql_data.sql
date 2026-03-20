-- MySQL dump 10.13  Distrib 5.5.62, for Linux (x86_64)
--
-- Host: localhost    Database: pbootcms
-- ------------------------------------------------------
-- Server version	5.5.62-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `ay_area`
--

DROP TABLE IF EXISTS `ay_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_area` (
  `id` varchar(255) DEFAULT NULL,
  `acode` varchar(255) DEFAULT NULL,
  `pcode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `is_default` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_area`
--

LOCK TABLES `ay_area` WRITE;
/*!40000 ALTER TABLE `ay_area` DISABLE KEYS */;
INSERT INTO `ay_area` VALUES ('1','cn','0','中文','','1','admin','admin','2017-11-30 13:55:37','2018-04-13 11:40:49');
/*!40000 ALTER TABLE `ay_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_company`
--

DROP TABLE IF EXISTS `ay_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_company` (
  `id` varchar(255) DEFAULT NULL,
  `acode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `contact` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `weixin` varchar(255) DEFAULT NULL,
  `blicense` varchar(255) DEFAULT NULL,
  `other` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_company`
--

LOCK TABLES `ay_company` WRITE;
/*!40000 ALTER TABLE `ay_company` DISABLE KEYS */;
INSERT INTO `ay_company` VALUES ('1','cn','中山市优股电子有限公司','广东省中山市东升镇钢宝路6号','528411','叶生','18565636563','13622656582','13622656582','info@youguhaohan.com','253229910','/static/upload/image/20231230/1703907678311413.jpg','','');
/*!40000 ALTER TABLE `ay_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_config`
--

DROP TABLE IF EXISTS `ay_config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_config` (
  `id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `sorting` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_config`
--

LOCK TABLES `ay_config` WRITE;
/*!40000 ALTER TABLE `ay_config` DISABLE KEYS */;
INSERT INTO `ay_config` VALUES ('1','open_wap','1','1','255','手机版'),('2','message_check_code','1','1','255','留言验证码'),('3','smtp_server','smtp.qiye.aliyun.com','2','255','邮件SMTP服务器'),('4','smtp_port','465','2','255','邮件SMTP端口'),('5','smtp_ssl','1','1','255','邮件是否安全连接'),('6','smtp_username','info@youguhaohan.com','2','255','邮件发送账号'),('7','smtp_password','BAIdu123com','2','255','邮件发送密码'),('8','admin_check_code','1','1','255','后台验证码'),('9','weixin_appid','','2','255','微信APPID'),('10','weixin_secret','','2','255','微信SECRET'),('11','message_send_mail','1','1','255','留言发送邮件开关'),('12','message_send_to','info@youguhaohan.com','1','255','留言发送到邮箱'),('13','api_open','0','2','255','API开关'),('14','api_auth','1','2','255','API强制认证'),('15','api_appid','','2','255','API认证用户'),('16','api_secret','','2','255','API认证密钥'),('17','baidu_zz_token','','2','255','百度站长密钥'),('18','baidu_xzh_appid','','2','255','熊掌号appid'),('19','baidu_xzh_token','','2','255','熊掌号token'),('20','wap_domain','','2','255','手机绑定域名'),('21','gzip','0','2','255','GZIP压缩'),('22','content_tags_replace_num','','2','255','内容关键字替换次数'),('23','smtp_username_test','info@youguhaohan.com','2','255','测试邮箱'),('24','form_send_mail','1','2','255','表单发送邮件'),('25','baidu_xzh_type','0','2','255','熊掌号推送类型'),('26','watermark_open','1','2','255','水印开关'),('27','watermark_text','优股电子','2','255','水印文本'),('28','watermark_text_font','','2','255','水印文本字体'),('29','watermark_text_size','20','2','255','水印文本字号'),('30','watermark_text_color','100,100,100','2','255','水印文本字体颜色'),('31','watermark_pic','/static/images/logo.png','2','255','水印图片'),('32','watermark_position','4','2','255','水印位置'),('33','message_verify','1','2','255','留言审核'),('34','form_check_code','1','2','255','表单验证码'),('35','lock_count','5','2','255','登陆锁定阈值'),('36','lock_time','900','2','255','登录锁定时间'),('37','url_rule_type','2','2','255','路径类型'),('38','message_status','1','2','255',''),('39','form_status','1','2','255',''),('40','ip_deny','','2','255',''),('41','ip_allow','','2','255',''),('42','close_site','0','2','255',''),('43','close_site_note','','2','255',''),('44','content_keyword_replace','','2','255',''),('45','upgrade_branch','3.X','2','255',''),('46','upgrade_force','0','2','255',''),('47','lgautosw','1','2','255',''),('48','to_https','0','2','255',''),('49','to_main_domain','0','2','255',''),('50','main_domain','','2','255',''),('51','url_rule_sort_suffix','0','2','255',''),('52','spiderlog','1','2','255',''),('53','sn','04473F1D12,13552FE173,7D53BC2235,7BBC055C08','2','255',''),('54','sn_user','','2','255',''),('55','licensecode','MDQ0NzNGMUQxMiwxMzU1MkZFMTczLDdENTNCQzIyMzUsN0JCQzA1NUMwOC8=4','2','255',''),('56','message_rqlogin','1','2','255',''),('57','tpl_html_dir','','2','255',''),('58','comment_send_mail','1','2','255',''),('59','url_rule_content_path','0','2','255',''),('60','url_index_404','1','2','255',''),('61','register_status','1','2','255',''),('62','register_type','1','2','255',''),('63','register_check_code','1','2','255',''),('64','register_verify','1','2','255',''),('65','login_status','1','2','255',''),('66','login_check_code','1','2','255',''),('67','login_no_wait','0','2','255',''),('68','comment_status','1','2','255',''),('69','comment_anonymous','0','2','255',''),('70','comment_check_code','1','2','255',''),('71','comment_verify','1','2','255',''),('72','register_score','100','2','255',''),('73','login_score','10','2','255',''),('74','register_gcode','1','2','255',''),('75','home_upload_ext','jpg,png,pdf','2','255','');
/*!40000 ALTER TABLE `ay_config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_content`
--

DROP TABLE IF EXISTS `ay_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_content` (
  `id` varchar(255) DEFAULT NULL,
  `acode` varchar(255) DEFAULT NULL,
  `scode` varchar(255) DEFAULT NULL,
  `subscode` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `titlecolor` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `outlink` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `ico` varchar(255) DEFAULT NULL,
  `pics` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `enclosure` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sorting` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `istop` varchar(255) DEFAULT NULL,
  `isrecommend` varchar(255) DEFAULT NULL,
  `isheadline` varchar(255) DEFAULT NULL,
  `visits` varchar(255) DEFAULT NULL,
  `likes` varchar(255) DEFAULT NULL,
  `oppose` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL,
  `gtype` varchar(255) DEFAULT NULL,
  `gid` varchar(255) DEFAULT NULL,
  `gnote` varchar(255) DEFAULT NULL,
  `picstitle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_content`
--

LOCK TABLES `ay_content` WRITE;
/*!40000 ALTER TABLE `ay_content` DISABLE KEYS */;
INSERT INTO `ay_content` VALUES ('1','cn','1','','公司简介','#333333','','','admin','本站','','2018-04-11 17:26:11','','','&lt;p&gt;中山市优股电子有限公司是专业生产电子焊接工具制造商。&lt;/p&gt;&lt;p&gt;集研发，生产，销售于一体。&lt;/p&gt;&lt;p&gt;工厂不断创新勇于采用新科技进行产品的研发，以专业的技术高性价比的产品为客户提供选择。&lt;/p&gt;&lt;p&gt;中山市优股电子有限公司的诚信、实力和产品质量获得业界的认可。&lt;/p&gt;&lt;p&gt;欢迎各界朋友莅临参观、指导和业务洽谈。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','','','','PbootCMS是全新内核且永久开源免费的PHP企业网站开发建设管理系统，是一套高效、简洁、 强悍的可免费商用的PHP CMS源码，能够满足各类企业网站开发建设的需要。系统采用简单到想哭的模板标签，只要懂HTML就可快速开发企业网站。官方提供了大量网站模板免费下载和使用，将致力于为广大开发者和企','255','1','0','0','0','102','0','0','admin','admin','2018-04-11 17:26:11',' 2023-12-31 09:11:55','4','','',''),('2','cn','10','','在线留言','#333333','','','admin','本站','','2018-04-11 17:30:36','','','','','','','','255','1','0','0','0','66','0','0','admin','admin','2018-04-11 17:30:36','2018-04-11 17:30:36','4','','',''),('3','cn','11','','联系我们','#333333','','','admin','本站','','2018-04-11 17:31:29','','','&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;strong&gt;中山市优股电子有限公司&lt;/strong&gt;&lt;/span&gt;&lt;br/&gt;------------------------------------------------&lt;/p&gt;&lt;p&gt;地址：中国广东中山市东升镇钢宝路6号5楼&lt;br/&gt;电话：86-185-656-3653&lt;br/&gt;邮箱：info@','','','','地址：这里是您的公司地址电话：+86-0000-88888传真：+86-0000-88888邮编：570000邮箱：这里是您公司的邮箱地址','255','1','0','0','0','83','0','0','admin','admin','2018-04-11 17:31:29',' 2024-01-03 09:38:37','4','','',''),('4','cn','3','','元旦快乐','#333333','','','admin','本站','','2018-04-12 20:30:00','/static/upload/image/20231231/1704025952402725.jpg','','&lt;p&gt;祝大家元旦快乐！&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/static/upload/image/20231231/1704025812110528.jpg&quot; alt=&quot;1234.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','','','','PbootCMS是全新内核且永久开源免费的PHP企业网站开发建设管理系统，是一套高效、简洁、 强悍的可免费商用的PHP CMS源码，能够满足各类企业网站开发建设的需要。系统采用简单到想哭的模板标签，只要懂HTML就可快速开发企业网站。官方提供了大量网站模板免费下载和使用，将致力于为广大开发者和企','255','1','1','1','0','5','0','0','admin','admin','2018-04-11 17:43:19',' 2023-12-31 20:32:34','4','0','',''),('9','cn','7','','200系列产品','#333333','','','admin','本站','','2018-04-12 10:11:20','/static/upload/image/20231231/1704030197295698.jpg','/static/upload/image/20231231/1704030278792571.jpg,/static/upload/image/20231231/1704030532892840.jpg,/static/upload/image/20231231/1704030539326730.jpg','&lt;p&gt;&lt;span style=&quot;color: #626675; font-family: &amp;quot;Helvetica Neue&amp;quot;, Helvetica, Arial, &amp;quot;PingFang SC&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, &amp;quot;WenQuanYi Micro Hei&amp;','','','','PbootCMS是全新内核且永久开源免费的PHP企业网站开发建设管理系统，是一套高效、简洁、 强悍的可免费商用的PHP CMS源码，能够满足各类企业网站开发建设的需要。系统采用简单到想哭的模板标签，只要懂HTML就可快速开发企业网站。官方提供了大量网站模板免费下载和使用，将致力于为广大开发','255','1','0','0','0','9','0','0','admin','admin','2018-04-12 10:20:28',' 2023-12-31 21:49:01','4','0','',',,'),('15','cn','9','','工厂铺货','#333333','','','admin','本站','','2018-04-12 10:34:24','/static/upload/image/20200225/1582644177414945.jpg','','&lt;p&gt;专柜+工厂+电商，从线下到线上，让实惠和便捷到家。与市场化运作需求紧密贴合，全面满足客户对产品和盈利的需求。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','','/static/upload/image/20200226/1582701426517277.png','','垃圾桶等产品无论在结构功能方面，与市场化运作需求紧密贴合，全面满足客户对产品和盈利的需求。','255','1','0','0','0','4','0','0','admin','admin','2018-04-12 10:37:25',' 2023-12-31 20:17:39','4','0','',''),('16','cn','9','','质优高保','#333333','','','admin','本站','','2018-04-12 10:37:31','/static/upload/image/20231231/1704024747266287.jpg','','&lt;p&gt;优质原料+智能化生产，确保产品质量。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','','/static/upload/image/20200226/1582701416218228.png','','构建了垃圾分类产业完整闭环，实现了基于闭环的大数据支撑、开放型技术架构，方便各类行业生态接入。','255','1','0','0','0','3','0','0','admin','admin','2018-04-12 10:37:57',' 2023-12-31 20:18:30','4','0','',''),('17','cn','9','','生产上线','#333333','','','admin','本站','','2018-04-12 10:38:09','/static/upload/image/20231231/1704024526265595.jpg','','&lt;p&gt;&lt;span style=&quot;color: #666666; font-family: &amp;quot;microsoft yahei&amp;quot;, 宋体, Arial; font-size: 14px; text-align: center; background-color: #FFFFFF;&quot;&gt;智能化生产，规格一丝不苟，来样或图纸均可定制个性化解决方案，交货速度使用寿命及性价比在整个行业中处于领先地位。&lt;/span&gt;&lt;/p&','','/static/upload/image/20200226/1582701406646739.png','','定制整体化服务解决方案，提供社区和楼宇智能垃圾分类闭环解决方案，运营方案在整个行业中处于领先地位。','255','1','0','0','0','5','0','0','admin','admin','2018-04-12 10:39:40',' 2023-12-31 20:19:04','4','0','',''),('18','cn','9','','售后服务','#333333','','','admin','本站','','2020-02-25 23:23:00','/static/upload/image/20200225/1582644195504954.jpg','','&lt;p&gt;秉承“诚信、务实、精益、创新”的企业文化，致力于“品质第一重要”，努力为客户朋友提供优质服务。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;','','/static/upload/image/20200226/1582701222986334.png','','专注于垃圾处理设备系统，以及更多其他产品，致力于解决垃圾分类、垃圾回收系统的解决方案，完善的售后服务。','255','1','0','0','0','0','0','0','admin','admin','2020-02-25 23:23:16',' 2024-01-03 15:23:31','4','0','',''),('19','cn','19','','企业文化','#333333','','','admin','本站','','2020-02-26 13:28:19','/static/upload/image/20231231/1703985671164697.jpg','','&lt;p style=&quot;padding: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; color: rgb(33, 33, 33); font-family: 微软雅黑; font-size: 12px; text-wrap: wrap;&quot;&gt;企业文化&lt;/p&gt;&lt;p style=&quot;padding: 0px; margin-top: 0px; margin-bottom:','','','','内容填充中后台可自行填充内容，本站所有数据均为演示数据','255','1','0','0','0','19','0','0','admin','admin','2020-02-26 13:28:19',' 2023-12-31 09:21:26','4','','',''),('36','cn','16','','烙铁头不沾锡怎么办','#333333','','','优股电子','本站','','2023-12-31 22:02:23','/static/upload/image/20231231/1704031546432822.jpg','','&lt;p&gt;电铬铁头不粘锡的九大原因：&lt;/p&gt;&lt;p&gt;1、选择温度过高，容易使电烙铁头沾锡面发生剧烈氧化。&lt;/p&gt;&lt;p&gt;2、使用前未将沾锡面吃锡。&lt;/p&gt;&lt;p&gt;3、使用不正确或是有缺陷的清理方法。&lt;/p&gt;&lt;p&gt;4、使用不纯的焊锡或焊丝中助焊剂中断。&lt;/p&gt;&lt;p&gt;5、当工作温度超过350℃，而且停止焊接超过1小时，无铅烙铁头上锡量过少。&lt;/p&gt;&lt;p&gt;6、“干烧”','','','','电铬铁头不粘锡的九大原因：1、选择温度过高，容易使电烙铁头沾锡面发生剧烈氧化。2、使用前未将沾锡面吃锡。3、使用不正确或是有缺陷的清理方法。4、使用不纯的焊锡或焊丝中助焊剂中断。5、当工作温度超过350℃，而且停止焊接超过1小时，无铅烙铁头上锡量过少。6、“干烧”电烙铁头，如：焊台开着不使用，而电烙铁头表面无','255','1','0','0','0','2','0','0','admin','admin','2023-12-31 22:03:21',' 2023-12-31 22:05:48','4','0','',''),('37','cn','20','','合作客户','#333333','','','优股电子','本站','','2023-12-31 23:17:06','/static/upload/image/20231231/1704035848133140.jpg','/static/upload/image/20231231/1704035856755683.jpg,/static/upload/other/20231231/1704035864469468.jpeg,/static/upload/image/20231231/1704035892204685.jpg','&lt;p&gt;富士康、华为、小米等&lt;br/&gt;&lt;/p&gt;','','','','富士康、华为、小米等','255','1','0','0','0','11','0','0','admin','admin','2023-12-31 23:18:15',' 2024-01-03 13:46:12','4','0','',',,'),('38','cn','3','','求贤纳士','#333333','','','优股电子','本站','','2023-12-31 23:23:59','/static/upload/image/20231231/1704036351215790.jpg','','&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;color: #444444; font-family: &amp;quot;Open Sans&amp;quot;, sans-serif; font-size: 16px; text-wrap: wrap; background-color: #FFFFFF;&quot;&gt;本公司专注于焊锡设备及焊接耗材烙铁头的研发、生产及销售，如有相关行业经验，请联系我们。长期招聘数控操作师傅','','','','本公司专注于焊锡设备及焊接耗材烙铁头的研发、生产及销售，如有相关行业经验，请联系我们。长期招聘数控操作师傅，车工，普工等。欢迎您与我们一起成长！','255','1','0','0','0','1','0','0','admin','admin','2023-12-31 23:24:29',' 2023-12-31 23:25:52','4','0','',''),('39','cn','16','','什么样的烙铁头适合您','#333333','','','优股电子','本站','','2023-12-31 23:26:52','/static/upload/image/20231231/1704036589388213.jpg','','&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;在焊锡行业烙铁头作为配套产品非常受到行业的认可，这类产品业内人比较熟悉，这类产品按照划分可以分为不同的种类如内热式、外热式，烙铁头有着广泛的使用量。生产这类产品非常注重工艺，产品主 要起到焊接的作用，对产品的焊锡使用率非常高，同时对温度的要求也比较高，这样才能很好的融合金属。为了能够更好的熔解焊接金属避免氧化在焊接之前一定要事先清洁产品表面，避免氧化焊接无法达到效果。&lt;/p&gt;&lt;p&gt;900M烙铁头&lt;b','','','','在焊锡行业烙铁头作为配套产品非常受到行业的认可，这类产品业内人比较熟悉，这类产品按照划分可以分为不同的种类如内热式、外热式，烙铁头有着广泛的使用量。生产这类产品非常注重工艺，产品主 要起到焊接的作用，对产品的焊锡使用率非常高，同时对温度的要求也比较高，这样才能很好的融合金属。为了能够更好的熔解焊接金属','255','1','0','0','0','0','0','0','admin','admin','2023-12-31 23:29:50','2023-12-31 23:29:50','4','0','',''),('40','cn','4','','烙铁头的制造工艺','#333333','','','优股电子','本站','','2023-12-31 23:30:47','/static/upload/image/20231231/1704036713310655.jpg','','&lt;p&gt;&lt;span style=&quot;color: #444444; font-family: &amp;quot;Open Sans&amp;quot;, sans-serif; font-size: 16px; text-wrap: wrap; background-color: #FFFFFF;&quot;&gt;烙铁头（烙铁咀、焊咀）生产核心工艺是电镀，故生产电烙铁、焊台的厂家自己不生产烙铁头（烙铁咀、焊咀），而是找专业的烙铁头（烙铁咀、焊咀）制造厂生产，然后贴自己的牌。&l','','','','烙铁头（烙铁咀、焊咀）生产核心工艺是电镀，故生产电烙铁、焊台的厂家自己不生产烙铁头（烙铁咀、焊咀），而是找专业的烙铁头（烙铁咀、焊咀）制造厂生产，然后贴自己的牌。','255','1','0','0','0','0','0','0','admin','admin','2023-12-31 23:31:54','2023-12-31 23:31:54','4','0','',''),('41','cn','16','','这样使用烙铁头寿命大大增加','#333333','','','优股电子','本站','','2023-12-31 23:32:55','/static/upload/image/20231231/1704037113386615.jpg','','1、因为电镀关系，烙铁头绝对不要用刀锉或磨削烙铁头。&lt;br/&gt;2、建议第一次加热时用新鲜焊锡涂覆在烙铁头上以便去除包在上面的氧化物。&lt;br/&gt;3、焊接时，尽量选用中性活性助焊剂。&lt;br/&gt;4、清洁烙铁头建议用清洁海绵并加蒸馏水（大部分自来水含矿物质对烙铁头有一定腐蚀作用），不可用布擦。&lt;br/&gt;5、保持工作表面一直有锡涂覆，只有在使用前才擦拭，使用完即刻丄锡。&lt;br/&gt;6、焊接温度高于350℃且停止工作1小时以上，建议烙铁头常上锡。&lt;br/','','','','1、因为电镀关系，烙铁头绝对不要用刀锉或磨削烙铁头。2、建议第一次加热时用新鲜焊锡涂覆在烙铁头上以便去除包在上面的氧化物。3、焊接时，尽量选用中性活性助焊剂。4、清洁烙铁头建议用清洁海绵并加蒸馏水（大部分自来水含矿物质对烙铁头有一定腐蚀作用），不可用布擦。5、保持工作表面一直有锡涂覆，只有在使用前才擦拭，','255','1','0','0','0','0','0','0','admin','admin','2023-12-31 23:38:35','2023-12-31 23:38:35','4','0','',''),('42','cn','16','','烙铁头氧化了可以用砂纸打磨吗？','#333333','','','优股电子','本站','','2023-12-31 23:38:36','/static/upload/image/20231231/1704037266120850.jpg','','&lt;p&gt;在烙铁头长时间高温时，会导致表面氧化，烙铁会不粘锡，可以在低温时，用砂纸打磨，然后随着温度的升高，粘少许松香和焊锡，将每个面都打磨，最后每个面都有焊锡。养成良好的习惯是最主要的，每次用完后都要保持烙铁头沾有焊锡。&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; 好的烙铁头上有一层合金专门吃锡的，里面是铜。当然，如果磨掉合金层也是可以用的，容易氧化和损耗铜而已，熔融的锡会少量溶解铜。不过业余用肯定是没有问题的。&lt;/p&gt;&lt;p&gt;&amp;','','','','在烙铁头长时间高温时，会导致表面氧化，烙铁会不粘锡，可以在低温时，用砂纸打磨，然后随着温度的升高，粘少许松香和焊锡，将每个面都打磨，最后每个面都有焊锡。养成良好的习惯是最主要的，每次用完后都要保持烙铁头沾有焊锡。 好的烙铁头上有一层合金专门吃锡的，里面是铜。当然，如果磨掉合金层也是可以用','255','1','0','0','0','1','0','0','admin','admin','2023-12-31 23:41:08','2023-12-31 23:41:08','4','0','',''),('43','cn','4','','威乐烙铁头保护原理','#333333','','','优股电子','本站','','2023-12-31 23:42:43','/static/upload/image/20231231/1704037451874909.jpg','','&lt;p&gt;一．威乐烙铁头选择基本原理&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; 1.烙铁头的直径小于或等于焊盘直径&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; 2.烙铁头不能接触到周边元器件&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; 3.烙铁头不能挡住操作人员视线&lt;/p&gt;&lt;p&gt;&amp;nbsp; &amp;nbsp; 4.烙铁头选择参考：&lt;/p&gt;&l','','','','一．威乐烙铁头选择基本原理 1.烙铁头的直径小于或等于焊盘直径 2.烙铁头不能接触到周边元器件 3.烙铁头不能挡住操作人员视线 4.烙铁头选择参考： 尽量选择用短的烙铁头；尽可能用凿状，不用圆头；尽可能用直的，不用弯 头；尽可能用粗的，','255','1','0','0','0','0','0','0','admin','admin','2023-12-31 23:44:12','2023-12-31 23:44:12','4','0','',''),('44','cn','16','','威乐烙铁头不挂锡该怎么处理？','#333333','','','优股电子','本站','','2023-12-31 23:45:00','/static/upload/image/20231231/1704037646348506.jpg','','&lt;p&gt;很多客户问笔者威乐烙铁头的使用过程中，总是会遇到一些小问题，比如烙铁头不挂锡，这是焊接过程中比较常见的问题。所以我们就来聊聊怎么解决威乐烙铁头不挂锡的问题。&lt;/p&gt;&lt;p&gt;在焊接的过程中出现烙铁头不挂锡的情况，让人非常的头疼，要解决这个问题首先要先找出原因：&lt;/p&gt;&lt;p&gt;1、电烙铁的功率过大&lt;/p&gt;&lt;p&gt;烙铁头的功率从20W、25W，大至几百瓦。外热式电烙铁制造工艺复杂、效率低、价格高，速热式的由于大变压器拿在手上，操','','','','很多客户问笔者威乐烙铁头的使用过程中，总是会遇到一些小问题，比如烙铁头不挂锡，这是焊接过程中比较常见的问题。所以我们就来聊聊怎么解决威乐烙铁头不挂锡的问题。在焊接的过程中出现烙铁头不挂锡的情况，让人非常的头疼，要解决这个问题首先要先找出原因：1、电烙铁的功率过大烙铁头的功率从20W、25W，大至几百瓦。外热','255','1','0','0','0','0','0','0','admin','admin','2023-12-31 23:47:28','2023-12-31 23:47:28','4','0','',''),('45','cn','16','','选择自动焊锡机烙铁头需要注意什么？','#333333','','','优股电子','本站','','2023-12-31 23:48:34','/static/upload/image/20231231/1704037962538460.jpg','','选择合适的烙铁头型号才能把一个产品焊好，因此我们一定要先把烙铁头的型号给选出来，只有这样才能在后面的焊接过程中做到得心应手。那么该如何选择自动焊锡机烙铁头的型号呢?下面焊锡机烙铁头专家就选型简单的介绍一下：&lt;br/&gt;一、对于点的间距排列大小合适，而又有规则的点，我们就要选择拉焊的焊接类型，此时我们一般选择R(刀型)或是D类型的烙铁头进行焊接的。在使用R类型的烙铁头时，一般是倾斜的，有一定的角度，而不是直上直下的;而使用D类型的烙铁头进行拉焊的时候，一般是直上直下的。&lt;br/&gt;二、对','','','','选择合适的烙铁头型号才能把一个产品焊好，因此我们一定要先把烙铁头的型号给选出来，只有这样才能在后面的焊接过程中做到得心应手。那么该如何选择自动焊锡机烙铁头的型号呢?下面焊锡机烙铁头专家就选型简单的介绍一下：一、对于点的间距排列大小合适，而又有规则的点，我们就要选择拉焊的焊接类型，此时我们一般选择R(刀型','255','1','0','0','0','1','0','0','admin','admin','2023-12-31 23:52:43','2023-12-31 23:52:43','4','0','',''),('46','cn','6','','900系列产品','#333333','','','优股电子','本站','','2024-01-02 23:15:35','/static/upload/image/20240102/1704209540833549.jpg','/static/upload/image/20240102/1704209562197605.jpg,/static/upload/image/20240102/1704209591661172.jpg,/static/upload/image/20240102/1704209667236946.jpg','&lt;p&gt;&lt;span style=&quot;text-wrap: nowrap;&quot;&gt;900系列烙铁头适用于937焊台、969焊台、936A、BEE-910、936全系列焊台焊台等。900M、900M-ESD、907、907-ESD、933烙铁手柄。恒温烙铁等（烙铁通用）。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;text-wrap: nowrap;&quot;&gt;&lt;br/&gt;&lt;/span&g','','','','900系列烙铁头适用于937焊台、969焊台、936A、BEE-910、936全系列焊台焊台等。900M、900M-ESD、907、907-ESD、933烙铁手柄。恒温烙铁等（烙铁通用）。型号细分：900M-T-B、900M-T-BF2、900M-T-LB、900M-T-SB、900M-T-S4、900M-T-0.8D、900M-T-1.2D、900M-T-1.6D、900M-T-2.4D、900M-T-3.2D、900M-T-S3、900M-T-1.2LD、900M-','255','1','0','0','0','1','0','0','admin','admin','2024-01-02 23:34:32','2024-01-02 23:34:32','4','0','',',,'),('47','cn','12','','500系列','#333333','','','优股电子','本站','','2024-01-03 09:38:52','/static/upload/image/20240103/1704250470664968.jpg','/static/upload/image/20240103/1704251820541495.jpg,/static/upload/image/20240103/1704251873632477.jpg','&lt;p&gt;&lt;span style=&quot;text-wrap: nowrap;&quot;&gt;500系列烙铁头也叫快克烙铁头，功率为150W，全自动焊锡机，焊锡机器人，BK3300A ，快克QUICK205焊台， 白光BK3300L，BK3300A，BK3600等或其他150W高频焊台通用。&lt;/span&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;500烙铁头型号：&lt;/p&gt;&lt;p&','','','','500系列烙铁头也叫快克烙铁头，功率为150W，全自动焊锡机，焊锡机器人，BK3300A ，快克QUICK205焊台， 白光BK3300L，BK3300A，BK3600等或其他150W高频焊台通用。500烙铁头型号：尖头：500-I圆头（周边上锡）：500-B，500-2B，500-3B，500-4B，500-5B圆头（底部上锡）：500-2P，500-3P，500-4P，500-5P，5','255','1','0','0','0','1','0','0','admin','admin','2024-01-03 11:18:00','2024-01-03 11:18:00','4','0','',','),('48','cn','13','','911G系列','#333333','','','优股电子','本站','','2024-01-03 11:18:01','/static/upload/image/20240103/1704252750891449.jpg','/static/upload/image/20240103/1704252799642928.jpg,/static/upload/image/20240103/1704252813652670.jpg','&lt;p&gt;自动焊锡机911G烙铁头供应全自动焊接机器人，功率150W，金属手柄。本厂生产烙铁头特殊铁表层电镀，耐高温、抗腐蚀.不穿孔、不跑锡。寿命比普通电镀工艺长2-3倍，特殊工艺加工，适用于无铅焊料焊接上锡能力强，不氧化，不产生上锡，不粘锡，爬锡现象，搞锈能力特强，本品已通过SGS环保检测。&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;型号细分：&lt;/p&gt;&lt;p&gt;斜口马蹄：911G-10PC、911G-13PC、911G-1','','','','自动焊锡机911G烙铁头供应全自动焊接机器人，功率150W，金属手柄。本厂生产烙铁头特殊铁表层电镀，耐高温、抗腐蚀.不穿孔、不跑锡。寿命比普通电镀工艺长2-3倍，特殊工艺加工，适用于无铅焊料焊接上锡能力强，不氧化，不产生上锡，不粘锡，爬锡现象，搞锈能力特强，本品已通过SGS环保检测。型号细分：斜口马蹄：911G-10PC、','255','1','0','0','0','3','0','0','admin','admin','2024-01-03 11:33:36','2024-01-03 11:33:36','4','0','',','),('49','cn','14','','大威乐系列','#333333','','','优股电子','本站','','2024-01-03 13:47:12','/static/upload/image/20240103/1704263279746352.jpg','/static/upload/image/20240103/1704263244864389.jpg,/static/upload/image/20240103/1704263252320188.jpg,/static/upload/image/20240103/1704263292769572.jpg','&lt;p&gt;&lt;span style=&quot;text-wrap: nowrap;&quot;&gt;&amp;nbsp;Weller威乐定制烙铁头各种型号均有供应生产（主流150W-600W）。&lt;br/&gt;威乐是国际知名品牌，产品深受用户一致的好评。&lt;br/&gt;威乐不断在研发和生产一些高效能焊接工具来满足市场的需求，一直以提供优良产品、优良服务、保持良好的客户关系为宗旨。&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&qu','','','','Weller威乐定制烙铁头各种型号均有供应生产（主流150W-600W）。威乐是国际知名品牌，产品深受用户一致的好评。威乐不断在研发和生产一些高效能焊接工具来满足市场的需求，一直以提供优良产品、优良服务、保持良好的客户关系为宗旨。1，特殊工艺制作的高热容量焊咀，镀层均匀，使用寿命长。2，品种繁多，更具客户产品的','255','1','0','0','0','6','0','0','admin','admin','2024-01-03 14:21:39',' 2024-01-03 14:28:13','4','0','',',,'),('50','cn','15','','911系列','#333333','','','优股电子','本站','','2024-01-03 14:28:14','/static/upload/image/20240103/1704265128777060.png','/static/upload/image/20240103/1704263699421046.jpg,/static/upload/image/20240103/1704263703755570.jpg,/static/upload/image/20240103/1704265122136648.jpg','&lt;p&gt;911系列是快克焊接机器人常用烙铁头。本厂生产的911系列烙铁头无氧铜制造，高强度，耐磨性能好，耐高温，无铅合金铁电镀层密实，不穿孔、不跑锡。使用寿命长。无铅用料，无铅环境制造，确保符合无铅制程要求。品种繁多,根据客户产品的不同，定制最佳的头型满足客户实际使用需求。&lt;/p&gt;&lt;p&gt;911焊锡机烙铁头&amp;nbsp;911系列&amp;nbsp; 911G-24DV1快克焊锡机烙铁头&lt;/p&gt;&lt;p&gt;911-10PC&amp;nbsp;&amp','','','','911系列是快克焊接机器人常用烙铁头。本厂生产的911系列烙铁头无氧铜制造，高强度，耐磨性能好，耐高温，无铅合金铁电镀层密实，不穿孔、不跑锡。使用寿命长。无铅用料，无铅环境制造，确保符合无铅制程要求。品种繁多,根据客户产品的不同，定制最佳的头型满足客户实际使用需求。911焊锡机烙铁头911系列 911G-2','255','1','0','0','0','1','0','0','admin','admin','2024-01-03 14:59:03','2024-01-03 14:59:03','4','0','',',,'),('51','cn','21','','T12系列','#333333','','','优股电子','本站','','2024-01-03 15:01:00','/static/upload/image/20240103/1704266083375529.jpg','/static/upload/image/20240103/1704266097784964.jpg,/static/upload/image/20240103/1704266106457293.jpg,/static/upload/image/20240103/1704266114283957.jpg','&lt;p&gt;&lt;span style=&quot;text-wrap: nowrap;&quot;&gt;T12烙铁头&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;text-wrap: nowrap;&quot;&gt;T12焊咀又称T12烙铁头/T12发热芯，属复合型，是发热芯、温度传感器、焊咀三个部件的复合体，&lt;/span&gt;是日本Hakko公司推出的 FX-951拆消静电电焊台标配的烙铁头型号名。&lt;/p&gt;&l','','','','T12烙铁头T12焊咀又称T12烙铁头/T12发热芯，属复合型，是发热芯、温度传感器、焊咀三个部件的复合体，是日本Hakko公司推出的 FX-951拆消静电电焊台标配的烙铁头型号名。T12烙铁头传感器充分前置，对温度变化敏感度高。发热芯部件安装在小体积的焊咀内部，热量损失极小。两大特点成就了T12焊咀超凡的升温能力，真正实现了350','255','1','0','0','0','2','0','0','admin','admin','2024-01-03 15:15:34','2024-01-03 15:15:34','4','0','',',,');
/*!40000 ALTER TABLE `ay_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_content_ext`
--

DROP TABLE IF EXISTS `ay_content_ext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_content_ext` (
  `extid` varchar(255) DEFAULT NULL,
  `contentid` varchar(255) DEFAULT NULL,
  `ext_price` varchar(255) DEFAULT NULL,
  `ext_type` varchar(255) DEFAULT NULL,
  `ext_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_content_ext`
--

LOCK TABLES `ay_content_ext` WRITE;
/*!40000 ALTER TABLE `ay_content_ext` DISABLE KEYS */;
INSERT INTO `ay_content_ext` VALUES ('1','9','80','专业版','红色,黄色'),('8','46','',NULL,NULL),('9','47','',NULL,NULL),('10','48','',NULL,NULL),('11','49','','',''),('12','50','',NULL,NULL),('13','51','',NULL,NULL);
/*!40000 ALTER TABLE `ay_content_ext` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_content_sort`
--

DROP TABLE IF EXISTS `ay_content_sort`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_content_sort` (
  `id` varchar(255) DEFAULT NULL,
  `acode` varchar(255) DEFAULT NULL,
  `mcode` varchar(255) DEFAULT NULL,
  `pcode` varchar(255) DEFAULT NULL,
  `scode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `listtpl` varchar(255) DEFAULT NULL,
  `contenttpl` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `outlink` varchar(255) DEFAULT NULL,
  `subname` varchar(255) DEFAULT NULL,
  `ico` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `sorting` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL,
  `gtype` varchar(255) DEFAULT NULL,
  `gid` varchar(255) DEFAULT NULL,
  `gnote` varchar(255) DEFAULT NULL,
  `def1` varchar(255) DEFAULT NULL,
  `def2` varchar(255) DEFAULT NULL,
  `def3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_content_sort`
--

LOCK TABLES `ay_content_sort` WRITE;
/*!40000 ALTER TABLE `ay_content_sort` DISABLE KEYS */;
INSERT INTO `ay_content_sort` VALUES ('1','cn','1','0','1','公司简介','','about.html','1','','About Us','/static/upload/image/20200226/1582694823182825.jpg','/static/upload/image/20211013/1634128301650309.jpg','公司简介','公司简介','公司简介','aboutus','1','admin','admin','2018-04-11 17:26:11',' 2021-10-26 15:15:20','4','0','','','',''),('2','cn','2','0','2','新闻中心','newslist.html','news.html','1','','News','','/static/upload/image/20211026/1635231117526782.jpg','新闻中心','新闻中心','新闻中心','xinwen','2','admin','admin','2018-04-11 17:26:46',' 2021-10-26 15:15:20','4','0','','','',''),('3','cn','2','2','3','公司动态','newslist.html','news.html','1','','了解最新公司动态及行业资讯','','','','','','company','255','admin','admin','2018-04-11 17:27:05',' 2021-10-26 15:15:20','4','','','','',''),('4','cn','2','2','4','行业动态','newslist.html','news.html','1','','了解最新公司动态及行业资讯','','','','','','industry','255','admin','admin','2018-04-11 17:27:30',' 2021-10-26 15:15:20','4','','','','',''),('5','cn','3','0','5','产品中心','productlist.html','product.html','1','','PRODUCTS','','/static/upload/image/20211026/1635231323245897.jpg','产品中心','产品中心','产品中心','product','3','admin','admin','2018-04-11 17:27:54',' 2021-10-26 15:15:20','4','0','','','',''),('6','cn','3','5','6','900系列','productlist.html','product.html','1','','服务创造价值、存在造就未来','','','900系列','900系列','900系列','p1','255','admin','admin','2018-04-11 17:28:19',' 2023-12-31 21:57:30','4','0','','','',''),('7','cn','3','5','7','200系列','productlist.html','product.html','1','','服务创造价值、存在造就未来','','','200系列','200系列','200系列','p2','255','admin','admin','2018-04-11 17:28:38',' 2023-12-31 21:57:47','4','0','','','',''),('8','cn','4','0','8','资料中心','caselist.html','case.html','1','','CASE','','/static/upload/image/20211026/1635232316302443.jpg','产品维护保养','产品维护保养','产品维护保养','case','4','admin','admin','2018-04-11 17:29:16',' 2023-12-31 22:01:21','4','0','','','',''),('9','cn','5','0','9','四大优势','newslist.html','news.html','0','','OUR ADVATAGES','','','','','','youse','10','admin','admin','2018-04-11 17:30:02',' 2021-10-26 15:35:01','4','0','','','',''),('10','cn','1','0','10','在线留言','','message.html','1','','有什么问题欢迎您随时反馈','','/static/upload/image/20211026/1635232496399002.jpg','在线留言','在线留言','在线留言','liuyan','5','admin','admin','2018-04-11 17:30:36',' 2021-10-26 15:15:20','4','0','','','',''),('11','cn','1','0','11','联系我们','','contact.html','1','','能为您服务是我们的荣幸','','/static/upload/image/20211026/1635232547158852.jpg','联系我们','联系我们','联系我们','contact','6','admin','admin','2018-04-11 17:31:29',' 2021-10-26 15:15:48','4','0','','','',''),('12','cn','3','5','12','500系列','productlist.html','product.html','1','','','','','500系列','500系列','500系列','p3','255','admin','admin','2020-02-26 13:22:22',' 2023-12-31 21:57:13','4','0','','','',''),('13','cn','3','5','13','911G系列','productlist.html','product.html','1','','','','','911G系列','911G系列','911G系列','p4','255','admin','admin','2020-02-26 13:22:32',' 2023-12-31 21:58:06','4','0','','','',''),('14','cn','3','5','14','大威乐','productlist.html','product.html','1','','','','','大威乐','大威乐','大威乐','p5','255','admin','admin','2020-02-26 13:22:42',' 2023-12-31 21:58:24','4','0','','','',''),('15','cn','3','5','15','911系列','productlist.html','product.html','1','','','','','911系列','911系列','911系列','p6','255','admin','admin','2020-02-26 13:22:49',' 2023-12-31 21:58:43','4','0','','','',''),('16','cn','4','8','16','维护保养','caselist.html','case.html','1','','','','','维护保养','维护保养','维护保养','c1','255','admin','admin','2020-02-26 13:25:22',' 2023-12-31 22:02:07','4','0','','','',''),('19','cn','1','1','19','企业文化','case.html','about.html','1','','','','','企业文化','企业文化','企业文化','wenhua','255','admin','admin','2020-02-26 13:28:19',' 2024-01-03 13:44:05','4','0','','','',''),('22','cn','7','1','20','合作客户','caselist.html','case.html','1','','','/static/upload/image/20231231/1704035617365576.jpg','','','','','','255','admin','admin','2023-12-31 23:13:41',' 2023-12-31 23:23:01','4','0','','','',''),('23','cn','3','5','21','T12系列','productlist.html','product.html','1','','','','','T12','T12','T12','','255','admin','admin','2024-01-03 15:00:51','2024-01-03 15:00:51','4','0','','','','');
/*!40000 ALTER TABLE `ay_content_sort` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_diy_telephone`
--

DROP TABLE IF EXISTS `ay_diy_telephone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_diy_telephone` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `create_time` datetime NOT NULL,
  `tel` varchar(20) DEFAULT NULL COMMENT '电话号码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_diy_telephone`
--

LOCK TABLES `ay_diy_telephone` WRITE;
/*!40000 ALTER TABLE `ay_diy_telephone` DISABLE KEYS */;
/*!40000 ALTER TABLE `ay_diy_telephone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_extfield`
--

DROP TABLE IF EXISTS `ay_extfield`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_extfield` (
  `id` varchar(255) DEFAULT NULL,
  `mcode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sorting` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_extfield`
--

LOCK TABLES `ay_extfield` WRITE;
/*!40000 ALTER TABLE `ay_extfield` DISABLE KEYS */;
INSERT INTO `ay_extfield` VALUES ('1','3','ext_price','1','','产品价格','255'),('2','3','ext_type','4','基础版,专业版,旗舰版','类型','255'),('3','3','ext_color','4','红色,橙色,黄色,绿色,蓝色,紫色','颜色','255');
/*!40000 ALTER TABLE `ay_extfield` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_form`
--

DROP TABLE IF EXISTS `ay_form`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_form` (
  `id` varchar(255) DEFAULT NULL,
  `fcode` varchar(255) DEFAULT NULL,
  `form_name` varchar(255) DEFAULT NULL,
  `table_name` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_form`
--

LOCK TABLES `ay_form` WRITE;
/*!40000 ALTER TABLE `ay_form` DISABLE KEYS */;
INSERT INTO `ay_form` VALUES ('1','1','在线留言','ay_message','admin','admin','2018-04-11 17:31:29','2018-04-11 17:31:29');
/*!40000 ALTER TABLE `ay_form` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_form_field`
--

DROP TABLE IF EXISTS `ay_form_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_form_field` (
  `id` varchar(255) DEFAULT NULL,
  `fcode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `required` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sorting` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_form_field`
--

LOCK TABLES `ay_form_field` WRITE;
/*!40000 ALTER TABLE `ay_form_field` DISABLE KEYS */;
INSERT INTO `ay_form_field` VALUES ('1','1','contacts','10','1','联系人','255','admin','admin','2018-07-14 18:24:02','2018-07-15 17:47:43'),('2','1','mobile','12','1','手机','255','admin','admin','2018-07-14 18:24:02','2018-07-15 17:47:44'),('3','1','content','500','1','内容','255','admin','admin','2018-07-14 18:24:02','2018-07-15 17:47:45'),('5','1','titlee','20','0','咨询产品','255','admin','admin','2020-03-01 17:44:07','2020-03-01 17:44:07'),('6','1','mail','20','0','电子邮件','255','admin','admin','2020-03-01 17:46:11','2020-03-01 17:46:11');
/*!40000 ALTER TABLE `ay_form_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_label`
--

DROP TABLE IF EXISTS `ay_label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_label` (
  `id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_label`
--

LOCK TABLES `ay_label` WRITE;
/*!40000 ALTER TABLE `ay_label` DISABLE KEYS */;
INSERT INTO `ay_label` VALUES ('2','logo_m','/static/upload/image/20231230/1703907104394514.png','3','手机站logo','admin','admin','2020-02-25 23:09:30',' 2024-01-03 09:35:10'),('5','case_banner1','烙铁头研发生产专家','1','工程案例下面小banner文字1','admin','admin','2020-02-25 23:10:25',' 2024-01-03 09:35:10'),('6','case_banner2','提供一站式专业服务！   咨询热线：18565636563','1','工程案例下面小banner文字2','admin','admin','2020-02-25 23:10:40',' 2024-01-03 09:35:10'),('7','mpc_banner','烙铁头研发生产专家','1','手机站产品中心下小banner文字','admin','admin','2020-02-25 23:10:59',' 2024-01-03 09:35:10'),('8','mcase_banner','烙铁头研发生产厂家','1','手机站案例下小banner文字','admin','admin','2020-02-25 23:11:14',' 2024-01-03 09:35:10'),('10','top','您好，欢迎访问中山市优股电子有限公司官网！','1','顶部文字','admin','admin','2021-10-26 15:20:47',' 2024-01-03 09:35:10'),('11','zuobiao','113.30334 , 22.59355','1','坐标','admin','admin','2021-10-26 15:26:34',' 2024-01-03 09:35:10'),('12','wx','cikoola','1','微信号','admin','admin','2021-10-26 15:58:00',' 2024-01-03 09:35:10');
/*!40000 ALTER TABLE `ay_label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_link`
--

DROP TABLE IF EXISTS `ay_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_link` (
  `id` varchar(255) DEFAULT NULL,
  `acode` varchar(255) DEFAULT NULL,
  `gid` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `sorting` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_link`
--

LOCK TABLES `ay_link` WRITE;
/*!40000 ALTER TABLE `ay_link` DISABLE KEYS */;
INSERT INTO `ay_link` VALUES ('1','cn','1','优股好焊','https://www.youguhaohan.cn/','','255','admin','admin','2018-04-12 10:53:06',' 2023-12-30 10:56:51'),('4','cn','1','1688官网','https://shop4494k3957pu32.1688.com/','','255','admin','admin','2021-10-26 15:23:51',' 2023-12-30 10:57:51');
/*!40000 ALTER TABLE `ay_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_member`
--

DROP TABLE IF EXISTS `ay_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_member` (
  `id` varchar(255) DEFAULT NULL,
  `ucode` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `headpic` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `gid` varchar(255) DEFAULT NULL,
  `wxid` varchar(255) DEFAULT NULL,
  `qqid` varchar(255) DEFAULT NULL,
  `wbid` varchar(255) DEFAULT NULL,
  `score` varchar(255) DEFAULT NULL,
  `register_time` varchar(255) DEFAULT NULL,
  `login_count` varchar(255) DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `last_login_time` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `useremail` varchar(255) DEFAULT NULL,
  `usermobile` varchar(255) DEFAULT NULL,
  `activation` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_member`
--

LOCK TABLES `ay_member` WRITE;
/*!40000 ALTER TABLE `ay_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `ay_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_member_comment`
--

DROP TABLE IF EXISTS `ay_member_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_member_comment` (
  `id` varchar(255) DEFAULT NULL,
  `pid` varchar(255) DEFAULT NULL,
  `contentid` varchar(255) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `puid` varchar(255) DEFAULT NULL,
  `likes` varchar(255) DEFAULT NULL,
  `oppose` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `user_os` varchar(255) DEFAULT NULL,
  `user_bs` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_member_comment`
--

LOCK TABLES `ay_member_comment` WRITE;
/*!40000 ALTER TABLE `ay_member_comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `ay_member_comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_member_field`
--

DROP TABLE IF EXISTS `ay_member_field`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_member_field` (
  `id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `required` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `sorting` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_member_field`
--

LOCK TABLES `ay_member_field` WRITE;
/*!40000 ALTER TABLE `ay_member_field` DISABLE KEYS */;
INSERT INTO `ay_member_field` VALUES ('1','sex','2','0','性别','255','1','admin','admin','2020-06-25 00:00:00','2020-06-25 00:00:00'),('2','birthday','20','0','生日','255','1','admin','admin','2020-06-25 00:00:00','2020-06-25 00:00:00'),('3','qq','15','0','QQ','255','1','admin','admin','2020-06-25 00:00:00','2020-06-25 00:00:00');
/*!40000 ALTER TABLE `ay_member_field` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_member_group`
--

DROP TABLE IF EXISTS `ay_member_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_member_group` (
  `id` varchar(255) DEFAULT NULL,
  `gcode` varchar(255) DEFAULT NULL,
  `gname` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `lscore` varchar(255) DEFAULT NULL,
  `uscore` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_member_group`
--

LOCK TABLES `ay_member_group` WRITE;
/*!40000 ALTER TABLE `ay_member_group` DISABLE KEYS */;
INSERT INTO `ay_member_group` VALUES ('1','1','初级会员','初级会员具备基本的权限','1','0','999','admin','admin','2020-06-25 00:00:00','2020-06-25 00:00:00'),('2','2','中级会员','中级会员具备部分特殊权限','1','1000','9999','admin','admin','2020-06-25 00:00:00','2020-06-25 00:00:00'),('3','3','高级会员','高级会员具备全部特殊权限','1','10000','9999999999','admin','admin','2020-06-25 00:00:00','2020-06-25 00:00:00');
/*!40000 ALTER TABLE `ay_member_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_menu`
--

DROP TABLE IF EXISTS `ay_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_menu` (
  `id` varchar(255) DEFAULT NULL,
  `mcode` varchar(255) DEFAULT NULL,
  `pcode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `sorting` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `shortcut` varchar(255) DEFAULT NULL,
  `ico` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_menu`
--

LOCK TABLES `ay_menu` WRITE;
/*!40000 ALTER TABLE `ay_menu` DISABLE KEYS */;
INSERT INTO `ay_menu` VALUES ('1','M101','0','系统管理','/admin/M101/index','900','1','0','fa-cog','admin','admin','0000-00-00 00:00:00','2018-04-30 14:52:57'),('2','M102','M101','数据区域','/admin/Area/index','901','1','1','fa-sitemap','admin','admin','0000-00-00 00:00:00','2018-04-30 14:54:23'),('3','M103','M101','系统菜单','/admin/Menu/index','902','0','0','fa-bars','admin','admin','0000-00-00 00:00:00','2018-04-30 14:54:35'),('4','M104','M101','系统角色','/admin/Role/index','903','1','1','fa-hand-stop-o','admin','admin','0000-00-00 00:00:00','2018-04-30 14:54:43'),('5','M105','M101','系统用户','/admin/User/index','904','1','1','fa-users','admin','admin','0000-00-00 00:00:00','2018-04-30 14:54:51'),('6','M106','M101','系统日志','/admin/Syslog/index','905','1','1','fa-history','admin','admin','0000-00-00 00:00:00','2018-04-30 14:55:00'),('7','M107','M101','类型管理','/admin/Type/index','906','0','0','fa-tags','admin','admin','0000-00-00 00:00:00','2018-04-30 14:55:13'),('8','M108','M101','数据库管理','/admin/Database/index','907','1','1','fa-database','admin','admin','0000-00-00 00:00:00','2018-04-30 14:55:24'),('9','M109','M101','服务器信息','/admin/Site/server','908','1','1','fa-info-circle','admin','admin','0000-00-00 00:00:00','2018-04-30 14:55:34'),('10','M110','0','基础内容','/admin/M110/index','300','1','0','fa-sliders','admin','admin','2017-11-28 11:13:05','2018-04-30 14:48:29'),('11','M111','M110','站点信息','/admin/Site/index','301','1','1','fa-cog','admin','admin','0000-00-00 00:00:00','2018-04-07 18:45:57'),('12','M112','M110','公司信息','/admin/Company/index','302','1','1','fa-copyright','admin','admin','0000-00-00 00:00:00','2018-04-07 18:46:09'),('29','M129','M110','内容栏目','/admin/ContentSort/index','303','1','1','fa-bars','admin','admin','2017-12-26 10:42:40','2018-04-07 18:46:25'),('30','M130','0','文章内容','/admin/M130/index','400','1','0','fa-file-text-o','admin','admin','2017-12-26 10:45:36','2018-04-30 14:49:47'),('31','M131','M130','单页内容','/admin/Single/index','401','0','0','fa-file-o','admin','admin','2017-12-26 10:46:35','2018-04-07 18:46:35'),('32','M132','M130','列表内容','/admin/Content/index','402','0','0','fa-file-text-o','admin','admin','2017-12-26 10:48:17','2018-04-07 21:52:15'),('36','M136','M156','定制标签','/admin/Label/index','203','1','1','fa-wrench','admin','admin','2018-01-03 11:52:40','2018-04-07 18:44:31'),('50','M150','M157','留言信息','/admin/Message/index','501','1','1','fa-question-circle-o','admin','admin','2018-02-01 13:20:17','2018-07-07 23:45:09'),('51','M151','M157','轮播图片','/admin/Slide/index','502','1','1','fa-picture-o','admin','admin','2018-03-01 14:57:41','2018-04-07 18:47:07'),('52','M152','M157','友情链接','/admin/Link/index','503','1','1','fa-link','admin','admin','2018-03-01 14:58:45','2018-04-07 18:47:16'),('53','M153','M156','配置参数','/admin/Config/index','201','1','1','fa-sliders','admin','admin','2018-03-21 14:52:05','2018-04-07 18:44:02'),('55','M155','M156','模型管理','/admin/Model/index','204','1','1','fa-codepen','admin','admin','2018-03-25 17:16:06','2018-04-07 18:44:40'),('56','M156','0','全局配置','/admin/M156/index','200','1','0','fa-globe','admin','admin','2018-03-25 17:20:43','2018-04-30 14:43:56'),('57','M157','0','扩展内容','/admin/M157/index','500','1','0','fa-arrows-alt','admin','admin','2018-03-25 17:27:57','2018-04-30 14:50:34'),('58','M158','M156','模型字段','/admin/ExtField/index','205','1','1','fa-external-link','admin','admin','2018-03-25 21:24:43','2018-04-07 18:44:49'),('60','M160','M157','自定义表单','/admin/Form/index','504','1','1','fa-plus-square-o','admin','admin','2018-05-30 18:25:41','2018-05-31 23:55:10'),('61','M1000','M157','文章内链','/admin/Tags/index','505','1','0','fa-random','admin','admin','2019-07-12 08:25:41','2019-07-12 08:26:23'),('62','M1001','0','会员中心','/admin/M1001/index','600','1','0','fa-user-o','admin','admin','2019-10-04 08:25:41','2019-10-04 08:26:23'),('63','M1002','M1001','会员等级','/admin/MemberGroup/index','601','1','0','fa-signal','admin','admin','2019-10-04 08:25:41','2019-10-04 08:26:23'),('64','M1003','M1001','会员字段','/admin/MemberField/index','602','1','0','fa-wpforms','admin','admin','2019-10-04 08:25:41','2019-10-04 08:26:23'),('65','M1004','M1001','会员管理','/admin/Member/index','603','1','0','fa-users','admin','admin','2019-10-04 08:25:41','2019-10-04 08:26:23'),('66','M1005','M1001','文章评论','/admin/MemberComment/index','604','1','0','fa-commenting-o','admin','admin','2019-10-04 08:25:41','2019-10-04 08:26:23');
/*!40000 ALTER TABLE `ay_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_menu_action`
--

DROP TABLE IF EXISTS `ay_menu_action`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_menu_action` (
  `id` varchar(255) DEFAULT NULL,
  `mcode` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_menu_action`
--

LOCK TABLES `ay_menu_action` WRITE;
/*!40000 ALTER TABLE `ay_menu_action` DISABLE KEYS */;
INSERT INTO `ay_menu_action` VALUES ('1','M102','mod'),('2','M102','del'),('3','M102','add'),('4','M103','mod'),('5','M103','del'),('6','M103','add'),('7','M104','mod'),('8','M104','del'),('9','M104','add'),('10','M105','mod'),('11','M105','del'),('12','M105','add'),('13','M107','mod'),('14','M107','del'),('15','M107','add'),('16','M111','mod'),('17','M112','mod'),('18','M114','mod'),('19','M114','del'),('20','M114','add'),('21','M120','mod'),('22','M120','del'),('23','M120','add'),('24','M129','mod'),('25','M129','del'),('26','M129','add'),('27','M131','mod'),('28','M132','mod'),('29','M132','del'),('30','M132','add'),('31','M136','mod'),('32','M136','del'),('33','M136','add'),('34','M141','mod'),('35','M141','del'),('36','M141','add'),('37','M142','mod'),('38','M142','del'),('39','M142','add'),('40','M143','mod'),('41','M143','del'),('42','M143','add'),('43','M144','mod'),('44','M144','del'),('45','M144','add'),('46','M145','mod'),('47','M145','del'),('48','M145','add'),('49','M150','del'),('50','M150','mod'),('51','M151','mod'),('52','M151','del'),('53','M151','add'),('54','M152','mod'),('55','M152','del'),('56','M152','add'),('57','M155','mod'),('58','M155','del'),('59','M155','add'),('60','M158','mod'),('61','M158','del'),('62','M158','add'),('63','M160','add'),('64','M160','del'),('65','M160','mod'),('66','M1000','add'),('67','M1000','del'),('68','M1000','mod'),('69','M1002','add'),('70','M1002','del'),('71','M1002','mod'),('72','M1003','add'),('73','M1003','del'),('74','M1003','mod'),('75','M1004','add'),('76','M1004','del'),('77','M1004','mod'),('78','M1005','del');
/*!40000 ALTER TABLE `ay_menu_action` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_message`
--

DROP TABLE IF EXISTS `ay_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_message` (
  `id` varchar(255) DEFAULT NULL,
  `acode` varchar(255) DEFAULT NULL,
  `contacts` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `user_os` varchar(255) DEFAULT NULL,
  `user_bs` varchar(255) DEFAULT NULL,
  `recontent` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL,
  `titlee` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `uid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_message`
--

LOCK TABLES `ay_message` WRITE;
/*!40000 ALTER TABLE `ay_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `ay_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_model`
--

DROP TABLE IF EXISTS `ay_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_model` (
  `id` varchar(255) DEFAULT NULL,
  `mcode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `urlname` varchar(255) DEFAULT NULL,
  `listtpl` varchar(255) DEFAULT NULL,
  `contenttpl` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `issystem` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_model`
--

LOCK TABLES `ay_model` WRITE;
/*!40000 ALTER TABLE `ay_model` DISABLE KEYS */;
INSERT INTO `ay_model` VALUES ('1','1','专题','1','pages','','about.html','1','1','admin','admin','2018-04-11 17:16:01','2019-08-05 11:11:44'),('2','2','新闻','2','news','newslist.html','news.html','1','1','admin','admin','2018-04-11 17:17:16','2019-08-05 11:12:04'),('3','3','产品','2','products','productlist.html','product.html','1','0','admin','admin','2018-04-11 17:17:46','2019-08-05 11:12:17'),('4','4','案例','2','cases','caselist.html','case.html','1','0','admin','admin','2018-04-11 17:19:53','2019-08-05 11:12:26'),('5','5','四大优势','2','youshi','newslist.html','news.html','1','0','admin','admin','2018-04-11 17:24:34',' 2021-10-26 15:34:50'),('6','6','员工风采','2','list','caselist.html','case.html','1','0','admin','admin','2021-10-13 20:18:52','2021-10-13 20:18:52'),('7','7','荣誉资质','2','list','caselist.html','case.html','1','0','admin','admin','2021-10-13 20:34:01','2021-10-13 20:34:01');
/*!40000 ALTER TABLE `ay_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_role`
--

DROP TABLE IF EXISTS `ay_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_role` (
  `id` varchar(255) DEFAULT NULL,
  `rcode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_role`
--

LOCK TABLES `ay_role` WRITE;
/*!40000 ALTER TABLE `ay_role` DISABLE KEYS */;
INSERT INTO `ay_role` VALUES ('1','R101','系统管理员','系统管理员具有所有权限','admin','admin','2017-03-22 11:33:32','2019-08-05 11:22:02');
/*!40000 ALTER TABLE `ay_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_role_area`
--

DROP TABLE IF EXISTS `ay_role_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_role_area` (
  `id` varchar(255) DEFAULT NULL,
  `rcode` varchar(255) DEFAULT NULL,
  `acode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_role_area`
--

LOCK TABLES `ay_role_area` WRITE;
/*!40000 ALTER TABLE `ay_role_area` DISABLE KEYS */;
INSERT INTO `ay_role_area` VALUES ('3','R101','cn');
/*!40000 ALTER TABLE `ay_role_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_role_level`
--

DROP TABLE IF EXISTS `ay_role_level`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_role_level` (
  `id` varchar(255) DEFAULT NULL,
  `rcode` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_role_level`
--

LOCK TABLES `ay_role_level` WRITE;
/*!40000 ALTER TABLE `ay_role_level` DISABLE KEYS */;
INSERT INTO `ay_role_level` VALUES ('106','R101','/admin/M156/index'),('107','R101','/admin/Config/index'),('108','R101','/admin/Label/index'),('109','R101','/admin/Label/add'),('110','R101','/admin/Label/del'),('111','R101','/admin/Label/mod'),('112','R101','/admin/Model/index'),('113','R101','/admin/Model/add'),('114','R101','/admin/Model/del'),('115','R101','/admin/Model/mod'),('116','R101','/admin/ExtField/index'),('117','R101','/admin/ExtField/add'),('118','R101','/admin/ExtField/del'),('119','R101','/admin/ExtField/mod'),('120','R101','/admin/M110/index'),('121','R101','/admin/Site/index'),('122','R101','/admin/Site/mod'),('123','R101','/admin/Company/index'),('124','R101','/admin/Company/mod'),('125','R101','/admin/ContentSort/index'),('126','R101','/admin/ContentSort/add'),('127','R101','/admin/ContentSort/del'),('128','R101','/admin/ContentSort/mod'),('129','R101','/admin/M130/index'),('130','R101','/admin/Single/index'),('131','R101','/admin/Single/mod'),('132','R101','/admin/Content/index'),('133','R101','/admin/Content/add'),('134','R101','/admin/Content/del'),('135','R101','/admin/Content/mod'),('136','R101','/admin/M157/index'),('137','R101','/admin/Message/index'),('138','R101','/admin/Message/del'),('139','R101','/admin/Message/mod'),('140','R101','/admin/Slide/index'),('141','R101','/admin/Slide/add'),('142','R101','/admin/Slide/del'),('143','R101','/admin/Slide/mod'),('144','R101','/admin/Link/index'),('145','R101','/admin/Link/add'),('146','R101','/admin/Link/del'),('147','R101','/admin/Link/mod'),('148','R101','/admin/Form/index'),('149','R101','/admin/Form/add'),('150','R101','/admin/Form/del'),('151','R101','/admin/Form/mod'),('152','R101','/admin/Tags/index'),('153','R101','/admin/Tags/add'),('154','R101','/admin/Tags/del'),('155','R101','/admin/Tags/mod'),('156','R101','/admin/M101/index'),('157','R101','/admin/Area/index'),('158','R101','/admin/Area/add'),('159','R101','/admin/Area/del'),('160','R101','/admin/Area/mod'),('161','R101','/admin/Menu/index'),('162','R101','/admin/Menu/add'),('163','R101','/admin/Menu/del'),('164','R101','/admin/Menu/mod'),('165','R101','/admin/Role/index'),('166','R101','/admin/Role/add'),('167','R101','/admin/Role/del'),('168','R101','/admin/Role/mod'),('169','R101','/admin/User/index'),('170','R101','/admin/User/add'),('171','R101','/admin/User/del'),('172','R101','/admin/User/mod'),('173','R101','/admin/Syslog/index'),('174','R101','/admin/Type/index'),('175','R101','/admin/Type/add'),('176','R101','/admin/Type/del'),('177','R101','/admin/Type/mod'),('178','R101','/admin/Database/index'),('179','R101','/admin/Site/server');
/*!40000 ALTER TABLE `ay_role_level` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_site`
--

DROP TABLE IF EXISTS `ay_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_site` (
  `id` varchar(255) DEFAULT NULL,
  `acode` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icp` varchar(255) DEFAULT NULL,
  `theme` varchar(255) DEFAULT NULL,
  `statistical` varchar(255) DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_site`
--

LOCK TABLES `ay_site` WRITE;
/*!40000 ALTER TABLE `ay_site` DISABLE KEYS */;
INSERT INTO `ay_site` VALUES ('1','cn','中山市优股电子有限公司','专注焊锡烙铁头研发生产','','/static/upload/image/20231230/1703907894372253.png','专注焊锡烙铁头研发生产','专注焊锡烙铁头研发生产','','default','','Copyright © 2013-2024 优股电子 All Rights Reserved.');
/*!40000 ALTER TABLE `ay_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_slide`
--

DROP TABLE IF EXISTS `ay_slide`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_slide` (
  `id` varchar(255) DEFAULT NULL,
  `acode` varchar(255) DEFAULT NULL,
  `gid` varchar(255) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `sorting` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_slide`
--

LOCK TABLES `ay_slide` WRITE;
/*!40000 ALTER TABLE `ay_slide` DISABLE KEYS */;
INSERT INTO `ay_slide` VALUES ('1','cn','1','/static/upload/image/20231231/1704029116615313.jpg','#','','','2','admin','admin','2018-03-01 16:19:03',' 2023-12-31 21:25:18'),('2','cn','1','/static/upload/image/20231231/1704029244523624.jpg','#','','','1','admin','admin','2018-04-12 10:46:07',' 2023-12-31 21:27:26');
/*!40000 ALTER TABLE `ay_slide` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_syslog`
--

DROP TABLE IF EXISTS `ay_syslog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_syslog` (
  `id` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `user_ip` varchar(255) DEFAULT NULL,
  `user_os` varchar(255) DEFAULT NULL,
  `user_bs` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_syslog`
--

LOCK TABLES `ay_syslog` WRITE;
/*!40000 ALTER TABLE `ay_syslog` DISABLE KEYS */;
INSERT INTO `ay_syslog` VALUES ('210','info','备份数据库成功！','2130706433','Windows 10','Chrome','admin','2021-10-26 19:52:56'),('211','info','登录成功!','2742932320','Windows 10','Chrome','admin','2023-12-30 10:25:35'),('212','info','修改参数配置成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 10:26:11'),('213','info','系统更新成功!','2742932320','Windows 10','Chrome','admin','2023-12-30 10:32:15'),('214','info','系统更新成功!','2742932320','Windows 10','Chrome','admin','2023-12-30 10:32:29'),('215','info','系统更新成功!','2742932320','Windows 10','Chrome','admin','2023-12-30 10:32:41'),('216','info','修改参数配置成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 10:50:31'),('217','info','删除友情链接8成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 10:55:37'),('218','info','删除友情链接6成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 10:55:42'),('219','info','删除友情链接7成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 10:55:46'),('220','info','删除友情链接5成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 10:55:50'),('221','info','修改友情链接1成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 10:56:51'),('222','info','修改友情链接4成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 10:57:51'),('223','info','修改参数配置成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 11:33:51'),('224','info','修改参数配置成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 11:34:04'),('225','info','修改站点信息成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 11:35:30'),('226','info','修改站点信息成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 11:35:48'),('227','info','修改公司信息成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 11:36:37'),('228','info','修改公司信息成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 11:41:49'),('229','info','修改站点信息成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 11:44:57'),('230','info','修改公司信息成功！','2742932320','Windows 10','Chrome','admin','2023-12-30 11:49:10'),('231','info','Baidu爬行/','1957896288','Android','Chrome','','2023-12-30 12:14:03'),('232','info','Baidu爬行/','1957896213','Android','Chrome','','2023-12-30 12:14:40'),('233','info','Baidu爬行/','3702877298','Android','Chrome','','2023-12-30 14:16:28'),('234','info','Baidu爬行/','1957896371','Other','Other','','2023-12-30 14:50:13'),('235','info','Baidu爬行/','1957896421','Other','Other','','2023-12-30 18:32:12'),('236','info','Baidu爬行/','3702877331','Other','Other','','2023-12-30 18:32:13'),('237','info','Baidu爬行/','3702877276','Android','Chrome','','2023-12-30 21:40:24'),('238','info','Baidu爬行/','1957896216','Android','Chrome','','2023-12-30 22:40:09'),('239','info','Baidu爬行/','3702877298','Android','Chrome','','2023-12-31 00:47:00'),('240','info','Sogou爬行/','989494618','Other','Other','','2023-12-31 02:37:27'),('241','info','Baidu爬行/','1957896388','Android','Chrome','','2023-12-31 03:46:14'),('242','info','Baidu爬行/','1957896369','Android','Chrome','','2023-12-31 03:46:45'),('243','info','登录成功!','2742932320','Windows 10','Chrome','admin','2023-12-31 09:02:22'),('244','info','用户资料成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 09:02:53'),('245','info','修改单页内容1成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 09:10:58'),('246','info','修改单页内容1成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 09:11:55'),('247','info','修改单页内容19成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 09:15:42'),('248','info','修改单页内容3成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 09:18:57'),('249','info','修改单页内容19成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 09:21:26'),('250','info','批量删除文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 09:22:51'),('251','info','修改文章20成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 09:23:40'),('252','info','修改文章20成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 09:27:14'),('253','info','修改文章21成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 09:28:01'),('254','info','修改文章15成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 09:32:21'),('255','info','修改文章17成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 09:42:41'),('256','info','登录成功!','2742932320','Windows 10','Chrome','admin','2023-12-31 20:03:32'),('257','info','系统更新成功!','2742932320','Windows 10','Chrome','admin','2023-12-31 20:03:41'),('258','info','修改文章17成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 20:08:48'),('259','info','修改文章16成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 20:12:29'),('260','info','修改文章16成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 20:14:04'),('261','info','修改文章18成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 20:15:07'),('262','info','修改文章15成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 20:17:39'),('263','info','修改文章16成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 20:18:30'),('264','info','修改文章17成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 20:19:04'),('265','info','修改文章18成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 20:19:26'),('266','info','批量删除文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 20:21:06'),('267','info','修改文章4成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 20:30:18'),('268','info','修改文章4成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 20:32:34'),('269','info','修改轮播图2成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:00:55'),('270','info','修改轮播图2成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:04:12'),('271','info','修改轮播图2成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:06:22'),('272','info','修改轮播图1成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:19:56'),('273','info','修改轮播图1成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:25:18'),('274','info','修改轮播图2成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:27:26'),('275','info','删除轮播图3成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:29:32'),('276','info','批量删除文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:30:26'),('277','info','批量删除文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:30:36'),('278','info','修改数据内容栏目6成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:31:08'),('279','info','修改数据内容栏目7成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:31:19'),('280','info','修改数据内容栏目12成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:32:49'),('281','info','修改数据内容栏目13成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:33:05'),('282','info','修改数据内容栏目14成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:33:45'),('283','info','修改数据内容栏目15成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:34:36'),('284','info','删除数据内容栏目18成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:35:12'),('285','info','删除数据内容栏目17成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:35:20'),('286','info','修改文章9成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:44:54'),('287','info','修改文章9成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:49:01'),('288','info','删除文章14成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:50:40'),('289','info','修改数据内容栏目6成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:56:24'),('290','info','修改数据内容栏目12成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:57:13'),('291','info','修改数据内容栏目6成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:57:30'),('292','info','修改数据内容栏目7成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:57:47'),('293','info','修改数据内容栏目13成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:58:06'),('294','info','修改数据内容栏目14成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:58:24'),('295','info','修改数据内容栏目15成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 21:58:43'),('296','info','修改数据内容栏目8成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 22:01:21'),('297','info','修改数据内容栏目16成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 22:02:07'),('298','info','新增文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 22:03:21'),('299','info','修改文章36成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 22:05:48'),('300','info','删除数据内容栏目21成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:10:13'),('301','info','删除数据内容栏目20成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:11:19'),('302','info','新增数据内容栏目20成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:13:41'),('303','info','新增文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:18:15'),('304','info','修改文章37成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:19:25'),('305','info','修改文章37成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:20:31'),('306','info','修改文章37成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:21:35'),('307','info','修改数据内容栏目20成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:23:01'),('308','info','新增文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:24:29'),('309','info','修改文章38成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:25:52'),('310','info','新增文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:29:50'),('311','info','新增文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:31:54'),('312','info','新增文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:38:35'),('313','info','新增文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:41:08'),('314','info','新增文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:44:12'),('315','info','新增文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:47:28'),('316','info','新增文章成功！','2742932320','Windows 10','Chrome','admin','2023-12-31 23:52:43'),('317','info','Baidu爬行/','3702877329','Other','Other','','2024-01-01 00:02:26'),('318','info','Baidu爬行/','1957896238','Other','Other','','2024-01-01 00:02:40'),('319','info','Baidu爬行/','1957896212','Other','Other','','2024-01-01 00:52:21'),('320','info','Baidu爬行/','1957896241','Other','Other','','2024-01-01 03:21:16'),('321','info','360So爬行/','720113952','Windows 7','Chrome','','2024-01-01 05:41:17'),('322','info','360So爬行/','720114008','Windows 7','Chrome','','2024-01-01 05:41:19'),('323','info','360So爬行/','720135629','Windows 7','Chrome','','2024-01-01 05:42:26'),('324','info','Google爬行/','1123632930','Android','Chrome','','2024-01-01 14:53:33'),('325','info','Baidu爬行/','3702877360','Other','Other','','2024-01-01 23:51:51'),('326','info','other-bot爬行/','1425429771','Other','Other','','2024-01-02 03:50:45'),('327','info','other-bot爬行/','1425429771','Other','Other','','2024-01-02 03:50:47'),('328','info','other-bot爬行/','1425429771','Other','Other','','2024-01-02 03:50:49'),('329','info','other-bot爬行/','1081870402','Other','Other','','2024-01-02 09:04:05'),('330','info','Yisou爬行/','1018956600','Windows 7','Chrome','','2024-01-02 12:21:30'),('331','info','Baidu爬行/','1957896402','Android','Chrome','','2024-01-02 12:58:01'),('332','info','Yisou爬行/','1698902447','Windows 7','Chrome','','2024-01-02 13:09:26'),('333','info','Baidu爬行/','1957896336','Android','Chrome','','2024-01-02 13:19:21'),('334','info','Yisou爬行/','1879928915','Windows 7','Chrome','','2024-01-02 13:49:53'),('335','info','Yisou爬行/','665676679','Windows 7','Chrome','','2024-01-02 15:36:37'),('336','info','Baidu爬行/','3702877289','Other','Other','','2024-01-02 17:55:35'),('337','info','Baidu爬行/','3702877359','Android','Chrome','','2024-01-02 20:12:35'),('338','info','Yisou爬行/','1698897379','Windows 7','Chrome','','2024-01-02 21:06:58'),('339','info','other-bot爬行/','3241079618','Other','Other','','2024-01-02 22:16:35'),('340','info','登录成功!','2742932320','Windows 10','Chrome','admin','2024-01-02 23:15:13'),('341','info','系统更新成功!','2742932320','Windows 10','Chrome','admin','2024-01-02 23:15:28'),('342','info','新增文章成功！','2742932320','Windows 10','Chrome','admin','2024-01-02 23:34:32'),('343','info','Baidu爬行/','2345014229','Other','Other','','2024-01-03 00:45:14'),('344','info','Sogou爬行/','1875535236','Other','Other','','2024-01-03 02:33:48'),('345','info','Baidu爬行/','3702877333','Other','Other','','2024-01-03 04:15:36'),('346','info','Baidu爬行/','1957896296','Other','Other','','2024-01-03 04:16:06'),('347','info','Baidu爬行/','3702877340','Other','Other','','2024-01-03 04:16:43'),('348','info','登录成功!','1885421414','Windows 10','Chrome','admin','2024-01-03 09:34:15'),('349','info','修改公司信息成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 09:36:07'),('350','info','修改单页内容3成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 09:38:37'),('351','info','新增文章成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 11:18:00'),('352','info','新增文章成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 11:33:36'),('353','info','修改站点信息成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 13:40:27'),('354','info','修改公司信息成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 13:41:14'),('355','info','修改公司信息成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 13:41:47'),('356','info','修改公司信息成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 13:42:13'),('357','info','修改公司信息成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 13:43:04'),('358','info','修改数据内容栏目19成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 13:44:05'),('359','info','修改文章37成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 13:46:12'),('360','info','新增文章成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 14:21:39'),('361','info','修改文章49成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 14:24:28'),('362','info','修改文章49成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 14:25:59'),('363','info','修改文章49成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 14:26:39'),('364','info','修改文章49成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 14:27:33'),('365','info','修改文章49成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 14:28:13'),('366','info','新增文章成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 14:59:03'),('367','info','新增数据内容栏目21成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 15:00:51'),('368','info','新增文章成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 15:15:34'),('369','info','修改文章18成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 15:23:31'),('370','info','Baidu爬行/','3702877343','Other','Other','','2024-01-03 15:50:06'),('371','info','修改参数配置成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 16:48:59'),('372','info','修改参数配置成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 17:23:31'),('373','info','Sogou爬行/','1875535221','Other','Other','','2024-01-03 17:23:57'),('374','info','修改参数配置成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 17:39:48'),('375','info','修改参数配置成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 17:40:08'),('376','info','修改参数配置成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 17:40:18'),('377','info','修改参数配置成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 17:41:24'),('378','info','修改站点信息成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 17:43:14'),('379','info','清理缓存成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 17:44:18'),('380','info','清理缓存成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 17:44:19'),('381','info','修改站点信息成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 17:45:03'),('382','info','修改参数配置成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 17:45:35'),('383','info','登录成功!','1885421414','Windows 10','Chrome','admin','2024-01-03 17:48:57'),('384','info','备份数据库成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 17:49:28'),('385','info','清理缓存成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 17:50:19'),('386','info','清理缓存成功！','1885421414','Windows 10','Chrome','admin','2024-01-03 17:50:21'),('387','info','登录成功!','2742932320','Windows 10','Chrome','admin','2024-01-03 18:53:52'),('388','info','登录成功!','2742932320','Windows 10','Chrome','admin','2024-01-03 19:07:44'),('389','info','清理缓存成功！','2742932320','Windows 10','Chrome','admin','2024-01-03 19:09:36'),('390','info','清理缓存成功！','2742932320','Windows 10','Chrome','admin','2024-01-03 19:09:37'),('391','info','Sogou爬行/','1032298388','Other','Other','','2024-01-03 19:54:21'),('392','info','Sogou爬行/','2071868114','Other','Other','','2024-01-04 09:54:12'),('393','info','登录成功!','1885419348','Windows 10','Chrome','admin','2024-01-04 10:00:11'),('394','info','修改参数配置成功！','1885419348','Windows 10','Chrome','admin','2024-01-04 10:01:27'),('395','info','修改参数配置成功！','1885419348','Windows 10','Chrome','admin','2024-01-04 10:02:41'),('396','info','修改参数配置成功！','1885419348','Windows 10','Chrome','admin','2024-01-04 10:07:15'),('397','info','修改参数配置成功！','1885419348','Windows 10','Chrome','admin','2024-01-04 10:07:30'),('398','info','修改参数配置成功！','1885419348','Windows 10','Chrome','admin','2024-01-04 15:05:40'),('399','info','清理缓存成功！','1885419348','Windows 10','Chrome','admin','2024-01-04 15:06:06'),('400','info','清理缓存成功！','1885419348','Windows 10','Chrome','admin','2024-01-04 15:06:08');
/*!40000 ALTER TABLE `ay_syslog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_tags`
--

DROP TABLE IF EXISTS `ay_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_tags` (
  `id` varchar(255) DEFAULT NULL,
  `acode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_tags`
--

LOCK TABLES `ay_tags` WRITE;
/*!40000 ALTER TABLE `ay_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `ay_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_type`
--

DROP TABLE IF EXISTS `ay_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_type` (
  `id` varchar(255) DEFAULT NULL,
  `tcode` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `item` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `sorting` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_type`
--

LOCK TABLES `ay_type` WRITE;
/*!40000 ALTER TABLE `ay_type` DISABLE KEYS */;
INSERT INTO `ay_type` VALUES ('1','T101','菜单功能','新增','add','1','admin','admin','2017-04-27 07:28:34','2017-08-09 15:25:56'),('2','T101','菜单功能','删除','del','2','admin','admin','2017-04-27 07:29:08','2017-08-09 15:23:34'),('3','T101','菜单功能','修改','mod','3','admin','admin','2017-04-27 07:29:34','2017-08-09 15:23:32'),('4','T101','菜单功能','导出','export','4','admin','admin','2017-04-27 07:30:42','2017-08-09 15:23:29'),('5','T101','菜单功能','导入','import','5','admin','admin','2017-04-27 07:31:38','2017-08-09 15:23:27');
/*!40000 ALTER TABLE `ay_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_user`
--

DROP TABLE IF EXISTS `ay_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_user` (
  `id` varchar(255) DEFAULT NULL,
  `ucode` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `realname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `login_count` varchar(255) DEFAULT NULL,
  `last_login_ip` varchar(255) DEFAULT NULL,
  `create_user` varchar(255) DEFAULT NULL,
  `update_user` varchar(255) DEFAULT NULL,
  `create_time` varchar(255) DEFAULT NULL,
  `update_time` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_user`
--

LOCK TABLES `ay_user` WRITE;
/*!40000 ALTER TABLE `ay_user` DISABLE KEYS */;
INSERT INTO `ay_user` VALUES ('1','10001','admin','优股电子','0dc2fe433ec0b6e14dcee9e7dbb5b3cf','1','16','1885419348','admin','admin','2017-05-08 18:50:30',' 2024-01-04 10:00:11');
/*!40000 ALTER TABLE `ay_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ay_user_role`
--

DROP TABLE IF EXISTS `ay_user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ay_user_role` (
  `id` varchar(255) DEFAULT NULL,
  `ucode` varchar(255) DEFAULT NULL,
  `rcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ay_user_role`
--

LOCK TABLES `ay_user_role` WRITE;
/*!40000 ALTER TABLE `ay_user_role` DISABLE KEYS */;
INSERT INTO `ay_user_role` VALUES ('1','10001','R101');
/*!40000 ALTER TABLE `ay_user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sqlite_sequence`
--

DROP TABLE IF EXISTS `sqlite_sequence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sqlite_sequence` (
  `name` varchar(255) DEFAULT NULL,
  `seq` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sqlite_sequence`
--

LOCK TABLES `sqlite_sequence` WRITE;
/*!40000 ALTER TABLE `sqlite_sequence` DISABLE KEYS */;
INSERT INTO `sqlite_sequence` VALUES ('ay_area','1'),('ay_company','1'),('ay_config','75'),('ay_content','51'),('ay_content_ext','13'),('ay_content_sort','23'),('ay_extfield','3'),('ay_form','2'),('ay_form_field','6'),('ay_label','12'),('ay_link','8'),('ay_menu','66'),('ay_menu_action','78'),('ay_message','7'),('ay_role','2'),('ay_role_area','4'),('ay_role_level','215'),('ay_site','1'),('ay_slide','4'),('ay_tags','1'),('ay_type','5'),('ay_user','1'),('ay_user_role','1'),('ay_model','7'),('ay_syslog','400'),('ay_member_group','3'),('ay_member_field','3');
/*!40000 ALTER TABLE `sqlite_sequence` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'pbootcms'
--

--
-- Dumping routines for database 'pbootcms'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-03-20  4:00:02
