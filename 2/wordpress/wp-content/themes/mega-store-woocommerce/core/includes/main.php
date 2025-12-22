<?php

/**
* Get started notice
*/

add_action( 'wp_ajax_mega_store_woocommerce_dismissed_notice_handler', 'mega_store_woocommerce_ajax_notice_handler' );

function mega_store_woocommerce_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function mega_store_woocommerce_deprecated_hook_admin_notice() {
        if ( ! get_option('dismissed-get_started', FALSE ) ) {
        require_once get_template_directory() .'/core/includes/demo-import.php';
            $current_screen = get_current_screen();
			if ( $current_screen->id !== 'appearance_page_mega-store-woocommerce-guide-page' && $current_screen->id != 'migy_image_gallery_page_migy_templates' ) {
			$mega_store_woocommerce_comments_theme = wp_get_theme(); ?>
			<div class="demo-importer-loader">
				<div class="loader-setup-wizard">
					<h2><?php echo esc_html('Importing...','mega-store-woocommerce'); ?></h2>
				</div> 
			</div>
            <div class="mega-store-woocommerce-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
			<div class="mega-store-woocommerce-notice">
				<div class="mega-store-woocommerce-notice-img">
					<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/admin-logo.png'); ?>" alt="<?php esc_attr_e('logo', 'mega-store-woocommerce'); ?>">
				</div>
				<div class="mega-store-woocommerce-notice-content">
					<div class="mega-store-woocommerce-notice-heading"><?php esc_html_e('Thanks for installing ','mega-store-woocommerce'); ?><?php echo esc_html( $mega_store_woocommerce_comments_theme ); ?></div>
					<div class="diplay-flex-btn">
						<a class="button button-primary" href="<?php echo esc_url(admin_url('themes.php?page=mega-store-woocommerce-guide-page')); ?>"><?php echo esc_html__('More Option','mega-store-woocommerce'); ?></a>
						<?php if(isset($_GET['import-demo']) && $_GET['import-demo'] == true){ ?>
				    		<a class="button button-success" href="<?php echo esc_url(home_url()); ?>" target="_blank"><?php echo esc_html__('Go to Homepage','mega-store-woocommerce'); ?></a> <span class="imp-success"><?php echo esc_html__('Imported Successfully','mega-store-woocommerce'); ?></span>
				    	<?php } else { ?>
						<form id="demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.phps" method="POST">
				        	<input  type="submit" name="submit" value="<?php esc_attr_e('Demo Import','mega-store-woocommerce'); ?>" class="button button-primary">
				    	</form>
				    	<?php } ?>
					</div>
				</div>
			</div>
		</div>
        <?php }
	}
}

add_action( 'admin_notices', 'mega_store_woocommerce_deprecated_hook_admin_notice' );

add_action( 'admin_menu', 'mega_store_woocommerce_getting_started' );
function mega_store_woocommerce_getting_started() {
	add_theme_page( esc_html__('Get Started', 'mega-store-woocommerce'), esc_html__('Get Started', 'mega-store-woocommerce'), 'edit_theme_options', 'mega-store-woocommerce-guide-page', 'mega_store_woocommerce_test_guide');
}

function mega_store_woocommerce_admin_enqueue_scripts() {
	wp_enqueue_style( 'mega-store-woocommerce-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
	wp_enqueue_script( 'mega-store-woocommerce-admin-script', get_template_directory_uri() . '/js/mega-store-woocommerce-admin-script.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'mega-store-woocommerce-demo-script', get_template_directory_uri() . '/js/demo-script.js', array( 'jquery' ), '', true );
	wp_localize_script( 'mega-store-woocommerce-demo-script', 'mega_store_woocommerce_demo_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'mega_store_woocommerce_admin_enqueue_scripts' );

if ( ! defined( 'MEGA_STORE_WOOCOMMERCE_DOCS_FREE' ) ) {
define('MEGA_STORE_WOOCOMMERCE_DOCS_FREE',__('https://demo.misbahwp.com/docs/mega-store-woocommerce-free-docs/','mega-store-woocommerce'));
}
if ( ! defined( 'MEGA_STORE_WOOCOMMERCE_DOCS_PRO' ) ) {
define('MEGA_STORE_WOOCOMMERCE_DOCS_PRO',__('https://demo.misbahwp.com/docs/mega-store-woocommerce-pro-docs/','mega-store-woocommerce'));
}
if ( ! defined( 'MEGA_STORE_WOOCOMMERCE_BUY_NOW' ) ) {
define('MEGA_STORE_WOOCOMMERCE_BUY_NOW',__('https://www.misbahwp.com/products/megastore-wordpress-theme','mega-store-woocommerce'));
}
if ( ! defined( 'MEGA_STORE_WOOCOMMERCE_SUPPORT_FREE' ) ) {
define('MEGA_STORE_WOOCOMMERCE_SUPPORT_FREE',__('https://wordpress.org/support/theme/mega-store-woocommerce/','mega-store-woocommerce'));
}
if ( ! defined( 'MEGA_STORE_WOOCOMMERCE_REVIEW_FREE' ) ) {
define('MEGA_STORE_WOOCOMMERCE_REVIEW_FREE',__('https://wordpress.org/support/theme/mega-store-woocommerce/reviews/#new-post/','mega-store-woocommerce'));
}
if ( ! defined( 'MEGA_STORE_WOOCOMMERCE_DEMO_PRO' ) ) {
define('MEGA_STORE_WOOCOMMERCE_DEMO_PRO',__('https://demo.misbahwp.com/mega-store-woocommerce/','mega-store-woocommerce'));
}
if( ! defined( 'MEGA_STORE_WOOCOMMERCE_THEME_BUNDLE' ) ) {
define('MEGA_STORE_WOOCOMMERCE_THEME_BUNDLE',__('https://www.misbahwp.com/products/wordpress-bundle','mega-store-woocommerce'));
}

function mega_store_woocommerce_test_guide() { ?>
	<?php $mega_store_woocommerce_theme = wp_get_theme();
	require_once get_template_directory() .'/core/includes/demo-import.php';  ?>

	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( MEGA_STORE_WOOCOMMERCE_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'mega-store-woocommerce' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'mega-store-woocommerce' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( MEGA_STORE_WOOCOMMERCE_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'mega-store-woocommerce' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( MEGA_STORE_WOOCOMMERCE_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'mega-store-woocommerce' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','mega-store-woocommerce'); ?><?php echo esc_html( $mega_store_woocommerce_theme ); ?>  <span><?php esc_html_e('Version: ', 'mega-store-woocommerce'); ?><?php echo esc_html($mega_store_woocommerce_theme['Version']);?></span></h3>
				<div class="demo-import-box">
					<div class="demo-importer-loader">
						<div class="loader-setup-wizard">
							<h2><?php echo esc_html('Importing...','mega-store-woocommerce'); ?></h2>
						</div> 
					</div>
					<h4><?php echo esc_html__('Import homepage demo in just one click.','mega-store-woocommerce'); ?></h4>
					<p><?php echo esc_html__('Get started with the wordpress theme installation','mega-store-woocommerce'); ?></p>
					<?php if(isset($_GET['import-demo']) && $_GET['import-demo'] == true){ ?>
			    		<span class="imp-success"><?php echo esc_html__('Imported Successfully','mega-store-woocommerce'); ?></span>  <a class="button button-success" href="<?php echo esc_url(home_url()); ?>" target="_blank"><?php echo esc_html__('Go to Homepage','mega-store-woocommerce'); ?></a>
			    	<?php } else { ?>
					<form id="demo-importer-form" action="<?php echo esc_url(home_url()); ?>/wp-admin/themes.phps" method="POST">
			        	<input  type="submit" name="submit" value="<?php esc_attr_e('Demo Import','mega-store-woocommerce'); ?>" class="button button-primary">
			    	</form>
			    	<?php } ?>
				</div>
				<img class="img_responsive" style="width:100%;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
				<div id="description-insidee">
					<?php
						$mega_store_woocommerce_theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $mega_store_woocommerce_theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postboxx donate">
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'mega-store-woocommerce' ); ?></h3>
				<div class="insidee">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','mega-store-woocommerce'); ?></p>
					<div id="admin_pro_links">
						<a class="blue-button-2" href="<?php echo esc_url( MEGA_STORE_WOOCOMMERCE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'mega-store-woocommerce' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( MEGA_STORE_WOOCOMMERCE_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'mega-store-woocommerce' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( MEGA_STORE_WOOCOMMERCE_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'mega-store-woocommerce' ) ?></a>
					</div>
				</div>

				<h3 class="hndle bundle"><?php esc_html_e( 'Go For Theme Bundle', 'mega-store-woocommerce' ); ?></h3>
				<div class="insidee theme-bundle">
					<p class="offer"><?php esc_html_e('Get 80+ Perfect WordPress Theme In A Single Package at just $89."','mega-store-woocommerce'); ?></p>
					<p class="coupon"><?php esc_html_e('Get Our Theme Pack of 80+ WordPress Themes At 15% Off','mega-store-woocommerce'); ?><span class="coupon-code"><?php esc_html_e('"Bundleup15"','mega-store-woocommerce'); ?></span></p>
					<div id="admin_pro_linkss">
						<a class="blue-button-1" href="<?php echo esc_url( MEGA_STORE_WOOCOMMERCE_THEME_BUNDLE ); ?>" target="_blank"><?php esc_html_e( 'Theme Bundle', 'mega-store-woocommerce' ) ?></a>
					</div>
				</div>
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','mega-store-woocommerce'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','mega-store-woocommerce'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','mega-store-woocommerce'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','mega-store-woocommerce'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','mega-store-woocommerce'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','mega-store-woocommerce'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','mega-store-woocommerce'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','mega-store-woocommerce'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','mega-store-woocommerce'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','mega-store-woocommerce'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','mega-store-woocommerce'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','mega-store-woocommerce'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','mega-store-woocommerce'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','mega-store-woocommerce'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','mega-store-woocommerce'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
	  		</div>
			</div>
		</div>
	</div>

<?php } ?>
