<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<header class=" py-5 mb-5" style="background-color:#000080">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Nuansa CCTV Produk</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Segala bentuk informasi, reparasi dan pemasangan mohon Hubungi Kami.</p>
                </div>
            </div>
        </header>
								
	<div class="container-lg container-md container-sm my-5 container ">

	<div class="row">
		
		<div class="col-lg-1">

		</div>

		<div class="col-lg-11">

      <?php foreach($cctv2Model as $row): ?>
        <?php 
              $harga = "Rp " . number_format($row['harga'],2,',','.');
              if ($row['stok'] > 0 ){
                $row['status'] = '<p class="card-text text-success">Stok : Tersedia</p>';
              }else{
                $row['status'] = '<p class="card-text text-danger">Stok : Stok Habis</p>';
              } 
              
              ?>
            <div class="card d-inline-block mt-2  " style="width: 22rem;">
              
              <img class="card-img-top " src="/img/<?= $row['foto'] ?>" alt="Card image cap" height="250">
				<div class="card-body">
					<h5 class="card-title"><?= $row['nama'] ?></h5>
					<p class="card-text">Harga : <?= $harga ?></p>
					<?= $row['status'] ?>
					<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
						<div class="text-center"><a class="btn btn-outline-primary mt-auto" href="/Produk/detailcctv2/<?= $row['id'] ?>">Detail Paket</a></div>
						
							
								<div class="text-center mt-2">
									<a class="btn btn-warning d-inline btn-md" href="/Produk/editcctv2/<?= $row['id'] ?>">Edit</a>
								
								
									<form action="/Produk/deletecctv/<?= $row['id']; ?>" method="post" class="hapuscctv2 d-inline">
										<?= csrf_field(); ?>
										<input type="hidden" name="_method" value="DELETE" >
         	<button type="submit" id="hapusberita" class="btn btn-danger btn-md" >Hapus Produk</button>
									</form>
									</div>
						
					</div>
				</div>  
            </div>
            <?php endforeach ?>
												
											</div>
										</div>
										<div class="row mt-3">
            <div class="col-lg-1">
              
            </div>
            <div class="col-lg-11">

              <a class="btn btn-primary btn-sm" href="/Produk/tambahcctv2" role="button"> Tambah Data</a>
            </div>
          </div>
									</div>

<script>
  $('.hapuscctv2').submit(function(e){
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
<?= $this->endSection(); ?>