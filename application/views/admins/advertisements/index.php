<div class="total-ads main-grid-border">
    <div class="container">
        <div class="select-box">

            <div class="browse-category ads-list">
                <label>Browse Categories</label>
                <select class="selectpicker show-tick" data-live-search="true">
                    <option data-tokens="Mobiles">Mobiles</option>
                </select>
            </div>
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
        <ol class="breadcrumb" style="margin-bottom: 5px;">
            <li><a href="index.html">Home</a></li>
            <li><a href="categories.html">Categories</a></li>
            <li class="active">Mobiles</li>
        </ol>
        <div class="ads-grid">
        </div>
        <div class="ads-display col-md-12">
            <div class="wrapper">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
                                <span class="text">All Ads</span>
                            </a>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                            <div>
                                <div id="container">
                                    <div class="view-controls-list" id="viewcontrols">
                                        <label>view :</label>
                                        <a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
                                        <a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
                                    </div>
                                    <div class="sort">
                                        <div class="sort-by">
                                            <label>Sort By : </label>
                                            <select>
                                                <option value="">Most recent</option>
                                                <option value="">Price: Rs Low to High</option>
                                                <option value="">Price: Rs High to Low</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="list">
                                        <?php foreach($ads as $ad) { ?>
                                            <a href="single.html">
                                                <li>
                                                    <img src="images/m1.jpg" title="" alt="" />
                                                    <section class="list-left">
                                                        <h5 class="title"><?php echo $ad['title'] ?></h5>
                                                        <span class="adprice"><?php echo $ad['price'] ?></span>
                                                        <p class="catpath">Mobile Phones » Brand</p>
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
                        <ul class="pagination pagination-sm">
                            <li><a href="#">Prev</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">7</a></li>
                            <li><a href="#">8</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
</div>