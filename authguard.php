

<div class="navbarBox">
    <div class="navbarContainer">
      <div>
        <a href="index.php"><img src="assets/YoungGigs.svg" alt="" class="logo"></a>
      </div>
      <ul class="navbarLinks list-unstyled">
        <!-- <li><a href="jobpage.php" class="text-decoration-none text-body-secondary">Find Work</a></li>
        <li><a href="" class="text-decoration-none text-body-secondary">Applications</a></li>
        <li><a href="" class="text-decoration-none text-body-secondary">Upskill</a></li>
        <li><a href="postJob.html" class="text-decoration-none text-body-secondary">Post Job</a></li> -->
        <?php
        session_start();
        if(isset($_SESSION['user_id'])){
          $userID = $_SESSION['user_id'];
        }
        else{
          $userID = "";
        }

        if(isset($_SESSION['is_hr'])){
          $isHR = $_SESSION['is_hr'];
        }
        else{
          $isHR = "not-login";
        }
        if($isHR==='yes' && isset($_SESSION['email'])){
          echo '
          <li><a href="postJob.php" class="text-decoration-none text-body-secondary">Post Job</a></li>
          <li><a href="applicationGot.php" class="text-decoration-none text-body-secondary">Applications Received</a></li>
          ';
        }
        else if($isHR==='no' && isset($_SESSION['email'])){
          echo '
          <li><a href="jobpage.php" class="text-decoration-none text-body-secondary">Find Work</a></li>
          <li><a href="application.php" class="text-decoration-none text-body-secondary">Applications</a></li>
          <li><a href="upskill.php" class="text-decoration-none text-body-secondary">Upskill</a></li>
          ';
        }
        else if($isHR == "not-login" ){
          echo '
          <li><a href="jobpage.php" class="text-decoration-none text-body-secondary">Find Work</a></li>
          <li><a href="" class="text-decoration-none text-body-secondary">Applications</a></li>
          <li><a href="upskill.php" class="text-decoration-none text-body-secondary">Upskill</a></li>
          <li><a href="postJob.php" class="text-decoration-none text-body-secondary">Post Job</a></li>
          ';
        }
        ?>
      </ul>

      <div class="d-flex gap-2 justify-content-center">
      <?php
        if (!isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION['email']) && isset($_SESSION['name'])) {
          $name = $_SESSION['name'];

          echo '<p class=" ">Welcome, ' . $name . '</p>
                <a href="logout.php" class="btn btn-danger">Logout</a>
                  ';
        } else {
          echo '<a href="login.html" class="text-decoration-none btn btn-danger text-white">Login</a>';
        }
        ?>


      </div>
    </div>
  </div>
