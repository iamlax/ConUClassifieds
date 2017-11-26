

CREATE TABLE MembershipPlan (
    memPlanId int NOT NULL,
    name varchar(255),
    price Double,
    adVisibility varchar(255),
    PRIMARY KEY (memPlanId)
);

CREATE TABLE User (
    userId int NOT NULL,
    firstName varchar(255),
    lastName varchar(255),
    email varchar(255),
    password varchar(255),
    userType varchar(255) NOT NULL,
    memPlanId int,
    PRIMARY KEY (userId),
    FOREIGN KEY (memPlanId) REFERENCES MembershipPlan(memPlanId)
);

CREATE TABLE Payment (
    paymentId int NOT NULL,
    userID int,
    amount Double,
    cardDetails varchar(255),
    data DATE,
    PRIMARY KEY (paymentId),
    FOREIGN KEY (userID) REFERENCES User(userID)
);


CREATE TABLE Location (
    locationId int NOT NULL,
    province varchar(255),
    city varchar(255),
    PRIMARY KEY (locationId)
);


CREATE TABLE PromotionPackage (
    promoId int NOT NULL,
    description varchar(255),
    duration varchar(255),
    price Double,
    PRIMARY KEY (promoId)
);

CREATE TABLE Category (
    categoryId int NOT NULL,
    name varchar(255),
    PRIMARY KEY (categoryId)
);

CREATE TABLE SubCategory (
    subCategoryid int NOT NULL,
    categoryId int NOT NULL,
    name varchar(255),
    PRIMARY KEY (subCategoryid),
    FOREIGN KEY (categoryId) REFERENCES Category(categoryId)
);


CREATE TABLE Advertisement (
    adId int NOT NULL,
    promoId int NOT NULL,
    userId int NOT NULL,
    description varchar(255),
    data DATE,
    images varchar(255),
    status varchar(255),
    availability varchar(255),
    rating varchar(255),
    locationId int NOT NULL,
    subCategoryId int NOT NULL,
    title varchar(255),
    type int NOT NULL,
    contactInfo varchar(255),
    price Double,
    forSaleBy int NOT NULL,
    PRIMARY KEY (adId),
    FOREIGN KEY (subCategoryId) REFERENCES SubCategory(subCategoryid),
    FOREIGN KEY (userId) REFERENCES User(userId),
    FOREIGN KEY (locationId) REFERENCES Location(locationId),
    FOREIGN KEY (promoId) REFERENCES PromotionPackage(promoId)
);

CREATE TABLE StrategicLocation (
    strategicLocationId int NOT NULL,
    percentage int,
    cph int,
    PRIMARY KEY (strategicLocationId)
);

CREATE TABLE Store (
    storeId int NOT NULL,
    strategicLocationId int,
    address varchar(255),
    managerId int,
    PRIMARY KEY (storeId),
    FOREIGN KEY (managerId) REFERENCES User(userId),
    FOREIGN KEY (strategicLocationId) REFERENCES StrategicLocation(strategicLocationId)
);

CREATE TABLE Rents (
    rentId int NOT NULL,
    storeId int NOT NULL,
    userId int NOT NULL,
    delivery varchar(255),
    hours varchar(255),
    data DATE,
    PRIMARY KEY (rentId),
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


