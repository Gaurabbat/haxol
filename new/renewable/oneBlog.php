<!DOCTYPE html>
<html>
<?php
session_start();
include '../config/db.php';
$database = new Database();
$conn = $database->getConnection();
?>
<!-- Mirrored from www.haxolindia.com/blogs.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Dec 2018 16:05:39 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
        	<meta charset="utf-8">
	
			<title>Blogs | Haxol India</title>
			
		
		<meta name="language" content="English">

					<meta name="description" content="">
	    		
	    			<meta name="keywords" content="">
	    				<meta name="author" content="Delowar">

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">        <!-- Stylesheets -->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/revolution-slider.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">

<link href="css/responsive.css" rel="stylesheet">
<!-- Responsive -->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->


	    		<link rel="stylesheet" href="theme/green.css">
	         <script src="js/jquery.js"></script> 
<script src="js/bootstrap.min.js"></script>
<script src="js/revolution.min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/jquery.fancybox-media.js"></script>
<script src="js/owl.js"></script>
<script src="js/mixitup.js"></script>
<script src="js/isotope.js"></script>
<script src="js/wow.js"></script>
<script src="js/map-script.js"></script>
<script src="js/validate.js"></script>    </head>
    <body>
        <div class="page-wrapper">
        <!-- Preloader -->
            <div class="preloader"></div>
        <!-- Main Header -->
            <header class="main-header">
            	<div class="top-bar">
                	<div class="top-container">
                    	<!--Info Outer-->
                         <div class="info-outer">
                         	<!--Info Box-->
                                                        <ul class="info-box clearfix">
                            	<li><span class="icon flaticon-interface"></span><a href="#">info@haxolindia.com</a></li>
                            	<li><span class="icon flaticon-technology-5"></span><a href="#">+91 7980946081</a></li>
                                <li class="social-links-one">
                                	<a href="https://www.facebook.com/haxolsolar/" target="_blank"" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a>
                                </li>
                            </ul>
                                                     </div>
                    </div>
                </div>
            	<!-- Header Upper -->
            	<div class="header-upper">
                	<div class="auto-container clearfix">
                    	<!-- Logo -->
                        <div class="logo">
                                                        <a href="index.php"><img src="../assets/logo.png" height="70" alt="Haxol India"></a>
                                                     </div>
                         
                         <!--Nav Outer-->
                        <div class="nav-outer clearfix">
                            
                            <a href="contact.php" class="theme-btn btn-donate">Subscribe!</a>
                            
                            <!-- Main Menu -->
                            <nav class="main-menu">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->    	
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse clearfix">
                                                                       <ul class="navigation">
                                        <li><a id='active' href="index.php">Home</a>
                                        </li>
                                                <li><a  href="pageb159.html?pageid=1">About us</a></li>
                                                <!--<li><a href="our_team.html">Our Team</a></li>-->
                                        <li><a  href="contact.php">Contact Us</a></li>
                                    </ul>
                                </div>
                            </nav><!-- Main Menu End-->
                            
                        </div>
                        
                    </div>
                </div><!-- Header Top End -->
            </header><!--End Main Header --> 



    <!--Sidebar Page-->
    <div class="sidebar-page">
    	<div class="auto-container">
        	<div class="row clearfix">
                <!--Content Side-->	
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <!--Projects Section-->
                    <section class="blog-news-section no-padd-bottom no-padd-top padd-right-20">
                         <!--pagination-->
                        <!--pagination-->
                                                <!--News Column-->
						<?php 
						if(isset($_GET['id']))
						{
						$query = "SELECT `nid`,`ncategory`,`time`, `Company`, `Area`, `News`,`nimage` FROM `latestNews` where `nid`= '".$_GET['id']."'";
						}
						else if (isset($_GET['ncategory'])){
							$query = "SELECT `nid`,`ncategory`,`time`, `Company`, `Area`, `News`,`nimage` FROM `latestNews` where `ncategory`= '".$_GET['ncategory']."' order by nid desc LIMIT 5";
						}
			   $stmt = $conn->prepare($query);
 
    // execute query
    $stmt->execute();
$num = $stmt->rowCount();
if ($num>0) {
				
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
		?>						
						
                        <div class="column blog-news-column">
                            <article class="inner-box">
                                <figure class="">
                                    <a href="#"><img src="<?php echo $nimage;?>" alt="" height="250" width="500"></a>
                                    <div class="news-date"><?php echo $time;?></div>
                                </figure>
                                <div class="content-box">
                                    <h3><a href="postd5e8.html?id=34"><?php echo $ncategory;?></a></h3>
                                    <div class="post-info clearfix">
                                        <div class="post-options pull-left clearfix">
                                            <a href="#" class="comments-count"><span class="icon flaticon-communication-2"></span> 6</a>
                                            <a href="#" class="fav-count"><span class="icon flaticon-favorite-1"></span> 14</a>
                                        </div>
                                    </div>
                                    <div class="text"><?php echo $News;?></div>
                                    <a href="oneBlog.php?id=<?php echo $nid;?>" class="theme-btn btn-style-three">Read More</a>
                                </div>
                            </article>
                        </div>
                      
                        <?php
				}
}
						?>
                        <!--end while loop-->
                        
                        <!-- Styled Pagination -->
                        
                                            </section>
                </div>
                <!--Content Side-->
                            <!--Sidebar-->	
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar">
                        
                        
                        <!-- Recent Posts -->
						
                        <div class="widget recent-posts wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="sidebar-title"><h3>Latest Posts</h3></div>
							<?php $query = "SELECT `nid`,`ncategory`,`time`, `Company`, `Area`, `News`,`nimage` FROM `latestNews` order by nid";
			   $stmt = $conn->prepare($query);
 
    // execute query
    $stmt->execute();
$num = $stmt->rowCount();
if ($num>0) {
				
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
		?>
                                                        <article class="post">
                            	<figure class="post-thumb"><img src="<?php echo $nimage;?>" alt=""></figure>
                                <h4><a href="oneBlog.php?id=<?php echo $nid;?>"><?php echo substr($News,0,30)."...";?></a></h4>
                                <div class="post-info"><span class="icon flaticon-people-1"></span><?php echo $Company;?></div>
                            </article>
<?php } } ?>
                                                        
                                                    </div>    
                    </aside>
                </div>
                <!--Sidebar-->            </div>
        </div>
    </div>
    

    
    
    <!--Intro Section-->
    <section class="subscribe-intro">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Column-->
                <div class="column col-md-9 col-sm-12 col-xs-12">
                    <h2>Subcribe for Newsletter</h2>
                </div>
                <!--Column-->
                <div class="column col-md-3 col-sm-12 col-xs-12">
                    <div class="text-right padd-top-20">
                        <a href="contact.php" class="theme-btn btn-style-one">Subscribe Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
<!--Main Footer-->
    <footer class="main-footer" style="background-image:url(images/background/footer-bg.jpg);">
    	
        <!--Footer Upper-->        
        <div class="footer-upper">
            <div class="auto-container">
                <div class="row clearfix">
                	
                    <!--Two 4th column-->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                            <div class="col-lg-8 col-sm-6 col-xs-12 column">
                                <div class="footer-widget about-widget">
                                    <div class="logo"><a href="index-3.html"><img src="admin/upload/logo.png" class="img-responsive" alt=""></a></div>
                                    
                                    <ul class="contact-info">
                                        <li><span class="icon fa fa-map-marker"></span>Bamunpara More,Memari, <br>Burdwan, Pin-713146 (W.B)</li>
                                        <li><span class="icon fa fa-phone"></span> (+91) 798-094-60-81</li>
                                        <li><span class="icon fa fa-envelope-o"></span> info@haxolindia.com</li>
                                    </ul>
                                    
                                    <div class="social-links-two clearfix">
                                    	<a href="#" class="facebook img-circle"><span class="fa fa-facebook-f"></span></a>
                                        <a href="#" class="twitter img-circle"><span class="fa fa-twitter"></span></a>
                                        <a href="#" class="google-plus img-circle"><span class="fa fa-google-plus"></span></a>
                                        <a href="#" class="linkedin img-circle"><span class="fa fa-linkedin"></span></a>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <!--Footer Column-->
                            <div class="col-lg-4 col-sm-6 col-xs-12 column">
                                <h2>Our Project</h2>
                                <div class="footer-widget links-widget">
                                    <ul>
                                                                                <li><a href="postd5e8.html?id=34">Infrastructure</a></li>
                                                                                <li><a href="postef73.html?id=33">Public Sector</a></li>
                                                                                <li><a href="post6fb5.html?id=31">Residential</a></li>
                                                                            </ul>
        
                                </div>
                            </div>
                    	</div>
                    </div><!--Two 4th column End-->
                    
                    <!--Two 4th column-->
                    <div class="col-md-6 col-sm-12 col-xs-12">
                    	<div class="row clearfix">
                    		<!--Footer Column-->
                        	<div class="col-lg-7 col-sm-6 col-xs-12 column">
                            	<div class="footer-widget news-widget">
                                	<h2>Latest News</h2>	
                                                                        <!--News Post-->
                                    <div class="news-post">
                                    	<div class="icon"></div>
                                        <div class="news-content"><figure class="image-thumb"><img src="admin/upload/ae769b949d.png" alt=""></figure><a href="posta9bc.php?id=19"><p><span>Tesla&rsquo;s story this year was full of twists.....</a></div>
                                    </div>
                                      
                                </div>
                            </div>
                            
                            <!--Footer Column-->
                            <div class="col-lg-5 col-sm-6 col-xs-12 column">
                                <div class="footer-widget links-widget">
                                	<h2>Quick Links</h2>
                                    <ul>
                                        <li><a href="404.html?pageid=">About Us</a></li>
                                        <li><a href="blogs.html">Blogs</a></li>
                                        <li><a href="gallery.html">Gallery</a></li>
                                        <li><a href="contact.php">Contact Us</a></li>
                                    </ul>
        
                                </div>
                            </div>
                    	</div>
                    </div><!--Two 4th column End-->
                    
                </div>
                
            </div>
        </div>
        
        <!--Footer Bottom-->
    	<div class="footer-bottom">
            <div class="auto-container clearfix">
                <!--Copyright-->
                                <div class="copyright text-center">&copy; All Rights Reserved 2017 - 2018 Developed By <a href="http://aftechnologies.in/">AF Technologies</a></div>
                            </div>
        </div>
        
    </footer>
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="fa fa-long-arrow-up"></span></div>

<script src="js/script.js"></script>
</body>

<!-- Mirrored from www.haxolindia.com/blogs.php by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Dec 2018 16:05:53 GMT -->
</html>