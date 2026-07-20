<?php

declare(strict_types=1);

namespace WP_Restaurant\Menu;

use WP_Restaurant\Core\Fields\Field;
use WP_Restaurant\Core\Fields\Sanitizer;

defined('ABSPATH') || exit;

/**
 * Saves menu item metadata.
 */
final class Save
{
    /**
     * Register hooks.
     */
    public function register(): void
    {
        add_action(
            'save_post_' . PostType::POST_TYPE,
            [$this, 'save'],
            10,
            2
        );
    }

    /**
     * Save menu fields.
     */
    public function save(int $post_id, \WP_Post $post): void
    {
        if (! isset($_POST['wp_restaurant_nonce'])) {
            return;
        }

        if (
            ! wp_verify_nonce(
                sanitize_text_field(wp_unslash($_POST['wp_restaurant_nonce'])),
                'wp_restaurant_menu'
            )
        ) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (wp_is_post_revision($post_id)) {
            return;
        }

        if ($post->post_type !== PostType::POST_TYPE) {
            return;
        }

        if (! current_user_can('edit_post', $post_id)) {
            return;
        }

        foreach (Fields::all() as $field) {

            $value = $_POST[$field->key] ?? null;

            /*
             * HTML checkboxes are not sent when unchecked.
             */
            if ($field->type === 'checkbox') {
                $value = isset($_POST[$field->key]);
            }

            $value = Sanitizer::sanitize($field, $value);

            Meta::set(
                $post_id,
                $field->key,
                $value
            );
        }
    }
}
