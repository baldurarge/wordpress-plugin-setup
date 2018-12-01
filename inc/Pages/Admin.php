<?php 
/**
 * @package  CSSUX
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;


/**
* 
*/
class Admin extends BaseController
{
	public $settings;
	public $pages = array();
	public $subPages = array();

	public function __construct(){
		$this->settings = new SettingsApi();


		$this->pages = [
			[
			'page_title' => 	'CSS UX',
			'menu_title' =>		'CSSUX',
			'capability' =>		'manage_options',
			'menu_slug' => 		'cssux_plugin', 
			'callback' =>		function(){echo '<h1>baldur pluin</h1>';},
			'icon_url' => 		'dashicons-editor-code',
			'position' => 		110
			]
		];

		$this->subPages = [
				[
				'parent_slug' => 	'cssux_plugin',
				'page_title' => 	'CSS UX Settings',
				'menu_title' =>		'Settings',
				'capability' =>		'manage_options',
				'menu_slug' => 		'cssux_settings', 
				'callback' =>		function(){echo '<h1>Custom Title</h1>';}
				]
		];
	}
	public function register() {	
		$this->settings->addPages( $this->pages )->withSubPage('CSS')->addSubPages($this->subPages)->register();
	}
}