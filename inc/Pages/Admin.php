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
			'menu_title' =>		'CSSUX',
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

	public function setSettings(){
        $args = array(
            array(
                'option_group' =>   'cssux_options_group',
                'option_name' =>    'text_example',
                'callback' =>       array( $this->callbacks, 'cssuxOptionsGroup')
            )
		);

		$this->settings->setSettings($args);
	}
	
	public function setSections(){
        $args = array(
            array(
                'id' =>   			'cssux_admin_index',
                'title' =>			'Settings',
				'callback' =>		array( $this->callbacks, 'cssuxAdminSection'),
				'page' =>			'cssux_settings'		
            )
		);

		$this->settings->setSections($args);
	}
	
	public function setFields(){
        $args = array(
            array(
                'id' =>   			'text_example',
                'title' =>			'Text Example',
				'callback' =>		array( $this->callbacks, 'cssuxTextExample'),
				'page' =>			'cssux_settings',
				'section' => 		'cssux_admin_index',
				'args' => 			array(
					'label_for' => 'text_example',
					'class' => 'example-class'
				)
            )
		);

		$this->settings->setFields($args);
    }
}