<?= $this->extend('template/template.php'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
 
<div class="card h-100">
           <div class="card-body">
           <div class="font-weight-bold display-6 mb-4">Tambah Data Brosur</div>
  <form action="/brosur/insertBrosur" method="post" enctype="multipart/form-data">
   <?= csrf_field(); ?>
  <div class="row mb-3">
    <label for="nama" class="col-sm-2 col-form-label" >Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" >
    </div>
  </div>

  <div class="row mb-3">
    <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="deskripsi"  name="deskripsi" rows="3" ></textarea>   
  </div>

  <div class="row mb-3 mt-3">
        <label for="foto" class="col-sm-2 col-form-label custom-file-label" >Gambar Brosur</label>
        <div class="col-sm-2">
          <img src="" class="img-thumbnail img-preview" alt="...">
        </div>

        <div class="col-sm-8">
          <input type="file" class="form-control" id="foto" name="foto" onchange="previewImg()">
        </div>
      </div>
  </div>
  
  
</div>
</div>
<!-- Button Update Data -->
<div class="text-end mt-3">

    <button type="submit" class="btn btn-primary">Tambah Data</button>
</div>
<!-- End Button Data -->    </form>
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