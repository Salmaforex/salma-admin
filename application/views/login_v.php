<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <title><?php echo $title; ?></title>
        <meta name="description" content="Philbert is a Dashboard & Admin Site Responsive Template by hencework." />
        <meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Philbert Admin, Philbertadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
        <meta name="author" content="hencework"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" />

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>" />

        <!-- NProgress -->
        <link rel="stylesheet" href="<?php echo base_url('assets/vendors/nprogress/nprogress.css'); ?>" />

        <!-- Animate.css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/vendors/animate.css/animate.min.css'); ?>" />

        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/build/css/custom.min.css'); ?>" rel="stylesheet" />
    </head>
    <body class="login">
        <!-- start body -->

        <div class="login_wrapper">
            <!-- start login_wrapper -->

            <div class="animate form login_form">
                <!-- start animate -->

                <section class="login_content">
                    <!-- start login_content -->
                    
                    <?= $this->session->flashdata('error_message'); ?>

                    <div align="center"><img src="<?php echo base_url('assets/images/1488292140salmamarket.png'); ?>" class="img-responsive" /></div>
                    <form action="<?php echo site_url('login/proses'); ?>" method="POST">
                        <div><input type="text" name="email" class="form-control" placeholder="Email" /></div>
                        <div><input type="password" name="password" class="form-control" placeholder="Password" /></div>
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

            <!-- end login_wrapper -->
        </div>

        <!-- end body -->
    </body>
</html>
