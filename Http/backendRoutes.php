<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/contact'], function (Router $router) {
    $router->bind('contact', function ($id) {
        return app('Modules\Contact\Repositories\ContactRepository')->find($id);
    });
    $router->get('contacts', [
        'as' => 'admin.contact.contact.index',
        'uses' => 'ContactController@index',
        'middleware' => 'can:contact.contacts.index'
    ]);
    $router->get('contacts/create', [
        'as' => 'admin.contact.contact.create',
        'uses' => 'ContactController@create',
        'middleware' => 'can:contact.contacts.create'
    ]);
    $router->post('contacts', [
        'as' => 'admin.contact.contact.store',
        'uses' => 'ContactController@store',
        'middleware' => 'can:contact.contacts.store'
    ]);
    $router->get('contacts/{contact}/edit', [
        'as' => 'admin.contact.contact.edit',
        'uses' => 'ContactController@edit',
        'middleware' => 'can:contact.contacts.edit'
    ]);
    $router->put('contacts/{contact}', [
        'as' => 'admin.contact.contact.update',
        'uses' => 'ContactController@update',
        'middleware' => 'can:contact.contacts.update'
    ]);
    $router->delete('contacts/{contact}', [
        'as' => 'admin.contact.contact.destroy',
        'uses' => 'ContactController@destroy',
        'middleware' => 'can:contact.contacts.destroy'
    ]);
// append

});
