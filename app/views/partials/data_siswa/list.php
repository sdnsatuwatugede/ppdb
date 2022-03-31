<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("data_siswa/add");
$can_edit = ACL::is_allowed("data_siswa/edit");
$can_view = ACL::is_allowed("data_siswa/view");
$can_delete = ACL::is_allowed("data_siswa/delete");
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
    <div  class="p-3 mb-3">
        <div class="container-fluid">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title"><div class="custom-1">data siswa</div></h4>
                </div>
                <div class="col-sm-3 ">
                    <?php if($can_add){ ?>
                    <a  class="btn btn btn-primary rounded my-1" href="<?php print_link("data_siswa/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Tambah Data Siswa 
                    </a>
                    <?php } ?>
                </div>
                <div class="col-sm-4 ">
                    <form  class="search" action="<?php print_link('data_siswa'); ?>" method="get">
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
                                        <a class="text-decoration-none" href="<?php print_link('data_siswa'); ?>">
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
                                        <a class="text-decoration-none" href="<?php print_link('data_siswa'); ?>">
                                            <i class="fa fa-angle-left"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item text-capitalize">
                                        Cari
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
                            <div id="data_siswa-list-records">
                                <div id="page-report-body" class="table-responsive">
                                    <table class="table  table-striped table-sm text-left">
                                        <thead class="table-header bg-suc">
                                            <tr>
                                                <?php if($can_delete){ ?>
                                                <th class="td-checkbox"scope="col">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                <?php } ?>
                                                <th class="td-sno">No</th>
                                                <th  class="td-no_pendaftaran"> No Pendaftaran</th>
                                                <th  class="td-tanggal_daftar"> Tanggal Daftar</th>
                                                <th  class="td-username"> Username</th>
                                                <th  class="td-nama_siswa"> Nama Siswa</th>
                                                <th  class="td-jenis_kelamin"> Jenis Kelamin</th>
                                                <th  class="td-nik_siswa"> Nik Siswa</th>
                                                <th  class="td-tempat_lhr"> Tempat Lahir</th>
                                                <th  class="td-tanggal_lhr"> Tanggal Lahir</th>
                                                <th  class="td-no_reg_akte"> No Register Akte</th>
                                                <th  class="td-kewarga"> Kewarganegaraan</th>
                                                <th  class="td-Agama"> Agama</th>
                                                <th  class="td-keb_khusus_s"> Kebutuhan Khusus</th>
                                                <th  class="td-alamat"> Alamat</th>
                                                <th  class="td-rt"> RT</th>
                                                <th  class="td-rw"> RW</th>
                                                <th  class="td-dusun"> Dusun</th>
                                                <th  class="td-kelurahan"> Kelurahan</th>
                                                <th  class="td-kec"> Kecamatan</th>
                                                <th  class="td-kd_pos"> Kode Pos</th>
                                                <th  class="td-tmp_tg"> Tempat Tinggal</th>
                                                <th  class="td-moda_trans"> Moda Transportasi</th>
                                                <th  class="td-anak_ke"> Anak Ke</th>
                                                <th  class="td-nama_ayah"> Nama Ayah</th>
                                                <th  class="td-nik_ayah"> Nik Ayah</th>
                                                <th  class="td-th_lhr_ayah"> Tahun Lahir Ayah</th>
                                                <th  class="td-pendidikan_ayah"> Pendidikan Ayah</th>
                                                <th  class="td-pekerjaan_ayah"> Pekerjaan Ayah</th>
                                                <th  class="td-penghasilan_ay"> Penghasilan Ayah</th>
                                                <th  class="td-nama_ibu"> Nama Ibu</th>
                                                <th  class="td-nik_ibu"> Nik Ibu</th>
                                                <th  class="td-th_lhr_ibu"> Tahun Lahir Ibu</th>
                                                <th  class="td-pendidikan_ibu"> Pendidikan Ibu</th>
                                                <th  class="td-penghasilan_ibu"> Penghasilan Ibu</th>
                                                <th  class="td-pekerjaan_ibu"> Pekerjaan Ibu</th>
                                                <th  class="td-no_telp"> No Telp</th>
                                                <th  class="td-no_hp"> No Hp</th>
                                                <th  class="td-tinggi_badan"> Tinggi Badan</th>
                                                <th  class="td-berat_badan"> Berat Badan</th>
                                                <th  class="td-jarak_rumah"> Jarak Rumah</th>
                                                <th  class="td-waktu_tempuh"> Waktu Tempuh</th>
                                                <th  class="td-asal_sekolah"> Asal Sekolah</th>
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
                                            $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                                            $counter++;
                                            ?>
                                            <tr>
                                                <?php if($can_delete){ ?>
                                                <th class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['id'] ?>" type="checkbox" />
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </th>
                                                    <?php } ?>
                                                    <th class="td-sno"><?php echo $counter; ?></th>
                                                    <td class="td-no_pendaftaran">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['no_pendaftaran']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="no_pendaftaran" 
                                                            data-title="Enter No Pendaftaran" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['no_pendaftaran']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-tanggal_daftar">
                                                        <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y', enableTime: false, minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['tanggal_daftar']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="tanggal_daftar" 
                                                            data-title="Enter Tanggal Daftar" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['tanggal_daftar']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-username">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['username']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="username" 
                                                            data-title="Username" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['username']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-nama_siswa">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_siswa']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="nama_siswa" 
                                                            data-title="Nama Siswa" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['nama_siswa']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-jenis_kelamin">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $jenis_kelamin); ?>' 
                                                            data-value="<?php echo $data['jenis_kelamin']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="jenis_kelamin" 
                                                            data-title="Enter Jenis Kelamin" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="radiolist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['jenis_kelamin']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-nik_siswa">
                                                        <span <?php if($can_edit){ ?> data-min="1111111111111111" 
                                                            data-value="<?php echo $data['nik_siswa']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="nik_siswa" 
                                                            data-title="Nik Siswa" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['nik_siswa']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-tempat_lhr">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['tempat_lhr']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="tempat_lhr" 
                                                            data-title="Tempat Lahir" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['tempat_lhr']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-tanggal_lhr">
                                                        <span <?php if($can_edit){ ?> data-flatpickr="{altFormat: 'd-m-Y', enableTime: false, minDate: '', maxDate: ''}" 
                                                            data-value="<?php echo $data['tanggal_lhr']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="tanggal_lhr" 
                                                            data-title="Tanggal Lahir" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="flatdatetimepicker" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['tanggal_lhr']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-no_reg_akte">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['no_reg_akte']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="no_reg_akte" 
                                                            data-title="No Register Akte" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['no_reg_akte']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-kewarga">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $kewarga); ?>' 
                                                            data-value="<?php echo $data['kewarga']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="kewarga" 
                                                            data-title="Enter Kewarganegraan" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="radiolist" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['kewarga']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-Agama">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $Agama); ?>' 
                                                            data-value="<?php echo $data['Agama']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="Agama" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['Agama']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-keb_khusus_s">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $keb_khusus_s); ?>' 
                                                            data-value="<?php echo $data['keb_khusus_s']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="keb_khusus_s" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['keb_khusus_s']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-alamat">
                                                        <span <?php if($can_edit){ ?> data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="alamat" 
                                                            data-title="Alamat" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['alamat']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-rt">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['rt']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="rt" 
                                                            data-title="RT" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['rt']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-rw">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['rw']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="rw" 
                                                            data-title="RW" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['rw']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-dusun">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['dusun']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="dusun" 
                                                            data-title="Dusun" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['dusun']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-kelurahan">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['kelurahan']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="kelurahan" 
                                                            data-title="Kelurahan / Desa" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['kelurahan']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-kec">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['kec']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="kec" 
                                                            data-title="Kecamatan" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['kec']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-kd_pos">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['kd_pos']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="kd_pos" 
                                                            data-title="Kode Pos" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['kd_pos']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-tmp_tg">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $tmp_tg); ?>' 
                                                            data-value="<?php echo $data['tmp_tg']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="tmp_tg" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['tmp_tg']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-moda_trans">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $moda_trans); ?>' 
                                                            data-value="<?php echo $data['moda_trans']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="moda_trans" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['moda_trans']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-anak_ke">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['anak_ke']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="anak_ke" 
                                                            data-title="Anak Ke" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['anak_ke']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-nama_ayah">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_ayah']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="nama_ayah" 
                                                            data-title="Nama Ayah" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['nama_ayah']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-nik_ayah">
                                                        <span <?php if($can_edit){ ?> data-min="1111111111111111" 
                                                            data-value="<?php echo $data['nik_ayah']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="nik_ayah" 
                                                            data-title="Nik Ayah" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['nik_ayah']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-th_lhr_ayah">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $th_lhr_ayah); ?>' 
                                                            data-value="<?php echo $data['th_lhr_ayah']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="th_lhr_ayah" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['th_lhr_ayah']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-pendidikan_ayah">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $pendidikan_ayah); ?>' 
                                                            data-value="<?php echo $data['pendidikan_ayah']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="pendidikan_ayah" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['pendidikan_ayah']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-pekerjaan_ayah">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $pekerjaan_ayah); ?>' 
                                                            data-value="<?php echo $data['pekerjaan_ayah']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="pekerjaan_ayah" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['pekerjaan_ayah']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-penghasilan_ay">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $penghasilan_ay); ?>' 
                                                            data-value="<?php echo $data['penghasilan_ay']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="penghasilan_ay" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['penghasilan_ay']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-nama_ibu">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['nama_ibu']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="nama_ibu" 
                                                            data-title="Nama Ibu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['nama_ibu']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-nik_ibu">
                                                        <span <?php if($can_edit){ ?> data-min="1111111111111111" 
                                                            data-value="<?php echo $data['nik_ibu']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="nik_ibu" 
                                                            data-title="Nik Ibu" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['nik_ibu']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-th_lhr_ibu">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $th_lhr_ayah); ?>' 
                                                            data-value="<?php echo $data['th_lhr_ibu']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="th_lhr_ibu" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['th_lhr_ibu']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-pendidikan_ibu">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $pendidikan_ayah); ?>' 
                                                            data-value="<?php echo $data['pendidikan_ibu']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="pendidikan_ibu" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['pendidikan_ibu']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-penghasilan_ibu">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $penghasilan_ay); ?>' 
                                                            data-value="<?php echo $data['penghasilan_ibu']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="penghasilan_ibu" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['penghasilan_ibu']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-pekerjaan_ibu">
                                                        <span <?php if($can_edit){ ?> data-source='<?php echo json_encode_quote(Menu :: $pekerjaan_ayah); ?>' 
                                                            data-value="<?php echo $data['pekerjaan_ibu']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="pekerjaan_ibu" 
                                                            data-title="Select a value ..." 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="select" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['pekerjaan_ibu']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-no_telp">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['no_telp']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="no_telp" 
                                                            data-title="Enter Nomer Telphone" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['no_telp']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-no_hp">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['no_hp']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="no_hp" 
                                                            data-title="Enter Nomer Hp" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['no_hp']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-tinggi_badan">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['tinggi_badan']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="tinggi_badan" 
                                                            data-title="Tinggi Badan" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['tinggi_badan']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-berat_badan">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['berat_badan']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="berat_badan" 
                                                            data-title="Berat Badan" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['berat_badan']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-jarak_rumah">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['jarak_rumah']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="jarak_rumah" 
                                                            data-title="Jarak Rumah" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['jarak_rumah']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-waktu_tempuh">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['waktu_tempuh']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="waktu_tempuh" 
                                                            data-title="Waktu Tempuh" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['waktu_tempuh']; ?> 
                                                        </span>
                                                    </td>
                                                    <td class="td-asal_sekolah">
                                                        <span <?php if($can_edit){ ?> data-value="<?php echo $data['asal_sekolah']; ?>" 
                                                            data-pk="<?php echo $data['id'] ?>" 
                                                            data-url="<?php print_link("data_siswa/editfield/" . urlencode($data['id'])); ?>" 
                                                            data-name="asal_sekolah" 
                                                            data-title="Asal Sekolah" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="text" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" <?php } ?>>
                                                            <?php echo $data['asal_sekolah']; ?> 
                                                        </span>
                                                    </td>
                                                    <th class="td-btn">
                                                        <?php if($can_view){ ?>
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link("data_siswa/view/$rec_id"); ?>">
                                                            <i class="fa fa-eye"></i> View
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_edit){ ?>
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link("data_siswa/edit/$rec_id"); ?>">
                                                            <i class="fa fa-edit"></i> Edit
                                                        </a>
                                                        <?php } ?>
                                                        <?php if($can_delete){ ?>
                                                        <a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="<?php print_link("data_siswa/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
                                                    <button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="<?php print_link("data_siswa/delete/{sel_ids}/?csrf_token=$csrf_token&redirect=$current_page"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
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
