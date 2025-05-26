<?php
function get_CRUL($url)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
}

$result = get_CRUL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCkXmLjEr95LVtGuIm3l2dPg&key=AIzaSyDXo2Gc1w5Gl5zRZnNdQxLHwkybNi0a2vw');



$youtuProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];

$channelName = $result['items'][0]['snippet']['title'];

$subcribers = $result['items'][0]['statistics']['subscriberCount'];


//latest video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyDXo2Gc1w5Gl5zRZnNdQxLHwkybNi0a2vw&channelId=UCkXmLjEr95LVtGuIm3l2dPg&maxResults=1&order=date&part=snippet';
$result = get_CRUL($urlLatestVideo);
$latestVideoId = $result ['items'][0]['id']['videoId'];

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lidya's Universe – Portfolio & Film Explorer</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <div class="container">
    <a class="navbar-brand" href="#">Lidya's Universe</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCombined">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCombined">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="#search">Inspiration</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
        <li class="nav-item"><a class="nav-link" href="#social">Social</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Search Movie Section -->
<section id="search" class="pt-5 mt-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 text-center">
        <h1 class="mb-3">Inspiration Through Movies 🎮</h1>
        <p class="text-muted">Find movies that inspire my work. What inspires you?</p>
        <div class="input-group mb-4">
          <input type="text" class="form-control" placeholder="Movie title..." id="search-input">
          <div class="input-group-append">
            <button class="btn btn-dark" type="button" id="search-button">Search</button>
          </div>
        </div>
      </div>
    </div>
    <div class="row" id="movie-list"></div>
  </div>
</section>

<!-- Jumbotron (Home) -->
<div class="jumbotron text-center" id="home">
  <img src="img/profile1.png" class="rounded-circle img-thumbnail" width="150">
  <h1 class="display-4">Lidya Afriwaningsih</h1>
  <h3 class="lead">Student | Developer | Film Enthusiast</h3>
</div>

<!-- About -->
<section class="about" id="about">
  <div class="container">
    <div class="row mb-4">
      <div class="col text-center"><h2>About</h2></div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-5"><p>I am passionate about combining storytelling and design. Movies play a big role in shaping how I present ideas visually.</p></div>
      <div class="col-md-5"><p>This site showcases not just my projects, but the sources of my creative fuel. Let’s explore creativity through code and cinema!</p></div>
    </div>
  </div>
</section>

<!-- Portfolio -->
<section class="portfolio" id="portfolio">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center">
        <h2>Portfolio</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/1.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>            </div>
          </div>
        </div>

      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/2.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>

      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/3.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>   
    </div>

    <div class="row">
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/4.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div> 
      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/5.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
          </div>
        </div>
      </div>

      <div class="col-md mb-4">
        <div class="card">
          <img class="card-img-top" src="img/thumbs/6.png" alt="Card image cap">
          <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Social Media -->
<section class="social bg-light" id="social">
  <div class="container">
    <div class="row pt-4 mb-4">
      <div class="col text-center"><h2>Social Media</h2></div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-5">
        <div class="row">
          <div class="col-md-4"><img src="<?= $youtuProfilePic ?>" width="100" class="rounded-circle img-thumbnail"></div>
          <div class="col-md-8">
            <h5><?= $channelName; ?></h5>
            <p><?= $subcribers ?> Subscribers</p>
            <div class="g-ytsubscribe" data-channelid="UCkXmLjEr95LVtGuIm3l2dPg" data-layout="default" data-count="default"></div>
          </div>
        </div>
        <div class="row mt-3 pb-3">
          <div class="col">
            <div class="embed-responsive embed-responsive-16by9">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId; ?>?rel=0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white mt-5 p-3 text-center">
  <div class="container">
    <p>Copyright &copy; <?= date('Y'); ?>.</p>
  </div>
</footer>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="https://apis.google.com/js/platform.js"></script>
<script src="js/script.js"></script>

</body>
</html>