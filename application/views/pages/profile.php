<!--Vertical Tab-->
<div class="categories-section main-grid-border">
    <div class="container">
        <h2 class="head">User profile</h2>
        <div class="category-list">
            <div id="parentVerticalTab">
                <ul class="resp-tabs-list hor_1">
                    <li>Info</li>
                    <li>My ads</li>
                    <li>Logout</li>
                </ul>
                <div class="resp-tabs-container hor_1">
                    <div>
                        <div class="category">
                            <h3 class="tlt text-center">My account info </h3>
                        </div>
                        <br>
                        <div class="text-center" style="font-size: large">
                            Name
                            : <?php echo $this->session->userdata('firstName') . ' ' . $this->session->userdata('lastName'); ?>
                            <br>
                            Email: <?php echo $this->session->userdata('email'); ?> <br>
                            My Plan: <?php echo $name ?>
                        </div>
                    </div>
                    <div>
                        <div class="category">
                            <h3 class="tlt text-center">My ads </h3>
                        </div>
                        <div class="text-center">
                            <br>
                            <a href="<?php echo base_url() ?>advertisements/user/<?php echo $userId ?>">See my Ads</a>
                        </div>
                    </div>
                    <div>
                        <div class="category">
                            <h3 class="tlt text-center">Log Out</h3>
                        </div>
                        <div class="text-center">
                            <br>
                            <?php echo form_open('auth_controller/logout'); ?>
                            <input type="submit" name="logout" value="Log Out">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Plug-in Initialisation-->
<script type="text/javascript">
    $(document).ready(function () {

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function (event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });
</script>