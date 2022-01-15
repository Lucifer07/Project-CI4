<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
 
 <div class="row">
  <div class="col-8">
  <div class="display-5">Form Ubah Data Layanan </div>
  <form action="/Home/updateLayanan/<?= $homeProduk['id'] ?>" method="post">
   <?= csrf_field(); ?>
   <input type="hidden" name="id" value="<?= $homeProduk['id']; ?>">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label" >Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namaproduk" name="namaproduk" value="<?= $homeProduk['namaproduk']; ?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="deskripsi"  name="deskripsi" rows="3" ><?= $homeProduk['deskripsi']; ?></textarea>   
   
   </div>
  </div>
  
  
  <button type="submit" class="btn btn-primary">Ubah Data</button>
</form>
  </div>
 </div>
</div>

<script>
ClassicEditor
  .create(document.querySelector('#deskripsi'));
</script>

<?= $this->endSection(); ?>