-- ============================================
-- E-commerce Website Database
-- Database: ecommerce
-- ============================================

CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ecommerce`;

-- --------------------------------------------
-- Table: admin
-- --------------------------------------------
CREATE TABLE `admin` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Default admin login: username = admin, password = admin123
INSERT INTO `admin` (`username`, `password`) VALUES ('admin', 'admin123');

-- --------------------------------------------
-- Table: tbluser  (registered site customers)
-- --------------------------------------------
CREATE TABLE `tbluser` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(100) NOT NULL,
  `useremail` VARCHAR(150) NOT NULL,
  `usernumber` VARCHAR(20) NOT NULL,
  `userpassword` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------
-- Table: tblproduct
-- --------------------------------------------
CREATE TABLE `tblproduct` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `Pname` VARCHAR(150) NOT NULL,
  `Pprice` DECIMAL(10,2) NOT NULL,
  `Pimage` VARCHAR(255) NOT NULL,
  `Pcategory` VARCHAR(100) NOT NULL,
  `Pquantity` INT(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Sample products (matching figures shown in the report)
INSERT INTO `tblproduct` (`Pname`, `Pprice`, `Pimage`, `Pcategory`, `Pquantity`) VALUES
('Laptop', 50000.00, 'Uploadimage/laptop.jpg', 'Home', 5),
('IPHONE 15 Black', 79000.00, 'Uploadimage/iphone15.jpg', 'Home', 10),
('POCO M6', 15999.00, 'Uploadimage/pocom6.jpg', 'Electronics', 10),
('Airpods', 699.00, 'Uploadimage/airpods.jpg', 'Electronics', 15),
('T-shirt', 599.00, 'Uploadimage/tshirt.jpg', 'Clothes', 5),
('Cargo', 999.00, 'Uploadimage/cargo.jpg', 'Clothes', 2),
('Jeans', 899.00, 'Uploadimage/jeans.jpg', 'Clothes', 4);

-- --------------------------------------------
-- Table: oder  (customer orders)
-- --------------------------------------------
CREATE TABLE `oder` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `customer_name` VARCHAR(150) NOT NULL,
  `customer_email` VARCHAR(150) NOT NULL,
  `customer_address` TEXT NOT NULL,
  `customer_phone` VARCHAR(20) NOT NULL,
  `total_amount` DECIMAL(10,2) NOT NULL,
  `payment_method` VARCHAR(50) NOT NULL DEFAULT 'Cash On Delivery',
  `status` VARCHAR(50) NOT NULL DEFAULT 'Order Placed',
  `order_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------
-- Table: order_items  (line items for each order)
-- --------------------------------------------
CREATE TABLE `order_items` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `order_id` INT(11) NOT NULL,
  `product_name` VARCHAR(150) NOT NULL,
  `product_price` DECIMAL(10,2) NOT NULL,
  `product_quantity` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `oder` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
