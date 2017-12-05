CREATE TABLE MembershipPlan (
    membPlanId int NOT NULL AUTO_INCREMENT,
    name varchar(255),
    price Double,
    adVisibility varchar(255),
    PRIMARY KEY (membPlanId)
);

CREATE TABLE User (
    userId int NOT NULL AUTO_INCREMENT,
    firstName varchar(255),
    lastName varchar(255),
    email varchar(255) NOT NULL UNIQUE,
    password varchar(255),
    userType varchar(255) NOT NULL,
    membPlanId int,
    PRIMARY KEY (userId),
    FOREIGN KEY (membPlanId) REFERENCES MembershipPlan(membPlanId)
);

CREATE TABLE CardFees (
    cardType varchar(255),
    percentage int,
    PRIMARY KEY (cardType)
);

CREATE TABLE Card (
    cardId int NOT NULL AUTO_INCREMENT,
    cardNumber BIGINT,
    cardType varchar(255),
    PRIMARY KEY (cardId),
    FOREIGN KEY (cardType) REFERENCES CardFees(cardType)
);

CREATE TABLE Payment (
    paymentId int NOT NULL AUTO_INCREMENT,
    userId int,
    amount Double,
    cardId int,
    date DATETIME,
    PRIMARY KEY (paymentId),
	  FOREIGN KEY (userId) REFERENCES User(userId),
    FOREIGN KEY (cardId) REFERENCES Card(cardId)
);

CREATE TABLE Location (
    locationId int NOT NULL AUTO_INCREMENT,
    province varchar(255),
    city varchar(255),
    PRIMARY KEY (locationId)
);

CREATE TABLE PromotionPackage (
    promoId int NOT NULL AUTO_INCREMENT,
    description varchar(255),
    duration varchar(255),
    price Double,
    PRIMARY KEY (promoId)
);

CREATE TABLE Category (
    categoryId int NOT NULL AUTO_INCREMENT,
    name varchar(255),
    PRIMARY KEY (categoryId)
);

CREATE TABLE SubCategory (
    subCategoryId int NOT NULL AUTO_INCREMENT,
    categoryId int NOT NULL,
    name varchar(255),
    PRIMARY KEY (subCategoryId),
    FOREIGN KEY (categoryId) REFERENCES Category(categoryId)
);

CREATE TABLE StrategicLocation (
    strategicLocationId int NOT NULL AUTO_INCREMENT,
    percentage int,
    cph int,
    PRIMARY KEY (strategicLocationId)
);

CREATE TABLE Store (
    storeId int NOT NULL AUTO_INCREMENT,
    strategicLocationId int,
    address varchar(255),
    managerId int,
    PRIMARY KEY (storeId),
    FOREIGN KEY (managerId) REFERENCES User(userId),
    FOREIGN KEY (strategicLocationId) REFERENCES StrategicLocation(strategicLocationId)
);

CREATE TABLE Advertisement (
    adId int NOT NULL AUTO_INCREMENT,
    promoId int DEFAULT NULL,
    userId int NOT NULL,
    date DATETIME,
    subCategoryId int NOT NULL,
    title varchar(255),
    description varchar(255),
    images varchar(255),
	  address varchar(255),
    status varchar(255) DEFAULT "Available",
    availability varchar(255),
    rating varchar(255) DEFAULT NULL,
    locationId int NOT NULL,
    type varchar(255),
    email varchar(255) DEFAULT NULL,
	  phone varchar(255) DEFAULT NULL,
    price Double,
    forSaleBy varchar(255),
    storeId int,
    expiryDate DATETIME,
    promoExpiration DATETIME,
    PRIMARY KEY (adId),
    FOREIGN KEY (subCategoryId) REFERENCES SubCategory(subCategoryId),
    FOREIGN KEY (userId) REFERENCES User(userId),
    FOREIGN KEY (locationId) REFERENCES Location(locationId),
    FOREIGN KEY (promoId) REFERENCES PromotionPackage(promoId),
	  FOREIGN KEY (storeId) REFERENCES Store(storeId)
);

CREATE TABLE Rents (
	  rentsId int NOT NULL AUTO_INCREMENT,
    storeId int NOT NULL,
    userId int NOT NULL,
    date DATE,
    startTime TIME,
    endTime TIME,
    delivery BOOLEAN,
	  PRIMARY KEY (rentsId),
	  FOREIGN KEY (userId) REFERENCES User(userId),
    FOREIGN KEY (storeId) REFERENCES Store(storeId)
);

CREATE TABLE StorePayment (
    storeId int NOT NULL AUTO_INCREMENT,
    paymentId int NOT NULL,
    paymentMethod varchar(255), 
    date DATETIME,
    FOREIGN KEY (storeId) REFERENCES Store(storeId)
);

INSERT into MembershipPlan(membPlanId, name, price, adVisibility)
VALUES(1, "Normal Plan", 25, 7),
(2, "Silver Plan", 50, 14),
(3, "Premium Plan", 70, 30);


INSERT into User(UserId, firstName, lastName, email,password, userType, membPlanId)
VALUES(1, "Layla", "Levine", "LL@hotmail.com", "LL1234", "Admin", Null),
(2, "Riley", "Hughes", "RH@hotmail.com", "RH1234", "Admin", Null),
(3, "Darren Banks", "Banks", "DB@hotmail.com", "DB1234", "Admin", Null),
(4, "Joaquin", "Carney", "JC@hotmail.com", "JC1234", "Admin", Null),
(5, "Lexie", "Burke", "LB@hotmail.com", "LB1234", "Admin", Null),
(6, "Delaney", "Carney", "DC@hotmail.com", "DC1234", "User", 1),
(7, "Adrienne", "Stevenson", "AS@hotmail.com", "AS1234", "User", 1),
(8, "Bbel", "Saunders", "BS@hotmail.com", "BS1234", "User", 1),
(9, "Katelynn", "Barr", "KB@hotmail.com", "KB1234", "User", 1),
(10, "Deandre", "Haynes", "DH@hotmail.com", "DH1234", "User", 2),
(11, "Annika", "Parks", "AP@hotmail.com", "AP1234", "User", 1),
(12, "Naomi", "Villanueva", "NV@hotmail.com", "NV1234", "User", 2),
(13, "Sergio", "Cooper", "SC@hotmail.com", "SC1234", "User", 2),
(14, "Brick", "Mccarty", "BM@hotmail.com", "BM1234", "User", 2),
(15, "Jaslene", "Lin", "JL@hotmail.com", "JL1234", "User", 2),
(16, "Gunnar", "Kirby", "GK@hotmail.com", "GK1234", "User", 3),
(17, "Victoria", "Shaffer", "VS@hotmail.com", "VS1234", "User", 3),
(18, "Elisha", "Harrington", "EH@hotmail.com", "EH1234", "User", 3),
(19, "Carsen", "Kemp", "CK@hotmail.com", "CK1234", "User", 3),
(20, "Edna", "Mccarty", "EM@hotmail.com", "EM1234", "User", 3),
(21, "TA", "A", "TA@hotmail.com", "TA1234", "User", 1);


INSERT into CardFees(cardType, percentage)
VALUES("Credit", 3),
("Debit", 1);

INSERT into Card(cardId, cardNumber, cardType)
VALUES(1, 4539937618825770, "Credit"),
(2, 4485143132202660, "Credit"),
(3, 4556119783048130, "Credit"),
(4, 4916222916560180, "Credit"),
(5, 4716121300744330, "Credit"),
(6, 5244169352589420, "Credit"),
(7, 5118717339818440, "Credit"),
(8, 5335698282814770, "Credit"),
(9, 5489419629934160, "Credit"),
(10, 5118184210991760, "Credit"),
(11, 6011799570191260, "Debit"),
(12, 6011977049126790, "Debit"),
(13, 6011875119881310, "Debit"),
(14, 6011573912781280, "Debit"),
(15, 6011844566324420, "Debit"),
(16, 347969284901707, "Debit"),
(17, 340645157373060, "Debit"),
(18, 373787835718355, "Debit"),
(19, 346098970061666, "Debit"),
(20, 349745688116227, "Debit"),
(21, 373787835758355, "Debit");

INSERT into Payment(paymentId, amount, cardId, date,userId)
VALUES(1, 25, 6, "2017-11-25 01:00:00", 6),
(2, 25, 7, "2017-11-26 02:00:00", 7),
(3, 25, 8, "2017-11-27 03:00:00", 8),
(4, 25, 9, "2017-11-28 04:00:00", 9),
(5, 25, 10, "2017-11-29 05:00:00", 10),
(6, 25, 11, "2017-11-30 06:00:00", 11),
(7, 50, 12, "2017-12-01 07:00:00", 12),
(8, 50, 13, "2017-12-02 08:00:00", 13),
(9, 50, 14, "2017-12-03 09:00:00", 14),
(10, 50, 15, "2017-12-04 10:00:00", 15),
(11, 70, 16, "2017-12-05 11:00:00", 16),
(12, 70, 17, "2017-12-06 12:00:00", 17),
(13, 70, 18, "2017-12-07 13:00:00", 18),
(14, 70, 19, "2017-12-08 14:00:00", 19),
(15, 70, 20, "2017-12-09 15:00:00", 20),
(16, 7, 6, "2017-11-26 01:00:00", 6),
(17, 30, 7, "2017-11-27 02:00:00", 7),
(18, 60, 8, "2017-11-28 03:00:00", 8),
(19, 7, 9, "2017-11-29 04:00:00", 9),
(20, 30, 10, "2017-11-30 05:00:00", 10),
(21, 60, 11, "2017-12-01 06:00:00", 11),
(22, 7, 12, "2017-12-02 07:00:00", 12),
(23, 30, 13, "2017-12-03 08:00:00", 13),
(24, 60, 14, "2017-12-04 09:00:00", 14),
(25, 7, 6, "2017-11-27 10:00:00", 6),
(26, 30, 7, "2017-11-28 11:00:00", 7),
(27, 60, 8, "2017-11-29 12:00:00", 8),
(28, 7, 9, "2017-11-30 13:00:00", 9),
(29, 30, 10, "2017-12-01 14:00:00", 10),
(30, 60, 11, "2017-12-02 15:00:00", 11),
(31, 7, 12, "2017-12-03 16:00:00", 12),
(32, 2, 13, "2017-12-02 00:00:00", 13),
(33, 1, 13, "2017-12-03 00:00:00", 13),
(34, 3, 13, "2017-12-04 00:00:00", 13),
(35, 1, 13, "2017-12-05 00:00:00", 13),
(36, 4, 13, "2017-12-06 00:00:00", 13),
(37, 2, 13, "2017-12-07 00:00:00", 13),
(38, 1, 13, "2017-12-08 00:00:00", 13),
(39, 5, 13, "2017-12-09 00:00:00", 13),
(40, 1, 13, "2017-12-10 00:00:00", 13),
(41, 4, 13, "2017-12-11 00:00:00", 13),
(42, 2, 13, "2017-12-12 00:00:00", 13),
(43, 3434, 20, "2017-11-26 15:00:00", 20),
(44, 3434, 20, "2017-11-27 16:00:00", 20),
(45, 3434, 20, "2017-11-28 17:00:00", 20),
(46, 3434, 20, "2017-11-29 18:00:00", 20),
(47, 3434, 20, "2017-11-30 19:00:00", 20),
(48, 3434, 20, "2017-12-01 20:00:00", 20),
(49, 3434, 20, "2017-12-02 21:00:00", 20),
(50, 3434, 20, "2017-12-03 22:00:00", 20),
(51, 3434, 20, "2017-12-04 23:00:00", 20),
(52, 3434, 20, "2017-12-01 00:00:00", 20),
(53, 3434, 20, "2017-12-02 01:00:00", 20),
(54, 3434, 20, "2017-12-03 02:00:00", 20),
(55, 3434, 20, "2017-12-04 03:00:00", 20),
(56, 3434, 20, "2017-12-05 04:00:00", 20),
(57, 3434, 20, "2017-12-06 05:00:00", 20),
(58, 3434, 20, "2017-12-07 06:00:00", 20),
(59, 3434, 20, "2017-12-08 07:00:00", 20),
(60, 3434, 20, "2017-12-09 08:00:00", 20),
(61, 3434, 20, "2017-12-10 09:00:00", 20),
(62, 3434, 20, "2017-12-11 10:00:00", 20),
(63, 3434, 20, "2017-12-12 11:00:00", 20),
(64, 3434, 20, "2017-12-13 12:00:00", 20),
(65, 60, 13, "2017-11-28 05:00:00", 13),
(66, 60, 13, "2017-11-29 06:00:00", 13),
(67, 60, 13, "2017-11-30 07:00:00", 13),
(68, 60, 13, "2017-12-01 08:00:00", 13),
(69, 60, 13, "2017-12-02 09:00:00", 13),
(70, 60, 13, "2017-12-03 10:00:00", 13),
(71, 60, 13, "2017-12-04 11:00:00", 13),
(72, 60, 13, "2017-11-27 12:00:00", 13),
(73, 60, 13, "2017-11-28 13:00:00", 13),
(74, 60, 13, "2017-11-29 14:00:00", 13),
(75, 60, 13, "2017-11-30 15:00:00", 13),
(76, 25, 21, "2017-11-15 16:00:00", 21),
(77, 10, 21, "2017-11-16 01:00:00", 21),
(78, 10, 21, "2017-11-18 03:00:00", 21),
(79, 10, 21, "2017-11-20 05:00:00", 21),
(80, 10, 21, "2017-11-22 07:00:00", 21),
(81, 10, 21, "2017-11-24 09:00:00", 21),
(82, 10, 21, "2017-11-26 11:00:00", 21),
(83, 10, 21, "2017-11-28 13:00:00", 21),
(84, 10, 21, "2017-11-30 15:00:00", 21),
(85, 10, 21, "2017-12-02 17:00:00", 21),
(86, 10, 21, "2017-12-04 19:00:00", 21),
(87, 10, 21, "2017-12-06 21:00:00", 21),
(88, 10, 21, "2017-12-08 23:00:00", 21),
(89, 10, 21, "2017-12-10 01:00:00", 21),
(90, 10, 21, "2017-12-12 03:00:00", 21),
(91, 10, 21, "2017-12-14 05:00:00", 21),
(92, 10, 21, "2017-12-16 07:00:00", 21),
(93, 18, 21, "2017-12-07 22:00:00", 21),
(94, 18, 21, "2017-12-08 23:00:00", 21),
(95, 23, 21, "2017-12-09 00:00:00", 21),
(96, 23, 21, "2017-12-10 01:00:00", 21),
(97, 18, 21, "2017-12-11 02:00:00", 21),
(98, 18, 21, "2017-12-12 03:00:00", 21),
(99, 18, 21, "2017-12-13 04:00:00", 21),
(100, 18, 21, "2017-12-14 05:00:00", 21),
(101, 18, 21, "2017-12-15 06:00:00", 21),
(102, 23, 21, "2017-12-16 07:00:00", 21),
(103, 23, 21, "2017-12-17 08:00:00", 21);

INSERT into Location(locationId, province, city)
VALUES(1, "Quebec", "Montreal"),
(2, "Quebec", "Laval"),
(3, "Quebec", "Longueil"),
(4, "Quebec", "Saguenay"),
(5, "Ontario", "Ottawa"),
(6, "Ontario", "Windsor"),
(7, "Ontario", "Thunder Bay"),
(8, "Ontario", "Toronto");

INSERT into PromotionPackage(promoId, description, duration, price)
VALUES(1, "7 days promotion", 7, 10),
(2, "30 days promotion", 30, 50),
(3, "60 days promotion", 60, 90);

INSERT into Category(categoryId, name)
VALUES(1, "Buy and Sell"),
(2, "Services"),
(3, "Rent"),
(4, "Cars and Vehicles");

INSERT into SubCategory(subCategoryId, name, categoryId)
VALUES(1, "Clothing", 1),
(2, "Books", 1),
(3, "Electronics", 1),
(4, "Musical Instruments", 1),
(5, "Tutors", 2),
(6, "Event Planners", 2),
(7, "Photographers", 2),
(8, "Personal Trainers", 2),
(9, "Electronics", 3),
(10, "Car", 3),
(11, "Apartements", 3),
(12, "Wedding-Dresses", 3),
(13, "Cars", 4),
(14, "Trucks", 4),
(15, "Boats", 4),
(16, "MotorCycles", 4);

INSERT into StrategicLocation(strategicLocationId, percentage, cph)
VALUES(1, 20, 400),
(2, 15, 300),
(3, 10, 200),
(4, 5, 100);

INSERT into Store(storeId, address, strategicLocationId, managerId)
VALUES(1, "6817 43 Av Montreal QC H1T 2R9", 1, 6),
(2, "181 Delisle Laval QC H7A 2V2", 2, 7),
(3, "5180 Rue Michel Saint-Hubert QC J3Y 2M9", 3, 8),
(4, "1890 Rue Bergeron Jonquière QC G7X 5E6", 4, 9),
(5, "1350 Golden Line Rd Almonte ON K0A 1A0", 1, 10),
(6, "530 Wallace Ave Windsor ON N9G 1L9", 2, 11);

INSERT into Advertisement(adId, description, date, images,address, title, type, phone, email, price, status, rating, availability, forSaleBy, userId, locationId, promoId, subCategoryId, storeId, expiryDate, promoExpiration)
VALUES(1, "Great for Winter", "2017-11-26 01:00:00", NULL,"6817 43 Av Montreal QC H1T 2R9", "Winter Men\'s Jacket", "Sell", "NULL", "WS@hotmail.com", 5254, "Available", 1, "Store", "Buisness", 6, 1, 1, 1, NULL, "2017-12-03 01:00:00", "2017-12-03 01:00:00"),
(2, "342 page book", "2017-11-26 02:00:00", NULL,"181 Delisle Laval QC H7A 2V2", "Harry Potter", "Sell", "NULL", "HS@hotmail.com", 8547, "Available", 4, "Store", "Buisness", 7, 2, 2, 2, NULL, "2017-12-04 02:00:00", "2017-12-27 02:00:00"),
(3, "Excellent condition, for school, work or home.", "2017-11-27 03:00:00", NULL,"5180 Rue Michel Saint-Hubert QC J3Y 2M9", "Dell XPS 13", "Sell", "NULL", "DS@hotmail.com", 6530, "Available", 5, "Store", "Buisness", 8, 3, 3, 3, NULL, "2017-12-05 03:00:00", "2018-01-27 03:00:00"),
(4, "First come first serve", "2017-11-28 04:00:00", NULL,"1890 Rue Bergeron Jonquière QC G7X 5E6", "Guitar signed by Pierre Maison", "Sell", "NULL", "GS@hotmail.com", 1436, "Available", 2, "Store", "Buisness", 9, 4, 1, 4, NULL, "2017-12-06 04:00:00", "2017-12-06 04:00:00"),
(5, "10 years experience", "2017-11-29 05:00:00", NULL,"1350 Golden Line Rd Almonte ON K0A 1A0", "English Tutor", "Buy", "NULL", "EB@hotmail.com", 3564, "Available", 1, "Store", "Buisness", 10, 5, 2, 5, NULL, "2017-12-14 05:00:00", "2017-12-30 05:00:00"),
(6, "Adults and kids", "2017-11-30 06:00:00", NULL,"530 Wallace Ave Windsor ON N9G 1L9", "Birthday Party Planner", "Sell", "NULL", "BS@hotmail.com", 6240, "Available", 3, "Store", "Buisness", 11, 6, 3, 6, NULL, "2017-12-08 06:00:00", "2018-01-30 06:00:00"),
(7, "All ages", "2017-12-01 07:00:00", NULL,"632 Thistle Cres Thunder Bay ON P7E 2S7", "Professional Pictures", "Sell", "NULL", "PS@hotmail.com", 885, "Sold", 4, "Online", "Buisness", 12, 7, 1, 7, NULL, "2017-12-16 07:00:00", "2017-12-09 07:00:00"),
(8, "For women", "2017-12-02 08:00:00", NULL,"500 Kingston Rd Toronto ON M4L 1V3", "Gym Trainer", "Sell", "NULL", "GS@hotmail.com", 2734, "Sold", 2, "Online", "Buisness", 13, 8, 2, 8, NULL, "2017-12-17 08:00:00", "2018-01-02 08:00:00"),
(9, "Newest phone", "2017-12-03 09:00:00", NULL,"7503 Rue St Denis Montreal QC H2R 2E7", "Samsung Galaxy S9", "Buy", "NULL", "SB@hotmail.com", 4582, "Available", 2, "Online", "Owner", 14, 1, 3, 9, NULL, "2017-12-18 09:00:00", "2018-02-02 09:00:00"),
(10, "Gray color", "2017-12-04 10:00:00", NULL,"4624 Rue du Pirée Laval QC H7K 3K7", "Honda Civic", "Sell", "(514) 852-7456", "NULL", 7826, "Available", 5, "Online", "Owner", 6, 2, 1, 10, NULL, "2017-12-04 10:00:00", "2017-12-04 10:00:00"),
(11, "Great location near metro", "2017-11-27 11:00:00", NULL,"5760 tsse Boisvert Saint-Hubert QC J3Y 5Y4", "Condo 4 by 4", "Buy", "(514) 952-7423", "NULL", 9096, "Available", 3, "Online", "Owner", 7, 3, 2, 11, NULL, "2017-12-05 11:00:00", "2017-12-28 11:00:00"),
(12, "Size 6", "2017-11-28 12:00:00", NULL,"3937 Soucy Jonquière QC G7X 8T1", "White dress", "Sell", "(514) 156-1435", "NULL", 406, "Available", 4, "Online", "Owner", 8, 4, 3, 12, NULL, "2017-12-06 12:00:00", "2018-01-28 12:00:00"),
(13, "size 17", "2017-11-29 13:00:00", NULL,"170 Lees Ave Ottawa ON K1S 5G5", "Michelin Tires, 4 pieces", "Buy", "(613) 164-8534", "NULL", 4081, "Available", 2, "Online", "Owner", 9, 5, 1, 13, NULL, "2017-12-07 13:00:00", "2017-12-07 13:00:00"),
(14, "Fits 4 people and 2000kg load", "2017-11-30 14:00:00", NULL,"107 Cabana Rd W Windsor ON N9G 2H5", "Huge White Cadillac Truck", "Sell", "(519) 250-6988", "NULL", 5517, "Available", 2, "Online", "Owner", 10, 6, 2, 14, NULL, "2017-12-15 14:00:00", "2017-12-31 14:00:00"),
(15, "Very nice", "2017-12-01 15:00:00", NULL,"544 Parkway Dr Thunder Bay ON P7C 5E1", "Good Snowmobile", "Buy", "(807) 577-9217", "NULL", 7382, "Available", 3, "Online", "Owner", 11, 7, 3, 15, NULL, "2017-12-09 15:00:00", "2018-01-31 15:00:00"),
(16, "Fast thingz", "2017-12-02 16:00:00", NULL,"315 St Germain Ave Toronto ON M5M 1W4", "Red fast motorcycle", "Sell", "(416) 694-8464", "NULL", 5035, "Available", 3, "Online", "Owner", 12, 8, 1, 16, NULL, "2017-12-17 16:00:00", "2017-12-10 16:00:00"),
(17, "Newest fashion", "2017-12-03 17:00:00", NULL,"251 Av Percival Montreal Ouest QC H4X 1T8", "Prada blazer", "Sell", "(514) 123-4567", "NULL", 2110, "Available", 2, "Online", "Owner", 13, 1, NULL, 1, NULL, "2017-12-18 17:00:00", NULL),
(18, "Exciting and everyone dies.", "2017-12-04 18:00:00", NULL,"1073 40E Av Laval QC H7R 4X4", "Game of thrones", "Sell", "(514) 143-7258", "NULL", 5239, "Available", 1, "Online", "Owner", 14, 2, NULL, 2, NULL, "2017-12-19 18:00:00", NULL),
(19, "Good for school", "2017-12-05 19:00:00", NULL,"616 Rue Radisson Longueuil QC J4L 4J6", "HP elite", "Buy", "NULL", "HB@hotmail.com", 2005, "Available", 4, "Online", "Owner", 6, 3, NULL, 3, NULL, "2017-12-13 19:00:00", NULL),
(20, "Without case", "2017-12-06 20:00:00", NULL,"2237 Rue Saucier Jonquiere QC G7S 3T5", "Trumpet", "Sell", "NULL", "TS@hotmail.com", 232, "Available", 2, "Online", "Owner", 7, 4, NULL, 4, NULL, "2017-12-14 20:00:00", NULL),
(21, "5 years experience", "2017-12-07 21:00:00", NULL,"641 Bathgate Dr 1914 Ottawa ON K1K 3Y3", "Italian Tutor", "Buy", "NULL", "IB@hotmail.com", 2798, "Available", 5, "Online", "Owner", 8, 5, NULL, 5, NULL, "2017-12-15 21:00:00", NULL),
(22, "Fun for both parties", "2017-12-08 22:00:00", NULL,"3623 Shinglecreek Crt Windsor ON N8W 5T7", "Divorce party", "Sell", "NULL", "DS@hotmail.com", 1741, "Available", 5, "Online", "Owner", 9, 6, NULL, 6, NULL, "2017-12-16 22:00:00", NULL),
(23, "Make your animal look on point", "2017-12-09 23:00:00", NULL,"400 James St N Thunder Bay ON P7C 4T2", "Animal pictures", "Buy", "NULL", "AB@hotmail.com", 6555, "Available", 2, "Online", "Owner", 10, 7, NULL, 7, NULL, "2017-12-24 23:00:00", NULL),
(24, "Get fit", "2017-12-10 02:00:00", NULL,"234 Willow Ave Toronto ON M4E 3K7", "Gym Trainer", "Sell", "NULL", "GS@hotmail.com", 7212, "Available", 5, "Online", "Owner", 11, 8, NULL, 8, NULL, "2017-12-03 02:00:00", NULL),
(25, "Trash, only useful as paper weight", "2017-11-26 03:00:00", NULL,"7766 George Street Lasalle QC H8P 1E1", "Iphone X", "Sell", "NULL", "IS@hotmail.com", 4051, "Available", 5, "Online", "Owner", 12, 1, NULL, 9, NULL, "2017-12-11 03:00:00", NULL),
(26, "Good for winter", "2017-11-27 04:00:00", NULL,"1731 Rue Le Royer Laval QC H7M 2R6", "Acura CRV", "Sell", "NULL", "AS@hotmail.com", 4355, "Available", 3, "Online", "Owner", 13, 2, NULL, 10, NULL, "2017-12-12 04:00:00", NULL),
(27, "Spacious area", "2017-11-28 05:00:00", NULL,"3724 Bd Gareau Saint-Hubert QC J3Y 0G", "6 bedroom", "Buy", "NULL", "6B@hotmail.com", 6974, "Available", 3, "Online", "Owner", 14, 3, NULL, 11, NULL, "2017-12-13 05:00:00", NULL),
(28, "Stylish", "2017-11-29 06:00:00", NULL,"1814 Rue Ste Famille Jonquiere QC G7X 9L1", "Gray dress", "Sell", "(514) 143-7412", "NULL", 4919, "Available", 3, "Online", "Owner", 6, 4, NULL, 12, NULL, "2017-12-07 06:00:00", NULL),
(29, "Cleans well", "2017-11-30 07:00:00", NULL,"43 Aylmer Ave Ottawa ON K1S 5R4", "Windshield wipers", "Buy", "(613) 143-7564", "NULL", 5637, "Available", 2, "Online", "Owner", 7, 5, NULL, 13, NULL, "2017-12-08 07:00:00", NULL),
(30, "Quite small", "2017-12-01 08:00:00", NULL,"8000 Clairview Ave C Windsor ON N8S 1H9", "Small truck", "Sell", "(519) 250-7782", "NULL", 124, "Available", 5, "Online", "Owner", 8, 6, NULL, 14, NULL, "2017-12-09 08:00:00", NULL),
(31, "Goes Vroooom Vroooooom", "2017-12-02 09:00:00", NULL,"2725 Willow Pl Thunder Bay ON P7C 1K8", "Fast Snowmobile", "Buy", "(807) 577-9217", "NULL", 7423, "Available", 4, "Online", "Owner", 9, 7, NULL, 15, NULL, "2017-12-10 09:00:00", NULL),
(32, "Look like a badass", "2017-12-03 10:00:00", NULL,"26 Goodwood Park Cres East York ON M4C 2G5", "Harley Motorcycle", "Sell", "(416) 694-8464", "NULL", 1147, "Available", 1, "Online", "Owner", 10, 8, NULL, 16, NULL, "2017-12-18 10:00:00", NULL),
(33, "Good looking", "2017-12-04 11:00:00", NULL,"11727 Rue Notre Dame E Montreal QC H1B 2X8", "Armani Exchange Suit", "Buy", "(514) 426-7522", "NULL", 8542, "Available", 5, "Online", "Owner", 11, 1, NULL, 1, NULL, "2017-12-04 11:00:00", NULL),
(34, "Long story", "2017-11-27 12:00:00", NULL,"264 Av 7E Laval QC H7N 4J8", "Lord of the Rings Trilogy", "Sell", "(514) 147-8423", "NULL", 3693, "Available", 3, "Online", "Owner", 12, 2, NULL, 2, NULL, "2017-12-12 12:00:00", NULL),
(35, "High performance", "2017-11-28 13:00:00", NULL,"5815 Av Aubin Saint-Hubert QC J3Y 1H7", "HP Desktop", "Sell", "(514) 265-7845", "NULL", 706, "Available", 1, "Online", "Owner", 13, 3, NULL, 3, NULL, "2017-12-13 13:00:00", NULL),
(36, "Hard case", "2017-11-29 14:00:00", NULL,"336 Rue Louis Frechette Chicoutimi QC G7J 3A4", "Violin with case", "Sell", "(514) 132-7468", "NULL", 1295, "Available", 1, "Online", "Owner", 14, 4, NULL, 4, NULL, "2017-12-14 14:00:00", NULL),
(37, "The language of love", "2017-11-30 15:00:00", NULL,"84 Pentland Pl Kanata ON K2K 1V8", "French Tutor", "Buy", "NULL", "FB@hotmail.com", 6697, "Available", 3, "Online", "Owner", 6, 5, NULL, 5, NULL, "2017-12-08 15:00:00", NULL),
(38, "Make it a memorable event", "2017-12-01 16:00:00", NULL,"1030 Campbell Ave Windsor ON N9B 2J3", "Wedding Planner", "Sell", "NULL", "WS@hotmail.com", 4664, "Available", 2, "Online", "Owner", 7, 6, NULL, 6, NULL, "2017-12-09 16:00:00", NULL),
(39, "We wil put up with them", "2017-12-02 17:00:00", NULL,"1437 McGregor Ave Thunder Bay ON P7E 5E7", "Kids pictures", "Buy", "NULL", "KB@hotmail.com", 7529, "Available", 3, "Online", "Owner", 8, 7, NULL, 7, NULL, "2017-12-10 17:00:00", NULL),
(40, "Get healthy", "2017-12-03 18:00:00", NULL,"48 St Clair Ave W Toronto ON M4V 2Z2", "Health Trainer", "Sell", "NULL", "HS@hotmail.com", 673, "Available", 3, "Online", "Owner", 9, 8, NULL, 8, NULL, "2017-12-11 18:00:00", NULL),
(41, "Good for startup", "2017-12-04 19:00:00", NULL,"5745 17 Av Montreal QC H1X 2R7", "Workstation", "Buy", "NULL", "WB@hotmail.com", 2500, "Available", 2, "Online", "Owner", 10, 1, NULL, 9, NULL, "2017-12-19 19:00:00", NULL),
(42, "1996 model", "2017-12-05 20:00:00", NULL,"1940 Rue Émmanuel Laval QC H7T 1J5", "Toyota Camry", "Sell", "NULL", "TS@hotmail.com", 807, "Sold", 2, "Online", "Owner", 11, 2, NULL, 10, NULL, "2017-12-13 20:00:00", NULL),
(43, "Perfect for a new family", "2017-12-06 21:00:00", NULL,"1640 Victoria Greenfield Park QC J4V 1M3", "3 bedroom", "Sell", "NULL", "3S@hotmail.com", 3603, "Sold", 1, "Online", "Owner", 12, 3, NULL, 11, NULL, "2017-12-21 21:00:00", NULL),
(44, "stain proof", "2017-12-07 22:00:00", NULL,"5759 Ch St Pierre Laterriere QC G7N 1Y1", "Black dress", "Sell", "NULL", "BS@hotmail.com", 710, "Sold", 3, "Online", "Owner", 13, 4, NULL, 12, NULL, "2017-12-22 22:00:00", NULL),
(45, "sturdy gas pusher", "2017-12-08 23:00:00", NULL,"8 Birchview Rd Nepean ON K2G 3G4", "Exhaust pipes", "Sell", "NULL", "ES@hotmail.com", 5477, "Sold", 2, "Online", "Owner", 14, 5, NULL, 13, NULL, "2017-12-23 23:00:00", NULL),
(46, "Pretty car, with only 2 seats", "2017-12-09 01:00:00", NULL,"382 Askin Ave Windsor ON N9B 2X2", "Lamborghini aventador", "Sell", "(519) 250-7782", "NULL", 2863, "Sold", 4, "Online", "Owner", 6, 6, NULL, 14, NULL, "2017-12-17 01:00:00", NULL),
(47, "Two for sale", "2017-12-10 03:00:00", NULL,"157 Amelia St E Thunder Bay ON P7E 3Z5", "Red ATVs", "Buy", "(807) 577-9217", "NULL", 6993, "Sold", 2, "Online", "Owner", 7, 7, NULL, 15, NULL, "2017-12-03 03:00:00", NULL),
(48, "Can not get safer than 4 wheels.", "2017-11-26 04:00:00", NULL,"1974 Queen St E Toronto ON M4L 1H8", "4 wheel motorcycle", "Sell", "(416) 694-8464", "NULL", 1529, "Sold", 3, "Online", "Owner", 8, 8, NULL, 16, NULL, "2017-12-04 04:00:00", NULL),
(49, " Red", "2017-11-27 05:00:00", NULL,"181 Delisle Laval QC H7A 2V2", "Sweater", "Sell", "NULL", "HS@hotmail.com", 8547, "Available", 4, "Store", "Buisness", 13, 2, 2, 1, 2, "2017-12-12 05:00:00", "2018-01-27 05:00:00"),
(50, " Blue", "2017-11-28 06:00:00", NULL,"181 Delisle Laval QC H7A 2V2", "Shirt", "Sell", "NULL", "HS@hotmail.com", 8547, "Available", 4, "Store", "Buisness", 13, 2, 2, 1, 2, "2017-12-13 06:00:00", "2018-01-28 06:00:00"),
(51, " Black", "2017-11-29 07:00:00", NULL,"181 Delisle Laval QC H7A 2V2", "Pants", "Sell", "NULL", "HS@hotmail.com", 8547, "Available", 4, "Store", "Buisness", 13, 2, 2, 1, 2, "2017-12-14 07:00:00", "2018-01-29 07:00:00"),
(52, " 344 page book", "2017-11-30 08:00:00", NULL,"181 Delisle Laval QC H7A 2V2", "Tales of the Madman", "Sell", "NULL", "HS@hotmail.com", 8547, "Available", 4, "Store", "Buisness", 13, 2, 2, 2, 2, "2017-12-15 08:00:00", "2018-01-30 08:00:00"),
(53, " 345 page book", "2017-12-01 09:00:00", NULL,"181 Delisle Laval QC H7A 2V2", "Nickel and Dimed", "Sell", "NULL", "HS@hotmail.com", 8547, "Available", 4, "Store", "Buisness", 13, 2, 2, 2, 2, "2017-12-16 09:00:00", "2018-01-31 09:00:00"),
(54, " Dictionary", "2017-12-02 10:00:00", NULL,"181 Delisle Laval QC H7A 2V2", "Oxford Dictionary", "Sell", "NULL", "HS@hotmail.com", 8547, "Available", 4, "Store", "Buisness", 13, 2, 2, 2, 2, "2017-12-17 10:00:00", "2018-02-01 10:00:00"),
(55, " Samsung", "2017-12-03 11:00:00", NULL,"181 Delisle Laval QC H7A 2V2", "Cell Phone", "Sell", "NULL", "HS@hotmail.com", 8547, "Available", 4, "Store", "Buisness", 13, 2, 2, 3, 2, "2017-12-18 11:00:00", "2018-02-02 11:00:00"),
(56, " Dell", "2017-12-04 12:00:00", NULL,"181 Delisle Laval QC H7A 2V2", "Laptop", "Sell", "NULL", "HS@hotmail.com", 8547, "Available", 4, "Store", "Buisness", 13, 2, 2, 3, 2, "2017-12-11 12:00:00", "2018-01-26 12:00:00"),
(57, "Hp", "2017-11-27 13:00:00", NULL,"181 Delisle Laval QC H7A 2V2", "Desktop", "Sell", "NULL", "HS@hotmail.com", 8547, "Available", 4, "Store", "Buisness", 13, 2, 2, 3, 2, "2017-12-12 13:00:00", "2018-01-27 13:00:00"),
(58, "With case", "2017-11-28 14:00:00", NULL,"181 Delisle Laval QC H7A 2V2", "Trumpet", "Sell", "NULL", "HS@hotmail.com", 8547, "Available", 4, "Store", "Buisness", 13, 2, 2, 4, 2, "2017-12-13 14:00:00", "2018-01-28 14:00:00"),
(59, "For adults", "2017-11-29 15:00:00", NULL,"181 Delisle Laval QC H7A 2V2", "Guitar", "Sell", "NULL", "HS@hotmail.com", 8547, "Available", 4, "Store", "Buisness", 13, 2, 2, 4, 2, "2017-12-14 15:00:00", "2018-01-29 15:00:00"),
(60, "Great for cold", "2017-11-30 01:00:00", NULL,"6817 43 Av Montreal QC H1T 2R9", "Winter Men\'s Jacket", "Sell", "NULL", "TA@hotmai.com", 20, "Available", 1, "Online", "Owner", 21, 1, 1, 1, 2, "2017-11-23 01:00:00", "2017-11-23 01:00:00"),
(61, "Large size", "2017-11-16 02:00:00", NULL,"6818 43 Av Montreal QC H1T 2R9", "Jacket", "Sell", "NULL", "TA@hotmai.com", 21, "Available", 2, "Online", "Owner", 21, 1, NULL, 1, 2, "2017-11-24 02:00:00", NULL),
(62, "355 pages", "2017-11-17 03:00:00", NULL,"6819 43 Av Montreal QC H1T 2R9", "Oxford Dictionary", "Sell", "NULL", "TA@hotmai.com", 22, "Available", 3, "Online", "Owner", 21, 1, 1, 2, 2, "2017-11-25 03:00:00", "2017-11-25 03:00:00"),
(63, "All countries included", "2017-11-18 04:00:00", NULL,"6820 43 Av Montreal QC H1T 2R9", "World Book", "Sell", "NULL", "TA@hotmai.com", 23, "Available", 4, "Online", "Owner", 21, 1, NULL, 2, 2, "2017-11-26 04:00:00", NULL),
(64, "Gray with case", "2017-11-19 05:00:00", NULL,"6821 43 Av Montreal QC H1T 2R9", "Hp Laptop", "Sell", "NULL", "TA@hotmai.com", 24, "Available", 5, "Online", "Owner", 21, 1, 1, 3, 2, "2017-11-27 05:00:00", "2017-11-27 05:00:00"),
(65, "Black without case", "2017-11-20 06:00:00", NULL,"6822 43 Av Montreal QC H1T 2R9", "Dell Laptop", "Sell", "NULL", "TA@hotmai.com", 25, "Available", 1, "Online", "Owner", 21, 1, NULL, 3, 2, "2017-11-28 06:00:00", NULL),
(66, "With case", "2017-11-21 07:00:00", NULL,"6823 43 Av Montreal QC H1T 2R9", "Guitar", "Sell", "NULL", "TA@hotmai.com", 26, "Available", 2, "Online", "Owner", 21, 1, 1, 4, 2, "2017-11-29 07:00:00", "2017-11-29 07:00:00"),
(67, "Used for 1 year", "2017-11-22 08:00:00", NULL,"6824 43 Av Montreal QC H1T 2R9", "Saxophone", "Sell", "NULL", "TA@hotmai.com", 27, "Available", 3, "Online", "Owner", 21, 1, NULL, 4, 2, "2017-11-30 08:00:00", NULL),
(68, "10 years experience", "2017-11-23 09:00:00", NULL,"6825 43 Av Montreal QC H1T 2R9", "English Tutor", "Sell", "NULL", "TA@hotmai.com", 28, "Available", 4, "Online", "Owner", 21, 1, 1, 5, 2, "2017-12-01 09:00:00", "2017-12-01 09:00:00"),
(69, "10 years experience", "2017-11-24 10:00:00", NULL,"6826 43 Av Montreal QC H1T 2R9", "French Tutor", "Sell", "NULL", "TA@hotmai.com", 29, "Available", 5, "Online", "Owner", 21, 1, NULL, 5, 2, "2017-12-02 10:00:00", NULL),
(70, "5 years experience", "2017-11-25 11:00:00", NULL,"6827 43 Av Montreal QC H1T 2R9", "Wedding Bash Party Planner", "Sell", "NULL", "TA@hotmai.com", 30, "Available", 1, "Online", "Owner", 21, 1, 1, 6, 2, "2017-12-03 11:00:00", "2017-12-03 11:00:00"),
(71, "5 years experience", "2017-11-26 12:00:00", NULL,"6828 43 Av Montreal QC H1T 2R9", "Birthday Bash Party Planner", "Sell", "NULL", "TA@hotmai.com", 31, "Available", 2, "Online", "Owner", 21, 1, NULL, 6, 2, "2017-12-04 12:00:00", NULL),
(72, "7 years experience", "2017-11-27 13:00:00", NULL,"6829 43 Av Montreal QC H1T 2R9", "Family Photographer", "Sell", "NULL", "TA@hotmai.com", 32, "Available", 3, "Online", "Owner", 21, 1, 1, 7, 2, "2017-12-05 13:00:00", "2017-12-05 13:00:00"),
(73, "8 years experience", "2017-11-28 14:00:00", NULL,"6830 43 Av Montreal QC H1T 2R9", "Model Photographer", "Sell", "NULL", "TA@hotmai.com", 33, "Available", 4, "Online", "Owner", 21, 1, NULL, 7, 2, "2017-12-06 14:00:00", NULL),
(74, "8 years experience", "2017-11-29 15:00:00", NULL,"6831 43 Av Montreal QC H1T 2R9", "Healthy Eating Trainer", "Sell", "NULL", "TA@hotmai.com", 34, "Available", 5, "Online", "Owner", 21, 1, 1, 8, 2, "2017-12-07 15:00:00", "2017-12-07 15:00:00"),
(75, "8 years experience", "2017-11-30 16:00:00", NULL,"6832 43 Av Montreal QC H1T 2R9", "Gym workout Trainer", "Sell", "NULL", "TA@hotmai.com", 35, "Available", 1, "Online", "Owner", 21, 1, NULL, 8, 2, "2017-12-08 16:00:00", NULL),
(76, "Used for 1 year", "2017-12-01 17:00:00", NULL,"6833 43 Av Montreal QC H1T 2R9", "Desktop", "Sell", "NULL", "TA@hotmai.com", 36, "Available", 2, "Online", "Owner", 21, 1, 1, 9, 2, "2017-12-09 17:00:00", "2017-12-09 17:00:00"),
(77, "Used for 1 year", "2017-12-02 18:00:00", NULL,"6834 43 Av Montreal QC H1T 2R9", "Lawnmower", "Sell", "NULL", "TA@hotmai.com", 37, "Available", 3, "Online", "Owner", 21, 1, NULL, 9, 2, "2017-12-10 18:00:00", NULL),
(78, "Family car", "2017-12-03 19:00:00", NULL,"6835 43 Av Montreal QC H1T 2R9", "Nissan Sentra", "Sell", "NULL", "TA@hotmai.com", 38, "Available", 4, "Online", "Owner", 21, 1, 1, 10, 2, "2017-12-11 19:00:00", "2017-12-11 19:00:00"),
(79, "Family car", "2017-12-04 20:00:00", NULL,"6836 43 Av Montreal QC H1T 2R9", "Mazda X8", "Sell", "NULL", "TA@hotmai.com", 39, "Available", 5, "Online", "Owner", 21, 1, NULL, 10, 2, "2017-12-12 20:00:00", NULL),
(80, "Spacious area", "2017-12-05 21:00:00", NULL,"6837 43 Av Montreal QC H1T 2R9", "Condo 4 by 4", "Sell", "NULL", "TA@hotmai.com", 40, "Sold", 1, "Online", "Owner", 21, 1, 1, 11, 2, "2017-12-13 21:00:00", "2017-12-13 21:00:00"),
(81, "Spacious area", "2017-12-06 22:00:00", NULL,"6838 43 Av Montreal QC H1T 2R9", "Flat with 4 rooms", "Sell", "NULL", "TA@hotmai.com", 41, "Sold", 2, "Store", "Buisness", 21, 1, NULL, 11, 1, "2017-12-14 22:00:00", NULL),
(82, "Beautiful dress", "2017-12-07 23:00:00", NULL,"6839 43 Av Montreal QC H1T 2R9", "White dress with black bow", "Sell", "NULL", "TA@hotmai.com", 42, "Sold", 3, "Store", "Buisness", 21, 1, 1, 12, 1, "2017-12-15 23:00:00", "2017-12-15 23:00:00"),
(83, "Beautiful dress", "2017-12-08 00:00:00", NULL,"6840 43 Av Montreal QC H1T 2R9", "Red Dress", "Sell", "NULL", "TA@hotmai.com", 43, "Sold", 4, "Store", "Buisness", 21, 1, NULL, 12, 1, "2017-12-16 00:00:00", NULL),
(84, "Family car", "2017-12-09 01:00:00", NULL,"6841 43 Av Montreal QC H1T 2R9", "Chevrolet 2 door", "Sell", "NULL", "TA@hotmai.com", 44, "Sold", 5, "Store", "Buisness", 21, 1, 1, 13, 1, "2017-12-17 01:00:00", "2017-12-17 01:00:00"),
(85, "Family car", "2017-12-10 02:00:00", NULL,"6842 43 Av Montreal QC H1T 2R9", "Mazda 4 door", "Sell", "NULL", "TA@hotmai.com", 45, "Sold", 1, "Store", "Buisness", 21, 1, NULL, 13, 1, "2017-12-18 02:00:00", NULL),
(86, "Lots of space", "2017-12-11 03:00:00", NULL,"6843 43 Av Montreal QC H1T 2R9", "20 feet truck", "Sell", "NULL", "TA@hotmai.com", 46, "Sold", 2, "Store", "Buisness", 21, 1, 1, 14, 1, "2017-12-19 03:00:00", "2017-12-19 03:00:00"),
(87, "Lots of space", "2017-12-12 04:00:00", NULL,"6844 43 Av Montreal QC H1T 2R9", "Large truck", "Sell", "NULL", "TA@hotmai.com", 47, "Sold", 3, "Store", "Buisness", 21, 1, NULL, 14, 2, "2017-12-20 04:00:00", NULL),
(88, "Durable", "2017-12-13 05:00:00", NULL,"6845 43 Av Montreal QC H1T 2R9", "2 passenger boat", "Sell", "NULL", "TA@hotmai.com", 48, "Sold", 4, "Store", "Buisness", 21, 1, 1, 15, 2, "2017-12-21 05:00:00", "2017-12-21 05:00:00"),
(89, "Durable", "2017-12-14 06:00:00", NULL,"6846 43 Av Montreal QC H1T 2R9", "3 passenger boat", "Sell", "NULL", "TA@hotmai.com", 49, "Sold", 5, "Store", "Buisness", 21, 1, NULL, 15, 2, "2017-12-22 06:00:00", NULL),
(90, "Look cool", "2017-12-15 07:00:00", NULL,"6847 43 Av Montreal QC H1T 2R9", "2 person Motorcycle", "Sell", "NULL", "TA@hotmai.com", 50, "Sold", 1, "Store", "Buisness", 21, 1, 1, 16, 2, "2017-12-23 07:00:00", "2017-12-23 07:00:00"),
(91, "Look cool", "2017-12-16 08:00:00", NULL,"6848 43 Av Montreal QC H1T 2R9", "4 person Motorcyle", "Sell", "NULL", "TA@hotmai.com", 51, "Sold", 2, "Store", "Buisness", 21, 1, NULL, 16, 2, "2017-12-24 08:00:00", NULL);

INSERT into Rents(rentsId, userId, storeId, date,startTime, endTime, delivery)
VALUES(1, 13, 1, "2017-12-02", "13:00:00", "15:00:00", TRUE),
(2, 13, 2, "2017-12-03", "14:00:00", "15:00:00", TRUE),
(3, 13, 2, "2017-12-04", "15:00:00", "18:00:00", TRUE),
(4, 13, 2, "2017-12-05", "16:00:00", "17:00:00", TRUE),
(5, 13, 2, "2017-12-06", "17:00:00", "21:00:00", TRUE),
(6, 13, 2, "2017-12-07", "18:00:00", "20:00:00", TRUE),
(7, 13, 2, "2017-12-08", "19:00:00", "20:00:00", TRUE),
(8, 13, 2, "2017-12-09", "02:00:00", "07:00:00", TRUE),
(9, 13, 2, "2017-12-10", "03:00:00", "04:00:00", TRUE),
(10, 13, 2, "2017-12-11", "04:00:00", "08:00:00", TRUE),
(11, 13, 2, "2017-12-12", "05:00:00", "06:00:00", TRUE),
(12, 21, 1, "2017-12-07", "21:00:00", "23:00:00", TRUE),
(13, 21, 1, "2017-12-08", "01:00:00", "02:00:00", TRUE),
(14, 21, 1, "2017-12-09", "01:00:00", "03:00:00", TRUE),
(15, 21, 1, "2017-12-10", "01:00:00", "03:00:00", TRUE),
(16, 21, 1, "2017-12-11", "02:00:00", "04:00:00", TRUE),
(17, 21, 1, "2017-12-12", "03:00:00", "05:00:00", TRUE),
(18, 21, 2, "2017-12-13", "04:00:00", "06:00:00", TRUE),
(19, 21, 2, "2017-12-14", "05:00:00", "07:00:00", TRUE),
(20, 21, 2, "2017-12-15", "06:00:00", "08:00:00", TRUE),
(21, 21, 2, "2017-12-16", "07:00:00", "09:00:00", TRUE),
(22, 21, 2, "2017-12-17", "08:00:00", "10:00:00", TRUE);


INSERT into StorePayment(storeId, paymentId, paymentMethod, date)
VALUES(2, 41, "Store", "2017-11-26 15:00:00"),
(2, 42, "Store", "2017-11-27 16:00:00"),
(2, 43, "Store", "2017-11-28 17:00:00"),
(2, 44, "Store", "2017-11-29 18:00:00"),
(2, 45, "Store", "2017-11-30 19:00:00"),
(2, 46, "Store", "2017-12-01 20:00:00"),
(2, 47, "Store", "2017-12-02 21:00:00"),
(2, 48, "Store", "2017-12-03 22:00:00"),
(2, 49, "Store", "2017-12-04 23:00:00"),
(2, 50, "Store", "2017-12-01 00:00:00"),
(2, 51, "Store", "2017-12-02 01:00:00"),
(2, 52, "Online", "2017-12-03 02:00:00"),
(2, 53, "Online", "2017-12-04 03:00:00"),
(2, 54, "Online", "2017-12-05 04:00:00"),
(2, 55, "Online", "2017-12-06 05:00:00"),
(2, 56, "Online", "2017-12-07 06:00:00"),
(2, 57, "Online", "2017-12-08 07:00:00"),
(2, 58, "Online", "2017-12-09 08:00:00"),
(2, 59, "Online", "2017-12-10 09:00:00"),
(2, 60, "Online", "2017-12-11 10:00:00"),
(2, 61, "Online", "2017-12-12 11:00:00"),
(2, 62, "Online", "2017-12-13 12:00:00"),
(1, 93, "Online", "2017-12-07 22:00:00"),
(1, 94, "Online", "2017-12-08 23:00:00"),
(1, 95, "Online", "2017-12-09 00:00:00"),
(1, 96, "Online", "2017-12-10 01:00:00"),
(1, 97, "Online", "2017-12-11 02:00:00"),
(1, 98, "Online", "2017-12-12 03:00:00"),
(2, 99, "Online", "2017-12-13 04:00:00"),
(2, 100, "Online", "2017-12-14 05:00:00"),
(2, 101, "Online", "2017-12-15 06:00:00"),
(2, 102, "Online", "2017-12-16 07:00:00"),
(2, 103, "Online", "2017-12-17 08:00:00");


CREATE TABLE PaymentProcessingDepartment LIKE Payment;

DELIMITER $$
CREATE PROCEDURE backupPayments()
BEGIN
	INSERT into PaymentProcessingDepartment
    	SELECT * from Payment
	where Payment.paymentId NOT IN(SELECT distinct(paymentId) from PaymentProcessingDepartment);
END$$
DELIMITER ;

DELIMITER $$
CREATE EVENT backupPaymentEvent
	ON SCHEDULE
	EVERY 1 DAY
	STARTS  CONCAT(current_date(), ' 23:00:00')
	ON COMPLETION PRESERVE
DO
BEGIN
  call backupPayments();
END$$
DELIMITER ;


DELIMITER //
CREATE TRIGGER addExpiryDate
BEFORE INSERT ON Advertisement FOR EACH ROW
BEGIN
    DECLARE membPlanId integer;
    SET membPlanId = (SELECT U.membPlanId FROM User U WHERE U.userId = NEW.userId);
	IF membPlanId = 1 THEN SET New.expiryDate = NOW() + INTERVAL 7 DAY;
	ELSEIF membPlanId = 2 THEN SET New.expiryDate = NOW() + INTERVAL 14 DAY;
	ELSEIF membPlanId = 3 THEN SET New.expiryDate = NOW() + INTERVAL 30 DAY;
	END IF;
END; //
DELIMITER ;