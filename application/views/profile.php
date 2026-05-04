

    <div class="wrapper">
        <div class="btn-sidebar">
            <i class='bx bxs-dashboard'></i>
        </div>
        <div class="sidebar">
            <div class="mt-5">
                <div class="px-3">
                    <h4 class="text-center">
                        <img src="assets/media/logo.png" alt="" srcset="" class="w-75">
                        ProdFinder
                    </h4>
                    <hr>
                </div>
                <p class="mt-2 mt-5 fw-bold text-muted ms-4">Menu</p>
                <ul class="list-unstyled mt-3 ms-4">
                    <li class="list-unstyled-item ps-3 py-3">
                        <a href="/dashboard" class="text-link d-inline-flex align-items-center gap-2">
                            <i class='bx bxs-dashboard' ></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="list-unstyled-item ps-3 py-3">
                        <a href="/producers" class="text-link d-inline-flex align-items-center gap-2">
                            <i class='bx bx-user-check'></i>
                            <span>Producers</span>
                        </a>
                    </li>
                    <li class="list-unstyled-item ps-3 py-3">
                        <a href="/music-releases" class="text-link d-inline-flex align-items-center gap-2">
                            <i class='bx bxl-deezer' ></i>
                            <span>Music Releases</span>
                        </a>
                    </li>
                    <li class="list-unstyled-item ps-3 py-3">
                        <a href="/genres/all" class="text-link d-inline-flex align-items-center gap-2">
                            <i class='bx bx-music' ></i>
                            <span>Genres</span>
                        </a>
                    </li>
                    <?php 
                        if($_SESSION["role"] === "producer") {
                    ?>
                    <li class="list-unstyled-item ps-3 py-3 active">
                        <a href="/profile" class="text-link d-inline-flex align-items-center gap-2">
                            <i class='bx bxs-user-rectangle' ></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <?php
                        }
                    ?>
                    <li class="list-unstyled-item ps-3 py-3">
                        <a href="/signout" class="text-link d-inline-flex align-items-center gap-2">
                            <i class='bx bx-exit' ></i>
                            <span>Sign Out</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="content py-5">
            <div class="container">
                <div class="profile__ p-4">
                    <h5>Profile</h5> 
                    <small class="text-muted float-right">Producer | Artist</small>
                    <?php
                        if($_SESSION["role"] == "listener") {
                    ?>
                        <!--  -->
                    <?php
                        } else if($_SESSION["role"] == "producer") {
                    ?>
                        <div class="profile-content">
                        <div class="profile-banner mt-3">
                            <img src="<?php echo base_url("assets/uploads/profile-banner/") . $userdata[0]->banner; ?>" alt="" srcset="">
                            <div class="actions">
                                <button class="btn-edit-banner" data-bs-toggle="modal" data-bs-target="#edit-banner">
                                    <i class='bx bxs-edit-alt'></i> Edit Banner
                                </button>
                            </div>
                        </div>
                        <div class="profile-image d-block d-md-inline-flex align-items-center gap-3">
                            <div class="d-flex justify-content-center d-md-block">
                                <img src="<?php echo base_url("assets/uploads/profile/") . $userdata[0]->profile; ?>" alt="" srcset="">
                            </div>
                            <div class="d-flex justify-content-center d-md-block">
                                <h1 class="pb-4 w-100"><?php echo $userdata[0]->full_name; ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="about-content">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-account" type="button" role="tab">Account</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-music" type="button" role="tab">Upload Music</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-mymusic" type="button" role="tab">My Music</button>
                              </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-account" role="tabpanel">
                                <?php
                                    if($status === "error") {
                                        echo '<div class="alert alert-danger mt-5">'.$message[0].'</div>';
                                    } else if($status === "success") {
                                        echo '<div class="alert alert-success mt-5">'.$message.'</div>';
                                    }



                                ?>
                                <form action="/update-profile" method="post">
                                    <div class="row mt-5">
                                        <?php
                                            if($this->DashboardModel->checkFirstAccess($_SESSION["username"])[0]->first_signin == 0) {
                                        ?>
                                            <p class="text-danger m-0" style="font-size: 16px;">
                                                You need to create your profile first
                                            </p>
                                        <?php
                                            }
                                        ?>
                                        <p class="text-danger m-0" style="font-size: 12px;">
                                            Leave n/a if no details are available
                                        </p>
                                        <div class="col-12 col-md-4">
                                            <label for="">Full Name</label>
                                            <input type="text" name="full-name" id="full-name" class="form-control" placeholder="<?php echo $userdata[0]->full_name; ?>">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="">Address</label>
                                            <input type="text" name="address" id="address" class="form-control" placeholder="<?php echo $userdata[0]->address; ?>">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="">Contact</label>
                                            <input type="text" name="contact" id="address" class="form-control" placeholder="<?php echo $userdata[0]->contact; ?>">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="">Birth Date</label>
                                            <input type="date" name="bdate" id="bdate" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="">Years Experience</label>
                                            <input type="text" name="exp" id="exp" class="form-control" placeholder="<?php echo $userdata[0]->years_exp; ?>">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="">Email Address</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="<?php echo $userdata[0]->email; ?>">
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label for="">Bio or Introduction</label>
                                            <textarea name="bio" id="bio" rows="10" class="form-control" placeholder="<?php echo $userdata[0]->bio; ?>"></textarea>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label for="">Work</label>
                                            <textarea name="work" id="work" rows="3" class="form-control" placeholder="<?php echo $userdata[0]->work; ?>"></textarea>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <hr>
                                        <h6 class="mb-3">Social Media Informations</h6>
                                        <div class="col-12 col-md-4">
                                            <label for="">Facebook</label>
                                            <input type="text" name="facebook" id="facebook" class="form-control" placeholder="<?php echo $userdata[0]->facebook; ?>">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="">Twitter</label>
                                            <input type="text" name="twitter" id="twitter" class="form-control" placeholder="<?php echo $userdata[0]->twitter; ?>">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="">Instagram</label>
                                            <input type="text" name="instagram" id="insta" class="form-control" placeholder="<?php echo $userdata[0]->instagram; ?>">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="">Pinterest</label>
                                            <input type="text" name="pinterest" id="pinterest" class="form-control" placeholder="<?php echo $userdata[0]->pinterest; ?>">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="">Discord</label>
                                            <input type="text" name="discord" id="discord" class="form-control" placeholder="<?php echo $userdata[0]->discord; ?>">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="">Others</label>
                                            <input type="text" name="other" id="other" class="form-control" placeholder="<?php echo $userdata[0]->others; ?>">
                                        </div>
                                    </div>
                                    <div class="w-100">
                                        <button class="btn-update-profile d-flex align-items-center ms-auto mt-5 ms-3 gap-1">
                                            <i class='bx bx-save' ></i> Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="pills-music" role="tabpanel">
                                <form action="/add-music" method="post" enctype="multipart/form-data">
                                    <div class="row mt-5">
                                        <h6 class="mb-3">Upload Music</h6>
                                        <div class="col-12 col-md-4">
                                            <label for="">Artist Name</label>
                                            <input type="text" name="artist-name" id="artist-name" class="form-control" placeholder="eg. John Doe">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="">Music Name</label>
                                            <input type="text" name="music-name" id="music-name" class="form-control" placeholder="eg. Heaven">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="">Date Released</label>
                                            <input type="date" name="date-released" id="date-released" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-12 col-md-4">
                                            <label for="">Music File</label>
                                            <input type="file" name="file-music" id="file-music" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <label for="">Music Banner</label>
                                            <input type="file" name="file-banner" id="file-banner" class="form-control">
                                        </div>
                                        <div class="col-12 col-md-4">
                                            
                                        </div>
                                        <label for="genres">Music Genre</label>
                                        <div class="col-12 col-md-2">
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" name="genre[]" value="Pop" id="selectGenre">
                                                <label class="form-check-label m-0 mt-1">
                                                Pop
                                                </label>
                                            </div>
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" name="genre[]" value="Rock" id="selectGenre">
                                                <label class="form-check-label m-0 mt-1">
                                                Rock
                                                </label>
                                            </div>
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" name="genre[]" value="Jazz" id="selectGenre">
                                                <label class="form-check-label m-0 mt-1">
                                                Jazz
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" name="genre[]" value="HipHop" id="selectGenre">
                                                <label class="form-check-label m-0 mt-1">
                                                Hip Hop
                                                </label>
                                            </div>
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" name="genre[]" value="R & B" id="selectGenre">
                                                <label class="form-check-label m-0 mt-1">
                                                R & B
                                                </label>
                                            </div>
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" name="genre[]" value="Heavy Metal" id="selectGenre">
                                                <label class="form-check-label m-0 mt-1">
                                                Heavy Metal
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" name="genre[]" value="Electronic" id="selectGenre">
                                                <label class="form-check-label m-0 mt-1">
                                                Electronic
                                                </label>
                                            </div>
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" name="genre[]" value="Classical" id="selectGenre">
                                                <label class="form-check-label m-0 mt-1">
                                                Classical
                                                </label>
                                            </div>
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" name="genre[]" value="Folk" id="selectGenre">
                                                <label class="form-check-label m-0 mt-1">
                                                Folk
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-2">
                                            <div class="form-check d-flex align-items-center gap-2">
                                                <input class="form-check-input" type="checkbox" name="genre[]" value="Reggae" id="selectGenre">
                                                <label class="form-check-label m-0 mt-1">
                                                Reggae
                                                </label>
                                            </div>
                                        </div>
                                        <div class="w-100">
                                            <button class="btn-upload-music d-flex align-items-center ms-auto mt-5 ms-3 gap-1">
                                                <i class='bx bx-save' ></i> Upload
                                            </button>
                                        </div>
                                    </div>       
                                </form>                         
                            </div>
                            <div class="tab-pane fade" id="pills-mymusic" role="tabpanel">
                                <div class="row py-4">
                                    <?php
                                        if(count($musicdata) > 0) {
                                        foreach ($musicdata as $row) {
                                    ?>
                                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="profile d-inline-flex justify-content-center align-items-center gap-3">
                                                        <div>
                                                            <img src="<?php echo base_url("/assets/uploads/music-banner/") . $row->music_banner; ?>" alt="" srcset="" class="img-fluid">
                                                        </div>
                                                        <div class="m-0 mt-1">
                                                            <h5 class="m-0"><?php echo $row->music_name; ?></h5>
                                                            <small class="m-0 mt-1"><?php echo $row->artist_name; ?></small>
                                                        </div>
                                                    </div>
                                                    <div class="audio-player mt-3">
                                                        <audio controls controlsList="nodownload" class="form-control">
                                                            <source src="<?php echo base_url("assets/uploads/music-file/") . $row->music_file; ?>" type="audio/mp3">
                                                            <source src="<?php echo base_url("assets/uploads/music-file/") . $row->music_file; ?>" type="audio/mp3">
                                                            <source src="<?php echo base_url("assets/uploads/music-file/") . $row->music_file; ?>" type="audio/mp3">
                                                        </audio>
                                                    </div>
                                                    <div class="pub mt-3">
                                                        <p class="text-muted m-0" style="font-size: 11px;">
                                                            Released: <?php echo $row->date_released; ?>
                                                        </p>
                                                        <p class="text-muted m-0" style="font-size: 11px;">
                                                            Genre: <?php echo $row->music_genre; ?>
                                                        </p>
                                                    </div>
                                                 </div>
                                                <div class="card-footer">
                                                    <a href="/delete-music/<?php echo $row->id; ?>" class="btn btn-danger w-100 mt-2 d-flex justify-content-center align-items-center">
                                                        <i class='bx bx-trash me-1 d-flex align-items-center'></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                        }
                                    } else {
                                    ?>
                                    <div class="col-12 mb-3">
                                        <div class="card">
                                            <div class="card-body p-4">
                                                No music uploads
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade modal-edit-banner" id="edit-banner" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered">
          <form action="/update-banner" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header border-0">
                <h5 class="modal-title" id="staticBackdropLabel">Update Banner Image</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <input type="file" name="file-banner" id="file-banner">
                </div>
                <div class="modal-footer border-0">
                <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
          </form>
        </div>
    </div>

<?php echo $_SESSION["role"]; ?>