<?php

$mega_store_woocommerce_custom_css = '';


$mega_store_woocommerce_is_dark_mode_enabled = get_theme_mod( 'mega_store_woocommerce_is_dark_mode_enabled', false );

if ( $mega_store_woocommerce_is_dark_mode_enabled ) {

    $mega_store_woocommerce_custom_css .= 'body,.fixed-header,tr:nth-child(2n+2) ,.page-template-frontpage #site-navigation,#site-navigation{';
    $mega_store_woocommerce_custom_css .= 'background: #000;';
    $mega_store_woocommerce_custom_css .= '}';

    $mega_store_woocommerce_custom_css .= '#site-navigation {';
    $mega_store_woocommerce_custom_css .= 'background: #000 !important;';
    $mega_store_woocommerce_custom_css .= '}';

	$mega_store_woocommerce_custom_css .= '#our-collection button.owl-prev,#our-collection button.owl-next,.sticky .post-content,.comment-content a{';
    $mega_store_woocommerce_custom_css .= 'color: #000';
    $mega_store_woocommerce_custom_css .= '}';

	$mega_store_woocommerce_custom_css .= 'h5.product-text a,#featured-product p.price,.card-header a,.comment-content.card-block p,.post-box.sticky a{';
    $mega_store_woocommerce_custom_css .= 'color: #000 !important';
    $mega_store_woocommerce_custom_css .= '}';

    $mega_store_woocommerce_custom_css .= '.some{';
    $mega_store_woocommerce_custom_css .= 'background: #fff;';
    $mega_store_woocommerce_custom_css .= '}';

    $mega_store_woocommerce_custom_css .= '.some {';
    $mega_store_woocommerce_custom_css .= 'background: #fff !important;';
    $mega_store_woocommerce_custom_css .= '}';
	

    $mega_store_woocommerce_custom_css .= 'body,h1,h2,h3,h4,h5,p,#main-menu ul li a,.woocommerce .woocommerce-ordering select, .woocommerce form .form-row input.input-text, .woocommerce form .form-row textarea,a,.header-search .open-search-form i,i.fas.fa-heart,#our-collection h2,#our-collection button.tablinks,.sidebar-area .wp-block-latest-comments__comment-meta a{';
    $mega_store_woocommerce_custom_css .= 'color: #fff;';
    $mega_store_woocommerce_custom_css .= '}';

    $mega_store_woocommerce_custom_css .= 'a.wc-block-components-product-name, .wc-block-components-product-name,.wc-block-components-totals-footer-item .wc-block-components-totals-item__value,
.wc-block-components-totals-footer-item .wc-block-components-totals-item__label,
.wc-block-components-totals-item__label,.wc-block-components-totals-item__value,
.wc-block-components-product-metadata .wc-block-components-product-metadata__description>p,
.is-medium table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__total .wc-block-components-formatted-money-amount,
.wc-block-components-quantity-selector input.wc-block-components-quantity-selector__input,
.wc-block-components-quantity-selector .wc-block-components-quantity-selector__button,
.wc-block-components-quantity-selector,table.wc-block-cart-items .wc-block-cart-items__row .wc-block-cart-item__quantity .wc-block-cart-item__remove-link,
.wc-block-components-product-price__value.is-discounted,del.wc-block-components-product-price__regular,.logo a,.logo span,#our-collection h5 a,#our-collection p{';
    $mega_store_woocommerce_custom_css .= 'color: #fff !important;';
    $mega_store_woocommerce_custom_css .= '}';

	$mega_store_woocommerce_custom_css .= '.post-box{';
    $mega_store_woocommerce_custom_css .= '    border: 1px solid rgb(229 229 229 / 48%)';
    $mega_store_woocommerce_custom_css .= '}';
}

	/*---------------------------text-transform-------------------*/

	$mega_store_woocommerce_text_transform = get_theme_mod( 'menu_text_transform_mega_store_woocommerce','UPPERCASE');
    if($mega_store_woocommerce_text_transform == 'CAPITALISE'){

		$mega_store_woocommerce_custom_css .='#main-menu ul li a{';

			$mega_store_woocommerce_custom_css .='text-transform: capitalize;';

		$mega_store_woocommerce_custom_css .='}';

	}else if($mega_store_woocommerce_text_transform == 'UPPERCASE'){

		$mega_store_woocommerce_custom_css .='#main-menu ul li a{';

			$mega_store_woocommerce_custom_css .='text-transform: uppercase;';

		$mega_store_woocommerce_custom_css .='}';

	}else if($mega_store_woocommerce_text_transform == 'LOWERCASE'){

		$mega_store_woocommerce_custom_css .='#main-menu ul li a{';

			$mega_store_woocommerce_custom_css .='text-transform: lowercase;';

		$mega_store_woocommerce_custom_css .='}';
	}

	/*---------------------------menu-zoom-------------------*/

		$mega_store_woocommerce_menu_zoom = get_theme_mod( 'mega_store_woocommerce_menu_zoom','None');

    if($mega_store_woocommerce_menu_zoom == 'None'){

		$mega_store_woocommerce_custom_css .='#main-menu ul li a{';

			$mega_store_woocommerce_custom_css .='';

		$mega_store_woocommerce_custom_css .='}';

	}else if($mega_store_woocommerce_menu_zoom == 'Zoominn'){

		$mega_store_woocommerce_custom_css .='#main-menu ul li a:hover{';

			$mega_store_woocommerce_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #0069df;';

		$mega_store_woocommerce_custom_css .='}';
	}

	/*---------------------------Container Width-------------------*/

$mega_store_woocommerce_container_width = get_theme_mod('mega_store_woocommerce_container_width');

	$mega_store_woocommerce_custom_css .='body{';

		$mega_store_woocommerce_custom_css .='width: '.esc_attr($mega_store_woocommerce_container_width).'%; margin: auto;';

	$mega_store_woocommerce_custom_css .='}';

	/*---------------------------Slider-content-alignment-------------------*/


$mega_store_woocommerce_slider_content_alignment = get_theme_mod( 'mega_store_woocommerce_slider_content_alignment','CENTER-ALIGN');

 if($mega_store_woocommerce_slider_content_alignment == 'LEFT-ALIGN'){

		$mega_store_woocommerce_custom_css .='.blog_box{';

			$mega_store_woocommerce_custom_css .='text-align:left;';

		$mega_store_woocommerce_custom_css .='}';


	}else if($mega_store_woocommerce_slider_content_alignment == 'CENTER-ALIGN'){

		$mega_store_woocommerce_custom_css .='.blog_box{';

			$mega_store_woocommerce_custom_css .='text-align:center;';

		$mega_store_woocommerce_custom_css .='}';


	}else if($mega_store_woocommerce_slider_content_alignment == 'RIGHT-ALIGN'){

		$mega_store_woocommerce_custom_css .='.blog_box{';

			$mega_store_woocommerce_custom_css .='text-align:right;';

		$mega_store_woocommerce_custom_css .='}';

	}

	/*---------------------------Copyright Text alignment-------------------*/

$mega_store_woocommerce_copyright_text_alignment = get_theme_mod( 'mega_store_woocommerce_copyright_text_alignment','LEFT-ALIGN');

 if($mega_store_woocommerce_copyright_text_alignment == 'LEFT-ALIGN'){

		$mega_store_woocommerce_custom_css .='.copy-text p{';

			$mega_store_woocommerce_custom_css .='text-align:left;';

		$mega_store_woocommerce_custom_css .='}';


	}else if($mega_store_woocommerce_copyright_text_alignment == 'CENTER-ALIGN'){

		$mega_store_woocommerce_custom_css .='.copy-text p{';

			$mega_store_woocommerce_custom_css .='text-align:center;';

		$mega_store_woocommerce_custom_css .='}';


	}else if($mega_store_woocommerce_copyright_text_alignment == 'RIGHT-ALIGN'){

		$mega_store_woocommerce_custom_css .='.copy-text p{';

			$mega_store_woocommerce_custom_css .='text-align:right;';

		$mega_store_woocommerce_custom_css .='}';

	}

	/*---------------------------related Product Settings-------------------*/


$mega_store_woocommerce_related_product_setting = get_theme_mod('mega_store_woocommerce_related_product_setting',true);

	if($mega_store_woocommerce_related_product_setting == false){

		$mega_store_woocommerce_custom_css .='.related.products, .related h2{';

			$mega_store_woocommerce_custom_css .='display: none;';

		$mega_store_woocommerce_custom_css .='}';
	}

	/*---------------------------Scroll to Top Alignment Settings-------------------*/

	$mega_store_woocommerce_scroll_top_position = get_theme_mod( 'mega_store_woocommerce_scroll_top_position','Right');

	if($mega_store_woocommerce_scroll_top_position == 'Right'){

		$mega_store_woocommerce_custom_css .='.scroll-up{';

			$mega_store_woocommerce_custom_css .='right: 20px;';

		$mega_store_woocommerce_custom_css .='}';

	}else if($mega_store_woocommerce_scroll_top_position == 'Left'){

		$mega_store_woocommerce_custom_css .='.scroll-up{';

			$mega_store_woocommerce_custom_css .='left: 20px;';

		$mega_store_woocommerce_custom_css .='}';

	}else if($mega_store_woocommerce_scroll_top_position == 'Center'){

		$mega_store_woocommerce_custom_css .='.scroll-up{';

			$mega_store_woocommerce_custom_css .='right: 50%;left: 50%;';

		$mega_store_woocommerce_custom_css .='}';
	}

		/*--------------------------- Slider Opacity -------------------*/

	$mega_store_woocommerce_slider_opacity_color = get_theme_mod( 'mega_store_woocommerce_slider_opacity_color','0.6');

	if($mega_store_woocommerce_slider_opacity_color == '0'){

		$mega_store_woocommerce_custom_css .='.blog_inner_box img{';

			$mega_store_woocommerce_custom_css .='opacity:0';

		$mega_store_woocommerce_custom_css .='}';

		}else if($mega_store_woocommerce_slider_opacity_color == '0.1'){

		$mega_store_woocommerce_custom_css .='.blog_inner_box img{';

			$mega_store_woocommerce_custom_css .='opacity:0.1';

		$mega_store_woocommerce_custom_css .='}';

		}else if($mega_store_woocommerce_slider_opacity_color == '0.2'){

		$mega_store_woocommerce_custom_css .='.blog_inner_box img{';

			$mega_store_woocommerce_custom_css .='opacity:0.2';

		$mega_store_woocommerce_custom_css .='}';

		}else if($mega_store_woocommerce_slider_opacity_color == '0.3'){

		$mega_store_woocommerce_custom_css .='.blog_inner_box img{';

			$mega_store_woocommerce_custom_css .='opacity:0.3';

		$mega_store_woocommerce_custom_css .='}';

		}else if($mega_store_woocommerce_slider_opacity_color == '0.4'){

		$mega_store_woocommerce_custom_css .='.blog_inner_box img{';

			$mega_store_woocommerce_custom_css .='opacity:0.4';

		$mega_store_woocommerce_custom_css .='}';

		}else if($mega_store_woocommerce_slider_opacity_color == '0.5'){

		$mega_store_woocommerce_custom_css .='.blog_inner_box img{';

			$mega_store_woocommerce_custom_css .='opacity:0.5';

		$mega_store_woocommerce_custom_css .='}';

		}else if($mega_store_woocommerce_slider_opacity_color == '0.6'){

		$mega_store_woocommerce_custom_css .='.blog_inner_box img{';

			$mega_store_woocommerce_custom_css .='opacity:0.6';

		$mega_store_woocommerce_custom_css .='}';

		}else if($mega_store_woocommerce_slider_opacity_color == '0.7'){

		$mega_store_woocommerce_custom_css .='.blog_inner_box img{';

			$mega_store_woocommerce_custom_css .='opacity:0.7';

		$mega_store_woocommerce_custom_css .='}';

		}else if($mega_store_woocommerce_slider_opacity_color == '0.8'){

		$mega_store_woocommerce_custom_css .='.blog_inner_box img{';

			$mega_store_woocommerce_custom_css .='opacity:0.8';

		$mega_store_woocommerce_custom_css .='}';

		}else if($mega_store_woocommerce_slider_opacity_color == '0.9'){

		$mega_store_woocommerce_custom_css .='.blog_inner_box img{';

			$mega_store_woocommerce_custom_css .='opacity:0.9';

		$mega_store_woocommerce_custom_css .='}';

		}else if($mega_store_woocommerce_slider_opacity_color == '1.0'){

		$mega_store_woocommerce_custom_css .='.blog_inner_box img{';

			$mega_store_woocommerce_custom_css .='opacity:0.9';

		$mega_store_woocommerce_custom_css .='}';

		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$mega_store_woocommerce_overlay_option = get_theme_mod('mega_store_woocommerce_overlay_option', true);

	if($mega_store_woocommerce_overlay_option == false){

		$mega_store_woocommerce_custom_css .='.blog_inner_box img{';

			$mega_store_woocommerce_custom_css .='opacity:0.6;';

		$mega_store_woocommerce_custom_css .='}';
	}

	$mega_store_woocommerce_slider_image_overlay_color = get_theme_mod('mega_store_woocommerce_slider_image_overlay_color', true);

	if($mega_store_woocommerce_slider_image_overlay_color != false){

		$mega_store_woocommerce_custom_css .='.blog_inner_box{';

			$mega_store_woocommerce_custom_css .='background-color: '.esc_attr($mega_store_woocommerce_slider_image_overlay_color).';';

		$mega_store_woocommerce_custom_css .='}';
	}

	/*---------------------------Woocommerce Pagination Alignment Settings-------------------*/

	$mega_store_woocommerce_woocommerce_pagination_position = get_theme_mod( 'mega_store_woocommerce_woocommerce_pagination_position','Center');

	if($mega_store_woocommerce_woocommerce_pagination_position == 'Left'){

		$mega_store_woocommerce_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$mega_store_woocommerce_custom_css .='text-align: left;';

		$mega_store_woocommerce_custom_css .='}';

	}else if($mega_store_woocommerce_woocommerce_pagination_position == 'Center'){

		$mega_store_woocommerce_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$mega_store_woocommerce_custom_css .='text-align: center;';

		$mega_store_woocommerce_custom_css .='}';

	}else if($mega_store_woocommerce_woocommerce_pagination_position == 'Right'){

		$mega_store_woocommerce_custom_css .='.woocommerce nav.woocommerce-pagination{';

			$mega_store_woocommerce_custom_css .='text-align: right;';

		$mega_store_woocommerce_custom_css .='}';
	}


