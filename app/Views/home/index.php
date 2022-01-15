<?= $this->extend('template/template.php'); ?>

<?= $this->section('content'); ?>
 
            <header class="bg-dark py-5" >
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Nuansa Inti Persada</h1>
                                <p class="lead fw-normal text-white-50 mb-4">Konsentrasi pada sektor Informasi Teknologi, Kami melayani IT Project Solution : Fiber Optic Service, Running Text , PC & Laptop Service,Video Conference Solution,WiFi System, Cam Security, Entreprise Network For corporate, PABX Solution.</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="<?= base_url('/info')  ?>">Info Perusahaan</a>
                                    <a class="btn btn-outline-light btn-lg px-4" href="<?= base_url('/contact')  ?>">Hubungi Kami</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="/img/homenuansa.jpg" alt="..." /></div>
                    </div>
                </div>
            </header>
            <!-- Features section-->
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">Core Business Kami Meliputi</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                             <?php foreach($homeProduk as $hp):
                              
                              ?>
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="fa fa-info-circle"></i></div>
                                    <h2 class="h5"><?= $hp['namaproduk'] ?></h2>
                                    <p class="mb-0"><?= $hp['deskripsi'] ?></p>
                                </div>
                                <?php endforeach ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonial section-->
           
            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">Dokumentasi Pekerjaan</h2>
                                <p class="lead fw-normal text-muted mb-5">Berikut merupakan segala jenis pekerjaan yang telah kami layani.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                    <?php foreach($homemodels as $row): ?>
                              <?php 
                              $des=substr($row['deskripsi'],0,79)." ...";
                            //    if(strlen($row['deskripsi'])>80){
                            //     $des=substr($row['deskripsi'],0,79)." ...";
                                
                            //    }
                               
                               ?>
                              
                                 <div class="col-lg-4 mb-5">
                                     <div class="card h-100 shadow border-0">
                                         <img class="card-img-top" src="/img/<?= $row['fotopekerjaan'] ?>" alt="..." style="max-height:100%    " />
                                         <div class="card-body p-4">
                                             <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                             <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3"><?= $row['namapekerjaan'] ?></h5></a>
                                             <p class="card-text mb-0"><?= $des ?></p>
                                         </div>
                                         <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                             <div class="d-flex align-items-end justify-content-between">
                                                 <div class="d-flex align-items-center">
                                                     <div class="small">
                                                         <div class="fw-bold">Author : <?= $row['author'] ?></div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                        <?php endforeach; ?>
<div class="container">


                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">Brand Yang Digunakan</h2>
                                <p class="lead fw-normal text-muted mb-5">Berikut merupakan Brand yang telah kami gunakan</p>
                            </div>
                        </div>
                    </div>
                     <div class="container container-lg  ">

                    
                        <div class="row ">
                        <?php foreach($brand as $brands): ?>
                            <div class="col-lg-1 col">

                            </div>
                        <div class="col p-3 col-lg-2">
                            <img src="/img/<?= $brands['foto'] ?>" alt="" srcset="" width="100">                   
                            
                        </div>
                        
                        <?php endforeach;?>
                    </div>
                    </div>
                              
                    <!-- Call to action-->
                    <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                            <div class="mb-4 mb-xl-0">
                                <div class="fs-3 fw-bold text-white">Reparasi dan Pemasangan ?.</div>
                                <div class="text-white-50">Segala bentuk reparasi , Jasa , dan Pemasagan sektor Informasi Teknologi mohon Hubungi Kami.</div>
                            </div>
                            <div class="ms-xl-4">
                             <div class="small text-white-50">Tekan dibawah ini untuk menghubungi kami.</div>
                                <div class="input-group mb-2">
                                    <a class="btn btn-warning form-control font-weight-bolder text-dark" href="https://api.whatsapp.com/send?phone=6282145554374" target="_blank" > Hubungi Kami</a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>

<?= $this->endSection(); ?>