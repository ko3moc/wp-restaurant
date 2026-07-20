<?php

declare(strict_types=1);

namespace WP_Restaurant\Core\Fields;

defined('ABSPATH') || exit;

final class Renderer
{
    public static function render(Field $field, mixed $value = null): void
    {
        $value ??= $field->default;

        echo '<tr>';

        echo '<th>';
        echo esc_html($field->label);
        echo '</th>';

        echo '<td>';

        switch ($field->type) {

            case 'number':

                printf(
                    '<input type="number" name="%s" value="%s" step="0.01" class="regular-text">',
                    esc_attr($field->key),
                    esc_attr((string) $value)
                );

                break;

            case 'checkbox':

                printf(
                    '<input type="checkbox" name="%s" value="1" %s>',
                    esc_attr($field->key),
                    checked(
                        (bool)$value,
                        true,
                        false
                    )
                );

                break;

            case 'text':

            default:

                printf(
                    '<input type="text" name="%s" value="%s" class="regular-text">',
                    esc_attr($field->key),
                    esc_attr((string) $value)
                );

        }

        echo '</td>';

        echo '</tr>';
    }
}
