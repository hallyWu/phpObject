drop database if exists mydb1;
create database mydb1 charset utf8;
use mydb1;
create table tb1_stu(
	stu_id varchar(10) primary key,
	stu_name varchar(20) not null
);
create table tb1_score(
	cid int not null,
	score int,
	stu_id varchar(10),
	primary key(cid ,stu_id),
	foreign key(stu_id) references tb1_stu(stu_id)
);
insert into tb1_stu values("h501","lili");
insert into tb1_stu values("h502","lilei");

insert into tb1_score values(1,100,"h501");
insert into tb1_score values(2,96,"h502");

insert into tb1_score values(3,97,"h502");
insert into tb1_stu values("h503","hally");