<?php

// use App\Http\Controllers\RTCController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//---------------------------------------------------------------
//------------------------  USER ROUTE  -------------------------
//---------------------------------------------------------------

Route::middleware('ValidateSignin')->group(function(){

    Route::get('/', [UserController::class, 'index']);
    Route::get('/logout', [UserController::class, 'logoutPage']);
    
    //USER INFO
    Route::post('/updateProfile', [UserController::class, 'updateProfile']);
    Route::get('/getProfile/{email}', [UserController::class, 'getUserInfoByEmail']);
    
    //SEARCH
    Route::post('/search', [UserController::class, 'Search']);
    Route::post('/search/history/store', [UserController::class, 'storeSearch']);
    Route::get('/search/history/get', [UserController::class, 'getHistorySearch']);
    Route::post('/search/history/remove', [UserController::class, 'removeHistorySearch']);
    
    
    //CREATE SERVER
    Route::post('/createServer', [UserController::class, 'createServer']);
    
    
    //JOIN SERVER
    Route::post('/joinServer', [UserController::class, 'joinServer']);
    
    
    //LOAD SERVER SIDEBAR
    Route::post('/loadServer', [UserController::class, 'getServer']);
    
    
    //LOAD VIDEO CALL SERVER
    Route::get('/room/{id}', [UserController::class, 'getVideoCall']);
    
    //FOLLOW USER
    Route::get('/getFollow', [UserController::class, 'getFollow']);
    Route::post('/follow', [UserController::class, 'followUser']);
    Route::post('/unfollow', [UserController::class, 'unFollowUser']);
});

//validate
Route::get('/login', [UserController::class, 'loginPage']);
Route::get('/oauth2/{social}', [UserController::class, 'redirectToProvider']);
Route::get('/oauth2/{social}/callback', [UserController::class, 'handleProviderCallback']);
Route::post('/validate', [UserController::class, 'loginValidate']);
Route::post('/registerAccount', [UserController::class, 'register']);
Route::get('/activeAccount/{email}', [UserController::class, 'activeAccount']);
Route::get('/active/{email}/{token}', [UserController::class, 'active']);
Route::post('/ajaxCheckData', [UserController::class, 'checkDataRegister']);



