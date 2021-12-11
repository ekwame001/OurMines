drop database if exists `TheMines`;

create database TheMines;
use TheMines;

create table admin(
username varchar(100),
password varchar(200));

create table product(
productID int auto_increment primary key,
productName varchar(15),
price decimal(15,2));


create table clientOrder(
clientID int auto_increment Unique,
clientName varchar(60),
Email varchar(100),
contact varchar(12),
productName varchar(15),
quantity int(200)
);




