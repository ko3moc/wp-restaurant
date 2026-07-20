<?php

declare(strict_types=1);

namespace WP_Restaurant\Menu;

defined('ABSPATH') || exit;

/**
 * Custom admin columns.
 */
final class Columns
{
    /**
     * Register hooks.
     */
    public function register(): void
    {
        add_filter(
            'manage_' . PostType::POST_TYPE . '_posts_columns',
            [$this, 'columns']
        );

        add_action(
            'manage_' . PostType::POST_TYPE . '_posts_custom_column',
            [$this, 'content'],
            10,
            2
        );
    }

    /**
     * Define columns.
     */
    public function columns(array $columns): array
    {
        return [
            'cb'         => $columns['cb'],
            'thumbnail'  => __('Image', 'wp-restaurant'),
            'title'      => __('Dish', 'wp-restaurant'),
            'category'   => __('Category', 'wp-restaurant'),
            'price'      => __('Price', 'wp-restaurant'),
            'available'  => __('Available', 'wp-restaurant'),
            'date'       => __('Date', 'wp-restaurant'),
        ];
    }

    /**
     * Render column values.
     */
    public function content(string $column, int $post_id): void
    {
        switch ($column) {

            case 'thumbnail':
                echo get_the_post_thumbnail(
                    $post_id,
                    [60, 60]
                );
                break;

            case 'category':
                echo get_the_term_list(
                    $post_id,
                    Taxonomy::TAXONOMY,
                    '',
                    ', '
                ) ?: '—';
                break;

            case 'price':
                echo esc_html(
                    get_post_meta($post_id, '_price', true)
                );
                break;

            case 'available':

                $available = get_post_meta(
                    $post_id,
                    '_available',
                    true
                );

                echo $available
                    ? '✅'
                    : '❌';

                break;
        }
    }
}
