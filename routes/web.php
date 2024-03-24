<?php

use App\Http\Controllers;
use App\Http\Middleware\CheckIsLogged;
use Illuminate\Support\Facades\Route;

Route::group(['prefix'=> '/','middleware' => CheckIsLogged::class], function (){
    Route::get('/', [Controllers\Index::class, 'index']);
    Route::group(['prefix'=>'bidang'], function (){
        Route::group(['prefix'=>'SMGT'], function (){
            Route::get('/', [Controllers\Bidang\SMGT::class, 'index']);
            Route::delete("/",[Controllers\Bidang\SMGT::class,'delete']);

            Route::group(['prefix'=>'create'], function (){
                Route::get('/', [Controllers\Bidang\SMGT::class, 'create']);
                Route::post('/', [Controllers\Bidang\SMGT::class, 'create']);
            });

            Route::group(['prefix'=>'edit'], function (){
                Route::get("/",[Controllers\Bidang\SMGT::class, 'edit']);
                Route::post("/",[Controllers\Bidang\SMGT::class, 'edit']);
            });
        });
        Route::group(['prefix'=>'PPGT'], function (){
            Route::get('/', [Controllers\Bidang\PPGT::class, 'index']);
            Route::delete("/",[Controllers\Bidang\PPGT::class,'delete']);

            Route::group(['prefix'=>'create'], function (){
                Route::get('/', [Controllers\Bidang\PPGT::class, 'create']);
                Route::post('/', [Controllers\Bidang\PPGT::class, 'create']);
            });

            Route::group(['prefix'=>'edit'], function (){
                Route::get("/",[Controllers\Bidang\PPGT::class, 'edit']);
                Route::post("/",[Controllers\Bidang\PPGT::class, 'edit']);
            });
        });
        Route::group(['prefix'=>'PWGT'], function (){
            Route::get('/', [Controllers\Bidang\PWGT::class, 'index']);
            Route::delete("/",[Controllers\Bidang\PWGT::class,'delete']);

            Route::group(['prefix'=>'create'], function (){
                Route::get('/', [Controllers\Bidang\PWGT::class, 'create']);
                Route::post('/', [Controllers\Bidang\PWGT::class, 'create']);
            });

            Route::group(['prefix'=>'edit'], function (){
                Route::get("/",[Controllers\Bidang\PWGT::class, 'edit']);
                Route::post("/",[Controllers\Bidang\PWGT::class, 'edit']);
            });
        });
        Route::group(['prefix'=>'PKBGT'], function (){
            Route::get('/', [Controllers\Bidang\PKBGT::class, 'index']);
            Route::delete("/",[Controllers\Bidang\PKBGT::class,'delete']);

            Route::group(['prefix'=>'create'], function (){
                Route::get('/', [Controllers\Bidang\PKBGT::class, 'create']);
                Route::post('/', [Controllers\Bidang\PKBGT::class, 'create']);
            });

            Route::group(['prefix'=>'edit'], function (){
                Route::get("/",[Controllers\Bidang\PKBGT::class, 'edit']);
                Route::post("/",[Controllers\Bidang\PKBGT::class, 'edit']);
            });
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
