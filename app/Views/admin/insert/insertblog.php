<?= $this->extend('template/template.php'); ?>

<?= $this->section('content'); ?>

<div class="container my-5">
<div class="card h-100">
           <div class="card-body">
           <div class="font-weight-bold display-6 mb-4">Tambah Data Blog</div>
      
    <form action="/blog/insertBlog" method="post"  enctype="multipart/form-data">
    <?= csrf_field(); ?>

    <div class="mb-3">
    <label for="namapekerjaan" class="form-label">Nama Pekerjaan</label>
    <input type="text" name="namapekerjaan" id="namapekerjaan" class="form-control "  >
  </div>

    <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi Pekerjaan</label>
    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
  </div>
  <div class="row mb-3 form-group">
      <label for="fotopekerjaan" class="col-sm-2 col-form-label custom-file-label" >Foto Pekerjaan</label>
      <div class="col-sm-2">
        <img src="/img/cisco.png" class="img-thumbnail img-preview" alt="...">
      </div>

      <div class="col-sm-8">
        <input type="file" class="form-control" id="fotopekerjaan" name="fotopekerjaan" onchange="previewImg()">
      </div>
    </div>
  
  <button type="submit" class="btn btn-primary btnupload">Kirim</button>
</form>
    </div>
  </div>
</div>

<div class="loading"></div>
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
<script>

// $(document).ready(function(){
  
//   $(".formblog").submit(function(e){
//     var namapekerjaan= $("#namapekerjaan").val();
//     var foto = document.getElementById("fotopekerjaan").files[0].name; 
//     var deskripsi= $("#deskripsi").val();
//     let form =$('.formblog')[0];
//     let data = new FormData(form);
//   e.preventDefault();
//   // FormData object 
//   $.ajax({
//     type: "post",
//     url:$(this).attr('action'),
//     dataType: 'json',
//     enctype: 'multipart/form-data',
//     data:$(this).serialize(),
//       success:function(){
//       alert("berhasil");
//     }
//   })
  
//   })
// });


</script>

<?= $this->endSection(); ?>
 