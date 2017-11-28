<body>
<section>
    <div id="page-wrapper" class="sign-in-wrapper">
        <div class="graphs">

            <div class="sign-up">
                <h1>Create an account</h1>
                <p class="creating">Having hands on experience in creating innovative designs,I do offer design
                    solutions which harness.</p>
                <h2>Personal Information</h2>
                <?php echo validation_errors(); ?>
                <form action="" method="post">
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>First Name* :</h4>
                        </div>
                        <div class="sign-up2">
                            <input class="form-control" name="firstName" id="firstName" type="text" placeholder=" "/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Last Name* :</h4>
                        </div>
                        <div class="sign-up2">

                            <input class="form-control" name="lastName" id="lastName" type="text" placeholder=" "/>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Email Address* :</h4>
                        </div>
                        <div class="sign-up2">

                            <input class="form-control" name="email" id="email" type="text" placeholder=" "/>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="sign-u">
                        <div class="sign-up1">
                            <h4>Password* :</h4>
                        </div>
                        <div class="sign-up2">

                            <input class="form-control" name="password" id="password" type="password"
                                   placeholder=" "/>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="sub_home">
                        <div class="sub_home_left">

                            <input type="submit" name="register" value="register">

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
</section>
</body>