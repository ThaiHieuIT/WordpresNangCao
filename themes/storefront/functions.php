<?php

/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme('storefront');
$storefront_version = $theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version'    => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';
require 'inc/wordpress-shims.php';

if (class_exists('Jetpack')) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

function themebs_enqueue_styles()
{
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_script('bootstrap.min.js', get_theme_file_uri('js/bootstrap.min.js'), array('jquery'), '_S_VERSION', true);
	wp_enqueue_style('custom', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('core', get_template_directory_uri() . '/custom.css');
}
add_action('wp_enqueue_scripts', 'themebs_enqueue_styles');



if (storefront_is_woocommerce_activated()) {
	$storefront->woocommerce            = require 'inc/woocommerce/class-storefront-woocommerce.php';
	$storefront->woocommerce_customizer = require 'inc/woocommerce/class-storefront-woocommerce-customizer.php';

	require 'inc/woocommerce/class-storefront-woocommerce-adjacent-products.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
	require 'inc/woocommerce/storefront-woocommerce-functions.php';
}

if (is_admin()) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if (version_compare(get_bloginfo('version'), '4.7.3', '>=') && (is_admin() || is_customize_preview())) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';
	require 'inc/nux/class-storefront-nux-starter-content.php';
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */
function change_my_wp_login_image()
{
	echo "
        <style>
            body.login #login h1 a {
                background: url('" . get_bloginfo('template_url') . "/img/logo.png') 8px 0 no-repeat transparent;
                background-position: center;
                height: 300px;
                width: 320px;
                background-color: #E48C07;
            }
        </style>
    ";
}
add_action("login_head", "change_my_wp_login_image");



function bootstrapSlider()
{
?>
	<style>
		.carousel-item {
			height: 500px;
		}

		.carousel-control-prev,
		.carousel-control-next {
			width: 50px;
		}

		.carousel-inner {
			height: 350px;
			position: relative;
			width: 1000px;
			margin: 0 auto;
			margin-bottom: 30px;
		}
		.carousel-item {
			height: 100%;
			width: 100%;
		}
		.carousel-inner img {
			width: 100% !important;
			position: absolute;
			height: 100% !important;
		}
		#carouselExampleCaptions {
			margin-top: 59px;
		}
		.carousel-control-prev {
			left: 173px;
		}
		.carousel-control-next{
			right: 173px;
		}
		.carousel-control-prev:hover ,.carousel-control-next:hover {
			background-color: transparent;
		}
		.carousel-indicators button {
			height: 12px !important;
			width: 12px !important;
			border-radius: 50%;
		}
	</style>
	<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<?php
				$args = array(
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'danh_muc_slider',
							'field' => 'slug',
							'terms' => array('wrap-slider-1'),
							'include_children' => true,
							'operator' => 'IN'
						)
					),
				);

				$the_query = new WP_Query($args);
				if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post();
						$postid = get_the_ID();
						echo get_the_post_thumbnail($postid, 'full', array('class' => 'd-block w-100'));
					endwhile;
				endif;

				// Reset Post Data
				wp_reset_postdata();
				?>
			</div>
			<div class="carousel-item">
				<?php
				$args = array(
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'danh_muc_slider',
							'field' => 'slug',
							'terms' => array('wrap-slider-2'),
							'include_children' => true,
							'operator' => 'IN'
						)
					),
				);

				$the_query = new WP_Query($args);
				if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post();
						$postid = get_the_ID();
						echo get_the_post_thumbnail($postid, 'full', array('class' => 'd-block w-100'));
					endwhile;
				endif;

				// Reset Post Data
				wp_reset_postdata();
				?>
			</div>
			<div class="carousel-item">
				<?php
				$args = array(
					'tax_query' => array(
						'relation' => 'AND',
						array(
							'taxonomy' => 'danh_muc_slider',
							'field' => 'slug',
							'terms' => array('wrap-slider-3'),
							'include_children' => true,
							'operator' => 'IN'
						)
					),
				);

				$the_query = new WP_Query($args);
				if ($the_query->have_posts()) :
					while ($the_query->have_posts()) : $the_query->the_post();
						$postid = get_the_ID();
						echo get_the_post_thumbnail($postid, 'full', array('class' => 'd-block w-100'));
					endwhile;
				endif;

				// Reset Post Data
				wp_reset_postdata();
				?>
			</div>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
<?php
};

add_shortcode('slider', 'bootstrapSlider');
