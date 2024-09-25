<?php


use Illuminate\Support\Facades\Route;

Route::get('/example', function () {
    return 'This is a tenant-specific route.';
});




Route::middleware(['tenant'])->group(function () {
    $domain = env('APP_DOMAIN', 'app.viedial.com'); 

    Route::domain('{tenant}.'.$domain)->group(function () {
        Route::get('test-tenants', function(){
            return "tenants reached here";
        });
    });
});



