create table if not exists users(
uid int primary key auto_increment,
uname varchar(20) unique not null,
upassword varchar(50),
uemail varchar(320),
uadmin tinyint,
ustatus tinyint
);

create table if not exists goods(
gid int primary key auto_increment,
gname varchar(20) not null,
gprice int not null default 0,
gamount int not null default 0,
gtitlepic text,
gshowpic text,
goption mediumtext,
gdiscribe text,
gcpu text,
gmemory text,
gdisk text,
ggpu text,
gother text,
gstatus int default 0
);

create table if not exists user_detail(
udid int primary key auto_increment,
uname varchar(20) unique not null,
udname varchar(20),
udcode int,
udaddress text,
udtelephone varchar(13),
foreign key(uname) references users(uname)
);

create table if not exists orders(
oid int primary key auto_increment,
uid int,
gid int,
gname text,
oamount int not null default 1,
oname varchar(20) not null,
ocode int,
ototal int,
oaddress text not null,
otelephone varchar(13),
odate datetime not null,
ostatus int not null default 0,
foreign key (uid) references users(uid),
foreign key (gid) references goods(gid)
 );

create table if not exists show_items(
sid int primary key auto_increment,
gid int,
sshowpic text,
foreign key (gid) references goods(gid)
);

create table if not exists product_items(
pid int primary key auto_increment,
gid int,
pshowtext text,
foreign key(gid) references goods(gid)
);
