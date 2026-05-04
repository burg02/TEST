
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
                        <h1 class="mt-4">Records</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-most-visited-music" type="button" role="tab">Most Visited Music</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-most-visited-genre" type="button" role="tab">Most Visited Genre</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-most-visited-producer" type="button" role="tab">Most Visited Producer</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-most-visited-music" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Artist Name</th>
                                                <th scope="col">Music Name</th>
                                                <th scope="col">Music Genre</th>
                                                <th scope="col">Date Released</th>
                                                <th scope="col">Viewers</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if(count($view_music) > 0) {
                                                foreach ($view_music as $value) {
                                                    echo '
                                                    
                                                    <tr>
                                                        <td>'.ucwords($value->artist_name).'</td>
                                                        <td>'.$value->music_name.'</td>
                                                        <td>'.$value->music_genre.'</td>
                                                        <td>'.$value->date_released.'</td>
                                                        <td>'.$value->views.'</td>
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
                            <div class="tab-pane fade" id="pills-most-visited-genre" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Genre</th>
                                                <th scope="col">Viewers</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if(count($view_genres) > 0) {
                                                foreach ($view_genres as $value) {
                                                    echo '
                                                    
                                                    <tr>
                                                        <td>'.ucwords($value->genre).'</td>
                                                        <td>'.$value->views.'</td>
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
                            <div class="tab-pane fade" id="pills-most-visited-producer" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Artist Name</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Music Genre</th>
                                                <th scope="col">Viewers</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if(count($view_producers) > 0) {
                                                foreach ($view_producers as $value) {
                                                    echo '
                                                    
                                                    <tr>
                                                        <th scope="row">'.$value->full_name.'</th>
                                                        <td>'.$value->username.'</td>
                                                        <td>'.$value->genre.'</td>
                                                        <td>'.$value->views.'</td>
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