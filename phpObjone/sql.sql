DROP DATABASE IF EXISTS WSPpro;
CREATE DATABASE WSPpro DEFAULT CHARACTER SET 'UTF8' COLLATE 'utf8_general_ci';
USE WSPpro;


-- 角色列表
CREATE table sp_permis(
 	sp_permis_id SMALLINT UNSIGNED not null auto_increment PRIMARY KEY COMMENT "角色ID",
 	sp_permis_name VARCHAR(30) not null DEFAULT '' COMMENT "角色名称",
 	sp_describe VARCHAR(50) COMMENT "角色描述" 
 )ENGINE = INNODB charset = utf8;

-- 插入角色列表
insert into sp_permis(sp_permis_name,sp_describe) VALUES('超级管理员','系统管理员'),('经理','添加员工查看报表'),('客服','客服人员'),('普通业务员','业务员');


-- 创建后台管理员表
CREATE table sp_admin(
	admin_id SMALLINT UNSIGNED not null auto_increment PRIMARY KEY COMMENT "管理员编号",
	admin_name VARCHAR(30) not null DEFAULT '' COMMENT "管理员名称",
	admin_psd VARCHAR(50) not null DEFAULT '' COMMENT "管理员密码",
	admin_email VARCHAR(50) not null DEFAULT '' COMMENT "管理员邮箱",
	admin_addtime int UNSIGNED not null DEFAULT 0 COMMENT "添加时间",
  admin_permis SMALLINT UNSIGNED DEFAULT 1 COMMENT "权限管理",
--   admin_permis enum("1","2","3","4") DEFAULT 1 COMMENT "权限管理",
  foreign key(admin_permis) references sp_permis(sp_permis_id)	
)ENGINE = INNODB charset = utf8 COMMENT "管理员表";
-- 插入一条管理员 用户名 密码 都为admin
insert into sp_admin(admin_name,admin_psd,admin_email,admin_permis) VALUES('admin',MD5('admin'),'admin@admin.com',1);


-- 员工表
CREATE table sp_employees(	
  sp_emp_accountId VARCHAR(30) not null PRIMARY KEY COMMENT "用户账户",
	sp_emp_name VARCHAR(30) default "" COMMENT "用户名称",
	sp_emp_state enum("1","2","3") DEFAULT 1 COMMENT "用户状态",
  sp_emp_permis SMALLINT UNSIGNED DEFAULT 1 COMMENT "用户角色",
	FOREIGN KEY(sp_emp_permis) REFERENCES sp_permis(sp_permis_id)
)ENGINE=InnoDB CHARSET=utf8 COMMENT='员工表';


-- 品牌
 CREATE TABLE sp_brand(
 	brand_id int(11) unsigned NOT NULL PRIMARY KEY DEFAULT '10001' COMMENT '品牌ID',
 	brand_name VARCHAR(30) NOT NULL DEFAULT '' COMMENT "品牌名称"
);
-- 插入品牌
INSERT INTO sp_brand(brand_id, brand_name) VALUES
(10001, '阿迪达斯'),
(10002, '耐克'),
(10003, '安踏'),
(10004, 'JOINFIT'),
(10005, '跑能'),
(10006, 'UNDER ARMOUR'),
(10007, '特步'),
(10008, '匹克'),
(10009, '贵人鸟'),
(10010, '361度'),
(10011, 'Salomon'),
(10012, 'Mizuno'),
(10013, '多威'),
(10014, '必迈'),
(10015, 'NATAPER'),
(10016, 'Tecnica'),
(10017, 'Vibram'),
(10018, 'NORTHLAND'),
(10019, 'Inov8'),
(10020, 'Brooks'),
(10021, 'Skora'),
(10022, 'Saucony'),
(10023, '李宁'),
(10024, 'Merrell'),
(10025, 'Newton'),
(10026, 'Skechers'),
(10027, 'Reebok'),
(10028, 'HokaOneOne'),
(10029, 'La Sportiva'),
(10030, 'Puma'),
(10031, 'New Balance'),
(10032, 'The North Face'),
(10033, 'Asics'),
(10034, '乔丹'),
(10035, '德尔惠'),
(10036, '鸿星尔克'),
(20001, 'XS'),
(30001, '小米'),
(30002, 'DISCOVER');


-- 创建图片id
CREATE TABLE main_img(
 	main_img_id int(11) unsigned NOT NULL PRIMARY KEY DEFAULT '1001' COMMENT '主图id',
  	main_img_url VARCHAR(80) NOT NULL DEFAULT '' COMMENT "主图地址"
);
-- -- 插入图片
 INSERT INTO main_img(main_img_id, main_img_url) VALUES
 (1001,'www.url.com/main.jpg1'),
 (1002,'www.url.com/main.jpg2'),
 (1003,'www.url.com/main.jpg3'),
 (1004,'www.url.com/main.jpg4');




-- 商品列表
  CREATE TABLE sp_goods(
    sp_id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
    sp_goods_name varchar(64) NOT NULL COMMENT '商品名称',
    brand_id int(11) unsigned NOT NULL DEFAULT '10001' COMMENT '品牌ID',
    main_img_id int(10) unsigned NOT NULL DEFAULT '10001' COMMENT '主图ID，对应商品图片ID',
    minimum_price float NOT NULL COMMENT '最低价',
    highest_price float NOT NULL COMMENT '最高价',
    sp_inventory int(10) UNSIGNED not null COMMENT "商品库存",
    goods_status int(11) NOT NULL COMMENT '商品状态',
    update_time int(11) NOT NULL DEFAULT '0' COMMENT '上架时间',
    create_time int(11) NOT NULL DEFAULT '0' COMMENT '发布时间',
    PRIMARY KEY (sp_id),
 	  FOREIGN KEY(brand_id) REFERENCES sp_brand(brand_id),
 	  FOREIGN KEY(main_img_id) REFERENCES main_img(main_img_id)
 ) ENGINE=InnoDB CHARSET=utf8 COMMENT='商品表';




