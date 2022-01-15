<?= $this->extend('template/template.php'); ?>

<?= $this->section('content'); ?>
<div class="container my-5">
 
 <div class="row">
  <div class="col-8">
  <div class="display-5">Form Tambah Data Layanan </div>
  <form action="/infoadmin/insertInfo" method="post" enctype="multipart/form-data">
   <?= csrf_field(); ?>
  <div class="row mb-3">
    <label for="headingprofil" class="col-sm-2 col-form-label" >Judul</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="headingprofil" name="headingprofil" >
    </div>
  </div>
  <div class="row mb-3">
    <label for="deskripsiprofil" class="col-sm-2 col-form-label">Deskripsi</label>
    <div class="col-sm-10">
    <textarea class="form-control" id="deskripsiprofil"  name="deskripsiprofil" rows="3" ></textarea>   
      </div>
  </div>

  <div class="mb-3">
    <label for="foto2" class="form-label" >Foto Pekerjaan</label>
    <input type="file" name="foto2" id="foto2" required>
    <div class="text-danger errorfoto"></div>
  </div>

  <select name="posisi" class="form-select" aria-label="Default select example">
   <option selected>Pilih Posisi Gambar</option>

    <option value="kiri">Kiri</option>
    <option value="kanan">Kanan</option>
  </select>
  
  
  <button type="submit" class="btn btn-primary">Tambah Data</button>
</form>
  </div>
 </div>
</div>



<?= $this->endSection(); ?>