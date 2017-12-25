
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

                                                                        <form method="post" action="<?= site_url('admin/keuangan/currency_input'); ?>">
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10" for="code">Code</label>
                                                                                <div class="input-group col-sm-2">
                                                                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                                                                    <input type="text" name="code" class="form-control" id="code" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10" for="name">Name</label>
                                                                                <div class="input-group col-sm-6">
                                                                                    <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                                                                    <input type="text" name="name" class="form-control" id="name" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label class="control-label mb-10" for="symbol">Symbol</label>
                                                                                <div class="input-group col-sm-2">
                                                                                    <div class="input-group-addon"><i class="icon-lock"></i></div>
                                                                                    <input type="text" name="symbol" class="form-control" id="symbol" />
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