<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NaceKodlariController;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FirmsController;
use App\Http\Controllers\IlController;
use App\Http\Controllers\IsgTakipController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    $user = $request->user(); 
    return response()->json(new UserResource(User::findOrFail($user->id)));
    
    //return $user->getAllPermissions();
 //  return new UserCollection($request->user());
    //return new UserCollection(User::all());
   // return new UserCollection(User::load('permissions')->get());
   // return new UserCollection(User::all());
   

});

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    //return $user->createToken($request->device_name)->plainTextToken;
    $token = $user->createToken($request->device_name)->plainTextToken;

    return response()->json(['token' => $token], 200);
});


Route::group(['middleware' => ['auth:sanctum']], function () {
Route::apiResource('nace_kodlari',NaceKodlariController::class);
Route::resource('users',UserController::class);
Route::get('getAllRoles',[RoleController::class, 'getAllRoles']);
Route::resource('roles',RoleController::class);
Route::apiResource('firmalar',FirmsController::class);
Route::get('firma_form_data',[FirmsController::class, 'formsData']);
Route::get('ana_firmalar',[FirmsController::class, 'getAnaFirmalar']);
Route::get('getFirmsAllData',[FirmsController::class, 'getFirmsAllData']);
Route::apiResource('lokasyonlar',FirmsController::class);
Route::get('il',[IlController::class, 'index']);
});

Route::get('getSureler', [IsgTakipController::class, 'getSureler']);
