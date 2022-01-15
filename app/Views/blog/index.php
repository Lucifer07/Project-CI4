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
                    
                    <?php foreach($blogModel as $row): ?>
                    <?php 
                    $date = date_create($row['created_at']);
                    $blogtgl = date_format($date,'d, M Y ');
                    endforeach;
                    ?>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                    <?php foreach($blogModel as $row): ?>
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
                                </div>
                            </div>
                       
                            
                        </div>
                        <?php endforeach ?>
                        <?= $pager->links('blogModel','blog_pagination') ?>
                      
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
                    <div class="card mb-4">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <!-- Content Katgori -->
                                        <!-- <li><a href="#!">Web Design</a></li>
                                        <li><a href="#!">HTML</a></li>
                                        <li><a href="#!">Freebies</a></li> -->
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="#!">JavaScript</a></li>
                                        <li><a href="#!">CSS</a></li>
                                        <li><a href="#!">Tutorials</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4">
                        <div class="card-header">Side Widget</div>
                        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                    </div>
                </div>
            </div>
        </div>




<?php 

$this->endSection();
?>