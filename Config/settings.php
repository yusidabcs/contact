<?php

return [

	'site-key' => [
        'description' => 'reCapcha Site key',
        'view' => 'text',
    ],

    'site-secret' => [
        'description' => 'reCapcha Site Secret',
        'view' => 'text',
    ],

    'security' => [

    	'description' => 'Use security form',
    	'view' => 'checkbox'
    ],

    'email' => [

    	'description' => 'Your Contact Email',
    	'view' => 'text'

    ],

    'name' => [

    	'description' => 'Your contact name',
    	'view' => 'text'

    ],
    'subject' => [

    	'description' => 'Contact subject',

    	'view' => 'text'

    ],
];