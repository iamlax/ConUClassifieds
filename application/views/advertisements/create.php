<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Post an Ad</h2>
        <div class="post-ad-form">
            <?php echo form_open_multipart('advertisements/create'); ?>
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
                <input type="text" name="title" class="phone" placeholder="Title" required>
                <div class="clearfix"></div>
                <label>Description <span>*</span></label>
                <textarea class="mess" name="description" placeholder="Write few lines about your product" required></textarea>
                <div class="clearfix"></div>
                <label>Price <span>*</span></label>
                <input type="text" name="price" class="price" placeholder="Price" required>
                <div class="clearfix"></div>
                <label>Type <span>*</span></label>
                <select name="type" required>
                    <option disabled selected value>Select an Option</option>
                    <option value="Buy">Buy</option>
                    <option value="Sell">Sell</option>
                </select>
                <div class="clearfix"></div>
                <label>For Sale By <span>*</span></label>
                <select name="forSaleBy" required>
                    <option disabled selected value>Select an Option</option>
                    <option value="Owner">Owner</option>
                    <option value="Business">Business</option>
                </select>
                <div class="clearfix"></div>
                <label>Availability <span>*</span></label>
                <select name="availability" required>
                    <option disabled selected value>Select an Option</option>
                    <option value="Online">Online</option>
                    <option value="Store">Store</option>
                </select>
                <div class="clearfix"></div>
                <label>Store Id</label>
                <select name="storeId">
                    <option disabled selected value>Select an Option</option>
                    <?php foreach ($stores as $store) { ?>
                        <option value="<?php echo $store['storeId'] ?>"><?php echo $store['storeId'] ?></option>
                    <?php } ?>
                </select>
                <div class="clearfix"></div>
            <div class="upload-ad-photos">
            <label>Images <span>*</span>: </label>	
                <div class="photos-upload-view">
                    <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="30000000" />

                    <div>
                        <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" required/>
                    </div>
                    </div>
                <div class="clearfix"></div>
                    <script src="<?php echo asset_url() ?>js/filedrag.js"></script>
            </div>
                <div class="personal-details">
                    <label>Your Phone # <span>*</span></label>
                    <input type="text" name="phone" class="phone" placeholder="Phone number">
                    <div class="clearfix"></div>
                    <label>Your Email Address<span>*</span></label>
                    <input type="text" name="email" class="email" placeholder="Email Address">
                    <div class="clearfix"></div>
                    <label>Selling Address<span>*</span></label>
                    <input type="text" name="address" class="email" placeholder="Address" required>
                    <div class="clearfix"></div>
                <input type="submit">					
                <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>	
</div>