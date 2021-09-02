<?php

use App\Http\Controllers\Backend\Employee\CivilController;
use App\Http\Controllers\Backend\Employee\EmployeeController;
use App\Http\Controllers\Backend\Employee\MilitaryController;
use App\Models\Employee\Employee;
use Tabuna\Breadcrumbs\Trail;

Route::group([
        'prefix' => 'employee',
        'as' => 'employee.',
    ], function () {
        Route::group([
            'prefix' => 'military',
            'as' => 'military.',
        ], function () {
            Route::get('index', [MilitaryController::class, 'index'])
                ->name('index')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.dashboard')
                        ->push(__('Military Personnel'), route('admin.employee.military.index'));
                });

            Route::get('create', [MilitaryController::class, 'create'])
                ->name('create')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.employee.military.index')
                        ->push(__('Create Military Personnel'), route('admin.employee.military.create'));
                });
            
            Route::post('/', [MilitaryController::class, 'store'])->name('store');

            Route::group(['prefix' => '{employee}'], function () {
                Route::get('edit', [MilitaryController::class, 'edit'])
                    ->name('edit')
                    ->breadcrumbs(function (Trail $trail, Employee $employee) {
                        $trail->parent('admin.employee.military.index', $employee)
                            ->push(__('Edit'), route('admin.employee.military.edit', $employee));
                    });
                    
                Route::patch('/', [MilitaryController::class, 'update'])->name('update');
                Route::delete('/', [MilitaryController::class, 'destroy'])->name('destroy');
            });

            Route::get('ready-push-rank', [MilitaryController::class, 'push'])
                ->name('push')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.employee.military.index')
                        ->push(__('Military Personnel') . ' ' . __('Ready to Push'), route('admin.employee.military.push'));
                });
        });

        Route::group([
            'prefix' => 'civil',
            'as' => 'civil.',
        ], function () {
            Route::get('index', [CivilController::class, 'index'])
                ->name('index')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.dashboard')
                        ->push(__('Civil Personnel'), route('admin.employee.civil.index'));
                });

            Route::get('create', [CivilController::class, 'create'])
                ->name('create')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.employee.civil.index')
                        ->push(__('Create Civil Personnel'), route('admin.employee.civil.create'));
                });
            
            Route::post('/', [CivilController::class, 'store'])->name('store');

            Route::group(['prefix' => '{employee}'], function () {
                Route::get('edit', [CivilController::class, 'edit'])
                    ->name('edit')
                    ->breadcrumbs(function (Trail $trail, Employee $employee) {
                        $trail->parent('admin.employee.civil.index', $employee)
                            ->push(__('Edit'), route('admin.employee.civil.edit', $employee));
                    });
                    
                Route::patch('/', [CivilController::class, 'update'])->name('update');
                Route::delete('/', [CivilController::class, 'destroy'])->name('destroy');
            });

            Route::get('ready-push-rank', [CivilController::class, 'push'])
                ->name('push')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.employee.civil.index')
                        ->push(__('Civil Personnel') . ' ' . __('Ready to Push'), route('admin.employee.civil.push'));
                });
        });
    });