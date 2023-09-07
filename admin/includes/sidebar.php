<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index">
       
            <img src="images/icon/logo.png" alt="Cool Admin" />
        
        <!-- <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> -->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item 
    <?php
        if($page == 'dashboard'){
            echo 'active';
        }
    ?>
    ">
        <a class="nav-link" href="index">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <li class="nav-item 
    <?php
        if($page == 'portfolio'){
            echo 'active';
        }
    ?>
    ">
        <a class="nav-link" href="portfolio">
            <i class="fas fa-fw fa-cog"></i>
            <span>Portfolio</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item 
    <?php
        if($page == 'service'){
            echo 'active';
        }
    ?>
    ">
        <a class="nav-link" href="services">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Services</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item 
    <?php
        if($page == 'sliders'){
            echo 'active';
        }
    ?>
    ">
        <a class="nav-link" href="sliders">
            <i class="fas  fa-sliders-h"></i>
            <span> Sliders </span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item 
    <?php
        if($page == 'team'){
            echo 'active';
        }
    ?>
    ">
        <a class="nav-link" href="team">
            <i class="fas  fa-users-cog"></i>
            <span> Team </span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item 
    <?php
        if($page == 'news'){
            echo 'active';
        }
    ?>
    ">
        <a class="nav-link" href="news">
            <i class="fas  fa-newspaper"></i>
            <span> Updates </span>
        </a>
    </li> 
    <hr class="sidebar-divider">
    <li class="nav-item 
    <?php
        if($page == 'products'){
            echo 'active';
        }
    ?>
    ">
        <a class="nav-link" href="products">
            <i class="fas fa-fw fa-wrench"></i>
            <span> Products </span>
        </a>
    </li> 
    <hr class="sidebar-divider">
    <li class="nav-item 
    <?php
        if($page == 'gallery'){
            echo 'active';
        }
    ?>
    ">
        <a class="nav-link" href="gallery">
        <i class="fas fa-images"></i>
            <span> Gallery </span>
        </a>
    </li> 
    <hr class="sidebar-divider">
    <li class="nav-item 
    <?php
        if($page == 'videos'){
            echo 'active';
        }
    ?>
    ">
        <a class="nav-link" href="new_video">
        <i class="fas fa-video"></i>
            <span> Videos </span>
        </a>
    </li> 
    <hr class="sidebar-divider">
    <li class="nav-item 
    <?php
        if($page == 'youtube'){
            echo 'active';
        }
    ?>
    ">
        <a class="nav-link" href="youtube_videos">
        <i class="fab fa-youtube"></i>
            <span> Youtube Videos </span>
        </a>
    </li> 
    <hr class="sidebar-divider">
    <li class="nav-item 
    <?php
        if($page == 'partners'){
            echo 'active';
        }
    ?>
    ">
        <a class="nav-link" href="partners">
        <i class="fas fa-users"></i>
            <span> Partners </span>
        </a>
    </li>
    <hr class="sidebar-divider">
    <li class="nav-item 
    <?php
        if($page == 'faqs'){
            echo 'active';
        }
    ?>
    ">
        <a class="nav-link" href="faqs">
        <i class="fas fa-question"></i>
            <span> Faqs </span>
        </a>
    </li>  

    
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>


<!-- <aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="images/icon/logo.png" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a href="index.php">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li class="has-sub">
                    <a class="js-arrow dropdown-toggle" href="#" data-toggle="dropdown"  aria-haspopup="true"
                    aria-expanded="false">
                        <i class="fas fa-list-ol"></i>Our Portfolio</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="portfolio.php">View Portfolio</a>
                        </li>
                        <li>
                            <a href="add_to_portfolio.php">Add to Portfolio</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-briefcase"></i>Our Services</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="services.php">View Services</a>
                        </li>
                        <li>
                            <a href="add_service.php">Add Service</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-bars"></i>Slider Images</i></a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="sliders.php">View Slider</a>
                        </li>
                        <li>
                            <a href="add_slider.php">Add Slider</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow dropdown-toggle" href="#" data-toggle="dropdown"  aria-haspopup="true"
                    aria-expanded="false">
                        <i class="fas fa-users"></i>Our Team</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="team.php">View Team</a>
                        </li>
                        <li>
                            <a href="add_member.php">Add Member</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow dropdown-toggle" href="#" data-toggle="dropdown"  aria-haspopup="true"
                    aria-expanded="false">
                        <i class="fas fa-newspaper-o"></i>News</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="news.php">View News</a>
                        </li>
                        <li>
                            <a href="add_news_feed.php">Add News</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow dropdown-toggle" href="#" data-toggle="dropdown"  aria-haspopup="true"
                    aria-expanded="false">
                        <i class="fas fa-camera"></i>Gallery</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="gallery.php">View Gallery</a>
                        </li>
                        <li>
                            <a href="add_to_gallery.php">Add to Gallery</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow dropdown-toggle" href="#" data-toggle="dropdown"  aria-haspopup="true"
                    aria-expanded="false">
                        <i class="fas fa-video-camera"></i>Videos</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="videos.php">View Videos</a>
                        </li>
                        <li>
                            <a href="add_new_video.php">Add Video</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow dropdown-toggle" href="#" data-toggle="dropdown"  aria-haspopup="true"
                    aria-expanded="false">
                        <i class="fas fa-youtube"></i>YouTube Videos</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="youtube_videos.php">YouTube Videos</a>
                        </li>
                        <li>
                            <a href="add_youtube_video.php">Add YouTube Video</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow dropdown-toggle" href="#" data-toggle="dropdown"  aria-haspopup="true"
                    aria-expanded="false">
                        <i class="fas fa-comments"></i>Testimonials</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="testimonials.php">View Testimonials</a>
                        </li>
                        <li>
                            <a href="add_testimonial.php">Add Testimonial</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow dropdown-toggle" href="#" data-toggle="dropdown"  aria-haspopup="true"
                    aria-expanded="false">
                        <i class="fas fa-user"></i>Our Partners</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="partners.php">View Partners</a>
                        </li>
                        <li>
                            <a href="add_partner.php">Add Partner</a>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="js-arrow dropdown-toggle" href="#" data-toggle="dropdown"  aria-haspopup="true"
                    aria-expanded="false">
                        <i class="fas fa-question-circle"></i>Faqs</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="faqs.php">View Faqs</a>
                        </li>
                        <li>
                            <a href="add_faq.php">Add Faq</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside> -->