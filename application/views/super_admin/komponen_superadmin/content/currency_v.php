<?php
    $CI =& get_instance();
    $CI->load->model('keuangan_m');
    $settings = $CI->keuangan_m->currency_all();
?>
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
    <?= $this->session->flashdata('warning_input'); ?>

    <?= $this->session->flashdata('success_ubah'); ?>
    <?= $this->session->flashdata('warning_ubah'); ?>

    <?= $this->session->flashdata('success_approve'); ?>
    <?= $this->session->flashdata('warning_approve'); ?>

    <?= $this->session->flashdata('success_disapprove'); ?>
    <?= $this->session->flashdata('warning_disapprove'); ?>

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
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><?= $sub_title ?></a></li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><?= $sub_title2 ?></a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <!-- start myTabContent -->

                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                <!-- start tab-pane -->

                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Symbol</th>
                                            <th>Status</th>
                                            <th>Created</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($settings as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $value["code"]; ?></td>
                                                <td><?php echo $value["name"]; ?></td>
                                                <td><?php echo $value["symbol"]; ?></td>
                                                <td><?php if ($value["approved"] == 1) { ?> <label class="label label-success">Approved</label> <?php } else { ?> <label class="label label-warning">Disapproved</label> <?php } ?></td>
                                                <td><?php echo $value["created"]; ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('super_admin/sistem/currency/edit/' . $value['id']); ?>" role="button" class="btn btn-xs btn-primary">Ubah</a>
                                                    <a href="<?php echo site_url('super_admin/sistem/currency_approve/' . $value['id']); ?>" role="button" id="btn-approve" class="btn btn-xs btn-success">Approve</a>
                                                    <a href="<?php echo site_url('super_admin/sistem/currency_disapprove/' . $value['id']); ?>" role="button" class="btn btn-xs btn-warning">Disapprove</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <!-- end tab-pane -->
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <!-- start tab-pane -->

                                <form method="post" action="<?php echo site_url('super_admin/system/currency_input'); ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label for="code" class="control-label col-md-3 col-sm-3 col-xs-12">Code <span class="required">*</span></label>
                                        <div class="col-md-1 col-sm-12">
                                            <input type="text" name="code" id="code" required="required" class="form-control col-md-7 col-xs-12" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="control-label col-md-3 col-sm-3 col-xs-12">Name <span class="required">*</span></label>
                                        <div class="col-md-2 col-sm-12">
                                            <input type="text" name="name" id="name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="symbol" class="control-label col-md-3 col-sm-3 col-xs-12">Symbol <span class="required">*</span></label>
                                        <div class="col-md-1 col-sm-12">
                                            <input type="text" name="symbol" id="symbol" class="form-control col-md-7 col-xs-12" />
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
<?php
    echo "<pre>";
    print_r($settings);
    echo "</pre>";
?>