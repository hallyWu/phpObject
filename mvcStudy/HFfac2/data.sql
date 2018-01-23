# É¾³ýÖØÃûµÄÊý¾Ý¿â
DROP DATABASE
IF EXISTS projectSql;

# ½¨¿â ²¢ÖÆ¶¨±àÂëÀàÐÍºÍ±àÂëË³Ðò
CREATE DATABASE projectSql DEFAULT CHARACTER
SET 'UTF8' COLLATE 'utf8_general_ci';

# Ñ¡ÖÐÊ¹ÓÃµÄÊý¾Ý¿â
USE projectSql;

-- ´´½¨student±í
CREATE TABLE t_student (
	sid CHAR (10) PRIMARY KEY NOT NULL,
	-- Ñ§Éúid
	spassword INT(25),
	-- ÃÜÂë
	sname VARCHAR(10),
	-- Ñ§ÉúÐÕÃû
	ssex enum ('ÄÐ', 'Å®'),
	-- ÐÔ±ð
	sage INT (2),
	-- ÄêÁä
	sprovince VARCHAR (6),
	-- Ê¡·Ý
	sphone	VARCHAR(12),
	-- ÁªÏµ·½Ê½
	sSchool VARCHAR (16),
	-- ±ÏÒµÔºÐ£
	smajor VARCHAR(6),
	-- ×¨Òµ	
	classid int -- °à¼¶ID
);

-- ´´½¨class±í
CREATE TABLE t_class (
	classid INT PRIMARY KEY NOT NULL auto_increment,
	-- °à¼¶id
	classname VARCHAR(5) -- °à¼¶Ãû³Æ
);

-- ´´½¨grade±í
CREATE TABLE t_grade (
	gradeid INT PRIMARY KEY NOT NULL auto_increment,
	-- Äê¼¶id
	courseid INT,
	-- ¿Î³Ìid
	grade VARCHAR (5),
	-- Äê¼¶
	sid CHAR (10) -- Ñ§Éúid
);

-- ´´½¨course±í
CREATE TABLE t_course (
	courseid INT PRIMARY KEY NOT NULL auto_increment,
	-- ¿Î³ÌId
	coursename VARCHAR (10),
	-- ¿Î³ÌêÇ³Æ
	coursetime VARCHAR (10), -- ÉÏ¿ÎÊ±¼ä
	classid INT -- °à¼¶id
);

-- ´´½¨daily±í
CREATE TABLE t_daily (
	dailyid INT PRIMARY KEY NOT NULL auto_increment,
	-- ÈÕ±¨id
	dsendtime VARCHAR (10),
	-- ÈÕ±¨·¢±íÊ±¼ä
	dcontent VARCHAR (20),
	-- ÈÕ±¨ÄÚÈÝ
	dcommentid INT,
	-- ÆÀÂÛid
	dsendid CHAR (10) -- ·¢ËÍid
);

-- ´´½¨comment±í
CREATE TABLE t_commenti (
	comid INT PRIMARY KEY NOT NULL auto_increment,
	-- ÆÀÂÛid
	sid CHAR (10),
	-- Ñ§Éúid
	csendtime VARCHAR (10),
	-- ÆÀÂÛÊ±¼ä
	ccontent VARCHAR(10),
	-- ÆÀÂÛÄÚÈÝ
	dailyid INT -- ÈÕ±¨id
);

-- ´´½¨teacher±í
CREATE TABLE t_teacher(
	tid INT(5) PRIMARY KEY NOT NULL auto_increment,		-- ½ÌÊ¦id
	tname VARCHAR(10),																-- ÐÕÃû
	tpassword INT(25),																-- ÃÜÂë
	tsex enum('ÄÐ','Å®'),															-- ÐÔ±ð
	tage INT(4),																			-- ÄêÁä
	tphone VARCHAR(12),																-- µç»°ºÅÂë
	tmajor VARCHAR(10)																-- ÀÏÊ¦×¨Òµ
);

-- ´´½¨menuÊý¾Ý
CREATE TABLE t_menu(
	mid INT(5) PRIMARY KEY NOT NULL auto_increment,	-- ²Ëµ¥id
	mname VARCHAR(15),																-- ²Ëµ¥êÇ³Æ
	mfid INT(5),																	-- ²Ëµ¥×Óid
	murl VARCHAR(50)																	-- Áª¶¯µØÖ·
);

-- ³õÊ¼»¯²Ëµ¥Êý¾Ý
INSERT INTO t_menu VALUES(1,'¿Î³ÌÖÐÐÄ',0,''),
(2,'Ñ§Ï°ÖÐÐÄ',0,''),
(3,'¸öÈËÖÐÐÄ',0,''),

(4,'ÎÒµÄ¿Î±í',1,''),
(5,'¿Î³Ì´ó¸Ù',1,'./index.php?c=course&a=course'),

(6,'°à¼¶³ÉÔ±',2,'./handout.php?c=classMate&a=showStu'),
(7,'°à¼¶ÈÕ±¨',2,''),
(8,'Ñ§Ï°×ÊÁÏ',2,''),

(9,'ÎÒµÄÈÕ±¨',3,''),
(10,'ÎÒµÄÐÅÏ¢',3,''),
(11,'ÎÒµÄ×ÊÁÏ',3,'');
-- ³õÊ¼»¯Ñ§Éú×ÊÁÏ
INSERT INTO t_student VALUES('s1001',111,'ÎâÐ¡½¨','ÄÐ',22,'¸£½¨Ê¡','13556654289','¸£½¨Íâ¾­Ã³Ñ§Ôº','ÍøÂçÉè¼Æ',1001),
('s1002',111,'»ÆÐ¡»Ô','ÄÐ',20,'¸£½¨Ê¡','13556654207','¸£ÖÝ´óÑ§','IT',1002),
('s1003',111,'ÓàÐ¡îý','ÄÐ',18,'¸£½¨Ê¡','13556654241','ÄþµÂÊ¦·¶´óÑ§','¼ÆËã»ú¹¤³Ì',1003);

-- ³õÊ¼»¯°à¼¶Êý¾Ý
INSERT INTO t_class VALUES(3001,'HF1705'),
(3002,'HF1706'),
(3003,'HF1707'),
(3004,'HF1708'),
(3005,'HF1709');

-- ³õÊ¼»¯Äê¶ÎÊý¾Ý
INSERT INTO t_grade VALUES(2001,10,'Ò»Äê¼¶','s1001'),
(2002,11,'¶þÄê¼¶','s1001'),
(2003,12,'ÈýÄê¼¶','s1001'),
(2004,13,'ËÄÄê¼¶','s1001');

-- ³õÊ¼»¯ÆÀÂÛÊý¾Ý
INSERT INTO t_commenti VALUES(4001,'s1001','2018-1-11','ÄãÐ´µÄÈÕ±¨ºÜÏêÏ¸¡£',5001),
(4002,'s1002','2018-1-11','ÄãÐ´µÄÈÕ±¨ºÜÈÏÕæ¡£',5002),
(4003,'s1003','2018-1-11','ÄãÐ´µÄÈÕ±¨ºÜ¿ÉÒÔµÄ¡£',5003);

-- ³õÊ¼»¯¿Î³ÌÊý¾Ý
INSERT INTO t_course VALUES(40,'WebÇ°¶Ë','08:50-12:00',3001),
(41,'JAVA','08:50-12:00',3002),
(42,'UI','08:50-12:00',3003);

-- ³õÊ¼»¯ÈÕ±¨Êý¾Ý
INSERT INTO t_daily VALUES(6001,'2018-1-11 22:00','½ñÌìÎÒÃÇÑ§ÁËPHPÊý¾Ý¿âÁ¬½Ó£¡',4001,'e1001');

-- ³õÊ¼»¯½ÌÊ¦×ÊÁÏ
INSERT INTO t_teacher VALUES(9001,'ÎâÐ¡Æ½',MD5(111),'ÄÐ',25,'17805223215','WEBÇ°¶Ë'),
(9002,'ÎâÏþ¾ý',MD5(111),'Å®',25,'17805223255','JAVA');

