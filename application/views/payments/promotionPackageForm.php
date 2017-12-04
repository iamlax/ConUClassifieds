<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Purchase Promotion Packages</h2>
        <div class="post-ad-form">
            <?php echo form_open('ClientPayment/purchasePromotion/'.$adId); ?>
            <input type="hidden" name="adId" value="<?php echo $adId; ?>">
            <div class="clearfix"></div>
            <label>Promotion Packages <span>*</span></label>
            <select required name="promoId">
                <option disabled selected value="">Select A Promotion Here</option>
                <option value= 1>7 days promotion</option>
                <option value= 2>30 days promotion</option>
                <option value= 3>60 days promotion</option>
            </select>
            <div class="clearfix"></div>
            <label>Card Types <span>*</span></label>
            <select required name="cardType">
                <option disabled selected value="">Select Card</option>
                <option value='Visa'>Visa</option>
                <option value='Mastercard'>Mastercard</option>
                <option value='American Express'>American Express</option>
                <option value='Capital One'>Capital One</option>
            </select>
            <div class="clearfix"></div>
            <label>Card Number<span>*</span></label>
            <input required type="text" name="cardNumber" class="fa-credit-card" placeholder="Your Card Number">
            <div class="clearfix"></div>
            <input type="submit" name="purchasePromotion" value="Purchase">
            <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>