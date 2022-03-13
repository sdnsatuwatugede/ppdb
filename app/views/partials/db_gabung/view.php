<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("db_gabung/add");
$can_edit = ACL::is_allowed("db_gabung/edit");
$can_view = ACL::is_allowed("db_gabung/view");
$can_delete = ACL::is_allowed("db_gabung/delete");
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
                    <h4 class="record-title">View  Db Gabung</h4>
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
                        $rec_id = (!empty($data['id_gb']) ? urlencode($data['id_gb']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id_gb">
                                        <th class="title"> Id Gb: </th>
                                        <td class="value"> <?php echo $data['id_gb']; ?></td>
                                    </tr>
                                    <tr  class="td-id_siswa">
                                        <th class="title"> Id Siswa: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-id_rinci">
                                        <th class="title"> Id Rinci: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-nama_siswa">
                                        <th class="title"> Nama Siswa: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-nama_ortu">
                                        <th class="title"> Nama Ortu: </th>
                                        <td class="value">
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
                                    </tr>
                                    <tr  class="td-data_siswa_id">
                                        <th class="title"> Data Siswa Id: </th>
                                        <td class="value"> <?php echo $data['data_siswa_id']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_no_pendaftaran">
                                        <th class="title"> Data Siswa No Pendaftaran: </th>
                                        <td class="value"> <?php echo $data['data_siswa_no_pendaftaran']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_nama_siswa">
                                        <th class="title"> Data Siswa Nama Siswa: </th>
                                        <td class="value"> <?php echo $data['data_siswa_nama_siswa']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_jenis_kelamin">
                                        <th class="title"> Data Siswa Jenis Kelamin: </th>
                                        <td class="value"> <?php echo $data['data_siswa_jenis_kelamin']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_nik_siswa">
                                        <th class="title"> Data Siswa Nik Siswa: </th>
                                        <td class="value"> <?php echo $data['data_siswa_nik_siswa']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_tempat_lhr">
                                        <th class="title"> Data Siswa Tempat Lhr: </th>
                                        <td class="value"> <?php echo $data['data_siswa_tempat_lhr']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_tanggal_lhr">
                                        <th class="title"> Data Siswa Tanggal Lhr: </th>
                                        <td class="value"> <?php echo $data['data_siswa_tanggal_lhr']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_no_reg_akte">
                                        <th class="title"> Data Siswa No Reg Akte: </th>
                                        <td class="value"> <?php echo $data['data_siswa_no_reg_akte']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_agama">
                                        <th class="title"> Data Siswa Agama: </th>
                                        <td class="value"> <?php echo $data['data_siswa_agama']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_kewarga">
                                        <th class="title"> Data Siswa Kewarga: </th>
                                        <td class="value"> <?php echo $data['data_siswa_kewarga']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_keb_khusus_s">
                                        <th class="title"> Data Siswa Keb Khusus S: </th>
                                        <td class="value"> <?php echo $data['data_siswa_keb_khusus_s']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_alamat">
                                        <th class="title"> Data Siswa Alamat: </th>
                                        <td class="value"> <?php echo $data['data_siswa_alamat']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_rt">
                                        <th class="title"> Data Siswa Rt: </th>
                                        <td class="value"> <?php echo $data['data_siswa_rt']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_rw">
                                        <th class="title"> Data Siswa Rw: </th>
                                        <td class="value"> <?php echo $data['data_siswa_rw']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_dusun">
                                        <th class="title"> Data Siswa Dusun: </th>
                                        <td class="value"> <?php echo $data['data_siswa_dusun']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_kelurahan">
                                        <th class="title"> Data Siswa Kelurahan: </th>
                                        <td class="value"> <?php echo $data['data_siswa_kelurahan']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_kec">
                                        <th class="title"> Data Siswa Kec: </th>
                                        <td class="value"> <?php echo $data['data_siswa_kec']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_kd_pos">
                                        <th class="title"> Data Siswa Kd Pos: </th>
                                        <td class="value"> <?php echo $data['data_siswa_kd_pos']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_tmp_tg">
                                        <th class="title"> Data Siswa Tmp Tg: </th>
                                        <td class="value"> <?php echo $data['data_siswa_tmp_tg']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_moda_trans">
                                        <th class="title"> Data Siswa Moda Trans: </th>
                                        <td class="value"> <?php echo $data['data_siswa_moda_trans']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_anak_ke">
                                        <th class="title"> Data Siswa Anak Ke: </th>
                                        <td class="value"> <?php echo $data['data_siswa_anak_ke']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_tanggal_daftar">
                                        <th class="title"> Data Siswa Tanggal Daftar: </th>
                                        <td class="value"> <?php echo $data['data_siswa_tanggal_daftar']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_nama_ayah">
                                        <th class="title"> Data Siswa Nama Ayah: </th>
                                        <td class="value"> <?php echo $data['data_siswa_nama_ayah']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_nik_ayah">
                                        <th class="title"> Data Siswa Nik Ayah: </th>
                                        <td class="value"> <?php echo $data['data_siswa_nik_ayah']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_pendidikan_ayah">
                                        <th class="title"> Data Siswa Pendidikan Ayah: </th>
                                        <td class="value"> <?php echo $data['data_siswa_pendidikan_ayah']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_pekerjaan_ayah">
                                        <th class="title"> Data Siswa Pekerjaan Ayah: </th>
                                        <td class="value"> <?php echo $data['data_siswa_pekerjaan_ayah']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_penghasilan_ay">
                                        <th class="title"> Data Siswa Penghasilan Ay: </th>
                                        <td class="value"> <?php echo $data['data_siswa_penghasilan_ay']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_nama_ibu">
                                        <th class="title"> Data Siswa Nama Ibu: </th>
                                        <td class="value"> <?php echo $data['data_siswa_nama_ibu']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_nik_ibu">
                                        <th class="title"> Data Siswa Nik Ibu: </th>
                                        <td class="value"> <?php echo $data['data_siswa_nik_ibu']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_th_lhr_ibu">
                                        <th class="title"> Data Siswa Th Lhr Ibu: </th>
                                        <td class="value"> <?php echo $data['data_siswa_th_lhr_ibu']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_pendidikan_ibu">
                                        <th class="title"> Data Siswa Pendidikan Ibu: </th>
                                        <td class="value"> <?php echo $data['data_siswa_pendidikan_ibu']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_penghasilan_ibu">
                                        <th class="title"> Data Siswa Penghasilan Ibu: </th>
                                        <td class="value"> <?php echo $data['data_siswa_penghasilan_ibu']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_th_lhr_ayah">
                                        <th class="title"> Data Siswa Th Lhr Ayah: </th>
                                        <td class="value"> <?php echo $data['data_siswa_th_lhr_ayah']; ?></td>
                                    </tr>
                                    <tr  class="td-data_siswa_pekerjaan_ibu">
                                        <th class="title"> Data Siswa Pekerjaan Ibu: </th>
                                        <td class="value"> <?php echo $data['data_siswa_pekerjaan_ibu']; ?></td>
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("db_gabung/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("db_gabung/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
