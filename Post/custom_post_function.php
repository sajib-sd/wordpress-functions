<?php



function stillinger_post_type_register() {
    $labels = array(
        'name'                  => _x( 'Stillinger', 'Post type general name', 'nyg-enfold-child' ),
        'singular_name'         => _x( 'Stillingers', 'Post type singular name', 'nyg-enfold-child' ),
        'menu_name'             => _x( 'Stillinger', 'Admin Menu text', 'nyg-enfold-child' ),
        'name_admin_bar'        => _x( 'Stillinger', 'Add New on Toolbar', 'nyg-enfold-child' ),
        'add_new'               => __( 'Add New', 'nyg-enfold-child' ),
        'add_new_item'          => __( 'Add New Stillinger', 'nyg-enfold-child' ),
        'new_item'              => __( 'New Stillinger', 'nyg-enfold-child' ),
        'edit_item'             => __( 'Edit Stillinger', 'nyg-enfold-child' ),
        'view_item'             => __( 'View Stillinger', 'nyg-enfold-child' ),
        'featured_image'        => _x( 'Nyheter Cover Image', 'nyg-enfold-child' ),
        'set_featured_image'    => _x( 'Set cover image', 'nyg-enfold-child' ),
        'remove_featured_image' => _x( 'Remove cover image', 'nyg-enfold-child' ),
        'use_featured_image'    => _x( 'Use as cover image', 'nyg-enfold-child' ),
        'archives'              => _x( 'Stillinger archives', 'nyg-enfold-child' ),
    );     
    $args = array(
        'labels'             => $labels,
        'description'        => 'Stillinger custom post type.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'rewrite'            => array( 'slug' => 'stillinger' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => true,
        'menu_position'      => 20,
        'supports'           => array( 'title', 'editor', 'author', 'revisions', 'excerpt', 'thumbnail' ),
        'taxonomies'         => array( 'category', 'post_tag' ),
    );
      
    register_post_type( 'stillinger', $args );
}
add_action( 'init', 'stillinger_post_type_register' );




function stillinger_post_type_query($atts){
	ob_start();
	
	extract( shortcode_atts(array( per_page => 6 ), $atts ) );	


 $args = array(
 	'post_type' => 'stillinger',
 	'post_status' => 'publish',
	'posts_per_page' => $per_page,
	'order' => 'desc',
 	'orderby' => 'date',
	 'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
 );
 $query = new wp_query($args);
 echo '<div class="stillinger-post-main">';
 	echo '<div class="stillinger-post-row">';
 while( $query->have_posts() ) : $query->the_post();
 ?>
 <div class="stillinger-post-column">
 	<div class="stillinger-image"><a href="<?php echo get_the_permalink(); ?>"><?php
 		if( has_post_thumbnail() ){
			echo the_post_thumbnail();
		}	
		?></a></div>
	 <div class="stillinger-text">
	 	<div class="stillinger-title">
		<a href="<?php echo get_the_permalink(); ?>"><?php echo the_title(); ?></a>
 	</div>
 	<div class="stillinger-excerpt">
 	<?php echo the_excerpt(); ?>
	</div>
 	<div class="stillinger-date-btn">
		
 		<p><?php echo get_the_date(); ?></p>
 		<a href="<?php echo get_the_permalink(); ?>">Les mer</a>
 	</div>
	 </div>

</div>
 <?php	
 endwhile;
 echo '</div>';

 //=============================== Pagination Add  ===============================//	
	
 echo '<div class="stillinger-pagination">';
 $big = 999999999; // need an unlikely integer
  	echo paginate_links( array(
     'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
     'format' => '?paged=%#%',
     'current' => max( 1, get_query_var('paged') ),
     'total' => $query->max_num_pages,
 	'type' => 'list'	
 ) );
	
	
 echo '</div>';
	
 	echo '</div>';	
 	wp_reset_postdata();
 	return ob_get_clean();
 }
 add_shortcode("stillinger_post_shortcode", "stillinger_post_type_query");


 //=============================== Permition the post single page  ===============================//

 function avf_alb_supported_post_types_mod_stillinger( array $supported_post_types )
 {
   $supported_post_types[] = 'stillinger';
   return $supported_post_types;
 }
 add_filter('avf_alb_supported_post_types', 'avf_alb_supported_post_types_mod_stillinger', 10, 1);


 function avf_metabox_layout_post_types_mod_stillinger( array $supported_post_types )
 {
  $supported_post_types[] = 'stillinger';
  return $supported_post_types;
 }
 add_filter('avf_metabox_layout_post_types', 'avf_metabox_layout_post_types_mod_stillinger', 10, 1);

