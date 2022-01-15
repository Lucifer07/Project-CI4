<?= $this->extend('template/template.php'); ?>

<?= $this->section('content'); ?>

<div class="container my-5">
   <div class="card h-100">
           <div class="card-body">

<form action="<?= base_url('/Produk/insertcctv2'); ?>" method="post" enctype="multipart/form-data"> 
 <?= csrf_field(); ?>
  <div class="row mb-3">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama">
    </div>
  </div>
  <div class="row mb-3">
    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="harga" name="harga">
    </div>
  </div>
  <div class="row mb-3">
    <label for="stok" class="col-sm-2 col-form-label">Stok</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="stok" name="stok">
    </div>
  </div>
 

  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
    <textarea class="form-control" placeholder="Masukkan Deskripsi " name="deskripsi" id="deskripsi" style="height: 100px"></textarea>    </div>
  </div>
  <!-- Add Gambar Produk -->
  <div class="row mb-3 form-group">
      <label for="foto" class="col-sm-2 col-form-label custom-file-label" >Foto Pekerjaan</label>
      <div class="col-sm-2">
        <img src="" class="img-thumbnail img-preview" alt="...">
      </div>

      <div class="col-sm-8">
        <input type="file" class="form-control" id="foto" name="foto" onchange="previewImg()">
      </div>
    </div>
    <!-- End Add Gambar Produk -->
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Tambah Data</button>
    </div>
</form>
           </div>
           
         </div>
 



</div>
<script>
ClassicEditor
  .create(document.querySelector('#deskripsi'));
</script>
<script>
  function previewImg(){
    const foto = document.querySelector('#foto');
    const imgpreview = document.querySelector('.img-preview');
    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);
    fileFoto.onload = function(e){
      imgpreview.src = e.target.result;
    }
  }
</script>

<?= $this->endSection(); ?>
 