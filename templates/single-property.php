<?php
/**
* The template for displaying all single posts
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
*
* @package WordPress
* @subpackage Twenty_Seventeen
* @since 1.0
* @version 1.0
*/
get_header(); 
global $ul_fields, $post; 


$completion = wp_get_post_terms( $post->ID, 'completion');
$types = wp_get_post_terms( $post->ID, 'types');
$location = wp_get_post_terms( $post->ID, 'location');
$bedroom = wp_get_post_terms( $post->ID, 'bedroom');
$developer = wp_get_post_terms( $post->ID, 'developer');


$image_id = get_term_meta( $developer[0]->term_id, 'developer_image_id', true );

$developer_phone = get_term_meta( $developer[0]->term_id, 'developer_phone', true );
$developer_email = get_term_meta( $developer[0]->term_id, 'developer_email', true );
$developer_Whatsapp = get_term_meta( $developer[0]->term_id, 'developer_Whatsapp', true );

$property_pdf = get_post_meta( $post->ID, 'property_pdf', true );
$property_attachment = get_post_meta( $post->ID, 'property_attachment', true );
$property_videoembeded = get_post_meta( $post->ID, 'property_videoembeded', true );

<<<<<<< HEAD
$is_sold = get_post_meta( $post->ID, 'is_sold_field');
=======
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
?>

<style>.single-featured-image-header {display: none;}</style>


<?php while ( have_posts() ) : the_post(); $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true);  ?>


<<<<<<< HEAD
  <div class="banner" style="background: url(<?php echo $thumbnail[0]; ?>) no-repeat center / cover !important"> 
    <div class="main-contents">
    <div class="banner-inner">
      <h3>Starting from</h3>


<?php 
if ($ul_fields->price_section_get_meta( 'cs_price' )) {
  $content = ul_price($ul_fields->price_section_get_meta( 'cs_price' ));
} else {
  $content = '<a class="askPrice btn-modal" data-toggleModal="myModal4" href="javascript:;">Ask for Price</a>';
}
 ?>



      <h4><?php echo $content; ?></h4>
      
      <h5><?php the_title(); ?></h5>

      <?php if ($is_sold): ?>
        <label class="sold">Sold</label>
      <?php endif; ?>

       
      <!-- <h5>STUNNING VIEWS OF THE GOLF COURSE</h5> -->
    </div>
  </div>
  </div>

  <div class="main-contents">
=======
  <div class="banner" style="background: url(<?php echo $thumbnail[0]; ?>) no-repeat center !important"> 
    <div class="banner-inner">
      <h3>Starting from</h3>
      <h4><?php echo ul_price($ul_fields->price_section_get_meta( 'cs_price' )); ?></h4>
      <h5><?php the_title(); ?></h5>
      <!-- <h5>STUNNING VIEWS OF THE GOLF COURSE</h5> -->
    </div>
  </div>

  <div class="main-content">
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
    <div class="lhs">
      <div class="entry-content">
        <?php the_content(); ?>
      <div class="table-area">
        <h3>6 Months Payment Plan (20% Upfront Discount)</h3>
        <ul>
<<<<<<< HEAD
          <li> <a href="#" class="btn-modal" data-toggleModal="myModal6"><span class="fa fa-file-pdf-o"></span> Brochure </a></li>
=======
          <li> <a href="#"><span class="fa fa-file-pdf-o"></span> Brochure </a></li>
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e

<?php if (!empty($property_pdf)): ?>
<li> <a  href="<?= wp_get_attachment_url( $property_pdf);  ?>"><span class="fa fa-object-group"></span> Floor Plan </a></li>
<?php endif; ?>

<?php if (!empty($property_attachment)): ?>
          <li><a href="<?= wp_get_attachment_url( $property_attachment);  ?>" target="_blank"><span class="fa fa-map-o"></span> Master Plan </a></li>
<?php endif; ?>

<<<<<<< HEAD
          <li> <a  href="#" class="btn-modal" data-toggleModal="myModal7"><span class="fa fa-table"></span> Availability List</a></li>
          <li> <a data-toggle="modal" href="#" class="btn-modal" data-toggleModal="myModal8"><span class="fa fa-money"></span> Payment Plan</a> </li>
        </ul>
      </div>
   
=======
          <li> <a  href="#"><span class="fa fa-table"></span> Availability List</a></li>
          <li> <a data-toggle="modal" href="#contactPP"><span class="fa fa-money"></span> Payment Plan</a> </li>
        </ul>
      </div>

>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
  <?php if (!empty($property_videoembeded)): echo htmlspecialchars_decode($property_videoembeded); endif;  ?>

      


        </div>
<<<<<<< HEAD


<div style="clear: both;"></div>
<div class="contact-form-soc">
<p class="sharefriend">Share with your friends</p>
</div>
<div style="clear: both;"></div>
<?php echo do_shortcode('[ssba-buttons]'); ?>



=======
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
    </div>


    <div class="rhs">
<<<<<<< HEAD
      <div class="project-contactbar project-contactbar-table "> 
  <?php if( $image_id ) {
        $thumbnail = wp_get_attachment_image_src($image_id,'thumbnail', true); ?>
        <img src="<?php echo $thumbnail[0]; ?>" alt="">
      <?php } ?>
        
        <a href="#showphone-note" id="myBtn"  class="project-call"> <i class="fa fa-phone"></i> <span> <strong> Call now </strong></span> </a> 

        <a target="_blank" href="https://web.whatsapp.com/send?phone=<?php echo $developer_Whatsapp; ?>&amp;text=Hi, I am Interested in 'Amora in Golf Verde'. Kindly let me know when we can meet and discuss about the project. Thank you." class="table-desktop project-whatsapp"><i class="fa fa-whatsapp"></i> <span>Chat on WhatsApp</span></a> 
       
       <a href="#" class="project-mail btn-modal" id="myBtn3" data-toggleModal="myModal3"> <i class="fa fa-envelope-o"></i> <span class="table-desktop">Register your interest</span> 
       <a href="#" class="project-meeting btn-modal" id="myBtn2" data-toggleModal="myModal2"> <i class="fa fa-handshake-o"></i> <span class="table-desktop">Request a Meeting</span></a> 
       </div>
=======
      <?php if( $image_id ) {
        $thumbnail = wp_get_attachment_image_src($image_id,'full', true); ?>
        <img src="<?php echo $thumbnail[0]; ?>" alt="">
      <?php } ?>
      <div class="project-contactbar project-contactbar-table "> 
        <a href="#showphone-note" id="myBtn"  class="project-call"> <i class="fa fa-phone"></i> <span> <strong> Call now </strong></span> </a> 
        <a target="_blank" href="https://web.whatsapp.com/send?phone=<?php echo $developer_Whatsapp; ?>&amp;text=Hi, I am Interested in 'Amora in Golf Verde'. Kindly let me know when we can meet and discuss about the project. Thank you. https://dxboffplan.com/properties/amora-golf-verde-damac/" class="table-desktop project-whatsapp"><i class="fa fa-whatsapp"></i> <span>Chat on WhatsApp</span></a> 
        <a href="#" class="project-mail"> <i class="fa fa-envelope-o"></i> <span class="table-desktop">Register your interest</span> <a href="#" class="project-meeting" data-toggle="modal"> <i class="fa fa-handshake-o"></i> <span class="table-desktop">Request a Meeting</span></a> </div>
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
      </div>







<<<<<<< HEAD
=======

>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
      <div id="myModal" class="modal">
        <div class="modal-content"> <span class="close">&times;</span> 

          <?php if( $image_id ) {
            $thumbnail = wp_get_attachment_image_src($image_id,'full', true); ?>
            <img src="<?php echo $thumbnail[0]; ?>" alt="">
          <?php } ?>
          <h3>Contact <?php echo $developer[0]->name; ?></h3>
          <a href="#"><?php echo $developer_phone; ?></a>
          <h2>IMPORTANT NOTE:</h2>
          <p>This contact information is strictly limited for Real Estate Property Inquiries. Kindly do NOT contact on this for any other reasons.</p>
          <p>Thank you!</p>
        </div>
      </div>


<<<<<<< HEAD

<div id="myModal2" class="modal">
  <form class="submitform" action="" method="POST">
    <div class="modal-content modal-content-big request-meetinggg"> <span  class="close" data-toggleModal="myModal2" >&times;</span>
      <div class="modal-header"><h4 class="modal-title" id="contactLabel">
        Request a Meeting</h4>
      </div>
        <ul class="width-50">
          <li>
            <label>Name</label>
            <input type="text" name="Name" required="">
          </li>
          <li>
            <label>Email</label>
            <input type="email" name="Email_Address" required="">
          </li>
          <li>
            <label>Phone</label>
            <input type="tel" name="Phone_Number" required="">
          </li>
          <li>
            <label>Preferred date</label>
            <input type="date" name="Preferred_Date">
          </li>
          <li>
              <label>Preferred time</label>
              <select class="form-control" name="meeting_time" required="">
                  <option value="">Select prefered time...</option>
                  <option value="09: 00 am">09: 00 am</option>
                  <option value="10: 00 am">10: 00 am</option>
                  <option value="11: 00 am">11: 00 am</option>
                  <option value="12: 00 pm">12: 00 pm</option>
                  <option value="01: 00 pm">01: 00 pm</option>
                  <option value="02: 00 pm">02: 00 pm</option>
                  <option value="03: 00 pm">03: 00 pm</option>
                  <option value="04: 00 pm">04: 00 pm</option>
                  <option value="05: 00 pm">05: 00 pm</option>
                  <option value="06: 00 pm">06: 00 pm</option>
                  <option value="07: 00 pm">07: 00 pm</option>
              </select>
          </li>
          <li>
            <input type="hidden" name="post" value="<?php echo get_the_title(); ?>">
            <input type="hidden" name="link" value="<?php echo get_the_permalink(); ?>">
            <input type="hidden" name="FORM" value="Request a Meeting">
            <input type="submit">
          </li>
         </ul>
       <div class="clearfix"></div>
      </div>
    </form>
  </div>


    
    
<!-- The Modal -->
<div id="myModal3" class="modal">
  <form class="submitform" action="" method="POST">
   <div class="modal-content modal-content-big"> <span class="close" data-toggleModal="myModal3" >&times;</span>
    <div class="modal-header"><h4 class="modal-title" id="contactLabel">
    Register Your interest</h4>
    <div class="modal-header-agent">
     <?php if( $image_id ) {
      $thumbnail = wp_get_attachment_image_src($image_id,'full', true); ?>
      <img src="<?php echo $thumbnail[0]; ?>" alt="">
    <?php } ?>
  </div>
  <div class="clearfix"></div>
</div>
<ul class="width-50">
  <li>
   <?php if( $image_id ) {
    $thumbnail = wp_get_attachment_image_src($image_id,'full', true); ?>
    <img src="<?php echo $thumbnail[0]; ?>" alt="">
  <?php } ?>
</li>
<li>
 <label>Name</label>
 <input type="text" name="Name" required=""> 
 <label>Email</label>
 <input type="email" name="email" required=""> 
 <label>Phone</label>
 <input type="number" name="phone" required="">
 <input type="hidden" name="post" value="<?php echo get_the_title(); ?>">
<input type="hidden" name="link" value="<?php echo get_the_permalink(); ?>">
<input type="hidden" name="FORM" value="Register Your interest">
 <input type="submit">
</li>
</ul>
<div class="clearfix"></div>
</div>
</form>
</div>


<!-- The Modal -->
<div id="myModal4" class="modal">
  <form class="submitform" action="" method="POST">
   <div class="modal-content modal-content-big"> <span class="close" data-toggleModal="myModal4" >&times;</span>
    <div class="modal-header"><h4 class="modal-title" id="contactLabel">
    Ask for Price</h4>
    <div class="modal-header-agent">
     <?php if( $image_id ) {
      $thumbnail = wp_get_attachment_image_src($image_id,'full', true); ?>
      <img src="<?php echo $thumbnail[0]; ?>" alt="">
    <?php } ?>
  </div>
  <div class="clearfix"></div>
</div>
<ul class="width-50">
  <li>
   <?php if( $image_id ) {
    $thumbnail = wp_get_attachment_image_src($image_id,'full', true); ?>
    <img src="<?php echo $thumbnail[0]; ?>" alt="">
  <?php } ?>
</li>
<li>
 <label>Name</label>
 <input type="text" name="Name" required=""> 
 <label>Email</label>
 <input type="email" name="email" required=""> 
 <label>Phone</label>
 <input type="number" name="phone" required="">

<input type="hidden" name="post" value="<?php echo get_the_title(); ?>">
<input type="hidden" name="link" value="<?php echo get_the_permalink(); ?>">
<input type="hidden" name="FORM" value="Ask For Price">

 <input type="submit">
</li>
</ul>
<div class="clearfix"></div>
</div>
</form>
</div>



<div id="myModal6" class="modal">
  <form class="submitform" action="" method="POST">
    <div class="modal-content modal-content-big"> <span  class="close" data-toggleModal="myModal6" >&times;</span>
    <div class="modal-header"><h4 class="modal-title" id="contactLabel">
      Request Brochure</h4><div class="modal-header-agent">
        <?php if( $image_id ) {
        $thumbnail = wp_get_attachment_image_src($image_id,'full', true); ?>
        <img src="<?php echo $thumbnail[0]; ?>" alt="">
        <?php } ?>
        </div><div class="clearfix"></div></div>
        <ul class="width-50">
          <li>
            <label>Text</label>
            <input type="text" name="Name" required="">
          </li>
          <li>
            <label>Email</label>
            <input type="email" name="Email" required="">
          </li>
          <li>
            <label>Phone</label>
            <input type="number" name="Phone" required="">
          </li>
          <li>
            <label>Message</label>
            <input type="text" name="message" required="">
          </li>
          <li>
            <input type="hidden" name="post" value="<?php echo get_the_title(); ?>">
            <input type="hidden" name="link" value="<?php echo get_the_permalink(); ?>">
            <input type="hidden" name="FORM" value="Request Brochure">
            <input type="submit">
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
    </form>
  </div>


<div id="myModal7" class="modal">
  <form class="submitform" action="" method="POST">
    <div class="modal-content modal-content-big"> <span  class="close" data-toggleModal="myModal7" >&times;</span>
    <div class="modal-header"><h4 class="modal-title" id="contactLabel">
      Request Availbility List</h4><div class="modal-header-agent">
        <?php if( $image_id ) {
        $thumbnail = wp_get_attachment_image_src($image_id,'full', true); ?>
        <img src="<?php echo $thumbnail[0]; ?>" alt="">
        <?php } ?>
        </div><div class="clearfix"></div></div>
        <ul class="width-50">
          <li>
            <label>Text</label>
            <input type="text" name="Name" required="">
          </li>
          <li>
            <label>Email</label>
            <input type="email" name="Email" required="">
          </li>
          <li>
            <label>Phone</label>
            <input type="number" name="Phone" required="">
          </li>
          <li>
            <label>Message</label>
            <input type="text" name="message" required="">
          </li>
          <li>
            <input type="hidden" name="post" value="<?php echo get_the_title(); ?>">
            <input type="hidden" name="link" value="<?php echo get_the_permalink(); ?>">
            <input type="hidden" name="FORM" value="Request Availbility List">
            <input type="submit">
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
    </form>
  </div>


<div id="myModal8" class="modal">
  <form class="submitform" action="" method="POST">
    <div class="modal-content modal-content-big"> <span  class="close" data-toggleModal="myModal8" >&times;</span>
    <div class="modal-header"><h4 class="modal-title" id="contactLabel">
      Request Payment Plan</h4><div class="modal-header-agent">
        <?php if( $image_id ) {
        $thumbnail = wp_get_attachment_image_src($image_id,'full', true); ?>
        <img src="<?php echo $thumbnail[0]; ?>" alt="">
        <?php } ?>
        </div><div class="clearfix"></div></div>
        <ul class="width-50">
          <li>
            <label>Text</label>
            <input type="text" name="Name" required="">
          </li>
          <li>
            <label>Email</label>
            <input type="email" name="Email" required="">
          </li>
          <li>
            <label>Phone</label>
            <input type="number" name="Phone" required="">
          </li>
          <li>
            <label>Message</label>
            <input type="text" name="message" required="">
          </li>
          <li>
            <input type="hidden" name="post" value="<?php echo get_the_title(); ?>">
            <input type="hidden" name="link" value="<?php echo get_the_permalink(); ?>">
            <input type="hidden" name="FORM" value="Request Payment Plan">
            <input type="submit">
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
    </form>
  </div>


=======
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
    </div>



<<<<<<< HEAD
    <div style="clear: both;"></div>

=======
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e


  <?php endwhile; ?>


<<<<<<< HEAD



    <div class="main-contents">
      <div class="lhs">
      <p class="sharefriend similar">Similar Projects</p>
      <?php

      //get the taxonomy terms of custom post type
      $customTaxonomyTerms = wp_get_object_terms( $post->ID, 'property-category', array('fields' => 'ids') );

      //query arguments
      $args = array(
      'post_type' => 'property',
      'post_status' => 'publish',
      'posts_per_page' => 4,
      'orderby' => 'rand',
      'tax_query' => array(
      array(
      'taxonomy' => 'property-category',
      'field' => 'id',
      'terms' => $customTaxonomyTerms
      )
      ),
      'post__not_in' => array ($post->ID),
      );

      //the query
      $relatedPosts = new WP_Query( $args );

      //loop through query
      if($relatedPosts->have_posts()){
      echo '<ul class="width-50">';
      while($relatedPosts->have_posts()){ 
        $relatedPosts->the_post();
        require ULPROURL. '/templates/content.php';
      }
      echo '</ul>';
      }else{
      //no posts found
      }

      //restore original post data
      wp_reset_postdata();

      ?>

      <div style="clear: both;"></div>



      </div>
      <div class="rhs">

      </div>

    </div>


=======
  <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e




<<<<<<< HEAD
<?php get_footer(); ?>


<script type="text/javascript" src="<?php echo ULMAINURL; ?>/assets/vendor/jquery.validate.min.js"></script> 
<script type="text/javascript" src="<?php echo ULMAINURL; ?>/assets/vendor/loadingoverlay.min.js"></script> 
<script type="text/javascript" src="<?php echo ULMAINURL; ?>/assets/vendor/sweetalert.min.js"></script> 

<script>
jQuery('.submitform').validate();
jQuery(document).on('submit', '.submitform', function(event) {
  event.preventDefault();

  if (jQuery(this).valid() == false) {
    return jQuery(this).valid();
  }

  jQuery.LoadingOverlay("show");
  var form = jQuery(this);
  var formData = new FormData(jQuery(this)[0]);
  jQuery.ajax({
    type: 'post',
    url: '<?php echo site_url(); ?>/wp-admin/admin-ajax.php?action=ul_form_submit_email',
    dataType: 'json',
    contentType: false,
    processData: false,
    data: formData,
  })
  .done(function(value) {
    jQuery.LoadingOverlay("hide");
    if (value.status) {
      form.trigger('reset');
      jQuery('.close').trigger('click');
       swal('Thank You!', 'Your Request has been submited!','success');
    }
    console.log(value);
  })
  .fail(function() {
    jQuery.LoadingOverlay("hide");
    console.log("error");
  });
});








 var modal = document.getElementById('myModal');
 var btn = document.getElementById("myBtn");
 var span = document.getElementsByClassName("close")[0];
 btn.onclick = function() {
   modal.style.display = "block";
 }
 span.onclick = function() {
   modal.style.display = "none";
 }
 window.onclick = function(event) {
   if (event.target == modal) {
     modal.style.display = "none";
   }
 }


 jQuery(document).ready(function(){
  jQuery(".btn-modal").click(function(){
   jQuery("#"+jQuery(this).attr('data-toggleModal')).css('display', 'block');
 });
  jQuery(".close").click(function(){
   jQuery("#"+jQuery(this).attr('data-toggleModal')).css('display', 'none');
 });
  jQuery(document).click(function(event) {
    if(jQuery(event.target).is('.modal')) {
     jQuery(".modal").css('display', 'none');
   } 
 });
});
</script>
=======





<?php get_footer();
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
