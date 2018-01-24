<?php
if($currency_id!=NULL){
    $query = $this->keuangan->currency_get_id($currency_id);
}
$currency = isset($query[0]) ? $query[0] : array();
//echo "<pre>".print_r($all_currency,1)."</pre>";
?>
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

                        <form method="post" action="<?= site_url('admin/keuangan/currency_input/' . $currency_id); ?>">
                            <input type="hidden" name="id" value="<?php echo isset($currency['id']) ? $currency['id'] : NULL; ?>" />
                            <div class="form-group">
                                <label class="control-label mb-10" for="code">Code</label>
                                <div class="input-group col-sm-2">
                                    <div class="input-group-addon"><i class="icon-user"></i></div>
                                    <input type="text" name="code" class="form-control" id="code" value="<?php echo isset($currency['code']) ? $currency['code'] : NULL; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10" for="name">Name</label>
                                <div class="input-group col-sm-6">
                                    <div class="input-group-addon"><i class="icon-envelope-open"></i></div>
                                    <input type="text" name="name" class="form-control" id="name" value="<?php echo isset($currency['name']) ? $currency['name'] : NULL; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label mb-10" for="symbol">Symbol</label>
                                <div class="input-group col-sm-2">
                                    <div class="input-group-addon"><i class="icon-lock"></i></div>
                                    <input type="text" name="symbol" class="form-control" id="symbol" 
                                           value="<?php echo isset($currency['symbol']) ? $currency['symbol'] : NULL; ?>" />
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



        <!-- end panel-wrapper -->
    </div>

    <!-- end panel -->
</div>