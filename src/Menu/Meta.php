<?php

declare(strict_types=1);

namespace WP_Restaurant\Menu;

defined('ABSPATH') || exit;

final class Meta
{
    public static function get(int $post_id, string $key, mixed $default = ''): mixed
    {
        $value = get_post_meta($post_id, '_wp_restaurant_' . $key, true);

        return $value === '' ? $default : $value;
    }

    public static function set(int $post_id, string $key, mixed $value): void
    {
        update_post_meta(
            $post_id,
            '_wp_restaurant_' . $key,
            $value
        );
    }
}
