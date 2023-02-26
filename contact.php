<?php
$title="About Us";
require_once 'include/frontend/header.php';
?>

<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1>Contact Us</h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="index.php">Home</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
                  Contact
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>

<section class="contact-info section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading">
                    <?php $contact_us = $db->select('settings','setting_value',null,"setting_name='contact_us'"); ?>
                    <span class="subheading">Contact Us</span>
                    <h3>Have any query?</h3>
                    <p><?=$contact_us[0]['setting_value'];?></p>
                </div>
            </div>
        </div>
       
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="contact-item">
                            <p>Email Us</p>
                            <h4><?=$email[0]['setting_value'];?></h4>
                        </div>
                    </div>
                     <div class="col-lg-12 col-md-6">
                        <div class="contact-item">
                            <p>Make a Call</p>
                            <h4><?=$phn[0]['setting_value'];?></h4>
                        </div>
                    </div>
                     <div class="col-lg-12 col-md-6">
                        <div class="contact-item">
                            <p>Address</p>
                            <h4><?=$office_add[0]['setting_value'];?> </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <form class="contact__form form-row " id="contactForm">
                    <div class="row">
                       <div class="col-12" id="con_form_error">
                          
                       </div>
                   </div>

                   <div class="row">
                       <div class="col-lg-6">
                           <div class="form-group">
                               <input type="text" id="name" name="name" class="form-control" placeholder="Your Name">
                               <div class="text-danger" id="con_name_error"></div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Email Address">
                                <div class="text-danger" id="con_email_error"></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                                <div class="text-danger" id="con_subject_error"></div>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <textarea id="message" name="message" cols="30" rows="6" class="form-control" placeholder="Your Message"></textarea>    
                                <div class="text-danger" id="con_massege_error"></div>
                           </div>
                       </div>
                   </div>

                   <div class="col-lg-12">
                       <div class="mt-4 text-right">
                           <button class="btn btn-main" id="contact_msg" type="submit">Send Message <i class="fa fa-angle-right ml-2"></i></button>
                       </div>
                   </div>
               </form> 
            </div>
        </div>
    </div>
</section>

<?php
require_once 'include/frontend/footer.php';
?>