
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?=__css('vendors/mdi/css/materialdesignicons.min.css');?>">
    <link rel="stylesheet" href="<?=__css('vendors/css/vendor.bundle.base.css');?>">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?=__css('style1.css');?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5 text-center">
                <?php $user_data = $this->session->userdata('user_data'); echo '<img src="'.$user_data['picture'].'" class="img-responsive img-circle img-thumbnail" />'?>
                <br>
                <?php $user_data = $this->session->userdata('user_data'); echo $user_data['email'];?>
                <form>
                  <div class="form-group mt-4">
                    <label>Email Kamu</label>
                    <input type="text" class="form-control p_input" value="<?php $user_data = $this->session->userdata('user_data'); echo $user_data['email'];?>" >
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control p_input" value="<?php $user_data = $this->session->userdata('user_data'); echo $user_data['name'];?>">
                  </div>
                 
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=__js('off-canvas.js');?>"></script>
    <script src="<?=__js('hoverable-collapse.js');?>"></script>
    <script src="<?=__js('misc.js');?>"></script>
    <script src="<?=__js('settings.js');?>"></script>
    <script src="<?=__js('todolist.js');?>"></script>
    <!-- endinject -->
  </body>
</html>