
<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>

<?php
if(session()->get('useradmin')){
    

?>
<section class="py-5" >
                <div class="container px-5" >
                    <!-- Contact form-->
                    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-2">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="fa fa-info-circle"></i></div>
                            <h1 class="fw-bolder">Informasi Kontak</h1>
                            <?php
                            foreach($kontak as $row):
                            ?>
                            <a href="https://www.google.com/maps/dir//nuansa+inti+persada/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x2dd240b1048b42e3:0x9f3f3a69c0937ea8?sa=X&ved=2ahUKEwia96aQscr0AhUIUWwGHVHdCFEQ9Rd6BAhHEAU" target="_blank" class="lead fw-normal text-muted mb-0"><?= $row['alamat']; ?></a>
                            <p class="lead fw-normal text-muted mb-3"><?= $row['email']; ?></p>
                            <?php
                            endforeach;
                            ?>
                            <p class="lead fw-normal text-muted mb-0">Berkomunikasi via WA , Telpon, dan SMS.</p>
                            <br>
                            <a class="btn btn-warning " href="https://api.whatsapp.com/send?phone=<?= $row['nomor']; ?>" target="_blank" > Hubungi Kami</a>
                     s
                        </div>
                    </div>
                    <!-- Contact cards-->
                </div>
            </section>
        <?php
}else{


        ?>
<section class="py-5" >
                <div class="container px-5" >
                    <!-- Contact form-->
                    <div class="rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-2">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="fa fa-info-circle"></i></div>
                            <h1 class="fw-bolder">Informasi Kontak</h1>
                            <?php
                            foreach($kontak as $row):
                            ?>
                            <a href="https://www.google.com/maps/dir//nuansa+inti+persada/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x2dd240b1048b42e3:0x9f3f3a69c0937ea8?sa=X&ved=2ahUKEwia96aQscr0AhUIUWwGHVHdCFEQ9Rd6BAhHEAU" target="_blank" class="lead fw-normal text-muted mb-0"><?= $row['alamat']; ?></a>
                            <p class="lead fw-normal text-muted mb-3"><?= $row['email']; ?></p>
                            <?php
                            endforeach;
                            ?>
                            <p class="lead fw-normal text-muted mb-0">Berkomunikasi via WA , Telpon, dan SMS.</p>
                            <br>
                            <a class="btn btn-warning " href="https://api.whatsapp.com/send?phone=<?= $row['nomor']; ?>" target="_blank" > Hubungi Kami</a>
                     
                        </div>
                    </div>
                    <!-- Contact cards-->
                </div>
            </section>
<?php
}
?>
<?= $this->endSection(); ?>