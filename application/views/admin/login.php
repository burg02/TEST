
    <div class="portal-content">
        <div class="container">
            <div class="d-inline-flex align-items-center gap-2 h-100">
                <h3>Admin Panel</h3>
                <h3 class="overlay aos-init aos-animate" data-aos="zoom-in">Portal</h3>
            </div>
            <form action="login" method="post">
                <?php
                   if(!empty($message)) {
                    echo '
                    <div class="alert alert-danger">
                    '.$message[0].'
                    </div>
                   ';
                   } 
                ?>
                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" autocomplete="disabled">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="disabled">
                </div>
                <button type="submit" class="btn btn-primary" name="login">Sign In</button>
            </form>
        </div>
    </div>


    <style>
        .form-control:focus, .btn-primary {
            box-shadow: none;
        }

        .btn-check:focus + .btn-primary, .btn-primary:focus {
            box-shadow: none;
        }

        .portal-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
            overflow: hidden;
        }

        .portal-content .container {
            width: 40%;
            margin: auto !important;
        }

        .portal-content h3 {
            font-weight: 800;
            font-size: 30px;
        }

        .portal-content h3.overlay {
            font-weight: 800;
            font-size: 30px;
            color: #fff;
            background-color: var(--secondary-background);
            padding: 0 15px 0 15px;
        }

        .portal-content form {
            margin-top: 10px;
            overflow: hidden;
        }

        .portal-content .form-control {
            color: var(--primary-text);
            background-color: var(--quinary-background);
            height: 60px;
            margin: 20px 0 20px 0;
        }
    </style>
