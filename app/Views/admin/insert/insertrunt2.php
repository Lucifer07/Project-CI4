<?= $this->extend('template/template.php'); ?>

<?= $this->section('content'); ?>

<div class="container my-5">
<div class="card h-100">
           <div class="card-body">
           <div class="font-weight-bold display-6 mb-4">Tambah Data Running Text</div>


<form action="<?= base_url('/Produkrunt/insertrunt2'); ?>" method="post" id="insertrunt" enctype="multipart/form-data"> 
 <?= csrf_field(); ?>
  <div class="row mb-3">
    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama ">
    </div>
  </div>
  <div class="row mb-3">
    <label for="harga" class="col-sm-2 col-form-label">Harga</label>
    <div class="col-sm-10">
      <input type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga ">
    </div>
  </div>
  <div class="row mb-3">
    <label for="Ukuran" class="col-sm-2 col-form-label" >Ukuran Produk</label>
    <div class="col-sm-10">

    
    <select name="ukuran" class="form-select " aria-label="Default select example">
    <option selected>-</option>
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
    <label for="stok" class="col-sm-2 col-form-label">Stok</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok">
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
        <img src="/img/nuansa.png" class="img-thumbnail img-preview" alt="...">
      </div>

      <div class="col-sm-8">
        <input type="file" class="form-control" id="foto" name="foto" onchange="previewImg()">
      </div>
    </div>
    <!-- End Add Gambar Produk -->
   <!-- Button Update Data -->
   

  </div>
 </div>
 <div class="text-end mt-3">

<button type="submit" class="btn btn-primary">Tambah Data</button>
</div>
<!-- End Button Data -->
</form>
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
 