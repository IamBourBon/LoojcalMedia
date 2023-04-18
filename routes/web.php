<?php

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

Route::get('/', [UserController::class, 'index'])->middleware('ValidateSignin');
//validate
Route::get('/login', [UserController::class, 'loginPage']);
Route::get('/oauth2/{social}', [UserController::class, 'redirectToProvider']);
Route::get('/oauth2/{social}/callback', [UserController::class, 'handleProviderCallback']);
Route::post('/validate', [UserController::class, 'loginValidate']);
Route::post('/registerAccount', [UserController::class, 'register']);
Route::get('/activeAccount/{email}', [UserController::class, 'activeAccount']);
Route::get('/active/{email}/{token}', [UserController::class, 'active']);
Route::post('/ajaxCheckData', [UserController::class, 'checkDataRegister']);

//user function

//SEARCH
Route::post('/search', [UserController::class, 'Search']);
Route::post('/search/history/store', [UserController::class, 'storeSearch']);
Route::get('/search/history/get', [UserController::class, 'getHistorySearch']);
Route::post('/search/history/remove', [UserController::class, 'removeHistorySearch']);


//DESIGN ROUTE
route::get('/design/listItem',function(){
    return view('/design/templateListItem');
});
route::get('/design/sideBar',function(){
    return view('/design/templateSideBar');
});
route::get('/design/chatBox',function(){
    return view('/design/templateChatBox');
});
route::get('/design/listUser',function(){
    return view('/design/templateListUser');
});
route::get('/design/createServer',function(){
    return view('/design/templateCreateServer');
});


