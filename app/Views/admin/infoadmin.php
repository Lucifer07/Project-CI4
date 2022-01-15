<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>
<?php
$namaperusahaan = "";
foreach($info as $row):
    
    $namaperusahaan = $row['author'];
    $moto = $row['moto'];
   

endforeach;
?>

<header class="py-5">
          <div class="container px-5">
              <div class="row justify-content-center">
                  <div class="col-lg-8 col-xxl-6">
                      <div class="text-center my-5">
                          <h1 class="fw-bolder mb-3"><?= $namaperusahaan; ?></h1>
                          <p class="lead fw-normal text-muted mb-4"> <?= $moto; ?></p>
                          <a class="btn btn-primary btn-lg" href="#scroll-target">Learn More</a>
                      </div>
                  </div>
              </div>
          </div>
      </header>
      
      <!-- About section one-->
     
      <?php
            foreach($info as $row):
                ?>
      <section class=" bg-light" id="scroll-target">
          <div class="container px-5 my-5">
              <div class="row gx-5 align-items-center">
                  <div class="col-lg-6 <?= $row['posisi'] == 'kanan' ? 'order-first order-lg-last' : ''; ?>"><img class="img-fluid rounded mb-5 mb-lg-0" src="/img/<?= $row['foto2']; ?>" alt="..." /></div>
                  <div class="col-lg-6">
                      <h2 class="fw-bolder"><?= $row['headingprofil']; ?></h2>
                      <span class="lead fw-normal text-muted mb-0 "><?= $row['deskripsiprofil']; ?></span>
                  </div>
                
              </div>
              <div class="mt-2">

                  <a class="btn btn-primary btn-sm" href="/infoperusahaan/editinfo/<?= $row['id']; ?>" role="button"> EDIT</a>
                    <form action="/infoperusahaan/delete/<?= $row['id']; ?>" method="post" class="d-inline">
                        <input type="hidden" name="_method" value="DELETE" >
                        <button type="submit" class="btn btn-danger btn-sm">Hapus Data</button>
                    </form>
              </div>
            </div>
        </section>
        <?php
      endforeach;
      ?>
        
        <div class="container px-5 my-5">

<a class="btn btn-primary btn-sm" href="/infoadmin/tambahInfo" role="button"> Tambah Data</a>
</div>

            <!-- About section two-->
      <!-- <section class="py-5">
          <div class="container px-5 my-5">
              <div class="row gx-5 align-items-center">
                  <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                  <div class="col-lg-6">
                      <h2 class="fw-bolder"></h2>
                      <p class="lead fw-normal text-muted mb-0">  </p>
                  </div>
              </div>
          </div>
      </section> -->
            <!-- Team members section-->
    
        </main>

<?= $this->endSection(); ?>