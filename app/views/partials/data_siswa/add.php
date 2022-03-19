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
    <?php
    if( $show_header == true ){
    ?>
    <div  class="my-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 ">
                    <h4 class="record-title"><link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
                                <div class="cus">FORMULIR SISWA</div>
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
                    <?php
                    }
                    ?>
                    <div  class="my-3">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-md-10 comp-grid">
                                    <?php $this :: display_page_errors(); ?>
                                    <div  class="bg-light p-3 animated fadeIn page-content">
                                        <form id="data_siswa-add-form" role="form" novalidate enctype="multipart/form-data" class="form page-form form-vertical needs-validation" action="<?php print_link("data_siswa/add?csrf_token=$csrf_token") ?>" method="post">
                                            <div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="no_pendaftaran">No Pendaftaran <span class="text-danger">*</span></label>
                                                        <div id="ctrl-no_pendaftaran-holder" class="input-group"> 
                                                            <input id="ctrl-no_pendaftaran"  value="<?php  echo $this->set_field_value('no_pendaftaran',random_num(3)); ?>" type="number" placeholder=" No Pendaftaran" step="1" list="no_pendaftaran_list"  readonly required="" name="no_pendaftaran"  data-url="api/json/data_siswa_no_pendaftaran_value_exist/" data-loading-msg="Checking availability ..." data-available-msg="Available" data-unavailable-msg="Not available" class="form-control  ctrl-check-duplicate" />
                                                                <datalist id="no_pendaftaran_list">
                                                                    <?php
                                                                    $no_pendaftaran_options = Menu :: $no_pendaftaran;
                                                                    if(!empty($no_pendaftaran_options)){
                                                                    foreach($no_pendaftaran_options as $option){
                                                                    $value = $option['value'];
                                                                    $label = $option['label'];
                                                                    $selected = $this->set_field_selected('no_pendaftaran', $value, random_num(3));
                                                                    ?>
                                                                    <option><?php  echo $this->set_field_value('no_pendaftaran',random_num(3)); ?></option>
                                                                    <?php
                                                                    }
                                                                    }
                                                                    ?>
                                                                </datalist>
                                                                <div class="check-status"></div> 
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"><i class="fa fa-plus "></i></span>
                                                                </div>
                                                            </div>
                                                            <small class="form-text">Nomer Pendaftaran akan terisi OTOMATIS</small>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="control-label" for="tanggal_daftar">Tanggal Daftar <span class="text-danger">*</span></label>
                                                            <div id="ctrl-tanggal_daftar-holder" class="input-group"> 
                                                                <input id="ctrl-tanggal_daftar" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('tanggal_daftar',date_now()); ?>" type="datetime" name="tanggal_daftar" placeholder="Tanggal Daftar" data-enable-time="false" data-min-date="" data-max-date="<?php echo date('Y-m-d', strtotime('+3day')); ?>" data-date-format="Y-m-d" data-alt-format="Y-m-d H:i:s" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                    <div class="input-group-append">
                                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label" for="nama_siswa">Nama Siswa <span class="text-danger">*</span></label>
                                                                <div id="ctrl-nama_siswa-holder" class=""> 
                                                                    <input id="ctrl-nama_siswa"  value="<?php  echo $this->set_field_value('nama_siswa',""); ?>" type="text" placeholder="Nama Siswa"  required="" name="nama_siswa"  class="form-control " />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label" for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                                                    <div id="ctrl-jenis_kelamin-holder" class=""> 
                                                                        <?php
                                                                        $jenis_kelamin_options = Menu :: $jenis_kelamin;
                                                                        if(!empty($jenis_kelamin_options)){
                                                                        foreach($jenis_kelamin_options as $option){
                                                                        $value = $option['value'];
                                                                        $label = $option['label'];
                                                                        //check if current option is checked option
                                                                        $checked = $this->set_field_checked('jenis_kelamin', $value, "");
                                                                        ?>
                                                                        <label class="custom-control custom-radio custom-control-inline">
                                                                            <input id="ctrl-jenis_kelamin" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="jenis_kelamin" />
                                                                                <span class="custom-control-label"><?php echo $label ?></span>
                                                                            </label>
                                                                            <?php
                                                                            }
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label" for="nik_siswa">NIK SISWA <span class="text-danger">*</span></label>
                                                                        <div id="ctrl-nik_siswa-holder" class=""> 
                                                                            <input id="ctrl-nik_siswa"  value="<?php  echo $this->set_field_value('nik_siswa',""); ?>" type="number" placeholder="Nik Siswa" step="1"  required="" name="nik_siswa"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="control-label" for="tempat_lhr">Tempat Lahir <span class="text-danger">*</span></label>
                                                                            <div id="ctrl-tempat_lhr-holder" class=""> 
                                                                                <input id="ctrl-tempat_lhr"  value="<?php  echo $this->set_field_value('tempat_lhr',""); ?>" type="text" placeholder="Tempat Lahir"  required="" name="tempat_lhr"  class="form-control " />
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label class="control-label" for="tanggal_lhr">Tanggal Lahir <span class="text-danger">*</span></label>
                                                                                <div id="ctrl-tanggal_lhr-holder" class="input-group"> 
                                                                                    <input id="ctrl-tanggal_lhr" class="form-control datepicker  datepicker"  required="" value="<?php  echo $this->set_field_value('tanggal_lhr',""); ?>" type="datetime" name="tanggal_lhr" placeholder="Tanggal Lahir" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="F j, Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                                        <div class="input-group-append">
                                                                                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label class="control-label" for="no_reg_akte">Nomer Register Akte <span class="text-danger">*</span></label>
                                                                                    <div id="ctrl-no_reg_akte-holder" class=""> 
                                                                                        <input id="ctrl-no_reg_akte"  value="<?php  echo $this->set_field_value('no_reg_akte',""); ?>" type="text" placeholder="Nomer Register Akte"  required="" name="no_reg_akte"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label class="control-label" for="agama">Agama <span class="text-danger">*</span></label>
                                                                                        <div id="ctrl-agama-holder" class=""> 
                                                                                            <select required=""  id="ctrl-agama" name="agama"  placeholder="Pilih Salah Satu Sesuai Nomer"    class="custom-select" >
                                                                                                <option value="">Pilih Salah Satu Sesuai Nomer</option>
                                                                                                <?php
                                                                                                $agama_options = Menu :: $agama;
                                                                                                if(!empty($agama_options)){
                                                                                                foreach($agama_options as $option){
                                                                                                $value = $option['value'];
                                                                                                $label = $option['label'];
                                                                                                $selected = $this->set_field_selected('agama', $value, "");
                                                                                                ?>
                                                                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                                                    <?php echo $label ?>
                                                                                                </option>                                   
                                                                                                <?php
                                                                                                }
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label class="control-label" for="kewarga">Kewarganegaraan <span class="text-danger">*</span></label>
                                                                                        <div id="ctrl-kewarga-holder" class=""> 
                                                                                            <select required=""  id="ctrl-kewarga" name="kewarga"  placeholder="Kewarganegaraan"    class="custom-select" >
                                                                                                <option value="">Kewarganegaraan</option>
                                                                                                <?php
                                                                                                $kewarga_options = Menu :: $kewarga;
                                                                                                if(!empty($kewarga_options)){
                                                                                                foreach($kewarga_options as $option){
                                                                                                $value = $option['value'];
                                                                                                $label = $option['label'];
                                                                                                $selected = $this->set_field_selected('kewarga', $value, "");
                                                                                                ?>
                                                                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                                                    <?php echo $label ?>
                                                                                                </option>                                   
                                                                                                <?php
                                                                                                }
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label class="control-label" for="keb_khusus_s">Berkebutuhan Khusus <span class="text-danger">*</span></label>
                                                                                        <div id="ctrl-keb_khusus_s-holder" class=""> 
                                                                                            <select required=""  id="ctrl-keb_khusus_s" name="keb_khusus_s"  placeholder="Pilih Salah Satu"    class="custom-select" >
                                                                                                <option value="">Pilih Salah Satu</option>
                                                                                                <?php 
                                                                                                $keb_khusus_s_options = $comp_model -> data_siswa_keb_khusus_s_option_list();
                                                                                                if(!empty($keb_khusus_s_options)){
                                                                                                foreach($keb_khusus_s_options as $option){
                                                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                                                $selected = $this->set_field_selected('keb_khusus_s',$value, "");
                                                                                                ?>
                                                                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                                                    <?php echo $label; ?>
                                                                                                </option>
                                                                                                <?php
                                                                                                }
                                                                                                }
                                                                                                ?>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label class="control-label" for="alamat">Alamat Saat Ini <span class="text-danger">*</span></label>
                                                                                        <div id="ctrl-alamat-holder" class=""> 
                                                                                            <textarea placeholder=" Alamat Saat Ini" id="ctrl-alamat"  required="" rows="4" name="alamat" class=" form-control"><?php  echo $this->set_field_value('alamat',""); ?></textarea>
                                                                                            <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-3">
                                                                                        <label class="control-label" for="rt">RT <span class="text-danger">*</span></label>
                                                                                        <div id="ctrl-rt-holder" class=""> 
                                                                                            <input id="ctrl-rt"  value="<?php  echo $this->set_field_value('rt',""); ?>" type="number" placeholder="RT" max="50" step="1"  required="" name="rt"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-md-3">
                                                                                            <label class="control-label" for="rw">RW <span class="text-danger">*</span></label>
                                                                                            <div id="ctrl-rw-holder" class=""> 
                                                                                                <input id="ctrl-rw"  value="<?php  echo $this->set_field_value('rw',""); ?>" type="number" placeholder="RW" step="1"  required="" name="rw"  class="form-control " />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group col-md-3">
                                                                                                <label class="control-label" for="dusun">Dusun <span class="text-danger">*</span></label>
                                                                                                <div id="ctrl-dusun-holder" class=""> 
                                                                                                    <input id="ctrl-dusun"  value="<?php  echo $this->set_field_value('dusun',""); ?>" type="text" placeholder="Dusun"  required="" name="dusun"  class="form-control " />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group col-md-3">
                                                                                                    <label class="control-label" for="kelurahan">Kelurahan / Desa <span class="text-danger">*</span></label>
                                                                                                    <div id="ctrl-kelurahan-holder" class=""> 
                                                                                                        <input id="ctrl-kelurahan"  value="<?php  echo $this->set_field_value('kelurahan',""); ?>" type="text" placeholder="Kelurahan"  required="" name="kelurahan"  class="form-control " />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-3">
                                                                                                        <label class="control-label" for="kec">Kecamatan <span class="text-danger">*</span></label>
                                                                                                        <div id="ctrl-kec-holder" class=""> 
                                                                                                            <input id="ctrl-kec"  value="<?php  echo $this->set_field_value('kec',""); ?>" type="text" placeholder="Kecamatan"  required="" name="kec"  class="form-control " />
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group col-md-3">
                                                                                                            <label class="control-label" for="kd_pos">Kode Pos <span class="text-danger">*</span></label>
                                                                                                            <div id="ctrl-kd_pos-holder" class=""> 
                                                                                                                <input id="ctrl-kd_pos"  value="<?php  echo $this->set_field_value('kd_pos',""); ?>" type="number" placeholder="Kode Pos" step="1"  required="" name="kd_pos"  class="form-control " />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-group col-sm-3">
                                                                                                                <label class="control-label" for="tmp_tg">Tempat Tinggal <span class="text-danger">*</span></label>
                                                                                                                <div id="ctrl-tmp_tg-holder" class=""> 
                                                                                                                    <select required=""  id="ctrl-tmp_tg" name="tmp_tg"  placeholder="Tempat Tinggal"    class="custom-select" >
                                                                                                                        <option value="">Tempat Tinggal</option>
                                                                                                                        <?php 
                                                                                                                        $tmp_tg_options = $comp_model -> data_siswa_tmp_tg_option_list();
                                                                                                                        if(!empty($tmp_tg_options)){
                                                                                                                        foreach($tmp_tg_options as $option){
                                                                                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                                                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                                                                        $selected = $this->set_field_selected('tmp_tg',$value, "");
                                                                                                                        ?>
                                                                                                                        <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                                                                            <?php echo $label; ?>
                                                                                                                        </option>
                                                                                                                        <?php
                                                                                                                        }
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-3">
                                                                                                                <label class="control-label" for="moda_trans">Moda Transportasi <span class="text-danger">*</span></label>
                                                                                                                <div id="ctrl-moda_trans-holder" class=""> 
                                                                                                                    <select required=""  id="ctrl-moda_trans" name="moda_trans"  placeholder="Pilih Salah Satu"    class="custom-select" >
                                                                                                                        <option value="">Pilih Salah Satu</option>
                                                                                                                        <?php 
                                                                                                                        $moda_trans_options = $comp_model -> data_siswa_moda_trans_option_list();
                                                                                                                        if(!empty($moda_trans_options)){
                                                                                                                        foreach($moda_trans_options as $option){
                                                                                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                                                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                                                                        $selected = $this->set_field_selected('moda_trans',$value, "");
                                                                                                                        ?>
                                                                                                                        <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                                                                            <?php echo $label; ?>
                                                                                                                        </option>
                                                                                                                        <?php
                                                                                                                        }
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                    </select>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label class="control-label" for="anak_ke">Anak Ke <span class="text-danger">*</span></label>
                                                                                                                <div id="ctrl-anak_ke-holder" class=""> 
                                                                                                                    <input id="ctrl-anak_ke"  value="<?php  echo $this->set_field_value('anak_ke',""); ?>" type="number" placeholder=" Anak Ke Sesuai KK" step="1"  required="" name="anak_ke"  class="form-control " />
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <fieldset><legend>DATA AYAH</legend>
                                                                                                                <div class="form-group ">
                                                                                                                    <label class="control-label" for="nama_ayah">Nama Ayah <span class="text-danger">*</span></label>
                                                                                                                    <div id="ctrl-nama_ayah-holder" class="input-group"> 
                                                                                                                        <input id="ctrl-nama_ayah"  value="<?php  echo $this->set_field_value('nama_ayah',""); ?>" type="text" placeholder=" Nama Ayah"  required="" name="nama_ayah"  class="form-control " />
                                                                                                                            <div class="input-group-append">
                                                                                                                                <span class="input-group-text"><i class="fa fa-male "></i></span>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="row">
                                                                                                                        <div class="form-group col-md-6">
                                                                                                                            <label class="control-label" for="nik_ayah">NIK Ayah <span class="text-danger">*</span></label>
                                                                                                                            <div id="ctrl-nik_ayah-holder" class=""> 
                                                                                                                                <input id="ctrl-nik_ayah"  value="<?php  echo $this->set_field_value('nik_ayah',""); ?>" type="number" placeholder="Nik Ayah" step="1"  required="" name="nik_ayah"  class="form-control " />
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group col-md-6">
                                                                                                                                <label class="control-label" for="th_lhr_ayah">Tahun Lahir Ayah <span class="text-danger">*</span></label>
                                                                                                                                <div id="ctrl-th_lhr_ayah-holder" class=""> 
                                                                                                                                    <select required=""  id="ctrl-th_lhr_ayah" name="th_lhr_ayah"  placeholder="Pilih Salah Satu"    class="custom-select" >
                                                                                                                                        <option value="">Pilih Salah Satu</option>
                                                                                                                                        <?php
                                                                                                                                        $th_lhr_ayah_options = Menu :: $th_lhr_ayah;
                                                                                                                                        if(!empty($th_lhr_ayah_options)){
                                                                                                                                        foreach($th_lhr_ayah_options as $option){
                                                                                                                                        $value = $option['value'];
                                                                                                                                        $label = $option['label'];
                                                                                                                                        $selected = $this->set_field_selected('th_lhr_ayah', $value, "");
                                                                                                                                        ?>
                                                                                                                                        <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                                                                                            <?php echo $label ?>
                                                                                                                                        </option>                                   
                                                                                                                                        <?php
                                                                                                                                        }
                                                                                                                                        }
                                                                                                                                        ?>
                                                                                                                                    </select>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group col-md-6">
                                                                                                                                <label class="control-label" for="pendidikan_ayah">Pendidikan Ayah <span class="text-danger">*</span></label>
                                                                                                                                <div id="ctrl-pendidikan_ayah-holder" class=""> 
                                                                                                                                    <select required=""  id="ctrl-pendidikan_ayah" name="pendidikan_ayah"  placeholder="Pilih Salah Satu"    class="custom-select" >
                                                                                                                                        <option value="">Pilih Salah Satu</option>
                                                                                                                                        <?php 
                                                                                                                                        $pendidikan_ayah_options = $comp_model -> data_siswa_pendidikan_ayah_option_list();
                                                                                                                                        if(!empty($pendidikan_ayah_options)){
                                                                                                                                        foreach($pendidikan_ayah_options as $option){
                                                                                                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                                                                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                                                                                        $selected = $this->set_field_selected('pendidikan_ayah',$value, "");
                                                                                                                                        ?>
                                                                                                                                        <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                                                                                            <?php echo $label; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                        }
                                                                                                                                        }
                                                                                                                                        ?>
                                                                                                                                    </select>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group col-md-6">
                                                                                                                                <label class="control-label" for="pekerjaan_ayah">Pekerjaan Ayah <span class="text-danger">*</span></label>
                                                                                                                                <div id="ctrl-pekerjaan_ayah-holder" class=""> 
                                                                                                                                    <select required=""  id="ctrl-pekerjaan_ayah" name="pekerjaan_ayah"  placeholder="Pilih Salah Satu"    class="custom-select" >
                                                                                                                                        <option value="">Pilih Salah Satu</option>
                                                                                                                                        <?php 
                                                                                                                                        $pekerjaan_ayah_options = $comp_model -> data_siswa_pekerjaan_ayah_option_list();
                                                                                                                                        if(!empty($pekerjaan_ayah_options)){
                                                                                                                                        foreach($pekerjaan_ayah_options as $option){
                                                                                                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                                                                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                                                                                        $selected = $this->set_field_selected('pekerjaan_ayah',$value, "");
                                                                                                                                        ?>
                                                                                                                                        <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                                                                                            <?php echo $label; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                        }
                                                                                                                                        }
                                                                                                                                        ?>
                                                                                                                                    </select>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="form-group col-md-6">
                                                                                                                                <label class="control-label" for="penghasilan_ay">Penghasilan Ayah <span class="text-danger">*</span></label>
                                                                                                                                <div id="ctrl-penghasilan_ay-holder" class=""> 
                                                                                                                                    <select required=""  id="ctrl-penghasilan_ay" name="penghasilan_ay"  placeholder="Pilih Salah Satu"    class="custom-select" >
                                                                                                                                        <option value="">Pilih Salah Satu</option>
                                                                                                                                        <?php 
                                                                                                                                        $penghasilan_ay_options = $comp_model -> data_siswa_penghasilan_ay_option_list();
                                                                                                                                        if(!empty($penghasilan_ay_options)){
                                                                                                                                        foreach($penghasilan_ay_options as $option){
                                                                                                                                        $value = (!empty($option['value']) ? $option['value'] : null);
                                                                                                                                        $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                                                                                        $selected = $this->set_field_selected('penghasilan_ay',$value, "");
                                                                                                                                        ?>
                                                                                                                                        <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                                                                                            <?php echo $label; ?>
                                                                                                                                        </option>
                                                                                                                                        <?php
                                                                                                                                        }
                                                                                                                                        }
                                                                                                                                        ?>
                                                                                                                                    </select>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </fieldset>
                                                                                                                    <fieldset><legend>DATA IBU</legend>
                                                                                                                        <div class="form-group ">
                                                                                                                            <label class="control-label" for="nama_ibu">Nama Ibu Kandung <span class="text-danger">*</span></label>
                                                                                                                            <div id="ctrl-nama_ibu-holder" class=""> 
                                                                                                                                <input id="ctrl-nama_ibu"  value="<?php  echo $this->set_field_value('nama_ibu',""); ?>" type="text" placeholder=" Nama Ibu"  required="" name="nama_ibu"  class="form-control " />
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="row">
                                                                                                                                <div class="form-group col-md-6">
                                                                                                                                    <label class="control-label" for="nik_ibu">NIK Ibu <span class="text-danger">*</span></label>
                                                                                                                                    <div id="ctrl-nik_ibu-holder" class=""> 
                                                                                                                                        <input id="ctrl-nik_ibu"  value="<?php  echo $this->set_field_value('nik_ibu',""); ?>" type="number" placeholder=" Nik Ibu" step="1"  required="" name="nik_ibu"  class="form-control " />
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group col-md-6">
                                                                                                                                        <label class="control-label" for="th_lhr_ibu">Tahun Lahir Ibu <span class="text-danger">*</span></label>
                                                                                                                                        <div id="ctrl-th_lhr_ibu-holder" class=""> 
                                                                                                                                            <select required=""  id="ctrl-th_lhr_ibu" name="th_lhr_ibu"  placeholder="Pilih Salah Satu"    class="custom-select" >
                                                                                                                                                <option value="">Pilih Salah Satu</option>
                                                                                                                                                <?php
                                                                                                                                                $th_lhr_ibu_options = Menu :: $th_lhr_ayah;
                                                                                                                                                if(!empty($th_lhr_ibu_options)){
                                                                                                                                                foreach($th_lhr_ibu_options as $option){
                                                                                                                                                $value = $option['value'];
                                                                                                                                                $label = $option['label'];
                                                                                                                                                $selected = $this->set_field_selected('th_lhr_ibu', $value, "");
                                                                                                                                                ?>
                                                                                                                                                <option <?php echo $selected ?> value="<?php echo $value ?>">
                                                                                                                                                    <?php echo $label ?>
                                                                                                                                                </option>                                   
                                                                                                                                                <?php
                                                                                                                                                }
                                                                                                                                                }
                                                                                                                                                ?>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group col-md-6">
                                                                                                                                        <label class="control-label" for="pendidikan_ibu">Pendidikan Ibu <span class="text-danger">*</span></label>
                                                                                                                                        <div id="ctrl-pendidikan_ibu-holder" class=""> 
                                                                                                                                            <select required=""  id="ctrl-pendidikan_ibu" name="pendidikan_ibu"  placeholder="Pilih Salah Satu"    class="custom-select" >
                                                                                                                                                <option value="">Pilih Salah Satu</option>
                                                                                                                                                <?php 
                                                                                                                                                $pendidikan_ibu_options = $comp_model -> data_siswa_pendidikan_ibu_option_list();
                                                                                                                                                if(!empty($pendidikan_ibu_options)){
                                                                                                                                                foreach($pendidikan_ibu_options as $option){
                                                                                                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                                                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                                                                                                $selected = $this->set_field_selected('pendidikan_ibu',$value, "");
                                                                                                                                                ?>
                                                                                                                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                                                                                                    <?php echo $label; ?>
                                                                                                                                                </option>
                                                                                                                                                <?php
                                                                                                                                                }
                                                                                                                                                }
                                                                                                                                                ?>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group col-md-6">
                                                                                                                                        <label class="control-label" for="penghasilan_ibu">Penghasilan Ibu <span class="text-danger">*</span></label>
                                                                                                                                        <div id="ctrl-penghasilan_ibu-holder" class=""> 
                                                                                                                                            <select required=""  id="ctrl-penghasilan_ibu" name="penghasilan_ibu"  placeholder="Pilih Salah Satu"    class="custom-select" >
                                                                                                                                                <option value="">Pilih Salah Satu</option>
                                                                                                                                                <?php 
                                                                                                                                                $penghasilan_ibu_options = $comp_model -> data_siswa_penghasilan_ibu_option_list();
                                                                                                                                                if(!empty($penghasilan_ibu_options)){
                                                                                                                                                foreach($penghasilan_ibu_options as $option){
                                                                                                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                                                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                                                                                                $selected = $this->set_field_selected('penghasilan_ibu',$value, "");
                                                                                                                                                ?>
                                                                                                                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                                                                                                    <?php echo $label; ?>
                                                                                                                                                </option>
                                                                                                                                                <?php
                                                                                                                                                }
                                                                                                                                                }
                                                                                                                                                ?>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group col-md-6">
                                                                                                                                        <label class="control-label" for="pekerjaan_ibu">Pekerjaan Ibu <span class="text-danger">*</span></label>
                                                                                                                                        <div id="ctrl-pekerjaan_ibu-holder" class=""> 
                                                                                                                                            <select required=""  id="ctrl-pekerjaan_ibu" name="pekerjaan_ibu"  placeholder="Pilih Salah Satu"    class="custom-select" >
                                                                                                                                                <option value="">Pilih Salah Satu</option>
                                                                                                                                                <?php 
                                                                                                                                                $pekerjaan_ibu_options = $comp_model -> data_siswa_pekerjaan_ibu_option_list();
                                                                                                                                                if(!empty($pekerjaan_ibu_options)){
                                                                                                                                                foreach($pekerjaan_ibu_options as $option){
                                                                                                                                                $value = (!empty($option['value']) ? $option['value'] : null);
                                                                                                                                                $label = (!empty($option['label']) ? $option['label'] : $value);
                                                                                                                                                $selected = $this->set_field_selected('pekerjaan_ibu',$value, "");
                                                                                                                                                ?>
                                                                                                                                                <option <?php echo $selected; ?> value="<?php echo $value; ?>">
                                                                                                                                                    <?php echo $label; ?>
                                                                                                                                                </option>
                                                                                                                                                <?php
                                                                                                                                                }
                                                                                                                                                }
                                                                                                                                                ?>
                                                                                                                                            </select>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <div class="form-group ">
                                                                                                                                    <label class="control-label" for="username">Username <span class="text-danger">*</span></label>
                                                                                                                                    <div id="ctrl-username-holder" class=""> 
                                                                                                                                        <input id="ctrl-username"  value="<?php  echo $this->set_field_value('username',USER_NAME); ?>" type="text" placeholder="Username"  readonly required="" name="username"  class="form-control " />
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </fieldset>
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
