<?php
session_start();
include_once 'php\dbconfig.php';
if(!$_SESSION['password']){
    header('Location: admin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace d'admin</title>
    <script src="https://kit.fontawesome.com/1e94604817.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="test1.css" />
    <link rel="stylesheet" media="screen, print, handheld" type="text/css" href="cal.css" />
    <script type="text/javascript" src="cal.js"></script>
    <script type="text/javascript" src="horloge.js"></script>
    <link rel="stylesheet" href="hor.css" />
</head>
<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="index.php" class="text-nowrap logo-img">
            <h1 class="logo">InfluencerConnect</h1>
          </a>
          <!-- Close Button  -->
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="fa-sharp fa-regular fa-xmark" style="color: #000000;"></i>
          </div> 
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="index.php" aria-expanded="false">
                  <span class="hide-menu">Accueil</span>
                </a>
              </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="test1.html" aria-expanded="false">
                <span class="hide-menu">Tableau de bord</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="show_brand.php" aria-expanded="false">
                <span class="hide-menu">Les marques</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="show_influencer.php" aria-expanded="false">
                <span class="hide-menu">Les influenceurs</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="show_demandes.php" aria-expanded="false">
                <span class="hide-menu">Les demandes de suppression</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="showAll_collabs.php" aria-expanded="false">
                <span class="hide-menu">Les collaborations</span>
              </a>
            </li>
            
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="fa-solid fa-bars" style="color: #000205;"></i>
              </a>
            </li>
            
          </ul> 
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <a href="logout.php"  class="btn btn-primary">Se déconnecter</a>
              
            </ul> 
          </div>
        </nav>
      </header>
      <!--  Header End -->
  <!--
      <div class="col-lg-18 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Membres inscrits</h5>
            <div class="table-responsive">
              <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="index.php" aria-expanded="false">
                  <span class="hide-menu">Accueil</span>
                </a>
              </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="test1.html" aria-expanded="false">
                <span class="hide-menu">Tableau de bord</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="show_brand.php" aria-expanded="false">
                <span class="hide-menu">Les marques</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="show_influencer.php" aria-expanded="false">
                <span class="hide-menu">Les influenceurs</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="show_demandes.php" aria-expanded="false">
                <span class="hide-menu">Les demandes de suppression</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="showAll_collabs.php" aria-expanded="false">
                <span class="hide-menu">Les collaborations</span>
              </a>
            </li>
            
          </ul>
        </nav>
            </div>
          </div>
        </div>
      </div> -->
      <!--  fin de nav-->
      
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row" >
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Bienvenue dans l'espace d'admin </h5>
                  </div>
                </div>
                <div id="chart"  > 
                  
                  <div>
                    <div class="clock">
                      <span id="hours">00</span> :
                      <span id="minutes">00</span> :
                      <span id="seconds">00</span>
                    </div>
                  
                    <script src="hor.js"></script>
                  </div>
                  <div>
                    <script type="text/javascript">
                        calendrier();
                    </script>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Nombre de marques</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">7</h4>
                        <div class="d-flex align-items-center mb-3">
                          <span
                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                          <p class="fs-3 mb-0">last year</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div>
                          
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Nombre des influenceurs</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">7</h4>
                        <div class="d-flex align-items-center mb-3">
                          <span
                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                          <p class="fs-3 mb-0">last year</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div>
                          
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        
      </div>
       
      <!--    important nav responsive  
      <div  class=" col-lg-18 d-flex align-items-stretch">
        <div class="card2 w-100">
          <div class="card-body p-4">
            <div class="table-responsive">
              <nav class="sidebar-nav2 scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav2">
            <li class="sidebar-item">
                <a class="sidebar-link" href="index.php" aria-expanded="false">
                  <span class="hide-menu">Accueil</span>
                </a>
              </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="show_brand.php" aria-expanded="false">
                <span class="hide-menu">Les marques</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="show_influencer.php" aria-expanded="false">
                <span class="hide-menu">Les influenceurs</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="show_demandes.php" aria-expanded="false">
                <span class="hide-menu">Les demandes de suppression</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="showAll_collabs.php" aria-expanded="false">
                <span class="hide-menu">Les collaborations</span>
              </a>
            </li>
            
          </ul>
        </nav>
            </div>
          </div>
        </div>
      </div> 
        fin de nav--> 
          </div>
        </div>
        
      </div>
    </div>
  </div>
  <script src="horloge.js"></script>
  <script src="sidebarmenu.js"></script>
  <script src="app.min.js"></script>
  <script src="dashboard.js"></script>
</body>
</html>
    