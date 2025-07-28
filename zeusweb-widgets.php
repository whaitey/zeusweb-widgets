<?php
/**
 * Plugin Name: ZeusWeb Widgets
 * Description: Custom Elementor widgets for ZeusWeb.
 * Version: 1.0.0
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
require_once __DIR__ . '/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5p6\Plugin\UpdateChecker;

$myUpdateChecker = UpdateChecker::buildUpdateChecker(
    'https://github.com/whaitey/zeusweb-widgets',
    __FILE__,
    'zeusweb-widgets'
);

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
    $widgets_manager->register( new \GYIK_Widget() );
}
add_action( 'elementor/widgets/register', 'zeusweb_register_gyik_widget' );

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
