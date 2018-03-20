<?php
/*
 * @wordpress-plugin
 * Plugin Name:       WP AbuseShield
 * Plugin URI:        https://github.com/mikasjp/wp-abuseshield
 * Description:       A simple and lightweight plugin that protects your WordPress against abuse.
 * Version:           1.0.0
 * Author:            Mikołaj Kamiński
 * Author URI:        https://becomeapro.pl/
 * License:           MIT
 */

if ( ! defined( "WPINC" ) ) {
	die;
}

require_once plugin_dir_path( __FILE__ ) . "include/class-wp-abuseshield.php";

function run_wp_abuseshield()
{
	$WPAbuseShield = new Wp_Abuseshield();
	$WPAbuseShield->Run();
}

add_action("wp", "run_wp_abuseshield");