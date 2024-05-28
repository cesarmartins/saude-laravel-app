<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('api');

Route::post('/login', function (Request $request) {

    $credentials = $request->only(['email', 'password']);

    if(!$token = auth()->attempt($credentials)) {
        abort(401, 'Nao Autorizado');
    }
    return response()->json([
        'data' => [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ]);
});

Route::get('/logout', function (Request $request) {
    auth()->logout();
    return response()->json(['message' => 'Successfully logged out']);
});

Route::middleware('auth:api')->group(function () {
    Route::apiResource('pacientes', PacienteController::class);
});

Route::get('consulta', [ConsultaController::class, 'index']);

