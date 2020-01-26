<?php

Route::group([
    'namespace' => 'TopDigital\Content\Http\Controllers',
    'middleware' => ['api', 'cors', 'auth:api'],
    'prefix' => 'api/content'
], function () {

    Route::resource('posts', 'PostsController')->only(['index', 'store', 'update', 'destroy']);
});
