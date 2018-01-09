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
                                            <th>Email</th>
                                            <th>Created</th>
                                            <th>Currency</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($all_user as $key => $value) { ?>
                                            <tr>
                                                <td><?php echo $value["u_email"]; ?></td>
                                                <td><?php echo $value["u_modified"]; ?></td>
                                                <td><?php echo $value["u_currency"]; ?></td>
                                                <td>
                                                    <?php if ($value["u_status"] == 1) { ?>
                                                        <label class="label label-success">Approved</label>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo site_url('admin/member/user/edit/' . $value['u_id']); ?>" role="button" class="btn btn-xs btn-primary" disable>Ubah</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <?php
                                echo "<pre>";
                                print_r($all_user);
                                echo "</pre>";
                                ?>

                                <!-- end tab-pane -->
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                <!-- start tab-pane -->

                                Ini Tab 2

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
