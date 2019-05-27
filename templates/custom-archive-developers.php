<?php
get_header(); 
global $wpdb;
$category = get_queried_object();
$developerrrr =get_term_by('id', $category->term_id, 'developer');

// print_r($developerrrr);

$developer_phone = get_term_meta( $developerrrr->term_id, 'developer_phone', true );
$developer_email = get_term_meta( $developerrrr->term_id, 'developer_email', true );
$developer_Whatsapp = get_term_meta( $developerrrr->term_id, 'developer_Whatsapp', true );
$image_id = get_term_meta( $developerrrr->term_id, 'developer_image_id', true );
?>




<div class="main-contents">
	<div class="property-header developer-header"><h1>List Of Projects By <?php echo $developerrrr->name;?></h1>
		<span></span>
	</div>
	<!-- <div class="important-note fa fa-bullhorn"><p>Please note that the given contact information is strictly restricted to Real-Estate relevant queries. Kindly do not contact for any other queries.</p></div> -->
	<div class="table-responsive" id="developer-table">
		<table id="tablesort" class="hideContent" >
			<thead>
				<tr>
					<th class="sitemap-development-name header">Project Name</th>
					<th class="sitemap-development-price header">Property Type</th>
					<th class="sitemap-development-count header">Development </th>
					<th class="sitemap-development-count header">Min. Price</th>
					<th class="sitemap-development-count header">Completion Date</th>
				</tr>
			</thead>
			<tbody>
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
					global $ul_fields, $post;
					$completion = wp_get_post_terms( $post->ID, 'completion');
					$types = wp_get_post_terms( $post->ID, 'types');
					$location = wp_get_post_terms( $post->ID, 'location');
					$bedroom = wp_get_post_terms( $post->ID, 'bedroom');
					$developer = wp_get_post_terms( $post->ID, 'developer');
					$development = wp_get_post_terms( $post->ID, 'development');
					$image_id = get_term_meta( $developerrrr->term_id, 'developer_image_id', true );
					$developer_phone = get_term_meta( $developer[0]->term_id, 'developer_phone', true );
					$developer_email = get_term_meta( $developer[0]->term_id, 'developer_email', true );
					$developer_Whatsapp = get_term_meta( $developer[0]->term_id, 'developer_Whatsapp', true );
					?>
					<tr>
						<td class="sitemap-developer"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
						<td class="sitemap-developer-projects">
							<?php
							if ($types):
								foreach ($types as $typeskey):
									echo '<a href="'.site_url('/types/'.$typeskey->slug).'">'.$typeskey->name.'</a>';
								endforeach;
							endif;
							?>
						</td>
						<td class="sitemap-developer-min-price">
							<?php
							if ($development):
								foreach ($development as $keydevelopment):
									echo '<a href="'.site_url('/completion/'.$keydevelopment->slug).'">'.$keydevelopment->name.'</a> ';
								endforeach;
							endif;
							?>
						</td>
						<td class="sitemap-developer-max-price">
							<?php
							if ($ul_fields->price_section_get_meta( 'cs_price' )) {
								echo ul_price($ul_fields->price_section_get_meta( 'cs_price' ));
							} else {
								echo '<a class="askPrice btn-modal" data-toggleModal="myModal4" href="'.get_the_permalink().'">Ask for Price</a>';
							}
							?>
						</td>
						<td class="sitemap-developer-avg-price">
							<?php
							if ($completion):
								foreach ($completion as $key):
									echo '<a href="'.site_url('/completion/'.$key->slug).'">'.$key->name.'</a> ';
								endforeach;
							endif;
							?>
						</td>
					</tr>
				<?php endwhile;
			else :
				require ULPROURL. '/templates/no-content.php';
			endif; ?>
		</tbody>
	</table>
</div>
</div>

<div class="main-contents developer-name-main">
	<div class="developer-name">
		<h2><?php echo $developerrrr->name; ?></h2>
	</div>
</div>


<div style="clear: both;"></div>
<div class="main-contents ">
	<div class="developer-mainnn">
	  <div class="lhs">
	  		<h2>History</h2>
	    	<?php echo $developerrrr->description; ?>
	  </div>
	  <div class="rhs">
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
	      </div>




	<div id="myModal" class="modal">
		<div class="modal-content"> <span class="close">&times;</span>
		<?php if( $image_id ) {
		$thumbnail = wp_get_attachment_image_src($image_id,'full', true); ?>
		<img src="<?php echo $thumbnail[0]; ?>" alt="">
		<?php } ?>
		<h3>Contact <?php echo $developerrrr->name; ?></h3>
		<a href="#"><?php echo $developer_phone; ?></a>
		<h2>IMPORTANT NOTE:</h2>
		<p>This contact information is strictly limited for Real Estate Property Inquiries. Kindly do NOT contact on this for any other reasons.</p>
		<p>Thank you!</p>
	</div>
	</div>

	</div>
</div>
<div style="clear: both;margin-bottom: 50px;"></div>


<div class="main-contents">
	<ul class="width-50">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			
			<?php require ULPROURL. '/templates/content.php'; ?>


		<?php endwhile;
		
	else :
		require ULPROURL. '/templates/no-content.php';
	endif; ?>
</ul>
<div class="clearfix"></div>
</div>




<div id="myModal2" class="modal">
	<form class="submitform" action="" method="POST">
		<div class="modal-content modal-content-big"> <span  class="close" data-toggleModal="myModal2" >&times;</span>
			<div class="modal-header"><h4 class="modal-title" id="contactLabel">
			Request a Meeting</h4><div class="modal-header-agent">
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
					<input type="hidden" name="post" value="<?php echo $developerrrr->name; ?>">
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
				<input type="hidden" name="post" value="<?php echo $developerrrr->name; ?>">
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
				<input type="hidden" name="post" value="<?php echo $developerrrr->name; ?>">
				<input type="hidden" name="FORM" value="Ask For Price">
				<input type="submit">
			</li>
		</ul>
		<div class="clearfix"></div>
	</div>
</form>
</div>






<?php get_footer(); ?>









<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="<?php echo ULMAINURL; ?>/assets/vendor/jquery.validate.min.js"></script> 
<script type="text/javascript" src="<?php echo ULMAINURL; ?>/assets/vendor/loadingoverlay.min.js"></script> 
<script type="text/javascript" src="<?php echo ULMAINURL; ?>/assets/vendor/sweetalert.min.js"></script> 

<script>

	jQuery(document).ready(function() {
		jQuery('#tablesort').DataTable( {
			"paging":   false,
		} );
	});



</script>


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