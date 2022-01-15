<?php 
$this->extend('template/template');
$this->section('content');

?>
 <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                <h1 class="fw-bolder">Berita Pekerjaan</h1>
                    <p class="lead mb-0">Berita Pekerjaan Nuansa Inti Persada</p>
                </div>
            </div>
        </header>

<div class="container my-5">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                    <?php foreach($blogModel as $row): ?>
                    <?php 
                    $date = date_create($row['created_at']);
                    $blogtgl = date_format($date,'d, M Y ');
                    ?>
                        <div class="col-lg-6">
                        <div class="card mb-4">
                                <a href="#!"><img class="card-img-top" src="/img/<?= $row['fotopekerjaan'] ?>" alt="..." /></a>
                                <div class="card-body">
                                    <div class="small text-muted"><?= $blogtgl; ?></div>
                                    <h2 class="card-title h4"><?= $row['namapekerjaan'] ?></h2>
                                    <?php
                                    $desbaru = "";
                                    if(strlen($row['deskripsi']) >10){

                                      $desbaru = substr($row['deskripsi'],0,80) ."...";
                                      if(strlen($row['deskripsi']) >80){
                                        $desbaru = substr($row['deskripsi'],0,80) ."...";
                                      }
                                    }
                                    ?>
                                    <p class="card-text"><?= $desbaru ?></p>
                                    <a class="btn btn-primary" href="/blog/detail/<?= $row['id'] ?>">Lihat Berita →</a>
                                    <br>
                                    <div class="mt-2">

                                        <a class="btn btn-warning btn-sm " href="/blog/editBlog/<?= $row['id']; ?>" role="button"> EDIT</a>
                                        <form action="/blog/delete/<?= $row['id']; ?>" method="post" class="d-inline hapusBerita">
                                            <input type="hidden" name="_method" value="DELETE" >
                                            <button type="submit" id="hapusberita" class="btn btn-danger btn-sm" >Hapus Berita</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                    
                            
                        </div>
                        <?php endforeach ?>
                        <?= $pager->links('homemodel','blog_pagination') ?>
                        <div class="container">
                        <a class="btn btn-primary btn-sm mb-5" href="/blog/tambahBlog" role="button">Tambah Dokumentasi Pekerjaan</a>

                        </div>
                    </div>
                    <!-- Pagination-->
                  
                </div>
                
                <!-- Side widgets-->
                <div class="col-lg-4">
                    <!-- Search widget-->
                    <!-- <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                                <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                            </div>
                        </div>
                    </div> -->
                    <!-- Categories widget-->
                
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Nuansa Inti Persada Blog</div>
                        <div class="card-body">Blog Nuansa Inti Persada merupakan informasi untuk menampilkan dokumentasi pekerjaan kami.</div>
                    </div>
                </div>
            </div>
        </div>

        <script>
  $('.hapusBerita').submit(function(e){
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