<?php 
$newsletter = $db->select('settings','setting_value',null,"setting_name='newsletter'");
$about = $db->select('settings','setting_value',null,"setting_name='about_us'");
?>
<section class="cta-2">
    <div class="container">
        <div class="row align-items-center subscribe-section ">
            <div class="col-lg-6">
                <div class="section-heading white-text">
                    <span class="subheading">Newsletter</span>
                    <h3><?=$newsletter[0]['setting_value'];?></h3>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="subscribe-form">
                    <form action="frontend_logic/newsletter.php" method="post">
                        <input type="email" name="newsletter" class="form-control" placeholder="Email Address">
                        <button type="submit" class="btn btn-main">Subscribe<i class="fa fa-angle-right ml-2"></i> </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="footer pt-120">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6 col-md-6">
				<div class="widget footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">About Us</h5>
					<p class="mt-3"><?=$about[0]['setting_value'];?></p>
					<ul class="list-inline footer-socials">
						<?php foreach($socials as $social): ?>
                            <li class="list-inline-item"><a href="<?=$social['socialmedialink']?>"><i class="<?=$social['socialmedia_icon']?>"></i></a></li>
                    	<?php endforeach; ?>
						<!-- <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li> -->
						<!-- <li class="list-inline-item"> <a href="#"><i class="fab fa-twitter"></i></a></li> -->
						<!-- <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li> -->
						<!-- <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li> -->
					</ul>
				</div>
			</div>
			
			<div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Company</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="about.php">About us</a></li>
						<li><a href="contact.php">Contact us</a></li>
						<!-- <li><a href="#">Projects</a></li> -->
						<li><a href="#">Terms & Condition</a></li>
						<li><a href="#">Privacy policy</a></li>
					</ul>
				</div>
			</div>
			<!-- <div class="col-lg-2 col-sm-6 col-md-6">
				<div class="footer-widget mb-5 mb-lg-0">
					<h5 class="widget-title">Courses</h5>
					<ul class="list-unstyled footer-links">
						<li><a href="#">SEO Business</a></li>
						<li><a href="#">Digital Marketing</a></li>
						<li><a href="#">Graphic Design</a></li>
						<li><a href="#">Site Development</a></li>
						<li><a href="#">Social Marketing</a></li>
					</ul>
				</div>
			</div> -->
			<div class="col-lg-3 col-sm-6 col-md-6">
				<div class="footer-widget footer-contact mb-5 mb-lg-0">
					<h5 class="widget-title">Contact </h5>
					
					<ul class="list-unstyled">
						<li><i class="bi bi-headphone"></i>
							<div>
								<strong>Phone number</strong>
								<?=$phn[0]['setting_value'];?>
							</div>
							
						</li>
						<li> <i class="bi bi-envelop"></i>
							<div>
								<strong>Email Address</strong>
								<?=$email[0]['setting_value'];?>
							</div>
						</li>
						<li><i class="bi bi-location-pointer"></i>
							<div>
								<strong>Office Address</strong>
								<?=$office_add[0]['setting_value'];?>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-btm">
		<div class="container">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6">
					<div class="footer-logo">
					<?php $footer_logo = $db->select('logos',"logo_value",null,"logo_key='frontend_footer_logo'"); ?>
						<img src="uploads/logos/<?=$footer_logo[0]['logo_value']?>" alt="<?=$brand[0]['setting_value']?>" class="img-fluid">
					</div>
				</div>
				<div class="col-lg-6">
					<div class="copyright text-lg-center">
						<?php $copyright = $db->select('settings','setting_value',null,"setting_name='copyright'");?>
						
						<p><?php echo htmlspecialchars_decode(stripslashes($copyright[0]['setting_value']));?></p>
						<!-- <p>@ Copyright reserved to Edutim.Proudly Crafted by <a href="https://themeturn.com/">Dreambuzz</a></p> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<div class="fixed-btm-top">
	<a href="#top-header" class="js-scroll-trigger scroll-to-top"><i class="fa fa-angle-up"></i></a>
</div>



    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script src="assets/vendors/jquery/jquery.js"></script>
    <!-- Bootstrap 4.5 -->
    <script src="assets/vendors/bootstrap/bootstrap.js"></script>
    <!-- Counterup -->
    <script src="assets/vendors/counterup/waypoint.js"></script>
    <script src="assets/vendors/counterup/jquery.counterup.min.js"></script>
    <script src="assets/vendors/jquery.isotope.js"></script>
    <script src="assets/vendors/imagesloaded.html"></script>
    <!--  Owlk Carousel-->
    <script src="assets/vendors/owl/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>
	<script src="frontend_logic/myscript.js"></script>
    

  </body>
  
</html>

<?php 
$ip_address = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
if (isset($_SERVER['HTTP_REFERER'])) {
    $referring_url = $_SERVER['HTTP_REFERER'];
} else {
    $referring_url = "";
}
if(isset($_GET['bb'])){
    $bl_id = $_GET['bb'];
}else{
    $bl_id = "";
}
$requested_url = $_SERVER['REQUEST_URI'];
date_default_timezone_set("Asia/Dhaka");
$timenow = date("Y-m-d H:i:s");
$month = date("M");
$db->insert('visitor_counts',[
    'month' => $month,
    'user_agent' => $user_agent,
    'referring_url' => $referring_url,
    'user_ip' => $ip_address,
    'page' => $requested_url,
    'blog_id' => $bl_id,
    'created_at' => $timenow  
]);
?>