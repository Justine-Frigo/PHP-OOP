<?php

Route::get('/', ['HomepageController', 'index']);

Route::prefix('/articles')->group(function () {
    Route::get('', ['ArticleController', 'index']);
    Route::get('/{id}', ['ArticleController', 'show']);
});