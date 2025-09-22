<?php
/**
 * Plugin Name: ZeusWeb Widgets
 * Description: Custom Elementor widgets for ZeusWeb.
 * Version: 1.6.9
 * Author: ZeusWeb
 * Plugin URI: https://github.com/whaitey/zeusweb-widgets
 * GitHub Plugin URI: https://github.com/whaitey/zeusweb-widgets
 * GitHub Branch: master
 * Requires at least: 5.0
 * Tested up to: 6.4
 * Requires PHP: 7.0
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Plugin Update Checker
require_once __DIR__ . '/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5p6\PucFactory;

// Plugin Update Checker
try {
    $myUpdateChecker = PucFactory::buildUpdateChecker(
        'https://github.com/whaitey/zeusweb-widgets',
        __FILE__,
        'zeusweb-widgets'
    );

    if ($myUpdateChecker) {
        // Optional: Authenticate to avoid 403/rate limits if repo is private or heavily accessed.
        if (defined('ZEUSWEB_GITHUB_TOKEN') && ZEUSWEB_GITHUB_TOKEN && method_exists($myUpdateChecker, 'setAuthentication')) {
            $myUpdateChecker->setAuthentication(ZEUSWEB_GITHUB_TOKEN);
        }
        // Ensure we check the correct branch explicitly.
        if (method_exists($myUpdateChecker, 'setBranch')) {
            $myUpdateChecker->setBranch('master');
        }
        // Enable release assets if using GitHub Releases.
        if (method_exists($myUpdateChecker, 'getVcsApi')) {
            $api = $myUpdateChecker->getVcsApi();
            if ($api && method_exists($api, 'enableReleaseAssets')) {
                $api->enableReleaseAssets();
            }
        }
        error_log('ZeusWeb Widgets Update Checker initialized successfully');
    }
} catch (Exception $e) {
    // Log error but don't break the plugin
    error_log('ZeusWeb Widgets Update Checker Error: ' . $e->getMessage());
}

// Register the "ZeusWeb" category for Elementor widgets
add_action('elementor/init', function() {
    \Elementor\Plugin::instance()->elements_manager->add_category(
        'zeusweb',
        [
            'title' => __('ZeusWeb', 'zeusweb'),
            'icon'  => 'fa fa-plug', // Optional: FontAwesome icon
        ],
        1 // Position (lower = higher up)
    );
});

// Register the custom slider widget
function zeusweb_register_slider_widget( $widgets_manager ) {
    require_once( __DIR__ . '/widgets/slider-widget.php' );
    $widgets_manager->register( new \ZeusWeb_Slider_Widget() );
}
add_action( 'elementor/widgets/register', 'zeusweb_register_slider_widget' );

// Register the custom GYIK widget
function zeusweb_register_gyik_widget( $widgets_manager ) {
    require_once( __DIR__ . '/widgets/gyik-widget.php' );
    $widgets_manager->register( new \ZeusWeb_GYIK_Widget() );
    
    // Debug: Log widget registration
    error_log('ZeusWeb GYIK Widget registered successfully');
}
add_action( 'elementor/widgets/register', 'zeusweb_register_gyik_widget' );

// Register the custom Kiállítók widget
function zeusweb_register_kiallitok_widget( $widgets_manager ) {
    require_once( __DIR__ . '/widgets/kiallitok-widget.php' );
    $widgets_manager->register( new \Kiallitok_Widget() );
}
add_action( 'elementor/widgets/register', 'zeusweb_register_kiallitok_widget' );

// Enqueue assets (CSS/JS) for slider
function zeusweb_enqueue_slider_assets() {
    wp_enqueue_style( 'zeusweb-slider-style', plugins_url( 'assets/slider.css', __FILE__ ) );
    wp_enqueue_script( 'zeusweb-slider-script', plugins_url( 'assets/slider.js', __FILE__ ), array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'zeusweb_enqueue_slider_assets' );

// Enqueue assets (CSS/JS) for GYIK widget
function zeusweb_enqueue_gyik_assets() {
    wp_enqueue_style( 'zeusweb-gyik-style', plugins_url( 'assets/gyik-widget.css', __FILE__ ) );
    wp_enqueue_script( 'zeusweb-gyik-script', plugins_url( 'assets/gyik-widget.js', __FILE__ ), array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'zeusweb_enqueue_gyik_assets' );

// Enqueue assets (CSS/JS) for Kiállítók widget
function zeusweb_enqueue_kiallitok_assets() {
    wp_enqueue_style( 'zeusweb-kiallitok-style', plugins_url( 'assets/kiallitok-widget.css', __FILE__ ) );
    wp_enqueue_script( 'zeusweb-kiallitok-script', plugins_url( 'assets/kiallitok-widget.js', __FILE__ ), array('jquery'), false, true );
}
add_action( 'wp_enqueue_scripts', 'zeusweb_enqueue_kiallitok_assets' );
