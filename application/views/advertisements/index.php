<div class="total-ads main-grid-border">
    <div class="container">
        <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li><a href="<?php echo base_url();?>categories">Categories</a></li>
            <li class="active">Mobiles</li>
        </ol>
        <div class="select-box">
            <div class="search-product ads-list">
                <label>Search for a specific product</label>
                <div class="search">
                    <div id="custom-search-input">
                    <div class="input-group">
                        <input type="text" class="form-control input-lg" placeholder="Buscar" />
                        <span class="input-group-btn">
                            <button class="btn btn-info btn-lg" type="button">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
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
                            <div class="sort">
                                <div class="sort-by">
                                    <label>Sort By : </label>
                                    <select>
                                        <option value="">Most recent</option>
                                    </select>
                                    </div>
                                    </div>
                            <div class="clearfix"></div>
                        <ul class="list">
                            <?php foreach($ads as $ad) { ?>
                            <a href="<?php echo base_url();?>advertisements/<?php echo $ad['adId'] ?>">
                                <li>
                                <img src="images/m1.jpg" title="" alt="" />
                                <section class="list-left">
                                <h5 class="title"><?php echo $ad['title'] ?></h5>
                                <span class="adprice"><?php echo $ad['price'] ?></span>

                                </section>
                                <section class="list-right">
                                <span class="date"><?php echo $ad['date'] ?></span>
                                </section>
                                <div class="clearfix"></div>
                                </li> 
                            </a>
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