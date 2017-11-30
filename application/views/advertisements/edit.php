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
                            <?php foreach ($category['subcategory'] as $subcategory) { ?>
                                <option value=<?php echo $subcategory['subcategoryId'] ?>><?php echo $subcategory['name'] ?></option>
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
                <select name="forsaleby" id="forsaleby">
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
                <input type="text" name="storeId" value="<?php echo $advertisement['storeId']; ?>">
                <div class="clearfix"></div>
                <script>
                    $('#availability').val('<?php echo $advertisement['availability']; ?>');
                    $('#forsaleby').val('<?php echo $advertisement['forSaleBy']; ?>');
                    $('#type').val('<?php echo $advertisement['type']; ?>');
                </script>
            <div class="upload-ad-photos">
            <label>Images:</label>	
                <div class="photos-upload-view">
                    <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

                    <div>
                        <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
                        <div id="filedrag">or drop files here</div>
                    </div>
                    </div>
                <div class="clearfix"></div>
                    <script src="<?php echo asset_url() ?>js/filedrag.js"></script>
            </div>
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