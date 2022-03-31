<?php
$comp_model = new SharedController;
$page_element_id = "edit-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id;
$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="edit"  data-display-type="" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title"><div class="custom-1">edit data</div></h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-7 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="bg-light p-3 animated fadeIn page-content">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form page-form form-vertical needs-validation" action="<?php print_link("data_siswa/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="no_pendaftaran">No Pendaftaran <span class="text-danger">*</span></label>
                                        <div id="ctrl-no_pendaftaran-holder" class=""> 
                                            <input id="ctrl-no_pendaftaran"  value="<?php  echo $data['no_pendaftaran']; ?>" type="text" placeholder="Enter No Pendaftaran"  readonly required="" name="no_pendaftaran"  class="form-control " />
                                            </div>
                                            <small class="form-text">Terisi Otomatis</small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="tanggal_daftar">Tanggal Daftar <span class="text-danger">*</span></label>
                                            <div id="ctrl-tanggal_daftar-holder" class="input-group"> 
                                                <input id="ctrl-tanggal_daftar" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['tanggal_daftar']; ?>" type="datetime" name="tanggal_daftar" placeholder="Enter Tanggal Daftar" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="d-m-Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                                <small class="form-text">Terisi Otomatis</small>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="control-label" for="username">Username <span class="text-danger">*</span></label>
                                                <div id="ctrl-username-holder" class=""> 
                                                    <input id="ctrl-username"  value="<?php  echo $data['username']; ?>" type="text" placeholder="Username"  readonly required="" name="username"  class="form-control " />
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label class="control-label" for="nama_siswa">Nama Siswa <span class="text-danger">*</span></label>
                                                    <div id="ctrl-nama_siswa-holder" class=""> 
                                                        <input id="ctrl-nama_siswa"  value="<?php  echo $data['nama_siswa']; ?>" type="text" placeholder="Nama Siswa"  required="" name="nama_siswa"  class="form-control " />
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="control-label" for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                                        <div id="ctrl-jenis_kelamin-holder" class=""> 
                                                            <?php
                                                            $jenis_kelamin_options = Menu :: $jenis_kelamin;
                                                            $field_value = $data['jenis_kelamin'];
                                                            if(!empty($jenis_kelamin_options)){
                                                            foreach($jenis_kelamin_options as $option){
                                                            $value = $option['value'];
                                                            $label = $option['label'];
                                                            //check if value is among checked options
                                                            $checked = $this->check_form_field_checked($field_value, $value);
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
                                                            <label class="control-label" for="nik_siswa">Nik Siswa <span class="text-danger">*</span></label>
                                                            <div id="ctrl-nik_siswa-holder" class=""> 
                                                                <input id="ctrl-nik_siswa"  value="<?php  echo $data['nik_siswa']; ?>" type="number" placeholder="Nik Siswa" min="1111111111111111" step="1"  required="" name="nik_siswa"  class="form-control " />
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="control-label" for="tempat_lhr">Tempat Lahir <span class="text-danger">*</span></label>
                                                                <div id="ctrl-tempat_lhr-holder" class="input-group"> 
                                                                    <input id="ctrl-tempat_lhr"  value="<?php  echo $data['tempat_lhr']; ?>" type="text" placeholder="Tempat Lahir"  required="" name="tempat_lhr"  class="form-control " />
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text"><i class="fa fa-child "></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label class="control-label" for="tanggal_lhr">Tanggal Lahir <span class="text-danger">*</span></label>
                                                                    <div id="ctrl-tanggal_lhr-holder" class="input-group"> 
                                                                        <input id="ctrl-tanggal_lhr" class="form-control datepicker  datepicker"  required="" value="<?php  echo $data['tanggal_lhr']; ?>" type="datetime" name="tanggal_lhr" placeholder="Tanggal Lahir" data-enable-time="false" data-min-date="" data-max-date="" data-date-format="Y-m-d" data-alt-format="d-m-Y" data-inline="false" data-no-calendar="false" data-mode="single" />
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group col-md-6">
                                                                        <label class="control-label" for="no_reg_akte">No Register Akte <span class="text-danger">*</span></label>
                                                                        <div id="ctrl-no_reg_akte-holder" class=""> 
                                                                            <input id="ctrl-no_reg_akte"  value="<?php  echo $data['no_reg_akte']; ?>" type="text" placeholder="No Register Akte"  required="" name="no_reg_akte"  class="form-control " />
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-6">
                                                                            <label class="control-label" for="kewarga">Kewarganegraan <span class="text-danger">*</span></label>
                                                                            <div id="ctrl-kewarga-holder" class=""> 
                                                                                <?php
                                                                                $kewarga_options = Menu :: $kewarga;
                                                                                $field_value = $data['kewarga'];
                                                                                if(!empty($kewarga_options)){
                                                                                foreach($kewarga_options as $option){
                                                                                $value = $option['value'];
                                                                                $label = $option['label'];
                                                                                //check if value is among checked options
                                                                                $checked = $this->check_form_field_checked($field_value, $value);
                                                                                ?>
                                                                                <label class="custom-control custom-radio custom-control-inline">
                                                                                    <input id="ctrl-kewarga" class="custom-control-input" <?php echo $checked ?>  value="<?php echo $value ?>" type="radio" required=""   name="kewarga" />
                                                                                        <span class="custom-control-label"><?php echo $label ?></span>
                                                                                    </label>
                                                                                    <?php
                                                                                    }
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label class="control-label" for="Agama">Agama <span class="text-danger">*</span></label>
                                                                                <div id="ctrl-Agama-holder" class=""> 
                                                                                    <select required=""  id="ctrl-Agama" name="Agama"  placeholder="Select a value ..."    class="custom-select" >
                                                                                        <option value="">Select a value ...</option>
                                                                                        <?php
                                                                                        $Agama_options = Menu :: $Agama;
                                                                                        $field_value = $data['Agama'];
                                                                                        if(!empty($Agama_options)){
                                                                                        foreach($Agama_options as $option){
                                                                                        $value = $option['value'];
                                                                                        $label = $option['label'];
                                                                                        $selected = ( $value == $field_value ? 'selected' : null );
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
                                                                                <label class="control-label" for="keb_khusus_s">Kebutuhan Khusus <span class="text-danger">*</span></label>
                                                                                <div id="ctrl-keb_khusus_s-holder" class=""> 
                                                                                    <select required=""  id="ctrl-keb_khusus_s" name="keb_khusus_s"  placeholder="Select a value ..."    class="custom-select" >
                                                                                        <option value="">Select a value ...</option>
                                                                                        <?php
                                                                                        $keb_khusus_s_options = Menu :: $keb_khusus_s;
                                                                                        $field_value = $data['keb_khusus_s'];
                                                                                        if(!empty($keb_khusus_s_options)){
                                                                                        foreach($keb_khusus_s_options as $option){
                                                                                        $value = $option['value'];
                                                                                        $label = $option['label'];
                                                                                        $selected = ( $value == $field_value ? 'selected' : null );
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
                                                                                <label class="control-label" for="alamat">Alamat <span class="text-danger">*</span></label>
                                                                                <div id="ctrl-alamat-holder" class=""> 
                                                                                    <textarea placeholder="Alamat" id="ctrl-alamat"  required="" rows="3" name="alamat" class=" form-control"><?php  echo $data['alamat']; ?></textarea>
                                                                                    <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group col-md-3">
                                                                                <label class="control-label" for="rt">RT <span class="text-danger">*</span></label>
                                                                                <div id="ctrl-rt-holder" class=""> 
                                                                                    <input id="ctrl-rt"  value="<?php  echo $data['rt']; ?>" type="number" placeholder="RT" step="1"  required="" name="rt"  class="form-control " />
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group col-md-3">
                                                                                    <label class="control-label" for="rw">RW <span class="text-danger">*</span></label>
                                                                                    <div id="ctrl-rw-holder" class=""> 
                                                                                        <input id="ctrl-rw"  value="<?php  echo $data['rw']; ?>" type="number" placeholder="RW" step="1"  required="" name="rw"  class="form-control " />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group col-md-6">
                                                                                        <label class="control-label" for="dusun">Dusun <span class="text-danger">*</span></label>
                                                                                        <div id="ctrl-dusun-holder" class=""> 
                                                                                            <input id="ctrl-dusun"  value="<?php  echo $data['dusun']; ?>" type="text" placeholder="Dusun"  required="" name="dusun"  class="form-control " />
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-md-6">
                                                                                            <label class="control-label" for="kelurahan">Kelurahan <span class="text-danger">*</span></label>
                                                                                            <div id="ctrl-kelurahan-holder" class=""> 
                                                                                                <input id="ctrl-kelurahan"  value="<?php  echo $data['kelurahan']; ?>" type="text" placeholder="Kelurahan / Desa"  required="" name="kelurahan"  class="form-control " />
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="form-group col-md-6">
                                                                                                <label class="control-label" for="kec">Kecamatan <span class="text-danger">*</span></label>
                                                                                                <div id="ctrl-kec-holder" class=""> 
                                                                                                    <input id="ctrl-kec"  value="<?php  echo $data['kec']; ?>" type="text" placeholder="Kecamatan"  required="" name="kec"  class="form-control " />
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="form-group col-md-6">
                                                                                                    <label class="control-label" for="kd_pos">Kode Pos <span class="text-danger">*</span></label>
                                                                                                    <div id="ctrl-kd_pos-holder" class=""> 
                                                                                                        <input id="ctrl-kd_pos"  value="<?php  echo $data['kd_pos']; ?>" type="number" placeholder="Kode Pos" step="1"  required="" name="kd_pos"  class="form-control " />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-group col-md-6">
                                                                                                        <label class="control-label" for="tmp_tg">Tempat Tinggal <span class="text-danger">*</span></label>
                                                                                                        <div id="ctrl-tmp_tg-holder" class=""> 
                                                                                                            <select required=""  id="ctrl-tmp_tg" name="tmp_tg"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                                <option value="">Select a value ...</option>
                                                                                                                <?php
                                                                                                                $tmp_tg_options = Menu :: $tmp_tg;
                                                                                                                $field_value = $data['tmp_tg'];
                                                                                                                if(!empty($tmp_tg_options)){
                                                                                                                foreach($tmp_tg_options as $option){
                                                                                                                $value = $option['value'];
                                                                                                                $label = $option['label'];
                                                                                                                $selected = ( $value == $field_value ? 'selected' : null );
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
                                                                                                        <label class="control-label" for="moda_trans">Moda Transportasi <span class="text-danger">*</span></label>
                                                                                                        <div id="ctrl-moda_trans-holder" class=""> 
                                                                                                            <select required=""  id="ctrl-moda_trans" name="moda_trans"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                                <option value="">Select a value ...</option>
                                                                                                                <?php
                                                                                                                $moda_trans_options = Menu :: $moda_trans;
                                                                                                                $field_value = $data['moda_trans'];
                                                                                                                if(!empty($moda_trans_options)){
                                                                                                                foreach($moda_trans_options as $option){
                                                                                                                $value = $option['value'];
                                                                                                                $label = $option['label'];
                                                                                                                $selected = ( $value == $field_value ? 'selected' : null );
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
                                                                                                        <label class="control-label" for="anak_ke">Anak Ke <span class="text-danger">*</span></label>
                                                                                                        <div id="ctrl-anak_ke-holder" class=""> 
                                                                                                            <input id="ctrl-anak_ke"  value="<?php  echo $data['anak_ke']; ?>" type="number" placeholder="Anak Ke" step="1"  required="" name="anak_ke"  class="form-control " />
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="form-group col-md-6">
                                                                                                            <label class="control-label" for="nama_ayah">Nama Ayah <span class="text-danger">*</span></label>
                                                                                                            <div id="ctrl-nama_ayah-holder" class=""> 
                                                                                                                <input id="ctrl-nama_ayah"  value="<?php  echo $data['nama_ayah']; ?>" type="text" placeholder="Nama Ayah"  required="" name="nama_ayah"  class="form-control " />
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="form-group col-md-6">
                                                                                                                <label class="control-label" for="nik_ayah">Nik Ayah <span class="text-danger">*</span></label>
                                                                                                                <div id="ctrl-nik_ayah-holder" class=""> 
                                                                                                                    <input id="ctrl-nik_ayah"  value="<?php  echo $data['nik_ayah']; ?>" type="number" placeholder="Nik Ayah" min="1111111111111111" step="1"  required="" name="nik_ayah"  class="form-control " />
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-6">
                                                                                                                    <label class="control-label" for="th_lhr_ayah">Tahun Lahir Ayah <span class="text-danger">*</span></label>
                                                                                                                    <div id="ctrl-th_lhr_ayah-holder" class=""> 
                                                                                                                        <select required=""  id="ctrl-th_lhr_ayah" name="th_lhr_ayah"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                                            <option value="">Select a value ...</option>
                                                                                                                            <?php
                                                                                                                            $th_lhr_ayah_options = Menu :: $th_lhr_ayah;
                                                                                                                            $field_value = $data['th_lhr_ayah'];
                                                                                                                            if(!empty($th_lhr_ayah_options)){
                                                                                                                            foreach($th_lhr_ayah_options as $option){
                                                                                                                            $value = $option['value'];
                                                                                                                            $label = $option['label'];
                                                                                                                            $selected = ( $value == $field_value ? 'selected' : null );
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
                                                                                                                        <select required=""  id="ctrl-pendidikan_ayah" name="pendidikan_ayah"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                                            <option value="">Select a value ...</option>
                                                                                                                            <?php
                                                                                                                            $pendidikan_ayah_options = Menu :: $pendidikan_ayah;
                                                                                                                            $field_value = $data['pendidikan_ayah'];
                                                                                                                            if(!empty($pendidikan_ayah_options)){
                                                                                                                            foreach($pendidikan_ayah_options as $option){
                                                                                                                            $value = $option['value'];
                                                                                                                            $label = $option['label'];
                                                                                                                            $selected = ( $value == $field_value ? 'selected' : null );
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
                                                                                                                    <label class="control-label" for="pekerjaan_ayah">Pekerjaan Ayah <span class="text-danger">*</span></label>
                                                                                                                    <div id="ctrl-pekerjaan_ayah-holder" class=""> 
                                                                                                                        <select required=""  id="ctrl-pekerjaan_ayah" name="pekerjaan_ayah"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                                            <option value="">Select a value ...</option>
                                                                                                                            <?php
                                                                                                                            $pekerjaan_ayah_options = Menu :: $pekerjaan_ayah;
                                                                                                                            $field_value = $data['pekerjaan_ayah'];
                                                                                                                            if(!empty($pekerjaan_ayah_options)){
                                                                                                                            foreach($pekerjaan_ayah_options as $option){
                                                                                                                            $value = $option['value'];
                                                                                                                            $label = $option['label'];
                                                                                                                            $selected = ( $value == $field_value ? 'selected' : null );
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
                                                                                                                    <label class="control-label" for="penghasilan_ay">Penghasilan Ayah <span class="text-danger">*</span></label>
                                                                                                                    <div id="ctrl-penghasilan_ay-holder" class=""> 
                                                                                                                        <select required=""  id="ctrl-penghasilan_ay" name="penghasilan_ay"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                                            <option value="">Select a value ...</option>
                                                                                                                            <?php
                                                                                                                            $penghasilan_ay_options = Menu :: $penghasilan_ay;
                                                                                                                            $field_value = $data['penghasilan_ay'];
                                                                                                                            if(!empty($penghasilan_ay_options)){
                                                                                                                            foreach($penghasilan_ay_options as $option){
                                                                                                                            $value = $option['value'];
                                                                                                                            $label = $option['label'];
                                                                                                                            $selected = ( $value == $field_value ? 'selected' : null );
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
                                                                                                                    <label class="control-label" for="nama_ibu">Nama Ibu <span class="text-danger">*</span></label>
                                                                                                                    <div id="ctrl-nama_ibu-holder" class=""> 
                                                                                                                        <input id="ctrl-nama_ibu"  value="<?php  echo $data['nama_ibu']; ?>" type="text" placeholder="Nama Ibu"  required="" name="nama_ibu"  class="form-control " />
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="form-group col">
                                                                                                                        <label class="control-label" for="nik_ibu">Nik Ibu <span class="text-danger">*</span></label>
                                                                                                                        <div id="ctrl-nik_ibu-holder" class=""> 
                                                                                                                            <input id="ctrl-nik_ibu"  value="<?php  echo $data['nik_ibu']; ?>" type="number" placeholder="Nik Ibu" min="1111111111111111" step="1"  required="" name="nik_ibu"  class="form-control " />
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-6">
                                                                                                                            <label class="control-label" for="th_lhr_ibu">Tahun Lahir Ibu <span class="text-danger">*</span></label>
                                                                                                                            <div id="ctrl-th_lhr_ibu-holder" class=""> 
                                                                                                                                <select required=""  id="ctrl-th_lhr_ibu" name="th_lhr_ibu"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                                                    <option value="">Select a value ...</option>
                                                                                                                                    <?php
                                                                                                                                    $th_lhr_ibu_options = Menu :: $th_lhr_ayah;
                                                                                                                                    $field_value = $data['th_lhr_ibu'];
                                                                                                                                    if(!empty($th_lhr_ibu_options)){
                                                                                                                                    foreach($th_lhr_ibu_options as $option){
                                                                                                                                    $value = $option['value'];
                                                                                                                                    $label = $option['label'];
                                                                                                                                    $selected = ( $value == $field_value ? 'selected' : null );
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
                                                                                                                                <select required=""  id="ctrl-pendidikan_ibu" name="pendidikan_ibu"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                                                    <option value="">Select a value ...</option>
                                                                                                                                    <?php
                                                                                                                                    $pendidikan_ibu_options = Menu :: $pendidikan_ayah;
                                                                                                                                    $field_value = $data['pendidikan_ibu'];
                                                                                                                                    if(!empty($pendidikan_ibu_options)){
                                                                                                                                    foreach($pendidikan_ibu_options as $option){
                                                                                                                                    $value = $option['value'];
                                                                                                                                    $label = $option['label'];
                                                                                                                                    $selected = ( $value == $field_value ? 'selected' : null );
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
                                                                                                                            <label class="control-label" for="pekerjaan_ibu">Pekerjaan Ibu <span class="text-danger">*</span></label>
                                                                                                                            <div id="ctrl-pekerjaan_ibu-holder" class=""> 
                                                                                                                                <select required=""  id="ctrl-pekerjaan_ibu" name="pekerjaan_ibu"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                                                    <option value="">Select a value ...</option>
                                                                                                                                    <?php
                                                                                                                                    $pekerjaan_ibu_options = Menu :: $pekerjaan_ayah;
                                                                                                                                    $field_value = $data['pekerjaan_ibu'];
                                                                                                                                    if(!empty($pekerjaan_ibu_options)){
                                                                                                                                    foreach($pekerjaan_ibu_options as $option){
                                                                                                                                    $value = $option['value'];
                                                                                                                                    $label = $option['label'];
                                                                                                                                    $selected = ( $value == $field_value ? 'selected' : null );
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
                                                                                                                            <label class="control-label" for="penghasilan_ibu">Penghasilan Ibu <span class="text-danger">*</span></label>
                                                                                                                            <div id="ctrl-penghasilan_ibu-holder" class=""> 
                                                                                                                                <select required=""  id="ctrl-penghasilan_ibu" name="penghasilan_ibu"  placeholder="Select a value ..."    class="custom-select" >
                                                                                                                                    <option value="">Select a value ...</option>
                                                                                                                                    <?php
                                                                                                                                    $penghasilan_ibu_options = Menu :: $penghasilan_ay;
                                                                                                                                    $field_value = $data['penghasilan_ibu'];
                                                                                                                                    if(!empty($penghasilan_ibu_options)){
                                                                                                                                    foreach($penghasilan_ibu_options as $option){
                                                                                                                                    $value = $option['value'];
                                                                                                                                    $label = $option['label'];
                                                                                                                                    $selected = ( $value == $field_value ? 'selected' : null );
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
                                                                                                                            <label class="control-label" for="no_telp">Nomer Telphone <span class="text-danger">*</span></label>
                                                                                                                            <div id="ctrl-no_telp-holder" class=""> 
                                                                                                                                <input id="ctrl-no_telp"  value="<?php  echo $data['no_telp']; ?>" type="tel" placeholder="Enter Nomer Telphone"  required="" name="no_telp"  class="form-control " />
                                                                                                                                </div>
                                                                                                                                <small class="form-text">No Telp Rumah kalau ada / kalau tidak ada isi dengan 12345</small>
                                                                                                                            </div>
                                                                                                                            <div class="form-group col-md-6">
                                                                                                                                <label class="control-label" for="no_hp">Nomer Hp <span class="text-danger">*</span></label>
                                                                                                                                <div id="ctrl-no_hp-holder" class=""> 
                                                                                                                                    <input id="ctrl-no_hp"  value="<?php  echo $data['no_hp']; ?>" type="tel" placeholder="Enter Nomer Hp"  required="" name="no_hp"  class="form-control " />
                                                                                                                                    </div>
                                                                                                                                    <small class="form-text">Nomer Hp WhatApps / Telegram / No Aktif </small>
                                                                                                                                </div>
                                                                                                                                <div class="form-group col-md-6">
                                                                                                                                    <label class="control-label" for="tinggi_badan">Tinggi Badan <span class="text-danger">*</span></label>
                                                                                                                                    <div id="ctrl-tinggi_badan-holder" class=""> 
                                                                                                                                        <input id="ctrl-tinggi_badan"  value="<?php  echo $data['tinggi_badan']; ?>" type="number" placeholder="Tinggi Badan" step="1"  required="" name="tinggi_badan"  class="form-control " />
                                                                                                                                        </div>
                                                                                                                                        <small class="form-text">Tinggi Badan Siswa</small>
                                                                                                                                    </div>
                                                                                                                                    <div class="form-group col-md-6">
                                                                                                                                        <label class="control-label" for="berat_badan">Berat Badan <span class="text-danger">*</span></label>
                                                                                                                                        <div id="ctrl-berat_badan-holder" class=""> 
                                                                                                                                            <input id="ctrl-berat_badan"  value="<?php  echo $data['berat_badan']; ?>" type="number" placeholder="Berat Badan" step="1"  required="" name="berat_badan"  class="form-control " />
                                                                                                                                            </div>
                                                                                                                                            <small class="form-text">Satuan dalam kilogram</small>
                                                                                                                                        </div>
                                                                                                                                        <div class="form-group col-md-6">
                                                                                                                                            <label class="control-label" for="jarak_rumah">Jarak Rumah <span class="text-danger">*</span></label>
                                                                                                                                            <div id="ctrl-jarak_rumah-holder" class=""> 
                                                                                                                                                <input id="ctrl-jarak_rumah"  value="<?php  echo $data['jarak_rumah']; ?>" type="text" placeholder="Jarak Rumah"  required="" name="jarak_rumah"  class="form-control " />
                                                                                                                                                </div>
                                                                                                                                                <small class="form-text">Jarak rumah ke sekolah dalam kilometer / meter
                                                                                                                                                Contoh 500 Meter  , 1 Kilometer</small>
                                                                                                                                            </div>
                                                                                                                                            <div class="form-group col-md-6">
                                                                                                                                                <label class="control-label" for="waktu_tempuh">Waktu Tempuh <span class="text-danger">*</span></label>
                                                                                                                                                <div id="ctrl-waktu_tempuh-holder" class=""> 
                                                                                                                                                    <input id="ctrl-waktu_tempuh"  value="<?php  echo $data['waktu_tempuh']; ?>" type="text" placeholder="Waktu Tempuh"  required="" name="waktu_tempuh"  class="form-control " />
                                                                                                                                                    </div>
                                                                                                                                                    <small class="form-text">Waktu Tempuh Rumah Ke sekolah dalam ( menit / jam ) Seperti Contoh " 15 Menit , 5 Menit 1 Jam "</small>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-group col-md-6">
                                                                                                                                                    <label class="control-label" for="asal_sekolah">Asal Sekolah <span class="text-danger">*</span></label>
                                                                                                                                                    <div id="ctrl-asal_sekolah-holder" class=""> 
                                                                                                                                                        <input id="ctrl-asal_sekolah"  value="<?php  echo $data['asal_sekolah']; ?>" type="text" placeholder="Asal Sekolah"  required="" name="asal_sekolah"  class="form-control " />
                                                                                                                                                        </div>
                                                                                                                                                        <small class="form-text">Tulis Sekolah Asal Siswa / Kalu tidak pernah paud / Tk / Tulis tidak pernah
                                                                                                                                                        Contoh TK Muslimat 06 </small>
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <div class="form-ajax-status"></div>
                                                                                                                                                <div class="form-group text-center">
                                                                                                                                                    <button class="btn btn-primary" type="submit">
                                                                                                                                                        Update
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
