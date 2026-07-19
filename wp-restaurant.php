<?php
/**
 * Plugin Name: WP Restaurant
 * Plugin URI: https://github.com/ko3moc/wp-restaurant
 * Description: A modern, lightweight restaurant management plugin for WordPress.
 * Version: 0.1.0-alpha
 * Requires at least: 6.8
 * Requires PHP: 8.2
 * Author: KO3MOC
 * Author URI: https://ko3moc.com
 * License: GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: wp-restaurant
 * Domain Path: /languages
 *
 * @package WPRestaurant
 */

declare(strict_types=1);

if (! defined('ABSPATH')) {
    exit;
}

define('WP_RESTAURANT_VERSION', '0.1.0-alpha');
define('WP_RESTAURANT_FILE', __FILE__);
define('WP_RESTAURANT_PATH', plugin_dir_path(__FILE__));
define('WP_RESTAURANT_URL', plugin_dir_url(__FILE__));
define('WP_RESTAURANT_BASENAME', plugin_basename(__FILE__));

/*
|--------------------------------------------------------------------------
| Composer Autoloader
|--------------------------------------------------------------------------
*/

$autoload = WP_RESTAURANT_PATH . 'vendor/autoload.php';

if (file_exists($autoload)) {
    require_once $autoload;
} else {
    add_action(
        'admin_notices',
        static function (): void {
            ?>
            <div class="notice notice-error">
                <p>
                    <strong>WP Restaurant</strong><br>
                    Composer dependencies are missing.
                    Please run <code>composer install</code>.
                </p>
            </div>
            <?php
        }
    );

    return;
}

/*
|--------------------------------------------------------------------------
| Activation / Deactivation
|--------------------------------------------------------------------------
*/

register_activation_hook(
    __FILE__,
    [\WPRestaurant\Activator::class, 'activate']
);

register_deactivation_hook(
    __FILE__,
    [\WPRestaurant\Deactivator::class, 'deactivate']
);

/*
|--------------------------------------------------------------------------
| Boot Plugin
|--------------------------------------------------------------------------
*/

add_action(
    'plugins_loaded',
    static function (): void {

        load_plugin_textdomain(
            'wp-restaurant',
            false,
            dirname(WP_RESTAURANT_BASENAME) . '/languages'
        );

        $plugin = new \WPRestaurant\Plugin();

        $plugin->run();
    }
);
