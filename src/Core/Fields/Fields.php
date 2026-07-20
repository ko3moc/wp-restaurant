<?php

declare(strict_types=1);

namespace WP_Restaurant\Menu;

use WP_Restaurant\Core\Fields\Field;
use WP_Restaurant\Core\Fields\FieldType;

defined('ABSPATH') || exit;

/**
 * Menu field definitions.
 */
final class Fields
{
    /**
     * Returns all menu fields.
     *
     * @return Field[]
     */
    public static function all(): array
    {
        return [

            new Field(
                key: 'price',
                label: __('Price', 'wp-restaurant'),
                type: FieldType::Number,
                default: 0,
                required: true,
                attributes: [
                    'step' => '0.01',
                    'min'  => '0'
                ],
                description: __('Menu price.', 'wp-restaurant')
            ),

            new Field(
                key: 'currency',
                label: __('Currency', 'wp-restaurant'),
                type: FieldType::Select,
                default: 'EUR',
                options: [
                    'EUR' => '€ Euro',
                    'USD' => '$ US Dollar',
                    'GBP' => '£ British Pound'
                ]
            ),

            new Field(
                key: 'prep_time',
                label: __('Preparation Time', 'wp-restaurant'),
                type: FieldType::Number,
                default: 15,
                attributes: [
                    'min' => 0
                ],
                description: __('Minutes', 'wp-restaurant')
            ),

            new Field(
                key: 'calories',
                label: __('Calories', 'wp-restaurant'),
                type: FieldType::Number,
                default: 0,
                attributes: [
                    'min' => 0
                ]
            ),

            new Field(
                key: 'available',
                label: __('Available', 'wp-restaurant'),
                type: FieldType::Checkbox,
                default: true
            ),

            new Field(
                key: 'featured',
                label: __('Featured', 'wp-restaurant'),
                type: FieldType::Checkbox,
                default: false
            ),

            new Field(
                key: 'description',
                label: __('Description', 'wp-restaurant'),
                type: FieldType::Textarea,
                default: '',
                placeholder: __('Describe the dish...', 'wp-restaurant')
            ),

        ];
    }

    /**
     * Returns a single field by key.
     */
    public static function get(string $key): ?Field
    {
        foreach (self::all() as $field) {

            if ($field->key === $key) {
                return $field;
            }
        }

        return null;
    }
}
