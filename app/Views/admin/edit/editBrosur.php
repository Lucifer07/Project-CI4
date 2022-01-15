<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
 
 <div class="row">
  <div class="col-8">
  <div class="display-5">Form Ubah Data Brosur </div>
  <form action="/brosur/updateBrosur/<?= $brosurnuansa['id'] ?>" method="post" enctype="multipart/form-data">
   <?= csrf_field(); ?>
   <input type="hidden" name="id" value="<?= $brosurnuansa['id']; ?>">
   <input type="hidden" name="fotoBrosurLama" value="<?= $brosurnuansa['foto']; ?>">
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label" >Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="namaproduk" name="namaproduk" value="<?= $brosurnuansa['nama']; ?>">
    </div>
  </div>
  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="deskripsi"  name="deskripsi" rows="3" ><?= $brosurnuansa['deskripsi']; ?></textarea>   
   </div> 
  </div>
    <div class="row mb-3 form-group">
    <label for="fotobrosur" class="col-sm-2 col-form-label custom-file-label" >Foto Pekerjaan</label>

    <div class="col-sm-2">
        <img src="/img/<?= $brosurnuansa['foto']; ?>" class="img-thumbnail img-preview" alt="...">
      </div>
      <div class="col-sm-8">

      <input type="file" class="form-control" name="fotoBrosurBaru" id="fotobrosur" onchange="previewImg()">
      </div>
  </div>

 
  <button type="submit" class="btn btn-primary">Update Data</button>
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
    const foto = document.querySelector('#fotobrosur');
    const imgpreview = document.querySelector('.img-preview');
    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);
    fileFoto.onload = function(e){
      imgpreview.src = e.target.result;
    }
  }
</script>
<?= $this->endSection(); ?>