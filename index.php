<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YoungGigs</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">
  <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
include 'authguard.php';
?>

  <div class="heroContainer">
    <div>
      <div class="hero-head">
        <b class="boldText">
          <div>Jobs for Unemployed Youth</div>
          <div>No Experience? No Problem</div>
        </b>

        <p class="heroLine">Empowering Youth through No Experience Job Opportunities</p>

        <div class="findContainer">
          <a href="./jobpage.php" class="text-decoration-none text-white FindJobBtn"> Find a Job</a>
        </div>
      </div>
    </div>
    <img src="assets/hero_svg.svg" alt="" srcset="" class="hero_svg">
    <div class="blue-blur"></div>
  </div>
  <div class="searchContainer">
    <div class="searchContainer2">
      <div class="searchJob">
        <input type="text" placeholder="Search for Jobs">
        <img src="assets/search.png" alt="">
      </div>
      <div class="dropdown">
        <div class="dropdown-content">
          <a href="#">Mumbai</a>
          <a href="#">Delhi</a>
          <a href="#">Banglore</a>
        </div>
        <span class="searchLocation">Location
          <img src="assets/arrow.png" alt="" srcset="">
        </span>
      </div>
      <div class="dropdown">
        <div class="dropdown-content">
          <a href="#">Part-Time</a>
          <a href="#">Full-Time</a>
          <a href="#">Remote</a>
        </div>
        <span class="searchType" onclick="openTypeMenu()">Type
          <img src="assets/arrow.png" alt="" srcset="">
        </span>
      </div>
      <button type="button" class="searchJobs" onclick="animateButton()"><a href="./jobpage.php" class="text-light text-decoration-none">Search</a></button>
      <img src="assets/loading.svg" alt="" class="unloading loader">
    </div>
  </div>
  <div class="cards">
    <div class="card1">
      <h2><b>Post a Featured Job</b></h2>
      <p>Posting a featured job increases visibility and attracts top talent. It stands out on the job board and often receives additional promotion through social media and email, boosting the chances of finding the right candidate.</p>
      <button>Post a featured job</button>
    </div>
    <div class="card2">
      <h2><b>Post a Free Job</b></h2>
      <p>Posting a free job listing is budget-friendly and reaches a large pool of job seekers, offering a cost-effective solution for filling positions with qualified candidates. It can also help build a talent pipeline for future job openings.</p>
      <button>Post a free job</button>
    </div>
  </div>

  <div class=" my-5 bg-color">
    <footer class="">
      <div class="row">
        <div class="col-2">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
          </ul>
        </div>

        <div class="col-2">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
          </ul>
        </div>

        <div class="col-2">
          <h5>Section</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
          </ul>
        </div>

        <div class="col-4 offset-1">
          <form>
            <h5>Subscribe to our newsletter</h5>
            <p>Monthly digest of whats new and exciting from us.</p>
            <div class="d-flex w-100 gap-2">
              <label for="newsletter1" class="visually-hidden">Email address</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
              <button class="btn btn-primary" type="button">Subscribe</button>
            </div>
          </form>
        </div>
      </div>

      <div class="d-flex justify-content-between py-4 my-4 border-top mt-5">
        <p>© 2021 Company, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#twitter"></use>
              </svg></a></li>
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#instagram"></use>
              </svg></a></li>
          <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                <use xlink:href="#facebook"></use>
              </svg></a></li>
        </ul>
      </div>
    </footer>
  </div>

  <script src="index.js"></script>
</body>

</html>