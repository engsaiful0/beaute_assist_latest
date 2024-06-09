<?php
overall_header(__(""));
?>
<link rel="stylesheet" href="<?php _esc($config['site_url']); ?>css/bootstrap.min.css" />
<script src="<?php _esc($config['site_url']); ?>js/jquery.min.js"></script>
<script src="<?php _esc($config['site_url']); ?>js/bootstrap.min.js"></script>
<link rel="stylesheet" href="<?php _esc($config['site_url']); ?>css/dropzone.css" />
<script src="<?php _esc($config['site_url']); ?>js/dropzone.js"></script>

<!-- Dashboard Container -->
<div class="dashboard-container">

    <?php include_once TEMPLATE_PATH . '/dashboard_sidebar.php'; ?>


    <!-- Dashboard Content
    ================================================== -->
    <div class="dashboard-content-container" data-simplebar>

            <div class="row">
                <div class="col-xl-12 col-md-12 ">
                    <div class="dashboard-box js-accordion-item active">
                        <!-- Headline -->
                        <div class="headline js-accordion-header">
                            <h3><i class="icon-line-awesome-picture-o"></i> <?php _e("Gallery") ?></h3>
                        </div>
                        <div class="content with-padding js-accordion-body">
                            <div class="container">
                                <div class="row" style="margin-bottom:10px">
                                    <div class="col-md-6">
                                        <form  action="<?php _esc($config['app_url']) ?>gallery_upload.php" style="" class="dropzone" id="dropzoneFrom">

                                        </form>
                                    </div>
                                    <div class="col-md-2">
                                        <div align="center" style="margin:5px">
                                            <button type="button" class="btn btn-success" id="submit-all">Upload</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="preview" class="row">
                                </div>

                            </div>


                            <script>
                                $(document).ready(function() {

                                    Dropzone.options.dropzoneFrom = {
                                        autoProcessQueue: false,
                                        acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                                        init: function() {
                                            var submitButton = document.querySelector('#submit-all');
                                            myDropzone = this;
                                            submitButton.addEventListener("click", function() {
                                                myDropzone.processQueue();
                                            });
                                            this.on("complete", function() {
                                                if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                                                    var _this = this;
                                                    _this.removeAllFiles();
                                                }
                                                list_image();
                                            });
                                        },
                                    };

                                    list_image();

                                    function list_image() {
                                        $.ajax({
                                            url: "<?php _esc($config['app_url']) ?>gallery_upload.php",
                                            success: function(data) {
                                                $('#preview').html(data);
                                            }
                                        });
                                    }

                                    $(document).on('click', '.remove_image', function() {
                                        var id = $(this).attr('id');

                                        // Display a confirmation dialog
                                        if (confirm('Are you sure you want to delete this image?')) {
                                            $.ajax({
                                                url: "<?php _esc($config['app_url']) ?>gallery_delete.php",
                                                method: "POST",
                                                data: {
                                                    id: id
                                                },
                                                success: function(data) {
                                                    if (data != 0) {
                                                        Snackbar.show({
                                                            text: 'Image has been deleted successfully!'
                                                        });
                                                    } else {
                                                        Snackbar.show({
                                                            text: 'There is something wrong during image delete!'
                                                        });
                                                    }
                                                    list_image();
                                                }
                                            });
                                        }
                                    });


                                });
                            </script>
                        </div>
                    </div>

                </div>

       
            <?php include_once TEMPLATE_PATH . '/overall_footer_dashboard.php'; ?>