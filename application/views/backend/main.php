
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$title;?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?=__css('vendors/mdi/css/materialdesignicons.min.css');?>">
    <link rel="stylesheet" href="<?=__css('vendors/css/vendor.bundle.base.css');?>">

    <link rel="stylesheet" href="<?=__css('vendors/select2/select2.min.css');?>">
    <link rel="stylesheet" href="<?=__css('vendors/select2-bootstrap-theme/select2-bootstrap.min.css');?>">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?=__css('vendors/jsgrid/jsgrid.min.css');?>">
    <link rel="stylesheet" href="<?=__css('vendors/jsgrid/jsgrid-theme.min.css');?>">
    <!-- End plugin css for this page -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?=__css('vendors/jvectormap/jquery-jvectormap.css');?>">
    <link rel="stylesheet" href="<?=__css('vendors/flag-icon-css/css/flag-icon.min.css');?>">
    <link rel="stylesheet" href="<?=__css('vendors/owl-carousel-2/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?=__css('vendors/owl-carousel-2/owl.theme.default.min.css');?>">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?=__css('vendors/datatables.net-bs4/dataTables.bootstrap4.css');?>">
    <!-- End plugin css for this page -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?=__css('style1.css');?>">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?=__img('favicon.png');?>" />
  </head>
  <body class="sidebar-fixed">
    <div class="container-scroller">
      <!-- partial:../../partials/_sidebar.html -->
      <?php $this->load->view($sidebar) ?>
      <!-- partial -->
      <div class="page-body-wrapper">
        <!-- partial:../../partials/_navbar.html -->
        <?php $this->load->view($navbar) ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <?php $this->load->view($content) ?>
            <!-- content-wrapper ends -->
            <!-- partial:partials/../../partials/_footer.html -->
            <footer class="footer">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022 <a href="https://notfound.id/" target="_blank">Notfound Indonesia</a>. All rights reserved.</span>
                <span class="text-muted float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Not Found & made with <i class="mdi mdi-heart text-danger"></i></span>
              </div>
            </footer>
            <!-- partial -->
          </div>
          <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
      </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?=__js('vendors/js/vendor.bundle.base.js');?>"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?=__js('vendors/chart.js/Chart.min.js');?>"></script>
    <script src="<?=__js('vendors/progressbar.js/progressbar.min.js');?>"></script>
    <script src="<?=__js('vendors/jvectormap/jquery-jvectormap.min.js');?>"></script>
    <script src="<?=__js('vendors/jvectormap/jquery-jvectormap-world-mill-en.js');?>"></script>
    <script src="<?=__js('vendors/owl-carousel-2/owl.carousel.min.js');?>"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?=__js('off-canvas.js');?>"></script>
    <script src="<?=__js('hoverable-collapse.js');?>"></script>
    <script src="<?=__js('misc.js');?>"></script>
    <script src="<?=__js('settings.js');?>"></script>
    <script src="<?=__js('todolist.js');?>"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="<?=__js('vendors/datatables.net/jquery.dataTables.js');?>"></script>
    <script src="<?=__js('vendors/datatables.net/dataTables.bootstrap4.js');?>"></script>
    <script src="<?=__js('vendors/select2/select2.min.js');?>"></script>
    <!-- End plugin js for this page -->

     <!-- Plugin js for this page -->
     <script src="<?=__js('vendors/jsgrid/jsgrid.min.js');?>"></script>
     <script src="<?=__js('vendors/typeahead.js/typeahead.bundle.min.js');?>"></script>
    <!-- End plugin js for this page -->

    <!-- Custom js for this page -->
    <script src="<?=__js('js-grids.js');?>"></script>
    <script src="<?=__js('dbs.js');?>"></script>
    <!-- End custom js for this page -->

    <!-- Custom js for this page -->
    <script src="<?=__js('dashboard1.js');?>"></script>
    <script src="<?=__js('data-table.js');?>"></script>
    <script src="<?=__js('select2.js');?>"></script>
    <script src="<?=__js('typeaheads.js');?>"></script>
    <!-- End custom js for this page -->

    <!-- Custom js for this page -->
    <script src="<?=__js('modal-demo.js');?>"></script>
    <script src="<?=__js('jquery-3.1.1.min.js');?>"></script>
    <!-- End custom js for this page -->

    <script type="text/javascript">
        $(document).ready(function(){
             $('#nip').on('input',function(){
                 
                var nip=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('master/Pegawai/get_pegawai')?>",
                    dataType : "JSON",
                    data : {nip: nip},
                    cache:false,
                    success: function(data){
                        $.each(data,function(nip, nm_pegawai){
                            $('[name="nm_pegawai"]').val(data.nm_pegawai);
                            // $('[name="id_pegawai"]').val(data.id_pegawai);
                            // $('[name="satuan"]').val(data.satuan);
                             
                        });
                         
                    }
                });
                return false;
           });
 
        });
    </script>

<script type="text/javascript">
        $(document).ready(function(){
             $('#nip1').on('input',function(){
                 
                var nip=$(this).val();
                $.ajax({
                    type : "POST",
                    url  : "<?php echo base_url('master/Pegawai/get_pegawai')?>",
                    dataType : "JSON",
                    data : {nip: nip},
                    cache:false,
                    success: function(data){
                        $.each(data,function(nip, nm_pegawai){
                            $('[name="nm_pegawai"]').val(data.nm_pegawai);
                            // $('[name="id_pegawai"]').val(data.id_pegawai);
                            // $('[name="satuan"]').val(data.satuan);
                             
                        });
                         
                    }
                });
                return false;
           });
 
        });
    </script>

  </body>
</html>