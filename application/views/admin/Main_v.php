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

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url('assets/vendors/bower_components/morris.js/morris.css'); ?>" rel="stylesheet" type="text/css"/>

        <!-- Data table CSS -->
        <link href="<?php echo base_url('assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css'); ?>" rel="stylesheet" type="text/css"/>

        <link href="<?php echo base_url('assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css'); ?>" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/dist/css/style.css'); ?>" rel="stylesheet" type="text/css">
    </head>
    <body>
        	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
        <div class="wrapper theme-1-active pimary-color-green slide-nav-toggle">
            <?php $this->load->view("admin/komponen_admin/header.php"); ?>
            <?php $this->load->view("admin/komponen_admin/leftside.php"); ?>

        <?php $this->load->view("admin/komponen_admin/rightside.php"); ?>

        <?php
            if (isset($content)) {
                $this->load->view('admin/komponen_admin/content/'.$content."_v");
            } else {
                $this->load->view("admin/komponen_admin/maincontent.php");
            }
        ?>
        </div>
        
        <!-- start body -->

        

        

        <?php $this->load->view("admin/komponen_admin/footer.php"); ?>

        <!-- end body -->
    </body>
</html>
