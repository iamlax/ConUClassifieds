<body>
	<!-- content-starts-here -->
	<div class="content">
		<div class="categories">
			<div class="container">
				<?php foreach($categories as $category) { ?>
				<div class="col-md-3 focus-grid">
					<a href="<?php echo base_url();?>categories/<?php echo $category['categoryId'] ?>">
						<div class="focus-border">
							<div class="focus-layout">
								<div class="focus-image"><i class="fa fa-asterisk"></i></div>
								<h4 class="clrchg"><?php echo $category['name'] ?></h4>
							</div>
						</div>
					</a>
				</div>
				<?php } ?>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- //slider -->				
		</div>
	</div>
</body>
</html>