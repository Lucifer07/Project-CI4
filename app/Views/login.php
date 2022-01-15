

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <!-- MDB -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css"
      rel="stylesheet"
    />
     <script
			  src="https://code.jquery.com/jquery-3.6.0.js"
			  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
			  crossorigin="anonymous"></script>
        <script src="<?= base_url('/js/ckeditor/ckeditor.js'); ?>"></script>

      <title><?php echo $title;?></title>
  </head>
  <style>
 .gradient-custom-2 {
  background: #0052D4;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #6FB1FC, #4364F7, #0052D4);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #6FB1FC, #4364F7, #0052D4); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}

@media (min-width: 768px) {
  .gradient-form {
    height: 100vh !important;
  }
}
@media (min-width: 769px) {
  .gradient-custom-2 {
    border-top-right-radius: .3rem;
    border-bottom-right-radius: .3rem;
  }
}
</style><!-- Font Awesome -->

  <body>



<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="/img/nuansa.png" style="width: 200px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Nuansa Inti Persada</h4>
                </div>

                <form action="/login/cek_login" method="post">
                <?= csrf_field(); ?>
              <?php
            if(session()->getFlashdata('error')){ ?>
              <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
              </div>
            <?php
            }elseif(session()->getFlashdata('success')){
            ?>
            <div class="alert alert-warning">
                <?= session()->getFlashdata('success'); ?>
              </div>
            <?php
            }
            ?>
            
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                   <input type="text" id="username" name="username" class="form-control" placeholder="Masukkan Username"/>
                   <label class="form-label" for="username">Username</label>
                  </div>

                  <div class="form-outline mb-4">
                   <input type="password" id="password" name="password" class="form-control" />
                   <label class="form-label" for="password">Password</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log in</button>
                  </div>

                  
                 </form>
                 <div class="d-flex align-items-center justify-content-center pb-4">
                   <p class="mb-0 me-2">Belum Mempunyai Akun ?</p>
                   <button type="submit" class="btn btn-outline-danger">Create new</button>
                 </div>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">Your IT Partner </h4>
                <p class="small mb-0"></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"
></script>
</body>
</html>