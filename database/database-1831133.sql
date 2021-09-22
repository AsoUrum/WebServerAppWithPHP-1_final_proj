-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.18-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for database-1831133
CREATE DATABASE IF NOT EXISTS `database-1831133` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `database-1831133`;

-- Dumping structure for table database-1831133.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_Id` char(36) NOT NULL DEFAULT uuid(),
  `customerFirstName` varchar(20) NOT NULL,
  `customerLastName` varchar(20) NOT NULL,
  `customerAddress` varchar(25) NOT NULL,
  `customerCity` varchar(25) NOT NULL,
  `customerProvince` varchar(25) NOT NULL,
  `customerPostalCode` varchar(7) NOT NULL,
  `customerUserName` varchar(12) NOT NULL,
  `customerPassword` char(255) NOT NULL,
  `customerDateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `customerDateModified` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`customer_Id`),
  UNIQUE KEY `userName` (`customerUserName`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='#Revision History\r\n# Developer                                    Date                          comments\r\n#Urum bone aso(1831133)           April. 19, 2021          Created table customers to hold all customer informations';

-- Dumping data for table database-1831133.customers: ~10 rows (approximately)
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` (`customer_Id`, `customerFirstName`, `customerLastName`, `customerAddress`, `customerCity`, `customerProvince`, `customerPostalCode`, `customerUserName`, `customerPassword`, `customerDateCreated`, `customerDateModified`) VALUES
	('0ed90faf-aaf5-11eb-a8c8-5065f3bab94e', 'test2', 'assd', 'aff', 'af', 'afa', 'aff', 'test2', '$2y$10$X6iUfT9G3W6OrQBX46Mx0ORdhb3z8bsCtqFRQgNmxXkH01HLiPOvm', '2021-05-01 23:18:20', '2021-05-01 23:18:20'),
	('12157152-aa25-11eb-977d-5065f3bab94e', 'urum', 'hdhhdhd', 'hshsh', 'hciy', 'judjjjd', 'jdjdjd', 'hysdsna,', 'jdjdjjdj', '2021-04-30 22:29:35', '2021-04-30 22:29:35'),
	('492dac99-aaea-11eb-a8c8-5065f3bab94e', 'test', 'testkkkkkkk', 'UPLANDS', 'OTTAWA', 'Ontario', 'K1V 9V8', 'test', '$2y$10$CfJPIF4o9AgdFSC77ix6zOBksTRkP/eMeJJfdAtRvR.CYCgZODIbW', '2021-05-01 22:01:13', '2021-05-02 12:54:22'),
	('5724a0a4-a9da-11eb-977d-5065f3bab94e', 'ME', 'UR', 'HSDHDH', 'GDTE', 'JDJDJ', 'KIK', 'KDKDD', 'KD,DDDLLL', '2021-04-30 13:34:39', '2021-04-30 13:34:39'),
	('6e4511e7-a973-11eb-95aa-5065f3bab94e', 'aso', 'urum', 'bonivin', 'ags', 'jsu', 'oooki', 'asgu', 'shhdhdhdhdh', '2021-04-30 01:18:00', '2021-04-30 01:18:00'),
	('8060de3b-aaac-11eb-a8c8-5065f3bab94e', 'URUM', 'BONE ASO', 'BOIVIN', 'CHATEAUGUAY', 'Quebec', 'J6J 2Z2', 'asourum', '456+', '2021-05-01 14:39:02', '2021-05-01 14:39:02'),
	('8956af30-aadd-11eb-a8c8-5065f3bab94e', 'Brhshs', 'Akwar', 'VEasaf', 'OTTAWA', 'Ontari', 'K1V 9V8', 'asour', '$2y$10$z4r4fIhi1HfBCenbtedJUukzqgcS5/iY8pRDNsiNQcbdyUrBT.pga', '2021-05-01 20:29:57', '2021-05-01 20:29:57'),
	('bbee0da7-ab76-11eb-a140-5065f3bab94e', 'Bre', 'Akwar', '816-33VE', 'OTTAWA', 'Ontari', 'K1V 9V8', 'jjj', '$2y$10$grHy2d5oKnvSlAEe9IQzv.OhxKC1e0K8qYzvX14K3rGUjYNNfXeCO', '2021-05-02 14:46:41', '2021-05-02 14:46:41'),
	('cee0268a-aaab-11eb-a8c8-5065f3bab94e', 'URUM', 'BONE ASO', '128 RUE ', 'CHATEAUGUAY', 'Quebec', 'asourum', 'aaaaaaaaaaa', '8888', '2021-05-01 14:34:05', '2021-05-01 14:34:05'),
	('f63f3088-aa1e-11eb-977d-5065f3bab94e', 'Changed', 'aafa', 'fasff', 'sdaff', 'sdfsf', 'dsfsdf', 'asfsf', 'afss', '2021-04-30 21:45:52', '2021-04-30 23:07:57');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;

-- Dumping structure for procedure database-1831133.customersgetpassword
DELIMITER //
CREATE PROCEDURE `customersgetpassword`(
	IN `p_customerUserName` VARCHAR(12)
)
BEGIN


#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           May . 01, 2021          created procedure to get password for user



SELECT customer_Id,customerPassword FROM customers
	WHERE customerUserName =  p_customerUserName;


END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.customers_delete
DELIMITER //
CREATE PROCEDURE `customers_delete`(
	IN `p_customer_Id` CHAR(36)
)
BEGIN

#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to delete from table customers 

	DELETE FROM  customers		
		WHERE customer_Id = p_customer_Id;	

END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.customers_insert
DELIMITER //
CREATE PROCEDURE `customers_insert`(
	IN `p_customerFirstName` VARCHAR(20),
	IN `p_customerLastName` VARCHAR(20),
	IN `p_customerAddress` VARCHAR(25),
	IN `p_customerCity` VARCHAR(25),
	IN `p_customerProvince` VARCHAR(25),
	IN `p_customerPostalCode` VARCHAR(7),
	IN `p_customerUserName` VARCHAR(12),
	IN `p_customerPassword` CHAR(255)
)
BEGIN
#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to inser into table customers 


	INSERT INTO customers			
				(customerFirstName, customerLastName, customerAddress,customerCity,customerProvince,customerPostalCode,customerUserName,customerPassword)
	VALUES	(p_customerFirstName, p_customerLastName, p_customerAddress,p_customerCity,p_customerProvince,p_customerPostalCode,p_customerUserName,p_customerPassword);

END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.customers_select_all
DELIMITER //
CREATE PROCEDURE `customers_select_all`()
BEGIN

#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to select all customers from table customers 
#Urum bone aso(1831133)           April. 30, 2021          	modified table by adding user name and password on the select.


	SELECT customer_Id,customerFirstName,customerLastName,customerAddress,customerCity,customerProvince,customerPostalCode,customerUserName,customerPassword,customerDateCreated,customerDateModified
	FROM customers
	ORDER BY  customerDateCreated  DESC;

END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.customers_select_one
DELIMITER //
CREATE PROCEDURE `customers_select_one`(
	IN `p_customer_Id` CHAR(36)
)
BEGIN

#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to select once customer  from table customers 


SELECT customer_Id, customerFirstName, customerLastName,customerAddress,customerCity,customerProvince,customerPostalCode, customerUserName,customerPassword,customerDateCreated,customerDateModified
FROM customers
WHERE  customer_Id = p_customer_Id;

END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.customers_update
DELIMITER //
CREATE PROCEDURE `customers_update`(
	IN `p_customerFirstName` VARCHAR(20),
	IN `p_customerLastName` VARCHAR(20),
	IN `p_customerAddress` VARCHAR(25),
	IN `p_customerCity` VARCHAR(25),
	IN `p_customerProvince` VARCHAR(25),
	IN `p_customerPostalCode` VARCHAR(7),
	IN `p_customerUserName` VARCHAR(12),
	IN `p_customerPassword` CHAR(255),
	IN `p_customer_Id` CHAR(36)
)
BEGIN
#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to update the  table customers 


#update customers table

UPDATE customers			
			SET 	customerFirstName = p_customerFirstName,
					customerLastName = p_customerLastName, 
					customerAddress = p_customerAddress,
					customerCity = p_customerCity,
					customerProvince =p_customerProvince,
					customerPostalCode = p_customerPostalCode,
					customerUserName = p_customerUserName ,
					customerPassword =  p_customerPassword,
					customerDateModified = NOW()
					
			WHERE customer_Id = p_customer_Id;



END//
DELIMITER ;

-- Dumping structure for table database-1831133.products
CREATE TABLE IF NOT EXISTS `products` (
  `product_Id` char(36) NOT NULL DEFAULT uuid(),
  `productCode` varchar(12) NOT NULL,
  `productDescription` varchar(100) NOT NULL,
  `productPrice` decimal(7,2) NOT NULL,
  `productCostPrice` decimal(7,2) DEFAULT NULL,
  `productDateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `productDateModified` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`product_Id`),
  UNIQUE KEY `productCode` (`productCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='#Revision History\r\n# Developer                                    Date                          comments\r\n#Urum bone aso(1831133)           April. 19, 2021          Created table products to hold all product  informations';

-- Dumping data for table database-1831133.products: ~4 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`product_Id`, `productCode`, `productDescription`, `productPrice`, `productCostPrice`, `productDateCreated`, `productDateModified`) VALUES
	('12baebf1-aa31-11eb-977d-5065f3bab94e', '12agsgs', 'hdhdhdhd', 5.00, 25.00, '2021-04-30 23:55:30', '2021-04-30 23:55:30'),
	('86558e54-a322-11eb-80b4-5065f3bab94e', 'puuuHH', 'hshdhd hkjhksdal lkhkslDL', 584.25, 889.25, '2021-04-22 00:23:44', '2021-04-22 00:23:44'),
	('ba93e1e7-aa2f-11eb-977d-5065f3bab94e', 'dddd', 'dddd', 0.00, 0.00, '2021-04-30 23:45:53', '2021-04-30 23:45:53'),
	('d04f3a89-aa2f-11eb-977d-5065f3bab94e', 'lkjh', 'jhgfryii', 58.00, 89.00, '2021-04-30 23:46:29', '2021-04-30 23:57:36');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for procedure database-1831133.products-update
DELIMITER //
CREATE PROCEDURE `products-update`(
	IN `p_productCode` VARCHAR(12),
	IN `p_productDescription` VARCHAR(100),
	IN `p_productPrice` DECIMAL(7,2),
	IN `p_productCostPrice` DECIMAL(7,2),
	IN `p_product_Id` CHAR(36)
)
BEGIN

#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to update table products 



	UPDATE products
	SET 
				productCode = p_productCode,
				productDescription = p_productDescription,
				productPrice = p_productPrice,
				productCostPrice =  p_productCostPrice,
				productDateModified = NOW()
				
	WHERE  product_Id = p_product_Id;



END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.products_delete
DELIMITER //
CREATE PROCEDURE `products_delete`(
	IN `p_product_Id` CHAR(36)
)
BEGIN

#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to deleete from table products 


	
		DELETE FROM  products		
		WHERE product_Id = p_product_Id;	


END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.products_insert
DELIMITER //
CREATE PROCEDURE `products_insert`(
	IN `p_productCode` VARCHAR(12),
	IN `p_productDescription` VARCHAR(100),
	IN `p_productPrice` DECIMAL(7,2),
	IN `p_productCostPrice` DECIMAL(7,2)
)
BEGIN


#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to insert into table products 



	INSERT INTO products 
				(productCode,productDescription,productPrice,productCostPrice)
	VALUES 	(p_productCode,p_productDescription,p_productPrice,p_productCostPrice);


END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.products_select_all
DELIMITER //
CREATE PROCEDURE `products_select_all`()
BEGIN

#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to select all from table products 





		SELECT product_Id,productCode,productDescription,productPrice,productCostPrice,productDateCreated,productDateModified
		FROM products
		ORDER BY  productDateCreated;

END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.products_select_one
DELIMITER //
CREATE PROCEDURE `products_select_one`(
	IN `p_product_Id` CHAR(36)
)
BEGIN
	
	
#Revision History
# Developer                            Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to select one product from table products 

		SELECT product_Id,productCode,productDescription,productPrice,productCostPrice,productDateCreated,productDateModified
		FROM products
		WHERE  product_Id = p_product_Id;

END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.purchaseoObjects
DELIMITER //
CREATE PROCEDURE `purchaseoObjects`(
	IN `p_purchaseDateCreated` DATETIME
)
BEGIN
#Revision History
# Developer                            Date                          comments
#Urum bone aso(1831133)           MAY. 02, 2021          Created procedure to select purchase object by date;


SELECT  productCode,customerFirstName,customerLastName,customerCity,purchaseComments, purchaseProdPrice,purchaseQuantitySold, purchaseSubtotal,purchaseTaxes,purchaseGrandTotal
FROM (purchases
JOIN products on purchases.product_Id =products.product_Id)
JOIN customers  on purchases.customer_Id = customers.customer_Id
WHERE purchaseDateCreated >= p_purchaseDateCreated;

			

END//
DELIMITER ;

-- Dumping structure for table database-1831133.purchases
CREATE TABLE IF NOT EXISTS `purchases` (
  `purchase_Id` char(36) NOT NULL DEFAULT uuid(),
  `customer_Id` char(36) NOT NULL,
  `product_Id` char(36) NOT NULL,
  `purchaseQuantitySold` int(3) NOT NULL,
  `purchaseProdPrice` decimal(7,2) NOT NULL,
  `purchaseComments` varchar(200) DEFAULT NULL,
  `purchaseSubtotal` decimal(7,2) NOT NULL,
  `purchaseTaxes` decimal(7,2) NOT NULL,
  `purchaseGrandTotal` decimal(7,2) NOT NULL,
  `purchaseDateCreated` datetime NOT NULL DEFAULT current_timestamp(),
  `purchaseDateModified` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`purchase_Id`),
  KEY `customer_Id` (`customer_Id`),
  KEY `product_Id` (`product_Id`),
  CONSTRAINT `FK1_customer_Id` FOREIGN KEY (`customer_Id`) REFERENCES `customers` (`customer_Id`),
  CONSTRAINT `FK2_product_Id` FOREIGN KEY (`product_Id`) REFERENCES `products` (`product_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='#Revision History\r\n# Developer                                    Date                          comments\r\n#Urum bone aso(1831133)           April. 19, 2021          Created table purchases to hold all customers purchased  product  informations';

-- Dumping data for table database-1831133.purchases: ~5 rows (approximately)
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` (`purchase_Id`, `customer_Id`, `product_Id`, `purchaseQuantitySold`, `purchaseProdPrice`, `purchaseComments`, `purchaseSubtotal`, `purchaseTaxes`, `purchaseGrandTotal`, `purchaseDateCreated`, `purchaseDateModified`) VALUES
	('4dd144d7-aa39-11eb-977d-5065f3bab94e', 'f63f3088-aa1e-11eb-977d-5065f3bab94e', '86558e54-a322-11eb-80b4-5065f3bab94e', 48, 458.00, 'kdjddhd', 514.00, 85.00, 98.00, '2021-05-01 00:54:26', '2021-05-01 01:16:09'),
	('7468e315-a9ee-11eb-977d-5065f3bab94e', '6e4511e7-a973-11eb-95aa-5065f3bab94e', '86558e54-a322-11eb-80b4-5065f3bab94e', 21, 20.00, 'KJHGFRTYBFD', 0.00, 0.00, 0.00, '2021-04-30 15:58:38', '2021-04-30 15:58:38'),
	('aa276fe8-ab8e-11eb-a140-5065f3bab94e', '8060de3b-aaac-11eb-a8c8-5065f3bab94e', '86558e54-a322-11eb-80b4-5065f3bab94e', 4, 25.00, 'jkijgffrd', 50.00, 5.00, 55.00, '2021-05-02 17:37:59', '2021-05-02 17:37:59'),
	('c762b2ae-aa37-11eb-977d-5065f3bab94e', 'f63f3088-aa1e-11eb-977d-5065f3bab94e', '86558e54-a322-11eb-80b4-5065f3bab94e', 58, 59.00, 'klojh', 0.00, 0.00, 0.00, '2021-05-01 00:43:30', '2021-05-01 00:43:30'),
	('db272118-ab8d-11eb-a140-5065f3bab94e', '8060de3b-aaac-11eb-a8c8-5065f3bab94e', '86558e54-a322-11eb-80b4-5065f3bab94e', 2, 25.00, 'jkijg ffrd', 50.00, 5.00, 55.00, '2021-05-02 17:32:12', '2021-05-02 17:32:12'),
	('ef8996fb-ab8d-11eb-a140-5065f3bab94e', '8060de3b-aaac-11eb-a8c8-5065f3bab94e', '86558e54-a322-11eb-80b4-5065f3bab94e', 2, 25.00, 'jkijgffrd', 50.00, 5.00, 55.00, '2021-05-02 17:32:46', '2021-05-02 17:32:46');
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;

-- Dumping structure for procedure database-1831133.purchasesSearchByDate
DELIMITER //
CREATE PROCEDURE `purchasesSearchByDate`(
	IN `p_customer_Id` CHAR(36),
	IN `p_purchaseDateCreated` DATETIME
)
BEGIN

						
						#Revision History
						# Developer                        Date                          comments
						#Urum bone aso(1831133)           May. 02, 2021          Created procedure search purchases 
						
						
						
							SELECT purchase_Id, 
									 customer_Id, 
									 product_Id,
									 purchaseQuantitySold,
									 purchaseProdPrice,
									 purchaseComments,
									 purchaseSubtotal,
									 purchaseTaxes,
									 purchaseGrandtotal,
									 purchaseDateCreated,
									 PurchaseDateModified
							FROM purchases
							WHERE customer_Id  =p_customer_Id
							ORDER BY purchaseDateCreated >= p_purchaseDateCreated;
						
END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.purchases_insert
DELIMITER //
CREATE PROCEDURE `purchases_insert`(
	IN `p_customer_Id` CHAR(36),
	IN `p_product_Id` CHAR(36),
	IN `p_purchaseQuantitySold` INT(3),
	IN `p_purchaseProdPrice` DECIMAL(7,2),
	IN `p_purchaseComments` VARCHAR(200),
	IN `p_purchaseSubtotal` DECIMAL(7,2),
	IN `p_purchaseTaxes` DECIMAL(7,2),
	IN `p_purchaseGrandtotal` DECIMAL(7,2)
)
BEGIN

#Revision History
# Developer                        Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to insert into table purchases 


 INSERT INTO purchases
			 (customer_Id, product_Id,purchaseQuantitySold,purchaseProdPrice,purchaseComments,purchaseSubtotal,purchaseTaxes,purchaseGrandtotal)
	VALUES (p_customer_Id, p_product_Id,p_purchaseQuantitySold,p_purchaseProdPrice,p_purchaseComments,p_purchaseSubtotal,p_purchaseTaxes,p_purchaseGrandtotal);	 
	
END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.purchases_select_all
DELIMITER //
CREATE PROCEDURE `purchases_select_all`()
BEGIN


#Revision History
# Developer                        Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to select all from table purchases


	SELECT purchase_Id, 
			 customer_Id, 
			 product_Id,
			 purchaseQuantitySold,
			 purchaseProdPrice,
			 purchaseComments,
			 purchaseSubtotal,
			 purchaseTaxes,
			 purchaseGrandtotal,
			 purchaseDateCreated,
			 PurchaseDateModified
	FROM purchases
	ORDER BY purchaseDateCreated;

END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.purchases_select_one
DELIMITER //
CREATE PROCEDURE `purchases_select_one`(
	IN `p_purchase_Id` CHAR(36)
)
BEGIN

#Revision History
# Developer                        Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to select one from table purchases


	SELECT purchase_Id, 
			 customer_Id, 
			 product_Id,
			 purchaseQuantitySold,
			 purchaseProdPrice,
			 purchaseComments, 
			 purchaseSubtotal,
			 purchaseTaxes,
			 purchaseGrandtotal,
			 purchaseDateCreated,
			 purchaseDateModified
	FROM purchases
	WHERE  purchase_Id = p_purchase_Id;

END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.purchases_update
DELIMITER //
CREATE PROCEDURE `purchases_update`(
	IN `p_customer_Id` CHAR(36),
	IN `p_product_Id` CHAR(36),
	IN `p_purchaseQuantitySold` INT,
	IN `p_purchaseProdPrice` DECIMAL(7,2),
	IN `p_purchaseComments` VARCHAR(200),
	IN `p_purchaseSubtotal` DECIMAL(7,2),
	IN `p_purchaseTaxes` DECIMAL(7,2),
	IN `p_purchaseGrandtotal` DECIMAL(7,2),
	IN `p_purchase_Id` CHAR(36)
)
BEGIN

#Revision History
# Developer                                    Date                          comments
#Urum bone aso(1831133)           April. 26, 2021          Created procedure to update the  table purchases 




UPDATE  purchases
		SET  	customer_Id = p_customer_Id, 
				product_Id =  p_product_Id,
				purchaseQuantitySold = p_purchaseQuantitySold,
				purchaseProdPrice = p_purchaseProdPrice,
				purchaseComments =  p_purchaseComments,
				purchaseSubtotal = p_purchaseSubtotal,
				purchaseTaxes = p_purchaseTaxes,
				purchaseGrandtotal = p_purchaseGrandtotal,
				purchaseDateModified = NOW()
	 WHERE purchase_Id = p_purchase_Id;

END//
DELIMITER ;

-- Dumping structure for procedure database-1831133.purchase_delete
DELIMITER //
CREATE PROCEDURE `purchase_delete`(
	IN `p_purchase_Id` CHAR(36)
)
BEGIN


#Revision History
# Developer                        Date                          comments
#Urum bone aso(1831133)           April. 23, 2021          Created procedure to  delete from table purchases

	DELETE FROM  purchases		
		WHERE purchase_Id = p_purchase_Id;


END//
DELIMITER ;

-- Dumping structure for view database-1831133.viewfromall
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `viewfromall` (
	`productCode` VARCHAR(12) NOT NULL COLLATE 'utf8mb4_general_ci',
	`customerFirstName` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`customerLastName` VARCHAR(20) NOT NULL COLLATE 'utf8mb4_general_ci',
	`customerCity` VARCHAR(25) NOT NULL COLLATE 'utf8mb4_general_ci',
	`purchaseComments` VARCHAR(200) NULL COLLATE 'utf8mb4_general_ci',
	`purchaseProdPrice` DECIMAL(7,2) NOT NULL,
	`purchaseQuantitySold` INT(3) NOT NULL,
	`purchaseSubtotal` DECIMAL(7,2) NOT NULL,
	`purchaseTaxes` DECIMAL(7,2) NOT NULL,
	`purchaseGrandTotal` DECIMAL(7,2) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for view database-1831133.viewfromall
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `viewfromall`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `viewfromall` AS select `products`.`productCode` AS `productCode`,`customers`.`customerFirstName` AS `customerFirstName`,`customers`.`customerLastName` AS `customerLastName`,`customers`.`customerCity` AS `customerCity`,`purchases`.`purchaseComments` AS `purchaseComments`,`purchases`.`purchaseProdPrice` AS `purchaseProdPrice`,`purchases`.`purchaseQuantitySold` AS `purchaseQuantitySold`,`purchases`.`purchaseSubtotal` AS `purchaseSubtotal`,`purchases`.`purchaseTaxes` AS `purchaseTaxes`,`purchases`.`purchaseGrandTotal` AS `purchaseGrandTotal` from ((`purchases` join `products` on(`purchases`.`product_Id` = `products`.`product_Id`)) join `customers` on(`purchases`.`customer_Id` = `customers`.`customer_Id`));

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
