<?php
/*template name:  listdeveloper */
get_header(); 
global $wpdb;
$development = get_terms('developer', array('orderby' => 'slug', 'hide_empty' => true));
?>
<div class="main-contents ">
	<div class="property-header"><h1>List of Property Developers in UAE</h1>
		<span></span>
	</div>
	<div class="important-note fa fa-bullhorn"><p>Please note that the given contact information is strictly restricted to Real-Estate relevant queries. Kindly do not contact for any other queries.</p></div>
	<div class="table-responsive">
		<table id="tablesort" class="hideContent" >
			<thead>
				<tr>
					<th class="sitemap-development-name header">Developer  Name</th>
					<th class="sitemap-development-price header">Property Count</th>
					<th class="sitemap-development-count header">Min Price</th>
					<th class="sitemap-development-count header">Max Price</th>
					<th class="sitemap-development-count header">Avg Price</th>
					<th class="sitemap-development-count header">Contact Developer </th>
					
				</tr>
			</thead>
			<tbody>


        <?php
        foreach ($development as $key):
            $developer_phone = get_term_meta( $key->term_id, 'developer_phone', true );
            $developer_email = get_term_meta( $key->term_id, 'developer_email', true );
            $developer_Whatsapp = get_term_meta( $key->term_id, 'developer_Whatsapp', true );
            $image_id = get_term_meta( $key->term_id, 'developer_image_id', true );
            $thumbnail = wp_get_attachment_image_src($image_id,'thumbnail', true);

            $prices = $wpdb->get_row('
            	SELECT 
            	a.object_id,a.term_taxonomy_id,
            	MIN(b.meta_value) as minprice,
            	MAX(b.meta_value) as maxprice,
            	AVG(b.meta_value) as avgprice
            	FROM '.$wpdb->prefix.'term_relationships AS a
            	INNER JOIN '.$wpdb->prefix.'postmeta as b ON a.object_id = b.post_id
            	WHERE a.term_taxonomy_id = '.$key->term_id.' AND b.meta_key = "cs_price"
            	');

            // pr(wp_get_attachment_metadata($image_id));

            ?>
       


            <tr>
            	<td class="sitemap-developer"><a href="#"><?php echo $key->name;  ?></a></td>
            	<td class="sitemap-developer-projects"><?php echo $key->count;  ?></td>
            	<td class="sitemap-developer-min-price"><?php echo $prices->minprice; ?></td>
            	<td class="sitemap-developer-max-price"><?php echo $prices->maxprice; ?></td>
            	<td class="sitemap-developer-avg-price"><?php echo round($prices->avgprice); ?></td>
            	<td class="sitemap-developer-contact">
            		<a href="tel:<?php echo $developer_phone;  ?>" class="sitemap-phone half-btn open-phone">
            			<i class="fa fa-phone"></i><span class="textContact">Call</span>
            			<span class="textPhone" style="display:none;"><?php echo $developer_phone;  ?></span>
            		</a>
            		<a href="#" data-toggleModal="myModal3" data-name="<?php echo $key->name;  ?>" data-phone="<?php echo $developer_phone;  ?>" data-img="<?php echo $thumbnail[0]; ?>" data-url="#" class="sitemap-contact half-btn btn-modal"><i class="fa fa-envelope-o"></i> <span>Email</span></a>
            	</td>
            </tr>








        <?php endforeach; ?>












		</tbody> 
	</table>
</div>
</div>

<div id="myModal3" class="modal my-css-one">
<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close" data-toggleModal="myModal3"  data-dismiss="modal" aria-hidden="true"><span class="fa fa-close"></span></button>
		<div class="popupproperty">
			<div class="formPropertyDetail">
				<div class="form-photo"><img src="https://dxboffplan.com/wp-content/uploads/2017/11/Aldar-Properties.jpg" alt="Aldar Properties"></div>
				<div class="form-info">
					<h3></h3>
					<h4>Contact our Specialist on <p class="ankr"> +97122356051 </p>  or kindly provide your details below</h4></div>
				</div>
			</div>
		</div>
		<div class="modal-body">
			<form action="#" method="POST" class="submitform">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div class="form-group">
							<textarea id="ca_message" name="contact_message" required="true" placeholder="Your message" rows="3" class="form-control"></textarea>
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 ">
						<div class="form-group">
							<input type="text" id="ca_name" name="contact_name" required="true" placeholder="Your name" class="form-control">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6">
						<div class="form-group">
							<input type="text" id="ca_email" name="contact_email" required="true" placeholder="Your email" class="form-control">
						</div>
					</div>
					<div class="col-xs-12 col-sm-12">
						<div class="form-group">
							<input type="text" id="ca_telephone" name="contact_telephone" required="true" placeholder="Your phone" class="form-control">
						</div>
					</div>
					<div class="col-md-12">
						<input type="submit" name="ca_submit" class="btn btn-green" value="Send">
					</div>			
				</div>
			</form>
		</div>
	</div>
</div>






<?php get_footer(); ?>




<script type="text/javascript" src="<?php echo ULMAINURL; ?>/assets/vendor/loadingoverlay.min.js"></script> 
<script type="text/javascript" src="<?php echo ULMAINURL; ?>/assets/vendor/sweetalert.min.js"></script> 


<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>


jQuery(document).on('submit', '.submitform', function(event) {
  event.preventDefault();
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



 jQuery(document).ready(function(){
  jQuery(".btn-modal").click(function(){


jQuery('#myModal3 h3').text('');
jQuery('#myModal3 h4 .ankr').text('');
jQuery('#myModal3 .form-photo img').attr('src', '');
var name = jQuery(this).data('name');
var phone = jQuery(this).data('phone');
var img = jQuery(this).data('img');

jQuery('#myModal3 h3').text(name);
jQuery('#myModal3 h4 .ankr').text(phone);
jQuery('#myModal3 .form-photo img').attr('src', img);


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


	jQuery(document).ready(function() {
		jQuery('#tablesort').DataTable( {
			"paging":   false,
		} );
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