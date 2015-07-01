<section id="testimonial">
      <div class="container"> 
        <div class="row">
          <div class=" col-lg-7 col-md-7 col-sm-6">
            <!-- START BLOG HEADING -->
            <div class="heading">
              <h2 class="wow fadeInLeftBig"><?php echo $testimonial->VTITLE;?></h2>
              <?php echo $testimonial->VDESC;?>
            </div>
          </div>
          <div class=" col-lg-5 col-md-5 col-sm-6">
            <div class="testimonial_customer">
              <!-- BEGAIN TESTIMONIAL SLIDER -->
              <ul class="testimonial_slider">
                <!-- BEGAIN SINGLE TESTIMONIAL SLIDE#1 -->
                <?php
                foreach ($testimonial->DETAILS as $detail){
                    echo "<li>";
                        echo '<div class="media testi_media">';
                            echo '<a class="media-left testi_img" href="#">';
                                echo '<img src="img/testimonial-pic1.jpg" alt="img">';
                            echo '</a>';
                            echo '<div class="media-body">';
                                echo '<h4 class="media-heading">'.$detail->VNAME.'</h4>';
                                echo '<span>'.$detail->VPOSITION.($detail->VCOMPANY? ', '.$detail->VCOMPANY:'' ).'</span>';
                            echo '</div>';
                        echo '</div>';
                    echo "</li>";
                }
                ?>
                
              </ul>
            </div>
          </div>           
        </div>
      </div>
    </section>