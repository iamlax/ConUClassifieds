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

CREATE TABLE Card (
    cardId int NOT NULL AUTO_INCREMENT,
    cardNumber BIGINT,
    cardType varchar(255),
    PRIMARY KEY (cardId)
);

CREATE TABLE Payment (
    paymentId int NOT NULL AUTO_INCREMENT,
    userID int,
    amount Double,
    cardId int,
    date DATE,
    PRIMARY KEY (paymentId),
	FOREIGN KEY (userID) REFERENCES User(userID),
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
    subCategoryid int NOT NULL AUTO_INCREMENT,
    categoryId int NOT NULL,
    name varchar(255),
    PRIMARY KEY (subCategoryid),
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
    description varchar(255),
    date DATE,
    images varchar(255),
	address varchar(255),
    status varchar(255) DEFAULT "Posted",
    availability varchar(255),
    rating varchar(255) DEFAULT NULL,
    locationId int NOT NULL,
    subCategoryId int NOT NULL,
    title varchar(255),
    type varchar(255),
    email varchar(255) DEFAULT NULL,
	phone varchar(255) DEFAULT NULL,
    price Double,
    forSaleBy varchar(255),
    storeId int,
    PRIMARY KEY (adId),
    FOREIGN KEY (subCategoryId) REFERENCES SubCategory(subCategoryid),
    FOREIGN KEY (userId) REFERENCES User(userId),
    FOREIGN KEY (locationId) REFERENCES Location(locationId),
    FOREIGN KEY (promoId) REFERENCES PromotionPackage(promoId),
	FOREIGN KEY (storeId) REFERENCES Store(storeId)
);

CREATE TABLE Rents (
	rentsId int NOT NULL AUTO_INCREMENT,
    storeId int NOT NULL,
    userId int NOT NULL,
    delivery varchar(255),
    hours varchar(255),
    date DATE,
	PRIMARY KEY (rentsId),
	FOREIGN KEY (userId) REFERENCES User(userId),
    FOREIGN KEY (storeId) REFERENCES Store(storeId)
);

CREATE TABLE StorePayment (
    storeId int NOT NULL,
    paymentId int NOT NULL,
    paymentMethod varchar(255), 
    data DATE,
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
(6, "Delaney", "Car", "DC@hotmail.com", "DC1234", "User ", 1),
(7, "Adrienne", "Stevenson", "AS@hotmail.com", "AS1234", "User ", 1), 
(8, "Abel", "Taunders", "AT@hotmail.com", "AT1234", "User ", 1),
(9, "Katelynn", "Barr", "KB@hotmail.com", "KB1234", "User ", 1),
(10, "Deandre", "Haynes", "DH@hotmail.com", "DH1234", "User ", 2),
(11, "Annika", "Parks", "AP@hotmail.com", "AP1234", "User ", 1),
(12, "Naomi", "Villanueva", "NV@hotmail.com", "NV1234", "User ", 2),
(13, "Sergio", "Cooper", "SC@hotmail.com", "SC1234", "User ", 2),
(14, "Erick", "Mccarty", "EM@hotmail.com", "EM1234", "User ", 2),
(15, "Jaslene", "Lin", "JL@hotmail.com", "JL1234", "User ", 2),
(16, "Gunnar", "Kirby", "GK@hotmail.com", "GK1234", "User ", 3),
(17, "Victoria", "Shaffer", "VS@hotmail.com", "VS1234", "User ", 3),
(18, "Elisha", "Harrington", "EH@hotmail.com", "EH1234", "User ", 3),
(19, "Carsen", "Kemp", "CK@hotmail.com", "CK1234", "User ", 3),
(20, "Edna", "Dccarty", "ED@hotmail.com", "EM1234", "User ", 3);

INSERT into Card(cardId, cardNumber, cardType)
VALUES(1, 4539937618825770, "Visa"),
(2, 4485143132202660, "Visa"),
(3, 4556119783048130, "Visa"),
(4, 4916222916560180, "Visa"),
(5, 4716121300744330, "Visa"),
(6, 5244169352589420, "Mastercard"),
(7, 5118717339818440, "Mastercard"),
(8, 5335698282814770, "Mastercard"),
(9, 5489419629934160, "Mastercard"),
(10, 5118184210991760, "Mastercard"),
(11, 6011799570191260, "American Express"),
(12, 6011977049126790, "American Express"),
(13, 6011875119881310, "American Express"),
(14, 6011573912781280, "American Express"),
(15, 6011844566324420, "American Express"),
(16, 347969284901707, "Capital One"),
(17, 340645157373060, "Capital One"),
(18, 373787835718355, "Capital One"),
(19, 346098970061666, "Capital One"),
(20, 349745688116227, "Capital One");

INSERT into Payment(paymentId, amount, cardId, date,userId)
VALUES(1, 25, 1, "2015-11-29", 6),
(2, 25, 2, "2015-12-25", 7),
(3, 25, 3, "2016-01-05", 8),
(4, 25, 4, "2016-03-10", 9),
(5, 25, 5, "2016-03-12", 10),
(6, 50, 6, "2016-03-20", 11),
(7, 50, 7, "2016-04-13", 12),
(8, 50, 8, "2016-04-14", 13),
(9, 50, 9, "2016-04-25", 14),
(10, 50, 10, "2016-04-30", 15),
(11, 70, 11, "2016-05-06", 16),
(12, 70, 12, "2016-05-11", 17),
(13, 70, 13, "2016-05-22", 18),
(14, 70, 14, "2016-05-24", 19),
(15, 70, 15, "2016-06-15", 20),
(16, 10, 16, "2016-12-07", 6),
(17, 50, 17, "2016-12-13", 7),
(18, 90, 18, "2016-12-14", 8),
(19, 10, 19, "2016-12-18", 9),
(20, 50, 20, "2016-12-21", 10),
(21, 90, 1, "2016-12-26", 11),
(22, 10, 2, "2017-01-04", 12),
(23, 50, 3, "2017-02-01", 13),
(24, 90, 4, "2017-02-04", 14),
(25, 10, 5, "2017-03-13", 6),
(26, 50, 6, "2017-06-01", 7),
(27, 90, 7, "2017-06-10", 8),
(28, 10, 8, "2017-06-14", 9),
(29, 50, 9, "2017-07-18", 10),
(30, 90, 10, "2017-08-10", 11),
(31, 10, 11, "2017-08-31", 12),
(32, 150, 11, "2017-11-20", 13),
(33, 70, 11, "2017-11-21", 13),
(34, 20, 11, "2017-11-22", 13),
(35, 80, 11, "2017-11-23", 13),
(36, 20, 11, "2017-11-24", 13),
(37, 90, 11, "2017-11-25", 13),
(38, 75, 11, "2017-11-26", 13),
(39, 20, 11, "2017-11-27", 13),
(40, 30, 11, "2017-11-28", 13);



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
(2, "14 days promotion", 14, 50),
(3, "30 days promotion", 30, 90);

INSERT into Category(categoryId, name)
VALUES(1, "Buy and Sell"),
(2, "Services"),
(3, "Rent"),
(4, "Cars and Vehicules");

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
(16, "Motorcycles", 4);

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

INSERT into Advertisement(adId, description, date, images,address, title, type, email, phone, price, status, rating, availability, forSaleBy, userId, locationId, promoId, subCategoryId, storeId)
VALUES(1, "Black belt for men", "2015-11-29", NULL,"6817 43 Av Montreal QC H1T 2R9", "Gucci Belt", "Sell", "NULL", "GS@hotmail.com", 5254, "Posted", 1, "Store", "Buisness", 6, 1, 1, 1, NULL),
(2, "342 page book", "2015-12-25", NULL,"181 Delisle Laval QC H7A 2V2", "Harry Potter", "Sell", "NULL", "HS@hotmail.com", 8547, "Posted", 4, "Store", "Buisness", 7, 2, 2, 2, NULL),
(3, "Excellent condition, for school, work or home.", "2016-01-05", NULL,"5180 Rue Michel Saint-Hubert QC J3Y 2M9", "Dell XPS 13", "Sell", "NULL", "DS@hotmail.com", 6530, "Posted", 5, "Store", "Buisness", 8, 3, 3, 3, NULL),
(4, "First come first serve", "2016-03-10", NULL,"1890 Rue Bergeron Jonquière QC G7X 5E6", "Guitar signed by Pierre Maison", "Sell", "NULL", "GS@hotmail.com", 1436, "Posted", 2, "Store", "Buisness", 9, 4, 1, 4, NULL),
(5, "10 years experience", "2016-03-12", NULL,"1350 Golden Line Rd Almonte ON K0A 1A0", "English Tutor", "Buy", "NULL", "EB@hotmail.com", 3564, "Posted", 1, "Store", "Buisness", 10, 5, 2, 5, NULL),
(6, "Adults and kids", "2016-03-20", NULL,"530 Wallace Ave Windsor ON N9G 1L9", "Birthday Party Planner", "Sell", "NULL", "BS@hotmail.com", 6240, "Posted", 3, "Store", "Buisness", 11, 6, 3, 6, NULL),
(7, "All ages", "2016-04-13", NULL,"632 Thistle Cres Thunder Bay ON P7E 2S7", "Professional Pictures", "Sell", "NULL", "PS@hotmail.com", 885, "Expired", 4, "Online", "Buisness", 12, 7, 1, 7, NULL),
(8, "For women", "2016-04-14", NULL,"500 Kingston Rd Toronto ON M4L 1V3", "Gym Trainer", "Sell", "NULL", "GS@hotmail.com", 2734, "Expired", 2, "Online", "Buisness", 13, 8, 2, 8, NULL),
(9, "Newest phone", "2016-04-25", NULL,"7503 Rue St Denis Montreal QC H2R 2E7", "Samsung Galaxy S9", "Buy", "NULL", "SB@hotmail.com", 4582, "Posted", 2, "Online", "Owner", 14, 1, 3, 9, NULL),
(10, "Gray color", "2016-12-07", NULL,"4624 Rue du Pirée Laval QC H7K 3K7", "Honda Civic", "Sell", "(514) 852-7456", "NULL", 7826, "Posted", 5, "Online", "Owner", 6, 2, 1, 10, NULL),
(11, "Great location near metro", "2016-12-13", NULL,"5760 tsse Boisvert Saint-Hubert QC J3Y 5Y4", "Condo 4 by 4", "Buy", "(514) 952-7423", "NULL", 9096, "Posted", 3, "Online", "Owner", 7, 3, 2, 11, NULL),
(12, "Size 6", "2016-12-14", NULL,"3937 Soucy Jonquière QC G7X 8T1", "White dress", "Sell", "(514) 156-1435", "NULL", 406, "Posted", 4, "Online", "Owner", 8, 4, 3, 12, NULL),
(13, "size 17", "2016-12-18", NULL,"170 Lees Ave Ottawa ON K1S 5G5", "Michelin Tires, 4 pieces", "Buy", "(613) 164-8534", "NULL", 4081, "Posted", 2, "Online", "Owner", 9, 5, 1, 13, NULL),
(14, "Fits 4 people and 2000kg load", "2016-12-21", NULL,"107 Cabana Rd W Windsor ON N9G 2H5", "Huge White Cadillac Truck", "Sell", "(519) 250-6988", "NULL", 5517, "Posted", 2, "Online", "Owner", 10, 6, 2, 14, NULL),
(15, "Very nice", "2016-12-26", NULL,"544 Parkway Dr Thunder Bay ON P7C 5E1", "Good Snowmobile", "Buy", "(807) 577-9217", "NULL", 7382, "Posted", 3, "Online", "Owner", 11, 7, 3, 15, NULL),
(16, "Fast thingz", "2017-01-04", NULL,"315 St Germain Ave Toronto ON M5M 1W4", "Red fast motorcycle", "Sell", "(416) 694-8464", "NULL", 5035, "Posted", 3, "Online", "Owner", 12, 8, 1, 16, NULL),
(17, "Newest fashion", "2017-02-01", NULL,"251 Av Percival Montreal Ouest QC H4X 1T8", "Prada blazer", "Sell", "(514) 123-4567", "NULL", 2110, "Posted", 2, "Online", "Owner", 13, 1, NULL, 1, NULL),
(18, "Exciting and everyone dies.", "2017-02-04", NULL,"1073 40E Av Laval QC H7R 4X4", "Game of thrones", "Sell", "(514) 143-7258", "NULL", 5239, "Posted", 1, "Online", "Owner", 14, 2, NULL, 2, NULL),
(19, "Good for school", "2017-03-13", NULL,"616 Rue Radisson Longueuil QC J4L 4J6", "HP elite", "Buy", "NULL", "HB@hotmail.com", 2005, "Posted", 4, "Online", "Owner", 6, 3, NULL, 3, NULL),
(20, "Without case", "2017-06-01", NULL,"2237 Rue Saucier Jonquiere QC G7S 3T5", "Trumpet", "Sell", "NULL", "TS@hotmail.com", 232, "Posted", 2, "Online", "Owner", 7, 4, NULL, 4, NULL),
(21, "5 years experience", "2017-06-10", NULL,"641 Bathgate Dr 1914 Ottawa ON K1K 3Y3", "Italian Tutor", "Buy", "NULL", "IB@hotmail.com", 2798, "Posted", 5, "Online", "Owner", 8, 5, NULL, 5, NULL),
(22, "Fun for both parties", "2017-06-14", NULL,"3623 Shinglecreek Crt Windsor ON N8W 5T7", "Divorce party", "Sell", "NULL", "DS@hotmail.com", 1741, "Posted", 5, "Online", "Owner", 9, 6, NULL, 6, NULL),
(23, "Make your animal look on point", "2017-07-18", NULL,"400 James St N Thunder Bay ON P7C 4T2", "Animal pictures", "Buy", "NULL", "AB@hotmail.com", 6555, "Posted", 2, "Online", "Owner", 10, 7, NULL, 7, NULL),
(24, "Get fit", "2017-08-10", NULL,"234 Willow Ave Toronto ON M4E 3K7", "Gym Trainer", "Sell", "NULL", "GS@hotmail.com", 7212, "Posted", 5, "Online", "Owner", 11, 8, NULL, 8, NULL),
(25, "Trash, only useful as paper weight", "2017-08-31", NULL,"7766 George Street Lasalle QC H8P 1E1", "Iphone X", "Sell", "NULL", "IS@hotmail.com", 4051, "Posted", 5, "Online", "Owner", 12, 1, NULL, 9, NULL),
(26, "Good for winter", "2016-04-14", NULL,"1731 Rue Le Royer Laval QC H7M 2R6", "Acura CRV", "Sell", "NULL", "AS@hotmail.com", 4355, "Posted", 3, "Online", "Owner", 13, 2, NULL, 10, NULL),
(27, "Spacious area", "2016-04-25", NULL,"3724 Bd Gareau Saint-Hubert QC J3Y 0G", "6 bedroom", "Buy", "NULL", "6B@hotmail.com", 6974, "Posted", 3, "Online", "Owner", 14, 3, NULL, 11, NULL),
(28, "Stylish", "2015-11-29", NULL,"1814 Rue Ste Famille Jonquiere QC G7X 9L1", "Gray dress", "Sell", "(514) 143-7412", "NULL", 4919, "Posted", 3, "Online", "Owner", 6, 4, NULL, 12, NULL),
(29, "Cleans well", "2015-12-25", NULL,"43 Aylmer Ave Ottawa ON K1S 5R4", "Windshield wipers", "Buy", "(613) 143-7564", "NULL", 5637, "Posted", 2, "Online", "Owner", 7, 5, NULL, 13, NULL),
(30, "Quite small", "2016-01-05", NULL,"8000 Clairview Ave C Windsor ON N8S 1H9", "Small truck", "Sell", "(519) 250-7782", "NULL", 124, "Posted", 5, "Online", "Owner", 8, 6, NULL, 14, NULL),
(31, "Goes Vroooom Vroooooom", "2016-03-10", NULL,"2725 Willow Pl Thunder Bay ON P7C 1K8", "Fast Snowmobile", "Buy", "(807) 577-9217", "NULL", 7423, "Posted", 4, "Online", "Owner", 9, 7, NULL, 15, NULL),
(32, "Look like a badass", "2016-03-12", NULL,"26 Goodwood Park Cres East York ON M4C 2G5", "Harley Motorcycle", "Sell", "(416) 694-8464", "NULL", 1147, "Posted", 1, "Online", "Owner", 10, 8, NULL, 16, NULL),
(33, "Good looking", "2016-03-20", NULL,"11727 Rue Notre Dame E Montreal QC H1B 2X8", "Armani Exchange Suit", "Buy", "(514) 426-7522", "NULL", 8542, "Posted", 5, "Online", "Owner", 11, 1, NULL, 1, NULL),
(34, "Long story", "2016-04-13", NULL,"264 Av 7E Laval QC H7N 4J8", "Lord of the Rings Trilogy", "Sell", "(514) 147-8423", "NULL", 3693, "Posted", 3, "Online", "Owner", 12, 2, NULL, 2, NULL),
(35, "High performance", "2016-04-14", NULL,"5815 Av Aubin Saint-Hubert QC J3Y 1H7", "HP Desktop", "Sell", "(514) 265-7845", "NULL", 706, "Posted", 1, "Online", "Owner", 13, 3, NULL, 3, NULL),
(36, "Hard case", "2016-04-25", NULL,"336 Rue Louis Frechette Chicoutimi QC G7J 3A4", "Violin with case", "Sell", "(514) 132-7468", "NULL", 1295, "Posted", 1, "Online", "Owner", 14, 4, NULL, 4, NULL),
(37, "The language of love", "2016-12-07", NULL,"84 Pentland Pl Kanata ON K2K 1V8", "French Tutor", "Buy", "NULL", "FB@hotmail.com", 6697, "Posted", 3, "Online", "Owner", 6, 5, NULL, 5, NULL),
(38, "Make it a memorable event", "2016-12-13", NULL,"1030 Campbell Ave Windsor ON N9B 2J3", "Wedding Planner", "Sell", "NULL", "WS@hotmail.com", 4664, "Posted", 2, "Online", "Owner", 7, 6, NULL, 6, NULL),
(39, "We wil put up with them", "2016-12-14", NULL,"1437 McGregor Ave Thunder Bay ON P7E 5E7", "Kids pictures", "Buy", "NULL", "KB@hotmail.com", 7529, "Posted", 3, "Online", "Owner", 8, 7, NULL, 7, NULL),
(40, "Get healthy", "2016-12-18", NULL,"48 St Clair Ave W Toronto ON M4V 2Z2", "Health Trainer", "Sell", "NULL", "HS@hotmail.com", 673, "Posted", 3, "Online", "Owner", 9, 8, NULL, 8, NULL),
(41, "Good for startup", "2016-12-21", NULL,"5745 17 Av Montreal QC H1X 2R7", "Workstation", "Buy", "NULL", "WB@hotmail.com", 2500, "Posted", 2, "Online", "Owner", 10, 1, NULL, 9, NULL),
(42, "1996 model", "2016-12-26", NULL,"1940 Rue Émmanuel Laval QC H7T 1J5", "Toyota Camry", "Sell", "NULL", "TS@hotmail.com", 807, "Expired", 2, "Online", "Owner", 11, 2, NULL, 10, NULL),
(43, "Perfect for a new family", "2017-01-04", NULL,"1640 Victoria Greenfield Park QC J4V 1M3", "3 bedroom", "Sell", "NULL", "3S@hotmail.com", 3603, "Expired", 1, "Online", "Owner", 12, 3, NULL, 11, NULL),
(44, "stain proof", "2017-02-01", NULL,"5759 Ch St Pierre Laterriere QC G7N 1Y1", "Black dress", "Sell", "NULL", "BS@hotmail.com", 710, "Expired", 3, "Online", "Owner", 13, 4, NULL, 12, NULL),
(45, "sturdy gas pusher", "2017-02-04", NULL,"8 Birchview Rd Nepean ON K2G 3G4", "Exhaust pipes", "Sell", "NULL", "ES@hotmail.com", 5477, "Expired", 2, "Online", "Owner", 14, 5, NULL, 13, NULL),
(46, "Pretty car, with only 2 seats", "2017-03-13", NULL,"382 Askin Ave Windsor ON N9B 2X2", "Lamborghini aventador", "Sell", "(519) 250-7782", "NULL", 2863, "Expired", 4, "Online", "Owner", 6, 6, NULL, 14, NULL),
(47, "Two for sale", "2017-06-01", NULL,"157 Amelia St E Thunder Bay ON P7E 3Z5", "Red ATVs", "Buy", "(807) 577-9217", "NULL", 6993, "Expired", 2, "Online", "Owner", 7, 7, NULL, 15, NULL),
(48, "Can't get safer than 4 wheels.", "2017-06-10", NULL,"1974 Queen St E Toronto ON M4L 1H8", "4 wheel motorcycle", "Sell", "(416) 694-8464", "NULL", 1529, "Expired", 3, "Online", "Owner", 8, 8, NULL, 16, NULL),
(49, " Red", "2015-12-25", NULL,"181 Delisle Laval QC H7A 2V2", "Sweater", "Sell", "NULL", "HS@hotmail.com", 8547, "Posted", 4, "Store", "Buisness", 13, 2, 2, 1, 2),
(50, " Blue", "2015-12-26", NULL,"181 Delisle Laval QC H7A 2V2", "Shirt", "Sell", "NULL", "HS@hotmail.com", 8547, "Posted", 4, "Store", "Buisness", 13, 2, 2, 1, 2),
(51, " Black", "2015-12-27", NULL,"181 Delisle Laval QC H7A 2V2", "Pants", "Sell", "NULL", "HS@hotmail.com", 8547, "Posted", 4, "Store", "Buisness", 13, 2, 2, 1, 2),
(52, " 344 page book", "2015-12-28", NULL,"181 Delisle Laval QC H7A 2V2", "Tales of the Madman", "Sell", "NULL", "HS@hotmail.com", 8547, "Posted", 4, "Store", "Buisness", 13, 2, 2, 2, 2),
(53, " 345 page book", "2015-12-29", NULL,"181 Delisle Laval QC H7A 2V2", "Nickel and Dimed", "Sell", "NULL", "HS@hotmail.com", 8547, "Posted", 4, "Store", "Buisness", 13, 2, 2, 2, 2),
(54, " Dictionary", "2015-12-30", NULL,"181 Delisle Laval QC H7A 2V2", "Oxford Dictionary", "Sell", "NULL", "HS@hotmail.com", 8547, "Posted", 4, "Store", "Buisness", 13, 2, 2, 2, 2),
(55, " Samsung", "2015-12-31", NULL,"181 Delisle Laval QC H7A 2V2", "Cell Phone", "Sell", "NULL", "HS@hotmail.com", 8547, "Posted", 4, "Store", "Buisness", 13, 2, 2, 3, 2),
(56, " Dell", "2016-01-01", NULL,"181 Delisle Laval QC H7A 2V2", "Laptop", "Sell", "NULL", "HS@hotmail.com", 8547, "Posted", 4, "Store", "Buisness", 13, 2, 2, 3, 2),
(57, "Hp", "2016-01-02", NULL,"181 Delisle Laval QC H7A 2V2", "Desktop", "Sell", "NULL", "HS@hotmail.com", 8547, "Posted", 4, "Store", "Buisness", 13, 2, 2, 3, 2),
(58, "With case", "2016-01-03", NULL,"181 Delisle Laval QC H7A 2V2", "Trumpet", "Sell", "NULL", "HS@hotmail.com", 8547, "Posted", 4, "Store", "Buisness", 13, 2, 2, 4, 2),
(59, "For adults", "2016-01-04", NULL,"181 Delisle Laval QC H7A 2V2", "Guitar", "Sell", "NULL", "HS@hotmail.com", 8547, "Posted", 4, "Store", "Buisness", 13, 2, 2, 4, 2);


INSERT into Rents(rentsId, userId, storeId, hours, date,delivery)
VALUES(1, 13, 1, 5, "2016-4-13", "yes"),
(2, 13, 2, 15, "2016-4-14", "yes"),
(3, 13, 2, 7, "43059", "yes"),
(4, 13, 2, 7, "43060", "yes"),
(5, 13, 2, 2, "43061", "yes"),
(6, 13, 2, 8, "43062", "yes"),
(7, 13, 2, 2, "43063", "yes"),
(8, 13, 2, 6, "43064", "yes"),
(9, 13, 2, 5, "43065", "yes"),
(10, 13, 2, 2, "43066", "yes"),
(11, 13, 2, 3, "43067", "yes");
