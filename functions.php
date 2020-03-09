<?php
add_theme_support( 'post-thumbnails' ); //tillåter temat att lägga till bilder i posts.

function load_stylesheets(){

    // wp_register_style('font_awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), false, 'all');
    // wp_enqueue_style('font_awesome');

    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('style', get_template_directory_uri() . '/css/style.css', array(), false, 'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts', 'load_stylesheets'); // Funktion för att ladda in styles utan att behöva lägga till dom i heder utan registrerar dom i wordpress och är aktiva för alla sidor. 


function include_jquery(){

// wp_deregister_script('jquery');

wp_enqueue_script('jquery');

add_action('wp_enqueue_scripts', 'jquery');
}
add_action('wp_enqueue_scripts', 'include_jquery'); //funktion för att ladda in jquery samt avregistrea om någon annan version redan finns inlaggd sista siffran i wp_enqueue bestämmer om skriptet skall laddas i foooter eller inte 1 = footer


function loadJs(){

wp_register_script('customjs', get_template_directory_uri() . '/js/bootstrap.js', array(), 1, 1, 1);
wp_enqueue_script('customjs');

wp_register_script('script', get_template_directory_uri() . '/js/script.js', array(), 1, 1, 1);
wp_enqueue_script('script');

}
add_action('wp_enqueue_scripts', 'loadJs'); //Funktion för att ladda in Javascript på samtliga sidor sista siffran i wp_register bestämmer om skriptet skall laddas i foooter eller inte 1 = footer

add_theme_support('menus'); //tillåter temat att skapa menyer

register_nav_menus(  

    array(
        'top-menu' => __('Top Menu', 'theme'),
        'side_menu' => __('Side Menu', 'theme'),
    )
);   //denna funktion tillåter oss att possitionera ut menyn som vi skapar i wordpress
//funktion för att registrera ACF i wordpress
function register_acf_options_pages() {

    // kontrollerar om funktionen finns
    if( !function_exists('acf_add_options_page') )
        return;

    // registrerar inställnings sidan för ACF samt döper menyn inne i admin panelen
    $option_page = acf_add_options_page(array(
        'page_title'    => __('Tema Generella Inställningar'),
        'menu_title'    => __('Tema Inställningar'),
    ));
}

// kör funktionen som registrerar ACF
add_action('acf/init', 'register_acf_options_pages');

/**
 * Registrerar sidebar så vi kan använda den var vi vill i vårt tema. 
 *
 */
function blogg_sidebar() {

	register_sidebar( array(
		'name'          => 'Blogg Sidebar',
		'id'            => 'blogg_sidebar',
		'before_widget' => '<ul><li>',
		'after_widget'  => '</li></ul>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'blogg_sidebar' ); //kör funktionen som registrerar sidebar till vårt tema


 // custom post type med CPT ui plugin
 function add_my_post_types_to_query( $query ) {
     echo '<pre>';
     print_r($query); die(); 
    if ( is_front_page() && $query->is_main_query() ){
        $query->set( 'post_type', array( 'post', 'card', 'page' ) );
    }
    return $query;
}
//  add_action( 'pre_get_posts', 'add_my_post_types_to_query' );



// Funktion för att skapa pagnation på våra sidor där vi anropar den 
function pagination(){
    echo '<ul>';
    if ( get_previous_posts_link() ) {
    echo '<li>'; previous_posts_link("Nyare inlägg"); echo '</li>';
    }
    if ( get_next_posts_link() ) {
    echo '<li>'; next_posts_link("Äldre inlägg"); echo '</li>';
    }
    echo '</ul>';
   }

// Funktion för att skapa bredcrombs i headern för att indikera vart på siten man är.
//    function breadcrumbs(){
//     global $post;
//     $separator = " / "; 
//     $home = "Hem";
//     echo '<ul class="breadcrumbs">';
//     echo '<li>Du är här:</li>';
//     if ( is_home() ) {
//         echo '<li>' . $home . '</li>';
//        }
//        else {
//         echo '<li><a href="' . get_site_url() . '">' . $home . '</a></li>';
//        }
//     if ( is_home() || is_single() ) {
//         echo '<li>' . $separator . '</li>';
//         if ( is_home() ) {
//         echo '<li>Blogg</li>';
//         }
//         else {
//         echo '<li><a href="">Blogg</a></li>';
//         echo '<li>' . $separator . '</li>';
//         echo '<li>' . $post->post_title . '</li>';
//         }
//        }
//     if ( is_page() && !is_front_page() ) {
//         echo '<li>' . $separator . '</li>';
//         if ( !empty( $post->post_parent ) ) {
//         echo '<li>';
//         echo '<a href="'.get_permalink($post->post_parent).'">';
//         echo get_the_title( $post->post_parent );
//         echo '</a>';
//         echo '</li>';
//         echo '<li>' . $separator . '</li>';
//         }
//         echo '<li>' . $post->post_title . '</li>';
//        }
//     if ( is_author() ) {
//         echo '<li>' . $separator . '</li>';
//         echo '<li>Författare</li>';
//         echo '<li>' . $separator . '</li>';
//         echo '<li>' . get_the_author("display_name") . '</li>';
//        }
//     if ( is_category() ) {
//         echo '<li>' . $separator . '</li>';
//         echo '<li>Kategori</li>';
//         echo '<li>' . $separator . '</li>';
//         echo '<li>';
//         single_cat_title();
//         echo '</li>';
//        }
//     if ( is_archive() && !is_author() && !is_category() ) {
//         echo '<li>' . $separator . '</li>';
//         echo '<li>Arkiv</li>';
//         echo '<li>' . $separator . '</li>';
//         single_month_title( " " );
//        }
//     if ( is_search() ) {
//         echo '<li>' . $separator . '</li>';
//         echo '<li>Sökresultat</li>';
//        }
//     echo '</ul>';
//    }




?>