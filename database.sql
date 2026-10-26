CREATE DATABASE IF NOT EXISTS foodie; USE foodie;
CREATE TABLE users(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100),email VARCHAR(100) UNIQUE,mobile VARCHAR(15),password VARCHAR(255),address TEXT,city VARCHAR(50),state VARCHAR(50),pincode VARCHAR(10),status TINYINT DEFAULT 1,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE admins(id INT AUTO_INCREMENT PRIMARY KEY,username VARCHAR(50) UNIQUE,password VARCHAR(255));
CREATE TABLE categories(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100),image VARCHAR(255),description TEXT,status TINYINT DEFAULT 1);
CREATE TABLE products(id INT AUTO_INCREMENT PRIMARY KEY,category_id INT,name VARCHAR(150),image VARCHAR(255),price DECIMAL(10,2),discount DECIMAL(5,2) DEFAULT 0,description TEXT,stock INT DEFAULT 0,status TINYINT DEFAULT 1,featured TINYINT DEFAULT 0,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE orders(id INT AUTO_INCREMENT PRIMARY KEY,user_id INT,name VARCHAR(100),email VARCHAR(100),mobile VARCHAR(15),billing TEXT,address TEXT,city VARCHAR(50),state VARCHAR(50),pincode VARCHAR(10),total DECIMAL(10,2),payment_method VARCHAR(20),payment_status VARCHAR(20) DEFAULT 'Pending',status VARCHAR(20) DEFAULT 'Pending',created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE order_items(id INT AUTO_INCREMENT PRIMARY KEY,order_id INT,product_id INT,name VARCHAR(150),price DECIMAL(10,2),qty INT);
CREATE TABLE contacts(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100),email VARCHAR(100),message TEXT,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
INSERT INTO categories(name,description) VALUES('Pizza','Wood-fired & cheesy'),('Burgers','Juicy stacked burgers'),('Biryani','Aromatic dum biryani'),('Desserts','Sweet endings'),('Beverages','Cool drinks & shakes');
INSERT INTO products(category_id,name,price,discount,description,stock,featured) VALUES
(1,'Margherita Pizza',249,10,'Classic tomato, mozzarella, basil',50,1),(1,'Farmhouse Pizza',349,15,'Loaded with fresh veggies',40,1),
(2,'Veg Cheese Burger',129,0,'Crispy patty with cheese slice',60,1),(2,'Chicken Zinger',179,20,'Spicy crunchy chicken burger',45,0),
(3,'Chicken Dum Biryani',299,10,'Slow-cooked basmati & spices',30,1),(3,'Veg Biryani',219,0,'Fragrant rice with vegetables',35,0),
(4,'Chocolate Brownie',99,0,'Warm fudgy brownie',70,1),(4,'Gulab Jamun (2 pc)',59,0,'Soft syrupy classic',80,0),
(5,'Cold Coffee',89,5,'Thick creamy cold coffee',90,0),(5,'Fresh Lime Soda',49,0,'Sweet & salty fizz',100,0);
