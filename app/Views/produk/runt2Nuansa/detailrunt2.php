<?php $this->extend('template/template');?>
<?php $this->section('content');?>
<?php 
  $harga = "Rp " . number_format($produk['harga'],2,',','.');
  ?>
<section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/img/<?= $produk['foto']; ?>" alt="..." /></div>
                    <div class="col-md-6">
                        <h1 class="display-5 fw-bolder"><?php echo $produk['nama']?></h1>
                        <div class="fs-5 mb-5">
                            <span class="font-weight-bold">Harga : <?= $harga  ?></span>
                        </div>
                        <p class="lead"><?= $produk['deskripsi'] ?></p>

                        <?php
                        $status = $produk['stok'];
                        $desstatus="";
                        if($status >0 ){
                         $desstatus .= "<p class='text-success lead '><span class='text-black'>Stok :</span>  Tersedia </p>";
                        }else{
                         $desstatus .= "<p class='text-danger lead'><span class='text-black'>Stok :</span> Barang Habis </p>";
                        }
                        ?>
                        <p class="lead">Ukuran : <?= $produk['ukuran']  ?> </p>
                        <p class="lead">Type : 2 Sisi </p>
                         <?= $desstatus  ?> 
                        
                        <div class="d-flex">
                                <a href="https://api.whatsapp.com/send?phone=6282145554374" target="_blank" class="btn btn-primary flex-shrink-0 text-decoration-none text-white" >Hubungi Kami</a>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="my-1">
   <p>Note :  </p>
   <p >
   - Customer akan mendapatkan pelatihan Singkat Mengenai Program Running Text/<br>
- Include Kabel Power +/- 5 Meter, Jika ada kelebihan dikenakan Biaya 7.000/m.<br>
- Untuk Pemasangan Indoor tidak dikenakan biaya tambahan.<br>
- Tersedia ukuran dan resolusi lainnya, Sesuai dengan permintaan<br>
- Garansi diberikan 6 bulan Full.<br>
   </p>
   </div>
            </div>
            
        </section>
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                     <?php
                     foreach($runtModelR as $row):
                     ?>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="/img/<?= $row['foto']; ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $row['nama']; ?></h5>
                                    <!-- Product price-->
                                    <?php
                                      $hargarelasi = "Rp " . number_format($row['harga'],2,',','.');

                                    ?>
                                    <?= $hargarelasi; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/Produk/detailcctv2/<?= $row['id'] ?>">Lihat Paket</a></div>
                            </div>
                        </div>
                    </div>
                        <?php
                        endforeach;
                        ?>
                   
                   
                   
                </div>
            </div>
        </section>
<?php $this->endSection();?>