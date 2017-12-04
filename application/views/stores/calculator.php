<div class="submit-ad main-grid-border">
    <script src="<?php echo asset_url();?>js/bootstrap-datepicker.js"></script>
    <link href="<?php echo asset_url();?>css/bootstrap-datepicker3.standalone.css" rel="stylesheet"/>
    <script>
        $('.datepicker').datepicker({
            startDate: '+1d',
            todayHighlight: 'true'
        });
    </script>
    <div class="container">
        <h2 class="head">Rent Calculator</h2>
        <h3>
            <?php if(isset($cost)) { ?>
                The total cost of renting strategic location <?php echo $strategicLocation ?> on <?php echo $date ?> for <?php echo $hours ?> hours
                <?php if ($delivery == 'True') {
                        echo ' with Delivery';
                    } else {
                        echo ' without Delivery';
                    }
                ?>
                is $<?php echo $cost ?>
            <?php }?>
        </h3>
        <div class="post-ad-form">
            <?php echo form_open_multipart('stores/calculate');?>
                <div class="input-group date" data-provide="datepicker">
                    <label>Date<span>*</span></label>
                    <input type="text" name="date" class="form-control" required>
                    <div class="input-group-addon">
                        <span class="glyphicon glyphicon-th"></span>
                    </div>
                </div>
                <div class="clearfix"></div>
                <label>Number of Hours <span>*</span></label>
                <select name="hours" required>
                    <option disabled selected value>Select an Option</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
                <div class="clearfix"></div>
                <label>Strategic Location <span>*</span></label>
                <select name="strategicLocation" required>
                    <option disabled selected value>Select an Option</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                <div class="clearfix"></div>
                <label>Need Delivery? <span>*</span></label>
                <select name="delivery" required>
                    <option disabled selected value>Select an Option</option>
                    <option value="True">Yes</option>
                    <option value="False">No</option>
                </select>
                <input type="submit">
                <div class="clearfix"></div>
            </form>
        </div>
    </div>	
</div>