SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `shop_edu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `shop_edu` ;

-- -----------------------------------------------------
-- Table `shop_edu`.`shop_admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_admin` (
  `uid` INT UNSIGNED NULL AUTO_INCREMENT,
  `user` CHAR(30) NOT NULL DEFAULT '' COMMENT '账户',
  `username` CHAR(30) NOT NULL DEFAULT '' COMMENT '账户名称',
  `userpassword` CHAR(32) NOT NULL DEFAULT '' COMMENT '账户密码',
  `logintime` INT(10) NOT NULL DEFAULT 0 COMMENT '登陆时间',
  `loginip` CHAR(15) NOT NULL DEFAULT '' COMMENT '登陆IP',
  `islock` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '锁',
  PRIMARY KEY (`uid`),
  UNIQUE INDEX `user_UNIQUE` (`user` ASC))
ENGINE = MyISAM
COMMENT = '后台用户表';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_brand`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_brand` (
  `bid` INT UNSIGNED NULL AUTO_INCREMENT,
  `bname` VARCHAR(20) NOT NULL DEFAULT '',
  `logo` VARCHAR(60) NOT NULL DEFAULT '' COMMENT '图片地址',
  `sort` SMALLINT(6) NOT NULL DEFAULT 0,
  PRIMARY KEY (`bid`))
ENGINE = MyISAM
COMMENT = '品牌表';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_type`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_type` (
  `tid` INT UNSIGNED NULL AUTO_INCREMENT,
  `tname` CHAR(15) NOT NULL DEFAULT '' COMMENT '类型名称',
  PRIMARY KEY (`tid`))
ENGINE = MyISAM
COMMENT = '类型表';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_category` (
  `cid` INT UNSIGNED NULL AUTO_INCREMENT,
  `cname` CHAR(15) NOT NULL DEFAULT '' COMMENT '分类名称',
  `pid` INT(10) NOT NULL DEFAULT 0 COMMENT '父级ID',
  `sort` SMALLINT(6) NOT NULL DEFAULT 0 COMMENT '排序',
  `shop_type_tid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`cid`),
  INDEX `fk_shop_category_shop_type_idx` (`shop_type_tid` ASC))
ENGINE = MyISAM
COMMENT = '分类';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_type_attr`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_type_attr` (
  `taid` INT UNSIGNED NULL AUTO_INCREMENT,
  `taname` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '类型属性的名称',
  `tavalue` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '类型属性的值',
  `class` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '类型属性的类别 0位属性 1为规格',
  `shop_type_tid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`taid`),
  INDEX `fk_shop_type_attr_shop_type1_idx` (`shop_type_tid` ASC))
ENGINE = MyISAM
COMMENT = '类型属性';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_lists`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_lists` (
  `gid` INT UNSIGNED NULL AUTO_INCREMENT,
  `gname` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '商品名称',
  `gnumber` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '商品货号',
  `unit` CHAR(5) NOT NULL DEFAULT '' COMMENT '计件单位',
  `marketprice` DECIMAL(10) NOT NULL DEFAULT 0 COMMENT '市场价格',
  `shopprice` DECIMAL(10) NOT NULL DEFAULT 0 COMMENT '商城价格',
  `pic` VARCHAR(60) NOT NULL DEFAULT '' COMMENT '列表图地址',
  `num` SMALLINT NOT NULL DEFAULT 0 COMMENT '销售量',
  `time` INT NOT NULL DEFAULT 0 COMMENT '上架时间',
  `inventory` SMALLINT NOT NULL DEFAULT 0,
  `shop_brand_bid` INT UNSIGNED NOT NULL,
  `shop_admin_uid` INT UNSIGNED NOT NULL,
  `shop_category_cid` INT UNSIGNED NOT NULL,
  `shop_type_tid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`gid`),
  INDEX `fk_shop_lists_shop_brand1_idx` (`shop_brand_bid` ASC),
  INDEX `fk_shop_lists_shop_admin1_idx` (`shop_admin_uid` ASC),
  INDEX `fk_shop_lists_shop_category1_idx` (`shop_category_cid` ASC),
  INDEX `fk_shop_lists_shop_type1_idx` (`shop_type_tid` ASC))
ENGINE = MyISAM
COMMENT = '商品列表';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_list_attr`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_list_attr` (
  `gtid` INT UNSIGNED NULL AUTO_INCREMENT,
  `gtvalue` CHAR(15) NULL COMMENT '商品属性值',
  `added` DECIMAL(10) NULL COMMENT '附加价格',
  `shop_type_attr_taid` INT UNSIGNED NOT NULL,
  `shop_lists_gid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`gtid`),
  INDEX `fk_shop_list_attr_shop_type_attr1_idx` (`shop_type_attr_taid` ASC),
  INDEX `fk_shop_list_attr_shop_lists1_idx` (`shop_lists_gid` ASC))
ENGINE = MyISAM
COMMENT = '商品属性';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_arc_cate`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_arc_cate` (
  `cid` INT UNSIGNED NULL AUTO_INCREMENT,
  `cname` CHAR(20) NOT NULL DEFAULT '' COMMENT '分类名称',
  PRIMARY KEY (`cid`))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_arc`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_arc` (
  `wid` INT UNSIGNED NULL AUTO_INCREMENT,
  `title` CHAR(150) NOT NULL DEFAULT '' COMMENT '标题',
  `click` MEDIUMINT(8) NOT NULL DEFAULT 0 COMMENT '点击次数',
  `sendtime` INT(10) NOT NULL DEFAULT 0 COMMENT '发表时间',
  `updatetime` INT(10) NOT NULL DEFAULT 0 COMMENT '修改时间',
  `thumb` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '缩略图',
  `digest` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '摘要',
  `author` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '作者',
  `is_recycle` TINYINT(3) NOT NULL DEFAULT 0 COMMENT '是否在回收站',
  `shop_admin_uid` INT UNSIGNED NOT NULL,
  `shop_arc_cate_cid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`wid`),
  INDEX `fk_shop_active_shop_admin1_idx` (`shop_admin_uid` ASC),
  INDEX `fk_shop_arc_shop_arc_cate1_idx` (`shop_arc_cate_cid` ASC))
ENGINE = MyISAM
COMMENT = '文章表';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_arc_data`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_arc_data` (
  `keywords` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '关键字seo',
  `des` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '关键字seo',
  `content` TEXT NOT NULL COMMENT '文章内容',
  `shop_arc_wid` INT UNSIGNED NOT NULL,
  INDEX `fk_shop_arc_data_shop_arc1_idx` (`shop_arc_wid` ASC))
ENGINE = MyISAM
COMMENT = '文章内容';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_webset`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_webset` (
  `wid` INT UNSIGNED NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '配置项名称',
  `title` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '配置标题',
  `type_id` TINYINT(3) NOT NULL DEFAULT 0 COMMENT '类型id',
  PRIMARY KEY (`wid`))
ENGINE = MyISAM
COMMENT = '站点配置';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_link`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_link` (
  `lid` INT UNSIGNED NULL AUTO_INCREMENT,
  `lname` CHAR(40) NOT NULL DEFAULT '' COMMENT '链接名称',
  `addtime` INT(10) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `url` CHAR(150) NULL COMMENT '链接地址',
  `is_verify` TINYINT(1) NOT NULL DEFAULT 0,
  `sort` SMALLINT(5) NULL COMMENT '排序',
  PRIMARY KEY (`lid`))
ENGINE = MyISAM
COMMENT = '友情链接';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_detail` (
  `small` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '小图地址',
  `intro` TEXT NULL,
  `shop_lists_gid` INT UNSIGNED NOT NULL,
  INDEX `fk_shop_detail_shop_lists1_idx` (`shop_lists_gid` ASC))
ENGINE = MyISAM
COMMENT = '商品详情';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_lis`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_lis` (
  `glid` INT UNSIGNED NULL AUTO_INCREMENT,
  `combine` CHAR(50) NOT NULL DEFAULT '' COMMENT '组合属性ID',
  `number` CHAR(30) NOT NULL DEFAULT '' COMMENT '货品货号',
  `inventory` SMALLINT NOT NULL DEFAULT 0 COMMENT '库存',
  `shop_lists_gid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`glid`),
  INDEX `fk_shop_lis_shop_lists1_idx` (`shop_lists_gid` ASC))
ENGINE = MyISAM
COMMENT = '货品列表';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_user` (
  `uid` INT UNSIGNED NULL AUTO_INCREMENT,
  `account` CHAR(30) NOT NULL DEFAULT '' COMMENT '账号',
  `username` CHAR(30) NOT NULL DEFAULT '' COMMENT '用户名称',
  `password` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '邮箱',
  `telphone` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '固定电话',
  `cellphone` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '手机',
  PRIMARY KEY (`uid`))
ENGINE = MyISAM
COMMENT = '用户表';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_remark`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_remark` (
  `rid` INT UNSIGNED NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '评论标题',
  `content` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '评论内容',
  `star` TINYINT(1) NOT NULL DEFAULT 0 COMMENT '星级，1/2/3/4/5分别是1/2/3/4/5星级',
  `time` INT NOT NULL DEFAULT 0 COMMENT '发表时间',
  `uname` CHAR(30) NULL COMMENT '用户名称',
  `shop_lists_gid` INT UNSIGNED NOT NULL,
  `shop_user_uid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`rid`),
  INDEX `fk_shop_remark_shop_lists1_idx` (`shop_lists_gid` ASC),
  INDEX `fk_shop_remark_shop_user1_idx` (`shop_user_uid` ASC))
ENGINE = MyISAM
COMMENT = '评论表';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_order` (
  `oid` INT UNSIGNED NULL AUTO_INCREMENT,
  `number` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '订单号',
  `consignee` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '收货人',
  `address` VARCHAR(60) NOT NULL DEFAULT '' COMMENT '收货地址',
  `mobile` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '手机',
  `total` DECIMAL NOT NULL DEFAULT 0 COMMENT '价格总计',
  `time` INT NOT NULL DEFAULT 0 COMMENT '生成订单时间',
  `remark` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '备注说明',
  `status` ENUM('未付款','待发货','已发货','已完成') NOT NULL DEFAULT '未付款' COMMENT '订单状态',
  `shop_user_uid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`oid`),
  INDEX `fk_shop_order_shop_user1_idx` (`shop_user_uid` ASC))
ENGINE = MyISAM
COMMENT = '订单表';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_order_list`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_order_list` (
  `olid` INT UNSIGNED NULL AUTO_INCREMENT,
  `quantity` SMALLINT NOT NULL DEFAULT 0 COMMENT '购买数量',
  `subtotal` DECIMAL NOT NULL DEFAULT 0 COMMENT '价格小计',
  `explain` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '备注说明',
  `glid` INT NOT NULL DEFAULT 0 COMMENT '货品ID',
  `glnumber` CHAR(30) NOT NULL DEFAULT '' COMMENT '货品货号',
  `shop_lists_gid` INT UNSIGNED NOT NULL,
  `shop_order_oid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`olid`),
  INDEX `fk_shop_order_list_shop_lists1_idx` (`shop_lists_gid` ASC),
  INDEX `fk_shop_order_list_shop_order1_idx` (`shop_order_oid` ASC))
ENGINE = MyISAM
COMMENT = '订单列表';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_user_info`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_user_info` (
  `ind` INT UNSIGNED NULL AUTO_INCREMENT,
  `sex` ENUM('男','女','保密') NOT NULL DEFAULT '男' COMMENT '�' /* comment truncated */ /*别
*/,
  `birthday` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '生日',
  `name` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `wedlock` ENUM('未婚','已婚','保密') NOT NULL DEFAULT '保密' COMMENT '婚姻',
  `revenue` TINYINT NOT NULL DEFAULT 0 COMMENT '月' /* comment truncated */ /*��入
*/,
  `idcard` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '身份证',
  `education` TINYINT NOT NULL DEFAULT 0 COMMENT '教育',
  `user_thum` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '头像',
  `shop_user_uid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`ind`),
  INDEX `fk_shop_user_info_shop_user1_idx` (`shop_user_uid` ASC))
ENGINE = MyISAM
COMMENT = '用户信息表';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_address` (
  `did` INT UNSIGNED NULL AUTO_INCREMENT,
  `name` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '收货人',
  `region` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '地区',
  `address` VARCHAR(255) NOT NULL DEFAULT '' COMMENT '详细地址',
  `telephone` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '手机',
  `cellphone` VARCHAR(20) NOT NULL DEFAULT '' COMMENT '手机',
  `emil` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '邮箱',
  `addressname` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '地址别名',
  `shop_user_uid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`did`),
  INDEX `fk_shop_address_shop_user1_idx` (`shop_user_uid` ASC))
ENGINE = MyISAM
COMMENT = '用户地址';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_car`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_car` (
  `cid` INT UNSIGNED NULL AUTO_INCREMENT,
  `shopcar` VARCHAR(255) NOT NULL DEFAULT '',
  `shop_user_uid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`cid`),
  INDEX `fk_shop_car_shop_user1_idx` (`shop_user_uid` ASC))
ENGINE = MyISAM
COMMENT = '购物车';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_role`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_role` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '角色名称',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
COMMENT = '角色表';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_role_has_shop_admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_role_has_shop_admin` (
  `shop_role_id` INT UNSIGNED NOT NULL,
  `shop_admin_uid` INT UNSIGNED NOT NULL,
  INDEX `fk_shop_role_has_shop_admin_shop_role1_idx` (`shop_role_id` ASC),
  INDEX `fk_shop_role_has_shop_admin_shop_admin1_idx` (`shop_admin_uid` ASC))
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_node`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_node` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL DEFAULT '',
  `title` VARCHAR(45) NOT NULL DEFAULT '' COMMENT '权限名称',
  `status` TINYINT(2) NOT NULL DEFAULT 0,
  `sort` TINYINT(3) NOT NULL DEFAULT 0 COMMENT '排序',
  `pid` TINYINT(3) NOT NULL DEFAULT 0,
  `leven` TINYINT(3) NOT NULL DEFAULT 0 COMMENT '1为模块2为控制器3为方法',
  PRIMARY KEY (`id`))
ENGINE = MyISAM
COMMENT = '权限表';


-- -----------------------------------------------------
-- Table `shop_edu`.`shop_role_has_shop_node`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `shop_edu`.`shop_role_has_shop_node` (
  `shop_role_id` INT UNSIGNED NOT NULL,
  `shop_node_id` INT UNSIGNED NOT NULL,
  INDEX `fk_shop_role_has_shop_node_shop_role1_idx` (`shop_role_id` ASC),
  INDEX `fk_shop_role_has_shop_node_shop_node1_idx` (`shop_node_id` ASC))
ENGINE = MyISAM;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
