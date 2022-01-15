<?php $this->extend('template/template');?>
<?php $this->section('content');?>
<?php 
$date = date_create($detailblog['created_at']);
$blogtgl = date_format($date,'d, M Y ');
?>
<div class="container mt-5">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Post content-->
                    <article>
                        <!-- Post header-->
                        <header class="mb-4">
                            <!-- Post title-->
                            <h1 class="fw-bolder mb-1"><?= $detailblog['namapekerjaan']; ?></h1>
                            <!-- Post meta content-->
                            <div class="text-muted fst-italic mb-2">Posted on <?= $blogtgl; ?> by <?= $detailblog['author']; ?></div>
                            <!-- Post categories-->
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                            <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                        </header>
                        <!-- Preview image figure-->
                        <figure class="mb-4"><img class="img-fluid rounded " src="/img/<?= $detailblog['fotopekerjaan']; ?>" alt="<?= $detailblog['fotopekerjaan']; ?>" /></figure>
                        <!-- Post content-->
                        <section class="mb-5">
                            <p class="fs-5 mb-4"><?= $detailblog['deskripsi']; ?></p>
                        </section>
                    </article>
                    <!-- Comments section-->
                    <section class="mb-5">
                        <div class="card bg-light">
                            <div class="card-body">
                                <!-- Comment form-->
                                <form action="/komentar/kirim/<?= $detailblog['id']; ?>" method="post" class="mb-4" class="formkomen">
                                <?= csrf_field(); ?>
                                     <textarea class="form-control" name="komentar" rows="3" placeholder="Join the discussion and leave a comment!"></textarea>
                                    <button type="submit" class="btn btn-md btn-primary" >Kirim</button>
                                </form>
                                <!-- Comment with nested comments-->
                                <div class="card-body">
                                <?php
                                        $modelUser = new App\Models\loginModel();
                                        $modelKomen = new App\Models\komentarModel();
                                        $balasModel = new App\Models\balasModel();
                                        // $db = \Config\Database::connect();
                                        // $query = "SELECT balas.id,balas.balas,user.nama FROM balas INNER JOIN user "
                                        // $kontenBalas = $balasModel->find($k['id_komen']);
                                        
                                    ?>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="display-4">
                                            Komentar
                                        </div>
                                <?php foreach($komen as $k): 
                                    
                                    
                                    $namaUser = $modelUser->find($k['id_user']);
                                    
                                    ?>
                                    <div class="d-flex mb-4">
                                    <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                    <div class="ms-3">
                                        <div class="fw-bold"><?= $namaUser['nama'] ?></div>
                                        <?= $k['komentar'] ?> 
                                        <br>
                                        
                                        <a  href="/komentar/viewBalas/<?= $k['id']; ?>" class="text-primary balaskomen">Balas</a>
                                       
                                      <!-- Child comment 1-->
                                      </div>
                                </div>
                                        <?php endforeach; ?>
                                        <hr>
                                        <div class="display-4">
                                            Balas Komentar
                                        </div>
                                        <?php
                                        foreach($kontenBalas as $balasan):
                                            $namaUsers = $modelUser->find($balasan['id_user']);

                                        ?>

                                <div class="d-flex mt-4">
                                            <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                            <div class="ms-3">
                                                <div class="fw-bold"><?= $namaUser['nama']; ?> to <?= $namaUsers['nama']; ?></div>'
                                                <?= $balasan['balas']; ?>
                                            </div>
                                        </div>
                                        <?php
                                        endforeach;
                                        ?>
                                        <!-- Child comment 2-->
                                       
                                
                                
                                    
                                
                                                      
                                        
                                        
                                        
                                        
                                    </div>
                                    
                                    
                                  
                               
                              
                            </div>
                        </div>
                    </div>
                                
                            </div>
                        </div>
                    </section>
                </div>
                <!-- <script>
                  var data = "";
                  return $this->where(['id' => $id])->first();

                    $(document).ready(function () {
                        $('.balaskomen').click(function (e) { 
                            e.preventDefault();
                            $(".formbalas").html("<form action='/komentar/balas' method='post'> <textarea class='form-control' name='balas' rows='3'></textarea><button type='submit' class='btn btn-primary btn-md'>Balas Komentar</button></form>");
                        });
                    });
                </script> -->
<script>
    $(dcoument).ready(function(){
        $(".formkomen").submit(function(e){
            e.preventDefault();
            
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                success: function (response) {
                    
                }
            });
        })
    })
</script>
<?php $this->endSection();?>