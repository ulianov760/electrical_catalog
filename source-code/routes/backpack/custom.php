<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group(
    [
        'prefix' => config('backpack.base.route_prefix', 'admin'),
        'middleware' => array_merge(
            (array)config('backpack.base.web_middleware', 'web'),
            (array)config('backpack.base.middleware_key', 'admin')
        ),
        'namespace' => 'App\Http\Controllers\Admin',
    ],
    function () {
        Route::crud('', 'CategoryCrudController');
        Route::crud('equipments', 'EquipmentCrudController');
        Route::crud('employees', 'EmployeeCrudController');
        Route::crud('roles', 'RoleCrudController');
        Route::crud('posts', 'PostCrudController');
        Route::crud('status-orders', 'StatusOrderCrudController');
        Route::crud('status-payments', 'StatusPaymentCrudController');
        Route::crud('type-payments', 'TypePaymentCrudController');
        Route::crud('clients', 'ClientCrudController');

        Route::redirect('dashboard','/admin');
    }
); // this should be the absolute last line of this file
