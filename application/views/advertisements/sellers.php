<div class="total-ads main-grid-border">
    <div class="container">
        <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url();?>categories">Categories</a></li>
        </ol>
        <div class="ads-grid">
            </div>
            <div class="ads-display col-md-12">
                <div class="wrapper">					
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                    </ul>
                    <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <div>
                                            <div id="container">
                            <div class="clearfix"></div>
                        <ul class="list">
                            <?php foreach($ads as $ad) { ?>
                                <?php if ($ad['type'] == 'Sell') { ?>
                                    <a href="<?php echo base_url();?>advertisements/<?php echo $ad['adId'] ?>">
                                        <li>
                                        <?php if(json_decode($ad['images'])[0]) { ?>
                                        <img src="<?php echo base_url();?>public/images/uploads/<?php echo json_decode($ad['images'])[0];?>"/>
                                        <?php } ?>
                                        <section class="list-left">
                                        <h5 class="title"><?php echo $ad['title'] ?>
                                        <?php if ($ad['promoId'] > 0) { ?>
                                            <span class="label label-warning">Promoted</span>
                                        <?php } ?>
                                        <span class="label label-primary">Rank: <?php echo array_search($ad['adId'], array_column($ads, 'adId')) + 1; ?></span>
                                        </h5>
                                        <span class="adprice">Type: <?php echo $ad['type'] ?></span>
                                        <span class="adprice">$<?php echo $ad['price'] ?></span>

                                        </section>
                                        <section class="list-right">
                                        <span class="date"><?php echo $ad['date'] ?></span>
                                        </section>
                                        <div class="clearfix"></div>
                                        </li> 
                                    </a>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                    </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>	
</div>