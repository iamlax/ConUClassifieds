<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Post an Ad</h2>
        <div class="post-ad-form">
            <form>
                <label>Select Category <span>*</span></label>
                <select class="">
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
                <input type="text" class="phone" placeholder="Title">
                <div class="clearfix"></div>
                <label>Description <span>*</span></label>
                <textarea class="mess" placeholder="Write few lines about your product"></textarea>
                <div class="clearfix"></div>
                <label>Price <span>*</span></label>
                <input type="text" class="price" placeholder="Price">
                <div class="clearfix"></div>
                <label>Type <span>*</span></label>
                <select>
                    <option value="Buy">Buy</option>
                    <option value="Sell">Sell</option>
                </select>
                <div class="clearfix"></div>
                <label>For Sale By <span>*</span></label>
                <select>
                    <option value="Owner">Owner</option>
                    <option value="Business">Business</option>
                </select>
                <div class="clearfix"></div>
            <div class="upload-ad-photos">
            <label>Images:</label>	
                <div class="photos-upload-view">
                    <form id="upload" action="index.html" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

                    <div>
                        <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
                        <div id="filedrag">or drop files here</div>
                    </div>

                    <div id="submitbutton">
                        <button type="submit">Upload Files</button>
                    </div>
                    </form>
                    </div>
                <div class="clearfix"></div>
                    <script src="js/filedrag.js"></script>
            </div>
                <div class="personal-details">
                <form>
                    <label>Your Phone # <span>*</span></label>
                    <input type="text" class="phone" placeholder="Phone number">
                    <div class="clearfix"></div>
                    <label>Your Email Address<span>*</span></label>
                    <input type="text" class="email" placeholder="Email Address">
                    <div class="clearfix"></div>
                    <label>Selling Address<span>*</span></label>
                    <input type="text" class="email" placeholder="Address">
                    <div class="clearfix"></div>
                    <p class="post-terms">By clicking <strong>post Button</strong> you accept our <a href="terms.html" target="_blank">Terms of Use </a> and <a href="privacy.html" target="_blank">Privacy Policy</a></p>
                <input type="submit" value="Post">					
                <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>	
</div>