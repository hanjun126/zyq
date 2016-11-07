/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 创建数据库
DROP DATABASE IF EXISTS zyq;			-- 删除数据库
CREATE DATABASE IF NOT EXISTS zyq;	-- 创建数据库
USE zyq;								-- 使用数据库

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 创建用户并授权
-- CREATE USER 'test'@'%' IDENTIFIED BY 'test';
-- GRANT SELECT,INSERT,UPDATE,DELETE ON pm.* TO 'test'@'%';
-- 导出数据库
-- mysqldump -u root -p dataname >dataname.sql 
-- 导出一个表
-- mysqldump -u root -p dataname tablename> dataname_tablename.sql 
-- source命令
-- mysql>use dbname
-- mysql>source d:\db.sql

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 配置表，进行通用属性配置，如公司名称，联系方式等等
CREATE TABLE IF NOT EXISTS `zyq_config` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `ckey` VARCHAR(20) NOT NULL COMMENT '键',
  `cvalue` VARCHAR(1000) NOT NULL COMMENT '值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='配置表';

-- 初始化配置
INSERT INTO zyq_config (ckey, cvalue) VALUES
('wzbt', '逸家盛宇网上商城'),	/*网站标题*/
('wzbq', 'Copyright@2015-2016 成都逸家盛宇 版权所有 蜀ICP备10206706号-7'),	/*网站版权*/
('gsjc', '逸家盛宇'),	/*公司简称*/
('gsqc', '逸家盛宇办公家具有限公司'),	/*公司全称*/
('gsdz', '四川省 成都市 双流家具工业园胜创路888号'),	/*公司地址*/
('rxdh', '400-888-888'),	/*热线电话*/
('qyqq', '278320074'),		/*企业QQ*/
('qyyx', 'yjct@163.com'),	/*企业邮箱*/
('fwsd', '8:00-24:00');		/*服务时段*/

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 轮播表
CREATE TABLE IF NOT EXISTS `zyq_carousel` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `imgpath` VARCHAR(260) NOT NULL COMMENT '图片路径',
  `url` VARCHAR(260) NOT NULL COMMENT '超链接url',
  `title` VARCHAR(60) NOT NULL DEFAULT "" COMMENT '标题',
  `alt` VARCHAR(60) NOT NULL DEFAULT "" COMMENT '提示',
  `sort` INT NOT NULL DEFAULT 0 COMMENT '排序',
  `enable` INT NOT NULL DEFAULT 0 COMMENT '是否可用，0-可用，1-不可用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='轮播表';

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 管理员表
CREATE TABLE IF NOT EXISTS `zyq_admin` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `acount` VARCHAR(20) NOT NULL UNIQUE COMMENT '账号',
  `pwd` VARCHAR(32) NOT NULL COMMENT '密码',
  `name` VARCHAR(20) NOT NULL DEFAULT "" COMMENT '姓名',
  `sex` INT NOT NULL DEFAULT 0 COMMENT '性别，0-男，1-女',
  `pri` INT NOT NULL DEFAULT 0 COMMENT '权限, 0-普通，1-高级，2-特级',
  `regtime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- 测试数据
INSERT INTO zyq_admin (acount, name, pwd, sex, pri) VALUES
('admin', '张三', md5('88888888'), 0, 0),
('admin1', '李四', md5('88888888'), 1, 1),
('admin2', '王二', md5('88888888'), 0, 2),
('admin3', '麻子', md5('88888888'), 1, 2),
('admin4', '测试', md5('88888888'), 0, 1);

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 用户表
CREATE TABLE IF NOT EXISTS `zyq_user` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `usertype` INT NOT NULL DEFAULT 0 COMMENT '用户类型，0-个人用户，1-企业用户',
  `phone` VARCHAR(20) NOT NULL UNIQUE COMMENT '手机号码',
  `email` VARCHAR(100) NOT NULL DEFAULT "" COMMENT '邮箱',
  `pwd` VARCHAR(32) NOT NULL COMMENT '密码',
  `name` VARCHAR(20) NOT NULL DEFAULT "" COMMENT '姓名',
  `sex` INT NOT NULL DEFAULT 0 COMMENT '性别，0-男，1-女',
  `regplace` VARCHAR(20) NOT NULL DEFAULT "" COMMENT '注册地点',
  `regtime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

-- 测试数据
INSERT INTO zyq_user (usertype, phone, email, pwd, name, regplace) VALUES
(0, '13281819620', 'user1@qq.com', md5('88888888'), '测试1', '成都'),
(0, '13281819621', 'user2@qq.com', md5('88888888'), '测试2', '成都'),
(0, '13281819622', 'user3@qq.com', md5('88888888'), '测试3', '成都'),
(1, '13281819623', 'user4@qq.com', md5('88888888'), '测试4', '成都'),
(0, '13281819624', 'user5@qq.com', md5('88888888'), '测试5', '成都'),
(0, '13281819625', 'user6@qq.com', md5('88888888'), '测试6', '成都'),
(0, '13281819626', 'user7@qq.com', md5('88888888'), '测试7', '成都'),
(1, '13281819627', 'user8@qq.com', md5('88888888'), '测试8', '成都'),
(0, '13281819628', 'user9@qq.com', md5('88888888'), '测试9', '成都'),
(0, '13281819629', 'user10@qq.com', md5('88888888'), '测试10', '成都'),
(0, '13281819630', 'user11@qq.com', md5('88888888'), '测试11', '成都'),
(0, '13281819631', 'user12@qq.com', md5('88888888'), '测试12', '成都'),
(1, '13281819632', 'user13@qq.com', md5('88888888'), '测试13', '成都');

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 第三方账号
CREATE TABLE IF NOT EXISTS `zyq_third` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `userid` INT NOT NULL COMMENT '外键，用户表id',
  `acount` VARCHAR(60) NOT NULL UNIQUE COMMENT '第三方账号',
  `pwd` CHAR(32) NOT NULL DEFAULT "" COMMENT '密码，MD5加密',
  `token` CHAR(32) NOT NULL COMMENT '标识',
  `thirdtype` INT NOT NULL COMMENT '第三方账号类型，0-qq，1-新浪微博，2-网易邮箱，……',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`userid`) REFERENCES `zyq_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='第三方账号';

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 常用送货地址
CREATE TABLE IF NOT EXISTS `zyq_address` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `userid` INT NOT NULL COMMENT '外键，用户表id',
  `contact` VARCHAR(20) NOT NULL COMMENT '联系人',
  `phone` VARCHAR(20) NOT NULL COMMENT '联系电话',
  `address` VARCHAR(200) NOT NULL COMMENT '地址',
  `post` CHAR(6) COMMENT '邮编',
  `def` INT NOT NULL DEFAULT 0 COMMENT '是否默认地址，0-否，1-是',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`userid`) REFERENCES `zyq_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='常用送货地址';

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 无极限类别表
CREATE TABLE IF NOT EXISTS `zyq_category` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `pid` INT NOT NULL DEFAULT 0 COMMENT '父id',
  `idpath` VARCHAR(1000) NOT NULL COMMENT 'id路径，如：0;1;2;',
  `lv` INT NOT NULL DEFAULT 0 COMMENT '等级',
  
  `name` VARCHAR(60) NOT NULL COMMENT '名称',
  `sort` INT NOT NULL DEFAULT 0 COMMENT '排序',
  `enable` INT NOT NULL DEFAULT 0 COMMENT '是否可用，0-可用，1-不可用',
  `title` VARCHAR(200) NOT NULL DEFAULT "" COMMENT '页面标题-用于搜索引擎',
  `keywords` VARCHAR(100) NOT NULL DEFAULT "" COMMENT '页面关键字-用于搜索引擎',
  `description` VARCHAR(200) NOT NULL DEFAULT "" COMMENT '页面描述-用于搜索引擎',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='无极限类别表';

-- 初始化
ALTER TABLE zyq_category AUTO_INCREMENT 1;
INSERT INTO zyq_category (name, pid, idpath) VALUES
('产品分类', 0, '-0-'),	/*产品分类*/
('内容分类', 0, '-0-');	/*内容分类*/

ALTER TABLE zyq_category AUTO_INCREMENT 10001;
INSERT INTO zyq_category (name, pid, idpath, lv) VALUES
('办公椅子', 1, '-0-1-', 1), ('办公桌子', 1, '-0-1-', 1), ('办公沙发', 1, '-0-1-', 1),
('办公柜子', 1, '-0-1-', 1), ('办公配件', 1, '-0-1-', 1),	/*一级分类*/

('主管椅', 10001, '-0-1-10001-', 2), ('职员椅', 10001, '-0-1-10001-', 2),
('大班椅', 10001, '-0-1-10001-', 2), ('班椅', 10001, '-0-1-10001-', 2),	/*二级分类*/

('主管沙发', 10002, '-0-1-10002-', 2), ('迎宾沙发', 10002, '-0-1-10002-', 2),	/*二级分类*/

('班台', 10003, '-0-1-10003-', 2), ('接待台', 10003, '-0-1-10003-', 2), ('主管桌', 10003, '-0-1-10003-', 2),
('会议桌', 10003, '-0-1-10003-', 2), ('茶几', 10003, '-0-1-10003-', 2), ('屏风办公桌', 10003, '-0-1-10003-', 2),
('高隔间办公桌', 10003, '-0-1-10003-', 2),	/*二级分类*/

('文件柜', 10004, '-0-1-10004-', 2), ('储物柜', 10004, '-0-1-10004-', 2),
('书柜', 10004, '-0-1-10004-', 2),	/*二级分类*/

('屏风', 10005, '-0-1-10005-', 2), ('阅览架', 10005, '-0-1-10005-', 2),
('黑板', 10005, '-0-1-10005-', 2);	/*二级分类*/

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 内容管理表
CREATE TABLE IF NOT EXISTS `zyq_cms` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `categoryid` INT NOT NULL COMMENT '外键，类别id，用于级联删除',
  `title` VARCHAR(200) NOT NULL COMMENT '标题',
  `keywords` VARCHAR(100) NOT NULL DEFAULT "" COMMENT '页面关键字-用于搜索引擎',
  `description` VARCHAR(200) NOT NULL DEFAULT "" COMMENT '页面描述-用于搜索引擎',
  `content` LONGBLOB NOT NULL COMMENT '内容',
  `sort` INT NOT NULL DEFAULT 0 COMMENT '排序',
  `cmstime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
  `enable` INT NOT NULL DEFAULT 0 COMMENT '是否可用，0-可用，1-不可用',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`categoryid`) REFERENCES `zyq_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='内容管理表';

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 商品属性表
CREATE TABLE IF NOT EXISTS `zyq_attr` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `akey` VARCHAR(20) NOT NULL COMMENT '关键字',
  `avalue` VARCHAR(200) NOT NULL COMMENT '属性值',
  `sort` INT NOT NULL DEFAULT 0 COMMENT '排序',
  `enable` INT NOT NULL DEFAULT 0 COMMENT '是否可用，0-可用，1-不可用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品属性表';

INSERT INTO zyq_attr (akey, avalue) VALUES
/*颜色*/
('color', '银白色'), ('color', '经典黑'), ('color', '朱红色'), ('color', '橘黄色'), ('color', '天蓝色'),
/*材质*/
('texture', '不锈钢'), ('texture', '不锈钢'),
/*风格*/
('style', '现代'), ('style', '古典'), ('style', '欧式'), ('style', '田园'), ('style', '经典');

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 商品表
CREATE TABLE IF NOT EXISTS `zyq_goods` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `categoryid` INT NOT NULL COMMENT '外键，类别表id',
  `colorid` INT NOT NULL COMMENT '外键，属性表id，颜色',
  `textureid` INT NOT NULL COMMENT '外键，属性表id，材质',
  `styleid` INT NOT NULL COMMENT '外键，属性表id，样式',
  
  `marquemajor` VARCHAR(60) NOT NULL COMMENT '商品型号-主要，如KFY-JH-1307',
  `marqueminor` VARCHAR(60) NOT NULL COMMENT '商品型号-次要，如ZZJ',
  `title` VARCHAR(60) NOT NULL COMMENT '标题',
  `usp` VARCHAR(160) NOT NULL COMMENT '卖点',
  `specs` VARCHAR(100) NOT NULL COMMENT '规格，即1200mm X 800mm X 34mm',
  `price` DECIMAL(10,2) NOT NULL DEFAULT 0.00 COMMENT '价格',
  `discount` DECIMAL(10,2) NOT NULL DEFAULT 1.00 COMMENT '折扣',
  `saleprice` DECIMAL(10,2) NOT NULL DEFAULT 0.00 COMMENT '销售价',
  `amount` INT NOT NULL DEFAULT 0 COMMENT '数量',
  
  `imghome` VARCHAR(260) NOT NULL COMMENT '图片-主图，规格500px * 500px',
  `imgshow1` VARCHAR(260) DEFAULT "" COMMENT '图片-附加1，规格500px * 500px',
  `imgshow2` VARCHAR(260) DEFAULT "" COMMENT '图片-附加2，规格500px * 500px',
  `imgshow3` VARCHAR(260) DEFAULT "" COMMENT '图片-附加3，规格500px * 500px',
  `imgshow4` VARCHAR(260) DEFAULT "" COMMENT '图片-附加4，规格500px * 500px',
  `imgslider` VARCHAR(260) DEFAULT "" COMMENT '图片-轮播，规格1800px * 60px',
  `descpc` LONGBLOB COMMENT '商品描述-pc端',
  `descmobile` LONGBLOB COMMENT '商品描述-手机端',
  `sales` INT NOT NULL DEFAULT 0 COMMENT '销量',
  `browse` INT NOT NULL DEFAULT 0 COMMENT '浏览',
  `sort` INT NOT NULL DEFAULT 0 COMMENT '排序',
  `modifytime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '修改日期时间，2015-12-12 12:12:12',
  `addtime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加日期，2015-12-12 12:12:12',
  `enable` INT NOT NULL DEFAULT 0 COMMENT '是否可用，0-可用，1-不可用',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`categoryid`) REFERENCES `zyq_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`colorid`) REFERENCES `zyq_attr` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`textureid`) REFERENCES `zyq_attr` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`styleid`) REFERENCES `zyq_attr` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品表';

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 商品收藏表
CREATE TABLE IF NOT EXISTS `zyq_collection` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `userid` INT NOT NULL COMMENT '外键，用户表id',
  `goodsid` INT NOT NULL COMMENT '外键，商品表id',
  `collecttime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '收藏时间',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`userid`) REFERENCES `zyq_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`goodsid`) REFERENCES `zyq_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商品收藏表';

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 购物车表
CREATE TABLE IF NOT EXISTS `zyq_cart` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `userid` INT NOT NULL COMMENT '外键，用户表id',
  `goodsid` INT NOT NULL COMMENT '外键，商品表id',
  `goodscount` INT NOT NULL COMMENT '商品数量',
  `addtime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '加入时间',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`userid`) REFERENCES `zyq_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`goodsid`) REFERENCES `zyq_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='购物车表';

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 评论表
CREATE TABLE IF NOT EXISTS `zyq_review` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `userid` INT NOT NULL COMMENT '外键，用户表id',
  `goodsid` INT NOT NULL COMMENT '外键，商品表id',
  `review` varchar(2000) NOT NULL COMMENT '评论',
  `star` INT NOT NULL DEFAULT 0 COMMENT '星级',
  `reviewtime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '评论时间，2015-12-12 12:12:12',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`userid`) REFERENCES `zyq_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`goodsid`) REFERENCES `zyq_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评论表';

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 订单表
CREATE TABLE IF NOT EXISTS `zyq_order` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `userid` INT NOT NULL COMMENT '外键，用户表id',
  `sn` VARCHAR(100) NOT NULL COMMENT '订单号',
  `amount` INT NOT NULL DEFAULT 0 COMMENT '商品数量',
  `total` DECIMAL(7,2) NOT NULL DEFAULT 0.00 COMMENT '总价',
  `ordertime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '下单时间，2015-12-12 12:12:12',
  `status` INT NOT NULL DEFAULT 0 COMMENT '状态，0-已下单，1-已支付，2-已确认，3-已发货，4-已收货',
  `pay` INT NOT NULL DEFAULT 0 COMMENT '是否支付，0-否，1-是',
  `paytype` INT NOT NULL DEFAULT 0 COMMENT '支付方式，0-现金，1-网银，2-信用卡支付，3-微信支付，4-支付宝支付',
  `paytime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '支付时间，2015-12-12 12:12:12',
  -- 送货地址
  `contact` VARCHAR(20) NOT NULL COMMENT '联系人',
  `phone` VARCHAR(20) NOT NULL COMMENT '联系电话',
  `address` VARCHAR(200) NOT NULL COMMENT '地址',
  `post` CHAR(6) COMMENT '邮编',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`userid`) REFERENCES `zyq_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表';

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 订单详情表
CREATE TABLE IF NOT EXISTS `zyq_order_detail` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `orderid` INT NOT NULL COMMENT '外键，订单表id',
  `goodsid` INT NOT NULL COMMENT '外键，商品表id',
  `goodscount` INT NOT NULL COMMENT '商品数量',
  `price` DECIMAL(10,2) NOT NULL COMMENT '价格',
  `discount` DECIMAL(10,2) NOT NULL COMMENT '折扣',
  `saleprice` DECIMAL(10,2) NOT NULL COMMENT '销售价',
  PRIMARY KEY (`id`),
  FOREIGN KEY (`orderid`) REFERENCES `zyq_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`goodsid`) REFERENCES `zyq_goods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单详情表';

/*--------------------------------------------------------------------
--------------------------------------------------------------------*/
-- 案例表
CREATE TABLE IF NOT EXISTS `zyq_case` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '主键，自动增长',
  `title` VARCHAR(60) NOT NULL COMMENT '标题',
  `usp` VARCHAR(200) NOT NULL COMMENT '卖点',
  `style` VARCHAR(20) NOT NULL COMMENT '风格',
  `area` INT(10) NOT NULL COMMENT '面积，单位m2-平米',
  `totalprice` INT(10) NOT NULL COMMENT '总价，人民币，单位元',
  `address` VARCHAR(200) NOT NULL COMMENT '地址',
  `imgpathcover` VARCHAR(260) NOT NULL COMMENT '封面图片路径',
  `detail` LONGBLOB NOT NULL COMMENT '产品详情',
  `sort` INT NOT NULL DEFAULT 0 COMMENT '排序',
  `modifytime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '修改日期时间，2015-12-12 12:12:12',
  `addtime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '添加日期，2015-12-12 12:12:12',
  `enable` INT(10) NOT NULL DEFAULT 0 COMMENT '是否可用，0-可用，1-不可用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='案例表';
