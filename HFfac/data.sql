# 删除重名的数据库
DROP DATABASE
IF EXISTS projectSql;

# 建库 并制定编码类型和编码顺序
CREATE DATABASE projectSql DEFAULT CHARACTER
SET 'UTF8' COLLATE 'utf8_general_ci';

# 选中使用的数据库
USE projectSql;

-- 创建student表
CREATE TABLE t_student (
	sid CHAR (10) PRIMARY KEY NOT NULL,
	-- 学生id
	spassword INT(25),
	-- 密码
	sname VARCHAR(10),
	-- 学生姓名
	ssex enum ('男', '女'),
	-- 性别
	sage INT (2),
	-- 年龄
	sprovince VARCHAR (6),
	-- 省份
	sphone	VARCHAR(12),
	-- 联系方式
	sSchool VARCHAR (16),
	-- 毕业院校
	smajor VARCHAR(6),
	-- 专业	
	classid int -- 班级ID
);

-- 创建class表
CREATE TABLE t_class (
	classid INT PRIMARY KEY NOT NULL auto_increment,
	-- 班级id
	classname VARCHAR(5) -- 班级名称
);

-- 创建grade表
CREATE TABLE t_grade (
	gradeid INT PRIMARY KEY NOT NULL auto_increment,
	-- 年级id
	courseid INT,
	-- 课程id
	grade VARCHAR (5),
	-- 年级
	sid CHAR (10) -- 学生id
);

-- 创建course表
CREATE TABLE t_course (
	courseid INT PRIMARY KEY NOT NULL auto_increment,
	-- 课程Id
	coursename VARCHAR (10),
	-- 课程昵称
	coursetime VARCHAR (10), -- 上课时间
	classid INT -- 班级id
);

-- 创建daily表
CREATE TABLE t_daily (
	dailyid INT PRIMARY KEY NOT NULL auto_increment,
	-- 日报id
	dsendtime VARCHAR (10),
	-- 日报发表时间
	dcontent VARCHAR (20),
	-- 日报内容
	dcommentid INT,
	-- 评论id
	dsendid CHAR (10) -- 发送id
);

-- 创建comment表
CREATE TABLE t_commenti (
	comid INT PRIMARY KEY NOT NULL auto_increment,
	-- 评论id
	sid CHAR (10),
	-- 学生id
	csendtime VARCHAR (10),
	-- 评论时间
	ccontent VARCHAR(10),
	-- 评论内容
	dailyid INT -- 日报id
);

-- 创建teacher表
CREATE TABLE t_teacher(
	tid INT(5) PRIMARY KEY NOT NULL auto_increment,		-- 教师id
	tname VARCHAR(10),																-- 姓名
	tpassword INT(25),																-- 密码
	tsex enum('男','女'),															-- 性别
	tage INT(4),																			-- 年龄
	tphone VARCHAR(12),																-- 电话号码
	tmajor VARCHAR(10)																-- 老师专业
);

-- 创建menu数据
CREATE TABLE t_menu(
	mid INT(5) PRIMARY KEY NOT NULL auto_increment,	-- 菜单id
	mname VARCHAR(15),																-- 菜单昵称
	mfid INT(5),																	-- 菜单子id
	murl VARCHAR(50)																	-- 联动地址
);

-- 初始化菜单数据
INSERT INTO t_menu VALUES(1,'课程中心',0,''),
(2,'学习中心',0,''),
(3,'个人中心',0,''),

(4,'我的课表',1,''),
(5,'课程大纲',1,'./index.php?c=course&a=course'),

(6,'班级成员',2,'./handout.php?c=classMate&a=showStu'),
(7,'班级日报',2,''),
(8,'学习资料',2,''),

(9,'我的日报',3,''),
(10,'我的信息',3,''),
(11,'我的资料',3,'');
-- 初始化学生资料
INSERT INTO t_student VALUES('s1001',111,'吴小建','男',22,'福建省','13556654289','福建外经贸学院','网络设计',1001),
('s1002',111,'黄小辉','男',20,'福建省','13556654207','福州大学','IT',1002),
('s1003',111,'余小铨','男',18,'福建省','13556654241','宁德师范大学','计算机工程',1003);

-- 初始化班级数据
INSERT INTO t_class VALUES(3001,'HF1705'),
(3002,'HF1706'),
(3003,'HF1707'),
(3004,'HF1708'),
(3005,'HF1709');

-- 初始化年段数据
INSERT INTO t_grade VALUES(2001,10,'一年级','s1001'),
(2002,11,'二年级','s1001'),
(2003,12,'三年级','s1001'),
(2004,13,'四年级','s1001');

-- 初始化评论数据
INSERT INTO t_commenti VALUES(4001,'s1001','2018-1-11','你写的日报很详细。',5001),
(4002,'s1002','2018-1-11','你写的日报很认真。',5002),
(4003,'s1003','2018-1-11','你写的日报很可以的。',5003);

-- 初始化课程数据
INSERT INTO t_course VALUES(40,'Web前端','08:50-12:00',3001),
(41,'JAVA','08:50-12:00',3002),
(42,'UI','08:50-12:00',3003);

-- 初始化日报数据
INSERT INTO t_daily VALUES(6001,'2018-1-11 22:00','今天我们学了PHP数据库连接！',4001,'e1001');

-- 初始化教师资料
INSERT INTO t_teacher VALUES(9001,'吴小平',MD5(111),'男',25,'17805223215','WEB前端'),
(9002,'吴晓君',MD5(111),'女',25,'17805223255','JAVA');

