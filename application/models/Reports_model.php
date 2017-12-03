<?php
/**
 * Created by PhpStorm.
 * User: Laxman
 * Date: 11/29/2017
 * Time: 11:02 PM
 */

class Reports_model extends CI_Model
{

    public function usersThatPostedHighestNumberInEachCategory($category)
    {
        $query = $this->db->query("SELECT Category.name, User.userId, User.firstName, User.lastName, COUNT(*) as Posts
            FROM User
            INNER JOIN Advertisement ON User.userId = Advertisement.userId
            LEFT JOIN SubCategory ON Advertisement.SubCategoryId = SubCategory.subCategoryId
            LEFT JOIN Category ON SubCategory.categoryId = Category.categoryId
            WHERE Category.name = \"$category\"
            GROUP BY User.userId
            HAVING COUNT(*) =
            (SELECT MAX(x.num)
            FROM
            (SELECT Count(*) as num 
            FROM User
            INNER JOIN Advertisement ON User.userId = Advertisement.userId
            LEFT JOIN SubCategory ON Advertisement.subCategoryId = SubCategory.subCategoryId
            Left JOIN Category ON SubCategory.categoryId = Category.categoryId
            WHERE Category.name = \"$category\"
            GROUP BY User.userId) x);
            ");

        return $query->result_array();

    }

    public function detailsOfItemsPostedInLast10Days()
    {

        $query = $this->db->query("SELECT *
            FROM Advertisement
            LEFT JOIN SubCategory ON Advertisement.subCategoryId = SubCategory.subCategoryId
            LEFT JOIN Category ON SubCategory.categoryId = Category.categoryId
            WHERE Category.name = \"Buy and Sell\"
            AND Advertisement.date >= CURDATE() - INTERVAL 10 DAY AND Advertisement.date <= CURDATE();
            ");
        return $query->result_array();

    }


    public function usersInQuebecSellingMenWinterJackets()
    {

        $query = $this->db->query("SELECT User.*, Advertisement.title
            FROM User
            INNER JOIN Advertisement on User.userId = Advertisement.userId
            LEFT JOIN SubCategory ON Advertisement.subCategoryId = SubCategory.subCategoryId
            LEFT JOIN Location ON Advertisement.locationId = Location.locationId
            WHERE SubCategory.name = \"Clothing\" AND Location.province = \"Quebec\" AND Advertisement.title = \"Winter Men\'s Jacket\";
            ");
        return $query->result_array();
    }


    public function itemsInTheRentCategory()
    {

        $query = $this->db->query("SELECT Ad.adId, Ad.userId, Ad.title, Ad.description, Ad.price, Ad.date, Ad.availability, Ad.type, SC.name as SubCategory
            FROM Advertisement Ad
            LEFT JOIN SubCategory SC ON Ad.subCategoryId = SC.subCategoryId
            Left JOIN Category C ON SC.categoryId = C.categoryId
            WHERE C.name = 'Rent';
            ");
        return $query->result_array();
    }

    public function sellersHighestAverageRatingForItemsInACategoryForACity($city, $category)
    {

        $query = $this->db->query("SELECT Category.name as Category, Location.city, User.userId, User.firstName, User.lastName, AVG(Advertisement.rating) as avg_rating
FROM User 
INNER JOIN Advertisement on User.userId = Advertisement.userId
LEFT JOIN Subcategory ON Advertisement.subCategoryId = Subcategory.subCategoryId
LEFT JOIN Category ON Subcategory.categoryId = Category.categoryId
LEFT JOIN Location ON Advertisement.locationId = Location.locationId
WHERE Category.name = \"$category\" AND Location.city =\"$city\"
GROUP BY User.userId
HAVING avg_rating = 
(SELECT MAX(avg_rating)
FROM
(SELECT AVG(Advertisement.rating) as avg_rating
FROM User 
INNER JOIN Advertisement on User.userId = Advertisement.userId
LEFT JOIN Subcategory ON Advertisement.subCategoryId = Subcategory.subCategoryId
LEFT JOIN Category ON Subcategory.categoryId = Category.categoryId
LEFT JOIN Location ON Advertisement.locationId = Location.locationId
WHERE Category.name = \"$category\" AND Location.city =\"$city\"
GROUP BY User.userId) x);
");
        return $query->result_array();
    }

    public function getManagers()
    {

        $query = $this->db->query("SELECT * FROM Store S
        INNER JOIN User U on S.managerID = U.userId;");
        return $query->result_array();
    }

    public function dailyRevenue($managerId)
    {

        $query = $this->db->query("SELECT *, SUM(Payment.amount) as Daily_Revenue
FROM Payment
INNER JOIN StorePayment ON Payment.paymentId = StorePayment.paymentId
LEFT JOIN Store on StorePayment.storeId = Store.storeId
WHERE Store.managerId =$managerId AND Payment.date >= CURDATE() - INTERVAL 15 DAY AND Payment.date <= CURDATE()
GROUP BY Payment.date, Store.storeId;
");
        return $query->result_array();
    }

    public function onlinePayments($managerId)
    {

        $query = $this->db->query("SELECT Store.storeId, COUNT(*) as Online_payments
            FROM payment
            INNER JOIN StorePayment ON Payment.paymentId = StorePayment.paymentId
            LEFT JOIN Store on StorePayment.storeId =Store.storeId
            WHERE Store.managerId = $managerId AND StorePayment.paymentMethod='Online' AND Payment.date >= CURDATE() - INTERVAL 15 DAY AND Payment.date <= CURDATE()
            GROUP BY Store.storeId;
            ");
        return $query->result_array();
    }

    public function isItProfitableForASellerInSl1OrSl4()
    {

        $query = $this->db->query("SELECT S.strategicLocationID, S.percentage, S.cph, 15 as \"Weekend Hourly Cost\", 10 as \"Weekday Hourly Cost\", 
10 as \"Delivery Weekend Hourly Cost\", 5 as \"Delivery Weekday Hourly Cost\",(15+(15*(S.percentage/100))) as \"Cost per Hour on Weekend\", 
(10+(10*(S.percentage/100))) as \"Cost per Hour on Weekday\", (15+(15*(S.percentage/100)))+10 as \"Cost per Hour on Weekend with Delivery\", 
(10+(10*(S.percentage/100)))+5 as \"Cost per Hour on Weekday with Delivery\",
(15+(15*(S.percentage/100)))/S.cph as \"Cost Per Customer on Weekend\", (10+(10*(S.percentage/100)))/S.cph as \"Cost Per Customer on Weekday\",
(15+(15*(S.percentage/100))+10)/S.cph as \"Cost Per Customer on Weekend with Delivery\", 
(10+(10*(S.percentage/100))+5)/S.cph as \"Cost Per Customer on Weekday with Delivery\"
            FROM StrategicLocation S
            WHERE S.strategicLocationID=1 OR S.strategicLocationID=4;");
        return $query->result_array();
    }

    public function typesSoldInStore($province)
    {

        $query = $this->db->query("SELECT A.storeId, SC.name as Type 
                FROM Advertisement A
                INNER JOIN Store S ON A.storeId = S.storeId
                INNER JOIN Location L ON A.locationId = L.locationId
                INNER JOIN SubCategory SC ON A.subCategoryId = SC.subCategoryId
                WHERE L.province LIKE \"$province\"
                GROUP BY SC.name;
                ");
        return $query->result_array();
    }

    public function deliveryCostForPastAndPresent7Days($userId)
    {

        $query = $this->db->query("SELECT R.date as Date, SUM(R.hours) as Hours, SUM(IF(Weekday(R.date) = 5 OR 6,15*R.hours,10*R.hours)) as Cost
            FROM Rents R
            INNER JOIN User U ON U.userId = R.userId
            WHERE R.date >= CURDATE() - INTERVAL 7 DAY AND R.date <= CURDATE() + INTERVAL 7 DAY AND U.userId = $userId
            GROUP BY R.date;");

        return $query->result_array();
    }
}

