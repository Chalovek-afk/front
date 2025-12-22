<footer>
  <div class="container">
      <?php
        if (is_active_sidebar('mega-store-woocommerce-footer-sidebar')) {
          echo '<div class="row sidebar-area footer-area wow rollIn">';
            dynamic_sidebar('mega-store-woocommerce-footer-sidebar');
          echo '</div>';
        } else { ?>
          <div id="footer-widgets" role="contentinfo">
            <div class="container">
              <div class="row sidebar-area footer-area">
                <div id="categories-2" class="col-lg-3 col-md-6 widget_categories wow rollIn">
                    <h4 class="title"><?php esc_html_e('Categories', 'mega-store-woocommerce'); ?></h4>
                    <ul>
                        <?php
                        wp_list_categories(array(
                            'title_li' => '',
                        ));
                        ?>
                    </ul>
                </div>
                <div id="pages-2" class="col-lg-3 col-md-6 widget_pages wow rollIn">
                    <h4 class="title"><?php esc_html_e('Pages', 'mega-store-woocommerce'); ?></h4>
                    <ul>
                        <?php
                        wp_list_pages(array(
                            'title_li' => '',
                        ));
                        ?>
                    </ul>
                </div>
                <div id="archives-2" class="col-lg-3 col-md-6 widget_archive wow rollIn">
                    <h4 class="title"><?php esc_html_e('Archives', 'mega-store-woocommerce'); ?></h4>
                    <ul>
                        <?php
                        wp_get_archives(array(
                            'type' => 'postbypost',
                            'format' => 'html',
                            'before' => '<li>',
                            'after' => '</li>',
                        ));
                        ?>
                    </ul>
                </div>
                <div id="calendar" class="col-lg-3 col-md-6 widget_calendar wow rollIn">
                  <h4 class="title"><?php esc_html_e('Calendar', 'mega-store-woocommerce'); ?></h4>
                  <?php get_calendar(); ?>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
    </div>
  <div class="copyright">
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <div class="copy-text">
          <p class="mb-0 py-3">
            <?php
                if (!get_theme_mod('mega_store_woocommerce_footer_text') ) { ?>
                  <a href="<?php echo esc_url('https://www.misbahwp.com/products/free-woocommerce-wordpress-theme'); ?>" target="_blank">
                  <?php esc_html_e('Mega Store WordPress Theme','mega-store-woocommerce'); ?></a>
                <?php } else {
                  echo esc_html(get_theme_mod('mega_store_woocommerce_footer_text'));
                }
              ?>
            <?php if ( get_theme_mod('mega_store_woocommerce_copyright_enable', true) == true ) : ?>
              <?php
              /* translators: %s: Misbah WP */
              printf( esc_html__( 'by %s', 'mega-store-woocommerce' ), 'Misbah WP' ); ?>
              <a href="<?php echo esc_url('https://wordpress.org'); ?>" rel="generator"><?php  /* translators: %s: WordPress */  printf( esc_html__( ' | Proudly powered by %s', 'mega-store-woocommerce' ), 'WordPress' ); ?></a>
            <?php endif; ?>
                <?php $mega_store_woocommerce_footer_settings = get_theme_mod( 'mega_store_woocommerce_footer_social_links_settings' ); ?>
                <?php if ( is_array($mega_store_woocommerce_footer_settings) || is_object($mega_store_woocommerce_footer_settings) ){ ?>
                        <?php foreach( $mega_store_woocommerce_footer_settings as $mega_store_woocommerce_footer_setting ) { ?>
                        <a class="social-links" href="<?php echo esc_url( $mega_store_woocommerce_footer_setting['link_url'] ); ?>">
                            <i class="<?php echo esc_attr( $mega_store_woocommerce_footer_setting['link_text'] ); ?> me-3"></i>
                        </a>
                    <?php } ?>
                <?php } ?>
          </p>
        </div>
      </div>
    </div>
    </div>
  </div>
    <?php $mega_store_woocommerce_scroll_top_icon = get_theme_mod( 'mega_store_woocommerce_scroll_top_icon', 'dashicons dashicons-arrow-up-alt' ); ?>
    <?php if ( get_theme_mod('mega_store_woocommerce_scroll_enable_setting', true) == true ) : ?>
      <div class="scroll-up">
          <a href="#tobottom"><span class="dashicons dashicons-<?php echo esc_attr( $mega_store_woocommerce_scroll_top_icon ); ?>"></span></a>
      </div>
    <?php endif; ?>
</footer>
<?php wp_footer(); ?>

</body>
</html>
