<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="icon" href="/img/nuansa.png" type="image/x-icon" >
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
      <!-- Ionicons -->
      <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
      />
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
      <!-- MDB -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet"/>
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      <link rel="stylesheet" href="/css/styles.css">
      <link rel="stylesheet" href="/css/styleku.css">
<script
			  src="https://code.jquery.com/jquery-3.6.0.js"
			  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
			  crossorigin="anonymous"></script>
      <title><?php echo $title;?></title>
  </head>

  <body  >
 <!-- Just an image -->

 <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#184887;">
  <div class="container px-5">
  <img src="/img/nuansa_putih.png" alt="" srcset="" width="150">
    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav ">
      <li class="nav-item">
              <a class="nav-link active  nav-link-fade-up text-light" id="home1" style="font-weight:bold" href="<?= base_url('/homeadmin'); ?>">HOME</a>
          </li>

	   <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav-link-fade-up text-light" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            PRODUK
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li class="nav-item dropdown drop-down02">
              <a class="dropdown-item dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              CCTV
              </a>
              <ul class="dropdown-menu sub-menu02" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= base_url('/shopadmin/cctv') ?>">CCTV SURVEILLANCE 2 MP</a></li>
                    <li><a class="dropdown-item" href="#">IP CAMERA</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('/shopadmin/cctv5mp') ?>">CCTV SURVEILLANCE 5 MP </a></li>
              </ul>
            </li>

            <li class="nav-item dropdown drop-down02">
              <a class="dropdown-item dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              RUNNING TEXT
              </a>
              <ul class="dropdown-menu sub-menu02" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?= base_url('/shopadmin/runt') ?>">RUNNING TEXT 1 SISI</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('/shopadmin/runt2sisi') ?>">RUNNING TEXT 2 SISI</a></li>
              </ul>
            </li>

            <li><a class="dropdown-item" href="#">PABX</a></li>
						</li>
            
          </ul>
          <li class="nav-item">
          <a class="nav-link nav-link-fade-up text-light" style="font-weight:bold" href="/infoadmin">INFO PERUSAHAAN </a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-fade-up text-light" style="font-weight:bold" href="/contactadmin">KONTAK KAMI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-fade-up text-light" style="font-weight:bold" href="<?= base_url('/blogadmin ') ?>">BLOG</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav-link-fade-up text-light" style="font-weight:bold" href="<?= base_url('/brosuradmin ') ?>">DOWNLOAD BROSUR</a>
        </li>
        <?php
        if(session()->get('useradmin')){
        ?>
          <li class="nav-item">
          <a class="nav-link text-light btn btn-danger btn-sm" style="font-weight:bold;padding:1" href="<?= base_url('/logout ') ?>">Logout</a>
        </li>
        
       <?php
        }
       ?>
               </li>
      </ul>
      
    </div>
  </div>
</nav>


<?= $this->renderSection('content'); ?>
  


<footer class=" py-1 mt-auto fixed-bottom " style="background-color:#184887;">
            <div class="container px-2">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 link-light" >Copyright &copy; Nuansa Inti Persada <?= date('Y') ?></div></div>
                    <div class="col-auto">
                        <strong class="font-weight-bolder link-light" href="">Your IT Partner</strong>
                        
                    </div>
                </div>
            </div>
        </footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js">
</script>

<script src="/js/scripts.js"></script>
   
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

 
</body>
</html>

