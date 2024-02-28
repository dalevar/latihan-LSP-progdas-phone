<?php
require 'data.php';
$id = $_GET['id'];
$phone = $phones[$id];

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$username = $_SESSION['username'];
$no_transaction = "MBP" . rand(100, 999) . date('dmy');
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

<body>
    <nav class="navbar navbar-expand-lg background-nav">
        <div class="container">
            <a class="navbar-brand text-light fw-bold" href="index.php">Phone'Fi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-secondary" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light active" aria-disabled="true">Transaction</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="logout.php" class="btn btn-outline-light">Logout</a>
                </div>

            </div>
        </div>
        </div>
    </nav>

    <!-- Main Transaction Body -->
    <div class="container-fluid" style="background-color: #121a54; padding-bottom: 2em;">
        <div class="row gx-4 pt-5">
            <div class="col-6">
                <div class="p-5 mb-4 bg-body-light text-white rounded-3">
                    <div class="container py-5" style="margin-left: 3em;">
                        <img src="assets/image/<?= $phone['image'] ?>" class="img-fluid w-75 mt-2 shadow-lg" alt="Transaction Image" style="width: 100%; height: auto;">
                        <h2 class="display-5 fw-bold mt-3"><?= $phone['title'] ?></h2>

                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="p-5 mb-4 bg-body-light text-white rounded-3">
                    <div class="container py-5">
                        <h2 class="display-5 fw-bold">Transaction Detail</h2>
                        <p class="col-md-12 fs-4 text-white">Please complete the payment to continue the transaction</p>
                        <form>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="transaction-id" class="form-label">Transaction ID</label>
                                    <input type="text" class="form-control" id="transaction-id" value="<?= $no_transaction ?>">
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="date" class="form-label">Date Transaction</label>
                                    <input type="date" class="form-control" id="date-transaction">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $username ?>" readonly disabled>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?= $phone['title'] ?>" disabled readonly>
                                </div>
                                <div class="mb-3 col-6">
                                    <label for="price" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="price" name="price" value="Rp. <?= number_format($phone['price'], 0) ?>" readonly disabled>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-2">
                                    <label for="fullname" class="form-label">Quantity</label>
                                    <input type="number" min="1" class="form-control" id="quantity" name="quantity" required>
                                </div>
                                <div class="mb-3 col-10">
                                    <label for="address" class="form-label">Package</label>
                                    <select name="paket" id="paket" class="form-control" required>
                                        <option value="0">Choose Package</option>
                                        <?php foreach ($paketTambahan as $paket) : ?>
                                            <option value="<?= $paket['price'] ?>"><?= $paket['paket'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>
                            <div class="mb-3">
                                <label for="payment" class="form-label">Total Payment</label>
                                <input type="text" class="form-control" id="payment" name="payment" readonly disabled>
                            </div>

                            <div class="row mx-0 mb-2 col-3">
                                <button type="button" id="check-out" class="btn btn-primary" data-bs-toggle="" data-bs-target="">Check Out</button>
                            </div>
                            <a href="index.php" style="color: #bdd8ff;">Back to home</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Informasion Checkout</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Checkout Success <br> Thank you for your transaction
                </div>
                <div class="modal-footer">
                    <a href="index.php" class="btn btn-success">Save Transaction</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        let price = <?= $phone['price'] ?>;
        let package = document.getElementById('paket');
        let quantity = document.getElementById('quantity');

        quantity.addEventListener('input', function() {
            package.addEventListener('input', function() {
                let total = price * quantity.value + parseInt(package.value);
                document.getElementById('payment').value = 'Rp. ' + total.toLocaleString('id-ID');
            })
        });

        let buttonSave = document.getElementById('check-out');
        buttonSave.addEventListener('click', function() {
            if (quantity.value || package.value > 0) {
                let modal = new bootstrap.Modal(document.getElementById('Modal'));
                modal.show();
            } else {
                alert('Please complete the form');
            }
        });
    </script>
</body>

</html>