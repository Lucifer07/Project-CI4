
<?= $this->extend('template/template') ;?>

<?= $this->section('content') ;?>
<div class="container my-5">
 <?php
 $komenModel = new App\Models\komentarModel();

 $uri = current_url(true);

 $idb = $uri->getSegment(4);
// $komentar = $komenModel->komentarModel->where(['id_blog'=> $idb])->findAll();
?>
<form action="/komentar/balas/<?= $idb ; ?>" method="post" class="mb-4" class="formkomen">
      <?= csrf_field(); ?>
           <textarea class="form-control" name="balas" rows="3" placeholder="Tinggalkan Pesan Balas"></textarea>
          <button type="submit" class="btn btn-md btn-primary" >Kirim</button>
      </form>
      </div>
      <?= $this->endSection() ;?>