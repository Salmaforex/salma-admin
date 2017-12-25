
<div class="page-wrapper">
    <!-- start page-wrapper / Main Content -->

    <div class="container-fluid pt-25">
        <!-- start container-fluid -->

        <div class="row">
            <!-- start row -->

            <div class="col-sm-12 col-md-12">
                <!-- start col -->

                <?= $this->session->flashdata("success"); ?>

                <div class="panel panel-default card-view">
                    <!-- start panel -->

                    <div class="panel-heading">
                        <!-- start panel-heading -->

						<div class="pull-left">
                            <!-- start pull-left -->

                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <!-- start col -->

        					    <!-- <h5 class="txt-dark"><?php echo $form_title; ?></h5> -->

                                <!-- end col -->
        					</div>

                            <!-- end pull-left -->
                        </div>
                        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 pull-right">
                            <!-- start col -->

                            <ol class="breadcrumb">
                                <li><a href="index.html">Dashboard</a></li>
                                <li><a href="#"><span>Keuangan</span></a></li>
                                <li class="active"><span><?= $breadcrumb_title_edit; ?></span></li>
                            </ol>

                            <!-- end col -->
                        </div>
                        <!-- <div class="clearfix"></div> -->

                        <!-- end panel-heading -->
                    </div>


<?php $this->load->view('admin/forms/currency_form');?>
 
                    <!-- end panel -->
				</div>

                <!-- end col -->
			</div>

            <!-- end row -->
		</div>

        <!-- end container-fluid -->
    </div>

    <footer class="footer container-fluid pl-30 pr-30">
        <!-- start footer -->

        <div class="row">
            <!-- start row -->

            <div class="col-sm-12">
                <!-- start col -->

                <p>2017 &copy; SalmaMarket</p>

                <!-- end col -->
            </div>

            <!-- end row -->
        </div>

        <!-- end footer -->
    </footer>

    <!-- end page-wrapper / Main Content -->
</div>
