CREATE DATABASE NEWS;

create table n_news(
id int primary 	key not null,
title char(50) not null ,
isTop bool not null ,
content text ,
publish char(20) ,
pub_time int not null
);

comment: ID值自增

create table category(
id serial primary key not null,
name varchar(10),
description varchar(200)
);

insert into category(name,description)values('yu','bihao');


insert into company(id,name,age,address,salary,join_date)values(4,'Harry',20,'China',40000,'2019-08-04'),(5,'Hurrican',30,'Korean',50000,'2015-07-05'),(6,'Innovation',29,'Korean',50000,'2010-12-12'),(7,'SOO',30,'Korean',30000,'2003-04-09'),(8,'F91',40,'China',100000,'2000-01-01');