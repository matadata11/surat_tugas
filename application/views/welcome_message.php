<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?=__css('login/fonts/icomoon/style.css');?>">

    <link rel="stylesheet" href="<?=__css('login/css/owl.carousel.min.css');?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=__css('login/css/bootstrap.min.css');?>">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?=__css('login/css/style.css');?>">
    <link rel="stylesheet" href="<?=__css('login/css/login.css');?>">

    <link rel="shortcut icon" href="<?=__img('isppd.png');?>" />

    <title>.: Login Page | Sistem Pengajuan Perjalanan Dinas :.</title>
  </head>
  <body>
  

  
  <div class="content content-top">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center">
          <img src="<?=__img('undraw_remotely_2j6y.svg');?>" alt="Image" class="img-fluid">
         <div class="text-muted">
          <p>Sistem Pengajuan/Pelaporan Perjalanan Dinas</p>
         </div>
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Sign In <small class="text-muted">(Single Sign On)</small></h3>
              <p class="mb-4">silahkan login dengan Akun Google atau Akun SPPD anda.</p>
            </div>
            
              <!-- <div class="form-group first mb-1">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" autocomplete="off">
              </div>

              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" autocomplete="off">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a data-toggle="modal" href="#reset" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" name="submit" value="Log In" class="btn btn-block btn-primary">

              <span class="d-block text-left my-4 text-muted text-center">&mdash; or login with &mdash;</span> -->
              
              <div class="social-login" >
                 <?php
                    if(!isset($login_button))
                    {

                    }
                    else
                    {
                    echo '<div style="margin-left:-5px;">'.$login_button . '</div>';
                    }
                ?>

                <br>
                <a data-toggle="modal" data-target="#reset" style="margin-left:0px;width:21.5rem;margin-top:10px;margin-bottom:2.5rem;"><img src="<?=__img('login.png');?>" alt="" style="width:21.5rem;"></a>
              </div>
              

            <div class="tutor mb-4">
                <a data-toggle="modal" data-target="#tutor" style="text-decoration:none;"><button class="btn btn-block btn-danger" >Cara Penggunaan</button></a>
              </div>

              <div class="text-center">
              <p>Dikembangkan oleh <a href="https://notfound.id" class="mt-4" style="text-decoration:none;"><b>Notfound Indonesia</b></a></p>
              </div>
              <!-- <a data-toggle="modal" data-target="#reset" style="margin-left:0px;width:21.5rem;margin-top:10px;margin-bottom:2.5rem;"><img src="<?=__img('wa.png');?>" alt="" style="width:21.5rem;"></a> -->
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  <!-- modal resert -->
  <div class="modal fade" id="reset" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">
				            Masuk dengan akun sppd anda.
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" >
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
              <form method="post" action="<?=site_url('checkdulu')?>">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">Email <small><font color="red">*</font> Registered and active email</small></label>
                                <input type="email" name="email" class="form-control" id="email" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="email-id-column" class="mb-2">Password </label>
                                <input type="password" name="password" class="form-control" id="password" autocomplete="off">
                            </div>

                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" name="submit" class="btn btn-primary me-1 mb-1 mr-1">
                                Masuk
                            </button>
                            <button type="reset" class="btn btn-secondary me-1 mb-1">
                                Clear
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tutor" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document" style="margin-top:10px;">
        <div class="modal-content">
            <div class="modal-body">
            <embed src="<?=site_url('assets/pdf/Langkah Penggunaan Sistem Pengajuan Perjalanan Dinas.pdf');?>" type="application/pdf" width="100%" height="700px"></embed>
            </div>
        </div>
    </div>
</div>
  
    <script src="<?=__js('login/js/jquery-3.3.1.min.js');?>"></script>
    <script src="<?=__js('login/js/popper.min.js');?>"></script>
    <script src="<?=__js('login/js/bootstrap.min.js');?>"></script>
    <script src="<?=__js('login/js/main.js');?>"></script>
  </body>
</html>