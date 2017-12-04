<div class="total-ads main-grid-border">
    <div class="container">
        <div class="clearfix"></div>
        </div>
    <h2 class="head">User Reports</h2>
        <div class="ads-display col-md-12">
            <div class="wrapper">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                            <div>
                                <div id="container">
                                    <div class="clearfix"></div>
                                    <ul class="list">
                                        <li role="presentation" class="active">
                                            <a href="<?php echo base_url();?>userReports/report10_2" >
                                                <span class="text">10.2 Seller- List of Sellers items sold and rating</span>
                                            </a>
                                        </li>
                                        <li role="presentation" class="active">
                                            <a href="<?php echo base_url();?>userReports/report10_3" >
                                                <span class="text">10.3 Buyer/Regular user - List of users items that have a promotion package on them with the posted and expiry date.</span>
                                            </a>
                                        </li>
                                        <li role="presentation" class="active">
                                            <a href="<?php echo base_url();?>userReports/report10_4" >
                                                <span class="text">10.4 User - List of Users expired items.</span>
                                            </a>
                                        </li>
                                        <?php if (!empty($storeManager)) { ?>
                                            <li role="presentation" class="active">
                                                <a href="<?php echo base_url();?>userReports/report10_5" >
                                                    <span class="text">10.5 Store Manager - List of users renting store space and the times rented.</span>
                                                </a>
                                            </li>
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