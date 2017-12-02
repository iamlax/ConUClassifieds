<div class="container">
    <h2 class="head">Categories</h2>
</div>
<div class="sitemap-regions">
    <div class="container">
        <div class="sitemap-region-grid">
            <?php foreach($categories as $category) { ?>
            <div class="sitemap-region">
                <a href="<?php echo base_url();?>categories/advertisements/<?php echo $category['categoryId'];?>"><h4><?php echo $category['name'] ?></h4></a>
                <ul>
                <?php foreach($category['subCategory'] as $subcategory) { ?>
                <li><a href="<?php echo base_url();?>categories/advertisements/<?php echo $category['categoryId'];?>/<?php echo $subcategory['subCategoryId'];?>"><?php echo $subcategory['name'] ?></a></li>
                <?php } ?>
                </ul>
            </div>
            <?php } ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
