<?php
if( ! class_exists( 'Showcase_Taxonomy_Images' ) ) {
  class Showcase_Taxonomy_Images {
    
    public function __construct() {
     //
    }

    /**
     * Initialize the class and start calling our hooks and filters
     */
     public function init() {
<<<<<<< HEAD
     // Developer
=======
     // Image actions
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
     add_action( 'developer_add_form_fields', array( $this, 'add_category_image' ), 10, 2 );
     add_action( 'created_developer', array( $this, 'save_category_image' ), 10, 2 );
     add_action( 'developer_edit_form_fields', array( $this, 'update_category_image' ), 10, 2 );
     add_action( 'edited_developer', array( $this, 'updated_category_image' ), 10, 2 );
<<<<<<< HEAD

     // Development
     add_action( 'development_add_form_fields', array( $this, 'add_category_image' ), 10, 2 );
     add_action( 'created_development', array( $this, 'save_category_image' ), 10, 2 );
     add_action( 'development_edit_form_fields', array( $this, 'update_category_image' ), 10, 2 );
     add_action( 'edited_development', array( $this, 'updated_category_image' ), 10, 2 );

     
=======
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
     add_action( 'admin_enqueue_scripts', array( $this, 'load_media' ) );
     add_action( 'admin_footer', array( $this, 'add_script' ) );
   }

   public function load_media() {
<<<<<<< HEAD
     if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'developer' || $_GET['taxonomy'] != 'development') {
=======
     if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'developer' ) {
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
       return;
     }
     wp_enqueue_media();
   }
  
   /**
    * Add a form field in the new category page
    * @since 1.0.0
    */
  
   public function add_category_image( $taxonomy ) { ?>
		
<<<<<<< HEAD

    <?php if ($taxonomy != 'development'): ?>

      <div class="form-field term-group">
       <label for="developer_phone"><?php _e( 'Phone', 'showcase' ); ?></label>
       <input type="text" name="developer_phone">
     </div>

     <div class="form-field term-group">
       <label for="developer_email"><?php _e( 'Email', 'showcase' ); ?></label>
       <input type="text" name="developer_email">
     </div>   

     <div class="form-field term-group">
       <label for="developer_Whatsapp"><?php _e( 'Whatsapp', 'showcase' ); ?></label>
       <input type="text" name="developer_Whatsapp">
     </div>

   <?php endif; ?>  

  <div class="form-field term-group">
       <label for="featured_developer"><?php _e( 'Check if the developer is featured', 'showcase' ); ?></label>
       <?php $featured_developer = get_term_meta( $term->term_id, 'featured_developer', true ); ?>
       <input type="checkbox" name="featured_developer" value="1" <?php  echo (!empty($featured_developer)) ? 'checked' : '' ; ?>>
=======
  <div class="form-field term-group">
       <label for="developer_phone"><?php _e( 'Phone', 'showcase' ); ?></label>
       <input type="text" name="developer_phone">
   </div>

  <div class="form-field term-group">
       <label for="developer_email"><?php _e( 'Email', 'showcase' ); ?></label>
       <input type="text" name="developer_email">
   </div>   

  <div class="form-field term-group">
       <label for="developer_Whatsapp"><?php _e( 'Whatsapp', 'showcase' ); ?></label>
       <input type="text" name="developer_Whatsapp">
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
   </div>      


     <div class="form-field term-group">
       <label for="developer_image_id"><?php _e( 'Image', 'showcase' ); ?></label>
       <input type="hidden" id="developer_image_id" name="developer_image_id" class="custom_media_url" value="">
       <div id="category-image-wrapper"></div>
       <p>
         <input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php _e( 'Add Image', 'showcase' ); ?>" />
         <input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php _e( 'Remove Image', 'showcase' ); ?>" />
       </p>
     </div>
   <?php }

   /**
    * Save the form field
    * @since 1.0.0
    */
   public function save_category_image( $term_id, $tt_id ) {
       if( isset( $_POST['developer_image_id'] ) && '' !== $_POST['developer_image_id'] ){
         add_term_meta( $term_id, 'developer_image_id', absint( $_POST['developer_image_id'] ), true );
       }
       if (isset($_POST['developer_phone'])) {
         add_term_meta( $term_id, 'developer_phone', $_POST['developer_phone'], true );
       }
       if (isset($_POST['developer_email'])) {
         add_term_meta( $term_id, 'developer_email', $_POST['developer_email'], true );
       }
<<<<<<< HEAD

      if (!empty($_POST['featured_developer'])) {
            update_post_meta( $term_id, 'featured_developer', esc_attr( $_POST['featured_developer'] ) );
          } 
      else {
        delete_post_meta( $term_id, 'featured_developer');
      }


=======
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
       if (isset($_POST['developer_Whatsapp'])) {
         add_term_meta( $term_id, 'developer_Whatsapp', $_POST['developer_Whatsapp'], true );
       }       


    }

    /**
     * Edit the form field
     * @since 1.0.0
     */
    public function update_category_image( $term, $taxonomy ) { ?>

<<<<<<< HEAD

      <?php if ($taxonomy != 'development'): ?>

=======
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
      <tr>
        <th scope="row">
          <label for="developer_image_id"><?php _e( 'Phone', 'showcase' ); ?></label>
        </th>
        <td>
          <?php $developer_phone = get_term_meta( $term->term_id, 'developer_phone', true ); ?>
          <input type="text" name="developer_phone" value="<?php echo $developer_phone; ?>">
        </td>
      </tr>

      <tr>
        <th scope="row">
          <label><?php _e( 'Email', 'showcase' ); ?></label>
        </th>
        <td>
          <?php $developer_email = get_term_meta( $term->term_id, 'developer_email', true ); ?>
          <input type="text" name="developer_email" value="<?php echo $developer_email; ?>">
        </td>
      </tr>   

      <tr>
        <th scope="row">
          <label><?php _e( 'Whatsapp', 'showcase' ); ?></label>
        </th>
        <td>
          <?php $developer_Whatsapp = get_term_meta( $term->term_id, 'developer_Whatsapp', true ); ?>
          <input type="text" name="developer_Whatsapp" value="<?php echo $developer_Whatsapp; ?>">
        </td>
      </tr>     
<<<<<<< HEAD
      <?php endif; ?>

      <tr>
        <th scope="row">
          <label><?php _e( 'Check if the developer is featured', 'showcase' ); ?></label>
        </th>
        <td>
          <?php $featured_developer = get_term_meta( $term->term_id, 'featured_developer', true );
           ?>
          <input type="checkbox" name="featured_developer" value="1" <?php echo (!empty($featured_developer)) ? 'checked' : '' ; ?>>
        </td>
      </tr>     
=======
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e



       


      <tr class="form-field term-group-wrap">
        <th scope="row">
          <label for="developer_image_id"><?php _e( 'Image', 'showcase' ); ?></label>
        </th>
        <td>
          <?php $image_id = get_term_meta( $term->term_id, 'developer_image_id', true ); ?>
          <input type="hidden" id="developer_image_id" name="developer_image_id" value="<?php echo esc_attr( $image_id ); ?>">
          <div id="category-image-wrapper">
            <?php if( $image_id ) { ?>
              <?php echo wp_get_attachment_image( $image_id, 'thumbnail' ); ?>
            <?php } ?>
          </div>
          <p>
            <input type="button" class="button button-secondary showcase_tax_media_button" id="showcase_tax_media_button" name="showcase_tax_media_button" value="<?php _e( 'Add Image', 'showcase' ); ?>" />
            <input type="button" class="button button-secondary showcase_tax_media_remove" id="showcase_tax_media_remove" name="showcase_tax_media_remove" value="<?php _e( 'Remove Image', 'showcase' ); ?>" />
          </p>
        </td>
      </tr>
   <?php }

   /**
    * Update the form field value
    * @since 1.0.0
    */
   public function updated_category_image( $term_id, $tt_id ) {
     
     if( isset( $_POST['developer_phone'] )){
       update_term_meta( $term_id, 'developer_phone', $_POST['developer_phone'] );
     }
     if( isset( $_POST['developer_email'] )){
       update_term_meta( $term_id, 'developer_email', $_POST['developer_email'] );
     }    
     if( isset( $_POST['developer_Whatsapp'] )){
       update_term_meta( $term_id, 'developer_Whatsapp', $_POST['developer_Whatsapp'] );
     }     

<<<<<<< HEAD
    if (!empty($_POST['featured_developer'])) {
    update_term_meta( $term_id, 'featured_developer', esc_attr( $_POST['featured_developer'] ) );
    } 
    else {
    delete_term_meta( $term_id, 'featured_developer');
    }

=======
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e

     if( isset( $_POST['developer_image_id'] ) && '' !== $_POST['developer_image_id'] ){
       update_term_meta( $term_id, 'developer_image_id', absint( $_POST['developer_image_id'] ) );
     } else {
       update_term_meta( $term_id, 'developer_image_id', '' );
     }
   }
 
<<<<<<< HEAD

=======
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
   /**
    * Enqueue styles and scripts
    * @since 1.0.0
    */
   public function add_script() {
<<<<<<< HEAD
     if(!isset( $_GET['taxonomy'] )) {
       return;
     } 

     ?>
=======
     if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'developer' ) {
       return;
     } ?>
>>>>>>> 0796b7e637f2902f6f5b13d0be81d13ff22f762e
     <script> jQuery(document).ready( function($) {
       _wpMediaViewsL10n.insertIntoPost = '<?php _e( "Insert", "showcase" ); ?>';
       function ct_media_upload(button_class) {
         var _custom_media = true, _orig_send_attachment = wp.media.editor.send.attachment;
         $('body').on('click', button_class, function(e) {
           var button_id = '#'+$(this).attr('id');
           var send_attachment_bkp = wp.media.editor.send.attachment;
           var button = $(button_id);
           _custom_media = true;
           wp.media.editor.send.attachment = function(props, attachment){
             if( _custom_media ) {
               $('#developer_image_id').val(attachment.id);
               $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
               $( '#category-image-wrapper .custom_media_image' ).attr( 'src',attachment.url ).css( 'display','block' );
             } else {
               return _orig_send_attachment.apply( button_id, [props, attachment] );
             }
           }
           wp.media.editor.open(button); return false;
         });
       }
       ct_media_upload('.showcase_tax_media_button.button');
       $('body').on('click','.showcase_tax_media_remove',function(){
         $('#developer_image_id').val('');
         $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
       });
       // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
       $(document).ajaxComplete(function(event, xhr, settings) {
         var queryStringArr = settings.data.split('&');
         if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
           var xml = xhr.responseXML;
           $response = $(xml).find('term_id').text();
           if($response!=""){
             // Clear the thumb image
             $('#category-image-wrapper').html('');
           }
          }
        });
      });
    </script>
   <?php }
  }
$Showcase_Taxonomy_Images = new Showcase_Taxonomy_Images();
$Showcase_Taxonomy_Images->init(); 


} 
