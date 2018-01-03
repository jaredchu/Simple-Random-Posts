<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://jaredchu.com/
 * @since             1.0.0
 * @package           Simple_Random_Posts
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Random Posts
 * Plugin URI:        https://jaredchu.com/wordpress/
 * Description:       Another WordPress plugin that select random url to redirect from posts, tags, categories.
 * Version:           1.0.2
 * Author:            Jared Chu
 * Author URI:        https://jaredchu.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-random-posts
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently pligin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-simple-random-posts-activator.php
 */
function activate_simple_random_posts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-random-posts-activator.php';
	Simple_Random_Posts_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-simple-random-posts-deactivator.php
 */
function deactivate_simple_random_posts() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-simple-random-posts-deactivator.php';
	Simple_Random_Posts_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_simple_random_posts' );
register_deactivation_hook( __FILE__, 'deactivate_simple_random_posts' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-simple-random-posts.php';
require_once plugin_dir_path( __FILE__ ) . 'includes/class-generate-random-uri.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_simple_random_posts() {
	$plugin = new Simple_Random_Posts();
	$plugin->run();

}
run_simple_random_posts();
