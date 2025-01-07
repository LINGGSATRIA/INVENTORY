<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISFO SUCAD LEO</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url("Assets/sbadmin/login.css") ?>" rel="stylesheet">
    <link href="<?= base_url("Assets/sbadmin/tambahan.css") ?>" rel="stylesheet">

</head>

<body class="bg-image bg-blur">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-4 col-lg-6 col-md-3 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">SISFO SUCAD LEO</h1>
                                    </div>
                                    <?php if ($errors = session()->getFlashdata('error')): ?>
                                        <div class="alert alert-danger">
                                            <?php if (is_array($errors)): ?>
                                                <ul>
                                                    <?php foreach ($errors as $error): ?>
                                                        <li><?= esc($error) ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php else: ?>
                                                <?= esc($errors) ?>
                                            <?php endif; ?>
                                        </div>
                                    <?php endif; ?>

                                    <!-- Form login -->
                                    <form action="<?= site_url('auth/authenticate') ?>" method="POST" class="user">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password" required>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-user btn-block">Login</button>
                                        <!-- Animasi Tank -->
                                        <div id="loading-animation" style="display: none; position: fixed; top: 50%; left: 40%; transform: translate(-50%, -50%); z-index: 9999;">
                                            <img src="<?= base_url('Assets/sbadmin/img/tank.png') ?>" alt="Loading Tank" class="tank-image">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector("form").addEventListener("submit", function(event) {
            // Mencegah pengiriman form default
            event.preventDefault();

            // Tampilkan animasi tank
            document.getElementById("loading-animation").style.display = "block";

            // Simulasikan proses login
            setTimeout(() => {
                this.submit(); // Kirim form setelah animasi selesai
            }, 2000); // Durasi animasi (ms)
        });
    </script>
</body>

</html>