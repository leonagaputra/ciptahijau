<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Ideland Cipta Hijau</title>

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="img/favicon.ico"/>

    <!-- CSS
    ================================================== -->       
    <?php
        require_once 'frontpage_style.php';
    ?>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body> 
     <!-- BEGAIN PRELOADER -->
    <div id="preloader">
      <div id="status">&nbsp;</div>
    </div>
    <!-- END PRELOADER -->

    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->

    <!--=========== BEGIN HEADER SECTION ================-->
    <header id="header">
      <!-- BEGIN MENU -->
      <div class="menu_area">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation"> 
          <div class="container">
          <div class="navbar-header">
            <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- LOGO -->

            <!-- TEXT BASED LOGO -->
            <a class="navbar-brand" href="#"><img src="img/logo.png" ></a>
            
            <!-- IMG BASED LOGO  -->
            <!--  <a class="navbar-brand" href="#"><img src="img/logo.png" alt="logo"></a> --> 
            
                   
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul id="top-menu" class="nav navbar-nav navbar-right main_nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#service">Services</a></li> 
              <li><a href="#works">Works</a></li> 
              <li><a href="#team">Team</a></li>          
              <li><a href="#contact">Contacts</a></li>                           
            </ul>           
          </div><!--/.nav-collapse -->
          </div>     
        </nav>  
      </div>
      <!-- END MENU -->

      <!-- BEGIN SLIDER AREA-->
      <div class="slider_area">
        <!-- BEGIN SLIDER-->          
        <div id="slides">
          <ul class="slides-container">

            <!-- THE FIRST SLIDE-->
            <li>
              <!-- SECOND SLIDE OVERLAY -->
              <div class="slider_overlay"></div> 
              <!-- SECOND SLIDE MAIN IMAGE -->
              <img src="img/full-slider/full-slide2.jpg" alt="img">
              <!-- SECOND SLIDE CAPTION-->
              <div class="slider_caption">
                <h2>We Care More for Our Customer, Employees, Community and Environment</h2>
                <p>Become a landscaping company nationwide attention to the environmental aspects in the development and harmonization of providing aesthetic value while maintaining the quality of the environment.</p>
                <a href="#about" class="slider_btn">Who We are</a>
              </div>
            </li>

            <!-- THE SECOND SLIDE-->
            <li>
              <!-- THIRD SLIDE OVERLAY -->
              <div class="slider_overlay"></div> 
              <!-- THIRD SLIDE MAIN IMAGE -->
              <img src="img/full-slider/full-slide1.jpg" alt="img">
              <!-- THIRD SLIDE CAPTION-->
              <div class="slider_caption">
                <h2>We'll change your Idea of Design</h2>
                <p>We are a group of experienced designers and garden landscaper</p>
                <a href="#team" class="slider_btn">Our Team</a>                 
              </div>
            </li>
          </ul>
          <!-- BEGAIN SLIDER NAVIGATION -->
          <nav class="slides-navigation">
            <!-- PREV IN THE SLIDE -->
            <a class="prev" href="/item1">
              <span class="icon-wrap"></span>
              <h3><strong>Prev</strong></h3>
            </a>
            <!-- NEXT IN THE SLIDE -->
            <a class="next" href="/item3">
              <span class="icon-wrap"></span>
              <h3><strong>Next</strong></h3>
            </a>
          </nav>       
        </div>
        <!-- END SLIDER-->          
      </div>
      <!-- END SLIDER AREA -->
    </header>
    <!--=========== End HEADER SECTION ================--> 


    <!--=========== BEGIN ABOUT SECTION ================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="about_area">
              <!-- START ABOUT HEADING -->
              <div class="heading">
                <h2 class="wow fadeInLeftBig">About Us</h2>
                <p><strong>PT. IDELAND CIPTA HIJAU</strong> is a nationwide company that is engaged in consulting, planning and construction landscape. Through every design, <strong>PT. IDELAND CIPTA HIJAU</strong> always prioritize the detail as added value to the land assets owned by the client. Proper preparation from planning, construction, maintenance of diverse variants nursery plants are managed internally.</p>
<p>Grow and thrive under the leadership of Mrs. Wiwiek Dwi Endah Hertoto as Director, Mr. Aswin Kartiko Subroto as a Commissioner and Mrs. Anita Hertoto as Director. The company that based in Jakarta is supported by more than dozens of professionals experts from various disciplines. Since its founding in 2008, <strong>PT. IDELAND CIPTA HIJAU</strong> has completed projects in various places surrounding the diverse areas.</p>
              </div>

              <!-- START ABOUT CONTENT -->
              <div class="about_content">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="about_featured">
                      <div class="panel-group" id="accordion">
                        <!-- START SINGLE FEATURED ITEAM #1-->
                        <div class="panel panel-default wow fadeInLeft">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                 <span class="fa fa-check-square-o"></span>Maintenance
                              </a>
                            </h4>
                          </div>
                          <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            </div>
                          </div>
                        </div>
                        <!-- START SINGLE FEATURED ITEAM #2 -->
                        <div class="panel panel-default wow fadeInLeft">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                 <span class="fa fa-check-square-o"></span>Landscaping
                              </a>
                            </h4>
                          </div>
                          <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. 
                            </div>
                          </div>
                        </div>
                        <!-- START SINGLE FEATURED ITEAM #3 -->
                        <div class="panel panel-default wow fadeInLeft">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                <span class="fa fa-check-square-o"></span>Designs
                              </a>
                            </h4>
                          </div>
                          <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            </div>
                          </div>
                        </div>
                        <!-- START SINGLE FEATURED ITEAM #4 -->
                        <div class="panel panel-default wow fadeInLeft">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                <span class="fa fa-check-square-o"></span>Tree Surgery
                              </a>
                            </h4>
                          </div>
                          <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="about_slider">
                      <!-- BEGAIN FEATURED SLIDER -->
                      <div class="featured_slider">
                        <!-- SINGLE SLIDE IN THE SLIDER -->
                        <div class="single_iteam">
                          <a href="#"> <img src="img/feature_img1.jpg" alt="img"></a>                          
                        </div>
                        <!-- SINGLE SLIDE IN THE SLIDER -->
                        <div class="single_iteam">
                          <a href="#"> <img src="img/feature_img2.jpg" alt="img"></a>                          
                        </div>
                        <!-- SINGLE SLIDE IN THE SLIDER -->
                        <div class="single_iteam">
                          <a href="#"> <img src="img/feature_img3.jpg" alt="img"></a>                           
                        </div>
                        <!-- SINGLE SLIDE IN THE SLIDER -->
                        <div class="single_iteam">
                          <a href="#"> <img src="img/feature_img4.jpg" alt="img"></a>                           
                        </div>
                        
                      </div>
                      <!-- END FEATURED SLIDER -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>       
      </div>
       
    </section>
    <!--=========== END ABOUT SECTION ================-->

    <!--=========== BEGIN SERVICE SECTION ================-->
    <section id="service">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- BEGAIN SERVICE HEADING -->
            <div class="heading">
              <h2 class="wow fadeInLeftBig">Our Services</h2>
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
            </div>
          </div>          
        </div>
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- BEGAIN SERVICE  -->
            <div class="service_area">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <!-- BEGAIN SINGLE SERVICE -->
                  <div class="single_service wow fadeInLeft">
                    <div class="service_iconarea">
                      <span class="fa service_icon"><img src="img/maintanance.png"></span>
                    </div>
                    <h3 class="service_title">Maintenance</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <!-- BEGAIN SINGLE SERVICE -->
                  <div class="single_service wow fadeInRight">
                    <div class="service_iconarea">
                      <span class="fa service_icon"><img src="img/landscape.png"></span>
                    </div>
                    <h3 class="service_title">Landscaping</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <!-- BEGAIN SINGLE SERVICE -->
                  <div class="single_service wow fadeInLeft">
                    <div class="service_iconarea">
                      <span class="fa service_icon"><img src="img/designs.png"></span>
                    </div>
                    <h3 class="service_title">Designs</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                  <!-- BEGAIN SINGLE SERVICE -->
                  <div class="single_service wow fadeInRight">
                    <div class="service_iconarea">
                      <span class="fa service_icon"><img src="img/treesurgery.png"></span>
                    </div>
                    <h3 class="service_title">Tree Surgery</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                  </div>
                </div>
                
                               
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END SERVICE SECTION ================-->

    <!--=========== BEGAIN WORKS SECTION ================-->
    <section id="works">
      

      <!-- BEGAIN FORTFOLIO WORSK SECTION -->
      <div class="row">
        <div class="portfolio_area">
          <!-- BEGAIN PORTFOLIO HEADER -->
          <div class="row">
            <div class="col-lg-12 col-md-12">
             <div class="container">
                <div class="heading">
                  <h2 class="wow fadeInLeftBig">Projects</h2>
                  <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text</p>
                </div>
              </div>
            </div>
          </div>
          <!-- END PORTFOLIO HEADER -->

          <!-- BEGAIN PORTFOLIO GALLERY -->
          <div class="row">
            <div class="portfolio_gallery">
              <div id="elastic_grid_demo"></div>
            </div>
          </div>
          <!-- END PORTFOLIO GALLERY -->
        </div>         
      </div>      
      <!-- END FORTFOLIO WORSK SECTION -->
    </section>
    <!--=========== END WORKS SECTION ================-->

    <!--=========== BEGAIN TEAM SECTION ================-->
    <section id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <!-- BEGAIN ABOUT HEADING -->
            <div class="heading">
              <h2 class="wow fadeInLeftBig">Our Team</h2>            
            </div>
            <div class="team_area">
              <!-- BEGAIN TEAM SLIDER -->
              <div class="team_slider">  
                <!-- BEGAIN SINGLE TEAM SLIDE#1 -->              
                <div class="col-lg-3 col-md-3 col-sm-4">
                  <div class="single_team wow fadeInUp">
                    <div class="team_img">
                      <img src="img/team-1.jpg" alt="img">
                    </div>
                    <h5 class="">Jessica Sarah</h5>
                    <span>Director</span>                        
                    <p>Gardening has been his passion so long. Lorem Ipsum dolor sit amet lorem Ipsum dolor sit amet orem Ipsum dolor sit amet </p>
                    <div class="team_social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                      <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                  </div>
                </div>
                <!-- BEGAIN SINGLE TEAM SLIDE#2 -->
                <div class="col-lg-3 col-md-3 col-sm-4">
                  <div class="single_team wow fadeInUp">
                    <div class="team_img">
                      <img src="img/team-2.jpg" alt="img">
                    </div>
                    <h5>Adam William</h5>
                    <span>Landscaping Specialist</span>                        
                    <p>Gardening has been his passion so long. Lorem Ipsum dolor sit amet lorem Ipsum dolor sit amet orem Ipsum dolor sit amet </p>
                    <div class="team_social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                      <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                  </div>
                </div>
                <!-- BEGAIN SINGLE TEAM SLIDE#3 -->
                <div class="col-lg-3 col-md-3 col-sm-4">
                  <div class="single_team wow fadeInUp">
                    <div class="team_img">
                      <img src="img/team-3.jpg" alt="img">
                    </div>
                    <h5>Bob McArthur</h5>
                    <span>Garden Designer</span>                        
                    <p>Gardening has been his passion so long. Lorem Ipsum dolor sit amet lorem Ipsum dolor sit amet orem Ipsum dolor sit amet </p>
                    <div class="team_social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                      <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                  </div>
                </div>
                <!-- BEGAIN SINGLE TEAM SLIDE#4 -->
                <div class="col-lg-3 col-md-3 col-sm-4">
                  <div class="single_team wow fadeInUp">
                    <div class="team_img">
                      <img src="img/team-4.jpg" alt="img">
                    </div>
                    <h5>Jamie </h5>
                    <span>Plan Specialis</span>                        
                    <p>Gardening has been his passion so long. Lorem Ipsum dolor sit amet lorem Ipsum dolor sit amet orem Ipsum dolor sit amet </p>
                    <div class="team_social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                      <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                  </div>
                </div>
                <!-- BEGAIN SINGLE TEAM SLIDE#5 -->
                <div class="col-lg-3 col-md-3 col-sm-4">
                  <div class="single_team wow fadeInUp">
                    <div class="team_img">
                      <img src="img/team-5.jpg" alt="img">
                    </div>
                    <h5>Rita Sidens</h5>
                    <span>Marketing</span>                        
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature</p>
                    <div class="team_social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                      <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                  </div>
                </div>
                <!-- BEGAIN SINGLE TEAM SLIDE#6 -->
                <div class="col-lg-3 col-md-3 col-sm-4">
                  <div class="single_team wow fadeInUp">
                    <div class="team_img">
                      <img src="img/team-1.jpg" alt="img">
                    </div>
                    <h5>Jamie Sidens</h5>
                    <span>Web Designer</span>                        
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature</p>
                    <div class="team_social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                      <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                  </div>
                </div>
                <!-- BEGAIN SINGLE TEAM SLIDE#7 -->
                <div class="col-lg-3 col-md-3 col-sm-4">
                  <div class="single_team wow fadeInUp">
                    <div class="team_img">
                      <img src="img/team-2.jpg" alt="img">
                    </div>
                    <h5>Jone Doe</h5>
                    <span>Marketing Head</span>                        
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature</p>
                    <div class="team_social">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                      <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                  </div>
                </div>                              
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END TEAM SECTION ================-->


   

    <!--=========== BEGAIN TESTIMONIAL SECTION ================-->
    <section id="testimonial">
      <div class="container"> 
        <div class="row">
          <div class=" col-lg-7 col-md-7 col-sm-6">
            <!-- START BLOG HEADING -->
            <div class="heading">
              <h2 class="wow fadeInLeftBig">Satisfied Customers</h2>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
            </div>
          </div>
          <div class=" col-lg-5 col-md-5 col-sm-6">
            <div class="testimonial_customer">
              <!-- BEGAIN TESTIMONIAL SLIDER -->
              <ul class="testimonial_slider">
                <!-- BEGAIN SINGLE TESTIMONIAL SLIDE#1 -->
                <li>
                  <div class="media testi_media">
                    <a class="media-left testi_img" href="#">
                      <img src="img/testimonial-pic1.jpg" alt="img">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">Alin Brown</h4>
                      <span>CEO</span>                      
                    </div>
                  </div>
                  <div class="testi_content">
                    <p>Message of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable</p>
                  </div>
                </li>
                <!-- BEGAIN SINGLE TESTIMONIAL SLIDE#2 -->
                <li>
                  <div class="media testi_media">
                    <a class="media-left testi_img" href="#">
                      <img src="img/testimonial-pic2.jpg" alt="img">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">Alicia Smith</h4>
                      <span>BCA Manager</span>                      
                    </div>
                  </div>
                  <div class="testi_content">
                    <p>Message of Lorem Ipsum available, but the majority have suffered alteration in some form.</p>
                  </div>
                </li>
                <!-- BEGAIN SINGLE TESTIMONIAL SLIDE#3 -->
                <li>
                  <div class="media testi_media">
                    <a class="media-left testi_img" href="#">
                      <img src="img/testimonial-pic3.jpg" alt="img">
                    </a>
                    <div class="media-body">
                      <h4 class="media-heading">Jon Doe</h4>
                      <span>Manager</span>                      
                    </div>
                  </div>
                  <div class="testi_content">
                    <p>Message of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>           
        </div>
      </div>
    </section>
    <!--=========== END TESTIMONIAL SECTION ================-->


    <!--=========== BEGAIN CLIENTS SECTION ================-->
    <section id="clients">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- START BLOG HEADING -->
            <div class="heading">
              <h2 class="wow fadeInLeftBig">Our Best Clients</h2>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
            </div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="clients_content">
              <div class="row">
                <!-- BEGAIN CLIENTS SLIDER -->
                <div class="clients_slider">
                  <!-- BEGAIN SINGLE CLIENT SLIDE#1 -->
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_client">
                      <img src="img/clients_img1.png" alt="clients Brand">
                    </div>
                  </div>
                  <!-- BEGAIN SINGLE CLIENT SLIDE#2 -->
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_client">
                      <img src="img/clients_img2.png" alt="clients Brand">
                    </div>
                  </div>
                  <!-- BEGAIN SINGLE CLIENT SLIDE#3 -->
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_client">
                      <img src="img/clients_img4.png" alt="clients Brand">
                    </div>
                  </div>
                  <!-- BEGAIN SINGLE CLIENT SLIDE#4 -->
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_client">
                      <img src="img/clients_img3.png" alt="clients Brand">
                    </div>
                  </div>
                   <!-- BEGAIN SINGLE CLIENT SLIDE#5 -->
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_client">
                      <img src="img/clients_img4.png" alt="clients Brand">
                    </div>
                  </div>
                  <!-- BEGAIN SINGLE CLIENT SLIDE#6 -->
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_client">
                      <img src="img/clients_img5.png" alt="clients Brand">
                    </div>
                  </div>
                  <!-- BEGAIN SINGLE CLIENT SLIDE#7 -->
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_client">
                      <img src="img/clients_img1.png" alt="clients Brand">
                    </div>
                  </div>
                  <!-- BEGAIN SINGLE CLIENT SLIDE#8 -->
                  <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single_client">
                      <img src="img/clients_img2.png" alt="clients Brand">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--=========== END CLIENTS SECTION ================-->

    <!--=========== BEGAIN CONTACT SECTION ================-->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <!-- START CONTACT HEADING -->
            <div class="heading">
              <h2 class="wow fadeInLeftBig">Contact Us</h2>
              <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. </p>
            </div>
          </div>
        </div>       
        <div class="row">
          <!-- BEGAIN CONTACT CONTENT -->
          <div class="contact_content">
            <!-- BEGAIN CONTACT FORM -->
            <div class="col-lg-5 col-md-5 col-sm-5">
              <div class="contact_form">

                <!-- FOR CONTACT FORM MESSAGE -->
                <div id="form-messages"></div>

                <form>
                  <input class="form-control" type="text" placeholder="Name">
                  <input class="form-control" type="email" placeholder="Email">
                  <input class="form-control" type="text" placeholder="Subject">
                  <textarea class="form-control" cols="30" rows="10" placeholder="Your Message"></textarea>
                   <input class="submit_btn" type="submit" value="Send">  
                </form>
              </div>
            </div>
            <!-- BEGAIN CONTACT MAP -->
            <div class="col-lg-7 col-md-7 col-sm-7">
              <div class="contact_map">
              <!-- BEGAIN GOOGLE MAP -->
               <div id="map_canvas"></div>
              </div>
            </div>           
          </div>
        </div>      
      </div>             
    </section>
    <!--=========== END CONTACT SECTION ================-->

    <!--=========== BEGAIN CONTACT FEATURE SECTION ================-->
    <section id="contactFeature">
      <!-- SKILLS COUNTER OVERLAY -->
      <div class="slider_overlay"></div>
      <div class="row">
        <div class="col-lg-12 col-md-12">       
          <div class="container">               
              <div class="contact_feature">
            <!-- BEGAIN CALL US FEATURE -->
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="single_contact_feaured wow fadeInUp">
                <i class="fa fa-phone"></i>
                <h4>Call Us</h4>
                <p>1-265-596-580</p>                
              </div>
            </div>
            <!-- BEGAIN CALL US FEATURE -->
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="single_contact_feaured wow fadeInUp">
                <i class="fa fa-envelope-o"></i>
                <h4>Email Address</h4>
                <p>idea@gmail.com</p>
              </div>
            </div>
            <!-- BEGAIN CALL US FEATURE -->
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="single_contact_feaured wow fadeInUp">
                <i class="fa fa-map-marker"></i>
                <h4>Office Location</h4>
                <p>Jl. Pejaten Raya Kav. 2 No. 1</p>
              </div>
            </div>
            <!-- BEGAIN CALL US FEATURE -->
            <div class="col-lg-3 col-md-3 col-sm-6">
              <div class="single_contact_feaured wow fadeInUp">
                <i class="fa fa-clock-o"></i>
                <h4>Working Hours</h4>
                <p>Monday-Friday 9.00-21.00</p>
              </div>
            </div>
          </div>
          </div>         
        </div>
      </div>
    </section>
    <!--=========== END CONTACT FEATURE SECTION ================-->


     <!--=========== BEGAIN FOOTER ================-->
     <footer id="footer">
       <div class="container">
         <div class="row">
           <div class="col-lg-6 col-md-6 col-sm-6">
             <div class="footer_left">
				<!--=========== Designed By WpFreeware Team ================-->
               <p>Ideland Cipta Hijau.</p>
			   <!--=========== Designed By WpFreeware Team ================-->
             </div>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-6">
             <div class="footer_right">
               <ul class="social_nav">
                 <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                 <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                 <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                 <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
               </ul>
             </div>
           </div>
         </div>
       </div>
      </footer>
      <!--=========== END FOOTER ================-->

     <!-- Javascript Files
     ================================================== -->
     <?php
        require_once 'frontpage_script.php';
    ?>
    
  </body>
</html>