<div id="page-wrapper" class="sign-in-wrapper">
    <div class="graphs">

        <div class="sign-up">
            <h1>Create an account</h1>
            <p class="creating">Having hands on experience in creating innovative designs,I do offer design
                solutions which harness.</p>
            <h2>Personal Information</h2>
            <?php echo validation_errors(); ?>
            <?php echo form_open('auth_controller/register');?>
            <div class="sign-u">
                <div class="sign-up1">
                    <h4>First Name* :</h4>
                </div>
                <div class="sign-up2">
                    <input class="form-control" name="firstName" id="firstName" type="text" required
                           placeholder="First Name"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="sign-u">
                <div class="sign-up1">
                    <h4>Last Name* :</h4>
                </div>
                <div class="sign-up2">
                    <input class="form-control" name="lastName" id="lastName" type="text" required
                           placeholder="Last Name"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="sign-u">
                <div class="sign-up1">
                    <h4>Email Address* :</h4>
                </div>
                <div class="sign-up2">
                    <input class="form-control" name="email" id="email" type="text" required
                           placeholder="Email Address"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="sign-u">
                <div class="sign-up1">
                    <h4>Password* :</h4>
                </div>
                <div class="sign-up2">
                    <input class="form-control" name="password" id="password" type="password" required
                           placeholder="Password"/>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="sub_home">
                <div class="sub_home_left">
                    <input type="submit" name="register" value="Register">
                </div>
                <div class="sub_home_right">
                    <p>Go Back to <a href="<?php echo base_url(); ?>home">Home</a></p>
                </div>
                <div class="clearfix"></div>
            </div>
            </form>
        </div>
    </div>
</div>