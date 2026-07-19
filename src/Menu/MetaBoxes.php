<?php

declare(strict_types=1);

namespace WP_Restaurant\Menu;

defined('ABSPATH') || exit;

final class MetaBoxes
{
    public function register(): void
    {
        add_action('add_meta_boxes', [$this, 'add']);
    }

    public function add(): void
    {
        add_meta_box(
            'wp_restaurant_details',
            __('Menu Details', 'wp-restaurant'),
            [$this, 'render'],
            PostType::POST_TYPE,
            'normal',
            'high'
        );
    }

    public function render(\WP_Post $post): void
    {
        wp_nonce_field('wp_restaurant_menu', 'wp_restaurant_nonce');

        $price = get_post_meta($post->ID, '_price', true);

        ?>

        <table class="form-table">

            <tr>

                <th>

                    <?php esc_html_e('Price', 'wp-restaurant'); ?>

                </th>

                <td>

                    <input
                        type="number"
                        name="price"
                        value="<?php echo esc_attr($price); ?>"
                        step="0.01"
                        min="0"
                    >

                </td>

            </tr>

        </table>

        <?php
    }
}
