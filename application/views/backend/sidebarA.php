<nav class="sidebar sidebar-offcanvas" id="sidebar" style="height:100%;">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="<?= site_url('DashboardA');?>"><img src="<?=__img('sppd1.png');?>" style="width:150px;height:40px;" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="<?= site_url('DashboardA');?>"><img src="<?=__img('logo-mini.svg');?>" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="<?=__img('faces/face15.jpg');?>" alt="">
                  <!-- <?php $user_data = $this->session->userdata('user_data'); echo '<img src="'.$user_data['picture'].'" class="img-xs rounded-circle" />'?> -->
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">
                    <!-- <?php
                      $user_data = $this->session->userdata('user_data');
                      echo $user_data['name'];
                    ?> -->
                    <?=__session('fullname');?>
                  </h5>
                  <!-- <span style="font-size:9px;"><?php $user_data = $this->session->userdata('user_data'); echo $user_data['email'];?> <br> </span> -->
                  <span style="font-size:9px;"><?=__session('email');?> <br> </span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="<?=site_url('DashboardA');?>">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/widgets/widgets.html">
              <span class="menu-icon">
                <i class="mdi mdi-texture"></i>
              </span>
              <span class="menu-title">Widgets</span>
            </a>
          </li> -->
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#page-layouts" aria-expanded="false" aria-controls="page-layouts">
              <span class="menu-icon">
                <i class="mdi mdi-view-list"></i>
              </span>
              <span class="menu-title">Page Master</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=site_url('pegawai_a');?>">Pegawai</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=site_url('pptk_a');?>">PPTK</a></li>
              </ul>
            </div>
          </li>
           <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#sidebar-layouts" aria-expanded="false" aria-controls="sidebar-layouts">
              <span class="menu-icon">
                <i class="mdi mdi-file-cloud"></i>
              </span>
              <span class="menu-title">Pelaporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="sidebar-layouts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/layout/compact-menu.html">Input Laporan</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/layout/sidebar-collapsed.html">Print Laporan</a></li>
              </ul>
            </div>
          </li>
          <!--<li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Basic UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/accordions.html">Accordions</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/badges.html">Badges</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/breadcrumbs.html">Breadcrumbs</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/modals.html">Modals</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/progress.html">Progress bar</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/pagination.html">Pagination</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/tabs.html">Tabs</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
              <span class="menu-icon">
                <i class="mdi mdi-settings"></i>
              </span>
              <span class="menu-title">Advanced Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/dragula.html">Dragula</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/clipboard.html">Clipboard</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/context-menu.html">Context menu</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/slider.html">Slider</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/loaders.html">Loaders</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/colcade.html">Colcade</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/carousel.html">Carousel</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/ui-features/tooltips.html">Tooltips</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Form Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/forms/basic_elements.html">Basic Form</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/forms/advanced_elements.html">Advanced Form</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/forms/validation.html">Validation</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/forms/wizard.html">Wizard</a></li>
              </ul>
            </div>
          </li> -->
          <!-- <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/tables/basic-table.html">Basic table</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/tables/data-table.html">Data table</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/tables/js-grid.html">Js-grid</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/tables/sortable-table.html">Sortable table</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#editors" aria-expanded="false" aria-controls="editors">
              <span class="menu-icon">
                <i class="mdi mdi-format-text"></i>
              </span>
              <span class="menu-title">Editors</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="editors">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/forms/text_editor.html">Text editors</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/forms/code_editor.html">Code Editor</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Charts</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/charts/chartjs.html">ChartJs</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/charts/morris.html">Morris</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/charts/flot-chart.html">Flot</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/charts/google-charts.html">Google charts</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/charts/sparkline.html">Sparkline js</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/charts/c3.html">C3 charts</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/charts/chartist.html">Chartists</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/charts/justGage.html">JustGage</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#maps" aria-expanded="false" aria-controls="maps">
              <span class="menu-icon">
                <i class="mdi mdi-map-marker-radius"></i>
              </span>
              <span class="menu-title">Maps</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="maps">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/maps/google-maps.html">Google Maps</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/maps/mapael.html">Mapeal</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/maps/vector-map.html">Vector map</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/ui-features/notifications.html">
              <span class="menu-icon">
                <i class="mdi mdi-bell-ring"></i>
              </span>
              <span class="menu-title">Notifications</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Icons</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/icons/flag-icons.html">Flag icons</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/icons/mdi.html">Mdi icons</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/icons/font-awesome.html">Font Awesome</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/icons/simple-line-icon.html">Simple line icons</a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/icons/themify.html">Themify icons</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">More</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/ui-features/popups.html">
              <span class="menu-icon">
                <i class="mdi mdi-forum"></i>
              </span>
              <span class="menu-title">Popups</span>
            </a>
          </li> -->
          <!-- <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/login-2.html"> Login 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register.html"> Register </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/register-2.html"> Register 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/lock-screen.html"> Lockscreen </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
              <span class="menu-icon">
                <i class="mdi mdi-earth"></i>
              </span>
              <span class="menu-title">General Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/blank-page.html"> Blank Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/profile.html"> Profile </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/portfolio.html"> Portfolio </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/faq.html"> FAQ </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/faq-2.html"> FAQ 2 </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/search-results.html"> Search Results </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/news-grid.html"> News grid </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/timeline.html"> Timeline </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <span class="menu-icon">
                <i class="mdi mdi-lock"></i>
              </span>
              <span class="menu-title">Error pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/error-500.html"> 500 </a></li>
              </ul>
            </div>
          </li>-->
          <li class="nav-item menu-items">
            <a class="nav-link" data-bs-toggle="collapse" href="#e-commerce" aria-expanded="false" aria-controls="e-commerce">
              <span class="menu-icon">
                <i class="mdi mdi-recycle"></i>
              </span>
              <span class="menu-title">Patching Sistem</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="e-commerce">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="<?=site_url('patch');?>"> Patching </a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="../../pages/samples/pricing-table.html"> Pricing Table </a></li>
                <li class="nav-item"> <a class="nav-link" href="../../pages/samples/orders.html"> Orders </a></li> -->
              </ul>
            </div>
          </li>
          <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/apps/calendar.html">
              <span class="menu-icon">
                <i class="mdi mdi-calendar-today"></i>
              </span>
              <span class="menu-title">Calendar</span>
            </a>
          </li>  -->
          <!-- <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/apps/todo.html">
              <span class="menu-icon">
                <i class="mdi mdi-bulletin-board"></i>
              </span>
              <span class="menu-title">Todo list</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/apps/email.html">
              <span class="menu-icon">
                <i class="mdi mdi-email"></i>
              </span>
              <span class="menu-title">E-mail</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../../pages/apps/gallery.html">
              <span class="menu-icon">
                <i class="mdi mdi-image-filter-center-focus-weak"></i>
              </span>
              <span class="menu-title">Gallery</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona/jquery/documentation/documentation.html">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Documentation</span>
            </a>
          </li> -->

          <!-- <div class="text-center mt-4">
            <button class="btn btn-danger"><i class="mdi mdi-youtube"></i>Video Tutorial</button>
          </div> -->
        </ul>
      </nav>