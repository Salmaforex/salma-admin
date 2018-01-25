<?php
    $CI =& get_instance();
    $CI->load->model('proses/m_notif');
    $tips_trick = $CI->m_notif->tips_trick_all();
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
                            <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><?= $title_tab1 ?></a></li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><?= $title_tab2 ?></a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <!-- start myTabContent -->

                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                <!-- start tab-pane -->

                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Detail</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tips_trick as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $value["title"]; ?></td>
                                                <td><?php echo substr($value["detail"],0,20); ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('super_admin/notification/tips_trick/edit/' . $value['id']);  ?>" role="button" class="btn btn-info btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?php
								/*
                                    echo "<pre>";
                                    print_r($tips_trick);
                                    echo "</pre>";
                                */
								?>

                                <!-- end tab-pane -->
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <!-- start tab-pane -->

                                <form method="post" action="<?php echo site_url('super_admin/notification/tips_trick_input'); ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    <div class="form-group">
                                        <label for="title" class="control-label col-md-3 col-sm-3 col-xs-12">Title <span class="required">*</span></label>
                                        <div class="col-md-3 col-sm-12">
                                            <input type="text" name="title" id="title" required="required" class="form-control col-md-7 col-xs-12" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="detail" class="control-label col-md-3 col-sm-3 col-xs-12">Detail <span class="required">*</span></label>
                                        <div class="col-md-4 col-sm-12">
                                            <textarea name="detail" id="detail" required="required" class="form-control col-md-7 col-xs-12" cols="8" rows="5"></textarea>
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