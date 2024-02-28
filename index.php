<?php
require 'data.php';

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ISFI Smartphone</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-phone-list">

    <nav class="navbar navbar-expand-lg background-nav">
        <div class="container">
            <a class="navbar-brand text-light fw-bold" href="#">Phone'Fi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-secondary disabled" aria-disabled="true">Transaction</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="logout.php" class="btn btn-outline-light">Logout</a>
                </div>

            </div>
        </div>
        </div>
    </nav>

    <!-- Main Hero Body -->
    <div class="container-fluid" style="background-color: #022560; padding-bottom: 9.5em;">
        <div class="row gx-4 pt-5">
            <div class="col-6">
                <div class="p-5 mb-4 bg-body-light text-white rounded-3">
                    <div class="container py-5" style="margin-left: 3em;">
                        <h2 class="display-5 fw-bold">Let's Take a Technology,</h2>
                        <h1 class="display-5 fw-bold" style="color: #bdd8ff;">With Our Smarhphone</h1>
                        <p class="col-md-11 fs-4 text-white">the best place to find your favorite phone, feel the best technologies</p>
                        <a href="#phone-list" class="btn btn-primary">View Phone</a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <img src="assets/image/hero-image.png" class="img-fluid w-75 mt-5 shadow-lg" style="margin-left: 5em;" alt="Hero Image" style="width: 100%; height: auto;">
            </div>
        </div>
    </div>

    <!-- Book List -->
    <div class="container bg-phone-list" style="padding-top: 3em; padding-bottom: 7em;" id="phone-list">
        <h2 class="text-left mb-4 text-light">The Best Phone List</h2>
        <div class="row gx-3 gy-3">
            <?php foreach ($phones as $index => $value) : ?>
                <div class="col-md-3">
                    <div class="card  h-100">
                        <img src="assets/image/<?= $value['image'] ?>" class="card-img-top" alt="<?= $value['title'] ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $value['title'] ?></h5>
                            <p class="card-text">Rp. <?= number_format($value['price'], 0) ?></p>
                            <a href="transaction.php?id=<?= $index ?>" class="btn btn-primary">Buy</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </div>

    <!-- footer -->
    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 background-nav">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2024. All rights reserved.
        </div>
        <!-- Copyright -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>