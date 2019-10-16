<?php
include_once 'classes.php';
$pdo = Tools::connect();
$role = "
   create table roles(
   id INT NOT NULL auto_increment PRIMARY KEY ,
   role VARCHAR (25) NOT  NULL UNIQUE 
   ) DEFAULT charset ='utf8'
";

$customer = "
   create table customers(
   id INT NOT NULL auto_increment PRIMARY KEY ,
   login VARCHAR (25) NOT  NULL UNIQUE,
   password VARCHAR (128) NOT  NULL,
   role_id INT ,
   FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ,
   discount INT ,
   image_path VARCHAR (255)
   ) DEFAULT charset ='utf8'
";

$category = "
   create table categories(
   id INT NOT NULL auto_increment PRIMARY KEY ,
   category VARCHAR (64) NOT  NULL UNIQUE 
   ) DEFAULT charset ='utf8'
";
$item = "
   create table items(
   id INT NOT NULL auto_increment PRIMARY KEY ,
   item_name VARCHAR (120) NOT  NULL,
   category_id INT ,
   FOREIGN KEY (category_id) REFERENCES categories(id) ON UPDATE CASCADE ,
   price_in VARCHAR (25) NOT NULL ,
   price_sale VARCHAR (25)  NOT NULL ,
   info VARCHAR (255) NOT  NULL ,
   image_path VARCHAR (255) NOT NULL 
   
   ) DEFAULT charset ='utf8'
";
$image = "
   create table images(
   id INT NOT NULL auto_increment PRIMARY KEY ,
   item_id INT ,
   FOREIGN KEY (item_id) REFERENCES items(id) ON UPDATE CASCADE ,
   image_path VARCHAR (255) NOT NULL 
   ) DEFAULT charset ='utf8'
";
$sale = "
   create table sales(
   id INT NOT NULL auto_increment PRIMARY KEY ,
   customer_id INT ,
   FOREIGN  KEY (customer_id) REFERENCES customers(id) ON UPDATE CASCADE ,
   item_id INT ,
   FOREIGN KEY (item_id) REFERENCES items(id) ON  UPDATE CASCADE ,
   created TIMESTAMP, 
   quantity INT NOT NULL 
   
   ) DEFAULT charset ='utf8'
";
$pdo->exec($role);
$pdo->exec($customer);
$pdo->exec($category);
$pdo->exec($item);
$pdo->exec($image);
$pdo->exec($sale);
