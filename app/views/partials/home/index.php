<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div class="background: rgb(60,49,221) p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 class="custom-2">Selamat Datang <?php echo USER_NAME ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>

<div>
    <div class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-3 comp-grid">
                    <?php $rec_count = $comp_model->getcount_datasiswa();  ?>
                    <a class="animated zoomIn record-count card bg-primary text-white mb-3"
                        href="<?php print_link("data_siswa/") ?>">
                        <div class="row">
                            <div class="col-2">
                                <i class="fa fa-user "></i>
                            </div>
                            <div class="col-10">
                                <div class="flex-column justify-content align-center">
                                    <div class="title">Data Siswa</div>
                                    <small class=""></small>
                                </div>
                            </div>
                            <h4 class="value"><strong><?php echo $rec_count; ?></strong></h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>