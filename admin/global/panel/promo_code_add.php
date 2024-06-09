<?php
define("ROOTPATH", dirname(dirname(dirname(__DIR__))));
define("APPPATH", ROOTPATH."/php/");
require_once ROOTPATH . '/includes/autoload.php';
require_once ROOTPATH . '/includes/lang/lang_'.$config['lang'].'.php';
admin_session_start();
$pdo = ORM::get_db();

?>
<header class="slidePanel-header overlay">
    <div class="overlay-panel overlay-background vertical-align">
        <div class="service-heading">
            <h2>Add Promo Code</h2>
        </div>
        <div class="slidePanel-actions">
            <div class="btn-group-flat">
                <button type="button" class="btn btn-floating btn-warning btn-sm waves-effect waves-float waves-light margin-right-10" id="post_sidePanel_data"><i class="icon ion-android-done" aria-hidden="true"></i></button>
                <button type="button" class="btn btn-pure btn-inverse slidePanel-close icon ion-android-close font-size-20" aria-hidden="true"></button>
            </div>
        </div>
    </div>
</header>
<div class="slidePanel-inner">
    <div class="panel-body">
        <!-- /.row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div id="post_error"></div>
                    <form name="form2"  class="form form-horizontal" method="post" data-ajax-action="addPromoCode" id="sidePanel_form">
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Code</label>
                                <div class="col-sm-8">
                                    <input type="text" required name="code" id="code" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Type</label>
                                <div class="col-sm-8">
                                    <select name="type" class="form-control">
                                        <option value="">Select Type</option>
                                        <option value="Fixed">Fixed</option>
                                        <option value="Percentage">Percentage</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Amount</label>
                                <div class="col-sm-8">
                                    <input type="number" required name="amount" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Expire Date</label>
                                <div class="col-sm-8">
                                    <input type="date" required name="expire_date" value="" class="form-control">
                                </div>
                            </div>
                            <input type="hidden" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
<script>
    $(function()
    {
        App.initHelpers('select2');
    });
</script>