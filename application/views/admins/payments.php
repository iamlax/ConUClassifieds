<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Report</h2>
        <?php if (!empty($backup))  { ?>
            <?php echo $backup ?>
        <?php } ?>
        <button class="btn btn-success btn-lg" type="button">
            <a href="<?php echo base_url();?>admins/backupPayments" >Backup Payments</a>
        </button>
        <table class="table table-striped">
            <?php if (!empty($payment))  { ?>
                <thead>
                <tr>
                    <th>paymentId</th>
                    <th>userId</th>
                    <th>amount</th>
                    <th>date</th>
                    <th>cardId</th>
                    <th>cardNumber</th>
                    <th>cardType</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($payment as $pay) { ?>
                    <tr>
                        <td><?php echo $pay['paymentId'] ?></td>
                        <td><?php echo $pay['userId'] ?></td>
                        <td><?php echo $pay['amount'] ?></td>
                        <td><?php echo $pay['date'] ?></td>
                        <td><?php echo $pay['cardId'] ?></td>
                        <td><?php echo $pay['cardNumber'] ?></td>
                        <td><?php echo $pay['cardType'] ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>