<?php
/**
 * @package  CSSUX
 */
namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController
{

    public function adminDashboard(){
        return require_once("$this->plugin_path/templates/Admin.php");
    }

    public function settingsTemplate(){
        return require_once("$this->plugin_path/templates/Settings.php");
    }

    public function cssuxOptionsGroup($input){
        return $input;
    }

    public function cssuxAdminSection(){
        echo 'Checkiout';
    }

    public function cssuxTextExample(){
        $value = esc_attr( get_option('text_example') );
        echo '<input type="text" class="regular-text-box" name="text_example" value="' . $value . '" placeholder="write something">';
    }
}