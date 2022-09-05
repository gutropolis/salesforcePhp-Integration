<?php
function register_my_session(){
    if( ! session_id() ) {
        session_start();
    }
}

add_action('init', 'register_my_session');
/**
 * Twenty Twenty-Two functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_Two
 * @since Twenty Twenty-Two 1.0
 */


if ( ! function_exists( 'twentytwentytwo_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_support() {

		// Add support for block styles.
		add_theme_support( 'wp-block-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

	}

endif;

add_action( 'after_setup_theme', 'twentytwentytwo_support' );

if ( ! function_exists( 'twentytwentytwo_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since Twenty Twenty-Two 1.0
	 *
	 * @return void
	 */
	function twentytwentytwo_styles() {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_register_style(
			'twentytwentytwo-style',
			get_template_directory_uri() . '/style.css',
			array(),
			$version_string
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'twentytwentytwo-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'twentytwentytwo_styles' );

// Add block patterns
require get_template_directory() . '/inc/block-patterns.php';


 $objWPSalesforceRestClient = new WPSalesforceRestClient();
 if(isset($_SESSION['access_token'])  && $_SESSION['access_token'] !=''){
	$objWPSalesforceRestClient->access_token = $_SESSION['access_token'];
 }else{
	$_SESSION['access_token'] = $objWPSalesforceRestClient->access_token;
 }

 
$post_data=  array(
                
	"FirstName" => "vika",
	"LastName" => "Saini",
	"Company" =>"vs Solutions",
	'Email' =>"vs@gmail.com",
   );

   $_SESSION['SF_LEAD_ID'] = $objSFLeadID  =   $objWPSalesforceRestClient->postLeadData($post_data);

   if(isset($_SESSION['SF_LEAD_ID'])  && $_SESSION['SF_LEAD_ID'] !=''){
		$SF_LEAD_ID = $_SESSION['SF_LEAD_ID'];
		$updated_data=  array(
                
			"FirstName" => "vikas ss updated",
			"LastName" => "vikas lsfs",
			"Company" =>"vs Solutions updated",
			'Email' =>"vssafs@gmail.com",
		   );
		$objWPSalesforceRestClient->updateLeadData($updated_data,$SF_LEAD_ID);
	}
print_r($_SESSION);exit;
 //$objnew->postLeadData();
//$instance_url = $objnew->instance_url;
//$access_token = $objnew->restPublicClientToken;
//$name = 'Sandeep Saini';
 