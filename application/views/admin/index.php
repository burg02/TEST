
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 text-center" href="dashboard">Admin Panel</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="dashboard">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <a class="nav-link" href="all-users">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                All Users
                            </a>
                            <a class="nav-link" href="all-music">
                                <div class="sb-nav-link-icon"><i class="fas fa-briefcase"></i></div>
                                All Music
                            </a>
                            <a class="nav-link" href="most-visited">
                                <div class="sb-nav-link-icon"><i class="fas fa-laptop"></i></div>
                                Records
                            </a>
                            <a class="nav-link" href="logout">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out"></i></div>
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">All Listeners</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h1>
                                           <?php echo $count_listeners; ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">All Producers</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h1>
                                            <?php echo $count_producers; ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">All Music</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <h1>
                                            <?php echo $count_musics; ?>
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    
        <style>
            body {
                color: #fff;
            }
            .card {
                background-color: #303030 !important;
            }
        </style>