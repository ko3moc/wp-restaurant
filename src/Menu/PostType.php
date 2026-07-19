<?php

declare(strict_types=1);

namespace WP_Restaurant\Menu;

defined('ABSPATH') || exit;

final class PostType
{
    public const POST_TYPE = 'menu_item';

    public function register(): void
    {
        add_action('init', [$this, 'register_post_type']);
    }

    public function register_post_type(): void
    {
        register_post_type(
            self::POST_TYPE,
            [
                'labels' => [
                    'name' => __('Menu', 'wp-restaurant'),
                    'singular_name' => __('Menu Item', 'wp-restaurant'),
                ],

                'public' => true,

                'show_ui' => true,

                'show_in_rest' => true,

                'menu_icon' => 'dashicons-food',

                'supports' => [
                    'title',
                    'thumbnail',
                ],

                'rewrite' => [
                    'slug' => 'menu',
                ],

                'has_archive' => true,
            ]
        );
    }
}
