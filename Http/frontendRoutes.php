<?php

use Illuminate\Routing\Router;

/** @var Router $router */
if (! App::runningInConsole()) {
   
    $router->post('/contact', [
        'uses' => 'ContactController@post',
        'as' => 'contact.send',
    ]);

    $router->post('custom-message', [
        'uses' => 'ContactController@custom',
        'as' => 'contact.custom'
    ]);
}
