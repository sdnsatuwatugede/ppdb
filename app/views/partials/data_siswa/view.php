<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("data_siswa/add");
$can_edit = ACL::is_allowed("data_siswa/edit");
$can_view = ACL::is_allowed("data_siswa/view");
$can_delete = ACL::is_allowed("data_siswa/delete");
?>
<?php
$comp_model = new SharedController;
$page_element_id = "view-page-" . random_str();
$current_page = $this->set_current_page_link();
$csrf_token = Csrf::$token;
//Page Data Information from Controller
$data = $this->view_data;
//$rec_id = $data['__tableprimarykey'];
$page_id = $this->route->page_id; //Page id from url
$view_title = $this->view_title;
$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;
?>
<section class="page" id="<?php echo $page_element_id; ?>" data-page-type="view"  data-display-type="table" data-page-url="<?php print_link($current_page); ?>">
    <?php
    if( $show_header == true ){
    ?>
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col ">
                    <h4 class="record-title"><div class="custom-1">Data Siswa</div></h4>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <?php $this :: display_page_errors(); ?>
                    <div  class="card animated fadeIn page-content">
                        <?php
                        $counter = 0;
                        if(!empty($data)){
                        $rec_id = (!empty($data['id']) ? urlencode($data['id']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-no_pendaftaran">
                                        <th class="title"> No Pendaftaran: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-tanggal_daftar">
                                        <th class="title"> Tanggal Daftar: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-nama_siswa">
                                        <th class="title"> Nama Siswa: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-jenis_kelamin">
                                        <th class="title"> Jenis Kelamin: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-nik_siswa">
                                        <th class="title"> Nik Siswa: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-tempat_lhr">
                                        <th class="title"> Tempat Lahir: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-tanggal_lhr">
                                        <th class="title"> Tanggal Lahir: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-no_reg_akte">
                                        <th class="title"> No Register Akte: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-kewarga">
                                        <th class="title"> Kewarganegraan: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-Agama">
                                        <th class="title"> Agama: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-keb_khusus_s">
                                        <th class="title"> Kebutuhan Khusus: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-alamat">
                                        <th class="title"> Alamat: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-rt">
                                        <th class="title"> RT: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-rw">
                                        <th class="title"> RW: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-dusun">
                                        <th class="title"> Dusun: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-kelurahan">
                                        <th class="title"> Kelurahan / Desa: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-kec">
                                        <th class="title"> Kecamatan: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-kd_pos">
                                        <th class="title"> Kode Pos: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-tmp_tg">
                                        <th class="title"> Tempat Tinggal: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-moda_trans">
                                        <th class="title"> Moda Transportasi: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-anak_ke">
                                        <th class="title"> Anak Ke: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-nama_ayah">
                                        <th class="title"> Nama Ayah: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-nik_ayah">
                                        <th class="title"> Nik Ayah: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-th_lhr_ayah">
                                        <th class="title"> Tahun Lahir Ayah: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-pendidikan_ayah">
                                        <th class="title"> Pendidikan Ayah: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-pekerjaan_ayah">
                                        <th class="title"> Pekerjaan Ayah: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-penghasilan_ay">
                                        <th class="title"> Penghasilan Ayah: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-nama_ibu">
                                        <th class="title"> Nama Ibu: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-nik_ibu">
                                        <th class="title"> Nik Ibu: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-th_lhr_ibu">
                                        <th class="title"> Tahun Lahir Ibu: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-pendidikan_ibu">
                                        <th class="title"> Pendidikan Ibu: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-penghasilan_ibu">
                                        <th class="title"> Penghasilan Ibu: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-pekerjaan_ibu">
                                        <th class="title"> Pekerjaan Ibu: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-no_telp">
                                        <th class="title"> No Telp: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-no_hp">
                                        <th class="title"> No Hp: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-tinggi_badan">
                                        <th class="title"> Tinggi Badan: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-berat_badan">
                                        <th class="title"> Berat Badan: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-jarak_rumah">
                                        <th class="title"> Jarak Rumah: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-waktu_tempuh">
                                        <th class="title"> Waktu Tempuh: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-asal_sekolah">
                                        <th class="title"> Asal Sekolah: </th>
                                        <td class="value">
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
                                    </tr>
                                </tbody>
                                <!-- Table Body End -->
                            </table>
                        </div>
                        <div class="p-3 d-flex">
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
                                                <?php if($can_edit){ ?>
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("data_siswa/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("data_siswa/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
                                                    <i class="fa fa-times"></i> Delete
                                                </a>
                                                <?php } ?>
                                            </div>
                                            <?php
                                            }
                                            else{
                                            ?>
                                            <!-- Empty Record Message -->
                                            <div class="text-muted p-3">
                                                <i class="fa fa-ban"></i> No Record Found
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
