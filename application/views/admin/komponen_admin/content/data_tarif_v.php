<div class="page-wrapper">
    <!-- start page-wrapper / Main Content -->

    <div class="container-fluid pt-25">
        <!-- start container-fluid -->

        <div class="row">
            <!-- start row -->

            <div class="col-sm-12 col-md-12">
                <!-- start col -->

				<?= $this->session->flashdata("success_ubah"); ?>
                <?= $this->session->flashdata("warning_ubah"); ?>

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
                                <li class="active"><span><?php echo $breadcrumb_title_edit; ?></span></li>
                            </ol>

                            <!-- end col -->
                        </div>
                        <!-- <div class="clearfix"></div> -->

                        <!-- end panel-heading -->
                    </div>

                    <div class="panel panel-default card-view">
                        <!-- start panel -->

                        <div class="panel-wrapper collapse in">
                            <!-- start panel-wrapper -->

                            <div class="panel-body">
                                <!-- start panel-body -->

                                <div class="row">
                                    <!-- start row -->

                                    <div class="col-sm-12 col-md-6 col-md-offset-4">
                                        <!-- start col -->

                                        <div class="form-wrap">
                                            <!-- start form-warp -->

                                            <form method="post" action="<?= site_url('admin/keuangan/tarif_ubah'); ?>">
                                                <input type="hidden" name="id" value="<?php echo $one_tarif->id; ?>" />
												<div class="form-group">
													<label class="control-label mb-10" for="code">Code</label>
													<div class="input-group col-sm-2">
														<div class="input-group-addon"><i class="icon-lock"></i></div>
														<input type="text" class="form-control" id="code" value="<?php echo $one_tarif->currency; ?>" disabled />
													</div>
												</div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="types">Types</label>
                                                    <div class="input-group col-sm-3">
                                                        <div class="input-group-addon"><i class="icon-user"></i></div>
                                                        <input type="text" name="types" class="form-control" id="types" value="<?php echo $one_tarif->types; ?>" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label mb-10" for="price">Price</label>
                                                    <div class="input-group col-sm-6">
                                                        <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                        <input type="text" name="price" class="form-control" id="price" value="<?php echo $one_tarif->price; ?>" />
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-success mr-10">Save</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </form>

                                            <!-- end form-warp -->
                                        </div>

                                        <!-- end col -->
                                    </div>

                                    <!-- end row -->
                                </div>

                                <!-- end panel-body -->
                            </div>

                            <?php
                                echo "<pre>";
                                print_r($one_tarif);
                                echo "</pre>";
                            ?>

                            <!-- end panel-wrapper -->
                        </div>

                        <!-- end panel -->
                    </div>

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
