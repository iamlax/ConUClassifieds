<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Post an Ad</h2>
        <div class="post-ad-form">
            <?php echo form_open_multipart('advertisements/update'); ?>
            <input type="hidden" name="adId" value="<?php echo $advertisement['adId']; ?>">
                <label>Select Category <span>*</span></label>
                <select class="" name="category">
                    <optgroup label="Categories">
                    <?php foreach ($categories as $category) { ?>
                        <optgroup label="<?php echo $category['name'] ?>">
                            <?php foreach ($category['subCategory'] as $subcategory) { ?>
                                <option value=<?php echo $subcategory['subCategoryId'] ?>><?php echo $subcategory['name'] ?></option>
                            <?php } ?>
                        </optgroup>
                    <?php } ?>
                    </optgroup>
                </select>
                <div class="clearfix"></div>
                <label>Title <span>*</span></label>
                <input type="text" name="title" class="phone" value="<?php echo $advertisement['title']; ?>">
                <div class="clearfix"></div>
                <label>Description <span>*</span></label>
                <textarea class="mess" name="description"><?php echo $advertisement['description']; ?></textarea>
                <div class="clearfix"></div>
                <label>Price <span>*</span></label>
                <input type="text" name="price" class="price" value="<?php echo $advertisement['price']; ?>">
                <div class="clearfix"></div>
                <label>Type <span>*</span></label>
                <select name="type" id="type">
                    <option value="Buy">Buy</option>
                    <option value="Sell">Sell</option>
                </select>
                <div class="clearfix"></div>
                <label>For Sale By <span>*</span></label>
                <select name="forSaleBy" id="forSaleBy">
                    <option value="Owner">Owner</option>
                    <option value="Business">Business</option>
                </select>
                <div class="clearfix"></div>
                <label>Availability <span>*</span></label>
                <select name="availability" id="availability">
                    <option value="Store">Store</option>
                    <option value="Online">Online</option>
                </select>
                <div class="clearfix"></div>
                <label>Store Id</label>
                <select name="storeId" id="storeId">
                    <option disabled selected value>Select an Option</option>
                    <?php foreach ($stores as $store) { ?>
                        <option value="<?php echo $store['storeId'] ?>"><?php echo $store['storeId'] ?></option>
                    <?php } ?>
                </select>
                <div class="clearfix"></div>
                <?php if(json_decode($advertisement['images'])[0]) { ?>
                    Images: </br>
                    <?php foreach(json_decode($advertisement['images']) as $image) { ?>
                        <img class='images_display' src="<?php echo base_url();?>public/images/uploads/<?php echo $image;?>"/>
                    <?php } ?>
                <?php } ?>
                <script>
                    $('#availability').val('<?php echo $advertisement['availability']; ?>');
                    $('#forSaleBy').val('<?php echo $advertisement['forSaleBy']; ?>');
                    $('#type').val('<?php echo $advertisement['type']; ?>');
                    $('#storeId').val('<?php echo $advertisement['storeId']; ?>');
                </script>
            <div class="upload-ad-photos">
                <div class="personal-details">
                    <label>Your Phone # <span>*</span></label>
                    <input type="text" name="phone" class="phone" value="<?php echo $advertisement['phone']; ?>">
                    <div class="clearfix"></div>
                    <label>Your Email Address<span>*</span></label>
                    <input type="text" name="email" class="email" value="<?php echo $advertisement['email']; ?>">
                    <div class="clearfix"></div>
                    <label>Selling Address<span>*</span></label>
                    <input type="text" name="address" class="email" value="<?php echo $advertisement['address']; ?>">
                    <div class="clearfix"></div>
                <input type="submit">					
                <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>	
</div>