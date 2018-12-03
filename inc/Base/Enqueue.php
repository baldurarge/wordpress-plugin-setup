<?php 
/**
 * @package  CSSUX
 */
namespace Inc\Base;

use \Inc\Base\BaseController;
/**
* 
*/
class Enqueue extends BaseController
{
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

	}
	
	function enqueue() {
		// enqueue all our scripts
		wp_enqueue_script( 'codemirrorScrypt', $this->plugin_url . 'assets/codemirror/codemirror.js', array( 'jquery' ), '1.0.0', true  );
		wp_enqueue_script( 'codemirrorStyle', $this->plugin_url . 'assets/codemirror/css.js', array( 'jquery' ), '1.0.0', true  );

		wp_enqueue_style( 'codemirrorCSS', $this->plugin_url . 'assets/codemirror/codemirror.min.css' );
		wp_enqueue_style( 'codemirrorTheme', $this->plugin_url . 'assets/codemirror/themes/pastel-on-dark.css' );


		wp_enqueue_script( 'codemirrorCssLintScript', $this->plugin_url . 'assets/codemirror/csslint.js', array( 'jquery' ), '1.0.0', true  );
		wp_enqueue_script( 'codemirrorLint', $this->plugin_url . 'assets/codemirror/codemirror-lint.js', array( 'jquery' ), '1.0.0', true  );
		wp_enqueue_script( 'codemirrorCssLintStyle', $this->plugin_url . 'assets/codemirror/codemirror-css-lint.js', array( 'jquery' ), '1.0.0', true  );


		wp_enqueue_style( 'mypluginstyle', $this->plugin_url . 'assets/mystyle.css' );
		wp_enqueue_script( 'mypluginscript', $this->plugin_url . 'assets/myscript.js', array( 'jquery' ) );
	}
}