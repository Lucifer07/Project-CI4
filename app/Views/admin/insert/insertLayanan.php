<?= $this->extend('template/template.php'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
 
 <div class="row">
  <div class="col-8">
  <div class="display-5">Form Tambah Data Layanan </div>
  <form action="/Home/insertLayanan" method="post">
   <?= csrf_field(); ?>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label" >Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namaproduk" name="namaproduk" >
    </div>
  </div>
  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="deskripsi"  name="deskripsi" rows="5" ></textarea>   
   
   </div>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Tambah Data</button>
</form>
  </div>
 </div>
</div>
<script>
ClassicEditor
  .create(document.querySelector('#deskripsi'));
</script>


<?= $this->endSection(); ?>