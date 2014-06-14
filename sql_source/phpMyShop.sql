create table if not exists users(
uid int primary key auto_increment,
uname varchar(20) unique,
upassword varchar(50),
uemail varchar(320),
admin tinyint
);

create table if not exists good(
gid int primary key auto_increment,
gname varchar(20)
);

create table if not exists user_detail(
udid int primary key auto_increment,
uname varchar(20),
udaddress text,
udtelephone varchar(13),
foreign key(uname) references users(uname)
);

create table if not exists good_detail(
gdid int primary key auto_increment,
gid int,
gdprice int,
gdamount int,
foreign key(gid) references good(gid)
);

create table if not exists orders(
oid int primary key auto_increment,
uid int,
oname int,
oaddress text,
otelephone varchar(13),
foreign key (uid) references users(uid)
);
