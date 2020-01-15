-- drop database if exists db_jewelry;
CREATE DATABASE db_jewelry;
use db_jewelry;


CREATE TABLE categories(
id_categories int(10) primary key auto_increment,
name varchar(50)
);
INSERT INTO categories
VALUES(1,'Nhẫn'),(2,'Hoa tai'),
(3,'Dây chuyên'),(4,'Lắc tay'),
(5,'Lắc chân'),(6,'Bộ trang sức'),(7,'Đồng hồ');
select*from categories;

-- sản phẩm
drop TABLE if exists products;
CREATE TABLE products(
id_pro int(10) primary key AUTO_INCREMENT,
namepro varchar(50) not null,
price float(10) not null,
quantity int(255) not null,
sale int(50) null,
id_categories int(10) not null,
image varchar(255) null,
FOREIGN KEY (id_categories) REFERENCES categories(id_categories)
);
SET FOREIGN_KEY_CHECKS=0;

INSERT INTO products
VALUES(1,'nhẫn kim cương',1000000,2,'',1,'nhan.jpg'),
(2,'nhẫn cặp bạc',100000,2,'',1,'logo.png'),
(3,'Dây chuyên',1000000,2,'20',3,'v1.png'),
(4,'Hoa tai vàng',1000000,2,'',2,'ht.jpg'),
(5,'Lắc tay',1000000,2,'30',4,'Ltay.jpg');

-- select*from products;

 


drop TABLE if exists user;
use db_jewelry;
CREATE TABLE user(
id_cus int(10)  primary key AUTO_INCREMENT,
name varchar(50) not null,
gender varchar(10) ,
birthday date,
username varchar(100),
address varchar(100),
password varchar(50),
role int(10)
);
INSERT INTO user 
VALUES (1,'Hồ Ái Nhi','nữ','10/10/2000','09213832','Phước Mỹ ,Sơn Tra, Đà Nẵng','1234',1),
 (2,'Hồ Ái Nhi','nữ','10/10/2000','01238','Phước Mỹ ,Sơn Tra, Đà Nẵng','1234',1),
 (3,'Hồ Ái Nhi','nữ','10/10/2000','012833','Phước Mỹ ,Sơn Tra, Đà Nẵng','1234',1),
 (4,'Hồ Ái Nhi','nữ','10/10/2000','032848','Phước Mỹ ,Sơn Tra, Đà Nẵng','1234',1),
 (5,'Hồ Ái Nhi','nữ','10/10/2000','0327423','Phước Mỹ ,Sơn Tra, Đà Nẵng','1234',1),
 (6,'Hồ Ái Nhi','nữ','10/10/2000','23847','Phước Mỹ ,Sơn Tra, Đà Nẵng','1234',1),
 (7,'Hồ Ái Nhi','nữ','10/10/2000','892347','Phước Mỹ ,Sơn Tra, Đà Nẵng','1234',1),
  (8,'Hồ Thị Mai','nữ','2000/6/4','admin','Quảng trị','123',0);

 select*from user;
 -- drop TABLE if exists orderP;
-- use db_jewelry;
-- create table orderP(
-- id_o int primary key auto_increment,
-- nameCus varchar(100),
-- namepro varchar(100),
-- price float(20),
-- quantity int(10)
-- );
 
 drop TABLE if exists cart;
use db_jewelry;
create table cart(
id_order int(10)  primary key auto_increment,
id_cus int(10) ,
id_pro int(10) ,
quantity int,
FOREIGN key (id_cus) REFERENCES user(id_cus),
FOREIGN key (id_pro) REFERENCES products(id_pro)
);
insert into cart(id_order,id_cus,id_pro,quantity)
value (1,2,1,2);
SELECT id_order, p.image, p.namepro,p.price,p.sale,c.quantity From products as p, cart as c where p.id_pro = c.id_pro;

