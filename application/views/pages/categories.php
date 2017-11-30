<!-- Categories -->
<!--Vertical Tab-->
<div class="categories-section main-grid-border">
    <div class="container">
        <h2 class="head">Main Categories</h2>
        <div class="category-list">
            <div id="parentVerticalTab">
                <ul class="resp-tabs-list hor_1">
                    <li>Buy & Sell</li>
                    <li>Services</li>
                    <li>Rent</li>
                    <li>Cars & Vehicles</li>
                    <a href="all-classifieds.html">All Ads</a>
                </ul>
                <div class="resp-tabs-container hor_1">
                    <span class="active total" style="display:block;" data-toggle="modal" data-target="#myModal"><strong>All USA</strong> (Select your city to see local ads)</span>
                    <div>
                        <div class="category">
                            <div class="category-img">
                                <img src="<?php echo asset_url();?>images/cat2.png" title="image" alt="" />
                            </div>
                            <div class="category-info">
                                <h4>Buy & Sell</h4>
                                <span>2,01,850 Ads</span>
                                <a href="all-classifieds.html">View all Ads</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="sub-categories">
                            <ul>
                                <li><a href="#">Clothing</a></li>
                                <li><a href="#">Books</a></li>
                                <li><a href="#">Electronics</a></li>
                                <li><a href="#">Musical Instruments</a></li>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="category">
                            <div class="category-img">
                                <img src="<?php echo asset_url();?>images/cat10.png" title="image" alt="" />
                            </div>
                            <div class="category-info">
                                <h4>Services</h4>
                                <span>7,58,867 Ads</span>
                                <a href="all-classifieds.html">View all Ads</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="sub-categories">
                            <ul>
                                <li><a href="#">Tutors</a></li>
                                <li><a href="#">Event Planners</a></li>
                                <li><a href="#">Pohotgraphers</a></li>
                                <li><a href="#">Personal Trainers</a></li>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="category">
                            <div class="category-img">
                                <img src="<?php echo asset_url();?>images/cat5.png" title="image" alt="" />
                            </div>
                            <div class="category-info">
                                <h4>Services</h4>
                                <span>7,58,867 Ads</span>
                                <a href="all-classifieds.html">View all Ads</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="sub-categories">
                            <ul>
                                <li><a href="#">Tutors</a></li>
                                <li><a href="#">Event Planners</a></li>
                                <li><a href="#">Pohotgraphers</a></li>
                                <li><a href="#">Personal Trainers</a></li>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="category">
                            <div class="category-img">
                                <img src="<?php echo asset_url();?>images/cat10.png" title="image" alt="" />
                            </div>
                            <div class="category-info">
                                <h4>Rent</h4>
                                <span>7,58,867 Ads</span>
                                <a href="all-classifieds.html">View all Ads</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="sub-categories">
                            <ul>
                                <li><a href="#">Electronics</a></li>
                                <li><a href="#">Car</a></li>
                                <li><a href="#">Apartments</a></li>
                                <li><a href="#">Wedding Dresses</a></li>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="category">
                            <div class="category-img">
                                <img src="<?php echo asset_url();?>images/cat3.png" title="image" alt="" />
                            </div>
                            <div class="category-info">
                                <h4>Cars & Vehicle</h4>
                                <span>1,98,080 Ads</span>
                                <a href="all-classifieds.html">View all Ads</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="sub-categories">
                            <ul>
                                <li><a href="#">Cars</a></li>
                                <li><a href="#">Trucks</a></li>
                                <li><a href="#">Boats</a></li>
                                <li><a href="#">Auto Parts & Tires</a></li>
                                <div class="clearfix"></div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!--Plug-in Initialisation-->
<script type="text/javascript">
    $(document).ready(function() {

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>