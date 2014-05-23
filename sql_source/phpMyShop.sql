create table users(
uid int,
uname varchar(20) unique,
upassword varchar(50),
uemail varchar(320),
admin tinyint,
primary key (uid)
);

create table goods(
gid int,
gname varchar(20),
primary key(gid)
);
