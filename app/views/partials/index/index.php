        <?php 
        $page_id = null;
        $comp_model = new SharedController;
        ?>
        <div  class="">
            <div class="container">
                <div class="row ">
                    <div class="col-md-12 mt-3 comp-grid">
                        <h5 ><link rel="preconnect" href="https://fonts.googleapis.com">
                            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                                <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&display=swap" rel="stylesheet">
                                    
                                    <div class="cos1">PPDB TAHUN 2022</div>
                                    <hr/>
                                    
                                    <div class="cos3">Tata Cara Pendaftaran PPDB Online SD NEGERI 1 WATUGEDE Tahun Pelajaran 2022 - 2023</div>
                                    <hr/>
                                    <div class="cos3">Siapkan Dokumen Pendukung</div><br>
                                        <div class="cos2">
                                            <ul>
                                                <li>
                                                    Kartu Kelurga Terbaru
                                                </li>
                                                <li>
                                                    Akte Kelahiran
                                                </li>
                                                <li>
                                                    Atau Surat Kelahiran / Bidan / Desa
                                                </li>
                                                <li>
                                                    Isi Formulir Pendaftaran sesuai kondisi saat ini
                                                </li>
                                                <li>
                                                    Catat Nomer Pendaftaran yang terisi otomatis di formulir
                                                </li>
                                                <li>
                                                    Link Formulir bisa diakses <a class="cos4" href="/ppdb/data_siswa/add">Di sini</a>
                                                </li>
                                                <li>
                                                    Kontak Panitia <a class="cos4" href="/ppdb/info/contact">Di sini</a>
                                                </li>
                                            </ul>
                                        </div>
                                        
                                        <div class="cos3">Terima Kasih</div>
                                        <style>
                                            
                                            .cos1{
                                            font-family: 'Poppins', sans-serif;
                                            font-weight: bold;
                                            font-size: 30px;
                                            color: white;
                                            }
                                            
                                            .cos2{
                                            font-family: 'Poppins', sans-serif;
                                            color: white;
                                            }
                                            
                                            .cos3{
                                            font-family: 'Poppins', sans-serif;
                                            font-weight: bold;
                                            color: white;
                                            }
                                            
                                            .cos4{
                                            font-family: 'Poppins', sans-serif;
                                            font-weight: bold;
                                            }
                                            
                                            .cos4{
                                            font-family: 'Poppins', sans-serif;
                                            color: #00FFFF;
                                            }
                                            
                                        </style>    
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  class="my-5">
                        <div class="container-fluid">
                            <div class="row justify-content-center">
                                <div class="col-md-4 mt-5 comp-grid">
                                    <?php $this :: display_page_errors(); ?>
                                    
                                    <div  class="bg-light p-3 animated fadeIn page-content">
                                        <div>
                                            <h4><i class="fa fa-key"></i> User Login</h4>
                                            <hr />
                                            <?php 
                                            $this :: display_page_errors(); 
                                            ?>
                                            <form name="loginForm" action="<?php print_link('index/login/?csrf_token=' . Csrf::$token); ?>" class="needs-validation form page-form" method="post">
                                                <div class="input-group form-group">
                                                    <input placeholder="Username Or Email" name="username"  required="required" class="form-control" type="text"  />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="form-control-feedback fa fa-user"></i></span>
                                                    </div>
                                                </div>
                                                <div class="input-group form-group">
                                                    <input  placeholder="Password" required="required" v-model="user.password" name="password" class="form-control " type="password" />
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="form-control-feedback fa fa-key"></i></span>
                                                    </div>
                                                </div>
                                                <div class="row clearfix mt-3 mb-3">
                                                    <div class="col-6">
                                                        <label class="">
                                                            <input value="true" type="checkbox" name="rememberme" />
                                                            Remember Me
                                                        </label>
                                                    </div>
                                                    <div class="col-6">
                                                        <a href="<?php print_link('passwordmanager') ?>" class="text-danger"> Reset Password?</a>
                                                    </div>
                                                </div>
                                                <div class="form-group text-center">
                                                    <button class="btn btn-primary btn-block btn-md" type="submit"> 
                                                        <i class="load-indicator">
                                                            <clip-loader :loading="loading" color="#fff" size="20px"></clip-loader> 
                                                        </i>
                                                        Login <i class="fa fa-key"></i>
                                                    </button>
                                                </div>
                                                <hr />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  class="">
                        <div class="container">
                            <div class="row justify-content-end">
                                <div class="col-md-7 comp-grid">
                                    <a  class="btn btn btn-primary" href="<?php print_link("data_siswa/add") ?>">
                                        <i class="fa fa-plus "></i>                             
                                        Daftar Sekarang 
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div  class="my-3">
                        <div class="container">
                            <div class="row ">
                                <div class="col-md-12 comp-grid">
                                    <div class=""><!-- GetButton.io widget -->
                                        <script type="text/javascript">
                                            (function () {
                                            var options = {
                                            whatsapp: "+6281335809010", // WhatsApp number
                                            call_to_action: "Kirimi kami pesan", // Call to action
                                            position: "left", // Position may be 'right' or 'left'
                                            };
                                            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
                                            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                                            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                                            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
                                            })();
                                        </script>
                                        <!-- /GetButton.io widget -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    