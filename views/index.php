
<?php
require_once "../public/header1.php";
require_once "../class/Staff.php";
?>
  <!--Banner-->
  <div class="banner">
    <div class="bg-color">
      <div class="container">
        <div class="row">
          <div class="banner-text text-center">
            <div class="text-border">
              <h2 class="text-dec">UI GRADUATING STUDENTS' CLEARANCE</h2>
            </div>
            <div class="intro-para text-center quote">
              <p class="big-text">Very fast . . . and impartial.</p>
              <p class="small-text">Log in, upload your documents, and let's get it done for you in real time<br></p>
              <a href="feature.php" class="btn get-quote">READ MORE</a>
            </div>
            <a href="#feature" class="mouse-hover">
              <div class="mouse"></div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Banner-->
  <!--Feature-->
  <?php
    $obj = new Staff();
    //$obj->A();

  ?>

  <section id="feature" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Features</h2>
          <p>This clearance system allows you to log in into your personal account with your login details to start your session so as to be <br/> able to perform your clearance exercise... <a href="/feature" class="btn btn-info">Read more</a></p>
          <hr class="bottom-line">
        </div>
        <div class="feature-info">
          <div class="fea">
            <div class="col-md-4">
              <div class="heading pull-right">
                <h4>Latest Info</h4>
                <p>Graduating students are to be informed that the graduating students'clearance exercise begins on the 3rd of February 2018 and it will be on for  ... </p>
                <p><a href="info.php" class="btn btn-info">Read more</a></p>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-info"></i>
              </div>
            </div>
          </div>
          <div class="fea">
            <div class="col-md-4">
              <div class="heading pull-right">
                <h4>How To</h4>
                <p>This clearance system allows graduating students to do their clearance online without any physical presence in clearance units. Here are the steps ...</p>
                <p><p><a href="howto.php" class="btn btn-info">Read more</a></p></p>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-question"></i>
              </div>
            </div>
          </div>
          <div class="fea">
            <div class="col-md-4">
              <div class="heading pull-right">
                <h4>Credit</h4>
                <p>University of Ibadan's online clearance system has been automated. Graduating students do not needs to pass through the formal manual preocess to ...</p>
                <p><p><a href="feature.php#credit" class="btn btn-info">Read more</a></p></p>
              </div>
              <div class="fea-img pull-left">
                <i class="fa fa-trophy"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ feature-->
<?php
require_once "../public/footer.php";
?>
    

</body>

</html>
