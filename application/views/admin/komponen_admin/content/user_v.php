<div class="page-wrapper">
    <!-- start page-wrapper / Main Content -->

    <div class="container-fluid pt-25">
        <!-- start container-fluid -->

        <div class="row">
            <!-- start row -->

            <div class="col-sm-12 col-md-12">
                <!-- start col -->

                <?= $this->session->flashdata("success"); ?>
                <?= $this->session->flashdata("approve_success"); ?>
                <?= $this->session->flashdata("disapprove_success"); ?>

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
                                <li><a href="#"><span>Member</span></a></li>
                                <li class="active"><span><?= $breadcrumb_title_input; ?></span></li>
                            </ol>

                            <!-- end col -->
                        </div>
                        <!-- <div class="clearfix"></div> -->

                        <!-- end panel-heading -->
                    </div>
                    <div class="panel-wrapper collapse in">
                        <!-- start panel-wrapper -->

						<div class="panel-body">
                            <!-- start panel-body -->

							<div class="pills-struct mt-40">
                                <!-- start pill-struct -->

								<ul role="tablist" class="nav nav-pills" id="myTabs_6">
									<li class="active" role="presentation"><a aria-expanded="true" data-toggle="tab" role="tab" id="home_tab_6" href="#home_6"><?= $sub_title; ?></a></li>
									<li role="presentation" class=""><a data-toggle="tab" id="profile_tab_6" role="tab" href="#profile_6" aria-expanded="false"><?= $sub_title2; ?></a></li>
								</ul>
								<div class="tab-content" id="myTabContent_6">
                                    <!-- start tab-content -->

									<div  id="home_6" class="tab-pane fade active in" role="tabpanel">
										<!-- start home_6 -->

                                        <div class="panel panel-default">
                                            <!-- start panel -->

                                            <div class="panel-wrapper collapse in">
                                                <!-- start panel-wrapper -->

                                                <div class="panel-body">
                                                    <!-- start panel-body -->

                                                    <div class="table-responsive">
                                                        <!-- start table-responsive -->

                                                        <table id="datable_1" class="table table-hover display  pb-30" >
                                                            <thead>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <th>Created</th>
                                                                    <th>Currency</th>
                                                                    <th>Aksi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    foreach ($all_user as $key => $value) {
                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo $value["u_email"]; ?></td>
                                                                        <td><?php echo $value["u_modified"]; ?></td>
                                                                        <td><?php echo $value["u_currency"]; ?></td>
                                                                        <td>
                                                                            <a href="<?php echo site_url('admin/member/user/edit/'.$value['u_id']); ?>" role="button" class="btn btn-xs btn-primary" disable>Ubah</a>
                                                                        </td>
                                                                    </tr>
                                                                <?php
                                                                    }
                                                                ?>
                                                            </tbody>
                                                        </table>

                                                        <!-- end table-responsive -->
                                                    </div>

                                                    <!-- end panel-body -->
                                                </div>

                                                <!-- end panel-wrapper -->
                                            </div>

                                            <!-- end panel -->
                                        </div>

                                        <!-- end home_6 -->
									</div>
									<div  id="profile_6" class="tab-pane fade" role="tabpanel">
                                        <!-- start form_input_currency -->

                                        <div class="row">
                                            <!-- start row -->

                                            <div class="col-sm-12 col-md-12">
                                                <!-- start col -->

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

													                    <form method="post" action="<?= site_url('admin/keuangan/user_input'); ?>">
                    														<div class="form-group">
                    															<label class="control-label mb-10" for="u_email">Email</label>
                    															<div class="input-group col-sm-4">
                    																<div class="input-group-addon"><i class="icon-user"></i></div>
                    																<input type="email" name="u_email" class="form-control" id="u_email" />
                    															</div>
                    														</div>
                    														<div class="form-group">
                    															<label class="control-label mb-10" for="u_currency">Currency</label>
                    															<div class="input-group col-sm-3">
                    																<div class="input-group-addon"><i class="icon-lock"></i></div>
																					<select name="u_currency" class="form-control" id="u_currency">
																						<?php
																							foreach ($currency_name as $key => $value) {
																						?>
																							<option value="<?php echo $value['code']; ?>"><?php echo $value["code"]; ?></option>
																						<?php
																							}
																						?>
																					</select>
                    															</div>
                    														</div>

                    														<button type="submit" class="btn btn-success mr-10">Save</button>
                    														<button type="submit" class="btn btn-default">Cancel</button>
                    													</form>

                                                                        <!-- end form-warp -->
                    												</div>

                                                                    <!-- end col -->
                    											</div>

                                                                <!-- end row -->
                    										</div>

                                                            <!-- end panel-body -->
                    									</div>

                                                        <!-- end panel-wrapper -->
                    								</div>

                                                    <!-- end panel -->
                    							</div>

                                                <!-- end col -->
                    						</div>

                                            <!-- end row -->
                                        </div>

                                        <!-- end form_input_currency -->
									</div>

                                    <!-- end tab-content -->
								</div>

                                <!-- end pill-struct -->
							</div>

                            <!-- end panel-body -->
						</div>

                        <!-- end panel-wrapper -->
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
