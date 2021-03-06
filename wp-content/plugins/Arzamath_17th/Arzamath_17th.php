<?php
/**
 * Plugin Name: Arzamath_17th
 * Plugin URI: http://homework.local
 * Description: plugin for homework4
 * Version: 1.0
 * Author: Slavik
 * Author URI: http://homework.local/wp-admin/profile.php
 * License: GPL2
 */

/*  Copyright 2014 Slavik Chernysh (email : slavikck89@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if(!class_exists('Arzamath_17th'))
{
	class Arzamath_17th
	{
		// construct the plugin object
		public function __construct()
		{
			// initialize settings
			require_once(sprintf("%s/settings.php", dirname(__FILE__)));
			$Arzamath_17th_Settings = new Arzamath_17th_Settings();

			// register custom post types
			require_once(sprintf("%s/post-types/post_type_template.php", dirname(__FILE__)));
			$Post_Type_Template = new Post_Type_Template();

            require_once(sprintf("%s/Arzamath_17th_widget.php", dirname(__FILE__)));
            $Arzamath_17th_Widget = new Arzamath_17th_Widget();

			$plugin = plugin_basename(__FILE__);
			add_filter("plugin_action_links_$plugin", array( $this, 'plugin_settings_link' ));

        }
        // activation
		public static function activate()
		{

		}
        // deactivation
		public static function deactivate()
		{

		}

		// add the settings link to the plugins page
		function plugin_settings_link($links)
		{
			$settings_link = '<a href="options-general.php?page=arzamath_17th">Settings</a>';
			array_unshift($links, $settings_link);
			return $links;
		}


	}
}

if(class_exists('Arzamath_17th'))
{
	// installation and uninstallation hooks
	register_activation_hook(__FILE__, array('Arzamath_17th', 'activate'));
	register_deactivation_hook(__FILE__, array('Arzamath_17th', 'deactivate'));

	// instantiate the plugin class
	$arzamath_17th = new Arzamath_17th();
}

add_action( 'admin_footer', 'wp_action_javascript' );

function wp_action_javascript() {

    ?>

    <script type="text/javascript">

        jQuery (function buttonClicked ($) {

            $(" #button ").click( function () {
                $a = $( " #meta_a " ).val();
                $b = $( " #meta_b " ).val();
                $c = $( " #meta_c " ).val();
                $d = <?php the_ID(); ?>;

                var data = {
                    'action' : 'my_action',
                    'text'   : $a,
                    'select' : $b,
                    'file'   : $c,
                    'post'   : $d
                };

                $.post( ajaxurl, data, function ( response ) {
                    alert( response );
                });

            });

        });

    </script>

    <?php
}

add_action( 'wp_ajax_my_action', 'wp_action_callback') ;

    function wp_action_callback()
    {
        global $wpdb;

        $post_id = $_POST['post'];

        update_post_meta( $post_id, 'meta_a', $_POST['text']);
        update_post_meta( $post_id, 'meta_b', $_POST['select']);
        update_post_meta( $post_id, 'meta_c', $_POST['file']);

        echo (' Your results saved :)');

        die();
    } 