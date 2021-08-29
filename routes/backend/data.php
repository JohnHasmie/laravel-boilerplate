<?php

use App\Http\Controllers\Backend\Data\Corps\CorpsController;
use App\Http\Controllers\Backend\Data\Division\DivisionController;
use App\Http\Controllers\Backend\Data\Position\PositionController;
use App\Http\Controllers\Backend\Data\Rank\RankController;
use App\Models\Data\Corps;
use App\Models\Data\Division;
use App\Models\Data\Position;
use App\Models\Data\Rank;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.data'.
Route::group([
    'prefix' => 'data',
    'as' => 'data.',
    'middleware' => 'role:'.config('boilerplate.access.role.admin'),
], function () {
    Route::group([
        'prefix' => 'corps',
        'as' => 'corps.',
    ], function () {
        Route::get('index', [CorpsController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Corps'), route('admin.data.corps.index'));
            });

        Route::get('create', [CorpsController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.data.corps.index')
                    ->push(__('Create Corps'), route('admin.data.corps.create'));
            });
        
        Route::post('/', [CorpsController::class, 'store'])->name('store');

        Route::group(['prefix' => '{corps}'], function () {
            Route::get('edit', [CorpsController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail, Corps $corps) {
                    $trail->parent('admin.data.corps.index', $corps)
                        ->push(__('Edit'), route('admin.data.corps.edit', $corps));
                });

            Route::patch('/', [CorpsController::class, 'update'])->name('update');
            Route::delete('/', [CorpsController::class, 'destroy'])->name('destroy');
        });
    });

   Route::group([
        'prefix' => 'rank',
        'as' => 'rank.',
    ], function () {
        Route::get('index', [RankController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Rank'), route('admin.data.rank.index'));
            });

        Route::get('create', [RankController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.data.rank.index')
                    ->push(__('Create Rank'), route('admin.data.rank.create'));
            });
        
        Route::post('/', [RankController::class, 'store'])->name('store');

        Route::group(['prefix' => '{rank}'], function () {
            Route::get('edit', [RankController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail, Rank $rank) {
                    $trail->parent('admin.data.rank.index', $rank)
                        ->push(__('Edit'), route('admin.data.rank.edit', $rank));
                });
                
            Route::patch('/', [RankController::class, 'update'])->name('update');
            Route::delete('/', [RankController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group([
        'prefix' => 'position',
        'as' => 'position.',
    ], function () {
        Route::get('index', [PositionController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Position'), route('admin.data.position.index'));
            });

        Route::get('create', [PositionController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.data.position.index')
                    ->push(__('Create Position'), route('admin.data.position.create'));
            });
        
        Route::post('/', [PositionController::class, 'store'])->name('store');

        Route::group(['prefix' => '{position}'], function () {
            Route::get('edit', [PositionController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail, Position $position) {
                    $trail->parent('admin.data.position.index', $position)
                        ->push(__('Edit'), route('admin.data.position.edit', $position));
                });
                
            Route::patch('/', [PositionController::class, 'update'])->name('update');
            Route::delete('/', [PositionController::class, 'destroy'])->name('destroy');
        });
    });

    Route::group([
        'prefix' => 'division',
        'as' => 'division.',
    ], function () {
        Route::get('index', [DivisionController::class, 'index'])
            ->name('index')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Division'), route('admin.data.division.index'));
            });

        Route::get('create', [DivisionController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.data.division.index')
                    ->push(__('Create Division'), route('admin.data.division.create'));
            });
        
        Route::post('/', [DivisionController::class, 'store'])->name('store');

        Route::group(['prefix' => '{division}'], function () {
            Route::get('edit', [DivisionController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail, Division $division) {
                    $trail->parent('admin.data.division.index', $division)
                        ->push(__('Edit'), route('admin.data.division.edit', $division));
                });
                
            Route::patch('/', [DivisionController::class, 'update'])->name('update');
            Route::delete('/', [DivisionController::class, 'destroy'])->name('destroy');
        });
    });
});