<?php

require_once get_template_directory() . '/required/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'robokey_register_required_plugins' );


function robokey_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Classic Widgets', // The plugin name.
			'slug'               => 'classic-widgets', // The plugin slug (typically the folder name).
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '0.3', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => 'https://wordpress.org/plugins/classic-widgets/', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

        array(
			'name'               => 'Contact Form 7', // The plugin name.
			'slug'               => 'contact-form-7', // The plugin slug (typically the folder name).	
			'required'           => false, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '5.5.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => 'https://wordpress.org/plugins/contact-form-7/', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),


		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		// array(
		// 	'name'      => 'Classic Widgets',
		// 	'slug'      => 'classic-widgets',
		// 	'required'  => false,
		// ),

		// This is an example of the use of 'is_callable' functionality. A user could - for instance -
		// have WPSEO installed *or* WPSEO Premium. The slug would in that last case be different, i.e.
		// 'wordpress-seo-premium'.
		// By setting 'is_callable' to either a function from that plugin or a class method
		// `array( 'class', 'method' )` similar to how you hook in to actions and filters, TGMPA can still
		// recognize the plugin as being installed.
		// array(
		// 	'name'        => 'WordPress SEO by Yoast',
		// 	'slug'        => 'wordpress-seo',
		// 	'is_callable' => 'wpseo_init',
		// ),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'robokey',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

		/*
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'robokey' ),
			'menu_title'                      => __( 'Install Plugins', 'robokey' ),
			/* translators: %s: plugin name. * /
			'installing'                      => __( 'Installing Plugin: %s', 'robokey' ),
			/* translators: %s: plugin name. * /
			'updating'                        => __( 'Updating Plugin: %s', 'robokey' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'robokey' ),
			'notice_can_install_required'     => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'robokey'
			),
			'notice_can_install_recommended'  => _n_noop(
				/* translators: 1: plugin name(s). * /
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'robokey'
			),
			'notice_ask_to_update'            => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'robokey'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				/* translators: 1: plugin name(s). * /
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'robokey'
			),
			'notice_can_activate_required'    => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'robokey'
			),
			'notice_can_activate_recommended' => _n_noop(
				/* translators: 1: plugin name(s). * /
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'robokey'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'robokey'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'robokey'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'robokey'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'robokey' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'robokey' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'robokey' ),
			/* translators: 1: plugin name. * /
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'robokey' ),
			/* translators: 1: plugin name. * /
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'robokey' ),
			/* translators: 1: dashboard link. * /
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'robokey' ),
			'dismiss'                         => __( 'Dismiss this notice', 'robokey' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'robokey' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'robokey' ),

			'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
		),
		*/
	);

	tgmpa( $plugins, $config );
}













    function robokey_theme_support(){
    //Adds dynamic title tag
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );
    }
    add_action('after_setup_theme','robokey_theme_support');

    function robokey_menus(){

        $locations = array(
            'primary' => "Desktop Primary Left Sidebar",
            'footer-right' => "Desktop Right Footer Menu"
        );

        register_nav_menus( $locations );
    }

    add_action('init','robokey_menus');


    function robokey_register_styles(){
        $version=wp_get_theme()->get('Version');
        wp_enqueue_style('robokey-general', get_template_directory_uri() . "/style.css", array(), $version, 'all');
    }

    add_action('wp_enqueue_scripts', 'robokey_register_styles');

    function robokey_register_scripts(){
        $version=wp_get_theme()->get('Version');
        wp_enqueue_script( "robokey-script-choose", get_template_directory_uri(). "/assets/js/choose.js", array(), $version, true );
        wp_enqueue_script( "robokey-script", get_template_directory_uri() . "/assets/js/script.js", array(), $version, true );
    }
    add_action('wp_enqueue_scripts', 'robokey_register_scripts');

    function robokey_widget_areas(){
        register_sidebar( 
        array(
            'before_title' => '<h3 class="title">',
            'after_title' => '</h3>',
            'before_widget' => '<div class="sidebar-widget">',
            'after_widget' => '</div>',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area',

        )
    
    );

    }

    add_action('widgets_init','robokey_widget_areas');


	




	add_action( 'add_meta_boxes',  function() { 

		add_meta_box('html_myid_63_section','about-us', 'my_output_function',null,'advanced','default', 'about-us');
		
		add_meta_box('html_myid_62_section','team-plan', 'my_output_function',null,'advanced','default', 'team-plan');
		add_meta_box('html_myid_61_section','objective', 'my_output_function',null,'advanced','default', 'objectives');
	});
	
	function my_output_function( $post, $post_name ) {
		var_dump($post_name["args"]);
		$text= get_post_meta($post->ID, $post_name["args"] , true );
		wp_editor( $text, $post_name["args"]);
	}
	
	add_action( 'save_post', function($post_id) {
		
		if (!(empty($_POST['team-plan']) && empty($_POST['about-us']))) {
			$data_about=$_POST['about-us'];
			$data_team =$_POST['team-plan'];
			$data_objective = $_POST['objectives'];
			update_post_meta($post_id, 'about-us', $data_about );
			update_post_meta($post_id, 'team-plan', $data_team );
			update_post_meta( $post_id,'objectives', $data_objective);
		}
	}
); 





?>