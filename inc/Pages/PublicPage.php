<?php 
/**
 * @package  CSSUX
 */
namespace Inc\Pages;

use Inc\Base\BaseController;



/**
* 
*/
class PublicPage extends BaseController
{
    public $url;
    
   public function register(){
        $this->url = home_url();
        add_action( 'wp_enqueue_scripts', array( $this, 'cssux_register_style' ),99 );
        add_action( 'plugins_loaded', array( $this, 'cssux_print_css' ) );
   }

   public function cssux_register_style() {
    $tempUrl = $this->url;
	if ( is_ssl() ) {
		$$this->url = home_url( '/', 'https' );
	}

	wp_register_style( 'cssux_custom_style', add_query_arg( array( 'cssux' => 1), $tempUrl ) );

	wp_enqueue_style( 'cssux_custom_style' );
    }

    public function cssux_print_css() {

	// Only print CSS if this is a stylesheet request.
	if ( ! isset( $_GET['cssux'] ) || intval( $_GET['cssux'] ) !== 1 ) {
		return;
	}

	ob_start();
	header( 'Content-type: text/css' );

	$this->cssux_the_css();

	die();
    }


    function cssux_the_css() {
        $options     = get_option( 'cssux_css' );
        // $raw_content = isset( $options['sccss-content'] ) ? $options['sccss-content'] : '';
        $content     = wp_kses( $options, array( '\'', '\"' ) );
        $content     = str_replace( '&gt;', '>', $content );
        echo $options; // WPCS: xss okay.
    }




}