<?php

declare(strict_types=1);

namespace WP_Restaurant\Menu;

use WP_Restaurant\Core\Fields\Field;

final class Fields
{
    /**
     * @return Field[]
     */
    public static function all(): array
    {
        return [

            new Field(
                'price',
                __('Price','wp-restaurant'),
                'number',
                0
            ),

            new Field(
                'currency',
                __('Currency','wp-restaurant'),
                'text',
                'EUR'
            ),

            new Field(
                'prep_time',
                __('Preparation Time','wp-restaurant'),
                'number',
                10
            ),

            new Field(
                'calories',
                __('Calories','wp-restaurant'),
                'number',
                0
            ),

            new Field(
                'available',
                __('Available','wp-restaurant'),
                'checkbox',
                true
            ),

            new Field(
                'featured',
                __('Featured','wp-restaurant'),
                'checkbox',
                false
            ),

        ];
    }
}
