<?php

$this->extend('template/template');
$this->section('content');

?>

<header class=" py-5 mb-5" style="background-color:#000080">
  <div class="container px-4 px-lg-5 my-5">
      <div class="text-center text-white">
          <h1 class="display-4 fw-bolder"><?= $heading ?></h1>
          <p class="lead fw-normal text-white-50 mb-0">Segala bentuk informasi, reparasi dan pemasangan mohon Hubungi Kami.</p>
      </div>
  </div>
</header>


<div class=" my-5  container-lg container-sm container-md container-xl" >
  <div class="row  ">
 
 
        <?php foreach($brosurnuansa as $row): ?>
        <?php
        $des=$row['deskripsi'];
          if(strlen($row['deskripsi'])>125){
            $des=substr($row['deskripsi'],0,124)." ...";

          }
        ?>
      <div class="card mb-3 " style="max-width: 540px;margin-left:10px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="/img/<?= $row['foto'] ?>" class="img-fluid rounded-start" alt="...">
          </div>

              <div class="col-md-8">
              <div class="card-body">
              <h5 class="card-title"><?= $row['nama'] ?></h5>
              <p class="card-text"><?= $des ?></p>
              <div class="card-footer">
              <p class="card-text"><small class="text-muted">Author : <?= $row['author'] ?></small></p>

              <div class="text-left"><a class="btn btn-outline-primary mt-auto" href="/brosur/download/<?= $row['id'] ?>">Download Brosur</a></div>
            </div>
          </div>
        </div>
      </div>
      </div>

        <?php endforeach ?>
  </div>
</div>

<?php 
$this->endSection();
?>