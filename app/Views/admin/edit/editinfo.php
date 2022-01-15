<?= $this->extend('template/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
 
<div class="card h-100">
           <div class="card-body">
           <div class="font-weight-bold display-6 mb-4">Update Data Info Perusahaan</div>
  <form action="/infoperusahaan/updateInfo/<?= $info['id'] ?>" method="post" enctype="multipart/form-data">
   <?= csrf_field(); ?>
   <input type="hidden" name="id" value="<?= $info['id']; ?>">
   <input type="hidden" name="gambarlama" value="<?= $info['foto2']; ?>">
  <div class="row mb-3">
    <label for="headingprofil" class="col-sm-2 col-form-label" >Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="headingprofil" name="headingprofil" value="<?= $info['headingprofil']; ?>">
    </div>
  </div>
  
  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="deskripsi"  name="deskripsi" rows="3" ><?= $info['deskripsiprofil']; ?></textarea>   
   
   </div>
  </div>
  <div class="row mb-3 form-group">
      <label for="gambarinfo" class="col-sm-2 col-form-label custom-file-label" >Foto Pekerjaan</label>
      <div class="col-sm-2">
        <img src="/img/<?= $info['foto2']; ?>" class="img-thumbnail img-preview" alt="...">
      </div>
      <div class="col-sm-8">
        <input type="file" class="form-control" id="gambarinfo" name="gambarinfo" onchange="previewImg()">
      </div>
    </div>
  
<!-- Button Update Data -->
</div>
</div>
<div class="text-end mt-3">

<button type="submit" class="btn btn-primary">Update Data</button>
</div>
<!-- End Button Data --></form>
</div>

<script>
ClassicEditor
  .create(document.querySelector('#deskripsi'));
</script>
<script>
  function previewImg(){
    const foto = document.querySelector('#gambarinfo');
    const imgpreview = document.querySelector('.img-preview');
    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);
    fileFoto.onload = function(e){
      imgpreview.src = e.target.result;
    }
  }
</script>

<?= $this->endSection(); ?>