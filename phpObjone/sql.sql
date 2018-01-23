DROP DATABASE IF EXISTS WSPpro;
CREATE DATABASE WSPpro DEFAULT CHARACTER SET 'UTF8' COLLATE 'utf8_general_ci';
USE WSPpro;


-- ��ɫ�б�
CREATE table sp_permis(
 	sp_permis_id SMALLINT UNSIGNED not null auto_increment PRIMARY KEY COMMENT "��ɫID",
 	sp_permis_name VARCHAR(30) not null DEFAULT '' COMMENT "��ɫ����",
 	sp_describe VARCHAR(50) COMMENT "��ɫ����" 
 )ENGINE = INNODB charset = utf8;

-- �����ɫ�б�
insert into sp_permis(sp_permis_name,sp_describe) VALUES('��������Ա','ϵͳ����Ա'),('����','���Ա���鿴����'),('�ͷ�','�ͷ���Ա'),('��ͨҵ��Ա','ҵ��Ա');


-- ������̨����Ա��
CREATE table sp_admin(
	admin_id SMALLINT UNSIGNED not null auto_increment PRIMARY KEY COMMENT "����Ա���",
	admin_name VARCHAR(30) not null DEFAULT '' COMMENT "����Ա����",
	admin_psd VARCHAR(50) not null DEFAULT '' COMMENT "����Ա����",
	admin_email VARCHAR(50) not null DEFAULT '' COMMENT "����Ա����",
	admin_addtime int UNSIGNED not null DEFAULT 0 COMMENT "���ʱ��",
  admin_permis SMALLINT UNSIGNED DEFAULT 1 COMMENT "Ȩ�޹���",
--   admin_permis enum("1","2","3","4") DEFAULT 1 COMMENT "Ȩ�޹���",
  foreign key(admin_permis) references sp_permis(sp_permis_id)	
)ENGINE = INNODB charset = utf8 COMMENT "����Ա��";
-- ����һ������Ա �û��� ���� ��Ϊadmin
insert into sp_admin(admin_name,admin_psd,admin_email,admin_permis) VALUES('admin',MD5('admin'),'admin@admin.com',1);


-- Ա����
CREATE table sp_employees(	
  sp_emp_accountId VARCHAR(30) not null PRIMARY KEY COMMENT "�û��˻�",
	sp_emp_name VARCHAR(30) default "" COMMENT "�û�����",
	sp_emp_state enum("1","2","3") DEFAULT 1 COMMENT "�û�״̬",
  sp_emp_permis SMALLINT UNSIGNED DEFAULT 1 COMMENT "�û���ɫ",
	FOREIGN KEY(sp_emp_permis) REFERENCES sp_permis(sp_permis_id)
)ENGINE=InnoDB CHARSET=utf8 COMMENT='Ա����';


-- Ʒ��
 CREATE TABLE sp_brand(
 	brand_id int(11) unsigned NOT NULL PRIMARY KEY DEFAULT '10001' COMMENT 'Ʒ��ID',
 	brand_name VARCHAR(30) NOT NULL DEFAULT '' COMMENT "Ʒ������"
);
-- ����Ʒ��
INSERT INTO sp_brand(brand_id, brand_name) VALUES
(10001, '���ϴ�˹'),
(10002, '�Ϳ�'),
(10003, '��̤'),
(10004, 'JOINFIT'),
(10005, '����'),
(10006, 'UNDER ARMOUR'),
(10007, '�ز�'),
(10008, 'ƥ��'),
(10009, '������'),
(10010, '361��'),
(10011, 'Salomon'),
(10012, 'Mizuno'),
(10013, '����'),
(10014, '����'),
(10015, 'NATAPER'),
(10016, 'Tecnica'),
(10017, 'Vibram'),
(10018, 'NORTHLAND'),
(10019, 'Inov8'),
(10020, 'Brooks'),
(10021, 'Skora'),
(10022, 'Saucony'),
(10023, '����'),
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
(10034, '�ǵ�'),
(10035, '�¶���'),
(10036, '���Ƕ���'),
(20001, 'XS'),
(30001, 'С��'),
(30002, 'DISCOVER');


-- ����ͼƬid
CREATE TABLE main_img(
 	main_img_id int(11) unsigned NOT NULL PRIMARY KEY DEFAULT '1001' COMMENT '��ͼid',
  	main_img_url VARCHAR(80) NOT NULL DEFAULT '' COMMENT "��ͼ��ַ"
);
-- -- ����ͼƬ
 INSERT INTO main_img(main_img_id, main_img_url) VALUES
 (1001,'www.url.com/main.jpg1'),
 (1002,'www.url.com/main.jpg2'),
 (1003,'www.url.com/main.jpg3'),
 (1004,'www.url.com/main.jpg4');




-- ��Ʒ�б�
  CREATE TABLE sp_goods(
    sp_id int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '��ƷID',
    sp_goods_name varchar(64) NOT NULL COMMENT '��Ʒ����',
    brand_id int(11) unsigned NOT NULL DEFAULT '10001' COMMENT 'Ʒ��ID',
    main_img_id int(10) unsigned NOT NULL DEFAULT '10001' COMMENT '��ͼID����Ӧ��ƷͼƬID',
    minimum_price float NOT NULL COMMENT '��ͼ�',
    highest_price float NOT NULL COMMENT '��߼�',
    sp_inventory int(10) UNSIGNED not null COMMENT "��Ʒ���",
    goods_status int(11) NOT NULL COMMENT '��Ʒ״̬',
    update_time int(11) NOT NULL DEFAULT '0' COMMENT '�ϼ�ʱ��',
    create_time int(11) NOT NULL DEFAULT '0' COMMENT '����ʱ��',
    PRIMARY KEY (sp_id),
 	  FOREIGN KEY(brand_id) REFERENCES sp_brand(brand_id),
 	  FOREIGN KEY(main_img_id) REFERENCES main_img(main_img_id)
 ) ENGINE=InnoDB CHARSET=utf8 COMMENT='��Ʒ��';




