<?php

declare(strict_types=1);

namespace WP_Restaurant\Core\Fields;

defined('ABSPATH') || exit;

/**
 * Immutable field definition.
 */
final class Field
{
    public function __construct(
        public readonly string $key,
        public readonly string $label,
        public readonly string $type,
        public readonly mixed $default = '',
        public readonly array $options = [],
        public readonly array $attributes = []
    ) {
    }
}
