<?php get_header(); ?>







<?php  
$development = get_terms('developer', array('orderby' => 'slug', 'hide_empty' => true)); 
?>

<div class="main-content">
    <h1>LATEST OFF PLAN PROPERTIES</h1>
    <ul class="width-33">
        <?php
        foreach ($development as $key):
            $developer_phone = get_term_meta( $key->term_id, 'developer_phone', true );
            $developer_email = get_term_meta( $key->term_id, 'developer_email', true );
            $developer_Whatsapp = get_term_meta( $key->term_id, 'developer_Whatsapp', true );
            $image_id = get_term_meta( $key->term_id, 'developer_image_id', true );
            ?>
            <li>
                <div class="inner-box">
                    <div class="inner-box-img">
                        <a href="<?php echo site_url('/developer/'.$key->slug); ?>">
                            <?php if( $image_id ) {
                                $thumbnail = wp_get_attachment_image_src($image_id,'full', true); ?>
                                <img src="<?php echo $thumbnail[0]; ?>" alt="">
                            <?php } ?>
                        </a>
                    </div>
                    <div class="grey-area">
                        <a href="#" data-phone="<?php echo $developer_phone;  ?>"><i class="fa fa-phone"></i></a>
                        <a href="#" data-phone="<?php echo $developer_email;  ?>"><i class="fa fa-whatsapp"></i></a>
                        <a href="#" data-phone="<?php echo $developer_Whatsapp;  ?>"><i class="fa fa-envelope"></i></a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
</div>





<?php get_footer(); ?>