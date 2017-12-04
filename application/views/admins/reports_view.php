<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Report</h2>
        <table class="table table-striped">
            <?php if (!empty($report1))  { ?>
                <thead>
                <tr>
                    <th>Category Name</th>
                    <th>User Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Posts</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($report1 as $rep1) { ?>
                <tr>
                    <td><?php echo $rep1['name'] ?></td>
                    <td><?php echo $rep1['userId'] ?></td>
                    <td><?php echo $rep1['firstName'] ?></td>
                    <td><?php echo $rep1['lastName'] ?></td>
                    <td><?php echo $rep1['Posts'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
            <?php } ?>
            <?php if (!empty($report2))  { ?>
                <thead>
                    <tr>
                        <th>Ad Id</th>
                        <th>Promo Id</th>
                        <th>User Id</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Images</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Availability</th>
                        <th>Rating</th>
                        <th>Location Id</th>
                        <th>SubCategory Id</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Price</th>
                        <th>For Sale By</th>
                        <th>Store Id</th>
                        <th>SubCategory Id</th>
                        <th>Category Id</th>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($report2 as $rep2) { ?>
                    <tr>
                        <td><?php echo $rep2['adId'] ?></td>
                        <td><?php echo $rep2['promoId'] ?></td>
                        <td><?php echo $rep2['userId'] ?></td>
                        <td><?php echo $rep2['description'] ?></td>
                        <td><?php echo $rep2['date'] ?></td>
                        <td><?php echo $rep2['images'] ?></td>
                        <td><?php echo $rep2['address'] ?></td>
                        <td><?php echo $rep2['status'] ?></td>
                        <td><?php echo $rep2['availability'] ?></td>
                        <td><?php echo $rep2['rating'] ?></td>
                        <td><?php echo $rep2['locationId'] ?></td>
                        <td><?php echo $rep2['subCategoryId'] ?></td>
                        <td><?php echo $rep2['title'] ?></td>
                        <td><?php echo $rep2['type'] ?></td>
                        <td><?php echo $rep2['email'] ?></td>
                        <td><?php echo $rep2['phone'] ?></td>
                        <td><?php echo $rep2['price'] ?></td>
                        <td><?php echo $rep2['forSaleBy'] ?></td>
                        <td><?php echo $rep2['storeId'] ?></td>
                        <td><?php echo $rep2['subCategoryId'] ?></td>
                        <td><?php echo $rep2['categoryId'] ?></td>
                        <td><?php echo $rep2['name'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            <?php } ?>

            <?php if (!empty($report3))  { ?>
                <thead>
                <tr>
                    <th>User Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Membership Plan Id</th>
                    <th>Title</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($report3 as $rep3) { ?>
                <tr>
                    <td><?php echo $rep3['userId'] ?></td>
                    <td><?php echo $rep3['firstName'] ?></td>
                    <td><?php echo $rep3['lastName'] ?></td>
                    <td><?php echo $rep3['email'] ?></td>
                    <td><?php echo $rep3['userType'] ?></td>
                    <td><?php echo $rep3['membPlanId'] ?></td>
                    <td><?php echo $rep3['title'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
            <?php } ?>
            <?php if (!empty($report4))  { ?>
                <thead>
                <tr>
                    <th>Ad Id</th>
                    <th>User Id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Availability</th>
                    <th>Type</th>
                    <th>Sub Category</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($report4 as $rep4) { ?>
                    <tr>
                        <td><?php echo $rep4['adId'] ?></td>
                        <td><?php echo $rep4['userId'] ?></td>
                        <td><?php echo $rep4['title'] ?></td>
                        <td><?php echo $rep4['description'] ?></td>
                        <td><?php echo $rep4['price'] ?></td>
                        <td><?php echo $rep4['date'] ?></td>
                        <td><?php echo $rep4['availability'] ?></td>
                        <td><?php echo $rep4['type'] ?></td>
                        <td><?php echo $rep4['SubCategory'] ?></td>

                    </tr>
                <?php } ?>
                </tbody>
            <?php } ?>
            <?php if (!empty($report5))  { ?>
                <thead>
                <tr>
                    <th>Category</th>
                    <th>City</th>
                    <th>User Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Average Rating</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($report5 as $rep5) { ?>
                    <tr>
                        <td><?php echo $rep5['Category'] ?></td>
                        <td><?php echo $rep5['city'] ?></td>
                        <td><?php echo $rep5['userId'] ?></td>
                        <td><?php echo $rep5['firstName'] ?></td>
                        <td><?php echo $rep5['lastName'] ?></td>
                        <td><?php echo $rep5['avg_rating'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            <?php } ?>
            <?php if (!empty($report6))  { ?>
                <select onChange="window.location.href=this.value">
                    <option disabled selected value> Select an Option</option>
                    <?php foreach($report6 as $man) { ?>
                            <option value="<?php echo base_url();?>admins/report6/<?php echo $man['managerId'];?>">
                                <?php echo $man['managerId'] . ": " . $man['firstName'] ." ".$man['lastName']?>
                            </option>
                        <?php } ?>
                    </select>
            <?php } ?>

            <?php if (!empty($report61))  { ?>

                <thead>
                <tr>
                    <th>Manager Id</th>
                    <th>Store Id</th>
                    <th>Strategic LocationId</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Daily Revenue</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($report61 as $rep61) { ?>
                    <tr>
                        <td><?php echo $rep61['managerId'] ?></td>
                        <td><?php echo $rep61['storeId'] ?></td>
                        <td><?php echo $rep61['strategicLocationId'] ?></td>
                        <td><?php echo $rep61['address'] ?></td>
                        <td><?php echo $rep61['date'] ?></td>
                        <td><?php echo $rep61['Daily_Revenue'] ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="6"></td>
                </tr>
                </tbody>
           <?php } ?>
            <?php if (!empty($report62))  { ?>

                <thead>
                <tr>
                    <th>Store Id</th>
                    <th>Online Payments</th>
                <tr>
                </thead>
                <tbody>
                <?php foreach ($report62 as $rep62) { ?>
                    <tr>
                        <td><?php echo $rep62['storeId'] ?></td>
                        <td><?php echo $rep62['Online_payments'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            <?php } ?>

            <?php if (!empty($report8))  { ?>
                <select onChange="window.location.href=this.value">
                    <option disabled selected value> Select an Option</option>
                    <?php foreach($report8 as $prov) { ?>
                        <option value="<?php echo base_url();?>admins/report8/<?php echo $prov['province'];?>">
                            <?php echo $prov['province'] ?>
                        </option>
                    <?php } ?>
                </select>
            <?php } ?>

            <?php if (!empty($report81))  { ?>

                    <thead>
                    <tr>
                        <th>Store Id</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($report81 as $rep81) { ?>
                        <tr>
                            <td><?php echo $rep81['storeId'] ?></td>
                            <td><?php echo $rep81['Type'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
            <?php } ?>

            <?php if (!empty($report9))  { ?>
                <select onChange="window.location.href=this.value">
                    <option disabled selected value> Select an Option</option>
                    <?php foreach($report9 as $user) { ?>
                        <option value="<?php echo base_url();?>admins/report9/<?php echo $user['userId'];?>">
                            <?php echo ($user['userId'] . ": " .$user['firstName'] ." " . $user['lastName'])?>
                        </option>
                    <?php } ?>
                </select>
            <?php } ?>

            <?php if (!empty($report91))  { ?>

                <thead>
                <tr>
                    <th>Date</th>
                    <th>Hours
                    <th>Cost</th>
                    <th>Paid</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($report91 as $rep91) { ?>
                    <tr>
                        <td><?php echo $rep91['Date'] ?></td>
                        <td><?php echo $rep91['Hours'] ?></td>
                        <td><?php echo $rep91['Cost'] ?></td>
                        <td><?php echo $rep91['Paid'] ?></td>

                    </tr>
                <?php } ?>
                </tbody>
            <?php } ?>

            <?php if (!empty($report7))  { ?>
                <thead>
                <tr>
                    <th>Strategic Location ID</th>
                    <th>Percentage</th>
                    <th>CpH</th>
                    <th>Weekend Hourly Cost</th>
                    <th>Weekday Hourly Cost</th>
                    <th>Delivery Weekend Hourly Cost</th>
                    <th>Delivery Weekday Hourly Cost</th>
                    <th>Cost per Hour on Weekend</th>
                    <th>Cost per Hour on Weekday</th>
                    <th>Cost per Hour on Weekend with Delivery</th>
                    <th>Cost per Hour on Weekday with Delivery</th>
                    <th>Cost Per Customer on Weekend</th>
                    <th>Cost Per Customer on Weekday</th>
                    <th>Cost Per Customer on Weekend with Delivery</th>
                    <th>Cost Per Customer on Weekday with Delivery</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($report7 as $rep7) { ?>
                    <tr>
                        <td><?php echo $rep7['strategicLocationId'] ?></td>
                        <td><?php echo $rep7['percentage'] ?></td>
                        <td><?php echo $rep7['cph'] ?></td>
                        <td><?php echo $rep7['Weekend Hourly Cost'] ?></td>
                        <td><?php echo $rep7['Weekday Hourly Cost'] ?></td>
                        <td><?php echo $rep7['Delivery Weekend Hourly Cost'] ?></td>
                        <td><?php echo $rep7['Delivery Weekday Hourly Cost'] ?></td>
                        <td><?php echo $rep7['Cost per Hour on Weekend'] ?></td>
                        <td><?php echo $rep7['Cost per Hour on Weekday'] ?></td>
                        <td><?php echo $rep7['Cost per Hour on Weekend with Delivery'] ?></td>
                        <td><?php echo $rep7['Cost per Hour on Weekday with Delivery'] ?></td>
                        <td><?php echo $rep7['Cost Per Customer on Weekend'] ?></td>
                        <td><?php echo $rep7['Cost Per Customer on Weekday'] ?></td>
                        <td><?php echo $rep7['Cost Per Customer on Weekend with Delivery'] ?></td>
                        <td><?php echo $rep7['Cost Per Customer on Weekday with Delivery'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            <?php } ?>

            <?php if (!empty($report10_1))  { ?>
                <thead>
                <tr>
                    <th>Category Name</th>
                    <th>User Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Posts</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($report10_1 as $rep10_1) { ?>
                    <tr>
                        <td><?php echo $rep10_1['Category_Name'] ?></td>
                        <td><?php echo $rep10_1['userId'] ?></td>
                        <td><?php echo $rep10_1['firstName'] ?></td>
                        <td><?php echo $rep10_1['lastName'] ?></td>
                        <td><?php echo $rep10_1['Posts'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>