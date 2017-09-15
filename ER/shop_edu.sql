/*
Navicat MySQL Data Transfer

Source Server         : admin
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : shop_edu

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2016-09-05 19:28:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `shop_address`
-- ----------------------------
DROP TABLE IF EXISTS `shop_address`;
CREATE TABLE `shop_address` (
  `did` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '收货人',
  `region` varchar(45) NOT NULL DEFAULT '' COMMENT '地区',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '详细地址',
  `telephone` varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  `cellphone` varchar(20) NOT NULL DEFAULT '' COMMENT '电话',
  `emil` varchar(45) NOT NULL DEFAULT '' COMMENT '邮箱',
  `addressname` varchar(45) NOT NULL DEFAULT '' COMMENT '地址别名',
  `shop_user_uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`did`),
  KEY `fk_shop_address_shop_user1_idx` (`shop_user_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='用户地址';

-- ----------------------------
-- Records of shop_address
-- ----------------------------
INSERT INTO `shop_address` VALUES ('5', '小北', '北京市,北京,东城区', '后盾php', '15728048627', '', '462441355@qq.com', '公司', '1');
INSERT INTO `shop_address` VALUES ('6', '小林子', '北京市,北京,东城区', '后盾', '15869660931', '', '462441355@qq.com', '家里', '1');
INSERT INTO `shop_address` VALUES ('7', '小王', '安徽,安庆,迎江区', '小村庄', '15728048627', '688588', '462441355@qq.com', '家里', '1');
INSERT INTO `shop_address` VALUES ('8', '小青', '福建,福州,鼓楼区', '小青学院', '15728048627', '', '462441355@qq.com', '家里', '1');
INSERT INTO `shop_address` VALUES ('32', '1', '北京市,北京,东城区', '11', '15728048627', '', '1111111', '111111', '5');
INSERT INTO `shop_address` VALUES ('37', '12', '北京市,北京,东城区', '12', '18118181111', '11111111', '2132', '213', '6');

-- ----------------------------
-- Table structure for `shop_admin`
-- ----------------------------
DROP TABLE IF EXISTS `shop_admin`;
CREATE TABLE `shop_admin` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` char(30) NOT NULL DEFAULT '' COMMENT '账户',
  `username` char(30) NOT NULL DEFAULT '' COMMENT '账户名称',
  `userpassword` char(32) NOT NULL DEFAULT '' COMMENT '账户密码',
  `logintime` int(10) NOT NULL DEFAULT '0' COMMENT '登陆时间',
  `loginip` char(15) NOT NULL DEFAULT '' COMMENT '登陆IP',
  `islock` tinyint(1) NOT NULL DEFAULT '0' COMMENT '锁',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `user_UNIQUE` (`user`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='后台用户表';

-- ----------------------------
-- Records of shop_admin
-- ----------------------------
INSERT INTO `shop_admin` VALUES ('1', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1473067909', '::1', '0');
INSERT INTO `shop_admin` VALUES ('4', 'shop', 'shop', '21232f297a57a5a743894a0e4a801fc3', '1473069016', '::1', '0');
INSERT INTO `shop_admin` VALUES ('5', 'band', 'band', '21232f297a57a5a743894a0e4a801fc3', '0', '', '0');
INSERT INTO `shop_admin` VALUES ('6', 'xiaolin', 'xiaolin', '21232f297a57a5a743894a0e4a801fc3', '1473067259', '::1', '0');

-- ----------------------------
-- Table structure for `shop_arc`
-- ----------------------------
DROP TABLE IF EXISTS `shop_arc`;
CREATE TABLE `shop_arc` (
  `wid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(150) NOT NULL DEFAULT '' COMMENT '标题',
  `click` mediumint(8) NOT NULL DEFAULT '0' COMMENT '点击次数',
  `sendtime` int(10) NOT NULL DEFAULT '0' COMMENT '发表时间',
  `updatetime` int(10) NOT NULL DEFAULT '0' COMMENT '修改时间',
  `thumb` varchar(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `digest` varchar(255) NOT NULL DEFAULT '' COMMENT '摘要',
  `author` varchar(20) NOT NULL DEFAULT '' COMMENT '作者',
  `is_recycle` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否在回收站',
  `shop_admin_uid` int(10) unsigned NOT NULL,
  `shop_arc_cate_cid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`wid`),
  KEY `fk_shop_active_shop_admin1_idx` (`shop_admin_uid`),
  KEY `fk_shop_arc_shop_arc_cate1_idx` (`shop_arc_cate_cid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of shop_arc
-- ----------------------------
INSERT INTO `shop_arc` VALUES ('1', '好用好喝又好吃——测评高博破壁料理机', '0', '1471530090', '1471590102', 'Upload/58831471530090_thumb.jpg', '瞬间击破水果蔬菜的细胞壁，释放果蔬的营养萃取蔬果生化素，让我们获得口感细腻、营养丰富的果蔬汁以及豆浆等。它比一般通过离心力用电机带动旋刀的榨汁机有着更高的榨汁效率。', '简单生活', '0', '1', '3');
INSERT INTO `shop_arc` VALUES ('2', '有些东西不能省 超龄家电该换必须换！', '1', '1471532286', '1471534793', 'Upload/60621471532286_thumb.jpg', '物品都有使用期限，超期使用将带来各种副作用，家电亦是如此。在我们身边，不少消费者都抱着勤俭节约的消费观念，不坏不更换，使得很多老电器仍在超龄服役。', '易迅', '0', '1', '1');
INSERT INTO `shop_arc` VALUES ('3', '自动洗澡机？能让懒人幸福到死的高科技产物！', '2', '1471532713', '1471590153', 'Upload/71851471532713_thumb.png', '人都有犯懒的时候，这种时刻在早上显的尤为明显。其实这也不是个坏事，就是因为追求更多的方便和舒适，今天的技术才会这么的进步的发达。', '易迅', '0', '1', '1');
INSERT INTO `shop_arc` VALUES ('4', '价值8000元的顶级显卡，买不起就看看吧！', '0', '1471533419', '1471534821', 'Upload/35621471533419_thumb.jpg', '经历了GTX1080、GTX1070和GTX1060等多款10代最新显卡的发布，许多发烧级的玩家一定在期盼，真正的旗舰级显卡Titan系列什么发新卡。', '易迅', '0', '1', '1');
INSERT INTO `shop_arc` VALUES ('5', '【你薛】他是唱歌里最逗的，逗比里最会穿衣的', '0', '1471533586', '1471590128', 'Upload/56331471533586_thumb.png', '“北有大张伟，南有薛之谦，不用窜天猴，他俩能上天”，段子手薛之谦终于火了，微博，视频各大综艺真人秀，都能看到他的身影。', '京东社区', '0', '1', '3');
INSERT INTO `shop_arc` VALUES ('6', '摩托罗拉首款可以定制功能模块的手机', '0', '1471533950', '1471534869', 'Upload/57681471533950_thumb.jpg', '在今年6月的TechWorld大会上，摩托罗拉发布了旗舰手机Moto Z和Moto Z Force，预计将在9月份进入国内。', '易迅', '0', '1', '1');
INSERT INTO `shop_arc` VALUES ('7', '国画界的秘籍', '0', '1471534110', '1471590145', 'Upload/21631471534110_thumb.jpg', '以《兰谱》为例，追本溯源，由起笔式说起，经双勾叶式到撇叶倒垂式，推展到花式、点式，涵盖兰花的各种形态、囊括国画所有技法，配合通俗易懂的解说供读者组合临摹，真有听君一席话胜读十年书的感觉。', '布莱尼奥', '0', '1', '3');
INSERT INTO `shop_arc` VALUES ('8', '亲爱的，你为啥要和坏情绪躲猫猫呢', '1', '1471534741', '1471534741', 'Upload/23521471534741_thumb.jpg', '逃避毕竟不是办法', '布莱尼奥', '0', '1', '1');
INSERT INTO `shop_arc` VALUES ('9', '痴狂爱 痛苦受', '0', '1471535005', '1471535005', 'Upload/19431471535005_thumb.jpg', '“我不是不想要孩子，我只是不想要孩子的妈妈是你！”', '布莱尼奥', '0', '1', '1');
INSERT INTO `shop_arc` VALUES ('10', '寻觅•美', '0', '1471535151', '1471590170', 'Upload/10821471535151_thumb.jpg', '其实，生活本已苦痛，何必总是纠结于各种负面情绪当中。', '布莱尼奥', '0', '1', '3');
INSERT INTO `shop_arc` VALUES ('11', '专注之美，意味隽永', '0', '1471535309', '1471535309', 'Upload/68441471535309_thumb.jpg', '三姐妹全部毁容，可谓在众多的穿越小说里，这是一条逆旅', '布莱尼奥 ', '0', '1', '1');
INSERT INTO `shop_arc` VALUES ('12', '生活大爆炸之“没螨”生活', '1', '1471535608', '1471590194', 'Upload/63741471535608_thumb.jpg', '经历过了一个多月的霉雨天气，遇到这种天气想要晒嗮太阳除螨无异于天方夜谭，其实不用担心，没有太阳我们还有除螨仪，还有出色的床织品。', '简单生活', '0', '1', '3');
INSERT INTO `shop_arc` VALUES ('13', '迪兰RX 480 8G游戏显卡体验', '12', '1471535837', '1471535837', 'Upload/29961471535837_thumb.jpg', '针对更好游戏体验的迪兰 RX 480 8G大显存游戏显卡，带来更优秀的游戏体验，AMD的北极星架构原生支持DX12，体验真DX12游戏；并且完美支持时下大热的VR游戏，用A卡，战未来！', '易迅', '0', '1', '1');
INSERT INTO `shop_arc` VALUES ('14', '能拍出单反画质的无人机！', '30', '1471536075', '1471536075', 'Upload/331471536075_thumb.jpg', '以前我们拍照片都是用胶卷，然后冲洗出来，现在的我们能够拥有一台数码相机去拍照再也不会成为一件难事，而作为喜欢摄影的爱好者来说最大的愿望就是买一台专业单反相机.', '快报君', '0', '1', '1');

-- ----------------------------
-- Table structure for `shop_arc_cate`
-- ----------------------------
DROP TABLE IF EXISTS `shop_arc_cate`;
CREATE TABLE `shop_arc_cate` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` char(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_arc_cate
-- ----------------------------
INSERT INTO `shop_arc_cate` VALUES ('1', '热门');
INSERT INTO `shop_arc_cate` VALUES ('2', '特惠');
INSERT INTO `shop_arc_cate` VALUES ('3', '公告');

-- ----------------------------
-- Table structure for `shop_arc_data`
-- ----------------------------
DROP TABLE IF EXISTS `shop_arc_data`;
CREATE TABLE `shop_arc_data` (
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字seo',
  `des` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字seo',
  `content` text NOT NULL COMMENT '文章内容',
  `shop_arc_wid` int(10) unsigned NOT NULL,
  KEY `fk_shop_arc_data_shop_arc1_idx` (`shop_arc_wid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章内容';

-- ----------------------------
-- Records of shop_arc_data
-- ----------------------------
INSERT INTO `shop_arc_data` VALUES ('好用好喝又好吃——测评高博破壁料理机', '好用好喝又好吃——测评高博破壁料理机', '<p><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471529962131698.jpg\" alt=\"1471529962131698.jpg\"/><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">哈喽，大家好，今天我们为大家评测的是一款由我们中国工厂生产，但是质量完全不输于德国品质的料理破壁机。在评测之前，我们先为大家科普一下破壁机的几个特点。</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">其实，破壁机之所以称之为[破壁]， 就是因为他可以通过每分钟40000转以上的转速，瞬间击破水果蔬菜的细胞壁，释放果蔬的营养萃取蔬果生化素，让我们获得口感细腻、营养丰富的果蔬汁以及豆浆等。它比一般通过离心力用电机带动旋刀的榨汁机有着更高的榨汁效率（85%左右，而普通榨汁机的出汁率只有50%）。其实小编一直也想自己入一款能打汁做米糊豆浆的机器，感受一把做厨房达人的感觉，正好要测评破壁机，就去做了做功课，发现破壁机这么火确实是有其原因的，跟料理机比这款破壁机打食材更细腻更易碎也更迅速，跟原汁机比这款破壁机保留了更多的膳食纤维和营养，跟料理机和原汁机比，这款破壁机还兼具煮熟加热的功能，生豆不用泡直接出来的就是浓浓的豆浆和香香的米糊，更别说它还能用来炖鱼炖肉的神奇功能了，摩拳擦掌就等实物到了！</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">今天要测评的就是这个咯</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">周一刚上班，就接到顺丰小哥的电话，说有我的快递，小哥专门送到办公室啦，特地表白一下顺丰小哥的优质服务，当然也要感谢商家给我选择了顺丰这个靠谱的快递啦！</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">刚拿到快递的时候</p><p><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471529962579336.jpg\" style=\"\"/></p><p><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471529962139272.jpg\" style=\"\"/></p><p><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471529962124839.jpg\" style=\"\"/></p><p><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471529962178366.jpg\" alt=\"1471529962178366.jpg\"/></p><p><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">全部拿出来，有一个机身底座，一个搅拌杯，一个盖子，一个量杯，还有一个小刷子用来刷比较不容易清洗的地方，还有一个刷碗的海绵，一个说明书，一个菜谱，搅拌杯里还有一个笼屉，可以一边煮米糊豆浆一边热馒头呢！所有的东西都用有塑料软袋装着防止划伤。</span><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471529962352430.jpg\" alt=\"1471529962352430.jpg\"/><br/></p><p><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">按键面板上有四个按键分别是豆浆、米糊、玉米汁和启动/停止，旋钮搅拌也有五个档位，0档、1档、2档、3档和4档，打果蔬汁还是比较容易的，所以我直接用旋钮扭到了3档，因为还有点番茄在里面所以只加了少量的牛奶一起搅拌，刚开始盖上盖子打果汁的时候机器怎么也不动心里还在想咦难道是坏的吗- -后来看了眼说明说原来是我盖子的卡扣没卡牢固，杯盖上有个闭锁装置，要把开锁标志和手把上丝印的三角形对准完全扣好才行，很为安全考虑的设计呢，不过朋友们记得认真读说明书，不要像我一样太着急喝好喝的不认真看说明书。</span><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471529962614622.jpg\" alt=\"1471529962614622.jpg\"/></p><p><br/></p>', '1');
INSERT INTO `shop_arc_data` VALUES ('有些东西不能省 超龄家电该换必须换！', '有些东西不能省 超龄家电该换必须换！', '<p><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471532137114473.jpg\" style=\"\"/></p><p><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">物品都有使用期限，超期使用将带来各种副作用，家电亦是如此。在我们身边，不少消费者都抱着勤俭节约的消费观念，不坏不更换，使得很多老电器仍在超龄服役。</span></p><p><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471532137133811.jpg\" style=\"\"/></p><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\">如今的家电产品更新换代十分迅速，新品和节能产品琳琅满目，但为何许多市民不愿意更换新产品呢？总结有以下三点重要原因：</p><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\">1.国内无强制性报废标准；</p><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\">2.厂家尚未标注家电使用年限；</p><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\">3.消费者对超龄、大龄家电的危害不够明确；</p><h2 style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 18px; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\">家电使用“寿命”标准</h2><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\">尽管早在2008年5月，我国就颁布实施《家用和类似用途电器的安全使用年限和再生利用通则》，但《通则》中并没有明确各类家电产品的“保质期”为多少年。不过，好在有国际通行年限，下表罗列了一些常见电器的使用年限：</p><p><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471532137250660.jpg\" style=\"\"/></p><h2 style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 18px; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\">超龄家电暗藏隐患</h2><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\">对于那些高频率使用的电器，如空调、洗衣机、冰箱等，除了噪声问题，还容易产生功能性缺陷，超龄服役的洗衣机内筒清洁程度更是难以让人放心使用，各种常年积累下来的污垢、内筒里存活的细菌，都会让洗衣机变成彻底的“脏衣机”。而且在使用过程中除了要用电，还要用水，危险系数相对较高。洗衣机的核心部件就是电机，超龄使用的洗衣机<strong style=\"margin: 0px; padding: 0px;\">存在漏电、漏水的风险</strong>。</p><p><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471532137272219.jpg\" style=\"\"/></p><p><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">冰箱是所有家电中开机时间最长的产品。若超龄服役，电冰箱压缩机性能将严重下降，整体制冷能力大幅下滑，压缩机需要更长时间工作才能满足设定的温度。同时，老冰箱内部卫生状况也难以达标，材质老化后容易滋生细菌，</span><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: rgb(43, 43, 43);\">还<strong style=\"margin: 0px; padding: 0px;\">易引起氟利昂泄露</strong></span><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">，对使用者的健康造成威胁。</span></p><p><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471532137585404.png\" style=\"\"/></p><p><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">电视机是家庭普及率很高的电器，而电视机自燃、爆炸等事故也屡见不鲜。</span><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: rgb(43, 43, 43);\">显像管电视机老化后受到碰撞、骤冷、骤热以及电视机内尘埃污垢过多或电线短路造成局部过热，都能引起显像管爆炸</span><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">，特别是那些使用时间超长而又得不到维护的电视机极</span><strong style=\"margin: 0px; padding: 0px; color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">易发生自燃或爆炸等事故</strong><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">。</span></p><p><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471532137622669.png\" style=\"\"/></p><p><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\"><br/></span></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p><p><br/></p>', '2');
INSERT INTO `shop_arc_data` VALUES ('自动洗澡机？能让懒人幸福到死的高科技产物！', '自动洗澡机？能让懒人幸福到死的高科技产物！', '<p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471532429113001.png\" alt=\"1471532429113001.png\"/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">人都有犯懒的时候，这种时刻在早上显的尤为明显。其实这也不是个坏事，就是因为追求更多的方便和舒适，今天的技术才会这么的进步的发达。今天我们就来给大家介绍几种让懒人惊叫的东西，这些一定让你的脑洞大开。</span></p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471532429234394.png\" alt=\"1471532429234394.png\"/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">有人觉得站着洗澡真心累，除了要动手涂沐浴露，还要搓。今天要说的这个产品就是日本人专为这类懒人设计的自动洗澡机。蛮方便的，进去只要躺着或者是睡一觉，澡就洗好了。这真是比做皇帝都舒服。</span></p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471532429140524.png\" alt=\"1471532429140524.png\"/></p><p class=\"post_img\" style=\"margin: 0px 0px 15px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(51, 51, 51);\">空间还是蛮大的，可以容纳一个人进行洗澡。</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(51, 51, 51);\">它会自动洗澡机会给用户涂沐浴露、擦拭身体并冲洗身体，洗完澡后还会给涂身体乳。而且它还能进行汗蒸、芳香Spa和音乐Spa。</span><br/></p><p class=\"post_img\" style=\"margin: 0px 0px 15px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(51, 51, 51);\">想想都是很美的事情，尤其是对于那些懒人和胖人们来说这就是幸福的发明。</span></p><p class=\"post_img\" style=\"margin: 0px 0px 15px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(51, 51, 51);\"><strong style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 22.5px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">自动系带鞋</strong></strong></span></p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471532429728528.png\" alt=\"1471532429728528.png\"/></p><p class=\"post_img\" style=\"margin: 0px 0px 15px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51);\">穿上该款鞋，踏上安置在鞋内的传感器，鞋底的小电机就会产生作用，束紧鞋带。脱鞋时，将两只鞋跟轻碰两次，触及鞋跟部位的“多萝西”传感器，鞋舌处就会释放弹簧以松开鞋带，使你脱下鞋子。该款自动系带鞋则更显“高大上”的一点是，走路即可产生能量，无需充电。鞋内安置有能量收集系统，可以把穿用者运动的能量转化为电力。</span><span style=\"margin: 0px; padding: 0px; line-height: 1.5; color: rgb(51, 51, 51);\"></span><br/></p><p class=\"post_img\" style=\"margin: 0px 0px 15px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51);\">听起来是不是很棒，没错。以后你连腰都不用弯了。以后跟朋友们吹牛的时候就说自己懒的连腰都不弯了。</span></p><p class=\"post_img\" style=\"margin: 0px 0px 15px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51);\"><strong style=\"margin: 0px; padding: 0px;\">躺着阅读神器</strong></span></p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471532429942396.png\" style=\"\"/></p><p class=\"post_img\" style=\"margin: 0px 0px 15px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51);\">这个眼镜可谓是为懒惰纠结人专门打造的。想懒又想看电视，真是无语了。不过现在这个工具帮你二者兼得之。它将三棱镜的一面进行特殊的真空蒸镀处理，通过光线折射原理使物体清晰地映入使用者眼中。有了它，你就可以躺着看书或看电视啦！</span></p><p class=\"post_img\" style=\"margin: 0px 0px 15px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51);\">近视的朋友们也不用担心啦，跟你平时带眼镜是一样的，把这个套在外面就好了。</span></p><p class=\"post_img\" style=\"margin: 0px 0px 15px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); line-height: 1.5;\"><span style=\"margin: 0px; padding: 0px; color: rgb(33, 33, 33);\">声音枕头</span></strong></p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471532429692768.png\" style=\"\"/></p><p><br/></p>', '3');
INSERT INTO `shop_arc_data` VALUES ('价值8000元的顶级显卡，买不起就看看吧！', '价值8000元的顶级显卡，买不起就看看吧！', '<p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533135992528.jpg\" alt=\"1471533135992528.jpg\"/></p><p><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">经历了GTX1080、GTX1070和GTX1060等多款10代最新显卡的发布，许多发烧级的玩家一定在期盼，真正的旗舰级显卡Titan系列什么发新卡。</span></p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533135228541.jpg\" alt=\"1471533135228541.jpg\"/></p><p><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">而Nvidia也不负众望，终于在昨天正式公布了旗下最新旗舰显卡“Titan X”</span></p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533135992528.jpg\" alt=\"1471533135992528.jpg\"/></p><p><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">最新的泰坦X显卡采用的是全新的16nm FinFET工艺帕斯卡架构核心GP102，</span><span style=\"margin: 0px; padding: 0px; color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; line-height: 1.5;\">晶体管数量从80亿个增至120亿个，集成3584个流处理器、224个纹理单元、96个ROP单元，核心基础频率1417MHz、加速频率1531MHz，FP32单精度浮点性能高达10.97TFlops，比上代增加了多达64％！</span><br/></p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533135565308.jpg\" alt=\"1471533135565308.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533135681408.jpg\" alt=\"1471533135681408.jpg\"/></p><p><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">显存仍是384-bit位宽、12GB容量，不过颗粒更新为GDDR5X，等效频率高达10GHz，因此拥有480GB/s的超大带宽，设计功耗仍然保持在250W，8+6针辅助供电。</span></p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533135434836.jpg\" alt=\"1471533135434836.jpg\"/></p><p class=\"p_img\" style=\"margin: 0px 0px 15px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\">不过价格方面也提升非常多，售价1200美元，比上一代贵了整整200美元。</p><p class=\"p_img\" style=\"margin: 0px 0px 15px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\"><br/></p><p class=\"p_img\" style=\"margin: 0px 0px 15px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\">值得一提的是，最新款的泰坦X显卡，虽然在设备型号上取消了GTX以及GeForce的字样，但在信仰灯上依旧保留了这两个经典标识。</p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533135102135.jpg\" alt=\"1471533135102135.jpg\"/></p>', '4');
INSERT INTO `shop_arc_data` VALUES ('【你薛】他是唱歌里最逗的，逗比里最会穿衣的', '【你薛】他是唱歌里最逗的，逗比里最会穿衣的', '<p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533528122937.png\" style=\"\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">来自京东达人精选栏目 - EHE</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“北有大张伟，南有薛之谦，不用窜天猴，他俩能上天”，段子手薛之谦终于火了，微博，视频各大综艺真人秀，都能看到他的身影。其实除了他的情歌，段子和火锅，薛之谦这几年的衣品也随着歌曲传唱度的提高逐渐高升起来。</p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533528119340.png\" style=\"\"/></p><p><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">比起他资深的“段子手＋冷笑话王＋中二晚期患者”的性格，他在服装上却低调了许多，翻看他微博不难发现，他的大多数服装都是暗色系，而黑色更是作为主打。</span></p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533528112635.png\" style=\"\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">薛之谦对于通身黑色的把控还是很到位的，让别人看不腻并且逼格还很高是一件很难的事情，对于同色系衣服的穿搭，在款式的选择上就需要多下些功夫才行，这样才会看起来不单调还很有自己的味道。</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">EHE单品推荐：</p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533528103538.jpg\" style=\"\"/></p><p><br/></p>', '5');
INSERT INTO `shop_arc_data` VALUES ('摩托罗拉首款可以定制功能模块的手机', '摩托罗拉首款可以定制功能模块的手机', '<p style=\"text-align:center\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471533745103594.jpg\"/></p><p><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">在今年6月的TechWorld大会上，摩托罗拉发布了旗舰手机Moto Z和Moto Z Force，预计将在9月份进入国内，售价方面据说低于3000元，最大卖点就是其模块化设计，你可以在其背后装上各种模块来扩展手机功能，目前美国运营商Verizon在前期享有独家销售权。</span></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533744704946.jpg\"/></p><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\">Moto Z的厚度仅有5.19mm，重量136g，搭载了最新的高通骁龙820处理器，配备有4GB RAM和32GB/64GB内建存储（支持最高2TB记忆卡扩展），5.5寸的屏幕分辨率达到2560×1440，主摄像头为1300万像素（像素尺寸1.12μm），电池容量2600mAh，由于机身过于轻薄，取消了3.5mm耳机插孔，只留下USB Type-C供用户使用。</p><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; font-size: 15px; word-break: normal; word-wrap: break-word; color: rgb(76, 76, 76); line-height: 26px; background-color: rgb(255, 255, 255);\">Moto Z Force可以看作是Z的屏幕、电量、相机升级版，具体规格不再赘述，请看下面规格表。</p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533744433545.jpg\"/></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533744133092.jpg\"/></p><p><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">▼两款Moto Z的屏幕尺寸为5.5英寸，分辨率2560×1440，使用</span><span style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: rgb(68, 68, 68);\">AMOLED</span><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">面板，相比常见的IPS面板显示效果更鲜艳，色调更暖一些，相对来说也更为省电，缺点在于亮度较低，日光下阅读效果差强人意。</span></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533744892866.jpg\"/></p><p><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">▼Moto Z和Moto Z Force的前摄像头规格一致：500万像素OmniVision OV5693光线传感器，单个像素尺寸1.4µm，传感器面积1/4寸，等效23mm焦距，最大光圈f/2.2。</span></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533744433545.jpg\"/></p><p><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">▼屏幕下方看起来是Home键的方形按钮，其实是指纹传感器，这个小方块没有Home键的作用，真正的安卓三大按键依然在屏幕中。</span></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533744370933.jpg\"/></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533744103788.jpg\"/></p><p><span style=\"color: rgb(76, 76, 76); font-family: 微软雅黑; font-size: 15px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 26px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">▼两者主摄像头差异较大，Moto Z为采用Sony IMX214方案的1300万像素光感器，面积1/3.06寸，等效焦距27mm；Moto Z Force为采用Sony IMX338方案的2100万像素光感器，面积1/2.4寸，等效焦距26mm。两者均为单个像素面积1.12µm，光圈f/1.8，支持光学防抖。</span></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471533745427692.jpg\"/></p><p><br/></p>', '6');
INSERT INTO `shop_arc_data` VALUES ('国画界的秘籍', '国画界的秘籍', '<p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471534041939254.jpg\" alt=\"1471534041939254.jpg\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">文/凡悦颜</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">看惯了武侠，则深知作为练武之人得到一本武功秘籍的妙用。而《芥子园画传》则从古至今，一直被奉为初学国画的必备经典，是当之无愧的国画界秘籍。<br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">这次江苏凤凰美术出版社推出的《芥子园画传》以全新的面貌展现在我们面前，是很多已学国画者最好的青春纪念，是将学国画者最好的帮手。<br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">自古有言，师傅领进门，修行在个人。这套书称得上一个合格的老师，全书系统且全面的揭示学习国画的要诀，通过具体示范引领读者逐步掌握用笔、造型和构图的精髓，期间穿插必要解释和说明，让读者在学习过程中知其然也知其所以然。全书分为山水、兰竹梅菊、花卉翎毛和人物四集，每集上下两册，采用锁线露背装订、封面简洁素雅、单色纯毛笔绘图，十六开本上整页的大图还可以自由铺展开来，临摹起来体验非常棒。</p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471534068224841.jpg\" alt=\"1471534068224841.jpg\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><br class=\"Apple-interchange-newline\"/>芥子园画传的历史可以追溯到康熙年间，当时“芥子园”只是名士李渔的私人住宅，其女婿与画家王概增补编写的《课徒山水画稿》是本套书山水的原型，因李渔的赏识、作序后协助刊行而得名，后来王概与其兄弟编辑了二、三集，但第四集则是书商们拼凑的结果。辗转至光绪年间才由画家巢勋得以完善印行，他临摹了前三集，并重新编辑了第四集。这四集八册也主要是依据巢勋的成果，结合以前各出版社的石印本修复整理而来。每集穿插了名人序跋和青在堂浅说引导读者系统了解，后面的“模仿各家画谱”供读者赏阅，中间内容是各项拆分的基本画功，以《兰谱》为例，追本溯源，由起笔式说起，经双勾叶式到撇叶倒垂式，推展到花式、点式，涵盖兰花的各种形态、囊括国画所有技法，配合通俗易懂的解说供读者组合临摹，真有听君一席话胜读十年书的感觉。</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">值得一提的是第四集的写真秘诀，可以让学人物画的读者大饱眼福，与第一集山水篇中点景人物相辅相成，读者可以轻松谙透其精髓。这与我们学习素描也有异曲同工之处。阅读此书，直叫相见恨晚，也切实感叹学习国画的路上任重而道远，任何一项技能的学习过程都是台上一分钟，台下十年功，要想人前一亮，必须人后“受罪”,好好抱着此书，潜心修炼秘籍吧。</p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471534099491250.jpg\" alt=\"1471534099491250.jpg\"/></p>', '7');
INSERT INTO `shop_arc_data` VALUES ('亲爱的，你为啥要和坏情绪躲猫猫呢', '亲爱的，你为啥要和坏情绪躲猫猫呢', '<p style=\"text-align: center;\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471534661890499.jpg\" style=\"\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">文/看书起舞</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">日常生活中，我们经常听人这样安慰人说：“逃避毕竟不是办法”。那么，对于一些伤心的事情，一些坏情绪，到底该如何去面对呢？又该如何去克服呢？《亲爱的，你为啥要和坏情绪躲猫猫呢》这本书则能给我们提供理想的答案。</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">这本书的作者迪娜•吉尔伯特森是美国知名心理治疗师、作家，其在非传统情绪咨询方法在美国备受推崇，也让众多的坏情绪困扰者受益。</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">对于坏情绪，我们首先想到的是回避，是绕行，但是当我们意识到那只是掩耳盗铃的时候，我们就应该采用作者提出的“富于建设性的沉迷”了。</p><p style=\"text-align: center;\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471534662134689.jpg\" style=\"\"/></p><p><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">到底该如何操作，作者提出了非常实用而专业的方法。首先要“握手坏情绪”，它不是怪兽不需要躲着它，通过适当的方式还能得到较好的释放。当然这个并不是目的，最终的目的还是要实现自我的更新，找回自己的正能量。为此，作者还提出了若干操作方式和技巧。读完本书，你会发现，我们将不会再无故的害怕“坏情绪”。</span></p><p style=\"text-align: right;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471534662400798.jpg\" style=\"\"/></p><p><br/></p><p><br/></p><p><br/></p>', '8');
INSERT INTO `shop_arc_data` VALUES ('痴狂爱 痛苦受', '痴狂爱 痛苦受', '<p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471534963567890.jpg\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">文/清扬鱼儿</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“我不是不想要孩子，我只是不想要孩子的妈妈是你！”多么残忍的真相，而苏南溪还不知道。她依然坚持着不离婚，即便关系进入了冰角，也不肯离婚……<br/><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">我不知道这样的一个故事结局对于一个被抛弃却恰被生父收养的女孩，该如何面对亲情缺失的童年、中年的爱情冰窖……</p><p style=\"text-align:center\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471534963102419.jpg\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">似乎现在的言情故事开始习惯以悲剧结束，而不喜以喜剧收尾了！苏南溪不顾一切的追求陆春晓、死活不离婚，不是对爱情的执着，是对自己记忆中曾有温暖的牵挂、呵护，是不想忘记自己生命中曾有过的温暖！如果失去陆春晓，她的生命似乎就没有了温度！<br/>所以，连死都不怕的她，怎么会怕婚姻的冰窖呢。至少她还有一个孩子，虽然这个孩子只有她去爱，但那也足够了，没有什么能够打消掉一个爱的痴狂的女人的选择！怕只怕，你爱，他不爱；怕只怕，你没忘记，他忘记了！<br/><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">《有风轻相送》属于都市爱情故事，感情的纠葛、友情的浓缩，在沐耳的笔下变得细腻起来、生动起来！</p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471534963146781.jpg\"/></p><p><br/></p>', '9');
INSERT INTO `shop_arc_data` VALUES ('寻觅•美', '寻觅•美', '<p style=\"text-align:center\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471535094124521.jpg\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“世事洞明皆学问，人情练达皆文章”，有着丰富阅历和丰厚沉淀的人，会以自己的人生经验给我们以指导，让我们从中获益。</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">《藏在这世间的美好》的作者很年轻，最初我很意外，小鲜肉们没有经过太多生活历练和生活沉淀，也会写心灵鸡汤类的励志文？他们能够为我们铺陈出五光十色的大千世界？他们的生活经验具有普遍性意义吗？带着困惑与好奇，细细浏览此书。 实事求是讲，里面有些小观点还是带着个人感情色彩的，不够中立与客观，个人不敢完全苟同，也许就像作者自己所说，性格使然。但是，这并不影响此书的宗旨：珍惜当下的美好，把一些负能量从生活中剔除，让自己相信生活、相信自己，积极向上，发现藏在世间的美好。作者是一个热爱生活、善于发现的人。一个小故事一个小哲理，或者是一段心灵鸡汤，辅之以生活故事。简简单单，让我们的心不再纠结于各种“纠结”，而充满了满满的正能量。</p><p style=\"text-align:center\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471535094102652.jpg\"/></p><p><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">其实，生活本已苦痛，何必总是纠结于各种负面情绪当中。现在的人们，经常吐槽：这也不对，那也不公。或许，这与媒体的过度消费社会阴暗面，大有关系？但是，当我们发布这些负能量的消息时，不仅给别人带来了困扰，也让自己压抑。那么，何不像鼹鼠的土豆学习，来发现生活中的美好呢？相信美好，终会遇见！</span></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535094228799.jpg\"/></p><p><br/></p><p><br/></p>', '10');
INSERT INTO `shop_arc_data` VALUES ('三姐妹全部毁容，可谓在众多的穿越小说里，这是一条逆旅', '三姐妹全部毁容，可谓在众多的穿越小说里，这是一条逆旅', '<p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535229739759.jpg\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">文/沈黎昕</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“错嫁良缘”第一部《洗冤录》写的是青家三姐妹中大姐的故事。据我了解到的来说，《寻秦记》之后，穿越小说大行其道，各种穿越方式争相出现，以至于泛滥不止，终落个框架老套。这部《洗冤录》比较新颖，女主人公带着法医的专业知识与应用水平穿越过去，与没有技术的现代女性单纯地靠呆萌、傻白玩转后宫不同。</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">其实这类路数也比较匪夷所思，主要是找不到她玩转的原因，从情理上完全说不通。另外，即一群皇子加皇帝，偶尔还加上一品子孙，都对穿越女宠爱万般，这类情节归纳起来总感觉就是写了一个内容，在现代收集不了所有的高富帅，跑到古代去填补妄想。从作者到读者对这种情节的钟情，我主要理解为少女不切实际的幻想，可是少女时期的期待大多都很钟情，与异性交友的渴望与这种类似于男子期待三宫六院皇帝生活还是不同。网络小说中男性作者释放出的是一种征服女性与权力的快感，而女性作者通常是对爱情的期待，尽管她机械性地设计出了许多高富帅形象作为幻想的对象。</p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535229619700.jpg\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">浅绿的这部小说跳出了这惯有的模式，首先从穿越初始来看，比较情色类穿越、异化类穿越，这部《洗冤录》的穿越方式并不张扬，相反作者的设计内敛含蓄。除此，即便是第三部《后宫疑云》专门写宫斗情节，也没有出现一女N男的模式，这是很难能可贵的。而且不仅如此，三姐妹全部毁容，可谓在众多的穿越小说里，这是一条逆旅。</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">这部穿越小说的第一主人公冷静成熟、聪颖稳重的形象，把潜在读者引像一个更为真实而新奇的世界。原本与两个妹妹一起是送到穹岳国的礼物，二妹青枫送往丞相府，她则是被皇帝燕弘添看中的女人，可二人被弄错，就此，她与丞相楼夕颜结缘。这种穿越千年的爱恋就像她同楼夕颜说出真相后感叹的那样，穿越时空的情缘，缘分岂止是匪浅。</p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535229136088.jpg\"/></p><p><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">《洗冤录》重在洗去他人冤屈，女主人公卓晴的冷静与才华在破案的过程中逐渐展露出来，不同于对用浪漫主义直抒胸臆的手法去写女性的外貌之美，这里还传达出女性专注于美好事业之美，她从属于内在的职业素养，这是对人格的塑造。浅绿塑造了立体的、可令读者感受到的有血有肉的女性形象，她不再是网络作者惯有的那种思维模式，倾向于直接去用单纯的外在去吸引异性以及推进情节的走向，在这部作品中能够感受到浅绿精心的安排与铺垫。</span></p><p style=\"text-align: center;\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471535229322695.jpg\"/></p>', '11');
INSERT INTO `shop_arc_data` VALUES ('生活大爆炸之“没螨”生活', '生活大爆炸之“没螨”生活', '<p style=\"text-align:center\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471535408130747.jpg\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">潮湿霉雨的天气，家里的床褥被单是很容易滋生细菌和螨虫的，这些肉眼看不见的生物很容易引起人体皮肤过敏以及呼吸道疾病。以往“杀菌”的方法就是把床褥被单拿去太阳底下晒晒，这在理论上是比较有效的除螨杀菌方法，不过实际操作却受到很多因素的影响。</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">这个暑假可谓是阴雨绵绵，小编就这样经历过了一个多月的霉雨天气，遇到这种天气想要晒嗮太阳除螨无异于天方夜谭，其实不用担心，没有太阳我们还有除螨仪。今天小编为大家介绍的是一个非常不错的品牌--宝家丽除螨仪。</p><p><br/></p><p style=\"text-align:center\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471535408404068.jpg\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">△家用除螨仪</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">这款宝家丽家用除螨仪有着独特的尘盒UV二次杀，可以杀死被吸进尘盒的螨虫；聚能罩技术，强效聚合紫外线反射，提高光照强度，更快杀死螨虫；高频仿生拍打，震动不断轴，热出风除湿，吸力更强大，在没有阳光的日子里，有了它就不用担心螨虫陪你睡了。</p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535408288743.jpg\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">△<span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: arial, &quot;microsoft yahei&quot;; line-height: 1.5em; background-color: rgb(255, 255, 255);\">SV003 流星锤</span><span style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); line-height: 1.5em;\">除螨仪</span></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">而这款宝家丽除螨仪通过核心技术满足各种除螨抑菌的需求，除螨率高达99％，除螨的同时也能热敷除湿，55度高温热敷，加上双出口热风技术，干爽杜绝螨虫滋生；高温和UV紫外线杀菌，强力除螨，重力感应瞬灭技术进行安全防护，床宝T1，不需要阳光就可以深度杀菌除螨，让你的颜值与自信不受侵袭。</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">忍受着高温和潮湿带来的烦恼，这个季节应有的标准“配件”空调、西瓜、冰激凌等自然也少不了，很不幸的是除了这些配件，夏天里螨虫也开始横行。夏季是螨虫滋生的旺季，皮肤上如果生存的螨虫过多，可能会长包包，或者引起其它不适。</p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">人们总是潜意识的相信“阳光”是万能的，面对床褥上的细菌、螨虫，人们最简单的方法就是拿到阳光底下晾晒，并适当的拍打。但光照的范围很难达到全面覆盖在被子上，而螨虫也绝对不会“坐以待毙”，所以要想彻底清除螨虫是一件费时费力的事情，虽然目前具备清洁功能的小家电很多，但是都置备全也浪费空间以及金钱，所以小编给大家推荐的是吸尘器，完全可以胜任许多家庭中日常的清洁工作。</p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535408857709.jpg\"/></p><p><br/></p>', '12');
INSERT INTO `shop_arc_data` VALUES ('迪兰RX 480 8G游戏显卡体验', '迪兰RX 480 8G游戏显卡体验', '<p style=\"text-align:center\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471535758103250.jpg\"/></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535758481224.jpg\"/></p><p style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">Steam 游戏大势来袭，大部分游戏都可以在正版游戏平台上以特别优惠的价格买到，一方面支持正版也是对游戏公司的支持，另一方面能完整体验到正版游戏的所有功能及 线上游戏世界，面对玲琅满目的游戏大作，你的电脑硬件是否支撑的起现在的3A大作呢？针对更好游戏体验的迪兰 RX 480 8G大显存游戏显卡，带来更优秀的游戏体验，AMD的北极星架构原生支持DX12，体验真DX12游戏；并且完美支持时下大热的VR游戏，用A卡，战未 来！<br/></p><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: rgb(76, 76, 76); background-color: rgb(255, 255, 255);\"><span style=\"margin: 0px; padding: 0px; color: rgb(255, 0, 0);\"><strong style=\"margin: 0px; padding: 0px;\">试用产品：</strong></span><span style=\"margin: 0px; padding: 0px; color: rgb(255, 0, 0);\"><strong style=\"margin: 0px; padding: 0px;\">迪兰 RX 480 8GX-Serial 游戏显卡</strong></span></p><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: rgb(76, 76, 76); background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: rgb(255, 0, 0);\">使用场景：电竞、游戏主机、家庭游戏，家用电脑、专业图形设计</span></strong></p><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: rgb(76, 76, 76); background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: rgb(255, 0, 0);\">产品特点：<strong style=\"margin: 0px; padding: 0px; color: rgb(76, 76, 76);\"></strong>三风扇散热静音双掌控、AMD北极星架构高性能、支持VR游戏、完美运行游戏大作。</span></strong></p><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: rgb(76, 76, 76); background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: rgb(255, 0, 0);\">众测数量：5个</span></strong></p><p style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; color: rgb(76, 76, 76); background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\"><span style=\"margin: 0px; padding: 0px; color: rgb(255, 0, 0);\">产品详情：</span></strong></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535759923074.jpg\"/></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535759785114.jpg\"/></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535759347653.jpg\"/></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535759303201.jpg\"/></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535759137099.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535759118733.jpg\"/></p>', '13');
INSERT INTO `shop_arc_data` VALUES ('能拍出单反画质的无人机！', '能拍出单反画质的无人机！', '<p style=\"text-align:center\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471535942107575.jpg\"/></p><p><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">京东众筹又上线了什么新的项目呢?有哪些好玩，好看，好吃，好用的东西呢?随小编一起来看看吧!</span></p><p><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\"></span></p><p style=\"text-align:center\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471535942206595.jpg\"/></p><p><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">以前我们拍照片都是用胶卷，然后冲洗出来，现在的我们能够拥有一台数码相机去拍照再也不会成为一件难事，而作为喜欢摄影的爱好者来说最大的愿望就是买一台专业单反相机，不过今天小编不是来推荐单反相机的，而是介绍一款有着单反画质的航拍无人机。</span><br style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><br style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">它拥有1600万像素相机以及超广角镜头，让全世界清晰在你眼前，无人机还可以录制高清视频，并可以在手机上实时预览，尖端的3轴防抖技术保证清晰图像和视频，强大的视觉定位系统和GPS定位保证在室内室外都可以操作，而GPS功能还保障了无人机一键返航准确回家，跟随功能让你解放双手，让你捕捉到从未有过的瞬间，众筹价格1499元。传送</span></p><p><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\"></span><br/></p><p style=\"text-align:center\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471535942286290.jpg\"/></p><p><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">我们常背负着工作生活里的各种压力，迷茫在城市的海市蜃楼里，灰头土脸的生活，逐渐变成千篇一律的机器。而音乐，却能让我们恢复往日的鲜活。但是选择什么耳机来听我们喜爱的音乐?也许DIVA智能耳机是最好的选择。</span><br style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><br style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">还是去年那个汪峰，还是去年那个fiil。在昨天，这一品牌的第二代产品——FIIL Diva正式推出。比起一代，驱动性更好，设计更精致，配戴更舒适，连接更智能!摆脱传统定义耳机，适应每一个细微的听音场景，满足每个久未被满足的需求，将工程科学与艺术直觉碰撞，以大众能接受的方式普及小众般的格调和更专业的听音感受。耳机续航能力也得到增强，可以达到48天待机以及33小时播放，一般来说，频繁使用一周一充基本没什么问题。内置专业级Hi-Fi播放器媲美发烧播放设备，4G存储空间，支持12种音乐格式(包括FLAC/APE/WAV等)。请相信FIIL Dvia流行，但并不流俗。众筹价799元。传送</span></p><p style=\"text-align:center\"><img src=\"http://localhost/shop/Publi/Upload/ueditor/image/20160818/1471535942124770.jpg\"/></p><p><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">在我们还戴着红领巾的90年代，你还有什么印象深刻的小物?陀螺?沙包?玻璃球?那些年，我们一起追的“国货奢品”英雄牌的钢笔?曾经欢天喜地得到它，一笔一画都严谨认真，有一手漂亮的钢笔字会有多少人投来羡慕的目光。</span><br style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><br style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">14K金笔尖，精钢铸造，轻触的一瞬好似文思泉涌，真皮特制笔袋，非碳素型纯黑墨水，85年用心好国货，英雄100真正有品质的好笔。百分之一百的匠心精神，让书写成为一种享受。众筹最低价299元，获得英雄100礼盒装85周年情怀版。传送</span></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535942980134.jpg\"/></p><p><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">台式电脑不利于携带，而笔记本槽就那么大 ，台式机里面的硬件再小也装不进去，如果缩小了 肯定硬件性能会下降，就算台式机的硬件装的进去，笔记本的散热也不行，风冷不够，水冷太大。于是一场历经八年的苦行僧式的研发设计，深刻改变PC的使用体验和应用方式。</span><br style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><br style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(102, 102, 102); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 34px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);\">第一款高性能、零噪音迷你电脑SacPro，整机无风扇，零噪音，五秒开机，英特尔HD Graphics 530显卡，大型游戏无压力，被动式散热，运行更稳当，历时8年，突破大型均热体技术的世界性难题，商务办公轻松应对，家庭游戏4K高清输出，无灰尘、低耗能、终生免维护。京东众筹价SacPro 1S i3-6100/8G/128G版一台3699元。传送</span></p><p><br/></p><p style=\"text-align:center\"><img src=\"/shop/Publi/Upload/ueditor/image/20160818/1471535942188608.jpg\"/></p><p><br/></p><p><br/></p>', '14');

-- ----------------------------
-- Table structure for `shop_brand`
-- ----------------------------
DROP TABLE IF EXISTS `shop_brand`;
CREATE TABLE `shop_brand` (
  `bid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bname` varchar(20) NOT NULL DEFAULT '',
  `logo` varchar(60) NOT NULL DEFAULT '' COMMENT '图片地址',
  `sort` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='品牌表';

-- ----------------------------
-- Records of shop_brand
-- ----------------------------
INSERT INTO `shop_brand` VALUES ('1', '华硕', 'Upload/94181471228167_thumb.png', '4');
INSERT INTO `shop_brand` VALUES ('2', '神州', 'Upload/89841471228193_thumb.jpg', '3');
INSERT INTO `shop_brand` VALUES ('3', '惠普', 'Upload/29751471228222_thumb.jpg', '1');
INSERT INTO `shop_brand` VALUES ('4', '苹果', 'Upload/1091471228242_thumb.jpg', '2');
INSERT INTO `shop_brand` VALUES ('5', '海澜之家', 'Upload/51261472196809_thumb.jpg', '0');
INSERT INTO `shop_brand` VALUES ('6', '劲霸男装K-Boxing', 'Upload/13571472197263_thumb.jpg', '0');
INSERT INTO `shop_brand` VALUES ('7', ' 美特斯邦威', 'Upload/1241472199109_thumb.jpg', '0');
INSERT INTO `shop_brand` VALUES ('8', ' 马克华菲', 'Upload/14551472200633_thumb.jpg', '0');
INSERT INTO `shop_brand` VALUES ('9', ' 威可多', 'Upload/98501472200930_thumb.jpg', '0');
INSERT INTO `shop_brand` VALUES ('10', ' 森马', 'Upload/51171472201116_thumb.jpg', '0');
INSERT INTO `shop_brand` VALUES ('11', ' 太平鸟', 'Upload/22471472201373_thumb.jpg', '0');
INSERT INTO `shop_brand` VALUES ('12', '周大福', 'Upload/23031472202343_thumb.jpg', '0');

-- ----------------------------
-- Table structure for `shop_car`
-- ----------------------------
DROP TABLE IF EXISTS `shop_car`;
CREATE TABLE `shop_car` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shopcar` varchar(255) NOT NULL DEFAULT '',
  `shop_user_uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `fk_shop_car_shop_user1_idx` (`shop_user_uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='购物车';

-- ----------------------------
-- Records of shop_car
-- ----------------------------

-- ----------------------------
-- Table structure for `shop_category`
-- ----------------------------
DROP TABLE IF EXISTS `shop_category`;
CREATE TABLE `shop_category` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` char(15) NOT NULL DEFAULT '' COMMENT '分类名称',
  `pid` int(10) NOT NULL DEFAULT '0' COMMENT '父级ID',
  `sort` smallint(6) NOT NULL DEFAULT '0' COMMENT '排序',
  `shop_type_tid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cid`),
  KEY `fk_shop_category_shop_type_idx` (`shop_type_tid`)
) ENGINE=MyISAM AUTO_INCREMENT=294 DEFAULT CHARSET=utf8 COMMENT='分类';

-- ----------------------------
-- Records of shop_category
-- ----------------------------
INSERT INTO `shop_category` VALUES ('1', '家用电器', '0', '5', '0');
INSERT INTO `shop_category` VALUES ('2', '电视', '1', '0', '0');
INSERT INTO `shop_category` VALUES ('3', '空调', '1', '0', '0');
INSERT INTO `shop_category` VALUES ('4', '洗衣机', '1', '0', '0');
INSERT INTO `shop_category` VALUES ('5', '合资电视', '2', '0', '0');
INSERT INTO `shop_category` VALUES ('6', '数码产品', '0', '2', '0');
INSERT INTO `shop_category` VALUES ('7', '电脑、办公', '0', '3', '0');
INSERT INTO `shop_category` VALUES ('8', '家装建材', '0', '4', '0');
INSERT INTO `shop_category` VALUES ('9', '服装城', '0', '1', '0');
INSERT INTO `shop_category` VALUES ('10', '礼品箱包', '0', '6', '0');
INSERT INTO `shop_category` VALUES ('11', '礼品', '0', '7', '0');
INSERT INTO `shop_category` VALUES ('12', '运动', '0', '8', '0');
INSERT INTO `shop_category` VALUES ('13', '汽车', '0', '9', '0');
INSERT INTO `shop_category` VALUES ('14', '母婴', '0', '10', '0');
INSERT INTO `shop_category` VALUES ('15', '食品', '0', '11', '0');
INSERT INTO `shop_category` VALUES ('16', '药材', '0', '12', '0');
INSERT INTO `shop_category` VALUES ('17', '书籍', '0', '13', '0');
INSERT INTO `shop_category` VALUES ('18', '其他服务', '0', '14', '0');
INSERT INTO `shop_category` VALUES ('19', '金融', '0', '15', '0');
INSERT INTO `shop_category` VALUES ('20', '手机', '6', '0', '0');
INSERT INTO `shop_category` VALUES ('21', '手机配件', '6', '0', '0');
INSERT INTO `shop_category` VALUES ('22', '京东通信', '6', '0', '0');
INSERT INTO `shop_category` VALUES ('23', '电脑整机', '7', '0', '0');
INSERT INTO `shop_category` VALUES ('24', '家纺', '8', '0', '0');
INSERT INTO `shop_category` VALUES ('25', '灯具', '8', '0', '0');
INSERT INTO `shop_category` VALUES ('26', '家具', '8', '0', '0');
INSERT INTO `shop_category` VALUES ('27', '厨具', '8', '0', '0');
INSERT INTO `shop_category` VALUES ('28', '男装', '9', '0', '0');
INSERT INTO `shop_category` VALUES ('29', '女装', '9', '0', '0');
INSERT INTO `shop_category` VALUES ('30', '童装', '9', '0', '0');
INSERT INTO `shop_category` VALUES ('31', '内衣', '9', '0', '0');
INSERT INTO `shop_category` VALUES ('32', '香水彩妆', '10', '0', '0');
INSERT INTO `shop_category` VALUES ('33', '清洁用品', '10', '0', '0');
INSERT INTO `shop_category` VALUES ('34', '宠物', '10', '0', '0');
INSERT INTO `shop_category` VALUES ('35', '鞋靴', '11', '0', '0');
INSERT INTO `shop_category` VALUES ('36', '箱包', '11', '0', '0');
INSERT INTO `shop_category` VALUES ('37', '珠宝', '11', '0', '0');
INSERT INTO `shop_category` VALUES ('38', '奢侈品', '11', '0', '0');
INSERT INTO `shop_category` VALUES ('39', '运动户外', '12', '0', '0');
INSERT INTO `shop_category` VALUES ('40', '钟表', '12', '0', '0');
INSERT INTO `shop_category` VALUES ('41', '汽车', '13', '0', '0');
INSERT INTO `shop_category` VALUES ('42', '汽车用品', '13', '0', '0');
INSERT INTO `shop_category` VALUES ('43', '母婴', '14', '0', '0');
INSERT INTO `shop_category` VALUES ('44', '玩具', '14', '0', '0');
INSERT INTO `shop_category` VALUES ('45', '食品', '15', '0', '0');
INSERT INTO `shop_category` VALUES ('46', '酒类', '15', '0', '0');
INSERT INTO `shop_category` VALUES ('48', '生鲜', '15', '0', '0');
INSERT INTO `shop_category` VALUES ('49', '特产', '15', '0', '0');
INSERT INTO `shop_category` VALUES ('50', '中药西品', '16', '0', '0');
INSERT INTO `shop_category` VALUES ('51', '图书', '17', '0', '0');
INSERT INTO `shop_category` VALUES ('52', '音像', '17', '0', '0');
INSERT INTO `shop_category` VALUES ('53', '电子书', '17', '0', '0');
INSERT INTO `shop_category` VALUES ('54', '彩票', '18', '0', '0');
INSERT INTO `shop_category` VALUES ('55', '旅行', '18', '0', '0');
INSERT INTO `shop_category` VALUES ('56', '充值', '18', '0', '0');
INSERT INTO `shop_category` VALUES ('57', '理财', '19', '0', '0');
INSERT INTO `shop_category` VALUES ('60', '众筹', '19', '0', '0');
INSERT INTO `shop_category` VALUES ('59', '白条', '19', '0', '0');
INSERT INTO `shop_category` VALUES ('61', '保险', '19', '0', '0');
INSERT INTO `shop_category` VALUES ('62', '衬衫', '28', '0', '8');
INSERT INTO `shop_category` VALUES ('63', '卫衣', '28', '0', '4');
INSERT INTO `shop_category` VALUES ('64', 'T恤', '28', '0', '4');
INSERT INTO `shop_category` VALUES ('65', '太阳镜眼镜框', '38', '0', '0');
INSERT INTO `shop_category` VALUES ('66', '时尚女装', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('67', '仿皮皮衣', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('68', '钱包', '38', '0', '0');
INSERT INTO `shop_category` VALUES ('69', '服饰', '38', '0', '0');
INSERT INTO `shop_category` VALUES ('70', '短袖', '28', '0', '8');
INSERT INTO `shop_category` VALUES ('71', '裤子', '28', '0', '5');
INSERT INTO `shop_category` VALUES ('72', '夹克', '28', '0', '8');
INSERT INTO `shop_category` VALUES ('73', '时尚饰品', '37', '0', '9');
INSERT INTO `shop_category` VALUES ('74', '国产品牌', '2', '0', '0');
INSERT INTO `shop_category` VALUES ('75', '互联品牌', '2', '0', '0');
INSERT INTO `shop_category` VALUES ('76', '壁挂式空调', '3', '0', '0');
INSERT INTO `shop_category` VALUES ('77', '柜式空调', '3', '0', '0');
INSERT INTO `shop_category` VALUES ('78', '空调配件', '3', '0', '0');
INSERT INTO `shop_category` VALUES ('79', '滚筒洗衣机', '4', '0', '0');
INSERT INTO `shop_category` VALUES ('80', '洗烘一体机', '4', '0', '0');
INSERT INTO `shop_category` VALUES ('81', '波轮洗衣机', '4', '0', '0');
INSERT INTO `shop_category` VALUES ('82', '迷你洗衣机', '4', '0', '0');
INSERT INTO `shop_category` VALUES ('83', '洗衣机配件', '4', '0', '0');
INSERT INTO `shop_category` VALUES ('84', '手机', '20', '0', '0');
INSERT INTO `shop_category` VALUES ('85', '对讲机', '20', '0', '0');
INSERT INTO `shop_category` VALUES ('86', '以旧换新', '20', '0', '0');
INSERT INTO `shop_category` VALUES ('87', '手机维修', '20', '0', '0');
INSERT INTO `shop_category` VALUES ('88', '手机电池', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('89', '移动电源', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('90', '蓝牙耳机', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('93', '充电器', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('94', '数据线', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('95', '手机耳机', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('96', '手机支架', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('97', '贴膜', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('98', '手机存储卡', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('99', '保护套', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('106', '苹果周边', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('108', '选号中心', '22', '0', '0');
INSERT INTO `shop_category` VALUES ('109', '自助服务', '22', '0', '0');
INSERT INTO `shop_category` VALUES ('103', '手机饰品', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('104', '拍照配件', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('105', '车载配件', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('107', ' 创意配件', '21', '0', '0');
INSERT INTO `shop_category` VALUES ('110', '笔记本', '23', '0', '0');
INSERT INTO `shop_category` VALUES ('111', '游戏本', '23', '0', '0');
INSERT INTO `shop_category` VALUES ('112', '平板电脑', '23', '0', '0');
INSERT INTO `shop_category` VALUES ('113', '平板电脑配件', '23', '0', '0');
INSERT INTO `shop_category` VALUES ('114', '台式机', '23', '0', '0');
INSERT INTO `shop_category` VALUES ('115', '一体机', '23', '0', '0');
INSERT INTO `shop_category` VALUES ('116', '服务器', '23', '0', '0');
INSERT INTO `shop_category` VALUES ('117', '笔记本配件', '23', '0', '0');
INSERT INTO `shop_category` VALUES ('118', '床品套件', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('119', '被子', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('120', '枕心', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('121', '蚊帐', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('122', '凉席', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('123', '毛巾浴巾', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('124', '床单被罩', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('125', '床垫', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('126', '毯子', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('127', '抱枕', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('128', '靠枕', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('129', '窗帘', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('130', '电热毯', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('131', '布艺软饰', '24', '0', '0');
INSERT INTO `shop_category` VALUES ('132', '台灯', '25', '0', '0');
INSERT INTO `shop_category` VALUES ('133', '吸顶灯', '25', '0', '0');
INSERT INTO `shop_category` VALUES ('134', '筒灯射灯', '25', '0', '0');
INSERT INTO `shop_category` VALUES ('135', 'LED灯', '25', '0', '0');
INSERT INTO `shop_category` VALUES ('136', '节能灯', '25', '0', '0');
INSERT INTO `shop_category` VALUES ('137', '落地灯', '25', '0', '0');
INSERT INTO `shop_category` VALUES ('138', '五金电器', '25', '0', '0');
INSERT INTO `shop_category` VALUES ('139', '应急灯/手电', '25', '0', '0');
INSERT INTO `shop_category` VALUES ('140', '装饰灯', '25', '0', '0');
INSERT INTO `shop_category` VALUES ('141', '吊灯', '25', '0', '0');
INSERT INTO `shop_category` VALUES ('142', '氛围照明', '25', '0', '0');
INSERT INTO `shop_category` VALUES ('143', '卧室家具', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('144', '客厅家具', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('145', '餐厅家具', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('146', '书房家具', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('147', '儿童家具', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('148', '储物家具', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('149', '阳台/户外', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('150', '商业办公', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('151', '床', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('152', '床垫', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('153', '沙发', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('154', '电脑椅', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('155', '衣柜', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('156', '茶几', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('157', '电视柜', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('158', '餐桌', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('159', '电脑桌', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('160', '鞋架', '26', '0', '0');
INSERT INTO `shop_category` VALUES ('161', '烹饪锅具', '27', '0', '0');
INSERT INTO `shop_category` VALUES ('162', '刀剪菜板', '27', '0', '0');
INSERT INTO `shop_category` VALUES ('163', '厨房配件', '27', '0', '0');
INSERT INTO `shop_category` VALUES ('164', '水具酒具', '27', '0', '0');
INSERT INTO `shop_category` VALUES ('165', '餐具', '27', '0', '0');
INSERT INTO `shop_category` VALUES ('166', '茶具', '27', '0', '0');
INSERT INTO `shop_category` VALUES ('167', '咖啡具', '27', '0', '0');
INSERT INTO `shop_category` VALUES ('168', '牛仔裤', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('169', '休闲裤', '28', '0', '5');
INSERT INTO `shop_category` VALUES ('170', '针织衫', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('171', '西服', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('172', '西裤', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('173', 'POLO衫', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('174', '羽绒服', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('175', '西服套装', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('176', '真皮皮衣', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('178', '风衣', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('179', '卫裤/运动裤', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('180', '短裤', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('181', '仿真皮衣', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('182', '棉服', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('183', '马甲/背心', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('184', '毛呢大衣', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('185', '羊毛衫', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('186', '大码男装', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('187', '中老年男装', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('188', '工作装', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('189', '设计师/潮牌', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('190', '唐装/中山装', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('191', '加绒裤', '28', '0', '0');
INSERT INTO `shop_category` VALUES ('192', '连衣裙', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('193', 'T恤', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('194', '雪纺衫', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('195', '衬衫', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('196', '休闲裤', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('197', '牛仔裤', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('198', '针织衫', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('199', '短外套', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('200', '卫衣', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('201', '小西装', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('202', '风衣', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('203', '毛呢大衣', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('204', '半身裙', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('205', '短裤', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('206', '吊带/背心', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('207', '打底衫', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('208', '打底裤', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('209', '正装裤', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('210', '马甲', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('211', '大码女装', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('212', '中老年女装', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('213', '真皮大衣', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('214', '皮革', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('215', '羊毛衫', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('216', '羊绒衫', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('217', '棉服', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('218', '羽绒服', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('219', '仿皮皮衣', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('220', '加绒裤', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('221', '婚纱', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('222', '旗袍/唐装', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('223', '礼服', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('224', '设计师/潮流', '29', '0', '0');
INSERT INTO `shop_category` VALUES ('225', '套装', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('226', '上衣', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('227', '运动鞋', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('228', '裤子', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('245', '男士内裤', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('230', '皮鞋', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('231', '帆布鞋', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('232', '亲子装', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('233', '羽绒服/棉服', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('234', '运动服', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('235', '鞋子', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('236', '演出服', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('237', '裙子', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('238', '功能写', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('239', '凉鞋', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('240', '配饰', '30', '0', '0');
INSERT INTO `shop_category` VALUES ('241', '文胸', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('247', '塑身美体', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('246', '女士内裤', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('244', '睡衣/家居服', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('248', '文胸套装', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('249', '情侣睡衣', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('250', '吊带/背心', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('251', '少年文胸', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('252', '休闲棉袜', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('253', '商务男袜', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('254', '连裤袜/丝袜', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('255', '美腿袜', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('256', '打底裤袜', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('257', '抹胸', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('258', '内衣配件', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('259', '大码内衣', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('260', '打底衫', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('261', '泳衣', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('262', '秋衣秋裤', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('263', '保暖内衣', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('264', '情趣内衣', '31', '0', '0');
INSERT INTO `shop_category` VALUES ('265', '女士香水', '32', '0', '0');
INSERT INTO `shop_category` VALUES ('266', '男士香水', '32', '0', '0');
INSERT INTO `shop_category` VALUES ('267', '底妆', '32', '0', '0');
INSERT INTO `shop_category` VALUES ('268', '眉笔', '32', '0', '0');
INSERT INTO `shop_category` VALUES ('269', '睫毛膏', '32', '0', '0');
INSERT INTO `shop_category` VALUES ('270', '眼线', '32', '0', '0');
INSERT INTO `shop_category` VALUES ('271', '眼影', '32', '0', '0');
INSERT INTO `shop_category` VALUES ('272', '唇膏', '32', '0', '0');
INSERT INTO `shop_category` VALUES ('273', '美甲', '32', '0', '0');
INSERT INTO `shop_category` VALUES ('274', '美妆工具', '32', '0', '0');
INSERT INTO `shop_category` VALUES ('275', '套装', '32', '0', '0');
INSERT INTO `shop_category` VALUES ('276', '纸品湿巾', '33', '0', '0');
INSERT INTO `shop_category` VALUES ('277', '衣物清洁', '33', '0', '0');
INSERT INTO `shop_category` VALUES ('278', '清洁工具', '33', '0', '0');
INSERT INTO `shop_category` VALUES ('279', '家庭清洁', '33', '0', '0');
INSERT INTO `shop_category` VALUES ('280', '一次性用品', '33', '0', '0');
INSERT INTO `shop_category` VALUES ('281', '除虫用品', '33', '0', '0');
INSERT INTO `shop_category` VALUES ('282', '皮具护理', '33', '0', '0');
INSERT INTO `shop_category` VALUES ('283', '水族用品', '34', '0', '0');
INSERT INTO `shop_category` VALUES ('284', '宠物主粮', '34', '0', '0');
INSERT INTO `shop_category` VALUES ('285', '宠物零食', '34', '0', '0');
INSERT INTO `shop_category` VALUES ('286', '猫砂/尿布', '34', '0', '0');
INSERT INTO `shop_category` VALUES ('287', '洗护美容', '34', '0', '0');
INSERT INTO `shop_category` VALUES ('288', '家居日用', '34', '0', '0');
INSERT INTO `shop_category` VALUES ('289', '医疗保健', '34', '0', '0');
INSERT INTO `shop_category` VALUES ('290', '出行装备', '34', '0', '0');
INSERT INTO `shop_category` VALUES ('291', '宠物玩具', '34', '0', '0');
INSERT INTO `shop_category` VALUES ('292', '宠物牵引', '34', '0', '0');
INSERT INTO `shop_category` VALUES ('293', '宠物驱虫', '34', '0', '0');

-- ----------------------------
-- Table structure for `shop_detail`
-- ----------------------------
DROP TABLE IF EXISTS `shop_detail`;
CREATE TABLE `shop_detail` (
  `small` varchar(255) NOT NULL DEFAULT '' COMMENT '小图地址',
  `intro` text,
  `shop_lists_gid` int(10) unsigned NOT NULL,
  KEY `fk_shop_detail_shop_lists1_idx` (`shop_lists_gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品详情';

-- ----------------------------
-- Records of shop_detail
-- ----------------------------
INSERT INTO `shop_detail` VALUES ('Upload/Content/16/08/95421472200785.jpg', '<p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200796775002.jpg\" title=\"1472200796775002.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200796235814.jpg\" title=\"1472200796235814.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200796147642.jpg\" title=\"1472200796147642.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200796129310.jpg\" title=\"1472200796129310.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200806808653.jpg\" title=\"1472200806808653.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200806728700.jpg\" title=\"1472200806728700.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200806221183.jpg\" title=\"1472200806221183.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200806275532.jpg\" title=\"1472200806275532.jpg\"/></p><p><br/></p>', '8');
INSERT INTO `shop_detail` VALUES ('Upload/Content/16/08/58171472200982.jpg', '<p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201024999111.jpg\" title=\"1472201024999111.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201025103000.jpg\" title=\"1472201025103000.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201025123372.jpg\" title=\"1472201025123372.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201025899708.jpg\" title=\"1472201025899708.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201034487076.jpg\" title=\"1472201034487076.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201034870834.jpg\" title=\"1472201034870834.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201034934435.jpg\" title=\"1472201034934435.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201034870662.jpg\" title=\"1472201034870662.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201043112213.jpg\" title=\"1472201043112213.jpg\" alt=\"10.jpg\"/></p>', '9');
INSERT INTO `shop_detail` VALUES ('Upload/Content/16/08/80771472199491.jpg', '<p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472199540466335.jpg\" title=\"1472199540466335.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472199540235254.jpg\" title=\"1472199540235254.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472199540251348.jpg\" title=\"1472199540251348.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472199540602229.jpg\" title=\"1472199540602229.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472199550708475.jpg\" title=\"1472199550708475.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472199550256727.jpg\" title=\"1472199550256727.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472199550192610.jpg\" title=\"1472199550192610.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472199550995325.jpg\" title=\"1472199550995325.jpg\"/></p><p><br/></p>', '6');
INSERT INTO `shop_detail` VALUES ('Upload/Content/16/08/6391472200331.jpg', '<p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200344744062.jpg\" title=\"1472200344744062.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200344324803.jpg\" title=\"1472200344324803.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200344106447.jpg\" title=\"1472200344106447.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200344204099.jpg\" title=\"1472200344204099.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200357258233.jpg\" title=\"1472200357258233.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200357504977.jpg\" title=\"1472200357504977.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200357635364.jpg\" title=\"1472200357635364.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472200357115122.jpg\" title=\"1472200357115122.jpg\"/></p><p><br/></p>', '7');
INSERT INTO `shop_detail` VALUES ('Upload/Content/16/08/69921472197069.jpg', '<p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472197114106809.jpg\" title=\"1472197114106809.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472197114671769.jpg\" title=\"1472197114671769.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472197114135636.jpg\" title=\"1472197114135636.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472197114741437.jpg\" title=\"1472197114741437.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472197130806286.jpg\" title=\"1472197130806286.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472197130237836.jpg\" title=\"1472197130237836.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472197130786836.jpg\" title=\"1472197130786836.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472197130128006.jpg\" title=\"1472197130128006.jpg\"/></p><p><br/></p>', '4');
INSERT INTO `shop_detail` VALUES ('Upload/Content/16/08/49411472198699.jpg', '<p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472198767120527.jpg\" title=\"1472198767120527.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472198767854826.jpg\" title=\"1472198767854826.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472198767358669.jpg\" title=\"1472198767358669.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472198767128058.jpg\" title=\"1472198767128058.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472198779116650.jpg\" title=\"1472198779116650.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472198779131251.jpg\" title=\"1472198779131251.jpg\"/></p><p></p><p><br/></p>', '5');
INSERT INTO `shop_detail` VALUES ('Upload/Content/16/08/37511472201193.jpg', '<p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201242886239.jpg\" title=\"1472201242886239.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201242426574.jpg\" title=\"1472201242426574.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201242745353.jpg\" title=\"1472201242745353.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201242890757.jpg\" title=\"1472201242890757.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201257731152.jpg\" title=\"1472201257731152.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201257129392.jpg\" title=\"1472201257129392.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201257412889.jpg\" title=\"1472201257412889.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201257127722.jpg\" title=\"1472201257127722.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201257334227.jpg\" title=\"1472201257334227.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472201257103745.jpg\" title=\"1472201257103745.jpg\"/></p><p><br/></p>', '10');
INSERT INTO `shop_detail` VALUES ('Upload/Content/16/08/93731472201430.jpg', '<p><img src=\"/ueditor/php/upload/image/20160826/1472201489882796.jpg\" title=\"1472201489882796.jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20160826/1472201489121341.jpg\" title=\"1472201489121341.jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20160826/1472201489313701.jpg\" title=\"1472201489313701.jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20160826/1472201489831675.jpg\" title=\"1472201489831675.jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20160826/1472201489353376.jpg\" title=\"1472201489353376.jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20160826/1472201489127326.jpg\" title=\"1472201489127326.jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20160826/1472201489359186.jpg\" title=\"1472201489359186.jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20160826/1472201489778789.jpg\" title=\"1472201489778789.jpg\"/></p><p><img src=\"/ueditor/php/upload/image/20160826/1472201489573570.jpg\" title=\"1472201489573570.jpg\"/></p><p><br/></p>', '11');
INSERT INTO `shop_detail` VALUES ('Upload/Content/16/08/63551472202400.jpg', '<p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472202411457169.jpg\" title=\"1472202411457169.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472202411308365.jpg\" title=\"1472202411308365.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472202411118074.jpg\" title=\"1472202411118074.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472202411103190.jpg\" title=\"1472202411103190.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472202411134439.jpg\" title=\"1472202411134439.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472202411911800.jpg\" title=\"1472202411911800.jpg\"/></p><p style=\"text-align: center;\"><img src=\"/ueditor/php/upload/image/20160826/1472202411803618.jpg\" title=\"1472202411803618.jpg\"/></p><p><br/></p>', '12');

-- ----------------------------
-- Table structure for `shop_link`
-- ----------------------------
DROP TABLE IF EXISTS `shop_link`;
CREATE TABLE `shop_link` (
  `lid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lname` char(40) NOT NULL DEFAULT '' COMMENT '链接名称',
  `addtime` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `url` char(150) DEFAULT NULL COMMENT '链接地址',
  `is_verify` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(5) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='友情链接';

-- ----------------------------
-- Records of shop_link
-- ----------------------------
INSERT INTO `shop_link` VALUES ('2', '百度', '1472358659', 'http://www.baidu.com', '0', '0');
INSERT INTO `shop_link` VALUES ('3', '新浪', '1472358989', 'http://www.sina.com.cn/', '0', '0');

-- ----------------------------
-- Table structure for `shop_lis`
-- ----------------------------
DROP TABLE IF EXISTS `shop_lis`;
CREATE TABLE `shop_lis` (
  `glid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `combine` char(50) NOT NULL DEFAULT '' COMMENT '组合属性ID',
  `number` char(30) NOT NULL DEFAULT '' COMMENT '货品货号',
  `inventory` smallint(6) NOT NULL DEFAULT '0' COMMENT '库存',
  `shop_lists_gid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`glid`),
  KEY `fk_shop_lis_shop_lists1_idx` (`shop_lists_gid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='货品列表';

-- ----------------------------
-- Records of shop_lis
-- ----------------------------
INSERT INTO `shop_lis` VALUES ('13', '127,125', '1472202440', '11', '6');
INSERT INTO `shop_lis` VALUES ('12', '127,126', '1472202435', '11', '6');
INSERT INTO `shop_lis` VALUES ('14', '81,82', '1472202452', '11', '4');
INSERT INTO `shop_lis` VALUES ('15', '81,83', '1472202457', '11', '4');
INSERT INTO `shop_lis` VALUES ('16', '81,85', '1472202462', '11', '4');
INSERT INTO `shop_lis` VALUES ('17', '96,97', '1472202474', '11', '5');
INSERT INTO `shop_lis` VALUES ('18', '146,147', '1472202483', '11', '8');
INSERT INTO `shop_lis` VALUES ('19', '146,148', '1472202490', '11', '8');

-- ----------------------------
-- Table structure for `shop_lists`
-- ----------------------------
DROP TABLE IF EXISTS `shop_lists`;
CREATE TABLE `shop_lists` (
  `gid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gname` varchar(50) NOT NULL DEFAULT '' COMMENT '商品名称',
  `gnumber` varchar(45) NOT NULL DEFAULT '' COMMENT '商品货号',
  `unit` char(5) NOT NULL DEFAULT '' COMMENT '计件单位',
  `marketprice` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '市场价格',
  `shopprice` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '商城价格',
  `pic` varchar(60) NOT NULL DEFAULT '' COMMENT '列表图地址',
  `num` smallint(6) NOT NULL DEFAULT '0' COMMENT '销售量',
  `time` int(11) NOT NULL DEFAULT '0' COMMENT '上架时间',
  `inventory` smallint(6) NOT NULL DEFAULT '0',
  `shop_brand_bid` int(10) unsigned NOT NULL,
  `shop_admin_uid` int(10) unsigned NOT NULL,
  `shop_category_cid` int(10) unsigned NOT NULL,
  `shop_type_tid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`gid`),
  KEY `fk_shop_lists_shop_brand1_idx` (`shop_brand_bid`),
  KEY `fk_shop_lists_shop_admin1_idx` (`shop_admin_uid`),
  KEY `fk_shop_lists_shop_category1_idx` (`shop_category_cid`),
  KEY `fk_shop_lists_shop_type_attr1_idx` (`shop_type_tid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='商品列表';

-- ----------------------------
-- Records of shop_lists
-- ----------------------------
INSERT INTO `shop_lists` VALUES ('7', '超高弹力牛仔裤男士小脚男裤子夏季薄款修身直筒男装弹性长裤大码', '1472200362', '件', '150', '79', 'Upload/Content/16/08/72341472200327.jpg', '0', '1472200362', '0', '7', '1', '71', '5');
INSERT INTO `shop_lists` VALUES ('6', '美特斯邦威2016常年款男时尚修身弹力基本长袖衬衫722033 影黑 170/92A', '1472199555', '件', '139', '139', 'Upload/Content/16/08/89641472199698.jpg', '0', '1472199555', '22', '7', '1', '70', '8');
INSERT INTO `shop_lists` VALUES ('4', 'LEE男装 商场同款 2016秋冬新款男士印花圆领短袖T恤L15900V41K11 黑色 L', '1472197160', '件', '290', '298', 'Upload/Content/16/08/80941472197065.jpg', '0', '1472197160', '33', '5', '1', '70', '8');
INSERT INTO `shop_lists` VALUES ('5', '劲霸男装K-Boxing 商务男士优雅长袖衬衫 秋冬修身翻领衬衫 |FCBY3010 黑色 175/', '1472198788', '件', '799', '348', 'Upload/Content/16/08/73571472198695.jpg', '0', '1472198788', '11', '6', '1', '70', '8');
INSERT INTO `shop_lists` VALUES ('8', '马克华菲秋季新款夹克时尚修身拼接男士夹克男士外套春秋款7153102008 深蓝色 XL', '1472200810', '件', '988', '488', 'Upload/Content/16/08/44611472200781.jpg', '0', '1472200810', '22', '8', '1', '72', '8');
INSERT INTO `shop_lists` VALUES ('9', '威可多VICUTU 单西裤纯羊毛纯色商务休闲长西裤 VBS88322309 深蓝色 175/87B-', '1472201047', '件', '790', '395', 'Upload/Content/16/08/5031472200978.jpg', '0', '1472201047', '0', '9', '1', '71', '5');
INSERT INTO `shop_lists` VALUES ('10', '森马牛仔裤 2016秋装新款 男士中低腰猫须修身牛仔小脚长裤韩版潮 牛仔中蓝0820 29', '1472201261', '件', '199', '119', 'Upload/Content/16/08/81491472201189.jpg', '0', '1472201261', '0', '10', '1', '71', '5');
INSERT INTO `shop_lists` VALUES ('11', '太平鸟男装 黑色束腿休闲裤抽绳收口裤九分裤潮B2GB53227 黑色 M', '1472201494', '件', '528', '239', 'Upload/Content/16/08/54851472201426.jpg', '0', '1472201494', '0', '11', '1', '71', '5');
INSERT INTO `shop_lists` VALUES ('12', '锦盒定做、现货批发珠宝首饰收纳盒 高档手镯盒10只装 翡翠手镯箱 ', '1472202416', '件', '70', '45', 'Upload/Content/16/08/47571472202396.jpg', '0', '1472202416', '0', '12', '1', '73', '9');

-- ----------------------------
-- Table structure for `shop_list_attr`
-- ----------------------------
DROP TABLE IF EXISTS `shop_list_attr`;
CREATE TABLE `shop_list_attr` (
  `gtid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gtvalue` char(15) DEFAULT NULL COMMENT '商品属性值',
  `added` decimal(10,0) DEFAULT NULL COMMENT '附加价格',
  `shop_type_attr_taid` int(10) unsigned NOT NULL,
  `shop_lists_gid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`gtid`),
  KEY `fk_shop_list_attr_shop_type_attr1_idx` (`shop_type_attr_taid`),
  KEY `fk_shop_list_attr_shop_lists1_idx` (`shop_lists_gid`)
) ENGINE=MyISAM AUTO_INCREMENT=210 DEFAULT CHARSET=utf8 COMMENT='商品属性';

-- ----------------------------
-- Records of shop_list_attr
-- ----------------------------
INSERT INTO `shop_list_attr` VALUES ('127', '黑色', '0', '23', '6');
INSERT INTO `shop_list_attr` VALUES ('126', 'S', '0', '24', '6');
INSERT INTO `shop_list_attr` VALUES ('125', 'M', '0', '24', '6');
INSERT INTO `shop_list_attr` VALUES ('124', 'L', '0', '24', '6');
INSERT INTO `shop_list_attr` VALUES ('123', 'XL', '0', '24', '6');
INSERT INTO `shop_list_attr` VALUES ('122', '', '0', '22', '6');
INSERT INTO `shop_list_attr` VALUES ('121', '', '0', '21', '6');
INSERT INTO `shop_list_attr` VALUES ('120', '中式', '0', '20', '6');
INSERT INTO `shop_list_attr` VALUES ('119', '', '0', '19', '6');
INSERT INTO `shop_list_attr` VALUES ('118', '', '0', '18', '6');
INSERT INTO `shop_list_attr` VALUES ('117', '', '0', '17', '6');
INSERT INTO `shop_list_attr` VALUES ('116', '', '0', '16', '6');
INSERT INTO `shop_list_attr` VALUES ('115', '中长', '0', '15', '6');
INSERT INTO `shop_list_attr` VALUES ('114', '宽松型', '0', '14', '6');
INSERT INTO `shop_list_attr` VALUES ('113', '长袖', '0', '13', '6');
INSERT INTO `shop_list_attr` VALUES ('71', '短袖', '0', '13', '4');
INSERT INTO `shop_list_attr` VALUES ('72', '修身型', '0', '14', '4');
INSERT INTO `shop_list_attr` VALUES ('73', '中长', '0', '15', '4');
INSERT INTO `shop_list_attr` VALUES ('74', '堆堆袖', '0', '16', '4');
INSERT INTO `shop_list_attr` VALUES ('75', 'V领', '0', '17', '4');
INSERT INTO `shop_list_attr` VALUES ('76', '水洗', '0', '18', '4');
INSERT INTO `shop_list_attr` VALUES ('77', '', '0', '19', '4');
INSERT INTO `shop_list_attr` VALUES ('78', '中式', '0', '20', '4');
INSERT INTO `shop_list_attr` VALUES ('79', '水晶砂', '0', '21', '4');
INSERT INTO `shop_list_attr` VALUES ('80', '青年', '0', '22', '4');
INSERT INTO `shop_list_attr` VALUES ('81', '黑色', '0', '23', '4');
INSERT INTO `shop_list_attr` VALUES ('82', 'S', '0', '24', '4');
INSERT INTO `shop_list_attr` VALUES ('83', 'XXL', '0', '24', '4');
INSERT INTO `shop_list_attr` VALUES ('84', 'L', '0', '24', '4');
INSERT INTO `shop_list_attr` VALUES ('85', 'M', '0', '24', '4');
INSERT INTO `shop_list_attr` VALUES ('86', '长袖', '0', '13', '5');
INSERT INTO `shop_list_attr` VALUES ('87', '宽松型', '0', '14', '5');
INSERT INTO `shop_list_attr` VALUES ('88', '中长', '0', '15', '5');
INSERT INTO `shop_list_attr` VALUES ('89', '', '0', '16', '5');
INSERT INTO `shop_list_attr` VALUES ('90', '', '0', '17', '5');
INSERT INTO `shop_list_attr` VALUES ('91', '', '0', '18', '5');
INSERT INTO `shop_list_attr` VALUES ('92', '', '0', '19', '5');
INSERT INTO `shop_list_attr` VALUES ('93', '', '0', '20', '5');
INSERT INTO `shop_list_attr` VALUES ('94', '', '0', '21', '5');
INSERT INTO `shop_list_attr` VALUES ('95', '青年', '0', '22', '5');
INSERT INTO `shop_list_attr` VALUES ('96', '黑色', '0', '23', '5');
INSERT INTO `shop_list_attr` VALUES ('97', 'S', '0', '24', '5');
INSERT INTO `shop_list_attr` VALUES ('198', 'L', '0', '27', '7');
INSERT INTO `shop_list_attr` VALUES ('197', 'M', '0', '27', '7');
INSERT INTO `shop_list_attr` VALUES ('196', '长裤', '0', '25', '7');
INSERT INTO `shop_list_attr` VALUES ('195', '休闲裤', '0', '26', '7');
INSERT INTO `shop_list_attr` VALUES ('136', '长袖', '0', '13', '8');
INSERT INTO `shop_list_attr` VALUES ('137', '', '0', '14', '8');
INSERT INTO `shop_list_attr` VALUES ('138', '', '0', '15', '8');
INSERT INTO `shop_list_attr` VALUES ('139', '', '0', '16', '8');
INSERT INTO `shop_list_attr` VALUES ('140', '', '0', '17', '8');
INSERT INTO `shop_list_attr` VALUES ('141', '', '0', '18', '8');
INSERT INTO `shop_list_attr` VALUES ('142', '', '0', '19', '8');
INSERT INTO `shop_list_attr` VALUES ('143', '', '0', '20', '8');
INSERT INTO `shop_list_attr` VALUES ('144', '', '0', '21', '8');
INSERT INTO `shop_list_attr` VALUES ('145', '', '0', '22', '8');
INSERT INTO `shop_list_attr` VALUES ('146', '黑色', '0', '23', '8');
INSERT INTO `shop_list_attr` VALUES ('147', 'S', '0', '24', '8');
INSERT INTO `shop_list_attr` VALUES ('148', 'L', '0', '24', '8');
INSERT INTO `shop_list_attr` VALUES ('149', 'M', '0', '24', '8');
INSERT INTO `shop_list_attr` VALUES ('203', 'S', '0', '27', '9');
INSERT INTO `shop_list_attr` VALUES ('202', 'M', '0', '27', '9');
INSERT INTO `shop_list_attr` VALUES ('201', 'L', '0', '27', '9');
INSERT INTO `shop_list_attr` VALUES ('200', '', '0', '25', '9');
INSERT INTO `shop_list_attr` VALUES ('199', '', '0', '26', '9');
INSERT INTO `shop_list_attr` VALUES ('209', 'L', '0', '27', '10');
INSERT INTO `shop_list_attr` VALUES ('208', '长裤', '0', '25', '10');
INSERT INTO `shop_list_attr` VALUES ('207', '休闲裤', '0', '26', '10');
INSERT INTO `shop_list_attr` VALUES ('206', 'L', '0', '27', '11');
INSERT INTO `shop_list_attr` VALUES ('205', '', '0', '25', '11');
INSERT INTO `shop_list_attr` VALUES ('204', '', '0', '26', '11');
INSERT INTO `shop_list_attr` VALUES ('166', '民族风', '0', '29', '12');
INSERT INTO `shop_list_attr` VALUES ('167', '手镯/手串', '0', '28', '12');
INSERT INTO `shop_list_attr` VALUES ('168', '蓝色', '0', '30', '12');
INSERT INTO `shop_list_attr` VALUES ('169', '紫色', '0', '30', '12');
INSERT INTO `shop_list_attr` VALUES ('170', '红色', '0', '30', '12');

-- ----------------------------
-- Table structure for `shop_node`
-- ----------------------------
DROP TABLE IF EXISTS `shop_node`;
CREATE TABLE `shop_node` (
  `show` tinyint(4) NOT NULL DEFAULT '1',
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '',
  `title` varchar(45) NOT NULL DEFAULT '' COMMENT '权限名称',
  `sort` tinyint(3) NOT NULL DEFAULT '0' COMMENT '排序',
  `pid` tinyint(3) NOT NULL DEFAULT '0',
  `level` tinyint(3) NOT NULL DEFAULT '0' COMMENT '1为模块2为控制器3为方法',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='权限表';

-- ----------------------------
-- Records of shop_node
-- ----------------------------
INSERT INTO `shop_node` VALUES ('1', '1', 'admin', '后台项目', '0', '0', '1', '1');
INSERT INTO `shop_node` VALUES ('1', '2', 'index', '默认控制器', '0', '1', '2', '1');
INSERT INTO `shop_node` VALUES ('1', '3', 'index', '后台首页', '0', '2', '3', '1');
INSERT INTO `shop_node` VALUES ('1', '4', 'welcome', '欢迎页面', '0', '2', '3', '1');
INSERT INTO `shop_node` VALUES ('1', '5', 'changepassword', '修改密码', '0', '2', '3', '1');
INSERT INTO `shop_node` VALUES ('1', '6', 'brand', '品牌', '0', '1', '2', '1');
INSERT INTO `shop_node` VALUES ('1', '7', 'add', '品牌添加', '0', '6', '3', '1');
INSERT INTO `shop_node` VALUES ('1', '8', 'edit', '品牌修改', '0', '6', '3', '1');
INSERT INTO `shop_node` VALUES ('1', '9', 'index', '品牌显示', '0', '6', '3', '1');
INSERT INTO `shop_node` VALUES ('1', '10', 'del', '品牌删除', '0', '6', '3', '1');
INSERT INTO `shop_node` VALUES ('1', '11', 'shopcate', '商品分类', '0', '1', '2', '1');
INSERT INTO `shop_node` VALUES ('1', '12', 'index', '商品分类列表', '0', '11', '3', '1');
INSERT INTO `shop_node` VALUES ('1', '13', 'add', '商品分类添加', '0', '11', '3', '1');
INSERT INTO `shop_node` VALUES ('1', '14', 'sanadd', '商品子分类添加', '0', '11', '3', '1');
INSERT INTO `shop_node` VALUES ('1', '15', 'edit', '商品分类修改', '0', '11', '3', '1');
INSERT INTO `shop_node` VALUES ('1', '16', 'del', '商品分类删除', '0', '11', '3', '1');
INSERT INTO `shop_node` VALUES ('1', '17', 'arccate', '文章分类', '0', '1', '2', '1');

-- ----------------------------
-- Table structure for `shop_order`
-- ----------------------------
DROP TABLE IF EXISTS `shop_order`;
CREATE TABLE `shop_order` (
  `oid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(45) NOT NULL DEFAULT '' COMMENT '订单号',
  `consignee` varchar(20) NOT NULL DEFAULT '' COMMENT '收货人',
  `address` varchar(60) NOT NULL DEFAULT '' COMMENT '收货地址',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  `total` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '价格总计',
  `time` int(11) NOT NULL DEFAULT '0' COMMENT '生成订单时间',
  `remark` varchar(45) NOT NULL DEFAULT '' COMMENT '备注说明',
  `status` enum('未付款','待发货','已发货','已完成') NOT NULL DEFAULT '未付款' COMMENT '订单状态',
  `shop_user_uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`oid`),
  KEY `fk_shop_order_shop_user1_idx` (`shop_user_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='订单表';

-- ----------------------------
-- Records of shop_order
-- ----------------------------
INSERT INTO `shop_order` VALUES ('1', '1472476948', '12', '北京市,北京,东城区,12', '18118181111', '627', '1472476948', '', '未付款', '6');
INSERT INTO `shop_order` VALUES ('2', '1472526035', '12', '北京市,北京,东城区,12', '18118181111', '0', '1472526035', '', '未付款', '6');
INSERT INTO `shop_order` VALUES ('3', '1472567203', '12', '北京市,北京,东城区,12', '18118181111', '139', '1472567203', '', '已完成', '6');

-- ----------------------------
-- Table structure for `shop_order_list`
-- ----------------------------
DROP TABLE IF EXISTS `shop_order_list`;
CREATE TABLE `shop_order_list` (
  `olid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` smallint(6) NOT NULL DEFAULT '0' COMMENT '购买数量',
  `subtotal` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '价格小计',
  `explain` varchar(45) NOT NULL DEFAULT '' COMMENT '备注说明',
  `glid` varchar(45) NOT NULL DEFAULT '‘’' COMMENT '货品ID',
  `glnumber` char(30) NOT NULL DEFAULT '' COMMENT '货品货号',
  `shop_lists_gid` int(10) unsigned NOT NULL,
  `shop_order_oid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`olid`),
  KEY `fk_shop_order_list_shop_lists1_idx` (`shop_lists_gid`),
  KEY `fk_shop_order_list_shop_order1_idx` (`shop_order_oid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='订单列表';

-- ----------------------------
-- Records of shop_order_list
-- ----------------------------
INSERT INTO `shop_order_list` VALUES ('1', '1', '488', '', '146,147', '1472202483', '8', '1');
INSERT INTO `shop_order_list` VALUES ('2', '1', '139', '', '127,126', '1472202435', '6', '1');
INSERT INTO `shop_order_list` VALUES ('3', '1', '139', '', '127,126', '1472202435', '6', '3');

-- ----------------------------
-- Table structure for `shop_remark`
-- ----------------------------
DROP TABLE IF EXISTS `shop_remark`;
CREATE TABLE `shop_remark` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '评论标题',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `star` tinyint(1) NOT NULL DEFAULT '0' COMMENT '星级，1/2/3/4/5分别是1/2/3/4/5星级',
  `time` int(11) NOT NULL DEFAULT '0' COMMENT '发表时间',
  `uname` char(30) DEFAULT NULL COMMENT '用户名称',
  `shop_lists_gid` int(10) unsigned NOT NULL,
  `shop_user_uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`rid`),
  KEY `fk_shop_remark_shop_lists1_idx` (`shop_lists_gid`),
  KEY `fk_shop_remark_shop_user1_idx` (`shop_user_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='评论表';

-- ----------------------------
-- Records of shop_remark
-- ----------------------------
INSERT INTO `shop_remark` VALUES ('9', '1', '1', '1', '1472375532', 'admin888', '8', '6');
INSERT INTO `shop_remark` VALUES ('10', 'dsa', 'dsadsa', '5', '1472567294', 'admin888', '6', '6');

-- ----------------------------
-- Table structure for `shop_role`
-- ----------------------------
DROP TABLE IF EXISTS `shop_role`;
CREATE TABLE `shop_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '角色名称',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of shop_role
-- ----------------------------
INSERT INTO `shop_role` VALUES ('1', '品牌', '1');
INSERT INTO `shop_role` VALUES ('2', '商品', '1');

-- ----------------------------
-- Table structure for `shop_role_has_shop_admin`
-- ----------------------------
DROP TABLE IF EXISTS `shop_role_has_shop_admin`;
CREATE TABLE `shop_role_has_shop_admin` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  KEY `fk_shop_role_has_shop_admin_shop_role1_idx` (`role_id`),
  KEY `fk_shop_role_has_shop_admin_shop_admin1_idx` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_role_has_shop_admin
-- ----------------------------
INSERT INTO `shop_role_has_shop_admin` VALUES ('2', '4');
INSERT INTO `shop_role_has_shop_admin` VALUES ('1', '5');
INSERT INTO `shop_role_has_shop_admin` VALUES ('1', '6');
INSERT INTO `shop_role_has_shop_admin` VALUES ('2', '6');

-- ----------------------------
-- Table structure for `shop_role_has_shop_node`
-- ----------------------------
DROP TABLE IF EXISTS `shop_role_has_shop_node`;
CREATE TABLE `shop_role_has_shop_node` (
  `role_id` int(10) unsigned NOT NULL,
  `node_id` int(10) unsigned NOT NULL,
  KEY `fk_shop_role_has_shop_node_shop_role1_idx` (`role_id`),
  KEY `fk_shop_role_has_shop_node_shop_node1_idx` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_role_has_shop_node
-- ----------------------------
INSERT INTO `shop_role_has_shop_node` VALUES ('1', '1');
INSERT INTO `shop_role_has_shop_node` VALUES ('1', '2');
INSERT INTO `shop_role_has_shop_node` VALUES ('1', '3');
INSERT INTO `shop_role_has_shop_node` VALUES ('1', '4');
INSERT INTO `shop_role_has_shop_node` VALUES ('1', '5');
INSERT INTO `shop_role_has_shop_node` VALUES ('1', '6');
INSERT INTO `shop_role_has_shop_node` VALUES ('1', '7');
INSERT INTO `shop_role_has_shop_node` VALUES ('1', '8');
INSERT INTO `shop_role_has_shop_node` VALUES ('1', '9');
INSERT INTO `shop_role_has_shop_node` VALUES ('1', '10');
INSERT INTO `shop_role_has_shop_node` VALUES ('2', '1');
INSERT INTO `shop_role_has_shop_node` VALUES ('2', '2');
INSERT INTO `shop_role_has_shop_node` VALUES ('2', '3');
INSERT INTO `shop_role_has_shop_node` VALUES ('2', '4');
INSERT INTO `shop_role_has_shop_node` VALUES ('2', '5');
INSERT INTO `shop_role_has_shop_node` VALUES ('2', '11');
INSERT INTO `shop_role_has_shop_node` VALUES ('2', '12');
INSERT INTO `shop_role_has_shop_node` VALUES ('2', '13');
INSERT INTO `shop_role_has_shop_node` VALUES ('2', '14');
INSERT INTO `shop_role_has_shop_node` VALUES ('2', '15');
INSERT INTO `shop_role_has_shop_node` VALUES ('2', '16');

-- ----------------------------
-- Table structure for `shop_type`
-- ----------------------------
DROP TABLE IF EXISTS `shop_type`;
CREATE TABLE `shop_type` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tname` char(15) NOT NULL DEFAULT '' COMMENT '类型名称',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='类型表';

-- ----------------------------
-- Records of shop_type
-- ----------------------------
INSERT INTO `shop_type` VALUES ('1', '电视');
INSERT INTO `shop_type` VALUES ('2', '数码');
INSERT INTO `shop_type` VALUES ('3', '家居');
INSERT INTO `shop_type` VALUES ('5', '裤子');
INSERT INTO `shop_type` VALUES ('6', '裙子');
INSERT INTO `shop_type` VALUES ('9', '珠宝');
INSERT INTO `shop_type` VALUES ('8', '上衣');

-- ----------------------------
-- Table structure for `shop_type_attr`
-- ----------------------------
DROP TABLE IF EXISTS `shop_type_attr`;
CREATE TABLE `shop_type_attr` (
  `taid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `taname` varchar(20) NOT NULL DEFAULT '' COMMENT '类型属性的名称',
  `tavalue` varchar(255) NOT NULL DEFAULT '' COMMENT '类型属性的值',
  `class` tinyint(1) NOT NULL DEFAULT '0' COMMENT '类型属性的类别 0位属性 1为规格',
  `shop_type_tid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`taid`),
  KEY `fk_shop_type_attr_shop_type1_idx` (`shop_type_tid`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='类型属性';

-- ----------------------------
-- Records of shop_type_attr
-- ----------------------------
INSERT INTO `shop_type_attr` VALUES ('29', '风格', '日韩,欧美,民族风,复古/宫廷,甜美\r\n', '0', '9');
INSERT INTO `shop_type_attr` VALUES ('28', '翡翠玉石', '项链/吊坠,手镯/手串,戒指,挂件/摆件/把件耳饰,玉石孤品\r\n\r\n', '0', '9');
INSERT INTO `shop_type_attr` VALUES ('27', '尺码', 'L,M,S,XL,XXL', '1', '5');
INSERT INTO `shop_type_attr` VALUES ('26', '流行', '休闲裤,牛仔裤,西裤\r\n', '0', '5');
INSERT INTO `shop_type_attr` VALUES ('25', '裤长', '长裤,九分裤,短裤,七分裤/九分裤,七分裤,五分裤,超短裤\r\n', '0', '5');
INSERT INTO `shop_type_attr` VALUES ('6', '电视形态', '分体,平板,曲面', '0', '1');
INSERT INTO `shop_type_attr` VALUES ('7', '采购地', '中国大陆,亚太,其他海外地区,日本,欧洲,港澳台,美国,韩国\r\n', '0', '1');
INSERT INTO `shop_type_attr` VALUES ('8', '分辨率', '4K超高清（3840x2160）,高清（1366x768）,全高清（1920x1080）', '0', '1');
INSERT INTO `shop_type_attr` VALUES ('9', '面板类型', 'VA,IPS,TN,CPA面板,X-GEN超晶面板,其他/other,ExtraView,pdp,ADSDS', '0', '1');
INSERT INTO `shop_type_attr` VALUES ('10', '套餐类型', '套餐一,套餐二,套餐三,套餐四,套餐五', '1', '1');
INSERT INTO `shop_type_attr` VALUES ('11', '背光灯类型', 'LED发光二极管,CCFL冷阴极荧灯管,PDP屏幕自发灯', '0', '1');
INSERT INTO `shop_type_attr` VALUES ('12', '屏幕尺寸', '32英寸及以下,39-40英寸,42-43英寸,48-49英寸,50-52英寸,55英寸,58-60英寸,65英寸,70英寸及以上', '0', '1');
INSERT INTO `shop_type_attr` VALUES ('13', '袖长', '无袖,短袖,长袖,五分袖/中袖,七分袖,九分袖', '0', '8');
INSERT INTO `shop_type_attr` VALUES ('14', '款式', '直筒型,修身型,宽松型,蝙蝠型,斗篷型,高腰型,裙摆型,不规则型', '0', '8');
INSERT INTO `shop_type_attr` VALUES ('15', '衣长', '超短,短款,中长,长款,加长款', '0', '8');
INSERT INTO `shop_type_attr` VALUES ('16', '袖型', '常规袖,泡泡袖,蝙蝠袖,露肩袖,荷叶袖,灯笼袖,喇叭袖,耸肩,堆堆袖,衬衫袖,花瓣袖', '0', '8');
INSERT INTO `shop_type_attr` VALUES ('17', '领型', '圆领,V领,一字领,翻领,立领,高领,方领,堆堆领,海军领,斜领,娃娃领,围巾领,半高领,西装领,荷叶领,双层领,连帽/帽领,不规则领', '0', '8');
INSERT INTO `shop_type_attr` VALUES ('18', '流行元素', '蝴蝶结,荷叶边,铆钉,流苏,破洞,镂空,肩章,镶钻,露背,贴布,链条,褶皱,钩花,口袋,系带/腰带,拼接,立体装饰,不对称,扎染,钉珠,做旧,亮片,纱网,拉链,纽扣,卷边,印花/印染,背带,Bling Bling,木耳边,风琴褶,渐变,手工,花边,珍珠,羽毛,刺绣,水洗,磨白,磨破,糖果色,冰淇淋色', '0', '8');
INSERT INTO `shop_type_attr` VALUES ('19', '图案', '条纹,格子,纯色,手绘,碎花,几何图案,花朵,水果图案,动物图案,字母,人物,波点,大花,菱格,风景图案,植物图案,卡通图案,动物纹,斑马纹,豹纹,千鸟格,骷髅头,脸谱,蝴蝶结,爱心,米字旗/国旗,渐变,涂鸦,数字,文字', '0', '8');
INSERT INTO `shop_type_attr` VALUES ('20', '流派', '韩版,日系,欧美,英伦,中式,杭派', '0', '8');
INSERT INTO `shop_type_attr` VALUES ('21', '面料主材', '雪纺,真丝,灯芯绒,蕾丝,化纤,亚麻,聚酯/涤纶,尼龙,锦纶,羊绒/开司米,羊毛,棉混纺,精梳棉,丝光棉,棉加莱卡,棉麻,色丁/五枚缎,毛呢,厚锻,亮锻,水晶砂,欧根纱,网格纱,丝绸,锦缎,绢纺,天鹅绒,纯棉,蚕丝,莫代尔,竹纤维,腈纶,奥纶,开司米纶,兔毛', '0', '8');
INSERT INTO `shop_type_attr` VALUES ('22', '适合人群', '青年,中年,老年,情侣', '0', '8');
INSERT INTO `shop_type_attr` VALUES ('23', '颜色', '红色,白色,黑色', '1', '8');
INSERT INTO `shop_type_attr` VALUES ('24', '尺码', 'S,M,L,XL,XXL,XXXL,XXXXL', '1', '8');
INSERT INTO `shop_type_attr` VALUES ('30', '颜色', '红色,蓝色,紫色', '1', '9');

-- ----------------------------
-- Table structure for `shop_user`
-- ----------------------------
DROP TABLE IF EXISTS `shop_user`;
CREATE TABLE `shop_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` char(30) NOT NULL DEFAULT '' COMMENT '账号',
  `username` char(30) NOT NULL DEFAULT '' COMMENT '用户名称',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(45) NOT NULL DEFAULT '' COMMENT '邮箱',
  `telphone` varchar(20) NOT NULL DEFAULT '' COMMENT '固定电话',
  `cellphone` varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  `money` decimal(9,2) DEFAULT '0.00',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of shop_user
-- ----------------------------
INSERT INTO `shop_user` VALUES ('1', 'lin462441355', '小林', '8cdf2bc368b104e12c9cdd7a9c99f3dc', '462441355@qq.com', '688588', '13758735532', '3130.00');
INSERT INTO `shop_user` VALUES ('6', 'admin888', 'admin888', '7fef6171469e80d32c0559f88b377245', '462441355@qq.com', '', '', '5397.00');

-- ----------------------------
-- Table structure for `shop_user_info`
-- ----------------------------
DROP TABLE IF EXISTS `shop_user_info`;
CREATE TABLE `shop_user_info` (
  `ind` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sex` enum('男','女','保密') NOT NULL DEFAULT '男' COMMENT '�',
  `birthday` varchar(45) NOT NULL DEFAULT '' COMMENT '生日',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `wedlock` enum('未婚','已婚','保密') NOT NULL DEFAULT '保密' COMMENT '婚姻',
  `revenue` tinyint(4) NOT NULL DEFAULT '0' COMMENT '月',
  `idcard` varchar(20) NOT NULL DEFAULT '' COMMENT '身份证',
  `education` tinyint(4) NOT NULL DEFAULT '0' COMMENT '教育',
  `user_thum` varchar(45) NOT NULL DEFAULT '' COMMENT '头像',
  `shop_user_uid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`ind`),
  KEY `fk_shop_user_info_shop_user1_idx` (`shop_user_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='用户信息表';

-- ----------------------------
-- Records of shop_user_info
-- ----------------------------
INSERT INTO `shop_user_info` VALUES ('1', '保密', '2008-10-15', '小林', '已婚', '2', '330324199411054930', '3', 'Upload/Content/16/08/221472116976.jpg', '1');
INSERT INTO `shop_user_info` VALUES ('2', '男', '', '', '保密', '0', '', '0', '', '2');
INSERT INTO `shop_user_info` VALUES ('3', '男', '', '', '保密', '0', '', '0', '', '3');
INSERT INTO `shop_user_info` VALUES ('4', '男', '', '', '保密', '0', '', '0', '', '4');
INSERT INTO `shop_user_info` VALUES ('5', '男', '', '', '保密', '0', '', '0', '', '5');
INSERT INTO `shop_user_info` VALUES ('6', '男', '2003-2-14', '', '保密', '0', '330324199411054930', '0', '', '6');

-- ----------------------------
-- Table structure for `shop_webset`
-- ----------------------------
DROP TABLE IF EXISTS `shop_webset`;
CREATE TABLE `shop_webset` (
  `wid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` varchar(100) NOT NULL DEFAULT '' COMMENT '配置项名称',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '配置标题',
  `type_id` tinyint(3) NOT NULL DEFAULT '0' COMMENT '类型id',
  PRIMARY KEY (`wid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='站点配置';

-- ----------------------------
-- Records of shop_webset
-- ----------------------------
INSERT INTO `shop_webset` VALUES ('1', 'COPY_INFO', 'Copyright © 2010-2015 houdunwang.com All Rights Reserved', '网站信息', '1');
INSERT INTO `shop_webset` VALUES ('2', 'COPY_NUM', '京ICP备12048441号-3', '网站备案号', '1');
