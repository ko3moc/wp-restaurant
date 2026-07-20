public function render(WP_Post $post): void
{
    wp_nonce_field(
        'wp_restaurant_menu',
        'wp_restaurant_nonce'
    );

    Renderer::table(
        Fields::all(),
        $post->ID
    );
}
