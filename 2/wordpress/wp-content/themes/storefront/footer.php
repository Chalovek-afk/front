<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-full -->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' );
			?>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php
function cake_preview_js() {
    ?>
    <script>
    jQuery(document).ready(function($) {
        function updatePreview() {
            var korg = $('#korg').val();     // форма
            var cream = $('#cream').val();   // ярусы
            var form = $("input[name='ppom\\[fields\\]\\[form\\]']:checked").val();   // вкус
            var yar_count = $('#yar_count').val();
			
			console.log(korg, cream, form, yar_count)
			
            if (korg && cream && form && yar_count) {
                var basePath = 'http://localhost/wordpress/wp-content/uploads/cake-preview/';
                var filename = korg + '-' + form + '.jpg';
                //var filename = korg + '-' + cream + '-' + form + '-' + yar_count + '.jpg';
                
                $('#cake-img').attr('src', basePath + filename);
                $('#cake-preview').show();
            } else {
                $('#cake-preview').hide();
            }
        }

        $(document).on('change', '#korg, #cream, input[name="ppom\\[fields\\]\\[form\\]"]:checked, #yar_count', updatePreview);
        updatePreview();
    });
    </script>
?>
    <?php
}
add_action('wp_footer', 'cake_preview_js');?>

<?php wp_footer(); ?>

</body>
</html>
