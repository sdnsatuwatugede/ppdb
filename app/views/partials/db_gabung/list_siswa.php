<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("db_gabung/add");
$can_edit = ACL::is_allowed("db_gabung/edit");
$can_view = ACL::is_allowed("db_gabung/view");
$can_delete = ACL::is_allowed("db_gabung/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "list-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data From Controller
$view_data = $this->view_data;
$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = $this->route->field_name;
$field_value = $this->route->field_value;
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="list"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title">Db Gabung</h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("db_gabung/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Db Gabung 
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('db_gabung/'); ?>" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <!-- Page bread crumbs components-->
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('db_gabung'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <?php echo (get_value("tag") ? get_value("tag")  :  make_readable($field_name)); ?>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold">
                                        <?php echo (get_value("label") ? get_value("label")  :  make_readable(urldecode($field_value))); ?>
                                    </li>
                                    <?php 
                                    }   
                                    ?>
                                    <?php
                                    if(get_value("search")){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-decoration-none" href="<?php print_link('db_gabung'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Search
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize font-weight-bold"><?php echo get_value("search"); ?></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </nav>
                            <!--End of Page bread crumbs components-->
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
        <div  class="">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-md-12 comp-grid">
                        <?php $this :: display_page_errors(); ?>
                        <div  class=" animated fadeIn page-content">
                            <div id="db_gabung-list_siswa-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                <?php if($can_delete){ ?>
                                                <th class="td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <?php } ?>
                                                <th class="td-sno">#</th>
                                                <th  class="td-id_gb"> Id Gb</th>
                                                <th  class="td-id_siswa"> Id Siswa</th>
                                                <th  class="td-id_rinci"> Id Rinci</th>
                                                <th  class="td-nama_siswa"> Nama Siswa</th>
                                                <th  class="td-nama_ortu"> Nama Ortu</th>
                                                <th  class="td-data_siswa_id"> Data Siswa Id</th>
                                                <th  class="td-data_siswa_no_pendaftaran"> Data Siswa No Pendaftaran</th>
                                                <th  class="td-data_siswa_nama_siswa"> Data Siswa Nama Siswa</th>
                                                <th  class="td-data_siswa_jenis_kelamin"> Data Siswa Jenis Kelamin</th>
                                                <th  class="td-data_siswa_nik_siswa"> Data Siswa Nik Siswa</th>
                                                <th  class="td-data_siswa_tempat_lhr"> Data Siswa Tempat Lhr</th>
                                                <th  class="td-data_siswa_tanggal_lhr"> Data Siswa Tanggal Lhr</th>
                                                <th  class="td-data_siswa_no_reg_akte"> Data Siswa No Reg Akte</th>
                                                <th  class="td-data_siswa_agama"> Data Siswa Agama</th>
                                                <th  class="td-data_siswa_kewarga"> Data Siswa Kewarga</th>
                                                <th  class="td-data_siswa_keb_khusus_s"> Data Siswa Keb Khusus S</th>
                                                <th  class="td-data_siswa_alamat"> Data Siswa Alamat</th>
                                                <th  class="td-data_siswa_rt"> Data Siswa Rt</th>
                                                <th  class="td-data_siswa_rw"> Data Siswa Rw</th>
                                                <th  class="td-data_siswa_dusun"> Data Siswa Dusun</th>
                                                <th  class="td-data_siswa_kelurahan"> Data Siswa Kelurahan</th>
                                                <th  class="td-data_siswa_kec"> Data Siswa Kec</th>
                                                <th  class="td-data_siswa_kd_pos"> Data Siswa Kd Pos</th>
                                                <th  class="td-data_siswa_tmp_tg"> Data Siswa Tmp Tg</th>
                                                <th  class="td-data_siswa_moda_trans"> Data Siswa Moda Trans</th>
                                                <th  class="td-data_siswa_anak_ke"> Data Siswa Anak Ke</th>
                                                <th  class="td-data_siswa_tanggal_daftar"> Data Siswa Tanggal Daftar</th>
                                                <th  class="td-data_siswa_nama_ayah"> Data Siswa Nama Ayah</th>
                                                <th  class="td-data_siswa_nik_ayah"> Data Siswa Nik Ayah</th>
                                                <th  class="td-data_siswa_pendidikan_ayah"> Data Siswa Pendidikan Ayah</th>
                                                <th  class="td-data_siswa_pekerjaan_ayah"> Data Siswa Pekerjaan Ayah</th>
                                                <th  class="td-data_siswa_penghasilan_ay"> Data Siswa Penghasilan Ay</th>
                                                <th  class="td-data_siswa_nama_ibu"> Data Siswa Nama Ibu</th>
                                                <th  class="td-data_siswa_nik_ibu"> Data Siswa Nik Ibu</th>
                                                <th  class="td-data_siswa_th_lhr_ibu"> Data Siswa Th Lhr Ibu</th>
                                                <th  class="td-data_siswa_pendidikan_ibu"> Data Siswa Pendidikan Ibu</th>
                                                <th  class="td-data_siswa_penghasilan_ibu"> Data Siswa Penghasilan Ibu</th>
                                                <th  class="td-data_siswa_th_lhr_ayah"> Data Siswa Th Lhr Ayah</th>
                                                <th  class="td-data_siswa_pekerjaan_ibu"> Data Siswa Pekerjaan Ibu</th>
                                                <th class="td-btn"></th>
                                            </tr>
                                        </thead>
                                        <?php
                                        if(!empty($records)){
                                        ?>
                                        <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                            <!--record-->
                                            <?php
                                            $counter = 0;
                                            foreach($records as $data){
                                            $rec_id = (!empty($data['id_gb']) ? urlencode($data['id_gb']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <?php if($can_delete){ ?>
                                                <th class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id_gb'] ?>" type="checkbox" />
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </th>
                                                    <?php } ?>
                                                    <th class="td-sno"><?php echo $counter; ?></th>
                                                    <td class="td-id_gb"><a href="<?php print_link("db_gabung/view/$data[id_gb]") ?>"><?php echo $data['id_gb']; ?></a></td>
                                                    <td class="td-id_siswa">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['id_siswa']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("db_gabung/editfield/" . urlencode($data['id_gb'])); ?>" 
                                                            data-name="id_siswa" 
                                                            data-title="Enter Id Siswa" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['id_siswa']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-id_rinci">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['id_rinci']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("db_gabung/editfield/" . urlencode($data['id_gb'])); ?>" 
                                                            data-name="id_rinci" 
                                                            data-title="Enter Id Rinci" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['id_rinci']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-nama_siswa">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_siswa']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("db_gabung/editfield/" . urlencode($data['id_gb'])); ?>" 
                                                            data-name="nama_siswa" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['nama_siswa']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-nama_ortu">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_ortu']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("db_gabung/editfield/" . urlencode($data['id_gb'])); ?>" 
                                                            data-name="nama_ortu" 
                                                            data-title="Enter Nama Ortu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['nama_ortu']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_id"> <?php echo $data['data_siswa_id']; ?></td>
                                                    <td class="td-data_siswa_no_pendaftaran">
                                                        <span <?php if($can_edit){ ?> data-step="1" 
                                                            data-source='<?php echo json_encode_quote(Menu :: $no_pendaftaran); ?>' 
                                                            data-value="<?php echo $data['data_siswa_no_pendaftaran']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="no_pendaftaran" 
                                                            data-title=" No Pendaftaran" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_no_pendaftaran']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_nama_siswa">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_nama_siswa']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="nama_siswa" 
                                                            data-title="Nama Siswa" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_nama_siswa']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_jenis_kelamin">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $jenis_kelamin); ?>' 
                                                            data-value="<?php echo $data['data_siswa_jenis_kelamin']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="jenis_kelamin" 
                                                            data-title="Enter Jenis Kelamin" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="radiolist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_jenis_kelamin']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_nik_siswa">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_nik_siswa']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="nik_siswa" 
                                                            data-title="Nik Siswa" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_nik_siswa']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_tempat_lhr">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_tempat_lhr']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="tempat_lhr" 
                                                            data-title="Tempat Lahir" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_tempat_lhr']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_tanggal_lhr">
                                                        <span <?php if($can_edit){ ?> data-flatpickr="{ enableTime: false, minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['data_siswa_tanggal_lhr']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="tanggal_lhr" 
                                                            data-title="Tanggal Lahir" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_tanggal_lhr']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_no_reg_akte">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_no_reg_akte']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="no_reg_akte" 
                                                            data-title="Nomer Register Akte" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_no_reg_akte']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_agama">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $agama); ?>' 
                                                            data-value="<?php echo $data['data_siswa_agama']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="agama" 
                                                            data-title="Pilih Salah Satu Sesuai Nomer" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_agama']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_kewarga">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $kewarga); ?>' 
                                                            data-value="<?php echo $data['data_siswa_kewarga']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="kewarga" 
                                                            data-title="Kewarganegaraan" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_kewarga']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_keb_khusus_s">
                                                        <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/db_gabung_data_siswa_keb_khusus_s_option_list'); ?>' 
                                                            data-value="<?php echo $data['data_siswa_keb_khusus_s']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="keb_khusus_s" 
                                                            data-title="Pilih Salah Satu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_keb_khusus_s']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_alamat">
                                                        <span <?php if($can_edit){ ?> data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="alamat" 
                                                            data-title=" Alamat Saat Ini" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_alamat']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_rt">
                                                        <span <?php if($can_edit){ ?> data-max="50" 
                                                            data-step="1" 
                                                            data-value="<?php echo $data['data_siswa_rt']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="rt" 
                                                            data-title="RT" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_rt']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_rw">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_rw']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="rw" 
                                                            data-title="RW" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_rw']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_dusun">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_dusun']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="dusun" 
                                                            data-title="Dusun" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_dusun']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_kelurahan">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_kelurahan']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="kelurahan" 
                                                            data-title="Kelurahan" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_kelurahan']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_kec">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_kec']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="kec" 
                                                            data-title="Kecamatan" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_kec']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_kd_pos">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_kd_pos']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="kd_pos" 
                                                            data-title="Kode Pos" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_kd_pos']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_tmp_tg">
                                                        <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/db_gabung_data_siswa_tmp_tg_option_list'); ?>' 
                                                            data-value="<?php echo $data['data_siswa_tmp_tg']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="tmp_tg" 
                                                            data-title="Tempat Tinggal" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_tmp_tg']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_moda_trans">
                                                        <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/db_gabung_data_siswa_moda_trans_option_list'); ?>' 
                                                            data-value="<?php echo $data['data_siswa_moda_trans']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="moda_trans" 
                                                            data-title="Pilih Salah Satu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_moda_trans']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_anak_ke">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_anak_ke']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="anak_ke" 
                                                            data-title=" Anak Ke Sesuai KK" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_anak_ke']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_tanggal_daftar">
                                                        <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'Y-m-d H:i:s', enableTime: false, minDate: '', maxDate: '<?php echo date('Y-m-d', strtotime('+3day')); ?>'}" 
                                                            data-value="<?php echo $data['data_siswa_tanggal_daftar']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="tanggal_daftar" 
                                                            data-title="Tanggal Daftar" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_tanggal_daftar']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_nama_ayah">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_nama_ayah']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="nama_ayah" 
                                                            data-title=" Nama Ayah" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_nama_ayah']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_nik_ayah">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_nik_ayah']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="nik_ayah" 
                                                            data-title="Nik Ayah" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_nik_ayah']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_pendidikan_ayah">
                                                        <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/db_gabung_data_siswa_pendidikan_ayah_option_list'); ?>' 
                                                            data-value="<?php echo $data['data_siswa_pendidikan_ayah']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="pendidikan_ayah" 
                                                            data-title="Pilih Salah Satu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_pendidikan_ayah']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_pekerjaan_ayah">
                                                        <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/db_gabung_data_siswa_pekerjaan_ayah_option_list'); ?>' 
                                                            data-value="<?php echo $data['data_siswa_pekerjaan_ayah']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="pekerjaan_ayah" 
                                                            data-title="Pilih Salah Satu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_pekerjaan_ayah']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_penghasilan_ay">
                                                        <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/db_gabung_data_siswa_penghasilan_ay_option_list'); ?>' 
                                                            data-value="<?php echo $data['data_siswa_penghasilan_ay']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="penghasilan_ay" 
                                                            data-title="Pilih Salah Satu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_penghasilan_ay']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_nama_ibu">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_nama_ibu']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="nama_ibu" 
                                                            data-title=" Nama Ibu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_nama_ibu']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_nik_ibu">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['data_siswa_nik_ibu']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="nik_ibu" 
                                                            data-title=" Nik Ibu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_nik_ibu']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_th_lhr_ibu">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $th_lhr_ayah); ?>' 
                                                            data-value="<?php echo $data['data_siswa_th_lhr_ibu']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="th_lhr_ibu" 
                                                            data-title="Pilih Salah Satu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_th_lhr_ibu']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_pendidikan_ibu">
                                                        <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/db_gabung_data_siswa_pendidikan_ibu_option_list'); ?>' 
                                                            data-value="<?php echo $data['data_siswa_pendidikan_ibu']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="pendidikan_ibu" 
                                                            data-title="Pilih Salah Satu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_pendidikan_ibu']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_penghasilan_ibu">
                                                        <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/db_gabung_data_siswa_penghasilan_ibu_option_list'); ?>' 
                                                            data-value="<?php echo $data['data_siswa_penghasilan_ibu']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="penghasilan_ibu" 
                                                            data-title="Pilih Salah Satu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_penghasilan_ibu']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_th_lhr_ayah">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $th_lhr_ayah); ?>' 
                                                            data-value="<?php echo $data['data_siswa_th_lhr_ayah']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="th_lhr_ayah" 
                                                            data-title="Pilih Salah Satu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_th_lhr_ayah']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-data_siswa_pekerjaan_ibu">
                                                        <span <?php if($can_edit){ ?> data-source='<?php print_link('api/json/db_gabung_data_siswa_pekerjaan_ibu_option_list'); ?>' 
                                                            data-value="<?php echo $data['data_siswa_pekerjaan_ibu']; ?>" 
                                                            data-pk="<?php echo $data['id_gb'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="pekerjaan_ibu" 
                                                            data-title="Pilih Salah Satu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['data_siswa_pekerjaan_ibu']; ?> 
                                                        </span>
                                                    </td>
                                                    <th class="td-btn">
                                                        <?php if($can_view){ ?>
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("db_gabung/view/$rec_id"); ?>">
                                                            <i class="fa fa-eye"></i> View
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_edit){ ?>
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("db_gabung/edit/$rec_id"); ?>">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_delete){ ?>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("db_gabung/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                            <i class="fa fa-times"></i>
                                                            Delete
                                                        </a>
                                                        <?php } ?>
                                                    </th>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                                <!--endrecord-->
                                            </tbody>
                                            <tbody class="search-data" id="search-data-<?php echo $page_element_id; ?>"></tbody>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                        <?php 
                                        if(empty($records)){
                                        ?>
                                        <h4 class="bg-light text-center border-top text-muted animated bounce  p-3">
                                            <i class="fa fa-ban"></i> No record found
                                        </h4>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    if( $show_footer && !empty($records)){
                                    ?>
                                    <div class=" border-top mt-2">
                                        <div class="row justify-content-center">    
                                            <div class="col-md-auto justify-content-center">    
                                                <div class="p-3 d-flex justify-content-between">    
                                                    <?php if($can_delete){ ?>
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("db_gabung/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                        <i class="fa fa-times"></i> Delete Selected
                                                    </button>
                                                    <?php } ?>
                                                    <div class="dropup export-btn-holder mx-1">
                                                        <button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fa fa-save"></i> Export
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <?php $export_print_link = $this->set_current_page_link(array('format' => 'print')); ?>
                                                            <a class="dropdown-item export-link-btn" data-format="print" href="<?php print_link($export_print_link); ?>" target="_blank">
                                                                <img src="<?php print_link('assets/images/print.png') ?>" class="mr-2" /> PRINT
                                                                </a>
                                                                <?php $export_pdf_link = $this->set_current_page_link(array('format' => 'pdf')); ?>
                                                                <a class="dropdown-item export-link-btn" data-format="pdf" href="<?php print_link($export_pdf_link); ?>" target="_blank">
                                                                    <img src="<?php print_link('assets/images/pdf.png') ?>" class="mr-2" /> PDF
                                                                    </a>
                                                                    <?php $export_word_link = $this->set_current_page_link(array('format' => 'word')); ?>
                                                                    <a class="dropdown-item export-link-btn" data-format="word" href="<?php print_link($export_word_link); ?>" target="_blank">
                                                                        <img src="<?php print_link('assets/images/doc.png') ?>" class="mr-2" /> WORD
                                                                        </a>
                                                                        <?php $export_csv_link = $this->set_current_page_link(array('format' => 'csv')); ?>
                                                                        <a class="dropdown-item export-link-btn" data-format="csv" href="<?php print_link($export_csv_link); ?>" target="_blank">
                                                                            <img src="<?php print_link('assets/images/csv.png') ?>" class="mr-2" /> CSV
                                                                            </a>
                                                                            <?php $export_excel_link = $this->set_current_page_link(array('format' => 'excel')); ?>
                                                                            <a class="dropdown-item export-link-btn" data-format="excel" href="<?php print_link($export_excel_link); ?>" target="_blank">
                                                                                <img src="<?php print_link('assets/images/xsl.png') ?>" class="mr-2" /> EXCEL
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">   
                                                                    <?php
                                                                    if($show_pagination == true){
                                                                    $pager = new Pagination($total_records, $record_count);
                                                                    $pager->route = $this->route;
                                                                    $pager->show_page_count = true;
                                                                    $pager->show_record_count = true;
                                                                    $pager->show_page_limit =true;
                                                                    $pager->limit_count = $this->limit_count;
                                                                    $pager->show_page_number_list = true;
                                                                    $pager->pager_link_range=5;
                                                                    $pager->render();
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
