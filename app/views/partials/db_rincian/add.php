<?php
$comp_model = new SharedController;
$page_element_id = "add-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="add"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <div  class="my-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 ><link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
                                <div class="cus">FORMULIR DATA RINCI SISWA</div>
                                <hr>
                                    <style>
                                        .cus{
                                        text-align: center;
                                        font-family: 'Poppins', sans-serif;
                                        color: blue;
                                        font-weight: bold;
                                        }
                                    </style></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  class="">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-md-7 comp-grid">
                                    <?php $this :: display_page_errors(); ?>
                                    <div  class="bg-light p-3 animated fadeIn page-content">
                                        <form id="db_rincian-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("db_rincian/add?csrf_token=$csrf_token") ?>" method="post">
                                            <div>
                                                <div class="form-group ">
                                                    <div id="ctrl-id_siswa-holder" class="">
                                                        <input id="ctrl-id_siswa"  value="<?php  echo $this->set_field_value('id_siswa',""); ?>" type="text" placeholder="Nama Siswa" list="id_siswa_list"  required="" name="id_siswa"  class="form-control " />
                                                            <datalist id="id_siswa_list">
                                                                <?php 
                                                                $id_siswa_options = $comp_model -> db_rincian_id_siswa_option_list();
                                                                if(!empty($id_siswa_options)){
                                                                foreach($id_siswa_options as $option){
                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                ?>
                                                                <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                                                                <?php
                                                                }
                                                                }
                                                                ?>
                                                            </datalist>
                                                        </div>
                                                        <small class="form-text">Pilih Nama Siswa</small>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-6">
                                                            <div id="ctrl-no_telp-holder" class="">
                                                                <input id="ctrl-no_telp"  value="<?php  echo $this->set_field_value('no_telp',""); ?>" type="number" placeholder="Isi No telp rumah kalau ada" step="1"  name="no_telp"  class="form-control " />
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div id="ctrl-no_hp-holder" class="">
                                                                    <input id="ctrl-no_hp"  value="<?php  echo $this->set_field_value('no_hp',""); ?>" type="number" placeholder="isi dengan nomer hp yang aktif" step="1"  required="" name="no_hp"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group ">
                                                                <div id="ctrl-email-holder" class="">
                                                                    <input id="ctrl-email"  value="<?php  echo $this->set_field_value('email',""); ?>" type="email" placeholder=" Email"  required="" name="email"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group ">
                                                                    <div id="ctrl-tinggi_badan-holder" class="">
                                                                        <input id="ctrl-tinggi_badan"  value="<?php  echo $this->set_field_value('tinggi_badan',""); ?>" type="number" placeholder="Tinggi Badan" step="1"  required="" name="tinggi_badan"  class="form-control " />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group ">
                                                                        <div id="ctrl-berat_badan-holder" class="">
                                                                            <input id="ctrl-berat_badan"  value="<?php  echo $this->set_field_value('berat_badan',""); ?>" type="number" placeholder="Berat Badan" step="1"  required="" name="berat_badan"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group ">
                                                                            <div id="ctrl-jarak-holder" class="">
                                                                                <input id="ctrl-jarak"  value="<?php  echo $this->set_field_value('jarak',""); ?>" type="number" placeholder="Jarak" step="1"  required="" name="jarak"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group ">
                                                                                <div id="ctrl-waktu-holder" class="input-group">
                                                                                    <input id="ctrl-waktu"  value="<?php  echo $this->set_field_value('waktu',""); ?>" type="text" placeholder="waktu tempuh dari rumah ke sekolah"  required="" name="waktu"  class="form-control " />
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text"><i class="fa fa-clock-o "></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <small class="form-text">Waktu tempuh dalam menit / jam</small>
                                                                                </div>
                                                                                <div class="form-group ">
                                                                                    <div id="ctrl-jml_saudara-holder" class="">
                                                                                        <input id="ctrl-jml_saudara"  value="<?php  echo $this->set_field_value('jml_saudara',""); ?>" type="number" placeholder="Jumlah Saudara sesua kk" step="1"  required="" name="jml_saudara"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group ">
                                                                                        <div id="ctrl-asal_sekolah-holder" class="">
                                                                                            <input id="ctrl-asal_sekolah"  value="<?php  echo $this->set_field_value('asal_sekolah',""); ?>" type="text" placeholder="Asal Sekolah"  required="" name="asal_sekolah"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group form-submit-btn-holder text-center mt-3">
                                                                                        <div class="form-ajax-status"></div>
                                                                                        <button class="btn btn-primary" type="submit">
                                                                                            Simpan
                                                                                            <i class="fa fa-send"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
