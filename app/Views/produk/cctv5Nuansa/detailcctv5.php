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
                            <span><?= $harga  ?></span>
                        </div>
                        <p class="lead"><?= $produk['deskripsi'] ?></p>
                        <div class="d-flex">
                            <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                            <button class="btn btn-outline-dark flex-shrink-0" type="button">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="my-1">
   <p>Note :  </p>
   <p >
- Kelebihan Pemakaian Kabel Coaxial dikenakan biaya 7.000/m Setiap Paket* <br>
- Kabel LAN untuk Online Max 5m, Kelebihan dikenakan biaya 10.000/m <br>
- Monitor 22" Tambah Rp 1.200.000 (Opsional)<br>
- Include Setting Online di Handphone (Free)<br>
- Pemasangan Standard tanpa Pipa / Gali / Bobok ( Jika Ada dikenakan biaya tambahan )<br>
   </p>
   </div>
            </div>
            
        </section>
        <section class="py-5 bg-light">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="fw-bolder mb-4">Related products</h2>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                     <?php
                     foreach($cctv5Model as $row):
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

                                    ?>;
                                    <?= $hargarelasi; ?>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="/Produk/detailcctv5/<?= $row['id'] ?>">Lihat Paket</a></div>
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