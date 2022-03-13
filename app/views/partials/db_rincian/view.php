<?php 
//check if current user role is allowed access to the pages
$can_add = ACL::is_allowed("db_rincian/add");
$can_edit = ACL::is_allowed("db_rincian/edit");
$can_view = ACL::is_allowed("db_rincian/view");
$can_delete = ACL::is_allowed("db_rincian/delete");
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
                    <h4 class="record-title">Data Rincian Detail</h4>
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
                        $rec_id = (!empty($data['id_rincian']) ? urlencode($data['id_rincian']) : null);
                        $counter++;
                        ?>
                        <div id="page-report-body" class="">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody class="page-data" id="page-data-<?php echo $page_element_id; ?>">
                                    <tr  class="td-id_siswa">
                                        <th class="title"> Nama Siswa: </th>
                                        <td class="value">
                                            <a size="sm" class="btn btn-info page-modal" href="<?php print_link("data_siswa/view/" . urlencode($data['id_siswa'])) ?>">
                                                <i class="fa fa-circle-o "></i> <?php echo $data['data_siswa_nama_siswa'] ?>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr  class="td-no_telp">
                                        <th class="title"> No Telp: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['no_telp']; ?>" 
                                                data-pk="<?php echo $data['id_rincian'] ?>" 
                                                data-url="<?php print_link("db_rincian/editfield/" . urlencode($data['id_rincian'])); ?>" 
                                                data-name="no_telp" 
                                                data-title="Isi No telp rumah kalau ada" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
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
                                                data-pk="<?php echo $data['id_rincian'] ?>" 
                                                data-url="<?php print_link("db_rincian/editfield/" . urlencode($data['id_rincian'])); ?>" 
                                                data-name="no_hp" 
                                                data-title="isi dengan nomer hp yang aktif" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['no_hp']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-email">
                                        <th class="title"> Email: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['email']; ?>" 
                                                data-pk="<?php echo $data['id_rincian'] ?>" 
                                                data-url="<?php print_link("db_rincian/editfield/" . urlencode($data['id_rincian'])); ?>" 
                                                data-name="email" 
                                                data-title=" Email" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="email" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['email']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-tinggi_badan">
                                        <th class="title"> Tinggi Badan: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['tinggi_badan']; ?>" 
                                                data-pk="<?php echo $data['id_rincian'] ?>" 
                                                data-url="<?php print_link("db_rincian/editfield/" . urlencode($data['id_rincian'])); ?>" 
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
                                                data-pk="<?php echo $data['id_rincian'] ?>" 
                                                data-url="<?php print_link("db_rincian/editfield/" . urlencode($data['id_rincian'])); ?>" 
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
                                    <tr  class="td-jarak">
                                        <th class="title"> Jarak Rumah Ke Sekolah: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jarak']; ?>" 
                                                data-pk="<?php echo $data['id_rincian'] ?>" 
                                                data-url="<?php print_link("db_rincian/editfield/" . urlencode($data['id_rincian'])); ?>" 
                                                data-name="jarak" 
                                                data-title="Jarak" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jarak']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-waktu">
                                        <th class="title"> Waktu Tempuh : </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['waktu']; ?>" 
                                                data-pk="<?php echo $data['id_rincian'] ?>" 
                                                data-url="<?php print_link("db_rincian/editfield/" . urlencode($data['id_rincian'])); ?>" 
                                                data-name="waktu" 
                                                data-title="waktu tempuh dari rumah ke sekolah" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="text" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['waktu']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-jml_saudara">
                                        <th class="title"> Jumlah Saudara: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['jml_saudara']; ?>" 
                                                data-pk="<?php echo $data['id_rincian'] ?>" 
                                                data-url="<?php print_link("db_rincian/editfield/" . urlencode($data['id_rincian'])); ?>" 
                                                data-name="jml_saudara" 
                                                data-title="Jumlah Saudara sesua kk" 
                                                data-placement="left" 
                                                data-toggle="click" 
                                                data-type="number" 
                                                data-mode="popover" 
                                                data-showbuttons="left" 
                                                class="is-editable" <?php } ?>>
                                                <?php echo $data['jml_saudara']; ?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <tr  class="td-asal_sekolah">
                                        <th class="title"> Asal Sekolah: </th>
                                        <td class="value">
                                            <span <?php if($can_edit){ ?> data-value="<?php echo $data['asal_sekolah']; ?>" 
                                                data-pk="<?php echo $data['id_rincian'] ?>" 
                                                data-url="<?php print_link("db_rincian/editfield/" . urlencode($data['id_rincian'])); ?>" 
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
                                                <a class="btn btn-sm btn-info"  href="<?php print_link("db_rincian/edit/$rec_id"); ?>">
                                                    <i class="fa fa-edit"></i> Edit
                                                </a>
                                                <?php } ?>
                                                <?php if($can_delete){ ?>
                                                <a class="btn btn-sm btn-danger record-delete-btn mx-1"  href="<?php print_link("db_rincian/delete/$rec_id/?csrf_token=$csrf_token&redirect=$current_page"); ?>" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
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
