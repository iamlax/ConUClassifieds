<div class="regions main-grid-border">
    <div class="container">
        <h2 class="head">Location List</h2>
    </div>
    <?php foreach ($locations as $province => $city) { ?>
    <div class="region-block">
        <div class="container">
            <div class="state col-md-3">
                <h3><?php echo $province ?></h3>
            </div>
            <div class="sun-regions col-md-9">
                <ul>
                    <?php foreach ($locations[$province] as $id => $city) { ?>
                    <li><a href="<?php echo base_url();?>locations/set/<?php echo $id ?>"><?php echo $city ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <?php } ?>
</div>