<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
 
<div class="card h-100">
           <div class="card-body">
  <div class="font-weight-bold display-6 mb-4">Update Data Running Text 1 Sisi</div>
  <form action="/Produkrunt/updateRunt/<?= $produkrunt['id'] ?>" method="post" enctype="multipart/form-data">
   <?= csrf_field(); ?>
   <input type="hidden" name="id" value="<?= $produkrunt['id']; ?>">
   <input type="hidden" name="gambarproduklama" value="<?= $produkrunt['foto']; ?>">
  <div class="row mb-3">
    <label for="nama" class="col-sm-2 col-form-label" >Nama Produk</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" value="<?= $produkrunt['nama']; ?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="Ukuran" class="col-sm-2 col-form-label" >Ukuran Produk</label>
    <div class="col-sm-10">

    
    <select name="ukuran" class="form-select " aria-label="Default select example">
    <option selected><?= $produkrunt['ukuran'];?></option>
      <option value="68 X 20 CM">68 X 20 CM</option>
      <option value="100 X 20 CM">100 X 20 CM</option>
      <option value="132 X 20 CM">132 X 20 CM</option>
      <option value="164 X 20 CM">164 X 20 CM</option>
      <option value="196 X 20 CM">196 X 20 CM</option>
      <option value="228 X 20 CM">228 X 20 CM</option>
      <option value="260 X 20 CM">260 X 20 CM</option>
      <option value="292 X 20 CM">292 X 20 CM</option>
    </select>
    </div>
  </div>
  <div class="row mb-3">
    <label for="stok" class="col-sm-2 col-form-label" >Stok</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="stok" name="stok" value="<?= $produkrunt['stok']; ?>">
    </div>
  </div>

  <div class="row mb-3">
    <label for="harga" class="col-sm-2 col-form-label" >Harga</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="harga" name="harga" value="<?= $produkrunt['harga']; ?>">
    </div>
  </div>

  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="deskripsi"  name="deskripsi" rows="3" ><?= $produkrunt['deskripsi']; ?></textarea>   
   </div>
  </div>
  
  <div class="row mb-3 form-group">
      <label for="foto" class="col-sm-2 col-form-label custom-file-label" >Foto Produk</label>
      <div class="col-sm-2">
        <img src="/img/<?= $produkrunt['foto']; ?>" class="img-thumbnail img-preview" alt="...">
      </div>

      <div class="col-sm-8">
        <input type="file" class="form-control" id="foto" name="foto" onchange="previewImg()">
      </div>
    </div>
    </div>
 </div>
 <!-- Button Update Data -->
    <div class="text-end mt-3">

      <button type="submit" class="btn btn-primary">Update Data</button>
    </div>
    <!-- End Button Data -->
</form>
  
</div>



<?= $this->endSection(); ?>