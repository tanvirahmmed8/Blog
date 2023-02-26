
<!-- Main Menu Start -->

<div class="site-navigation main_menu " id="mainmenu-area">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                    <?php $header_logo = $db->select('logos',"logo_value",null,"logo_key='frontend_header_logo'"); ?>
                    <img src="uploads/logos/<?=$header_logo[0]['logo_value']?>" alt="<?=$brand[0]['setting_value']?>" class="img-fluid">
                </a>

                <!-- Toggler -->

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span>
                </button>

                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="navbarMenu">
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item ">
                            <a href="index.php" class="nav-link js-scroll-trigger">
                                Home
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="about.php" class="nav-link js-scroll-trigger">
                                About us
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="contact.php" class="nav-link">
                                Contact
                            </a>
                        </li>
                    </ul>

                    <ul class="header-contact-right d-none d-lg-block">
                        <li><a href="#" class="header-search search_toggle"> <i class="fa fa fa-search"></i></a></li>
                    </ul>
                   
                </div> <!-- / .navbar-collapse -->
            </div> <!-- / .container -->
        </nav>
    </div>