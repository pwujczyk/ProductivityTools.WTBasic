<?php
    function simple_theme_setup(){
        //Featured	Image	Support
        add_theme_support('post-thumbnails');

        //Menus
        register_nav_menus(array('primary'=>__('Primary	Menu')));
    }

    add_action('after_setup_theme',	'simple_theme_setup');
    
 

//	Excerpt	Length
    function set_excerpt_length(){
       return 25;
    }
    add_filter('excerpt_length','set_excerpt_length');

//Widget	Locations
    function init_widgets($id){
        register_sidebar(array(
            'name'	=>	'Sidebar',
            'id'	=>	'sidebar',
            'before_widget'	=>	'<div	class="side-widget">',
            'after_widget'	=>	'</div>',
            'before_title'	=>	'<h3>',
            'after_title'	=>	'</h3>'
            ));
        }
    add_action('widgets_init',	'init_widgets');
	
	
	function getAddress(){
		global $post;
		$postContent=$post->post_content;
		
		$ogImagePosition=strpos($postContent,'og-image');
		
		$startImagePosition=strpos($postContent,'img src="',$ogImagePosition)+9;
		$endImagePosition=strpos($postContent,'"',$startImagePosition);
		$addressLenght=$endImagePosition-$startImagePosition;
		$imageAddress=substr($postContent,$startImagePosition,$addressLenght);
		//echo $imageAddress;
		return $imageAddress;
	}
	
	function insert_og_image($content){
		
		$output = '<meta property="og:image" content="'. getAddress() .'" />';
		echo $output;
		echo $content;
	}
	
	add_action('wp_head','insert_og_image');