<?php

declare(strict_types=1);

namespace WP_Restaurant\Menu;

defined('ABSPATH') || exit;

/**
 * Loads menu admin assets.
 */
final class Assets
{
    /**
     * Register hooks.
     */
    public function register(): void
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue']);
    }

    /**
     * Enqueue CSS and JS.
     */
    public function enqueue(string $hook): void
    {
        global $post_type;

        if ($post_type !== PostType::POST_TYPE) {
            return;
        }

        wp_enqueue_style(
            'wp-restaurant-menu-admin',
            WP_RESTAURANT_URL . 'assets/css/menu-admin.css',
            [],
            WP_RESTAURANT_VERSION
        );

        wp_enqueue_script(
            'wp-restaurant-menu-admin',
            WP_RESTAURANT_URL . 'assets/js/menu-admin.js',
            [],
            WP_RESTAURANT_VERSION,
            true
        );
    }
}
