<?php
$all_currency = $this->keuangan->currency_all();
//echo "<pre>".print_r($all_currency,1)."</pre>";
?>
<div class="table-responsive">
    <!-- start table-responsive -->

    <table id="datable_1" class="table table-hover display  pb-30" >
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
            <?php
            if (isset($all_currency)) {
                foreach ($all_currency as $key => $value) {
                    ?>
                    <tr>
                        <td><?php echo $value["code"]; ?></td>
                        <td><?php echo $value["name"]; ?></td>
                        <td><?php echo $value["symbol"]; ?></td>
                        <td><?php
                            if ($value["approved"] == 1) {
                                echo "Disetujui";
                            } else {
                                echo "Tidak disetujui";
                            }
                            ?></td>
                        <td><?php echo $value["created"]; ?></td>
                        <td>
                            <a href="<?php echo site_url('admin/keuangan/currency/edit/' . $value['id']); ?>" role="button" class="btn btn-xs btn-primary">Ubah</a>
                            <?php if ($value['approved'] == 0) { ?>
                                <a href="<?php echo site_url('admin/keuangan/currency_approve/' . $value['id']); ?>" role="button" id="btn-approve" class="btn btn-xs btn-success">Approve</a>
                            <?php }
                            
                            if ($value['approved'] == 1) {
                                ?>
                                <a href="<?php echo site_url('admin/keuangan/currency_disapprove/' . $value['id']); ?>" role="button" class="btn btn-xs btn-warning">Disapprove</a>
                            <?php }
                            ?>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>

    <!-- end table-responsive -->
</div>
