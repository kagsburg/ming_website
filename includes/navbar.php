<div class="site-top-2">
  <header class="header nav-down" id="header-2">
    <div class="container">
      <div class="row">
        <div class="logo-area clearfix">
          <div class="logo col-lg-3 col-md-12">
            <a href="<?php echo BASE_URL;?>/.">
              <img src="images/footer-logo.png" alt="" />
            </a>
          </div>
          <!-- logo end-->
          <div class="col-lg-9 col-md-12 pull-right">
            <ul class="top-info unstyled">
              <li>
                <span class="info-icon"><i class="icon icon-phone3"></i></span>
                <div class="info-wrapper">
                  <p class="info-title">24/7 Response Time</p>
                  <p class="info-subtitle">+255-767-145-678</p>
                </div>
              </li>
              <li>
                <span class="info-icon"><i class="icon icon-envelope"></i></span>
                <div class="info-wrapper">
                  <p class="info-title">Send Your Query</p>
                  <p class="info-subtitle">info@minagricoengineering.com</p>
                </div>
              </li>
            </ul>
          </div>
          <!-- Col End-->
        </div>
        <!-- Logo Area End-->
      </div>
    </div>
    <!-- Container end-->
    <div class="site-nav-inner site-navigation navigation navdown">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="icon icon-menu"></i></span>
          </button>
          <!-- End of Navbar toggler-->
          <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
            <ul class="navbar-nav">
              <li class="nav-item dropdown
              <?php if($page == 'home'){echo 'active';} ?>
              ">
                <a class="nav-link" href="<?php echo BASE_URL;?>/.">Home</a>
              </li>
              <!-- li end-->
              <li class="nav-item dropdown 
              <?php if($page=='team'|| $page=='faq' || $page=='about' ){echo 'active';} ?>
              "><a class="nav-link" href="#" data-toggle="dropdown">Company<i
                    class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo BASE_URL;?>/about">About Us</a></li>
                  <li><a href="<?php echo BASE_URL;?>/team">Our Team</a></li>
                  <li><a href="<?php echo BASE_URL;?>/faq">Faq</a></li>
                </ul>
              </li>
              <!-- li end-->
              <li class="nav-item dropdown 
              <?php if($page=='service'|| $page=='products' ){echo 'active';} ?>
              "><a class="nav-link" href="#" data-toggle="dropdown">what we do<i
                    class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo BASE_URL;?>/service">Services</a></li>
                  <li><a href="<?php echo BASE_URL;?>/products">Products</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown  <?php if($page == 'port'){echo 'active';} ?>">
                <a href="<?php echo BASE_URL;?>/portfolio">Our Portfolio</a>
              </li>
              <li class="nav-item dropdown  <?php if($page == 'media'){echo 'active';} ?>"><a class="nav-link" href="#" data-toggle="dropdown">Multimedia<i
                    class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?php echo BASE_URL;?>/gallery">Gallery</a></li>
                  <li><a href="<?php echo BASE_URL;?>/videos">Videos</a></li>
                  <li><a href="<?php echo BASE_URL;?>/news">News</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown  <?php if($page == 'contact'){echo 'active';} ?>">
                <a href="contact">Contact</a>
              </li>
            </ul>
            <!--Nav ul end-->
          </div>
          <a href="<?php echo BASE_URL;?>/contact" class="top-right-btn btn" style="background: #FF9C33; color: white;">Request a Quote</a>
          <!-- Top bar btn -->
        </nav>
        <!-- Collapse end-->
      </div>
    </div>
    <!-- Site nav inner end-->
  </header>
  <!-- Header end-->
</div>