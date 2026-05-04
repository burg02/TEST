
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
                        <h1 class="mt-4">All Music</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="table-responsive">
                                    <table class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Artist</th>
                                                <th scope="col">Music Name</th>
                                                <th scope="col">Music Genre</th>
                                                <th scope="col">Date Released</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(count($all_music) > 0) {
                                                foreach ($all_music as $value) {
                                                    echo '
                                                    
                                                    <tr>
                                                        <th scope="row">'.$value->artist_name.'</th>
                                                        <td>'.$value->music_name.'</td>
                                                        <td>'.$value->music_genre.'</td>
                                                        <td>'.$value->date_released.'</td>
                                                    <tr>

                                                    ';
                                                }
                                            } else {
                                                echo '
                                                <tr>
                                                    <th scope="row">No records found</th>
                                                    <td>No records found</td>
                                                    <td>No records found</td>
                                                    <td>No records found</td>
                                                <tr>
                                                ';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
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