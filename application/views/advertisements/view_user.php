<div class="submit-ad main-grid-border">
    <div class="container">
        <?php if ($isowner) { ?>
        <h2 class="head">Your Ads</h2>
        <?php } else { ?>
        <h2 class="head"><?php echo $user['firstName'] ?> <?php echo $user['lastName'] ?>'s Ads</h2>
        <?php } ?>
        <?php foreach ($advertisements as $ad) { ?>
            <div>
                <a href="<?php echo base_url();?>advertisements/<?php echo $ad['adId'] ?>">View Details</a></br>
                Title: <?php echo $ad['title'] ?></br>
                Description: <?php echo $ad['description'] ?></br>
                Date: <?php echo $ad['date'] ?></br>
                Address: <?php echo $ad['address'] ?></br>
                Availability: <?php echo $ad['availability'] ?></br>
                Rating: <?php echo $ad['rating'] ?></br>
                Email:<?php echo $ad['email'] ?></br>
                Phone: <?php echo $ad['phone'] ?></br>
                For Sale By: <?php echo $ad['forSaleBy'] ?></br>
                <?php if ($isowner) { ?>
                Status: <?php echo $ad['status'] ?></br>
                <a href="<?php echo base_url();?>advertisements/edit/<?php echo $ad['adId'] ?>"><button type="button" class="btn-warning">Edit</button></a>
                <a><button type="button" class="btn-danger">Delete</button></a>
                <?php } ?>
            </div>
            </br>
            </br>
        <?php } ?>
    </div>	
</div>