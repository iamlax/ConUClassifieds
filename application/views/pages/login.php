<div id="page-wrapper" class="sign-in-wrapper">
    <div class="graphs">
        <div class="sign-in-form">
            <div class="sign-in-form-top">
                <h1>Log in</h1>
            </div>
            <div class="signin">
                <?php echo form_open('auth_controller/login'); ?>
                <div class="log-input">
                    <div class="log-input-left">
                        <input class="user" name="email" id="email" type="text" required
                               placeholder="Email Address"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="log-input">
                    <div class="log-input-left">
                        <input class="lock" name="password" id="password" type="password" required
                               placeholder="Password"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <input type="submit" name="login" value="Log in">
                </form>
            </div>
            <div class="new_people">
                <h2>For New People</h2>
                <p>Having hands on experience in creating innovative designs,I do offer design
                    solutions which harness.</p>
                <a href="<?php echo base_url(); ?>register">Register Now!</a>
            </div>
        </div>
    </div>
</div>