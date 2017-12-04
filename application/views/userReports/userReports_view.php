<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Report</h2>
        <table class="table table-striped">
            <?php if (!empty($report10_2))  { ?>
                <thead>
                <tr>
                    <th>Ad Id</th>
                    <th>Category Name</th>
                    <th>First Name</th>
                    <th>Title</th>
                    <th>Rating</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($report10_2 as $rep10_2) { ?>
                <tr>
                    <td><?php echo $rep10_2['adId'] ?></td>
                    <td><?php echo $rep10_2['Category_Name'] ?></td>
                    <td><?php echo $rep10_2['title'] ?></td>
                    <td><?php echo $rep10_2['rating'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
            <?php } ?>
            <?php if (!empty($report10_3))  { ?>
                <thead>
                    <tr>
                        <th>Ad Id</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Posted Date</th>
                        <th>Promo Expiration</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($report10_3 as $rep10_3) { ?>
                    <tr>
                        <td><?php echo $rep10_3['adId'] ?></td>
                        <td><?php echo $rep10_3['name'] ?></td>
                        <td><?php echo $rep10_3['title'] ?></td>
                        <td><?php echo $rep10_3['Posted_Date'] ?></td>
                        <td><?php echo $rep10_3['promoExpiration'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            <?php } ?>

            <?php if (!empty($report10_4))  { ?>
                <thead>
                <tr>
                    <th>Ad Id</th>
                    <th>Category Name</th>
                    <th>Title</th>
                    <th>Posted Date</th>
                    <th>Expiry Date</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($report10_4 as $rep10_4) { ?>
                <tr>
                    <td><?php echo $rep10_4['adId'] ?></td>
                    <td><?php echo $rep10_4['Category_Name'] ?></td>
                    <td><?php echo $rep10_4['title'] ?></td>
                    <td><?php echo $rep10_4['Posted_Date'] ?></td>
                    <td><?php echo $rep10_4['expiryDate'] ?></td>
                </tr>
                <?php } ?>
                </tbody>
            <?php } ?>

            <?php if (!empty($storeManager))  { ?>
                <select onChange="window.location.href=this.value">
                    <option disabled selected value> Select an Option</option>
                    <?php foreach($storeManager as $st) { ?>
                            <option value="<?php echo base_url();?>userReports/report10_5/<?php echo $st['storeId'];?>">
                                <?php echo $st['storeId'] . ": " . $st['address']?>
                            </option>
                        <?php } ?>
                    </select>
            <?php } ?>

            <?php if (!empty($report10_5))  { ?>

                <thead>
                <tr>
                    <th>Store Id</th>
                    <th>Address</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($report10_5 as $rep10_5) { ?>
                    <tr>
                        <td><?php echo $rep10_5['storeId'] ?></td>
                        <td><?php echo $rep10_5['address'] ?></td>
                        <td><?php echo $rep10_5['firstName'] ?></td>
                        <td><?php echo $rep10_5['lastName'] ?></td>
                        <td><?php echo $rep10_5['email'] ?></td>
                        <td><?php echo $rep10_5['date'] ?></td>
                        <td><?php echo $rep10_5['startTime'] ?></td>
                        <td><?php echo $rep10_5['endTime'] ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="6"></td>
                </tr>
                </tbody>
           <?php } ?>
        </table>
    </div>
</div>