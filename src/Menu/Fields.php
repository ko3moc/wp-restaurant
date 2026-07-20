public static function all(): array
{
    return [

        'price' => [
            'label' => __('Price','wp-restaurant'),
            'type' => 'number',
            'step' => '0.01'
        ],

        'currency' => [
            'type' => 'select',
            'options' => [
                'EUR',
                'USD',
                'GBP'
            ]
        ],

        'prep_time' => [
            'type'=>'number'
        ],

        'calories'=>[
            'type'=>'number'
        ],

        'available'=>[
            'type'=>'checkbox'
        ],

        'featured'=>[
            'type'=>'checkbox'
        ],

    ];
}
