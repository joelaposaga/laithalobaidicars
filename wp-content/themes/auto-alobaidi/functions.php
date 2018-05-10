<?php
function twentyseventeen_setup() {
	load_theme_textdomain( 'twentyseventeen' );
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );
	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );
	add_image_size( 'car_thumb_img', 450, 286, array('center', 'center') );
	add_image_size( 'car_thumb_img_slider', 992, 533, array('center', 'center') );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'twentyseventeen' ),
			'social' => __( 'Social Links Menu', 'twentyseventeen' ),
		)
	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support(
		'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'audio',
		)
	);

	// Add theme support for Custom Logo.
	add_theme_support(
		'custom-logo', array(
			'width'      => 250,
			'height'     => 250,
			'flex-width' => true,
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets'     => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'home',
			'about'            => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact'          => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog'             => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file'       => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file'       => 'assets/images/sandwich.jpg',
			),
			'image-coffee'   => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file'       => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods'  => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "top" location.
			'top'    => array(
				'name'  => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name'  => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( twentyseventeen_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'template_redirect', 'twentyseventeen_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'twentyseventeen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'twentyseventeen' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'twentyseventeen' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Left Sidebar', 'twentyseventeen' ),
			'id'            => 'left-sidebar',
			'description'   => __( 'Left sidebar contents', 'twentyseventeen' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );


/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );


/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts() {
	
	// Theme stylesheet.
	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_theme_file_uri('/libs/font-awesome/css/font-awesome.min.css'), array(), '4.7.0');
	wp_enqueue_style( 'slick-css', get_theme_file_uri('/libs/slick/slick.css'), array(), '1.8.0');
	wp_enqueue_style( 'magnific-popup-css', get_theme_file_uri('/libs/magnific-popup/magnific-popup.css'), array(), '1.1.0');
	wp_enqueue_style( 'bootstrap-grid', get_theme_file_uri('/libs/bootstrap-grid/bootstrap-grid.min.css'), array(), '4.1.0');
	wp_enqueue_style( 'lao_custom_styles', get_theme_file_uri('/css/style.css'), array(), '1.0.0');

	// Theme js scripts succinct
	wp_enqueue_script( 'magnific-popup-js', get_theme_file_uri( '/libs/magnific-popup/jquery.magnific-popup.min.js' ), array(), '1.1.0', true );
	wp_enqueue_script( 'slick-js', get_theme_file_uri( '/libs/slick/slick.min.js' ), array(), '1.8.0', true );
	wp_enqueue_script( 'trunk8', get_theme_file_uri( '/libs/trunk8/trunk8.js' ), array(), '1.0.0', true );
	wp_enqueue_script( 'gsap-tweenlite', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/TweenLite.min.js', array(), '1.20.4', true );
	wp_enqueue_script( 'gsap-CSSPlugin', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.4/plugins/CSSPlugin.min.js', array(), '1.20.4', true );
	wp_enqueue_script( 'lao_custom_scripts', get_theme_file_uri( '/js/script.js' ), array(), '1.0.0', true );


	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$twentyseventeen_l10n = array(
		'quote' => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$twentyseventeen_l10n['expand']   = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse'] = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']     = twentyseventeen_get_svg(
			array(
				'icon'     => 'angle-down',
				'fallback' => true,
			)
		);
	}

	wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			$sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'twentyseventeen_front_page_template' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Seventeen 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentyseventeen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentyseventeen_widget_tag_cloud_args' );


/* remove filter */
remove_filter('the_content', 'wpautop');
remove_filter( 'the_excerpt', 'wpautop' );

/* car demon filters */

function lao_car_list_car_demon($content,$post_id) {
	$cars = cd_get_car( $post_id );

	$content = '
		<div class="car_lists_item">
			<div class="image">
				<a href="'. $cars['link'] .'">
					<div class="inner_image">
						<img src="'. $cars['main_photo'] .'">
					</div>
				</a>
			</div>
			<div class="content">
				<div class="top">
					<a href="'. $cars['link'] .'">'. $cars['post_title'] .'</a>
					<span>AED '. number_format($cars['price']) .'</span>
				</div>
				<div class="middle">
					<div>
						<span>Mileage</span>
						<p>'. $cars['mileage'] .'</p>
					</div>
					<div>
						<span>Engine</span>
						<p>'. $cars['engine'] .'</p>
					</div>
					<div>
						<span>Color</span>
						<p>'. $cars['exterior_color'] .'</p>
					</div>
					<div>
						<span>Stock no.</span>
						<p>#'. $cars['stock_number'] .'</p>
					</div>
				</div>
				<div class="bottom">
					<ul>
						<li><a href="'. $cars['link'] .'" class="car_lists_item_buttons"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> View Details</a></li>
						<li><a href="#inquiry_form" class="car_lists_item_buttons open_inquiry_listings inquire_now" data-car="'.$cars['post_title'].'"><i class="fa fa-question-circle" aria-hidden="true"></i> Inquire Now</a></li>
						<li class="sharing_show_button_list">
							<a href="" class="car_lists_item_buttons"><i class="fa fa-share-alt" aria-hidden="true"></i> Share Vehicle</a>
							<div class="sharing_buttons">'. do_shortcode( '[addtoany url="'. $cars['link'] .'" title="'. $cars['post_title'] .'"]' ) .'</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	';

	return $content;
}
add_filter('cd_srp_filter', 'lao_car_list_car_demon', 10, 2);


function lao_search_filter( $sort ) {
    $sort = '<div class="car_lists_filter"><h3>Cars For Sale</h3>' . $sort . '</div>';
    return $sort;
}
add_filter( 'cd_sort_filter', 'lao_search_filter', 10, 1 );

function lao_results_found_filter( $content ) {
    $content = '<div class="lao_car_lists_found">' . $content . '</div>';
    return $content;
}
add_filter( 'cd_results_found_filter', 'lao_results_found_filter', 10, 1);

function lao_searched_by_func( $searched_by ) {
    $searched_by = str_replace( '<span class="search_by_comma">,</span>', '', $searched_by );
    return $searched_by;
}
add_filter( 'cd_searched_by_filter', 'lao_searched_by_func', 10, 1 );

function lao_bottom_navigation( $nav, $position, $search_query ) {
    if ( 'bottom' === $position ) {
        $nav = '<div class="lao_bottom_navigation">' . $nav . '</div>';
    }
    return $nav;
}
add_filter( 'cd_nav_filter', 'lao_bottom_navigation', 10, 3 );

function lao_vdp( $content, $post_id ) {
	$galleryHolder = '';
	$specsHolder = '';
	$convenienceHolder = '';
	$comfortHolder = '';
	$entertainmentHolder = '';
	$safetyHolder = '';

	$specsArrayHolder = array();
	$convenienceArrayHolder = array();
	$comfortArrayholder = array();
	$entertainmentArrayholder = array();
	$safetyArrayholder = array();

	$singleCars = cd_get_car( $post_id );

	$getGalleryImages = get_post_meta( $post_id, '_images_value', true );
	$galleryImages = explode(',', $getGalleryImages);

	$thumbnails = get_children( array( 'post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' =>'image', 'orderby' => 'menu_order ID', 'order' => 'DESC' ) );

	if (!empty($thumbnails)) {
		foreach ($thumbnails as $thumbnail) {
			$galleryHolder .= '<div><img src="'. wp_get_attachment_url( $thumbnail->ID ) .'"></div>';
		}	
	}

	if (!empty($getGalleryImages)) {
		foreach ($galleryImages as $gi_value) {
			$galleryHolder .= '<div><img src="'. $gi_value .'"></div>';
		}	
	}

	$vehicle_options_list = cd_get_vehicle_map();
	$specs = get_post_meta( $post_id );

	/*var_dump($vehicle_options_list);*/

	foreach ($vehicle_options_list['specs'] as $specs_tabs) {
		foreach (explode(',', $specs_tabs) as $spec_tab) {
			array_push($specsArrayHolder, $spec_tab);
		}
	}

	foreach ($vehicle_options_list['convenience'] as $convenience_tabs) {
		foreach ( explode(',', $convenience_tabs) as $convenience_tab ) {
			array_push($convenienceArrayHolder, $convenience_tab);
		}
	}

	foreach ($vehicle_options_list['comfort'] as $comfort_tabs) {
		foreach ( explode(',', $comfort_tabs) as $comfort_tab ) {
			array_push($comfortArrayholder, $comfort_tab);
		}
	}

	foreach ($vehicle_options_list['entertainment'] as $enter_tabs) {
		foreach ( explode(',', $enter_tabs) as $enter_tab ) {
			array_push($entertainmentArrayholder, $enter_tab);
		}
	}

	foreach ($vehicle_options_list['safety'] as $safety_tabs) {
		foreach ( explode(',', $safety_tabs) as $safety_tab ) {
			array_push($safetyArrayholder, $safety_tab);
		}
	}

	foreach ($specsArrayHolder as $as_value) {

		if(!empty($as_value)) {

			$slug = trim( $as_value );
			$slug = strtolower($slug);
			$slug = str_replace(array(' ', '/'), '_', $slug);

			if (!empty($singleCars[$slug])) {

				$specsHolder .= '<tr>
					<td>'. ucfirst(trim( $as_value )) .'</td>
					<td>'. $singleCars[$slug] .'</td>
				</tr>';

			}

		}

	}

	foreach ($convenienceArrayHolder as $cah_value) {

		if (!empty($cah_value)) {

			$slug = trim( $cah_value );
			$slug = strtolower($slug);
			$slug = str_replace(array(' ', '/'), '_', $slug);

			if (!empty($singleCars['decoded_' . $slug]) && $singleCars['decoded_' . $slug] != 'N/A') {
				$convenienceHolder .= '<li>' . ucfirst(trim( $cah_value )) . '</li>';
			}

		}

	}

	foreach ($comfortArrayholder as $coah_value) {

		if (!empty($coah_value)) {

			$slug = trim( $coah_value );
			$slug = strtolower($slug);
			$slug = str_replace(array(' ', '/'), '_', $slug);

			if (!empty($singleCars['decoded_' . $slug]) && $singleCars['decoded_' . $slug] != 'N/A') {
				$comfortHolder .= '<li>' . ucfirst(trim( $coah_value )) . '</li>';
			}

		}

	}

	foreach ($entertainmentArrayholder as $eah_value) {

		if (!empty($eah_value)) {

			$slug = trim( $eah_value );
			$slug = strtolower($slug);
			$slug = str_replace(array(' ', '/'), '_', $slug);

			if (!empty($singleCars['decoded_' . $slug]) && $singleCars['decoded_' . $slug] != 'N/A') {
				$entertainmentHolder .= '<li>' . ucfirst(trim( $eah_value )) . '</li>';
			}

		}

	}

	foreach ($safetyArrayholder as $sah_value) {

		if (!empty($sah_value)) {

			$slug = trim( $sah_value );
			$slug = strtolower($slug);
			$slug = str_replace(array(' ', '/'), '_', $slug);

			if (!empty($singleCars['decoded_' . $slug]) && $singleCars['decoded_' . $slug] != 'N/A') {
				$safetyHolder .= '<li>' . ucfirst(trim( $sah_value )) . '</li>';
			}

		}

	}


    $content = '<div class="vehicle_display_view">
    	<div class="vdv_header">
    		<h1>'. $singleCars['post_title'] .'</h1>
    		<span>AED '. number_format($singleCars['price']) .'</span>
    	</div>
    	<div class="vdv_buttons">
    		<ul>
    			<li><a href="#inquiry_form" class="open_inquiry_listings single_view_buttons inquire_now" data-car="'. $singleCars['post_title'] .'">Inquire Now</a></li>
    			<li><a href="#email_to_a_friend_form" class="open_email_to_a_friend_listings single_view_buttons">Email to a Friend</a></li>
    			<li><a href="" class="single_view_buttons">Brochure</a>
    			<li class="share_buttons_single"><span>Share: </span>'. do_shortcode( '[addtoany buttons="facebook,twitter,google_plus"]' ) .'
    		</ul>
    	</div>
    	<div class="vdv_image_view">
    		<div class="large">'. $galleryHolder .'</div>
    		<div class="thumb">'. $galleryHolder .'</div>
    	</div>
    	<div class="tabs">
    		<div class="h_tabs">
    			<ul>
    				<li><a href="" data-panel="#p_one" class="active">Specifications</a></li>
    				<li><a href="" data-panel="#p_two">Features</a></li>
    				<li><a href="" data-panel="#p_three">Safety</a></li>
    				<li><a href="" data-panel="#p_four">Contact Us</a></li>
    			</ul>
    		</div>
    		<div class="h_panel">
    			<div id="p_one" class="active_panel">
    				<div class="h_panel_head" class="active">Specifications</div>
    				<div class="inner_panel">
    					<table>
    						<tr>
    							<td colspan="2" class="tab_heading">'. $singleCars['post_title'] .'</td>
    						</tr>
    						'. (!empty($singleCars['post_content']) ? '<tr><td colspan="2" class="tab_content"><p>'. $singleCars['post_content'] .'</p></td></tr>' : '' ) .'
    						<tr>
    							<td>Stock No.</td>
    							<td>'. $singleCars['stock_number'] .'</td>
    						</tr>
    						<tr>
    							<td>Body Style</td>
    							<td>'. $singleCars['decoded_body_style'] .'</td>
    						</tr>
    						<tr>
    							<td>Year</td>
    							<td>'. $singleCars['decoded_model_year'] .'</td>
    						</tr>
    						<tr>
    							<td>Car Make</td>
    							<td>'. $singleCars['decoded_make'] .'</td>
    						</tr>
    						<tr>
    							<td>Car Model</td>
    							<td>'. $singleCars['decoded_model'] .'</td>
    						</tr>
    						<tr>
    							<td>Mileage</td>
    							<td>'. $singleCars['mileage'] .'</td>
    						</tr>
    						'. $specsHolder .'
    					</table>
    				</div>
    			</div>
    			<div id="p_two">
    				<div class="h_panel_head">Features</div>
    				<div class="inner_panel">
    					<table>
							<tr>
								<td colspan="2" class="tab_heading">Convenience</td>
							</tr>
							<tr>
								<td colspan="2">
									<ul>'. $convenienceHolder .'</ul>
								</td>
							</tr>
    					</table>
    					<table>
							<tr>
								<td colspan="2" class="tab_heading">Comfort</td>
							</tr>
							<tr>
								<td colspan="2">
									<ul>'. $comfortHolder .'</ul>
								</td>
							</tr>
    					</table>
    					<table>
							<tr>
								<td colspan="2" class="tab_heading">Entertainment</td>
							</tr>
							<tr>
								<td colspan="2">
									<ul>'. $entertainmentHolder .'</ul>
								</td>
							</tr>
    					</table>
    				</div>
    			</div>
    			<div id="p_three">
    				<div class="h_panel_head">Safety</div>
    				<div class="inner_panel">
    					<table>
							<tr>
								<td colspan="2" class="tab_heading">Safety Features</td>
							</tr>
							<tr>
								<td colspan="2">
									<ul>'. $safetyHolder .'</ul>
								</td>
							</tr>
    					</table>
    				</div>
    			</div>
    			<div id="p_four">
    				<div class="h_panel_head">Contact Us</div>
    				<div class="inner_panel">
    					<table>
							<tr>
								<td colspan="2" class="tab_heading">Inquire Us</td>
							</tr>
							<tr>
								<td colspan="2">
									
								</td>
							</tr>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div id="email_to_a_friend_form" class="white-popup mfp-hide" data-form-car="">
		' . do_shortcode( '[contact-form-7 id="171" title="Email To A Friend" car_id="'. $post_id .'"]' ) . '
	</div>
    ';

    return $content;
}
add_filter( 'cd_vdp_filter', 'lao_vdp', 10, 2 );

/* contactform7 filter */

function lao_email_a_friend_email_hidden( $out, $pairs, $atts ) {
    $my_attr = 'car_id';
 
    if ( isset( $atts[$my_attr] ) ) {
        $out[$my_attr] = $atts[$my_attr];
    }
 
    return $out;
}
add_filter( 'shortcode_atts_wpcf7', 'lao_email_a_friend_email_hidden', 10, 3 );


/* ACF Plugin */
/* google map keys */
function my_acf_google_map_api( $api ){
	$api['key'] = 'AIzaSyAhk41zcRIpT1WoX18_YI8O2dc6CQSIAq0';
	return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


/* Custom Functions */
function get_the_content_with_formatting ($more_link_text = null, $stripteaser = false) {
	
	$content = get_the_content( $more_link_text, $stripteaser );
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);

	return $content;
}

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

/* Get Shortcode Functions */
require get_parent_theme_file_path('/inc/shortcodes.php');
