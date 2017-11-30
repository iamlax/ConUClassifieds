<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Ad</h2>
        <div>
            Title: <?php echo $advertisement['title'] ?></br>
            Description: <?php echo $advertisement['description'] ?></br>
            Date: <?php echo $advertisement['date'] ?></br>
            Address: <?php echo $advertisement['address'] ?></br>
            Availability: <?php echo $advertisement['availability'] ?></br>
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
            User: <a href="<?php echo base_url()?>advertisements/user/<?php echo $user['userId'] ?>"><?php echo $user['firstName'] ?> <?php echo $user['lastName'] ?></a> 
        </div>
        <?php } ?>
    </div>	
</div>