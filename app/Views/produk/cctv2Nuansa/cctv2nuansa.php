<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<header class=" py-5 mb-5" style="background-color:#000080">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Nuansa CCTV Produk</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Segala bentuk informasi, reparasi dan pemasangan mohon Hubungi Kami.</p>
                </div>
            </div>
        </header>
<div class="container my-5">

<div class="row">
		
		<div class="col-lg-1">

		</div>

		<div class="col-lg-11">
      <?php foreach($cctv2Model as $row): ?>
        <?php 
              $harga = "Rp " . number_format($row['harga'],2,',','.');
              if ($row['stok'] > 0 ){
                $row['status'] = '<p class="card-text text-success">Stok : Tersedia</p>';
              }else{
                $row['status'] = '<p class="card-text text-danger">Stok : Stok Habis</p>';
              } 
              
              ?>
            <div class="card d-inline-block mt-2  " style="width: 22rem;margin-left:10px">
              
              <img class="card-img-top " src="/img/<?= $row['foto'] ?>" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"><?= $row['nama'] ?></h5>
                <p class="card-text">Harga : <?= $harga ?></p>
                <?= $row['status'] ?>
                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-primary mt-auto" href="/Produk/detailcctv2/<?= $row['id'] ?>">Detail Paket</a></div>
                            </div>
              </div>  
            </div>
            <?php endforeach ?>
            </div>
        </div>
 
  

<?= $this->endSection(); ?>