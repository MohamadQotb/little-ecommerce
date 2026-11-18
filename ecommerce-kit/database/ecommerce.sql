-- Little Store / MySQL 8+ or MariaDB 10.4+ (InnoDB)
-- Create/select a NEW EMPTY database in phpMyAdmin, then import this file once.
-- No DROP statements. Demo password for all four accounts: LearnShop123!
SET NAMES utf8mb4;

CREATE TABLE users (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 email VARCHAR(255) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL,
 role ENUM('admin','customer') NOT NULL DEFAULT 'customer',
 phone VARCHAR(30) NULL,
 remember_token VARCHAR(100) NULL,
 created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE categories (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL UNIQUE,
 created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE products (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 category_id BIGINT UNSIGNED NOT NULL,
 name VARCHAR(150) NOT NULL,
 description TEXT NULL,
 price DECIMAL(10,2) NOT NULL,
 stock INT UNSIGNED NOT NULL DEFAULT 0,
 image VARCHAR(255) NULL,
 created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 CONSTRAINT fk_products_category FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE RESTRICT,
 CONSTRAINT chk_product_price CHECK (price >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE orders (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 user_id BIGINT UNSIGNED NOT NULL,
 status ENUM('pending','processing','shipped','delivered','cancelled') NOT NULL DEFAULT 'pending',
 recipient_name VARCHAR(100) NOT NULL,
 phone VARCHAR(30) NOT NULL,
 shipping_city VARCHAR(100) NOT NULL,
 shipping_address VARCHAR(255) NOT NULL,
 payment_method VARCHAR(30) NOT NULL DEFAULT 'cash_on_delivery',
 subtotal DECIMAL(10,2) NOT NULL,
 shipping_cost DECIMAL(10,2) NOT NULL DEFAULT 50.00,
 total DECIMAL(10,2) NOT NULL,
 created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 CONSTRAINT fk_orders_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE RESTRICT,
 CONSTRAINT chk_order_amounts CHECK (subtotal >= 0 AND shipping_cost >= 0 AND total = subtotal + shipping_cost)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE order_items (
 id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
 order_id BIGINT UNSIGNED NOT NULL,
 product_id BIGINT UNSIGNED NOT NULL,
 product_name VARCHAR(150) NOT NULL,
 quantity INT UNSIGNED NOT NULL,
 unit_price DECIMAL(10,2) NOT NULL,
 created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
 updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
 CONSTRAINT fk_items_order FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
 CONSTRAINT fk_items_product FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE RESTRICT,
 CONSTRAINT chk_item_values CHECK (quantity > 0 AND unit_price >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

START TRANSACTION;
INSERT INTO users (id,name,email,password,role,phone) VALUES (1,'Admin User','admin@example.com','$2y$12$YMQWMVkF7evxNNUX6H5zyuqyjXMModFJF8uN9NCwg8fN3P6XZGvTa','admin','01000000001');
INSERT INTO users (id,name,email,password,role,phone) VALUES (2,'Sara Ahmed','sara@example.com','$2y$12$YMQWMVkF7evxNNUX6H5zyuqyjXMModFJF8uN9NCwg8fN3P6XZGvTa','customer','01000000001');
INSERT INTO users (id,name,email,password,role,phone) VALUES (3,'Omar Ali','omar@example.com','$2y$12$YMQWMVkF7evxNNUX6H5zyuqyjXMModFJF8uN9NCwg8fN3P6XZGvTa','customer','01000000001');
INSERT INTO users (id,name,email,password,role,phone) VALUES (4,'Mona Hassan','mona@example.com','$2y$12$YMQWMVkF7evxNNUX6H5zyuqyjXMModFJF8uN9NCwg8fN3P6XZGvTa','customer','01000000001');
INSERT INTO categories (id,name) VALUES (1,'Bags');
INSERT INTO categories (id,name) VALUES (2,'Home');
INSERT INTO categories (id,name) VALUES (3,'Electronics');
INSERT INTO categories (id,name) VALUES (4,'Clothing');
INSERT INTO categories (id,name) VALUES (5,'Accessories');
INSERT INTO products (id,category_id,name,description,price,stock,image) VALUES (1,1,'Everyday Backpack','A practical essential with a clean design.',1490,24,'assets/images/bag.svg');
INSERT INTO products (id,category_id,name,description,price,stock,image) VALUES (2,2,'Ceramic Mug','A practical essential with a clean design.',290,60,'assets/images/mug.svg');
INSERT INTO products (id,category_id,name,description,price,stock,image) VALUES (3,3,'Wireless Headphones','A practical essential with a clean design.',890,18,'assets/images/headphones.svg');
INSERT INTO products (id,category_id,name,description,price,stock,image) VALUES (4,2,'Desk Lamp','A practical essential with a clean design.',650,12,'assets/images/lamp.svg');
INSERT INTO products (id,category_id,name,description,price,stock,image) VALUES (5,4,'Cotton T-shirt','A practical essential with a clean design.',450,40,'assets/images/shirt.svg');
INSERT INTO products (id,category_id,name,description,price,stock,image) VALUES (6,5,'Classic Watch','A practical essential with a clean design.',1200,9,'assets/images/watch.svg');
INSERT INTO orders (id,user_id,status,recipient_name,phone,shipping_city,shipping_address,subtotal,shipping_cost,total,created_at) VALUES (1001,2,'pending','Sara Ahmed','01000000001','Alexandria','12 Example Street',1780,50,1830,'2026-11-01 12:00:00');
INSERT INTO orders (id,user_id,status,recipient_name,phone,shipping_city,shipping_address,subtotal,shipping_cost,total,created_at) VALUES (1002,3,'shipped','Omar Ali','01000000001','Alexandria','12 Example Street',890,50,940,'2026-11-02 12:00:00');
INSERT INTO orders (id,user_id,status,recipient_name,phone,shipping_city,shipping_address,subtotal,shipping_cost,total,created_at) VALUES (1003,2,'delivered','Sara Ahmed','01000000001','Alexandria','12 Example Street',900,50,950,'2026-11-03 12:00:00');
INSERT INTO order_items (order_id,product_id,product_name,quantity,unit_price) VALUES
(1001,1,'Everyday Backpack',1,1490),
(1001,2,'Ceramic Mug',1,290),
(1002,3,'Wireless Headphones',1,890),
(1003,5,'Cotton T-shirt',2,450);
COMMIT;
