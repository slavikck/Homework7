<?php
if(!class_exists('Arzamath_17th_Settings'))
{
	class Arzamath_17th_Settings
	{
		// construct the plugin object
		public function __construct()
		{
			// register actions
            add_action('admin_init', array(&$this, 'admin_init'));
        	add_action('admin_menu', array(&$this, 'add_menu'));
		}

        //hook into WP's admin_init action hook
        public function admin_init()
        {
        	// register plugin's settings
        	register_setting('arzamath_17th-group', 'setting_1');
        	register_setting('arzamath_17th-group', 'setting_2');

        	// add settings section
        	add_settings_section(
        	    'arzamath_17th-section',
        	    'Arzamath_17th additional settings',
        	    array(&$this, 'settings_section_arzamath_17th'),
        	    'arzamath_17th'
        	);
        	
        	// add setting's fields
            add_settings_field(
                'arzamath_17th-setting_1',
                'Setting 1',
                array(&$this, 'settings_field_input_text'), 
                'arzamath_17th',
                'arzamath_17th-section',
                array(
                    'field1' => 'setting_1'
                )
            );
            add_settings_field(
                'arzamath_17th-setting_2',
                'Setting 2',
                array(&$this, 'settings_field_input_text2'),
                'arzamath_17th',
                'arzamath_17th-section',
                array(
                    'field2' => 'setting_2',
                )
            );

        }
        
        public function settings_section_arzamath_17th()
        {
            echo '';
        }
        
        // this function provides text inputs for settings fields

        public function settings_field_input_text($args)
        {
            $field = $args['field1'];
            $value = get_option($field);

            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
        }

        public function settings_field_input_text2($args)
        {
            $field = $args['field2'];
            $value = get_option($field);

            echo sprintf('<input type="text" name="%s" id="%s" value="%s" />', $field, $field, $value);
        }

        // add a menu and page to manage this plugin settings
        public function add_menu()
        {
        	add_options_page(
        	    'Arzamath_17th Settings',
        	    'Arzamath_17th',
        	    'manage_options', 
        	    'arzamath_17th',
        	    array(&$this, 'plugin_settings_page')
        	);
        }

        // menu callback

        public function plugin_settings_page()
        {
        	if(!current_user_can('manage_options'))
        	{
        		wp_die(__("You don't have permission to access on this page :("));
        	}

        	// Render the settings template
        	include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
        }
    }
}
