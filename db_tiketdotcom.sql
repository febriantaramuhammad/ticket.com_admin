CREATE TABLE `data_customer` (
    `Customer_ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Customer_Name` VARCHAR(50),
    `Destination` VARCHAR(50),
    `Price` INTEGER,
    `Promo` VARCHAR(30),
    `Payment_Type` VARCHAR(30),
    `Sales_Code` VARCHAR(8),
    `Sales_Name` VARCHAR(50),
    `Created_Date` TIMESTAMP,
    `Modified_By` VARCHAR(50),
    `Modified_Date` DATETIME,
    CONSTRAINT `PK_data_customer` PRIMARY KEY (`Customer_ID`)
);
CREATE TABLE `ref_destination` (
    `Destination_ID` INTEGER NOT NULL AUTO_INCREMENT,
    `Destination` VARCHAR(50),
    CONSTRAINT `PK_ref_destination` PRIMARY KEY (`Destination_ID`)
);
CREATE TABLE `users` (
    `user_id` INTEGER NOT NULL,
    `privilege` INTEGER,
    `username` VARCHAR(50),
    `password` VARCHAR(32),
    `name` VARCHAR(50),
    `created_date` TIMESTAMP,
    `created_by` VARCHAR(50),
    CONSTRAINT `PK_users` PRIMARY KEY (`user_id`)
);
CREATE TABLE `user_privileges` (
    `privilege` INTEGER NOT NULL AUTO_INCREMENT,
    `privilege_name` VARCHAR(50),
    CONSTRAINT `PK_user_privileges` PRIMARY KEY (`privilege`)
);
ALTER TABLE `users` ADD CONSTRAINT `user_privileges_users` 
    FOREIGN KEY (`privilege`) REFERENCES `user_privileges` (`privilege`);
