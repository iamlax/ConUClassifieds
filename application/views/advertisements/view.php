<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Ad</h2>
        <div>
            Title: <?php echo $advertisement['title'] ?></br>
            <?php if ($advertisement['promoId'] > 0) { ?>
                <span class="label label-warning">Promoted</span></br>
            <?php } ?>
            Rank in <?php echo $advertisement['cat_name'] ?>/<?php echo $advertisement['sub_name'] ?> in <?php echo $advertisement['city'] ?>: <span class="label label-primary"><?php echo $advertisement['rank'] ?></span></br>
            Description: <?php echo $advertisement['description'] ?></br>
            Price: $<?php echo $advertisement['price'] ?></br>
            Date: <?php echo $advertisement['date'] ?></br>
            Address: <?php echo $advertisement['address'] ?></br>
            Availability: <?php echo $advertisement['availability'] ?></br>
            StoreId: <?php echo $advertisement['storeId']; ?></br>
            Rating: <?php echo $advertisement['rating'] ?></br>
            Email:<?php echo $advertisement['email'] ?></br>
            Phone: <?php echo $advertisement['phone'] ?></br>
            For Sale By: <?php echo $advertisement['forSaleBy'] ?></br>
            <?php if ($isowner || $isadmin) { ?>
                Expiry:<?php echo $advertisement['expiryDate'] ?></br>
                Promo Expiry: <?php echo $advertisement['promoExpiration'] ?></br>
                Status: <?php echo $advertisement['status'] ?></br>
                <a href="<?php echo base_url();?>advertisements/edit/<?php echo $advertisement['adId'] ?>"><button type="button" class="btn-warning">Edit</button></a>
                <a href="<?php echo base_url();?>ClientPayment/purchasePromotion/<?php echo $advertisement['adId'] ?>"><button type="button" class="btn-warning">Add promotion package</button></a>
                <a href="<?php echo base_url();?>advertisements/delete/<?php echo $advertisement['adId'] ?>"><button type="button" class="btn-danger">Delete</button></a>
            <?php } ?>
        </div>
        <div>
        <?php if(json_decode($advertisement['images'])[0]) { ?>
            Images: </br>
            <?php foreach(json_decode($advertisement['images']) as $image) { ?>
                <img class='images_display' src="<?php echo base_url();?>public/images/uploads/<?php echo $image;?>"/>
            <?php } ?>
        <?php } ?>
        </div>
        <?php if (!$isowner) { ?>
        <div>
            <?php if ($advertisement['status'] == 'Sold' && $advertisement['rating'] == NULL) { ?>
            <?php echo form_open_multipart('advertisements/updateRating'); ?>
                <input type="hidden" name="adId" value="<?php echo $advertisement['adId']; ?>">
                <label>Rate this transaction:</label>
                <select name="rating" id="rating">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <button type="submit">Rate</button>
            </form>
            <?php } ?>
            User: <a href="<?php echo base_url()?>advertisements/user/<?php echo $user['userId'] ?>"><?php echo $user['firstName'] ?> <?php echo $user['lastName'] ?></a> 
        </div>
        <?php } ?>
    </div>	
</div>