<?php

$data = file_get_contents('data/pizza.json');
$menu = json_decode($data, true);

$menu = $menu["menu"];
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

    <title>Lidya HUT</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">
        <img src="img/logo.png" width="120">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
              aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="#">All Menu</a>
        </div>
      </div>
    </nav>

    <div class="container">

      <div class="row mt-3">
        <div class="col">
          <h1>All Menu</h1>
        </div>
      </div>

      <div class="row">
        <?php foreach ($menu as $row ) : ?>
        <div class="col-md-4">
          <div class="card mb-3">
            <img src="img/menu/<?= $row ['gambar'];?>" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title"><?= $row ['nama'];?></h5>
              <p class="card-text"><?= $row ['deskripsi'];?></p>
              <h5 class="card-title">Rp. <?= $row ['harga'];?></h5>
              <a href="" class="herf">Pesan Sekarang</a>
            </div>
          </div>
        </div>
        <?php endforeach ; ?>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
          integrity="sha384-wHAiFfRlMFy0IjXkM6pHmsZfE5Db0B8wx1iCk+gydUxGJF1liow9WVRVY+P30Jv7"
          crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
          integrity="sha384-B0UglyR+LyTjoobA2Gz9F6VQe1KkWlR7Ck3q9kKgbFyj3zGz4Ck4pGZagCjkFqAK"
          crossorigin="anonymous"></script>
  </body>
</html>
