<!-- page content -->
<div class="right_col" role="main">
    <!-- start right_col -->

    <div class="page-title">
        <!-- start page-title -->

        <div class="title_left"><h3><?= $sub_title ?></h3></div>

        <!-- end page-title -->
    </div>

    <div class="clearfix"></div>

    <!-- Menampilkan pesan alert -->
    <?= $this->session->flashdata('success_input'); ?>

    <div class="row">
        <!-- start row -->

        <div class="col-md-12 col-sm-12 col-xs-12">
            <!-- start col -->

            <div class="x_panel">
                <!-- start x_panel -->

                <div class="x_content">
                    <!-- start x_content -->

                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <!-- start div -->

                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><?= $title_tab1 ?></a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <!-- start myTabContent -->

                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                <!-- start tab-pane -->

                                <form method="post" action="<?php echo site_url('super_admin/sistem/currency_ubah/' . $one_currency->id); ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label for="code" class="control-label col-md-3 col-sm-3 col-xs-12">Code <span class="required">*</span></label>
                                        <div class="col-md-1 col-sm-12">
                                            <input type="text" name="code" id="code" required="required" class="form-control col-md-7 col-xs-12" value="<?= $one_currency->code; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span></label>
                                        <div class="col-md-2 col-sm-12">
                                            <input type="text" name="name" id="name" required="required" class="form-control col-md-7 col-xs-12" value="<?= $one_currency->name; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="symbol" class="control-label col-md-3 col-sm-3 col-xs-12">Symbol <span class="required">*</span></label>
                                        <div class="col-md-1 col-sm-12">
                                            <input type="text" name="symbol" id="symbol" class="form-control col-md-7 col-xs-12" value="<?= $one_currency->symbol; ?>"  />
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>

                                <!-- end tab-pane -->
                            </div>

                            <!-- end myTabContent -->
                        </div>

                        <!-- end div -->
                    </div>

                    <!-- end x_content -->
                </div>

                <!-- end x_panel -->
            </div>

            <!-- end col -->
        </div>

        <!-- end row -->
    </div>

    <!-- end right_col -->
</div>
