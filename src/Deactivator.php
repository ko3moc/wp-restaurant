<?php

declare(strict_types=1);

namespace WP_Restaurant;

defined('ABSPATH') || exit;

final class Deactivator
{
    public static function deactivate(): void
    {
        flush_rewrite_rules();
    }
}
