<?php

declare(strict_types=1);

namespace WP_Restaurant\Admin;

defined('ABSPATH') || exit;

final class Admin
{
    public function register(): void
    {
        add_action('admin_menu', [$this, 'menu']);
    }

    public function menu(): void
    {
        add_menu_page(
            __('WP Restaurant', 'wp-restaurant'),
            __('Restaurant', 'wp-restaurant'),
            'manage_options',
            'wp-restaurant',
            [$this, 'dashboard'],
            'dashicons-food',
            25
        );
    }

    public function dashboard(): void
    {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e('WP Restaurant', 'wp-restaurant'); ?></h1>

            <p>
                <?php esc_html_e('Welcome to WP Restaurant.', 'wp-restaurant'); ?>
            </p>

            <p>
                Version <?php echo esc_html(WP_RESTAURANT_VERSION); ?>
            </p>
        </div>
        <?php
    }
}
