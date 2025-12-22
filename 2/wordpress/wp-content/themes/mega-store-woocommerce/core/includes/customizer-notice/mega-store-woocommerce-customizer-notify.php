<?php

class Mega_Store_Woocommerce_Customizer_Notify {

	private $config = array(); // Declare $config property
	
	private $mega_store_woocommerce_recommended_actions;
	
	private $recommended_plugins;
	
	private static $instance;
	
	private $mega_store_woocommerce_recommended_actions_title;
	
	private $mega_store_woocommerce_recommended_plugins_title;
	
	private $dismiss_button;
	
	private $mega_store_woocommerce_install_button_label;
	
	private $mega_store_woocommerce_activate_button_label;
	
	private $mega_store_woocommerce_deactivate_button_label;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Mega_Store_Woocommerce_Customizer_Notify ) ) {
			self::$instance = new Mega_Store_Woocommerce_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $mega_store_woocommerce_customizer_notify_recommended_plugins;
		global $mega_store_woocommerce_customizer_notify_mega_store_woocommerce_recommended_actions;

		global $mega_store_woocommerce_install_button_label;
		global $mega_store_woocommerce_activate_button_label;
		global $mega_store_woocommerce_deactivate_button_label;

		$this->mega_store_woocommerce_recommended_actions = isset( $this->config['mega_store_woocommerce_recommended_actions'] ) ? $this->config['mega_store_woocommerce_recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->mega_store_woocommerce_recommended_actions_title = isset( $this->config['mega_store_woocommerce_recommended_actions_title'] ) ? $this->config['mega_store_woocommerce_recommended_actions_title'] : '';
		$this->mega_store_woocommerce_recommended_plugins_title = isset( $this->config['mega_store_woocommerce_recommended_plugins_title'] ) ? $this->config['mega_store_woocommerce_recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$mega_store_woocommerce_customizer_notify_recommended_plugins = array();
		$mega_store_woocommerce_customizer_notify_mega_store_woocommerce_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$mega_store_woocommerce_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->mega_store_woocommerce_recommended_actions ) ) {
			$mega_store_woocommerce_customizer_notify_mega_store_woocommerce_recommended_actions = $this->mega_store_woocommerce_recommended_actions;
		}

		$mega_store_woocommerce_install_button_label    = isset( $this->config['mega_store_woocommerce_install_button_label'] ) ? $this->config['mega_store_woocommerce_install_button_label'] : '';
		$mega_store_woocommerce_activate_button_label   = isset( $this->config['mega_store_woocommerce_activate_button_label'] ) ? $this->config['mega_store_woocommerce_activate_button_label'] : '';
		$mega_store_woocommerce_deactivate_button_label = isset( $this->config['mega_store_woocommerce_deactivate_button_label'] ) ? $this->config['mega_store_woocommerce_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'mega_store_woocommerce_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'mega_store_woocommerce_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'mega_store_woocommerce_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'mega_store_woocommerce_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function mega_store_woocommerce_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'mega-store-woocommerce-customizer-notify-css', get_template_directory_uri() . '/core/includes/customizer-notice/css/mega-store-woocommerce-customizer-notify.css', array());

		wp_enqueue_style( 'plugin-install' );
		wp_enqueue_script( 'plugin-install' );
		wp_add_inline_script( 'plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'updates' );

		wp_enqueue_script( 'mega-store-woocommerce-customizer-notify-js', get_template_directory_uri() . '/core/includes/customizer-notice/js/mega-store-woocommerce-customizer-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'mega-store-woocommerce-customizer-notify-js', 'megastorewoocommerceCustomizercompanionObject', array(
				'ajaxurl'            => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'base_path'          => admin_url(),
				'activating_string'  => __( 'Activating', 'mega-store-woocommerce' ),
			)
		);

	}

	
	public function mega_store_woocommerce_plugin_notification_customize_register( $wp_customize ) {

		
		require_once get_template_directory() . '/core/includes/customizer-notice/mega-store-woocommerce-customizer-notify-section.php';

		$wp_customize->register_section_type( 'Mega_Store_Woocommerce_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new Mega_Store_Woocommerce_Customizer_Notify_Section(
				$wp_customize,
				'mega-store-woocommerce-customizer-notify-section',
				array(
					'title'          => $this->mega_store_woocommerce_recommended_actions_title,
					'plugin_text'    => $this->mega_store_woocommerce_recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function mega_store_woocommerce_customizer_notify_dismiss_recommended_action_callback() {

		global $mega_store_woocommerce_customizer_notify_mega_store_woocommerce_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html( $action_id ); /* this is needed and it's the id of the dismissable required action */ 

		if ( ! empty( $action_id ) ) {
			
			if ( get_option( 'mega_store_woocommerce_customizer_notify_show' ) ) {

				$mega_store_woocommerce_customizer_notify_show_mega_store_woocommerce_recommended_actions = get_option( 'mega_store_woocommerce_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$mega_store_woocommerce_customizer_notify_show_mega_store_woocommerce_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$mega_store_woocommerce_customizer_notify_show_mega_store_woocommerce_recommended_actions[ $action_id ] = false;
						break;
				}
				update_option( 'mega_store_woocommerce_customizer_notify_show', $mega_store_woocommerce_customizer_notify_show_mega_store_woocommerce_recommended_actions );

				
			} else {
				$mega_store_woocommerce_customizer_notify_show_mega_store_woocommerce_recommended_actions = array();
				if ( ! empty( $mega_store_woocommerce_customizer_notify_mega_store_woocommerce_recommended_actions ) ) {
					foreach ( $mega_store_woocommerce_customizer_notify_mega_store_woocommerce_recommended_actions as $mega_store_woocommerce_lite_customizer_notify_recommended_action ) {
						if ( $mega_store_woocommerce_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$mega_store_woocommerce_customizer_notify_show_mega_store_woocommerce_recommended_actions[ $mega_store_woocommerce_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$mega_store_woocommerce_customizer_notify_show_mega_store_woocommerce_recommended_actions[ $mega_store_woocommerce_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					update_option( 'mega_store_woocommerce_customizer_notify_show', $mega_store_woocommerce_customizer_notify_show_mega_store_woocommerce_recommended_actions );
				}
			}
		}
		die(); 
	}

	
	public function mega_store_woocommerce_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html( $action_id ); /* this is needed and it's the id of the dismissable required action */

		if ( ! empty( $action_id ) ) {

			$mega_store_woocommerce_lite_customizer_notify_show_recommended_plugins = get_option( 'mega_store_woocommerce_customizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$mega_store_woocommerce_lite_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$mega_store_woocommerce_lite_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			update_option( 'mega_store_woocommerce_customizer_notify_show_recommended_plugins', $mega_store_woocommerce_lite_customizer_notify_show_recommended_plugins );
		}
		die(); 
	}

}
