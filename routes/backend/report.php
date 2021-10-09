<?php

use App\Http\Controllers\Backend\Report\ReportEmployeeController;
use Tabuna\Breadcrumbs\Trail;

Route::group([
    'prefix' => 'report',
    'as' => 'report.',
], function () {
    Route::group([
        'prefix' => 'employee',
        'as' => 'employee.',
    ], function () {
        Route::get('index', [ReportEmployeeController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Employee Report'), route('admin.report.employee.index'));
            });
    });
});