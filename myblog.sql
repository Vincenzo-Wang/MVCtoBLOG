-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-08-10 16:51:35
-- 服务器版本： 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- 表的结构 `blog_article`
--

DROP TABLE IF EXISTS `blog_article`;
CREATE TABLE IF NOT EXISTS `blog_article` (
  `article_id` smallint(5) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `article_name` varchar(128) NOT NULL COMMENT '文章名称',
  `user_id` mediumint(8) NOT NULL DEFAULT '1',
  `article_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '发布时间',
  `article_ip` varchar(15) DEFAULT NULL COMMENT '发布ip',
  `article_click` int(10) DEFAULT NULL COMMENT '查看人数',
  `type_id` tinyint(3) NOT NULL DEFAULT '1' COMMENT '栏目id',
  `article_type` int(13) NOT NULL DEFAULT '1' COMMENT '文章的模式:0为私有，1为公开',
  `article_content` text NOT NULL COMMENT '文章内容',
  `article_up` tinyint(3) NOT NULL DEFAULT '0' COMMENT '''是否置顶:0为否，1为是',
  `article_support` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否博主推荐:0为否，1为是',
  `article_image` varchar(255) NOT NULL DEFAULT 'public/index/images/img1.jpg',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `blog_article`
--

INSERT INTO `blog_article` (`article_id`, `article_name`, `user_id`, `article_time`, `article_ip`, `article_click`, `type_id`, `article_type`, `article_content`, `article_up`, `article_support`, `article_image`) VALUES
(15, '时间', 1, '2017-07-20 11:34:51', '2130706433', 2, 1, 1, '<p><span style="color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; background-color: rgb(255, 255, 255);">维鹊有巢，维鸠居之。之子于归，百两御之。</span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; background-color: rgb(255, 255, 255);">维鹊有巢，维鸠方之。之子于归，百两将之。</span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; background-color: rgb(255, 255, 255);">维鹊有巢，维鸠盈之。之子于归，百两成之。</span></p>', 0, 0, '/Uploads/image/20170620/1497958528687591.jpg'),
(16, '相鼠·诗经', 40, '2017-06-20 11:36:03', '2130706433', 5, 1, 1, '<p><span style="color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; background-color: rgb(255, 255, 255);">相鼠有皮，人而无仪！人而无仪，不死何为？</span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; background-color: rgb(255, 255, 255);">相鼠有齿，人而无止！人而无止，不死何俟？</span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; background-color: rgb(255, 255, 255);">相鼠有体，人而无礼！人而无礼，胡不遄死？</span></p>', 0, 0, '/Uploads/image/20170620/1497958581982208.jpg'),
(17, '鹿鸣·诗', 41, '2017-06-20 11:36:49', '2130706433', NULL, 1, 1, '<p><span style="color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; background-color: rgb(255, 255, 255);">呦呦鹿鸣，食野之苹。我有嘉宾，鼓瑟吹笙。吹笙鼓簧，承筐是将。人之好我，示我周行。</span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; background-color: rgb(255, 255, 255);">呦呦鹿鸣，食野之蒿。我有嘉宾，德音孔昭。视民不恌，君子是则是效。我有旨酒，嘉宾式燕以敖。</span><br style="padding: 0px; margin: 0px; color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; white-space: normal; background-color: rgb(255, 255, 255);"/><span style="color: rgb(51, 51, 51); font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; background-color: rgb(255, 255, 255);">呦呦鹿鸣，食野之芩。我有嘉宾，鼓瑟鼓琴。鼓瑟鼓琴，和乐且湛。我有旨酒，以燕乐嘉宾之心。</span></p>', 0, 0, '/Uploads/image/20170620/1497958637910797.jpg'),
(18, '正则表达式', 1, '2017-06-20 11:37:44', '2130706433', NULL, 2, 1, '<pre class="brush:php;toolbar:false">正则表达式\r\n1、为什么使用正则表达式\r\n使用场景\r\n1)敏感词过滤\r\n2)模板引擎\r\n3)手机、邮箱等验证\r\n&nbsp;4)ubb文件\r\n&nbsp;&nbsp;5)小偷程序\r\n&nbsp;preg_match(正则表达式，要搜索的字符串，结果数组)&nbsp;在要搜索的字符串中，按照正则表达式的要求查找是否有符合要求的串，有的话把结果放到结果数组中，只匹配一次。成功返回1，失败返回0\r\n2、基本使用\r\n&nbsp;&nbsp;&nbsp;&nbsp;正则表达式的组成：定界符、原子、元字符、模式修正符\r\n&nbsp;&nbsp;&nbsp;&nbsp;1)定界符\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;不能是字母数字下划线，空格&nbsp;,\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;一般推荐使用/做定界符&nbsp;&quot;/正则/&quot;&nbsp;&nbsp;&quot;##&quot;&nbsp;&quot;&amp;&nbsp;&amp;&quot;\r\n&nbsp;&nbsp;&nbsp;&nbsp;2)原子\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;组成正则表达式的最小单位，任何字符都可以\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;d&nbsp;&nbsp;数字0-9中任何一个字符&nbsp;[0-9]\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;D&nbsp;&nbsp;任何非数字字符的中一个[^0-9]\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;w&nbsp;&nbsp;0-9a-z_中的任何一个字符[0-9a-z_]\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;W&nbsp;&nbsp;除了0-9a-z_之外的任何一个字符\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;s&nbsp;&nbsp;空格&nbsp;	\r\n&nbsp;&nbsp;&nbsp;[	\r\n&nbsp;]\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S&nbsp;&nbsp;除去空格、	\r\n\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(了解)代表一个词边界字符(非数字和字母)\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B&nbsp;&nbsp;(了解)代表一个非词边界字符\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;[]&nbsp;原子表&nbsp;可以根据自己的需要创建原子表&nbsp;[01234]&nbsp;[0-4]\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;^&nbsp;&nbsp;抑扬符&nbsp;配合原子表使用，表示除去原子表的之外的任何一个字符\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.&nbsp;代表除去\n之外的任何一个字符\r\n&nbsp;&nbsp;&nbsp;&nbsp;3)元字符\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{}&nbsp;重复前一个原子出现的次数\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{m}&nbsp;重复m次\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{m,&nbsp;n}&nbsp;重复至少m次，最多n次\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{m,}&nbsp;至少m次\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;前面那个原子出现0次或多次[0,]\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+&nbsp;&nbsp;至少出现一次{1,}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;?&nbsp;出现0次或一次{0,1}\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;^&nbsp;字符串开始&nbsp;^a&nbsp;以a开头的字符串\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$&nbsp;字符串的结尾&nbsp;&nbsp;b$&nbsp;以b结束的字符串\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;或者\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;()&nbsp;改变优先级&nbsp;&nbsp;可以取子元素\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;需要转义的字符：\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{}()*+?|^&nbsp;&nbsp;[]\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;在正则表达式中匹配一个需要使用\\\\&nbsp;&nbsp;&nbsp;&#39;/\\\\/&#39;\r\n&nbsp;&nbsp;&nbsp;&nbsp;4)模式修正符\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i&nbsp;不区分大小写\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;m&nbsp;把原子符串看成多行\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;s&nbsp;把原子符串看成单行，.匹配任何字符(重要)\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x&nbsp;消去正表达式中空格\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;U&nbsp;取消贪婪&nbsp;&nbsp;等价*?&nbsp;&nbsp;+?\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;u把正则表达式看成utf8编码的\r\n3、正则函数\r\n&nbsp;&nbsp;&nbsp;&nbsp;preg_match：\r\n&nbsp;&nbsp;&nbsp;&nbsp;preg_match_all：\r\n&nbsp;&nbsp;&nbsp;&nbsp;preg_replace：\r\n&nbsp;&nbsp;&nbsp;&nbsp;preg_split：\r\n4、应用实例\r\n&nbsp;&nbsp;&nbsp;规则：\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1）看样子\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2）写一点测一点\r\n&nbsp;&nbsp;&nbsp;&nbsp;用户名和密码验证\r\n&nbsp;&nbsp;&nbsp;&nbsp;邮箱和url\r\n&nbsp;&nbsp;&nbsp;&nbsp;配置文件修改\r\n&nbsp;&nbsp;&nbsp;&nbsp;中文表示：[x{4e00}-x{9fa5}]\r\nfunction&nbsp;checkMail($mail)\r\n{\r\n&nbsp;&nbsp;&nbsp;&nbsp;$pattern&nbsp;=&nbsp;&quot;/w+@(w+.)+(com|cn|net)/&quot;;\r\n&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(preg_match($pattern,$mail,$result))&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//var_dump($result);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;true;\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;else&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;false;\r\n&nbsp;&nbsp;&nbsp;&nbsp;}\r\n}\r\n//url验证\r\nfunction&nbsp;checkURL($url)\r\n{\r\n&nbsp;&nbsp;&nbsp;&nbsp;$pattern&nbsp;=&nbsp;&quot;/(http|https)://(w+.?)+(:d+)?(/)?(w+.w*)?(?)?(w+=(w+)?&amp;?)*/&quot;;\r\n&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(preg_match($pattern,$url,$result))&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;true;\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;else&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;false;\r\n&nbsp;&nbsp;&nbsp;&nbsp;}\r\n}\r\n//检测密码类型\r\nfunction&nbsp;checkTypePsd($str)\r\n{\r\n&nbsp;&nbsp;&nbsp;&nbsp;$pattern&nbsp;=&nbsp;&quot;/^(d)+$/&quot;;\r\n&nbsp;&nbsp;&nbsp;&nbsp;//&nbsp;$str&nbsp;=&nbsp;$_POST[&#39;psd&#39;];\r\n&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(preg_match($pattern,&nbsp;$str,&nbsp;$match)){\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;false;\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;else&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;true;\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;&nbsp;&nbsp;\r\n}\r\n//检测用户名和密码长度\r\n&nbsp;function&nbsp;checkLen($str,$min=3,$max=12)\r\n{\r\n&nbsp;&nbsp;&nbsp;&nbsp;//[x{4e00}-x{9fa5}]\r\n&nbsp;&nbsp;&nbsp;&nbsp;$pattern&nbsp;=&nbsp;&quot;/^([x{4e00}-x{9fa5}]|w){&quot;.($min).&quot;,&quot;.($max).&quot;}&quot;.&quot;$/u&quot;;\r\n&nbsp;&nbsp;&nbsp;&nbsp;if&nbsp;(preg_match($pattern,$str,$result))&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;//var_dump($result);\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;true;\r\n&nbsp;&nbsp;&nbsp;&nbsp;}&nbsp;else&nbsp;{\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;false;\r\n&nbsp;&nbsp;&nbsp;&nbsp;}\r\n}</pre><p><br/></p>', 0, 0, '/Uploads/image/20170620/1497958698541473.jpg'),
(19, '时间函数', 1, '2017-06-20 11:38:59', '2130706433', NULL, 2, 1, '<pre class="brush:php;toolbar:false">时间函数\r\n&nbsp;&nbsp;&nbsp;&nbsp;time:获取时间戳（自1970年1月1日&nbsp;0时0分0秒至现在的秒数）\r\n&nbsp;&nbsp;&nbsp;&nbsp;date：格式化一个本地时间／日期\r\n&nbsp;&nbsp;&nbsp;&nbsp;date_default_timezone_get:获取时区\r\n&nbsp;&nbsp;&nbsp;&nbsp;date_default_timezone_set：设置时区\r\n&nbsp;&nbsp;&nbsp;&nbsp;说明：可以在php.ini里面（date.timezone）\r\n&nbsp;&nbsp;&nbsp;&nbsp;另外的函数\r\n&nbsp;&nbsp;&nbsp;&nbsp;mktime：取得一个日期的Unix时间戳\r\n&nbsp;&nbsp;&nbsp;&nbsp;checkdate:检查一个日期是否合法\r\n&nbsp;&nbsp;&nbsp;&nbsp;getdate:根据时间戳获取日期时间数组\r\n&nbsp;&nbsp;&nbsp;&nbsp;strtotime:根据字符串得到时间戳\r\n&nbsp;&nbsp;&nbsp;&nbsp;date_parse:根据日期时间字符串得到数组\r\n&nbsp;&nbsp;&nbsp;&nbsp;microtime:获取当前Unix时间戳和微秒数\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n&nbsp;&nbsp;&nbsp;&nbsp;date(&#39;Y-m-d&nbsp;H:i:s&#39;,&nbsp;time()-3600*24);\r\n&nbsp;&nbsp;&nbsp;&nbsp;date(&#39;Y-m-d&nbsp;H:i:s&#39;,&nbsp;strtotime(&#39;+1&nbsp;month&#39;));&nbsp;获取当前时间的前一天\r\n&nbsp;&nbsp;&nbsp;&nbsp;/*echo&nbsp;getLastMonthLastDay(&#39;1999-9-2&#39;);\r\nfunction&nbsp;getLastMonthLastDay($str)\r\n{\r\n&nbsp;&nbsp;&nbsp;&nbsp;$thisMonth&nbsp;=&nbsp;&nbsp;date(&#39;Y-m&#39;,&nbsp;strtotime($str));\r\n&nbsp;&nbsp;&nbsp;&nbsp;return&nbsp;date(&#39;Y-m-d&#39;,&nbsp;strtotime($thisMonth)&nbsp;-&nbsp;1);\r\n&nbsp;&nbsp;&nbsp;&nbsp;var_dump($thisMatch);\r\n}*/\r\n数组常用函数：\r\n1、数组中元素指针的移动\r\n&nbsp;&nbsp;&nbsp;&nbsp;next：向后移动，指向下一个元素\r\n&nbsp;&nbsp;&nbsp;&nbsp;prev：向前移动，指向前一个元素\r\n&nbsp;&nbsp;&nbsp;&nbsp;end：指向最后一个元素\r\n&nbsp;&nbsp;&nbsp;&nbsp;reset：复位，重新指向第一个元素\r\n2、键和值相关的操作\r\n&nbsp;&nbsp;&nbsp;&nbsp;key：获取数组当前元素的键\r\n&nbsp;&nbsp;&nbsp;&nbsp;current/pos：获取数组当前元素的值\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_keys：获取所有的键\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_values：获取所有的值，并为其建立数字索引\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_key_exists/key_exists：判断给定的键是否在数组中\r\n&nbsp;&nbsp;&nbsp;&nbsp;in_array：判断给定的值是否在数组中\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_search：根据值返回对应的键名\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_count_values：统计数组中所有的值出现的次数\r\n3、添加删除元素\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_shift：将数组开头的元素移出数组\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_unshift：向数组开头添加一个或更多个元素\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_push：向数组末尾压入一个或多个元素\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_pop：弹出数组末尾的一个元素\r\n4、排序相关\r\n&nbsp;&nbsp;&nbsp;&nbsp;shuffle：将数组打乱(转换为索引数组)\r\n&nbsp;&nbsp;&nbsp;&nbsp;sort：对数组进行排序\r\n&nbsp;&nbsp;&nbsp;&nbsp;rsort：对数组进行逆向排序\r\n&nbsp;&nbsp;&nbsp;&nbsp;asort：对数组进行排序并保持索引关系\r\n&nbsp;&nbsp;&nbsp;&nbsp;arsort：对数组进行逆向排序并保持索引关系\r\n&nbsp;&nbsp;&nbsp;&nbsp;natsort：用自然顺序算法对数组进行排序\r\n&nbsp;&nbsp;&nbsp;&nbsp;natcasesort：natsort忽略大小写的版本\r\n&nbsp;&nbsp;&nbsp;&nbsp;ksort：对数组按照键名进行排序\r\n&nbsp;&nbsp;&nbsp;&nbsp;krsort：对数组按照键名逆向排序\r\n&nbsp;&nbsp;&nbsp;&nbsp;usort：使用用户自定义的比较函数对数组的值进行排序\r\n&nbsp;&nbsp;&nbsp;&nbsp;uasort：使用用户自定义的比较函数对数组的值进行排序并保持索引关系\r\n&nbsp;&nbsp;&nbsp;&nbsp;uksort：使用自定义的比较函数对数组的键名进行排序\r\n5、元素运算\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_sum：计算数组中所有值的和\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_product：计算数组中所有值的乘积\r\n&nbsp;&nbsp;&nbsp;&nbsp;count/sizeof：计算数组中元素的个数\r\n6、创建数组\r\n&nbsp;&nbsp;&nbsp;&nbsp;range：建立一个包含指定范围单元的数组(可以指定步幅)\r\n&nbsp;&nbsp;&nbsp;&nbsp;compact：创建一个包含变量与其值的数组\r\n&nbsp;&nbsp;&nbsp;&nbsp;extract：从数组中将变量导入到当前的符号表(与compact功能相反)\r\n&nbsp;&nbsp;&nbsp;&nbsp;array：新建一个数组\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_merge：合并一个或多个数组(关联会覆盖，索引会重新索引，若想保留索引可以使用&#39;+&#39;)\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_merge_recursive：递归合并一个或多个数组\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_combine：用一个数组的值作为键名，另一个数组的值作为值创建数组\r\n7、其它\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_chunk：将数组分割成指定长度的小数组\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_map：将回调函数作用到每个元素上，返回处理的结果数组(新数组)\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_walk：将回调函数作用到每个元素上(会改变原数组)，返回真假\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_filter：使用回调函数过滤数组(回调函数返回真的才会出现在结果中)\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_flip：返回交换键和值后的新数组\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_rand：随机从数组中抽取一个或多个元素的键\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_replace：使用后面的数组中元素替换第一个数组中的元素\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_reverse：返回一个单元顺序相反的数组(关联数组会保持键值对应，索引数组需要传递第二个参数)\r\n&nbsp;&nbsp;&nbsp;&nbsp;array_unique：移出数组中重复的值\r\n字符串函数：\r\n大小写转换：\r\n&nbsp;&nbsp;&nbsp;&nbsp;strtolower：转换为小写\r\n&nbsp;&nbsp;&nbsp;&nbsp;strtoupper：转换为大写\r\n&nbsp;&nbsp;&nbsp;&nbsp;lcfirst：首字母小写\r\n&nbsp;&nbsp;&nbsp;&nbsp;ucfirst：首字母大写\r\n&nbsp;&nbsp;&nbsp;&nbsp;ucwords：每个单词首字母大写\r\n空白处理：\r\n&nbsp;&nbsp;&nbsp;&nbsp;trim：去掉首尾的空白字符\r\n&nbsp;&nbsp;&nbsp;&nbsp;ltrim：去掉开头的空白字符\r\n&nbsp;&nbsp;&nbsp;&nbsp;rtrim/chop：去掉结尾的空白字符\r\n查找定位:\r\n&nbsp;&nbsp;&nbsp;&nbsp;strstr/strchr查找字符串的首次出现\r\n&nbsp;查找字符串&nbsp;&nbsp;&nbsp;首次出现&nbsp;&nbsp;到结尾的内容&nbsp;&nbsp;@qq.com\r\n&nbsp;&nbsp;&nbsp;&nbsp;strrchr：返回最后一次出现到结尾的内容&nbsp;&nbsp;&nbsp;查找指定字符在字符串中的最后一次出现\r\n&nbsp;&nbsp;&nbsp;&nbsp;stristr：strstr忽略大小写的版本\r\n&nbsp;&nbsp;&nbsp;&nbsp;strpos：查找字符串首次出现的位置\r\n&nbsp;&nbsp;&nbsp;&nbsp;stripos：strpos忽略大小写的版本\r\n&nbsp;&nbsp;&nbsp;&nbsp;strrpos：返回最后一次出现的位置\r\n&nbsp;&nbsp;&nbsp;&nbsp;strripos：strrpos忽略大小写的版本\r\n&nbsp;&nbsp;&nbsp;&nbsp;substr：子串提取，可以通过下标方式获取单个字符($str[n])\r\n&nbsp;&nbsp;&nbsp;&nbsp;strpbrk：返回(字符列表中任意字符)首次出现到结尾的内容\r\n比较：\r\n&nbsp;&nbsp;&nbsp;&nbsp;strcmp：二进制比较字符串\r\n&nbsp;&nbsp;&nbsp;&nbsp;strcasecmp：strcmp忽略大小写\r\n&nbsp;&nbsp;&nbsp;&nbsp;strnatcmp：自然顺序比较\r\n&nbsp;&nbsp;&nbsp;&nbsp;strnatcasecmp：strnatcmp的忽略大小写版本\r\n顺序：\r\n&nbsp;&nbsp;&nbsp;&nbsp;str_shuffle：打乱顺序(舒服了)\r\n&nbsp;&nbsp;&nbsp;&nbsp;strrev：逆序字符串\r\n转换：\r\n&nbsp;&nbsp;&nbsp;&nbsp;chr：将ASCII码值转换为字符\r\n&nbsp;&nbsp;&nbsp;&nbsp;ord：将字符转换为ASCII码值\r\n&nbsp;&nbsp;&nbsp;&nbsp;bin2hex：将二进制字符串转换为16进制字符串\r\n&nbsp;&nbsp;&nbsp;&nbsp;hex2bin：将16进制字符串转为二进制(可见字符)字符串\r\n分割拼接\r\n&nbsp;&nbsp;&nbsp;&nbsp;explode：按照指定的字符串进行分割\r\n&nbsp;&nbsp;&nbsp;&nbsp;implode/join：按照指定的字符串进行拼接\r\n&nbsp;&nbsp;&nbsp;&nbsp;str_split：切割成指定长度字符串的数组\r\n&nbsp;&nbsp;&nbsp;&nbsp;parse_str：将url参数字符串转换为变量\r\n&nbsp;&nbsp;&nbsp;&nbsp;str_repeat：将一个字符串重复指定的次数&nbsp;&nbsp;&nbsp;\r\n修改：\r\n&nbsp;&nbsp;&nbsp;&nbsp;str_replace：用指定的字符串替换指定的字符串\r\n&nbsp;&nbsp;&nbsp;&nbsp;str_ireplace：str_replace的忽略大小写版本\r\n长度：\r\n&nbsp;&nbsp;&nbsp;&nbsp;strlen：返回字符串的长度(中文占3个字节)\r\n转义：\r\n&nbsp;&nbsp;&nbsp;&nbsp;addcslashes：添加C风格的转义()\r\n&nbsp;&nbsp;&nbsp;&nbsp;stripcslashes：去掉C风格的转义()\r\n&nbsp;&nbsp;&nbsp;&nbsp;addslashes：使用反斜线引用字符串\r\n&nbsp;&nbsp;&nbsp;&nbsp;stripslashes：反引用一个引用字符串\r\n加密：\r\n&nbsp;&nbsp;&nbsp;&nbsp;md5\r\n&nbsp;&nbsp;&nbsp;&nbsp;md5_file\r\n多字节处理：\r\n&nbsp;&nbsp;&nbsp;&nbsp;mb_xxx\r\n常用数学函数：\r\nabs:绝对值\r\nceil\r\nfloor\r\nmax\r\nmin\r\nmt_rand\r\nmt_getrandmax\r\npi\r\npow\r\nround\r\ndeg2rad\r\nrad2deg</pre><p><br/></p>', 0, 0, '/Uploads/image/20170620/1497958771391357.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `blog_category`
--

DROP TABLE IF EXISTS `blog_category`;
CREATE TABLE IF NOT EXISTS `blog_category` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(25) NOT NULL,
  `othername` varchar(50) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `blog_category`
--

INSERT INTO `blog_category` (`bid`, `bname`, `othername`) VALUES
(1, '生活随笔', 'life'),
(2, '技术博客', 'php');

-- --------------------------------------------------------

--
-- 表的结构 `blog_commit`
--

DROP TABLE IF EXISTS `blog_commit`;
CREATE TABLE IF NOT EXISTS `blog_commit` (
  `cid` mediumint(8) NOT NULL AUTO_INCREMENT COMMENT '评论自增id',
  `user_id` mediumint(8) NOT NULL COMMENT '收到评论的用户id',
  `commit_id` mediumint(8) NOT NULL COMMENT '评论的内容id',
  `commit_user_id` mediumint(8) NOT NULL COMMENT '评论者id',
  `commit_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `commit_ip` varchar(15) DEFAULT NULL,
  `commit_content` varchar(255) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `blog_commit`
--

INSERT INTO `blog_commit` (`cid`, `user_id`, `commit_id`, `commit_user_id`, `commit_time`, `commit_ip`, `commit_content`) VALUES
(14, 1, 12, 1, '2017-06-20 11:27:04', NULL, '测试'),
(15, 1, 12, 1, '2017-06-20 11:27:23', NULL, '管用吗'),
(16, 1, 12, 1, '2017-06-20 11:27:35', NULL, '再测一遍'),
(17, 1, 13, 1, '2017-06-21 02:26:18', NULL, '测试'),
(18, 1, 13, 40, '2017-06-21 02:27:19', NULL, '我是和i皮皮聪'),
(19, 1, 12, 40, '2017-06-21 02:30:06', NULL, '我是超级皮皮聪');

-- --------------------------------------------------------

--
-- 表的结构 `blog_user`
--

DROP TABLE IF EXISTS `blog_user`;
CREATE TABLE IF NOT EXISTS `blog_user` (
  `uid` mediumint(8) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(32) NOT NULL COMMENT '用户名字',
  `password` varchar(32) NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL COMMENT '用户邮箱',
  `isadmin` tinyint(2) NOT NULL DEFAULT '0',
  `sign` text,
  `phone` varchar(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `blog_user`
--

INSERT INTO `blog_user` (`uid`, `username`, `password`, `ip`, `email`, `isadmin`, `sign`, `phone`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '王昱翰', 'e10adc3949ba59abbe56e057f20f883e', '2130706433', '123@123.com', 1, NULL, '13621115092', NULL, NULL, NULL),
(39, '霍建月', 'e10adc3949ba59abbe56e057f20f883e', '2130706433', '123@123.com', 0, NULL, '13621115092', NULL, NULL, NULL),
(40, '皮皮聪', 'e10adc3949ba59abbe56e057f20f883e', '2130706433', '123@123.com', 0, NULL, '13621115092', NULL, NULL, NULL),
(41, '阿拉斯加', 'e10adc3949ba59abbe56e057f20f883e', '2130706433', '', 0, NULL, '', NULL, NULL, NULL),
(44, '王可可', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(45, '皮皮', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
(46, '皮皮', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, 0, NULL, NULL, '2017-07-11 17:57:45', '2017-07-11 19:04:10', '2017-07-11 19:04:10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
