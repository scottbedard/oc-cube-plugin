<?php

Route::group(['middleware' => 'VerifyCsrfToken'], function() {
    Route::resource('api/bedard/cube/solves', 'Bedard\Cube\Api\Solves');
});
