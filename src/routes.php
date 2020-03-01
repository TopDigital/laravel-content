<?php

Route::group([
    'namespace' => 'TopDigital\Content\Http\Controllers',
    'middleware' => ['api', 'cors', 'auth:api'],
    'prefix' => 'api/content'
], function () {

    Route::resource('posts', 'PostsController')->only(['index', 'show', 'store', 'update', 'destroy']);
    Route::post('posts/{post}/preview', 'PostsController@storePreview');

    Route::resource('sections', 'SectionsController')->only(['index', 'store', 'update', 'destroy']);
});

