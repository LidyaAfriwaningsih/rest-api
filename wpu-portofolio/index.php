<?php
function get_CRUL($url) {
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => 1
    ]);
    $result = curl_exec($curl);
    curl_close($curl);
    return json_decode($result, true);
}

$apiKey = 'AIzaSyDXo2Gc1w5Gl5zRZnNdQxLHwkybNi0a2vw';

$channels = [
    'webprogrammingUNPAS' => 'UCkXmLjEr95LVtGuIm3l2dPg',
    'PNZ' => 'UC14ZKB9XsDZbnHVmr4AmUpQ'
];

$data = [];

foreach ($channels as $key => $channelId) {
    // Data channel
    $urlChannel = "https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=$channelId&key=$apiKey";
    $channelData = get_CRUL($urlChannel);

    $data[$key]['profilePic'] = $channelData['items'][0]['snippet']['thumbnails']['medium']['url'];
    $data[$key]['channelName'] = $channelData['items'][0]['snippet']['title'];
    $data[$key]['subscribers'] = $channelData['items'][0]['statistics']['subscriberCount'];

    // Video terbaru
    $urlVideo = "https://www.googleapis.com/youtube/v3/search?key=$apiKey&channelId=$channelId&maxResults=1&order=date&part=snippet";
    $videoData = get_CRUL($urlVideo);

    $data[$key]['latestVideoId'] = $videoData['items'][0]['id']['videoId'];
}

// Akses data jika dibutuhkan:
$wpuProfilePic = $data['webprogrammingUNPAS']['profilePic'];
$wpuName = $data['webprogrammingUNPAS']['channelName'];
$wpuSubs = $data['webprogrammingUNPAS']['subscribers'];
$wpuLatestVideo = $data['webprogrammingUNPAS']['latestVideoId'];

$pznProfilePic = $data['PNZ']['profilePic'];
$pznName = $data['PNZ']['channelName'];
$pznSubs = $data['PNZ']['subscribers'];
$pznLatestVideo = $data['PNZ']['latestVideoId'];
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>
    <nav id="mainNavbar" class="navbar navbar-expand-lg bg-dark navbar-dark navbar-dark-theme fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">Lidya Afriwaningsih</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link active" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>


<!-- Jumbotron -->
<div class="jumbotron py-5" id="home" style="margin-bottom: 2rem;">
  <div class="container text-center">
    <img src="img/profile2.png" class="rounded-circle img-thumbnail mb-3" style="width: 150px; height: 150px;">
    <h2 class="mb-2">Lidya Afriwaningsih</h2>
    <h5 class="lead">Student | Information System | 2217020009</h5>
  </div>
</div>



  <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <p>I am an Information Systems student with a focus on web-based system development, data analysis, and the application of technology to improve business process efficiency. I have experience in designing and implementing digital systems, including a Laravel-based administrative letter system for a government institution. I am also actively involved in academic research that integrates technology with user needs.</p>
          </div>
          <div class="col-md-5">
            <p>I possess skills in system requirements analysis, web programming, technical documentation, and effective team communication. I am committed to continuous learning and growth in the field of information technology, particularly in designing adaptive and user-oriented digital solutions that address real-world challenges.</p>
          </div>
        </div>
      </div>
    </section>


    <!-- Youtube & instagram -->
    <section class="social bg-light" id="social">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Learning Platform</h2>
          </div>
        </div>
        
        <div class="row justify-content-center">
          <div class="col-md-5 mb-4">
            <div class="row">
              <div class="col-md-4">
                <img src="<?= $wpuProfilePic ?>" width="200" class="rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8">
                <h5><?= $wpuName;?></h5>
                <p><?= $wpuSubs?> Subsribers.</p>
                <div class="g-ytsubscribe" data-channelid="UCkXmLjEr95LVtGuIm3l2dPg" data-layout="default" data-count="default"></div>
              </div>
            </div>
            <div class="row mt-3 pb-3">
              <div class="col">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $wpuLatestVideo; ?>?rel=0" allowfullscreen></iframe>
              </div>
              </div>
            </div>            
          </div>

          <div class="col-md-5 mb-4">
            <div class="row">
              <div class="col-md-4">
                <img src="<?= $pznProfilePic ?>" width="200" class="rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8">
                <h5><?= $pznName;?></h5>
                <p><?= $pznSubs?> Subsribers.</p>
                <div class="g-ytsubscribe" data-channelid="UC14ZKB9XsDZbnHVmr4AmUpQ" data-layout="default" data-count="default"></div>
              </div>
            </div>
            <div class="row mt-3 pb-3">
              <div class="col">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $pznLatestVideo; ?>?rel=0" allowfullscreen></iframe>
              </div>
              </div>
            </div>
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
          <!-- Card 1 -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm border-0 h-100">
              <div class="position-relative overflow-hidden">
                <img src="img/thumbs/6.png" class="card-img-top img-fluid hover-zoom" alt="OMDB Movie App">
              </div>
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">OMDB Movie Finder</h5>
                <p class="card-text text-muted flex-grow-1">
                  A simple web application that allows users to search movies using the OMDB API and view their details including posters, years, and more.
                </p>
                <a href="search.html" class="btn btn-dark mt-auto d-flex align-items-center justify-content-center gap-2">
                  <i class="bi bi-film"></i> View Project
                </a>
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="card shadow-sm border-0 h-100">
              <div class="position-relative overflow-hidden">
                <img src="img/thumbs/6.png" class="card-img-top img-fluid hover-zoom" alt="Projek Pizza">
              </div>
              <div class="card-body d-flex flex-column">
                <h5 class="card-title">Projek Pizza</h5>
                <p class="card-text text-muted flex-grow-1">
                  A simple restaurant menu web app that displays pizza items dynamically from a JSON data source. Built using HTML, CSS, JavaScript, and Bootstrap
                </p>
                <a href="pizza.html" class="btn btn-dark mt-auto d-flex align-items-center justify-content-center gap-2">
                  <i class="bi bi-film"></i> View Project
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Contact -->
    <section class="contact bg-light" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">UIN Imam Bonjol Padang</li>
              <li class="list-group-item">Sungai Bangek Kel. Balai Gadang Kec Koto Tangah, Padang</li>
              <li class="list-group-item">West Java, Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2025.</p>
          </div>
        </div>
      </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>