<?php

Route::group(['middleware' => '\Illuminate\Foundation\Http\Middleware\VerifyCsrfToken'], function() {
    Route::resource('api/bedard/cube/solves', 'Bedard\Cube\Api\Solves');
});
