
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
                        <h1 class="mt-4">All Users</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-producer" type="button" role="tab">Producers</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-listener" type="button" role="tab">Listener</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-producer" role="tabpanel">
                                <div class="table-responsive">
                                        <table class="table text-white">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Full Name</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Work</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    if(count($producer_users) > 0) {
                                                    foreach ($producer_users as $value) {
                                                        echo '
                                                        
                                                        <tr>
                                                            <th scope="row">'.$value->full_name.'</th>
                                                            <td>'.$value->username.'</td>
                                                            <td>'.$value->email.'</td>
                                                            <td>'.$value->work.'</td>
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
                            <div class="tab-pane fade" id="pills-listener" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table text-white">
                                        <thead>
                                            <tr>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                if(count($listener_users) > 0) {
                                                foreach ($listener_users as $value) {
                                                    echo '
                                                    
                                                    <tr>
                                                        <th scope="row">'.$value->username.'</th>
                                                        <td>'.$value->email.'</td>
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