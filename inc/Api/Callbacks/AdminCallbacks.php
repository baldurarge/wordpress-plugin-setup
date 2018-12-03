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


    public function cssuxCss(){

        $options = get_option('cssux_css');
        // add_filter($options, 'wpautop');
        ?>
        <textarea name="cssux_css" id="cssux_css" cols="30" rows="10">
            <?php echo $options; ?>
        </textarea>
        <?php
    }
}