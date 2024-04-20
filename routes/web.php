<?php

use App\Http\Controllers;
use App\Http\Middleware\CheckIsLogged;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=> '/','middleware' => CheckIsLogged::class], function (){
    Route::get('/', [Controllers\Index::class, 'index']);
    Route::group(['prefix'=>'bidang'], function (){
        Route::get('/', [Controllers\Bidang\Bidang::class, 'index']);
        Route::delete("/",[Controllers\Bidang\Bidang::class,'delete']);

        Route::group(['prefix'=>'create'], function (){
            Route::get('/', [Controllers\Bidang\Bidang::class, 'create']);
            Route::post('/', [Controllers\Bidang\Bidang::class, 'create']);
        });

        Route::group(['prefix'=>'edit'], function (){
            Route::get("/",[Controllers\Bidang\Bidang::class, 'edit']);
            Route::post("/",[Controllers\Bidang\Bidang::class, 'edit']);
        });
    });
    Route::group(['prefix'=>'system'], function () {
        Route::group(['prefix'=>'account'], function (){

            Route::get('/', [Controllers\System\Account::class, 'index']);
            Route::delete("/",[Controllers\System\Account::class,'delete']);

            Route::group(['prefix'=>'create'], function (){
                Route::get('/', [Controllers\System\Account::class, 'create']);
                Route::post('/', [Controllers\System\Account::class, 'create']);
            });

            Route::group(['prefix'=>'edit'], function (){
                Route::get("/",[Controllers\System\Account::class, 'edit']);
                Route::post("/",[Controllers\System\Account::class, 'edit']);
            });



        });

        Route::group(['prefix'=>'dusun'], function (){
            Route::get('/', [Controllers\System\Dusun::class, 'index']);
        });
    });
});
Route::group(['prefix'=>'auth'], function (){
    Route::get("/", [ Controllers\auth\login::class,'index']);
    Route::post("/", [ Controllers\auth\login::class,'validate']);
});
Route::get("/logout",[ Controllers\auth\Logout::class,'index']);
