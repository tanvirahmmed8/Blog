<?php
$title="About Us";
require_once 'include/frontend/header.php';
?>


<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1>Who we are</h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="index.php">Home</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
                  About Us
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>
<?php $about = $db->select('about_us','about_us'); ?>
<section class="about-section section-padding about-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12"> 
            <?php echo htmlspecialchars_decode(stripslashes($about[0]['about_us']));?>
            </div>
        </div>
    </div>
</section>

<!-- <section class="counter-wrap pb-100">
    <div class="container">
        <div class="row">
             <div class="col-lg-12 counter-inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item">
                            <i class="ti-desktop"></i>
                            <div class="count">
                                <span class="counter h2">90</span>
                            </div>
                            <p>Expert Instructors</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item">
                            <i class="ti-agenda"></i>
                            <div class="count">
                                <span class="counter h2">1450</span>
                            </div>
                            <p>Total Courses</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">         
                        <div class="counter-item">
                            <i class="ti-heart"></i>
                            <div class="count">
                                <span class="counter h2">5697</span>
                            </div>
                            <p>Happy Students</p>
                        </div>
                    </div>
                
                    <div class="col-lg-3 col-md-6">
                        <div class="counter-item">
                            <i class="ti-microphone-alt"></i>
                            <div class="count">
                                <span class="counter h2">24</span>
                            </div>
                            <p>Creative Events</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about-section section-padding pt-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="section-heading">
                    <span class="subheading">Top Categories</span>
                    <h3>Learn new skills to go ahead for your career</h3>
                </div>

                <div class="about-content">
                    <div class="about-text-block">
                        <i class="bi bi-film"></i>
                        <h4>Details Video tutorial</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit</p>
                    </div>

                     <div class="about-text-block">
                        <i class="bi bi-support"></i>
                        <h4>World Class Support</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicin gelit</p>
                    </div>

                    <a href="#" class="btn btn-main-2"><i class="fa fa-check mr-2"></i>more About Support</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-img">
                    <img src="assets/images/bg/2-2.png" alt="" class="img-fluid">
                </div>
             </div>
        </div>
    </div>
</section>

<section class="cta-2 clients ">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-7">
                <div class="section-heading center-heading">
                    <span class="subheading">Working Partners</span>
                    <h3>Our valuable Partners</h3>
                </div>
            </div>
        </div>

        <div class="row cta-2-inner">
            <div class="col-lg-2 col-sm-6 ">
                <div class="client-logo">
                    <img src="assets/images/clients/logo1.png" alt="" class="img-fluid">
                </div>
            </div>
             <div class="col-lg-2 col-sm-6">
                <div class="client-logo">
                    <img src="assets/images/clients/logo2.png" alt="" class="img-fluid">
                </div>
            </div>
             <div class="col-lg-2 col-sm-6">
                <div class="client-logo">
                    <img src="assets/images/clients/logo3.png" alt="" class="img-fluid">
                </div>
            </div>
             <div class="col-lg-2 col-sm-6">
                <div class="client-logo">
                    <img src="assets/images/clients/logo4.png" alt="" class="img-fluid">
                </div>
            </div>
             <div class="col-lg-2 col-sm-6">
                <div class="client-logo">
                    <img src="assets/images/clients/logo5.png" alt="" class="img-fluid">
                </div>
            </div>
             <div class="col-lg-2 col-sm-6">
                <div class="client-logo">
                    <img src="assets/images/clients/logo6.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</section>
<section class="testimonial section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading text-center">
                    <span class="subheading">Testimonials</span>
                    <h3>Learn New Skills to Go Ahead for Your Career</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="testimonials-slides owl-carousel owl-theme">
                    <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eius autem aliquid pariatur rerum. Deserunt, praesentium.
                             Adipisci, voluptates nihil debitis</p>
                             <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="assets/images/clients/test-1.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>John Doe</h4>
                                <span class="designation">Developer</span>
                            </div>
                        </div>
                    </div>

                     <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eius autem aliquid pariatur rerum. Deserunt, praesentium.
                             Adipisci, voluptates nihil debitis</p>
                             <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="assets/images/clients/test-2.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>John Doe</h4>
                                <span class="designation">Developer</span>
                            </div>
                        </div>
                    </div>


                    <div class="review-item">
                        <div class="client-info">
                            <i class="bi bi-quote"></i>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni eius autem aliquid pariatur rerum. Deserunt, praesentium.
                             Adipisci, voluptates nihil debitis</p>
                             <div class="rating">
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                                <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                        </div>
                        <div class="client-desc">
                            <div class="client-img">
                                <img src="assets/images/clients/test-3.jpg" alt="" class="img-fluid">
                            </div>
                            <div class="client-text">
                                <h4>John Doe</h4>
                                <span class="designation">Developer</span>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section> -->

<?php
require_once 'include/frontend/footer.php';
?>