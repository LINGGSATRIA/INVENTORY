<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISFO SUCAD LEO</title>

    <!-- Custom fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <link href="<?= base_url("Assets/sbadmin/login.css") ?>" rel="stylesheet">
    <link href="<?= base_url("Assets/sbadmin/tambahan.css") ?>" rel="stylesheet">

    <style>
        /* background: linear-gradient(135deg, #1D4B2C 0%, #0F2E1B 50%, #0A1F12 100% */
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg,rgb(19, 50, 30) 0%,rgb(46, 97, 64) 50%,rgb(66, 132, 92) 100%);
            height: 100vh;
        }
        .card {
            border-radius: 15px;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #26d0ce;
            box-shadow: 0 0 0 0.2rem rgba(38, 208, 206, 0.25);
        }
        .btn-login {
            background: linear-gradient(135deg,rgb(19, 50, 30) 0%,rgb(71, 147, 99) 50%,rgb(125, 213, 159) 100%);
            border: none;
            border-radius: 10px;
            padding: 12px;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .logo-container {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo-container img {
            width: 80px;
            margin-bottom: 15px;
        }
        .tank-image {
            width: 100px;
            animation: moveRight 2s infinite linear;
        }
        @keyframes moveRight {
            from { transform: translateX(-100px); }
            to { transform: translateX(100px); }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-xl-4 col-lg-6 col-md-8">
                <div class="card">
                    <div class="card-body p-5">
                        <div class="logo-container">
                            <img src="<?= base_url('Assets/sbadmin/img/kav-01.PNG') ?>" alt="SILEO Logo">
                            <h1 class="h3 text-dark font-weight-bold">SISFO SUCAD LEO</h1>
                            <p class="text-muted">Selamat datang kembali</p>
                        </div>

                        <?php if ($errors = session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php if (is_array($errors)): ?>
                                    <ul class="mb-0">
                                        <?php foreach ($errors as $error): ?>
                                            <li><?= esc($error) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <?= esc($errors) ?>
                                <?php endif; ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>

                        <form action="<?= site_url('auth/authenticate') ?>" method="POST">
                            <div class="form-group mb-4">
                                <label class="text-muted">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="email" placeholder="Masukkan email anda" required>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label class="text-muted">Password</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="Masukkan password" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-login btn-block">
                                <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                            </button>
                        </form>

                        <!-- Animasi Tank -->
                        <div id="loading-animation" style="display: none; text-align: center; margin-top: 20px;">
                            <img src="<?= base_url('Assets/sbadmin/img/tank.png') ?>" alt="Loading Tank" class="tank-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault();
            document.getElementById("loading-animation").style.display = "block";
            setTimeout(() => {
                this.submit();
            }, 2000);
        });
    </script>
</body>

</html>