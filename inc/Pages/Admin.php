<?php 
/**
 * @package  CSSUX
 */
namespace Inc\Pages;

use Inc\Base\BaseController;
use Inc\Api\SettingsApi;
use Inc\Api\Callbacks\AdminCallbacks;



/**
* 
*/
class Admin extends BaseController
{
	public $settings;
	public $callbacks;

	public $pages = array();
	public $subPages = array();

	public function register() {	
		$this->settings = new SettingsApi();
		$this->callbacks = new AdminCallbacks();

		$this->setPages();
		$this->setSubPages();

		$this->setSettings();
		$this->setSections();
		$this->setFields();


		$this->settings->addPages( $this->pages )->withSubPage("CSS")->addSubPages($this->subPages)->register();
	}

	public function setPages(){
		$this->pages = [
			[
			'page_title' => 	'CSS UX',
			'menu_title' =>		'CSS',
			'capability' =>		'manage_options',
			'menu_slug' => 		'cssux_plugin', 
			'callback' =>		array( $this->callbacks, 'adminDashboard' ),
			'icon_url' => 		'dashicons-editor-code',
			'position' => 		110
			]
		];
	}
	public function setSubPages(){
		$this->subPages = [
			[
			'parent_slug' => 	'cssux_plugin',
			'page_title' => 	'CSS UX Settings',
			'menu_title' =>		'Settings',
			'capability' =>		'manage_options',
			'menu_slug' => 		'cssux_settings', 
			'callback' =>		array( $this->callbacks, 'settingsTemplate' )
			]
	];
	}
/*
																										HERE THE FIELDS ARE GENERATED
*/
	public function setSettings(){
        $args = array(
			array(
                'option_group' =>   'cssux_css_group',
				'option_name' =>    'cssux_css',
				'callback' =>       array( $this->callbacks, 'cssuxCssGroup')
			)
		);

		$this->settings->setSettings($args);
	}
	
	public function setSections(){
        $args = array(
			array(
                'id' =>   			'cssux_admin_css_index',
                'title' =>			'',
				'page' =>			'cssux_plugin'		
            )
		);

		$this->settings->setSections($args);
	}
	
	public function setFields(){
        $args = array(

				array(
					'id' =>   			'cssux_css',
					'title' =>			'',
					'callback' =>		array( $this->callbacks, 'cssuxCss'),
					'page' =>			'cssux_plugin',
					'section' => 		'cssux_admin_css_index'
				)
		);

		$this->settings->setFields($args);
    }
}