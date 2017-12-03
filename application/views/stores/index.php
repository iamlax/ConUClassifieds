<div class="stores main-grid-border">
    <div class="container">
        <h2 class="head">Stores List</h2>
        <div>
        Strategic Location 1: </br></br>
        <table class="table table-striped">
            <thead>
                <th>Store Id</th>
                <th>Address</th>
            </thead>
            <tbody>
            <?php foreach ($stores as $store) { ?>
                <?php if ($store['strategicLocationId'] == 1) { ?>
                    <tr>
                        <td><?php echo $store['storeId']?></td>
                        <td><?php echo $store['address']?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
        </br>
        Strategic Location 2: </br></br>
        <table class="table table-striped">
            <thead>
                <th>Store Id</th>
                <th>Address</th>
            </thead>
            <tbody>
            <?php foreach ($stores as $store) { ?>
                <?php if ($store['strategicLocationId'] == 2) { ?>
                    <tr>
                        <td><?php echo $store['storeId']?></td>
                        <td><?php echo $store['address']?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
        </br>
        Strategic Location 3: </br></br>
        <table class="table table-striped">
            <thead>
                <th>Store Id</th>
                <th>Address</th>
            </thead>
            <tbody>
            <?php foreach ($stores as $store) { ?>
                <?php if ($store['strategicLocationId'] == 3) { ?>
                    <tr>
                        <td><?php echo $store['storeId']?></td>
                        <td><?php echo $store['address']?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
        Strategic Location 4: </br></br>
        <table class="table table-striped">
            <thead>
                <th>Store Id</th>
                <th>Address</th>
            </thead>
            <tbody>
            <?php foreach ($stores as $store) { ?>
                <?php if ($store['strategicLocationId'] == 4) { ?>
                    <tr>
                        <td><?php echo $store['storeId']?></td>
                        <td><?php echo $store['address']?></td>
                    </tr>
                <?php } ?>
            <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>