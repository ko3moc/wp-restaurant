<?php

declare(strict_types=1);

namespace WP_Restaurant;

defined('ABSPATH') || exit;

final class Plugin
{
    public function run(): void
    {
        $this->register_hooks();
    }

    private function register_hooks(): void
    {
        if (is_admin()) {
            (new Admin\Admin())->register();
        }

        // Future:
        // (new Menu\Menu())->register();
        // (new Reservation\Reservation())->register();
        // (new REST\Api())->register();
    }
}
