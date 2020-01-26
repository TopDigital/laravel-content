<?php

Route::group([
    'namespace' => 'TopDigital\Content\Http\Controllers',
    'middleware' => ['api', 'cors', 'auth:api'],
    'prefix' => 'api'
], function () {

    Route::resource('contents', 'PostsController')->only(['index', 'store', 'update', 'destroy']);
});
