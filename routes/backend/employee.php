<?php

use Tabuna\Breadcrumbs\Trail;

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