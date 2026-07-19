<?php

declare(strict_types=1);

namespace WP_Restaurant\Menu;

defined('ABSPATH') || exit;

/**
 * Menu Module
 *
 * Boots every component related to menu management.
 *
 * @package WP_Restaurant
 */
final class Menu
{
    /**
     * Register module hooks.
     */
    public function register(): void
    {
        (new PostType())->register();
        (new Taxonomy())->register();
        (new MetaBoxes())->register();
        (new Save())->register();
        (new Columns())->register();
        (new Assets())->register();
    }
}
