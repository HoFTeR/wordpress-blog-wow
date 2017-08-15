<?php
	function wowblog_setup(){
	
	load_theme_textdomain('wowblog');
	
	add_theme_support('title-tag');
	
	add_theme_support('custom-logo', 
		array(
			'height'=> 50,
			'width'=> 190, 
			'flex-height'=>true
		));
		
	add_theme_support( 'custom-background');
	
	add_theme_support('post-thumbnails');

	update_option('thumbnail_size_h', 683);
	
	
	// set_post_thumbnail_size(100%,100%);
	
	add_theme_support('html5', 
		array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption'
		)
	);
	
	add_theme_support('post-formats', 
		array(
		'aside',
		'image',
		'video',
		'gallery'
		)
	);
	

	register_nav_menu('primary', 'Primary');
	}

	add_action('after_setup_theme', 'wowblog_setup');
    if ( ! function_exists( 'wowblog_setup' ) ):
        function wowblog_setup() {  
            register_nav_menu( 'primary', __( 'Primary', 'wowblog' ) );
        } endif;

    require_once('wp-bootstrap-navwalker.php');
 
    function load_styles_scripts() {
 
    	// Bootstrap stylesheet.
 
    	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), ' ' );
 
	    //Mytheme stylesheet.
 
	    wp_enqueue_style( 'mytheme-style', get_stylesheet_uri(), array(), ' ' );

   		//Font Awesome

    	wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), ' ' );
 
    	//Bootstrap js
 
    	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), ' ' );

    	wp_enqueue_script('totop-button', get_template_directory_uri() . '/js/ToTopButton.js', array('jquery'));

    	wp_enqueue_script('404-error', get_template_directory_uri() . '/js/404-fadein-text.js', array('jquery'));

    	wp_enqueue_script('speech-bubble', get_template_directory_uri() . '/js/search-bubble.js', array('jquery'));

    	//for subscribe

    	wp_enqueue_script( 'validationEngine-uk', get_template_directory_uri() . '/subscribe/jquery.validationEngine-uk.js', array('jquery'), ' ' );

    	wp_enqueue_script( 'validationEngine', get_template_directory_uri() . '/subscribe/jquery.validationEngine.js', array('jquery'), ' ' );

    	wp_enqueue_script( 'front-subscribers', get_template_directory_uri() . '/subscribe/front-subscribers.js', array('jquery'), ' ' );
    	
		// wp_register_script('dropcaps', get_template_directory_uri() . '/js/dropcaps.js', array('jquery'), ' ' );

    	wp_register_script('dropcaps', get_template_directory_uri() . '/js/dropcaps.js', array('jquery'));

    	//dropcaps for single.php
    	if (is_single()){
			wp_enqueue_script('dropcaps');
 		}

	}
	add_action('wp_enqueue_scripts', 'load_styles_scripts');

	add_filter('nav_menu_css_class', 'add_menu_item_class');

	function add_menu_item_class ( $classes ){
	  $classes[] = 'col-sm-2 col-md-2 delete-padding';
	  return $classes;
	}

	//single views
	function getPostViews($postID){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0";
	    }
	    return $count;
	}

	function setPostViews($postID) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}

	//single views in admin panel

	add_filter('manage_posts_columns', 'posts_column_views');
	add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
	function posts_column_views($defaults){
	    $defaults['post_views'] = __('переглядів');
	    return $defaults;
	}
	function posts_custom_column_views($column_name, $id){
	    if($column_name === 'post_views'){
	        echo getPostViews(get_the_ID());
	    }
	}

	//turn off admin panel 
	if (!current_user_can('administrator')):
	  show_admin_bar(false);
	endif;

	//change login form
	function custom_login_css() {
		echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/login/login-styles.css" />';
	}
	add_action('login_head', 'custom_login_css');

	//function to add to even or odd posts another classes
	// function posts_add_class() {
	//   global $post_num;
	//   if ( ++$post_num % 2 )
	//     $class = 'delete-padding';
	//   else
	//     $class = 'delete-padding-right delete-padding-left';
	//   echo $class;
	// }

	function posts_add_class() {
	  global $post_num;
	  if ( ++$post_num % 2 )
	    $class = 'delete-padding-right delete-padding-left';
	  else
	    $class = 'delete-padding';
	  echo $class;
	}

	function memoirs_reviews_add_class() {
	  global $post_num;
	  if ( ++$post_num % 2 )
	    $class = 'delete-padding';
	  else
	    $class = 'delete-padding-right delete-padding-left';
	  echo $class;
	}

	function promote_posts_add_class() {
		global $post_num;
		if ( $post_num++ % 3 )
	    $class = 'delete-padding-right delete-padding-left';
	  	else
	    $class = 'delete-padding';
		echo $class;
	}

	//modify the length of the exerpt():
	function wpdocs_custom_excerpt_length( $length ) {
	    return 40;
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

	//modify [...] of exerpt():
	function wpdocs_excerpt_more( $more ) {
		$file = array('... <span>Цікаво? Натисни і прочитай повністю!</span>', 
				      '... <span>Мені здається, тобі хочеться дізнатися деталі.</span>',
					  '... <span>Нуймо, вгамуємо твою цікавість!</span>',
					  '... <span>Ну ж бо! Натискай, щоб прочитати!</span>',
					  '... <span>Королівський писар старався, прочитай!</span>',
					  '... <span>Ця праця достойна премії Антонідоса.</span>',
					  '... <span>- Інструкція створення величезного вітрольоту.</span>');
		shuffle($file);
		for($i = 0; $i < count($file); $i++){
		 	$newFile[] = $file[$i];
		}
		return $newFile[4];
	}
	add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

	//undo unsubscribe link
	function mpoet_get_undo_unsubscribe(){
		if(class_exists('WYSIJA') && !empty($_REQUEST['wysija-key'])){
			$undo_paramsurl = array(
			 'wysija-page'=>1,
			 'controller'=>'confirm',
			 'action'=>'undounsubscribe',
			 'wysija-key'=>$_REQUEST['wysija-key']
		 	);

			$model_config = WYSIJA::get('config','model');
	        	$link_undo_unsubscribe = WYSIJA::get_permalink($model_config->getValue('confirmation_page'),$undo_paramsurl);
			$undo_unsubscribe = str_replace(array('[link]','[/link]'), array('<a href="'.$link_undo_unsubscribe.'">','</a>'),'<strong>'.__('You made a mistake? [link]Undo unsubscribe[/link].',WYSIJA)).'</strong>';
			return $undo_unsubscribe;
		 }
		return '';
	}

	add_shortcode('mailpoet_undo_unsubscribe', 'mpoet_get_undo_unsubscribe');

?>