<?php 
$page_id = null;
$comp_model = new SharedController;
$current_page = $this->set_current_page_link();
?>
<div>
    <div  class=" p-3 mb-3">
        <div class="container">
            <div class="row ">
                <div class="col-md-12 comp-grid">
                    <h4 ><div class="custom-1"> Selamat Datang <?php echo USER_NAME ?></div></h4>
                </div>
            </div>
        </div>
    </div>
    <div  class="">
        <div class="container">
            <div class="row ">
                <div class="col-sm-12 comp-grid">
                    <h6 ><div class="custom-1"> Tata Cara Pendaftaran</div><br><hr>
                        <div class="custom-2"> Siapkan Dokumen Pendukung</div><hr/>
                        <div> 
                            <ul class="list-group">
                                <li>Kartu Keluarga</li>
                                <li>Akte Kelahiran / Surat Kelahiran</li>
                                <li>Isi Dokumen Sesuai Keadaan Saat Ini</li>
                                <li>Semua Dokumen Diatas di foto kopi sebanyak 2 lembar untuk di bawah ke sekolah</li>
                            </div>
                            <br><br>
                            </div></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div  class="">
                <div class="container">
                    <div class="row ">
                        <div class="col-sm-12 comp-grid">
                            <h6 ><div class="custom-2"> Tata Cara Pengisian Formulir</div><hr/>
                                <div> 
                                    <ul class="list-group">
                                        <li>No Pendaftaran akan terisi otomatis</li>
                                        <li>Tanggal pendaftaran terisi otomatis</li>
                                        <li>Awali Nama / kalimat dengan Huruf besar Contoh (Muhammad Sulton)</li>
                                        <li>Untuk keakuratan data mohon data siswa di isi dengan dokumen yang ada </li>
                                        <li>Kalau ada yang belum paham dalam pengisian silakan Kontak Telp Sekolah ( 0341441951 )</li>
                                        <li>Untuk Edit Data Silakan Cara Klick Data Siswa Geser nanti ada tombol edit </li>
                                    </ul>
                                </div></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="">
                    <div class="container">
                        <div class="row ">
                            <div class="col-sm-12 comp-grid">
                                <a  class="btn btn btn-outline-primary" href="<?php print_link("data_siswa/add") ?>">
                                    <i class="fa fa-user-plus "></i>                                
                                    Formulir Siswa 
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div  class="my-3">
                    <div class="container">
                        <div class="row ">
                            <div class="col-sm-12 comp-grid">
                                <?php $rec_count = $comp_model->getcount_datasiswa();  ?>
                                <a class="animated zoomIn record-count card bg-secondary text-white"  href="<?php print_link("data_siswa/") ?>">
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="fa fa-align-justify "></i>
                                        </div>
                                        <div class="col-10">
                                            <div class="flex-column justify-content align-center">
                                                <div class="title">Data Siswa</div>
                                                <div class="progress mt-2">
                                                    <?php 
                                                    $perc = ($rec_count / 100) * 100 ;
                                                    ?>
                                                    <div class="progress-bar bg-light text-dark" role="progressbar" aria-valuenow="<?php echo $rec_count; ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $perc ?>%">
                                                        <span class="progress-label"><?php echo round($perc,2); ?>%</span>
                                                    </div>
                                                </div>
                                                <small class="small desc"></small>
                                            </div>
                                        </div>
                                        <h4 class="value"><strong>DATA <?php echo $rec_count; ?></strong></h4>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
