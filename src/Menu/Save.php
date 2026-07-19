<?php

declare(strict_types=1);

namespace WP_Restaurant\Menu;

defined('ABSPATH') || exit;

final class Save
{
    public function register(): void
    {
        add_action('save_post', [$this, 'save']);
    }

    public function save(int $post_id): void
    {
        if (! isset($_POST['wp_restaurant_nonce'])) {
            return;
        }

        if (! wp_verify_nonce($_POST['wp_restaurant_nonce'], 'wp_restaurant_menu')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (isset($_POST['price'])) {
            update_post_meta(
                $post_id,
                '_price',
                (float) $_POST['price']
            );
        }
    }
}
