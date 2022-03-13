<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class="my-4">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 ><link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
                                <div class="guru1">SELAMAT DATANG BAPAK IBU GURU</div>
                                <hr/>
                                <style>
                                    .guru1{
                                    font-family: 'Poppins', sans-serif;
                                    font-weight: bold;
                                    font-size: 30px;
                                    color: Blue;
                                    text-align: center;
                                    }
                                </style>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-3 comp-grid">
                            <div class=""><div></div>
                            </div>
                            <?php $rec_count = $comp_model->getcount_datasiswa();  ?>
                            <a class="animated zoomIn record-count card bg-danger text-white"  href="<?php print_link("data_siswa/") ?>">
                                <div class="row">
                                    <div class="col-2">
                                        <i class="fa fa-users "></i>
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
            <div  class="">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-12 comp-grid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
