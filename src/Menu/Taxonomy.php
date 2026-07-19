<?php

declare(strict_types=1);

namespace WP_Restaurant\Menu;

defined('ABSPATH') || exit;

final class Taxonomy
{
    public const TAXONOMY = 'menu_category';

    public function register(): void
    {
        add_action('init', [$this, 'register_taxonomy']);
    }

    public function register_taxonomy(): void
    {
        register_taxonomy(
            self::TAXONOMY,
            PostType::POST_TYPE,
            [
                'label' => __('Categories', 'wp-restaurant'),

                'public' => true,

                'hierarchical' => true,

                'show_admin_column' => true,

                'show_in_rest' => true,

                'rewrite' => [
                    'slug' => 'menu-category',
                ],
            ]
        );
    }
}
