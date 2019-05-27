<<<<<<< HEAD
<?php get_header();
global $wpdb;
$checktitle = $wpdb->get_row('SELECT * FROM '.$wpdb->prefix.'posts WHERE `post_title` LIKE "%'.$s.'%" AND `post_type` = "property" ');
$checkdeveloper = $wpdb->get_row('
  SELECT * FROM '.$wpdb->prefix.'terms AS `a` INNER JOIN '.$wpdb->prefix.'term_taxonomy AS `b` ON ( `a`.`term_id` = `b`.`term_id` ) WHERE `a`.`name` LIKE "%'.$s.'%" AND `taxonomy` = "developer" LIMIT 1
  ');
$checkdevelopment = $wpdb->get_row('
  SELECT * FROM '.$wpdb->prefix.'terms AS `a` INNER JOIN '.$wpdb->prefix.'term_taxonomy AS `b` ON ( `a`.`term_id` = `b`.`term_id` ) WHERE `a`.`name` LIKE "%'.$s.'%" AND `taxonomy` = "development" LIMIT 1
  ');
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$s        = @$_GET['s'] != '' ? @$_GET['s'] : '';
$post_type    = @$_GET['post_type'] != '' ? @$_GET['post_type'] : '';
=======
<?php
get_header();







$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$s        = @$_GET['search_city'] != '' ? @$_GET['search_city'] : '';
$post_type    = @$_GET['post_type'] != '' ? @$_GET['post_type'] : '';
$uae_state    = @$_GET['uae_state'] != '' ? @$_GET['uae_state'] : '';
$property_type    = @$_GET['property_type'] != '' ? @$_GET['property_type'] : '';
$search_bedrooms    = @$_GET['search_bedrooms'] != '' ? @$_GET['search_bedrooms'] : '';
$search_developers    = @$_GET['search_developers'] != '' ? @$_GET['search_developers'] : '';
$search_developments    = @$_GET['search_developments'] != '' ? @$_GET['search_developments'] : '';
$search_handover    = @$_GET['search_handover'] != '' ? @$_GET['search_handover'] : '';
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
$v_args = array(
  'post_type' => array($post_type),
  'post_status' => array('publish'),
  'paged'       => $paged,
<<<<<<< HEAD
// 's'       =>  $s,
);
$v_args['tax_query'] = ['relation' => 'OR'];
if ($checktitle) {
  $v_args['s']  = $s;
}
if (!$checkdeveloper && !$checkdevelopment) {
  $v_args['s']  = $s;
}
if ($checkdeveloper) {
  $v_args['tax_query'][] = array(
    'taxonomy' => 'developer',
    'field'    => 'name',
    'terms'    => $checkdeveloper->name,
// 'operator ' => 'EXISTS',
  );
}
if ($checkdevelopment) {
  $v_args['tax_query'][] = array(
    'taxonomy' => 'development',
    'field'    => 'name',
    'terms'    => $checkdevelopment->name,
// 'operator ' => 'EXISTS',
  );
}
$vehicleSearchQuery = new WP_Query( $v_args );
?>


<div class="banner-search">
  <div class=" main-contents">
    <h3>NOW IT’S EASY</h3>
    <h4>TO FIND YOUR FUTURE HOME IN DUBAI</h4>
    <form class="form-inline" id="searchPropertyForm" role="search" method="get" action="">
      <input type="text" class="search_custom_field" id="search_city" name="s" placeholder="Project name , Development name, Developer name" autocomplete="on">
      <input type="hidden" name="post_type" value="property">
      <button type="submit" id="searchPropertySubmit" class="btn btn-green">Search</button>
    </form>
  </div>
</div>


<div class=" main-contents">

  <div class="search-resultss">
      <div class="my-6">
          <h4>All Projects</h4>
      </div>
      <div class="my-6">
          <h4> <?php echo $vehicleSearchQuery->found_posts;?> results</h4>
      </div>
  </div>
</div>


<div class="property-wrapper search-projectss">
   <!--<div class="properties-dubai">
     <div class="property-search">
         <div class="property-filter">
            <div class="search-panel">
               <form class="form-inline" id="searchPropertyForm" role="search" method="get" action="">
                  <input type="text" class="search_custom_field" id="search_city" name="s" placeholder="Project name , Development name, Developer name" autocomplete="on">
                  <input type="hidden" name="post_type" value="property">
                  <button type="submit" id="searchPropertySubmit" class="btn btn-green">Search</button>
               </form>
            </div>
         </div>
         <div class="property-header">
            <h1>Properties Search Results</h1>
            <span class="property-total"> <?php //echo $vehicleSearchQuery->found_posts; ?> results </span>
         </div> -->
         <!-- <div class="choose-currency">
            <label>Currency</label>
            <select id="currency_select">
               <option value="aed_currency" selected="selected">AED</option>
               <option value="chi_currency">CN¥</option>
               <option value="eur_currency">EUR</option>
               <option value="gbp_currency">GBP</option>
               <option value="rub_currency">RUB</option>
               <option value="usd_currency">USD</option>
            </select>
         </div>
         <div class="property-sorting">
            <span class="sort-text"> Sort by <i class="fa fa-sliders-h"></i>
            </span><a href="#no" data-toggle="dropdown" class="btn btn-white dropdown-toggle">
            <span class="dropdown-label">
            Newest Projects</span>&nbsp;&nbsp;&nbsp;<span class="caret"></span>
            </a>
            <ul class="dropdown-menu dropdown-select sorter">
               <li class="active"><input type="radio" name="sort" value="newest" checked="checked"><a href="#no">
                  Newest Projects</a>
               </li>
               <li><input type="radio" name="sort" value="price_lo"><a href="#no">
                  Price Low to High</a>
               </li>
               <li><input type="radio" name="sort" value="price_hi"><a href="#no">
                  Price High to Low</a>
               </li>
            </ul>
         </div> 
      </div> -->

    <div class="main-contents">  
        <div class="property-typess">
           <ul>
            <?php 
              $terms = get_terms( 'property-category' ); ?>
              <?php foreach ( $terms as $term): ?>
              <li><a href="<?php echo get_term_link( $term ); ?>"> <?php echo $term->name; ?> <span>(<?php echo $term->count; ?>)</span></a></li>
            <?php endforeach; ?>
          </ul>
        </div>

      </div>
   </div>




<div class="main-contents">
  <ul class="width-50">
    <?php
    if ($vehicleSearchQuery->have_posts() ) :
      while ($vehicleSearchQuery->have_posts() ) : $vehicleSearchQuery->the_post();
        require ULPROURL. '/templates/content.php';
      endwhile;
    else:
      require ULPROURL. '/templates/no-content.php';
    endif; ?>
  </ul>


  <?php  pagination($vehicleSearchQuery->max_num_pages); ?>

</div>



<div class="main-contents">
  <div class="search-bottom">

  <h2>Off Plan Projects in the UAE</h2>
  <p>Off plan property is one of the best investments with rewarding opportunities. With flexible payment plans and huge discount promos sprouting up every now and then, a lot of buyers and investors 
  get lured into making the investment. However, as in the case of any other investment, the decision of buying off plan properties must also be a well-thought out and well-planned one. 
  Here are some of the factors that you must consider if you are planning to invest in off plan projects in the UAE.</p>

  <h2>Reasons to Buy Off Plan Projects in the UAE</h2>
  <p>There are a lot of reasons contributing towards why buyers should buy and invest in off plan projects in Dubai. One of the primary reasons is minimized risk of delayed handover. With a fixed payment schedule, developers are bound to finish their projects on time as in the agreed target date or they will not receive full amount for their project.
  </p>
  <p>
Secondly, off plan projects in the whole of UAE are priced lower than ready-to-move properties. Buying off plan property in all the major Emirates of the country is cheap and is offered in installment-based payment schemes. This allows you to make an investment even when you are on a budget.
</p>
  <p>
Lastly, buyers and investors get to enjoy a higher return of investment (ROI) as the initial value of the property has already appreciated after it is constructed. With market trends likely leaning to property value appreciation, your off-plan property investment in a progressive market like UAE is guaranteed to secure you great returns.</p>
</p>

  <h2>Top Developers’ Off Plan Projects </h2>
  <p>
  The whole of UAE homes an extensive selection of off plan projects especially designed and engineered for the ultimate convenience of every resident. Some of the best projects in all the Emirates are located in magnificent master developments that are custom-made for convenient and comfortable living. With state-of-the-art amenities right at your doorstep and with heightened connectivity and proximity to major road networks, UAE’s off plan projects invariably make it as a wise and fruitful investment both for personal as well as commercial purposes.
</p>
  <p>
The best off-plan properties in Dubai are from some of the Emirate’s top developers like Emaar Properties, DAMAC Properties, Dubai Properties and Azizi Developments among others. With some major development firms rising up in other Emirates of the country like Abu Dhabi and Sharjah, names like Arada Property Developers and Sharjah Holding in Sharjah, and TDIC and Zaya Developers in Abu Dhabi have also rose to recognition. Emaar- a Dubai based development company that has gained worldwide acclaim and recognition having been born from years of design excellence, superb quality and on-time delivery. Some of popular master developments by Emaar are Downtown Dubai, Dubai Marina and Dubai Hills Estate. Equally renowned are Emaar’s off plan properties like Vida Residences, Burj Vista, Creek Rise, The Residences, Park Rise, Maple III villas and a whole lot more.
  </p>

  <h2>Finding the Best Off Plan Projects in UAE made easy
</h2>
<p>
Dxboffplan.com serves as a one-stop online property portal in UAE, listing the most updated off plan property projects from the emirate’s most trusted real estate developers. Browse through different off plan properties detailed with all the necessary information you need: developer’s name, location, sizes and arrangements, payment plan, amenities, photos, brochures and project video.
</p>
<p>
Aside from the detailed project information, you can search from the off-plan properties list and sort them out by category (e.g. apartments, villas, townhouses, etc.), by price range, 
area size, as well as number of bedrooms and bathrooms.’
</p>
<p>
Instead of typing in your search engine one property after the other, dxboffplan.com lays down an online catalogue that allows you to compare and contrast property features with ease. The site is also regularly updated to keep you posted on the latest price changes and discount promos. Once you have chosen a property to purchase, the site also provides an option to easily contact the developer directly for more inquiries. Start browsing now and let your secure your next off plan property investment!
</p>
  </div>
</div>


<div style="clear: both;"></div>
=======
  's'       =>  $s,
);
$v_args['tax_query'] = ['relation' => 'OR'];
if (!empty($_GET['uae_state'])) {
  $v_args['tax_query'][] = array(
    'taxonomy' => 'emirates',
    'field'    => 'slug',
    'terms'    => $uae_state,
  );
}
if (!empty($_GET['property_type'])) {
  $v_args['tax_query'][] = array(
    'taxonomy' => 'types',
    'field'    => 'slug',
    'terms'    => $property_type,
  );
}
if (!empty($_GET['search_bedrooms'])) {
  $v_args['tax_query'][] = array(
    'taxonomy' => 'bedroom',
    'field'    => 'slug',
    'terms'    => $search_bedrooms,
  );
}
if (!empty($_GET['search_developers'])) {
  $v_args['tax_query'][] = array(
    'taxonomy' => 'developer',
    'field'    => 'slug',
    'terms'    => $search_developers,
  );
}
if (!empty($_GET['search_developments'])) {
  $v_args['tax_query'][] = array(
    'taxonomy' => 'development',
    'field'    => 'slug',
    'terms'    => $search_developments,
  );
}
if (!empty($_GET['search_handover'])) {
  $v_args['tax_query'][] = array(
    'taxonomy' => 'completion',
    'field'    => 'slug',
    'terms'    => $search_handover,
  );
}
if (!empty($_GET['search_min_price'])) {
  $v_args['meta_query'] = array(
    array(
      'key' => 'cs_price',
      'value' => array( $_GET['search_min_price'], $_GET['search_max_price'] ),
      'type' => 'numeric',
      'compare' => 'BETWEEN'
    )
  );
}

// pr($v_args);
$vehicleSearchQuery = new WP_Query( $v_args );

?>


<div class="main-content">
	<h1>LATEST OFF PLAN PROPERTIES</h1>
	<ul class="width-50">
		<?php
		if ($vehicleSearchQuery->have_posts() ) :
			while ($vehicleSearchQuery->have_posts() ) : $vehicleSearchQuery->the_post(); 
				require ULPROURL. '/templates/content.php'; 
			endwhile;
			else: 
				require ULPROURL. '/templates/no-content.php';
			endif; ?>
	</ul>
</div>

>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
<?php get_footer();