# ɾ�����������ݿ�
DROP DATABASE
IF EXISTS projectSql;

# ���� ���ƶ��������ͺͱ���˳��
CREATE DATABASE projectSql DEFAULT CHARACTER
SET 'UTF8' COLLATE 'utf8_general_ci';

# ѡ��ʹ�õ����ݿ�
USE projectSql;

-- ����student��
CREATE TABLE t_student (
	sid CHAR (10) PRIMARY KEY NOT NULL,
	-- ѧ��id
	spassword INT(25),
	-- ����
	sname VARCHAR(10),
	-- ѧ������
	ssex enum ('��', 'Ů'),
	-- �Ա�
	sage INT (2),
	-- ����
	sprovince VARCHAR (6),
	-- ʡ��
	sphone	VARCHAR(12),
	-- ��ϵ��ʽ
	sSchool VARCHAR (16),
	-- ��ҵԺУ
	smajor VARCHAR(6),
	-- רҵ	
	classid int -- �༶ID
);

-- ����class��
CREATE TABLE t_class (
	classid INT PRIMARY KEY NOT NULL auto_increment,
	-- �༶id
	classname VARCHAR(5) -- �༶����
);

-- ����grade��
CREATE TABLE t_grade (
	gradeid INT PRIMARY KEY NOT NULL auto_increment,
	-- �꼶id
	courseid INT,
	-- �γ�id
	grade VARCHAR (5),
	-- �꼶
	sid CHAR (10) -- ѧ��id
);

-- ����course��
CREATE TABLE t_course (
	courseid INT PRIMARY KEY NOT NULL auto_increment,
	-- �γ�Id
	coursename VARCHAR (10),
	-- �γ��ǳ�
	coursetime VARCHAR (10), -- �Ͽ�ʱ��
	classid INT -- �༶id
);

-- ����daily��
CREATE TABLE t_daily (
	dailyid INT PRIMARY KEY NOT NULL auto_increment,
	-- �ձ�id
	dsendtime VARCHAR (10),
	-- �ձ�����ʱ��
	dcontent VARCHAR (20),
	-- �ձ�����
	dcommentid INT,
	-- ����id
	dsendid CHAR (10) -- ����id
);

-- ����comment��
CREATE TABLE t_commenti (
	comid INT PRIMARY KEY NOT NULL auto_increment,
	-- ����id
	sid CHAR (10),
	-- ѧ��id
	csendtime VARCHAR (10),
	-- ����ʱ��
	ccontent VARCHAR(10),
	-- ��������
	dailyid INT -- �ձ�id
);

-- ����teacher��
CREATE TABLE t_teacher(
	tid INT(5) PRIMARY KEY NOT NULL auto_increment,		-- ��ʦid
	tname VARCHAR(10),																-- ����
	tpassword INT(25),																-- ����
	tsex enum('��','Ů'),															-- �Ա�
	tage INT(4),																			-- ����
	tphone VARCHAR(12),																-- �绰����
	tmajor VARCHAR(10)																-- ��ʦרҵ
);

-- ����menu����
CREATE TABLE t_menu(
	mid INT(5) PRIMARY KEY NOT NULL auto_increment,	-- �˵�id
	mname VARCHAR(15),																-- �˵��ǳ�
	mfid INT(5),																	-- �˵���id
	murl VARCHAR(50)																	-- ������ַ
);

-- ��ʼ���˵�����
INSERT INTO t_menu VALUES(1,'�γ�����',0,''),
(2,'ѧϰ����',0,''),
(3,'��������',0,''),

(4,'�ҵĿα�',1,''),
(5,'�γ̴��',1,'./index.php?c=course&a=course'),

(6,'�༶��Ա',2,'./handout.php?c=classMate&a=showStu'),
(7,'�༶�ձ�',2,''),
(8,'ѧϰ����',2,''),

(9,'�ҵ��ձ�',3,''),
(10,'�ҵ���Ϣ',3,''),
(11,'�ҵ�����',3,'');
-- ��ʼ��ѧ������
INSERT INTO t_student VALUES('s1001',111,'��С��','��',22,'����ʡ','13556654289','�����⾭óѧԺ','�������',1001),
('s1002',111,'��С��','��',20,'����ʡ','13556654207','���ݴ�ѧ','IT',1002),
('s1003',111,'��С��','��',18,'����ʡ','13556654241','����ʦ����ѧ','���������',1003);

-- ��ʼ���༶����
INSERT INTO t_class VALUES(3001,'HF1705'),
(3002,'HF1706'),
(3003,'HF1707'),
(3004,'HF1708'),
(3005,'HF1709');

-- ��ʼ���������
INSERT INTO t_grade VALUES(2001,10,'һ�꼶','s1001'),
(2002,11,'���꼶','s1001'),
(2003,12,'���꼶','s1001'),
(2004,13,'���꼶','s1001');

-- ��ʼ����������
INSERT INTO t_commenti VALUES(4001,'s1001','2018-1-11','��д���ձ�����ϸ��',5001),
(4002,'s1002','2018-1-11','��д���ձ������档',5002),
(4003,'s1003','2018-1-11','��д���ձ��ܿ��Եġ�',5003);

-- ��ʼ���γ�����
INSERT INTO t_course VALUES(40,'Webǰ��','08:50-12:00',3001),
(41,'JAVA','08:50-12:00',3002),
(42,'UI','08:50-12:00',3003);

-- ��ʼ���ձ�����
INSERT INTO t_daily VALUES(6001,'2018-1-11 22:00','��������ѧ��PHP���ݿ����ӣ�',4001,'e1001');

-- ��ʼ����ʦ����
INSERT INTO t_teacher VALUES(9001,'��Сƽ',MD5(111),'��',25,'17805223215','WEBǰ��'),
(9002,'������',MD5(111),'Ů',25,'17805223255','JAVA');

