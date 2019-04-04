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

?>

<style>.single-featured-image-header {display: none;}</style>


<?php while ( have_posts() ) : the_post(); $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(),'full', true);  ?>


  <div class="banner" style="background: url(<?php echo $thumbnail[0]; ?>) no-repeat center !important"> 
    <div class="banner-inner">
      <h3>Starting from</h3>
      <h4><?php echo ul_price($ul_fields->price_section_get_meta( 'cs_price' )); ?></h4>
      <h5><?php the_title(); ?></h5>
      <!-- <h5>STUNNING VIEWS OF THE GOLF COURSE</h5> -->
    </div>
  </div>

  <div class="main-content">
    <div class="lhs">
      <div class="entry-content">
        <?php the_content(); ?>
      <div class="table-area">
        <h3>6 Months Payment Plan (20% Upfront Discount)</h3>
        <ul>
          <li> <a href="#"><span class="fa fa-file-pdf-o"></span> Brochure </a></li>

<?php if (!empty($property_pdf)): ?>
<li> <a  href="<?= wp_get_attachment_url( $property_pdf);  ?>"><span class="fa fa-object-group"></span> Floor Plan </a></li>
<?php endif; ?>

<?php if (!empty($property_attachment)): ?>
          <li><a href="<?= wp_get_attachment_url( $property_attachment);  ?>" target="_blank"><span class="fa fa-map-o"></span> Master Plan </a></li>
<?php endif; ?>

          <li> <a  href="#"><span class="fa fa-table"></span> Availability List</a></li>
          <li> <a data-toggle="modal" href="#contactPP"><span class="fa fa-money"></span> Payment Plan</a> </li>
        </ul>
      </div>

  <?php if (!empty($property_videoembeded)): echo htmlspecialchars_decode($property_videoembeded); endif;  ?>

      


        </div>
    </div>


    <div class="rhs">
      <?php if( $image_id ) {
        $thumbnail = wp_get_attachment_image_src($image_id,'full', true); ?>
        <img src="<?php echo $thumbnail[0]; ?>" alt="">
      <?php } ?>
      <div class="project-contactbar project-contactbar-table "> 
        <a href="#showphone-note" id="myBtn"  class="project-call"> <i class="fa fa-phone"></i> <span> <strong> Call now </strong></span> </a> 
        <a target="_blank" href="https://web.whatsapp.com/send?phone=<?php echo $developer_Whatsapp; ?>&amp;text=Hi, I am Interested in 'Amora in Golf Verde'. Kindly let me know when we can meet and discuss about the project. Thank you. https://dxboffplan.com/properties/amora-golf-verde-damac/" class="table-desktop project-whatsapp"><i class="fa fa-whatsapp"></i> <span>Chat on WhatsApp</span></a> 
        <a href="#" class="project-mail"> <i class="fa fa-envelope-o"></i> <span class="table-desktop">Register your interest</span> <a href="#" class="project-meeting" data-toggle="modal"> <i class="fa fa-handshake-o"></i> <span class="table-desktop">Request a Meeting</span></a> </div>
      </div>








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


    </div>





  <?php endwhile; ?>


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









<?php get_footer();