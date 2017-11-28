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

        <link href="<?php echo base_url('assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css'); ?>" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('assets/dist/css/style.css'); ?>" rel="stylesheet" type="text/css">
    </head>
    <body>
        <!-- start body -->
        
	<div class="preloader-it">
            <!-- start preloader-it -->
            
            <div class="la-anim-1"></div>
            
            <!-- end preloader-it -->
        </div>
        
        <div class="wrapper pa-0">
            <!-- start wrapper pa-0 -->
            
            <?php $this->load->view("komponen/header_login"); ?>
			
            <!-- Main Content -->
            <div class="page-wrapper pa-0 ma-0 auth-page">
                <!-- start page-wrapper -->
                
		<div class="container-fluid">
                    <!-- start container-fluid -->
                    
                    <div class="table-struct full-width full-height">
                        <!-- start table-struct -->
                        
                        <div class="table-cell vertical-align-middle auth-form-wrap">
                            <!-- start table-cell -->
                            
                            <div class="auth-form  ml-auto mr-auto no-float">
                                <!-- start auth-form -->
                                
                                <div class="row">
                                    <!-- start row -->
                                    
                                    <div class="col-sm-12 col-xs-12">
                                        <!-- start col -->
                                        
                                        <div class="mb-30">
                                            <!-- start div -->
                                            
                                            <h3 class="text-center txt-dark mb-10">Login SalmaMarket</h3>
                                            <!-- <h6 class="text-center nonecase-font txt-grey">Enter your details below</h6> -->
                                            
                                            <!-- end div -->
                                        </div>
                                        <div class="form-wrap">
                                            <!-- start form-wrap -->
                                            <?php 
                                            if($error_message){
                                                echo '<h3>'.$error_message.'</h3>';
                                
                                            }
                                            ?>
                                            <form action="<?php echo site_url('login/proses'); ?>" method="POST">
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="exampleInputEmail_2">Username</label>
                                                    <input type="text" name="email" class="form-control" required="" id="exampleInputEmail_2" placeholder="Enter Username" />
                                                </div>
                                                <div class="form-group">
                                                    <label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
                                                    <a class="capitalize-font txt-primary block mb-10 pull-right font-12" href="forgot-password.html">forgot password ?</a>
                                                    <div class="clearfix"></div>
                                                    <input type="password" name="password" class="form-control" required="" id="exampleInputpwd_2" placeholder="Enter Password" />
                                                </div>
                                                <!-- <div class="form-group">
                                                    <div class="checkbox checkbox-primary pr-10 pull-left">
                                                        <input id="checkbox_2" required="" type="checkbox">
                                                        <label for="checkbox_2"> Keep me logged in</label>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div> -->
                                                <div class="form-group text-center">
                                                    <button type="submit" class="btn btn-info btn-success btn-block">sign in</button>
                                                </div>
                                            </form>
                                            
                                            <!-- end form-wrap -->
                                        </div>
                                        
                                        <!-- end col -->
                                    </div>
                                    
                                    <!-- end row -->
                                </div>
                                
                                <!-- end auth-form -->
                            </div>
                            
                            <!-- end table-cell -->
                        </div>
                        
                        <!-- end table-struct -->
                    </div>
                    
                    <!-- end container-fluid -->
                </div>
                
                <!-- end page-wrapper -->
            </div>
            
            <!-- end wrapper pa-0 -->
	</div>

        <?php $this->load->view("komponen/footer.php"); ?>

        <!-- end body -->
    </body>
</html>