<?= $this->extend('template/template') ;?>
<?= $this->section('content') ;?>
<!-- CODE HERE -->

<div class="container my-5">
<form action="/brand/updateBrand/<?= $brands['id']; ?>" method="post" enctype="multipart/form-data">
  <?= csrf_field(); ?>
<div class="row mb-3 form-group">
      <label for="fotopekerjaan" class="col-sm-2 col-form-label custom-file-label" >Gambar Brand</label>
      <div class="col-sm-2">
        <img src="/img/<?= $brands['foto']; ?>" class="img-thumbnail img-preview" alt="...">
      </div>

      <div class="col-sm-8">
        <input type="file" class="form-control" id="gambarbrand" name="gambarbrand" onchange="previewImg()">
      </div>
    </div>

 
  <button type="submit" class="btn btn-primary">Tambah Brand</button>
</form>
</div>
<script>
  function previewImg(){
    const foto = document.querySelector('#gambarbrand');
    const imgpreview = document.querySelector('.img-preview');
    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);
    fileFoto.onload = function(e){
      imgpreview.src = e.target.result;
    }
  }
</script>

<?= $this->endSection() ;?>