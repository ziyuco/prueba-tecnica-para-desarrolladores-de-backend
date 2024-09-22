<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\UsersController;

// Rutas públicas con prefijo v1
Route::prefix('v1')->group(function () {
    Route::post('/users/login', [UsersController::class, 'login']);
    // Otras rutas públicas pueden ir aquí
});

// Rutas protegidas por autenticación con prefijo v1
Route::prefix('v1')->middleware('auth:api')->group(function () {
    Route::get('/users', [UsersController::class, 'getUsers']); // Obtener todos los usuarios
    Route::get('/users/{id}', [UsersController::class, 'getUser']); // Obtener un usuario por ID
    Route::post('/users', [UsersController::class, 'createUser']); // Crear un nuevo usuario
    Route::put('/users/{id}', [UsersController::class, 'updateUser']); // Actualizar un usuario existente
    Route::delete('/users/{id}', [UsersController::class, 'deleteUser']); // Eliminar un usuario existente
    Route::get('/users/phone/{mobile_phone}', [UsersController::class, 'getUserByPhone']); // Obtener un usuario por teléfono
});

// Ruta para obtener el usuario autenticado con prefijo v1
Route::middleware('auth:api')->get('/v1/user', function (Request $request) {
    return $request->user();
});
