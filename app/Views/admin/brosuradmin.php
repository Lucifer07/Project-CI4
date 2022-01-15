<?php
$this->extend('template/template'); 

$this->section('content');

?>

<header class=" py-5 mb-5" style="background-color:#000080">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder"><?= $heading ?></h1>
                    <p class="lead fw-normal text-white-50 mb-0">Segala bentuk informasi, reparasi dan pemasangan mohon Hubungi Kami.</p>
                </div>
            </div>
        </header>


<div class=" my-5  container" >
  

  <div class="row  ">
 
 
        <?php foreach($brosurnuansa as $row): ?>
        <?php
        $des=$row['deskripsi'];
          if(strlen($row['deskripsi'])>125){
            $des=substr($row['deskripsi'],0,124)." ...";

          }
        ?>
          <div class="card mb-3 " style="max-width: 540px;margin-left:10px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="/img/<?= $row['foto'] ?>" class="img-fluid rounded-start" alt="...">
              </div>
              
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?= $row['nama'] ?></h5>
                  <p class="card-text"><?= $des ?></p>
                  <div class="card-footer">
                    <p class="card-text"><small class="text-muted">Author : <?= $row['author'] ?></small></p>

                    <div class="text-left"><a class="btn btn-outline-primary mt-auto" href="/dbrosur/download/<?= $row['id'] ?>">Download Brosur</a></div>
                    <a class="btn btn-warning editbrosur" href="/brosuradmin/editbrosur/<?= $row['id'] ?>">Edit</a>
                    <form action="/brosur/deleteBrosur/<?=$row['id']; ?>" id="formhapus" method="post" class="d-inline hapusBrosur">
                    <?= csrf_field(); ?>
                      <input type="hidden" name="_method" id="idbrosur" value="DELETE">
                      <button type="submit" id="remove" class="btn btn-danger" > Hapus Data</button>                 
                    </form>

                  </div>
                  
                </div>
                
              </div>
            </div>
          </div>
          <?php endforeach ?>

              

          </div>
          <a class="btn btn-primary btn-sm mb-5" href="/brosur/tambahBrosur" role="button">Tambah Brosur</a>

</div>
<script>
  $('.hapusBrosur').submit(function(e){
          e.preventDefault();
          var id =  $(this).data('id');
        
          Swal.fire({
          title: 'Apakah Anda Yakin ?',
          text: "Anda tidak bisa Mengulangi data ini lagi !",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Hapus Data',
          closeOnConfirm: false,

          closeOnCancel: false
          }).then((result) => {
          if (result.isConfirmed) {
              $.ajax({
                  type: 'DELETE',
                  url: $(this).attr('action'),
                  data: {id:id},
                  success: function() {
                      Swal.fire({
                  icon: 'success',
                  title: 'Data Brosur Berhasil Dihapus !',
                  showConfirmButton: false
                    });                                               
                    setTimeout(function(){// wait for 5 secs(2)
                          location.reload(); // then reload the page.(3)
                      }, 1000); 
                  }
              });
              
          }else{
              Swal.fire(
              'Cancelled',
              'File anda masih aman',
              'error'
              )
          }
          })
      })
</script>

<?php 
$this->endSection();
?> 
