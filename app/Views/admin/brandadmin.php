<?= $this->extend('template/template') ;?>

<?= $this->section('content') ;?>

<div class="container my-5">
<table class="table  table-responsive table-bordered border-secondary">
  <thead class="table-dark">
    <tr >
      <th scope="col">ID</th>
      <th scope="col">Foto Brand</th>
      <th scope="col">Maintanance</th>
    </tr>
  </thead>
  <tbody>
   <?php
   $nomor = 1;
   ?>
   <?php foreach ($brands as $row) : ?>
    <tr class="table-active">
      <th scope="row"><?= $nomor++; ?></th>
      <td><img src="/img/<?= $row['foto']; ?>" alt="" srcset="" width="100"></td>
      <td>
      <a class="btn btn-warning btn-sm  " href="/brand/editBrand/<?= $row['id']; ?>" role="button">Edit</a>
       <form action="/brand/delete/<?= $row['id']; ?>" method="post" class="d-inline databrand">
           <input type="hidden" name="_method" value="DELETE" >
           <button type="submit" class="btn btn-danger btn-sm remove" >Hapus Brand</button>
       </form>

      </td>
      
    </tr>
   <?php endforeach; ?>
    
  
  </tbody>
</table>
<a class="btn btn-primary btn-sm " href="/brand/tambahBrand" role="button">Tambah Brand</a>


</div>


<script>
                                    $('.databrand').submit(function(e){
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
                                                    title: 'Data Brand Berhasil Dihapus',
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

<?= $this->endSection() ;?>