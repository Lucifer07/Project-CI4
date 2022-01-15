<?php 
$this->extend('template/template');

$this->section('content');
?>
<div class="container-lg my-5 container-md container ">
 
 <div class="row">
  <div class="col-lg-1">
   
   </div>
   <div class="col-lg-11">
    <?php foreach($produkrunt as $row): ?>
    <?php 
          $harga = "Rp " . number_format($row['harga'],2,',','.');
          if ($row['stok'] > 0 ){
            $row['status'] = '<p class="card-text text-success">Stok : Tersedia</p>';
          }else{
            $row['status'] = '<p class="card-text text-danger">Stok : Stok Habis</p>';
          } 
          
          ?>
        <div class="card d-inline-block mt-2  " style="width: 22rem;">
          
          <img class="card-img-top " src="/img/<?= $row['foto'] ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?= $row['nama']?></h5>
            <p class="card-subtitle mb-2 text-muted">Ukuran : <?= $row['ukuran'] ?></p>
            <p class="card-text">Harga : <?= $harga ?></p>
            <?= $row['status'] ?>
            <a href="/Produkrunt/detailrunt2/<?= $row['id'] ?>" class="btn btn-primary">Detail Paket</a>
            <br>
            <div class="mt-2">

             <a href="/Produkrunt/editrunt/<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
             <form action="/Produkrunt/deleterunt/<?= $row['id']; ?>" method="post" class="d-inline hapusdatarunt">
              <?= csrf_field(); ?>
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn btn-danger">Hapus Data</button>
             </form>
            </div>
          </div>  
        </div>

        <?php endforeach ?>
        </div>
  </div>
  <!-- Button Tambah Data -->
  <div class="row mt-3">
    <div class="col-lg-1">

    </div>
    <div class="col-lg-11">
    <a class="btn btn-primary btn-sm" href="/Produkrunt/tambahrunt" role="button"> Tambah Data</a>

    </div>
  </div>
    <!-- Button Tambah Data -->

</div>

<script>
  $('.hapusdatarunt').submit(function(e){
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
                  title: 'Data Produk Berhasil Dihapus !',
                  showConfirmButton: false
                    });                                               
                    setTimeout(function(){// wait for 1 secs(2)
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
<?php $this->endSection();?>