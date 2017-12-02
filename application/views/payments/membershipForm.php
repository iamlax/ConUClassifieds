<div class="submit-ad main-grid-border">
    <div class="container">
        <h2 class="head">Purchase Membership Plan</h2>
        <div class="post-ad-form">
            <?php echo form_open('ClientPayment/purchaseMembership'); ?>
                <div class="clearfix"></div>
                <label>Membership Plans <span>*</span></label>
                <select required name="membPlanId">
                    <option disabled selected value="">Select A Plan Here</option>
                    <option value= 1>Normal Plan</option>
                    <option value= 2>Silver Plan</option>
                    <option value= 3>Premium Plan</option>
                </select>
                <div class="clearfix"></div>
                <label>Membership Plans <span>*</span></label>
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
                <input type="submit" name="purchase" value="Purchase">
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>