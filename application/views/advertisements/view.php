<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Ad</h2>
        <div>
            Title: <?php echo $advertisement['title'] ?></br>
            Description: <?php echo $advertisement['description'] ?></br>
            Date: <?php echo $advertisement['date'] ?></br>
            Address: <?php echo $advertisement['address'] ?></br>
            Availability: <?php echo $advertisement['availability'] ?></br>
            StoreId: <?php echo $advertisement['storeId']; ?></br>
            Rating: <?php echo $advertisement['rating'] ?></br>
            Email:<?php echo $advertisement['email'] ?></br>
            Phone: <?php echo $advertisement['phone'] ?></br>
            For Sale By: <?php echo $advertisement['forSaleBy'] ?></br>
            <?php if ($isowner) { ?>
                Status: <?php echo $advertisement['status'] ?></br>
                <a href="<?php echo base_url();?>advertisements/edit/<?php echo $advertisement['adId'] ?>"><button type="button" class="btn-warning">Edit</button></a>
                <a href="<?php echo base_url();?>advertisements/delete/<?php echo $advertisement['adId'] ?>"><button type="button" class="btn-danger">Delete</button></a>
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