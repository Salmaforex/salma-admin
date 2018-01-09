<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title><?php echo $title; ?></title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url('assets/vendors/bootstrap/dist/css/bootstrap.min.css'); ?>" rel="stylesheet" />
        <!-- Font Awesome -->
        <link href="<?php echo base_url('assets/vendors/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" />
        <!-- NProgress -->
        <link href="<?php echo base_url('assets/vendors/nprogress/nprogress.css'); ?>" rel="stylesheet" />
        <!-- Animate.css -->
        <link href="<?php echo base_url('assets/vendors/animate.css/animate.min.css'); ?>" rel="stylesheet" />

        <!-- Custom Theme Style -->
        <link href="<?php echo base_url('assets/build/css/custom.min.css'); ?>" rel="stylesheet" />
    </head>
    <body class="login">
        <!-- start body -->
        
        <div class="login_wrapper">
            <!-- start login_wrapper -->
            
            <?php
            if (isset($content)) {
                $this->load->view($content . "_v");
            } else {
                // $this->load->view("super_admin/komponen_superadmin/maincontent.php");
            }
            ?>
            
            <!-- end login_wrapper -->
        </div>
        
        
        <!-- end body -->
    </body>
</html>