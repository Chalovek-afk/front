<?php
if (isset($_GET['import-demo']) && $_GET['import-demo'] == true) {
    class MegaStoreWoocommerceDemoImporter {

        public function mega_store_woocommerce_customizer_primary_menu() {
            // Create Primary Menu
            $mega_store_woocommerce_themename = 'Shushi Cafeteria'; // Define the theme name
            $mega_store_woocommerce_menuname = $mega_store_woocommerce_themename . 'Main Menus';
            $mega_store_woocommerce_bpmenulocation = 'main-menu';
            $mega_store_woocommerce_menu_exists = wp_get_nav_menu_object($mega_store_woocommerce_menuname);

            if (!$mega_store_woocommerce_menu_exists) {
                $mega_store_woocommerce_menu_id = wp_create_nav_menu($mega_store_woocommerce_menuname);

                wp_update_nav_menu_item($mega_store_woocommerce_menu_id, 0, array(
                    'menu-item-title' => __('HOME', 'mega-store-woocommerce'),
                    'menu-item-classes' => 'home',
                    'menu-item-url' => home_url('/'),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($mega_store_woocommerce_menu_id, 0, array(
                    'menu-item-title' => __('PAGES', 'mega-store-woocommerce'),
                    'menu-item-classes' => 'pages',
                    'menu-item-url' => get_permalink(get_page_id_by_title('pages')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($mega_store_woocommerce_menu_id, 0, array(
                    'menu-item-title' => __('SHOP', 'mega-store-woocommerce'),
                    'menu-item-classes' => 'shop',
                    'menu-item-url' => get_permalink(get_page_id_by_title('shop')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($mega_store_woocommerce_menu_id, 0, array(
                    'menu-item-title' => __('CATEGORIES', 'mega-store-woocommerce'),
                    'menu-item-classes' => 'categories',
                    'menu-item-url' => get_permalink(get_page_id_by_title('categories')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($mega_store_woocommerce_menu_id, 0, array(
                    'menu-item-title' => __('MEN', 'mega-store-woocommerce'),
                    'menu-item-classes' => 'men',
                    'menu-item-url' => get_permalink(get_page_id_by_title('men')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($mega_store_woocommerce_menu_id, 0, array(
                    'menu-item-title' => __('WOMEN', 'mega-store-woocommerce'),
                    'menu-item-classes' => 'women',
                    'menu-item-url' => get_permalink(get_page_id_by_title('women')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($mega_store_woocommerce_menu_id, 0, array(
                    'menu-item-title' => __('BLOG', 'mega-store-woocommerce'),
                    'menu-item-classes' => 'blog',
                    'menu-item-url' => get_permalink(get_page_id_by_title('blog')),
                    'menu-item-status' => 'publish',
                ));

                wp_update_nav_menu_item($mega_store_woocommerce_menu_id, 0, array(
                    'menu-item-title' => __('CONTACT', 'mega-store-woocommerce'),
                    'menu-item-classes' => 'contact',
                    'menu-item-url' => get_permalink(get_page_id_by_title('contact')),
                    'menu-item-status' => 'publish',
                ));

                if (!has_nav_menu($mega_store_woocommerce_bpmenulocation)) {
                    $locations = get_theme_mod('nav_menu_locations');
                    $locations[$mega_store_woocommerce_bpmenulocation] = $mega_store_woocommerce_menu_id;
                    set_theme_mod('nav_menu_locations', $locations);
                }
            }
        }

        public function setup_widgets() {

        $mega_store_woocommerce_home_id='';
        $mega_store_woocommerce_home_content = '';
        $mega_store_woocommerce_home_title = 'HOME';
        $mega_store_woocommerce_home = array(
            'post_type' => 'page',
            'post_title' => $mega_store_woocommerce_home_title,
            'post_content' => $mega_store_woocommerce_home_content,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_slug' => 'home'
        );
        $mega_store_woocommerce_home_id = wp_insert_post($mega_store_woocommerce_home);

        add_post_meta( $mega_store_woocommerce_home_id, '_wp_page_template', 'frontpage.php' );

        update_option( 'page_on_front', $mega_store_woocommerce_home_id );
        update_option( 'show_on_front', 'page' );

                        // Create a Posts Page
            $mega_store_woocommerce_blog_title = 'PAGES';
            $mega_store_woocommerce_blog_check = get_page_id_by_title($mega_store_woocommerce_blog_title);

            if ($mega_store_woocommerce_blog_check == 1) {
                $mega_store_woocommerce_blog = array(
                    'post_type' => 'page',
                    'post_title' => $mega_store_woocommerce_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'pages',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $mega_store_woocommerce_blog_id = wp_insert_post($mega_store_woocommerce_blog);

                if (!is_wp_error($mega_store_woocommerce_blog_id)) {
                    // update_option('page_for_posts', $mega_store_woocommerce_blog_id);
                }
            }

                        // Create a Posts Page
            $mega_store_woocommerce_blog_title = 'SHOP';
            $mega_store_woocommerce_blog_check = get_page_id_by_title($mega_store_woocommerce_blog_title);

            if ($mega_store_woocommerce_blog_check  == 1) {
                $mega_store_woocommerce_blog = array(
                    'post_type' => 'page',
                    'post_title' => $mega_store_woocommerce_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'shop',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $mega_store_woocommerce_blog_id = wp_insert_post($mega_store_woocommerce_blog);

                if (!is_wp_error($mega_store_woocommerce_blog_id)) {
                    // update_option('page_for_posts', $mega_store_woocommerce_blog_id);
                }
            }

                         // Create a Posts Page
            $mega_store_woocommerce_blog_title = 'CATEGORIES';
            $mega_store_woocommerce_blog_check = get_page_id_by_title($mega_store_woocommerce_blog_title);

            if ($mega_store_woocommerce_blog_check  == 1) {
                $mega_store_woocommerce_blog = array(
                    'post_type' => 'page',
                    'post_title' => $mega_store_woocommerce_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'categories',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $mega_store_woocommerce_blog_id = wp_insert_post($mega_store_woocommerce_blog);

                if (!is_wp_error($mega_store_woocommerce_blog_id)) {
                    // update_option('page_for_posts', $mega_store_woocommerce_blog_id);
                }
            }

            // Create a Posts Page
            $mega_store_woocommerce_blog_title = 'MEN';
            $mega_store_woocommerce_blog_check = get_page_id_by_title($mega_store_woocommerce_blog_title);

            if ($mega_store_woocommerce_blog_check  == 1) {
                $mega_store_woocommerce_blog = array(
                    'post_type' => 'page',
                    'post_title' => $mega_store_woocommerce_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'men',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $mega_store_woocommerce_blog_id = wp_insert_post($mega_store_woocommerce_blog);

                if (!is_wp_error($mega_store_woocommerce_blog_id)) {
                    // update_option('page_for_posts', $mega_store_woocommerce_blog_id);
                }
            }

            // Create a Posts Page
            $mega_store_woocommerce_blog_title = 'WOMEN';
            $mega_store_woocommerce_blog_check = get_page_id_by_title($mega_store_woocommerce_blog_title);

            if ($mega_store_woocommerce_blog_check  == 1) {
                $mega_store_woocommerce_blog = array(
                    'post_type' => 'page',
                    'post_title' => $mega_store_woocommerce_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'women',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $mega_store_woocommerce_blog_id = wp_insert_post($mega_store_woocommerce_blog);

                if (!is_wp_error($mega_store_woocommerce_blog_id)) {
                    // update_option('page_for_posts', $mega_store_woocommerce_blog_id);
                }
            }

            // Create a Posts Page
            $mega_store_woocommerce_blog_title = 'BLOG';
            $mega_store_woocommerce_blog_check = get_page_id_by_title($mega_store_woocommerce_blog_title);

            if ($mega_store_woocommerce_blog_check  == 1) {
                $mega_store_woocommerce_blog = array(
                    'post_type' => 'page',
                    'post_title' => $mega_store_woocommerce_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'blog',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $mega_store_woocommerce_blog_id = wp_insert_post($mega_store_woocommerce_blog);

                if (!is_wp_error($mega_store_woocommerce_blog_id)) {
                    // update_option('page_for_posts', $mega_store_woocommerce_blog_id);
                }
            }

            // Create a Posts Page
            $mega_store_woocommerce_blog_title = 'CONTACT';
            $mega_store_woocommerce_blog_check = get_page_id_by_title($mega_store_woocommerce_blog_title);

            if ($mega_store_woocommerce_blog_check  == 1) {
                $mega_store_woocommerce_blog = array(
                    'post_type' => 'page',
                    'post_title' => $mega_store_woocommerce_blog_title,
                    'post_status' => 'publish',
                    'post_author' => 1,
                    'post_name' => 'contact',
                    'post_content' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."',
                );
                $mega_store_woocommerce_blog_id = wp_insert_post($mega_store_woocommerce_blog);

                if (!is_wp_error($mega_store_woocommerce_blog_id)) {
                    // update_option('page_for_posts', $mega_store_woocommerce_blog_id);
                }
            }

		//-----Slider-----//

		set_theme_mod( 'mega_store_woocommerce_free_delivery_text', 'FREE DELIVERY');
        set_theme_mod( 'mega_store_woocommerce_free_delivery_link', '#');
        set_theme_mod( 'mega_store_woocommerce_return_policy_text', 'RETURNS POLICY');
        set_theme_mod( 'mega_store_woocommerce_return_policy_link', '#');

        set_theme_mod('mega_store_woocommerce_social_links_settings', array(
            array(
                "link_text" => "fab fa-instagram",
                "link_url" => "#"
            ),
            array(
                "link_text" => "fab fa-twitter",
                "link_url" => "#"
            ),
            array(
                "link_text" => "fab fa-youtube",
                "link_url" => "#"
            ),
            array(
                "link_text" => "fab fa-linkedin-in",
                "link_url" => "#"
            )
        ));

		set_theme_mod( 'mega_store_woocommerce_phone_number', '+84 3333 6789');

        set_theme_mod( 'mega_store_woocommerce_myaccount_link', '#');

        set_theme_mod( 'mega_store_woocommerce_header_google_translation', true);

        set_theme_mod( 'mega_store_woocommerce_search_box_enable', true);

        set_theme_mod( 'mega_store_woocommerce_wislist_url', '#');

        /*----------------------------------------------*/
            
		set_theme_mod( 'mega_store_woocommerce_blog_box_enable', true);

		set_theme_mod( 'mega_store_woocommerce_blog_slide_number', '3' );
		$mega_store_woocommerce_latest_post_category = wp_create_category('Slider Post');
			set_theme_mod( 'mega_store_woocommerce_blog_slide_category', 'Slider Post' ); 

		for($i=1; $i<=3; $i++) {

            $mega_store_woocommerce_heading=array('Multipurpose E-Commerce Woocommerce Template', 'Multifunctional Woocommerce Template for E-Commerce', 'Versatile Woocommerce Template for E-Commerce');

			$content = 'A Complete eCommerce Solution which is built by experts. Unlock the power of your online store today with Gougi!';

			// Create post object
			$mega_store_woocommerce_my_post = array(
				'post_title'    => wp_strip_all_tags( $mega_store_woocommerce_heading[$i-1] ),
				'post_content'  => $content,
				'post_status'   => 'publish',
				'post_type'     => 'post',
				'post_category' => array($mega_store_woocommerce_latest_post_category) 
			);

			// Insert the post into the database
			$mega_store_woocommerce_post_id = wp_insert_post( $mega_store_woocommerce_my_post );

			$mega_store_woocommerce_image_url = get_template_directory_uri().'/assets/images/slider'.$i.'.png';

			$mega_store_woocommerce_image_name= 'slider'.$i.'.png';
			$mega_store_woocommerce_upload_dir = wp_upload_dir(); 
			// Set upload folder
			$mega_store_woocommerce_image_data = file_get_contents($mega_store_woocommerce_image_url); 
			 
			// Get image data
			$mega_store_woocommerce_unique_file_name = wp_unique_filename( $mega_store_woocommerce_upload_dir['path'], $mega_store_woocommerce_image_name ); 
			// Generate unique name
			$filename= basename( $mega_store_woocommerce_unique_file_name ); 
			// Create image file name
			// Check folder permission and define file location
			if( wp_mkdir_p( $mega_store_woocommerce_upload_dir['path'] ) ) {
				$file = $mega_store_woocommerce_upload_dir['path'] . '/' . $filename;
			} else {
				$file = $mega_store_woocommerce_upload_dir['basedir'] . '/' . $filename;
			}

            if ( ! function_exists( 'WP_Filesystem' ) ) {
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
            }
            
            WP_Filesystem();
            global $wp_filesystem;
            
            if ( ! $wp_filesystem->put_contents( $file, $mega_store_woocommerce_image_data, FS_CHMOD_FILE ) ) {
                wp_die( 'Error saving file!' );
            }
			$mega_store_woocommerce_wp_filetype = wp_check_filetype( $filename, null );
			$mega_store_woocommerce_attachment = array(
				'post_mime_type' => $mega_store_woocommerce_wp_filetype['type'],
				'post_title'     => sanitize_file_name( $filename ),
				'post_content'   => '',
				'post_type'     => 'post',
				'post_status'    => 'inherit'
			);
			$mega_store_woocommerce_attach_id = wp_insert_attachment( $mega_store_woocommerce_attachment, $file, $mega_store_woocommerce_post_id );
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			$mega_store_woocommerce_attach_data = wp_generate_attachment_metadata( $mega_store_woocommerce_attach_id, $file );
				wp_update_attachment_metadata( $mega_store_woocommerce_attach_id, $mega_store_woocommerce_attach_data );
				set_post_thumbnail( $mega_store_woocommerce_post_id, $mega_store_woocommerce_attach_id );
		}


        //-----Products-----//
        
        set_theme_mod( 'mega_store_woocommerce_product_category_box_enable', true);
        set_theme_mod( 'mega_store_woocommerce_product_category_section_heading', 'Popular Categories');

$title = array('WOMENS', 'MENS', 'SHOES', 'ACCESSORIES', 'GOGGLES', 'JEWELLERY');

for ($i = 1; $i <= 6; $i++) {
    $terms_data = wp_insert_term(
        $title[$i - 1],
        'product_cat',
        array()
    );

    if (!is_wp_error($terms_data) && isset($terms_data['term_id'])) {
        $image_url = get_template_directory_uri() . '/assets/images/product-category' . $i . '.png';
        $upload_dir = wp_upload_dir();
        $image_data = file_get_contents($image_url);
        
        $filename = wp_unique_filename($upload_dir['path'], 'product-category' . $i . '.png');
        $file = trailingslashit($upload_dir['path']) . $filename;
        
        if (!function_exists('WP_Filesystem')) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
        }
        WP_Filesystem();
        global $wp_filesystem;
        
        if ($wp_filesystem->put_contents($file, $image_data, FS_CHMOD_FILE)) {
            $filetype = wp_check_filetype($filename, null);
            $attachment = array(
                'post_mime_type' => $filetype['type'],
                'post_title'     => sanitize_file_name($filename),
                'post_content'   => '',
                'post_status'    => 'inherit'
            );
            
            $attach_id = wp_insert_attachment($attachment, $file);
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            $attach_data = wp_generate_attachment_metadata($attach_id, $file);
            wp_update_attachment_metadata($attach_id, $attach_data);
            
            update_term_meta($terms_data['term_id'], 'thumbnail_id', $attach_id);
            
            set_theme_mod('mega_store_woocommerce_product_category_box_images' . $i, wp_get_attachment_url($attach_id));
            set_theme_mod('mega_store_woocommerce_product_category_box_title' . $i, $title[$i - 1]);
            set_theme_mod('mega_store_woocommerce_product_category_box_title_url' . $i, get_term_link($terms_data['term_id'], 'product_cat'));
        }
    }
}

set_theme_mod('mega_store_woocommerce_product_category_increament', 6);

 //----- Our Products Section----//

        set_theme_mod( 'mega_store_woocommerce_our_collection_section_enable', true);

        set_theme_mod( 'mega_store_woocommerce_our_collection_sub_heading', 'Lorem Simply');
        set_theme_mod( 'mega_store_woocommerce_our_collection_heading', 'OUR COLLECTION');


        set_theme_mod( 'mega_store_woocommerce_our_collection_tab_number', '3');


        for($i=1; $i<=3; $i++) {

            $collection_tab=array('NEW ARRIVALS', 'FEATURED', 'BEST SELLERS');
            set_theme_mod( 'mega_store_woocommerce_our_collection_tabs_text'.$i, $collection_tab[$i-1] );
        }
        
        wp_insert_term(
          'trending-products', // the term
          'product_cat', // the taxonomy
          array(
          'description'=> '',
          'slug' => 'trending-products',
          'term_id'=>10,
          'term_taxonomy_id'=>30,
          ));

          set_theme_mod( 'mega_store_woocommerce_our_collection_category', 'Trending Products' );
          if ( class_exists( 'WooCommerce' ) ) {
            
            $shop_product=array('WOMENS','BAGS','MENSWEAR','WATCHES');
            for($i=1;$i<=4;$i++) {

            $title =$shop_product[$i-1];
            $content = 'Lorem Ipsum simply Te obtinuit ut adepto satis somno. Aliisque institoribus iter deliciae vivet vita. Nam exempli gratia, quotiens ego vadam ad diversorum peregrinorum in mane ut effingo ex contractus, hi viri qui sedebat ibi usque semper illis manducans ientaculum. Solum cum bulla ut debui; EGO youd adepto a macula proiciendi.';

            // Create post object
            $my_post = array(
            'post_title'    => wp_strip_all_tags( $title ),
            'post_content'  => $content,
            'post_status'   => 'publish',
            'post_type'     => 'product',
            );

            // Insert the post into the database
            $post_id = wp_insert_post( $my_post );
            // Gets term object from Tree in the database.
            $term = get_term_by('name', 'trending-products', 'product_cat');
            wp_set_object_terms($post_id, $term->term_id, 'product_cat');

            update_post_meta( $post_id, '_price', '250' );
            update_post_meta( $post_id, '_sale_price', "59" );
            update_post_meta( $post_id, '_regular_price', "59" );
            update_post_meta( $post_id, 'best-custom-field1', "" );
            update_post_meta( $post_id, 'best-custom-field2', "" );


            $image_url = get_template_directory_uri().'/assets/images/our-collection'.$i.'.png';

            $image_name= 'our-collection'.$i.'.png';
            $upload_dir       = wp_upload_dir();
            // Set upload folder
            $image_data= file_get_contents($image_url);
            // Get image data
            $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name );
            // Generate unique name
            $filename= basename( $unique_file_name );
            // Create image file name

            // Check folder permission and define file location
            if( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
            } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
            }

            if ( ! function_exists( 'WP_Filesystem' ) ) {
                require_once( ABSPATH . 'wp-admin/includes/file.php' );
            }
            
            WP_Filesystem();
            global $wp_filesystem;
            
            if ( ! $wp_filesystem->put_contents( $file, $image_data, FS_CHMOD_FILE ) ) {
                wp_die( 'Error saving file!' );
            }

            // Check image file type
            $wp_filetype = wp_check_filetype( $filename, null );

            // Set attachment data
            $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title'     => sanitize_file_name( $filename ),
            'post_content'   => '',
            'post_type'     => 'product',
            'post_status'    => 'inherit'
            );
            // Create the attachment
            $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
            // Include image.php
            require_once(ABSPATH . 'wp-admin/includes/image.php');
            // Define attachment metadata
            $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
            // Assign metadata to attachment
            wp_update_attachment_metadata( $attach_id, $attach_data );
            // And finally assign featured image to post
            set_post_thumbnail( $post_id, $attach_id );
          }
        }

        //-----------------------------------------------------------------//

	 }
    }

	// Instantiate the class and call its methods
    $demo_importer = new MegaStoreWoocommerceDemoImporter();
    $demo_importer->setup_widgets();
    $demo_importer->mega_store_woocommerce_customizer_primary_menu();
}
		
?>