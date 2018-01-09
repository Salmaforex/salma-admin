<div class="animate form login_form">
    <!-- start animate -->

    <section class="login_content">
        <!-- start login_content -->
        
        <div align="center"><img src="<?php echo base_url('assets/images/1488292140salmamarket.png'); ?>" class="img-responsive" /></div>
        <form action="<?php echo site_url('login/proses'); ?>" method="POST">
            <div><input type="text" id="email" class="form-control" placeholder="Email" /></div>
            <div><input type="password" id="password" class="form-control" placeholder="Password" /></div>
            <div>
                <button type="submit" class="btn btn-lg btn-block btn-primary">LOGIN</button>
                Forget Password? Click <a href="#">reset password!</a>
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <!-- start separator -->
                <p>
                    <?php $current_year = date("Y"); ?>
                    &copy; <?php echo $current_year; ?> SalmaMarket
                </p>
                
                <!-- end separator -->
            </div>
        </form>
        
        <!-- end login_content -->
    </section>
    
    <!-- end animate -->
</div>