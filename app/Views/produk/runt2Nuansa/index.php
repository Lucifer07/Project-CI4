<?php 
$this->extend('template/template');

$this->section('content');
?>
<div class="container-lg my-5 container-md container ">
 
 <div class="row">
  <div class="col-lg-1">
   
   </div>
   <div class="col-lg-11">
    <?php foreach($produkrunt as $row): ?>
    <?php 
          $harga = "Rp " . number_format($row['harga'],2,',','.');
          if ($row['stok'] > 0 ){
            $row['status'] = '<p class="card-text text-success">Stok : Tersedia</p>';
          }else{
            $row['status'] = '<p class="card-text text-danger">Stok : Stok Habis</p>';
          } 
          
          ?>
        <div class="card d-inline-block mt-2  " style="width: 22rem;">
          
          <img class="card-img-top " src="/img/<?= $row['foto'] ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?= $row['nama']?></h5>
            <p class="card-subtitle mb-2 text-muted">Ukuran : <?= $row['ukuran'] ?></p>
            <p class="card-text">Harga : <?= $harga ?></p>
            <?= $row['status'] ?>
            <a href="/Produkrunt/detailrunt2/<?= $row['id'] ?>" class="btn btn-primary">Detail Paket</a>
            <br>
            <div class="mt-2">

             
            </div>
          </div>  
        </div>

        <?php endforeach ?>
        </div>
  </div>
  <!-- Button Tambah Data -->
  
    <!-- Button Tambah Data -->

</div>


<?php $this->endSection();?>