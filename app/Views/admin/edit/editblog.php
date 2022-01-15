<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
 
 <div class="row">
  <div class="col-8">
    <div class="display-5">Form Edit Data Blog </div>
    <form action="/blog/updateBlog/<?= $blog['id'] ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= $blog['id']; ?>">
    <input type="hidden" name="fotopekerjaanlama" value="<?= $blog['fotopekerjaan']; ?>">
    <div class="row mb-3">
      <label for="namapekerjaan" class="col-sm-2 col-form-label" >Judul</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="namapekerjaan" name="namapekerjaan" value="<?= $blog['namapekerjaan']; ?>">
      </div>
    </div>
    <div class="row mb-3 form-group">
      <label for="fotopekerjaan" class="col-sm-2 col-form-label custom-file-label" >Foto Pekerjaan</label>
      <div class="col-sm-2">
        <img src="/img/<?= $blog['fotopekerjaan']; ?>" class="img-thumbnail img-preview" alt="...">
      </div>

      <div class="col-sm-8">
        <input type="file" class="form-control" id="fotopekerjaan" name="fotopekerjaan" onchange="previewImg()">
      </div>
    </div>
  <!-- <div class="input-group">

      <input type="file" name="fotopekerjaan" id="fotopekerjaan" class="form-control" placeholder="Input group example" aria-label="Input group example" aria-describedby="btnGroupAddon " >
    </div> -->
  
  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="deskripsi"  name="deskripsi" rows="6" ><?= $blog['deskripsi']; ?></textarea>   
   
   </div>
  </div>

  <div class="row">
    <div class="col-10">

      </div>
      <div class="col-2">

        <button type="submit" class="btn btn-sm btn-primary ">Update Data</button>
      </div>

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
    const foto = document.querySelector('#fotopekerjaan');
    const imgpreview = document.querySelector('.img-preview');
    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);
    fileFoto.onload = function(e){
      imgpreview.src = e.target.result;
    }
  }
</script>
<?= $this->endSection(); ?>