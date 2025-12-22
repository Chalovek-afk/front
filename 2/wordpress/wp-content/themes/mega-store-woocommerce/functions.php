<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

function mega_store_woocommerce_enqueue_google_fonts() {

	require_once get_theme_file_path( 'core/includes/wptt-webfont-loader.php' );

	wp_enqueue_style( 'google-fonts-poppins', 'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'mega_store_woocommerce_enqueue_google_fonts' );

if (!function_exists('mega_store_woocommerce_enqueue_scripts')) {

	function mega_store_woocommerce_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			get_template_directory_uri() . '/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			get_template_directory_uri() . '/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'owl.carousel-css',
			get_template_directory_uri() . '/css/owl.carousel.css',
			array(),'2.3.4'
		);

		wp_enqueue_style('mega-store-woocommerce-style', get_stylesheet_uri(), array() );

		wp_style_add_data('mega-store-woocommerce-style', 'rtl', 'replace');

		wp_enqueue_style(
			'mega-store-woocommerce-media-css',
			get_template_directory_uri() . '/css/media.css',
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'mega-store-woocommerce-woocommerce-css',
			get_template_directory_uri() . '/css/woocommerce.css',
			array(),'2.3.4'
		);

		wp_enqueue_style('dashicons');

		wp_enqueue_script(
			'mega-store-woocommerce-navigation',
			esc_url( get_template_directory_uri() ) . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'owl.carousel-js',
			get_template_directory_uri() . '/js/owl.carousel.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_enqueue_script(
			'mega-store-woocommerce-script',
			get_template_directory_uri() . '/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

			if ( get_theme_mod( 'mega_store_woocommerce_animation_enabled', true ) ) {
	        wp_enqueue_script(
	            'mega-store-woocommerce-wow-script',
	            get_template_directory_uri() . '/js/wow.js',
	            array( 'jquery' ),
	            '1.0',
	            true
	        );

	        wp_enqueue_style(
	            'mega-store-woocommerce-animate',
	            get_template_directory_uri() . '/css/animate.css',
	            array(),
	            '4.1.1'
	        );
	    }

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$mega_store_woocommerce_css = '';

		if ( get_header_image() ) :

			$mega_store_woocommerce_css .=  '
				#site-navigation,.page-template-frontpage #site-navigation{
					background-image: url('.esc_url(get_header_image()).');
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
				}';

		endif;

		wp_add_inline_style( 'mega-store-woocommerce-style', $mega_store_woocommerce_css );

		// Theme Customize CSS.
		require get_template_directory(). '/core/includes/inline.php';
		wp_add_inline_style( 'mega-store-woocommerce-style',$mega_store_woocommerce_custom_css );

	}

	add_action( 'wp_enqueue_scripts', 'mega_store_woocommerce_enqueue_scripts' );

}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('mega_store_woocommerce_after_setup_theme')) {

	function mega_store_woocommerce_after_setup_theme() {

		load_theme_textdomain( 'mega-store-woocommerce', get_stylesheet_directory() . '/languages' );

		if ( ! isset( $mega_store_woocommerce_content_width ) ) $mega_store_woocommerce_content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main menu', 'mega-store-woocommerce' ),
		));

		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'align-wide' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support( 'wp-block-styles' );
		add_theme_support('post-thumbnails');
		add_theme_support( 'custom-background', array(
		  'default-color' => 'f3f3f3'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
			'flex-height' => true,
			'flex-width'  => true,
		) );

		add_theme_support( 'custom-header', array(
			'header-text' => false,
			'width' => 1920,
			'height' => 100,
			'flex-height' => true,
			'flex-width' => true,
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

		add_editor_style( array( '/css/editor-style.css' ) );

		add_action( 'wp_ajax_ive-check-plugin-exists', 'check_plugin_exists' );
		add_action( 'wp_ajax_ive_install_and_activate_plugin', 'mep_install_and_activate_plugin' );
	}

	add_action( 'after_setup_theme', 'mega_store_woocommerce_after_setup_theme', 999 );
}


function mep_install_and_activate_plugin() {

	$post_plugin_details = $_POST['plugin_details'];
	$plugin_text_domain = $post_plugin_details['plugin_text_domain'];
	$plugin_main_file		=	$post_plugin_details['plugin_main_file'];
	$plugin_url					=	$post_plugin_details['plugin_url'];

	$plugin = array(
		'text_domain'	=> $plugin_text_domain,
		'path' 				=> $plugin_url,
		'install' 		=> $plugin_text_domain . '/' . $plugin_main_file
	);

	wp_cache_flush();

	$plugin_path = plugin_basename( trim( $plugin['install'] ) );


	$activate_plugin = activate_plugin( $plugin_path );

	if($activate_plugin) {

		echo $activate_plugin;

	} else {
		echo $activate_plugin;
	}

	$msg = 'installed';

	$response = array( 'status' => true, 'msg' => $msg );
	wp_send_json( $response );
	exit;
}

function check_plugin_exists() {
		$plugin_text_domain = $_POST['plugin_text_domain'];
		$main_plugin_file 	= $_POST['main_plugin_file'];
		$plugin_path = $plugin_text_domain . '/' . $main_plugin_file;

		$get_plugins					= get_plugins();
		$is_plugin_installed	= false;
		$activation_status 		= false;
		if ( isset( $get_plugins[$plugin_path] ) ) {
		$is_plugin_installed = true;

		$activation_status = is_plugin_active( $plugin_path );
		}
		wp_send_json_success(
		array(
		'install_status'  =>	$is_plugin_installed,
			'active_status'		=>	$activation_status,
			'plugin_path'			=>	$plugin_path,
			'plugin_slug'			=>	$plugin_text_domain
		)
		);
}

require get_template_directory() .'/core/includes/customizer-notice/mega-store-woocommerce-customizer-notify.php';
require get_template_directory() .'/core/includes/main.php';
require get_template_directory() .'/core/includes/theme-breadcrumb.php';
require get_template_directory() .'/core/includes/tgm.php';
require get_template_directory() . '/core/includes/customizer.php';
load_template( trailingslashit( get_template_directory() ) . '/core/includes/class-upgrade-pro.php' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue theme logo style */
/*-----------------------------------------------------------------------------------*/
function mega_store_woocommerce_logo_resizer() {

    $mega_store_woocommerce_theme_logo_size_css = '';
    $mega_store_woocommerce_logo_resizer = get_theme_mod('mega_store_woocommerce_logo_resizer');

	$mega_store_woocommerce_theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($mega_store_woocommerce_logo_resizer).'px !important;
			width: '.esc_attr($mega_store_woocommerce_logo_resizer).'px !important;
		}
	';
    wp_add_inline_style( 'mega-store-woocommerce-style',$mega_store_woocommerce_theme_logo_size_css );

}
add_action( 'wp_enqueue_scripts', 'mega_store_woocommerce_logo_resizer' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function mega_store_woocommerce_global_color() {

    $mega_store_woocommerce_theme_color_css = '';
    $mega_store_woocommerce_global_color = get_theme_mod('mega_store_woocommerce_global_color');
    $mega_store_woocommerce_global_color_2 = get_theme_mod('mega_store_woocommerce_global_color_2');
    $mega_store_woocommerce_copyright_bg = get_theme_mod('mega_store_woocommerce_copyright_bg');

	$mega_store_woocommerce_theme_color_css = '
		nav.woocommerce-MyAccount-navigation ul li,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.woocommerce a.added_to_cart:hover,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.wp-block-woocommerce-cart .wc-block-cart__submit-button:hover,.wc-block-components-checkout-place-order-button:hover,.topheader,.social-links i:hover,span.cart-item-box,#main-menu ul.children li a:hover,#main-menu ul.sub-menu li a:hover,p.slider-button a:hover,.slider button.owl-prev i, .slider button.owl-next i ,#our-collection .box .box-content:hover,#our-collection .tab-product:hover span.onsale,.pagination .nav-links a:hover,.pagination .nav-links a:focus,.pagination .nav-links span.current,.mega-store-woocommerce-pagination span.current,.mega-store-woocommerce-pagination span.current:hover,.mega-store-woocommerce-pagination span.current:focus,.mega-store-woocommerce-pagination a span:hover,.mega-store-woocommerce-pagination a span:focus,.woocommerce nav.woocommerce-pagination ul li span.current,.comment-respond input#submit:hover,.comment-reply a:hover,.sidebar-area h4.title,.sidebar-area h1.wp-block-heading,.sidebar-area h2.wp-block-heading,.sidebar-area h3.wp-block-heading,.sidebar-area h4.wp-block-heading,.sidebar-area h5.wp-block-heading,.sidebar-area h6.wp-block-heading,.sidebar-area .wp-block-search__label,.sidebar-area .tagcloud a, p.wp-block-tag-cloud a,.scroll-up a:hover,.triangle35b:nth-child(1),.triangle35b:nth-child(3){
		background: '.esc_attr($mega_store_woocommerce_global_color).';
		}
		@media screen and (min-width: 320px) and (max-width: 767px) {
		    .menu-toggle, .dropdown-toggle,button.close-menu {
		        background: '.esc_attr($mega_store_woocommerce_global_color).';
		    }
		}
		.searchform input[type=submit]:hover,.searchform input[type=submit]:focus{
		background-color: '.esc_attr($mega_store_woocommerce_global_color).';
		}
		a:hover,a:focus,.translation-box .skiptranslate.goog-te-gadget,#main-menu a:hover,#main-menu ul li a:hover,#main-menu li:hover > a,#main-menu a:focus,#main-menu ul li a:focus,#main-menu li.focus > a,#main-menu li:focus > a,#main-menu ul li.current-menu-item > a,#main-menu ul li.current_page_item > a,#main-menu ul li.current-menu-parent > a,#main-menu ul li.current_page_ancestor > a,#main-menu ul li.current-menu-ancestor > a,.post-meta i,#our-collection button.tablinks.active,#our-collection button:hover,#our-collection h5 a,#our-collection ins span.woocommerce-Price-amount.amount,.bread_crumb a:hover,.bread_crumb span,.woocommerce ul.products li.product .price,.woocommerce div.product p.price, .woocommerce div.product span.price,#our-collection .hr1{
			color: '.esc_attr($mega_store_woocommerce_global_color).';
		}
		{
			border-color: '.esc_attr($mega_store_woocommerce_global_color).';
		}
		.wp-block-button__link,p.slider-button a,.slider button.owl-prev i:hover, .slider button.owl-next i:hover,#our-collection .box .box-content,#our-collection .box-content a.added_to_cart.wc-forward,#our-collection span.onsale,.comment-respond input#submit,.comment-reply a,.sidebar-area .tagcloud a:hover,.searchform input[type=submit], .sidebar-area .wp-block-search__button,.scroll-up a,nav.woocommerce-MyAccount-navigation ul li:hover,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce a.added_to_cart,.wp-block-woocommerce-cart .wc-block-cart__submit-button, .wc-block-components-checkout-place-order-button, .wc-block-components-totals-coupon__button,.wp-block-woocommerce-cart .wc-block-components-product-badge,#site-navigation{
			background: '.esc_attr($mega_store_woocommerce_global_color_2).';
		}
		#our-collection h4{
			color: '.esc_attr($mega_store_woocommerce_global_color_2).';
		}
		#our-collection button.tablinks.active,#our-collection .tablinks:hover,.sidebar-area h4.title, .sidebar-area h1.wp-block-heading, .sidebar-area h2.wp-block-heading, .sidebar-area h3.wp-block-heading, .sidebar-area h4.wp-block-heading, .sidebar-area h5.wp-block-heading, .sidebar-area h6.wp-block-heading, .sidebar-area .wp-block-search__label{
			border-color: '.esc_attr($mega_store_woocommerce_global_color_2).';
		}
    	.copyright {
			background: '.esc_attr($mega_store_woocommerce_copyright_bg).';
		}
	';
    wp_add_inline_style( 'mega-store-woocommerce-style',$mega_store_woocommerce_theme_color_css );
    wp_add_inline_style( 'mega-store-woocommerce-woocommerce-css',$mega_store_woocommerce_theme_color_css );

}
add_action( 'wp_enqueue_scripts', 'mega_store_woocommerce_global_color' );


/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('mega_store_woocommerce_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function mega_store_woocommerce_comment($comment, $mega_store_woocommerce_args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'mega-store-woocommerce');
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'mega-store-woocommerce'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($mega_store_woocommerce_args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $mega_store_woocommerce_args['avatar_size']) echo get_avatar($comment, $mega_store_woocommerce_args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
							    <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
							        <time datetime="<?php comment_time( 'c' ); ?>">
							            <?php printf(
							                esc_html__( '%1$s at %2$s', 'mega-store-woocommerce' ),
							                esc_html( get_comment_date() ), esc_html( get_comment_time() ) ); ?>
							        </time>
							    </a>
							    <?php
							    edit_comment_link(esc_html__( 'Edit', 'mega-store-woocommerce' ),'<span class="edit-link">','</span>');?>
							</div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'mega-store-woocommerce'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $mega_store_woocommerce_args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $mega_store_woocommerce_args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for mega_store_woocommerce_comment()

if (!function_exists('mega_store_woocommerce_widgets_init')) {

	function mega_store_woocommerce_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','mega-store-woocommerce'),
			'id'   => 'mega-store-woocommerce-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'mega-store-woocommerce'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar 2','mega-store-woocommerce'),
			'id'   => 'mega-store-woocommerce-sidebar-2',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'mega-store-woocommerce'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Sidebar 3','mega-store-woocommerce'),
			'id'   => 'mega-store-woocommerce-sidebar-3',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'mega-store-woocommerce'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar','mega-store-woocommerce'),
			'id'   => 'mega-store-woocommerce-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'mega-store-woocommerce'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'mega_store_woocommerce_widgets_init' );

}

function mega_store_woocommerce_get_categories_select() {
	$mega_store_woocommerce_teh_cats = get_categories();
	$results = array();
	$mega_store_woocommerce_count = count($mega_store_woocommerce_teh_cats);
	for ($mega_store_woocommerce_i=0; $mega_store_woocommerce_i < $mega_store_woocommerce_count; $mega_store_woocommerce_i++) {
	if (isset($mega_store_woocommerce_teh_cats[$mega_store_woocommerce_i]))
  		$results[$mega_store_woocommerce_teh_cats[$mega_store_woocommerce_i]->slug] = $mega_store_woocommerce_teh_cats[$mega_store_woocommerce_i]->name;
	else
  		$mega_store_woocommerce_count++;
	}
	return $results;
}

function mega_store_woocommerce_sanitize_select( $mega_store_woocommerce_input, $setting ) {
	// Ensure input is a slug
	$mega_store_woocommerce_input = sanitize_key( $mega_store_woocommerce_input );

	// Get list of choices from the control
	// associated with the setting
	$choices = $setting->manager->get_control( $setting->id )->choices;

	// If the input is a valid key, return it;
	// otherwise, return the default
	return ( array_key_exists( $mega_store_woocommerce_input, $choices ) ? $mega_store_woocommerce_input : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'mega_store_woocommerce_loop_columns');
if (!function_exists('mega_store_woocommerce_loop_columns')) {
	function mega_store_woocommerce_loop_columns() {
		$mega_store_woocommerce_columns = get_theme_mod( 'mega_store_woocommerce_per_columns', 3 );
		return $mega_store_woocommerce_columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'mega_store_woocommerce_per_page', 20 );
function mega_store_woocommerce_per_page( $mega_store_woocommerce_cols ) {
  	$mega_store_woocommerce_cols = get_theme_mod( 'mega_store_woocommerce_product_per_page', 9 );
	return $mega_store_woocommerce_cols;
}

// Add filter to modify the number of related products
add_filter( 'woocommerce_output_related_products_args', 'mega_store_woocommerce_products_args' );
function mega_store_woocommerce_products_args( $args ) {
    $args['posts_per_page'] = get_theme_mod( 'custom_related_products_number', 6 );
    $args['columns'] = get_theme_mod( 'custom_related_products_number_per_row', 3 );
    return $args;
}

add_action('after_switch_theme', 'mega_store_woocommerce_setup_options');
function mega_store_woocommerce_setup_options () {
    update_option('dismissed-get_started', FALSE );
}

//add animation class
if ( class_exists( 'WooCommerce' ) ) { 
	add_filter('post_class', function($mega_store_woocommerce, $class, $product_id) {
	    if( is_shop() || is_product_category() ){
	        
	        $mega_store_woocommerce = array_merge(['wow','zoomIn'], $mega_store_woocommerce);
	    }
	    return $mega_store_woocommerce;
	},10,3);
}

function get_page_id_by_title($pagename){

    $args = array(
        'post_type' => 'page',
        'posts_per_page' => 1,
        'post_status' => 'publish',
        'title' => $pagename
    );
    $query = new WP_Query( $args );

    $page_id = '1';
    if (isset($query->post->ID)) {
        $page_id = $query->post->ID;
    }

    return $page_id;
}

add_action( 'customize_register', 'mega_store_woocommerce_remove_setting', 20 );
function mega_store_woocommerce_remove_setting( $wp_customize ) {
    // Check if the setting or control exists before removing
    if ( $wp_customize->get_setting( 'header_textcolor' ) ) {
        $wp_customize->remove_setting( 'header_textcolor' );
    }

    if ( $wp_customize->get_control( 'header_textcolor' ) ) {
        $wp_customize->remove_control( 'header_textcolor' );
    }
} 

// edit link option
if (!function_exists('mega_store_woocommerce_edit_link')) :

    function mega_store_woocommerce_edit_link($view = 'default')
    {
        global $post;
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'mega-store-woocommerce'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link"><i class="fas fa-edit"></i>',
                '</span>'
            );

    }
endif;

add_action( 'after_setup_theme', 'my_emmet_after_setup_theme', 10 );

function my_emmet_after_setup_theme() {

// woocommerce page full-width
remove_action('woocommerce_archive_description', 'mp_emmet_woocommerce_archive_description', 10, 2);
remove_action('woocommerce_after_main_content', 'mp_emmet_woocommerce_after_main_content', 10);
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
remove_action('woocommerce_sidebar', 'mp_emmet_woocommerce_sidebar', 10, 2);
remove_action('woocommerce_before_single_product', 'mp_emmet_woocommerce_before_single_product', 10, 2);

function my_emmet_woocommerce_archive_description() {
echo '<div class="container main-container"><div class="row clearfix"><div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">';
}
add_action('woocommerce_archive_description', 'my_emmet_woocommerce_archive_description', 10, 2);

function my_emmet_woocommerce_after_main_content() {
echo '</div>';
}
add_action('woocommerce_after_main_content', 'my_emmet_woocommerce_after_main_content', 10);

function my_emmet_woocommerce_sidebar() {
echo '</div>'
. '</div>';
}
add_action('woocommerce_sidebar', 'my_emmet_woocommerce_sidebar', 10, 2);

function my_emmet_woocommerce_before_single_product() {
echo '</div><!--container--></div><!-- page-header--><div class="container main-container"><div class="row clearfix"><div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12">';
}
add_action('woocommerce_before_single_product', 'my_emmet_woocommerce_before_single_product', 10, 2);

// Change number of products per page
add_filter( 'loop_shop_per_page', 'my_emmet_woocommerce_loop_shop_per_page', 20 );
function my_emmet_woocommerce_loop_shop_per_page($posts_per_page) {
return 18;
}

}

add_filter( 'woocommerce_prevent_automatic_wizard_redirect', '__return_true' );