<body>
	<!--Vertical Tab-->
	<div class="categories-section main-grid-border">
		<div class="container">
			<h2 class="head">Main Categories</h2>
			<div class="category-list">
				<div id="parentVerticalTab">
					<ul class="resp-tabs-list hor_1">
						<?php foreach($categories as $category) { ?>
						<li><?php echo $category['name'] ?></li>
						<?php } ?>
						<a href="all-classifieds.html">All Ads</a>
					</ul>
					<div class="resp-tabs-container hor_1">
						<span class="active total" style="display:block;" data-toggle="modal" data-target="#myModal"><strong>All USA</strong> (Select your city to see local ads)</span>
						<?php foreach($categories as $category) { ?>
						<div>
							<div class="category">
								<div class="category-img">
									<img src="<?php echo asset_url();?>images/cat2.png" title="image" alt="" />
								</div>
								<div class="category-info">
									<h4><?php echo $category['name'] ?></h4>
									<span>2,01,850 Ads</span>
									<a href="<?php echo base_url();?>categories/advertisements/<?php echo $category['categoryId'];?>">View all Ads</a>
								</div>
								<div class="clearfix"></div>
							</div>
							<div class="sub-categories">
								<ul>
									<?php foreach($category['subcategory'] as $subcategory) { ?>
									<li><a href="<?php echo base_url();?>categories/advertisements/<?php echo $category['categoryId'];?>/<?php echo $subcategory['subcategoryId'];?>"><?php echo $subcategory['name'] ?></a></li>
									<?php } ?>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
						<?php } ?>
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
</body>
</html>